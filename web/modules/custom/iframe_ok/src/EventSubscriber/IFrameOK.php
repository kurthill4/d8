<?php


/**
 * @file
 * Contains \Drupal\iframe_ok\EventSubscriber\IFrameOK.
 */

namespace Drupal\iframe_ok\EventSubscriber;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event Subscriber IFrameOK.
 */
class IFrameOK implements EventSubscriberInterface {

  /**
   * Code that should be triggered on event specified 
   */
  public function onRespond(FilterResponseEvent $event) {
    // The RESPONSE event occurs once a response was created for replying to a request.

 	$pathIn = \Drupal::service('path.current')->getPath();
	$path = \Drupal::service('path.alias_manager')->getAliasByPath($pathIn);
    $response = $event->getResponse();

	if (strpos($path, '/campus/asc') === 0) {
		$response->headers->remove('X-Frame-Options');	
	}
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    // Get the event that you're subscribing
    $events[KernelEvents::RESPONSE][] = ['onRespond'];
    return $events;
  }

}
