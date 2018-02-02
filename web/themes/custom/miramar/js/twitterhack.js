document.addEventListener("DOMContentLoaded", function(){
// Function that changes background of twitter widget
function populateIframe() {

// Look for widget
var ifrm = document.getElementById('twitter-widget-0');

// If widget did generate to iframe
if (ifrm !== null){
  var timelineWidget = ifrm.contentWindow.document.getElementsByClassName('timeline-Widget')[0];
  // then if widget has content with class="timeline-Widget"
  if (timelineWidget !== undefined){
    // then change background color css for this class
    timelineWidget.style.background="none";
var widget = ifrm.contentWindow.document.getElementsByClassName('timeline-Widget')[0];
var header = ifrm.contentWindow.document.getElementsByClassName('timeline-Header')[0];
var footer = ifrm.contentWindow.document.getElementsByClassName('timeline-Footer')[0];
var brand = ifrm.contentWindow.document.getElementsByClassName('timeline-Tweet-brand')[0];
var tweet = ifrm.contentWindow.document.getElementsByClassName('timeline-Tweet')[0];
var author = ifrm.contentWindow.document.getElementsByClassName('timeline-Tweet-author')[0];
var meta = ifrm.contentWindow.document.getElementsByClassName('timeline-Tweet-metadata')[0];
var body = ifrm.contentWindow.document.getElementsByClassName('timeline-Body')[0];
var viewport = ifrm.contentWindow.document.getElementsByClassName('timeline-Viewport')[0];
var content = ifrm.contentWindow.document.getElementsByClassName("timeline-Tweet-text")[0];
var retweet = ifrm.contentWindow.document.getElementsByClassName("timeline-Tweet-retweetCredit")[0];
if(ifrm.contentWindow.document.getElementsByClassName('timeline-Tweet-media').length > 0) {
	var media = ifrm.contentWindow.document.getElementsByClassName('timeline-Tweet-media')[0];
	var border = ifrm.contentWindow.document.getElementsByClassName('MediaCard')[0];
	var image = ifrm.contentWindow.document.getElementsByClassName('MediaCard-media')[0];
	media.style = "padding:0;height:auto;margin-bottom:0;";
	border.style = "max-height:60%;margin-bottom:0;padding:0";
	image.style = "-webkit-transform: scale(0.75);-moz-transform: scale(0.75);-ms-transform: scale(0.75);-o-transform: scale(0.75);transform: scale(0.75)";
}
var action = ifrm.contentWindow.document.getElementsByClassName('timeline-Tweet-action');
timelineWidget.style="height:100%";
body.style="border:none;";
widget.style="background:none";
header.style = "display:none";
retweet.style = "display:none";
brand.style = "display:none";
author.style = "display:none";
meta.style = "display:none";
footer.style = "display:block;margin-top:1em;font-weight:bold;font-size:1em";
viewport.style="-webkit-margin-after:0.5em!important";
content.style="line-height:100%;font-family:'PT',serif;font-style:italic!important;font-size:250%!important;border:none";
for(i=0;i<action.length;i++) {
	action[i].style = "display:none";
}
    // and leave setinterval
      clearInterval(myInterval);
      } else {
        // console.log('timelineWidget == undefined - ', timelineWidget);
      }
    } else {
    // console.log('ifrm === null - ', ifrm);
  }
}

// Run function every second until it will terminate setinterval by itself
var myInterval = setInterval(populateIframe, 1000);

});
