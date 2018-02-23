<?php

namespace Drupal\emergency\Controller;

class emergencyController
{
  private $url;

  public function __construct() {
    $this->url = "http://sdccd.edu/EmerNotice/message.asp";
    //$this->url = "http://newdistrict.sdccd.edu/EmerNotice/message.asp";
  }

  public function test()
  {
    $arr = array('#title' => 'Warning!', '#markup' => 'Danger Will Robinson!  Aaah!  AaaaH!');
    return $arr;
  }

  //
  public function path_checkForMessage()
  {
    //drupal_set_message("Called path.");
    $prev = \Drupal::state()->get('emergency_message');
    $msg = $this->emergency_getMessage();

    // The conroller must return a response...
    $arr = array('#title' => 'Emergency Message Autoupdate');

    if($msg)
    {
      $arr[] = array(
        '#markup' => "<div id='emergency'>{$msg}</div>",
        '#cache' => ['max-age' => 0, 'context' => ['url.path']]
      );
    }
    \Drupal::logger('emergency')->notice("Previous state: [{$prev}]");
    if($prev != $msg)
    {
      \Drupal::logger('emergency')->notice('Message state changed, claring cache.');
      drupal_flush_all_caches();
    }

    return $arr;
  }

  function emergency_getMessage()
  {
  	//$emergency_url 		= variable_get('emergency_url', FALSE);
  	//$emergency_enabled 	= variable_get('emergency_enable', FALSE);
  	//$cache_interval		= variable_get('emergency_push_interval', 10);
    $emergency_url = $this->url;
    $emergency_enabled = TRUE;
    $emergency_message 	= FALSE;		//< Default return value if no dist message, or not configured.
  	$arrHTTPHeaders		= array();		//< Use header to check for HTTP 200 response...

  	if($emergency_enabled == TRUE and $emergency_url <> FALSE)
  	{
			// Return will be FALSE if there is no message
			$emergency_message = $this->getMessage($emergency_url, $arrHTTPHeaders);
	  }
    if($emergency_message) {
      \Drupal::state()->set('emergency_message', $emergency_message);
    }
    else {
      \Drupal::state()->delete('emergency_message');
      \Drupal::state()->delete('emergency_title');
    }
    \Drupal::logger('emergency')->notice('Message is: [' . $emergency_message . ']');
    return $emergency_message;

  }

  /**
   * Private function to do the grunt work of getting the message & HTTP headers.
   *
   * This is a private function to move most of the mechanics of getting the web page
   * from the public function, which handles the higher-level logic of simply getting
   * the message and checking it's validity.
   *
   * @param [in] $url
   *   The full URL of the message resource.
   *
   * @param [out] &$arrHeaders
   *   An associative array of HTTP headers, and the HTTP response code.
   *   Some examples:  $arrHeaders['HTTP_RESPONSE'] or $arrHeaders['Content-Length']
   *
   * @return $message
   *   The raw message provided by the external resource, or FALSE if no message
   */

  private function getMessage($url, &$arrHeaders)
  {
  	$strContent 		= FALSE;	//< Default if no content.
  	$strHTTPResponse 	= '';
  	$strHeaders			= '';
  	$intLength			= 0;		//< HTTP Content Length
  	$urlParts 			= parse_url($url);
  	$intTimeout			= 2;		//< fsockopen timeout in seconds.
  	// $cache_interval		= variable_get('emergency_push_cachetime', 10);

  	// Assume some standard defaults, since most urls don't explicity specify a port.
  	if(!isset($urlParts['path'])) $urlParts['path'] = '/';
  	if(!isset($urlParts['port'])) $urlParts['port'] = 80;

  	try
  	{
  		$fp = fsockopen($urlParts['host'], $urlParts['port'], $errno, $errstr, $intTimeout);
  		if($fp)
  		{
  		  $out = "GET {$urlParts['path']} HTTP/1.1\r\nHOST: {$urlParts['host']}\r\nConnection: Close\r\n\r\n";
  		  fwrite($fp, $out);

  		  // The first bit back is the HTTP Response line
  			if(!feof($fp))
  			{
  				$strHTTPResponse = fgets($fp);
        }


  		  // Now get the HTTP header
  			while(!feof($fp))
  			{
  				$str = fgets($fp);
  				if(strlen($str) <> 2)	// Just a \r\n is an empty line, end of the header
  					$strHeaders .= $str;
  				else
  					break;
  			}

  			$arrHeaders = $this->http_parse_headers($strHeaders);
  			$arrHeaders['HTTP_RESPONSE'] = $strHTTPResponse;
  			$intLength = (int)$arrHeaders['Content-Length'];
  			$arrResponseParts = explode(' ', $arrHeaders['HTTP_RESPONSE']);
  			$intResponseCode = (int)$arrResponseParts[1];

  			// Now get the content, if any.
  			if($intResponseCode == 200 and $intLength<>0)
  			{
  				$strContent = fread($fp, $intLength);
  			}
  			else
  			{
          \Drupal::logger('emergency')->notice('WEMS URL Returned HTTP ' . $intResponseCode);
  				$strContent = FALSE;
  			}

  			fclose($fp);
  		}
  		else
  		{
  			throw new \Exception("Unable to get resource: $url");
  		}

  	}

  	catch(\Exception $e)
  	{
  		\Drupal::logger('emergency')->error($e->getMessage());
  		$strContent = FALSE;
  	}

  	return $strContent;
  }


  /**
   *	Create associative array from an HTTP Header
   *
   *  Code provided by http://www.bhootnath.in/blog/2010/10/parse-http-headers-in-php/
   *
   */

  private function http_parse_headers( $header )
  {
  	$retVal = array();
  	$fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $header));
  	foreach( $fields as $field )
  	{

  		if( preg_match('/([^:]+): (.+)/m', $field, $match) )
  		{
  			//$match[1] = preg_replace('/(?<=^|[\x09\x20\x2D])./e', 'strtoupper("\0")', strtolower(trim($match[1])));
  			if( isset($retVal[$match[1]]) )
  			{
  				$retVal[$match[1]] = array($retVal[$match[1]], $match[2]);
  			}
  			else
  			{
  				$retVal[$match[1]] = trim($match[2]);
  			}
  		}
  	}

  	return $retVal;
  }

}
