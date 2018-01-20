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
var image = ifrm.contentWindow.document.getElementsByClassName('MediaCard-media')[0];
image.style = "-webkit-transform: scale(0.75);-moz-transform: scale(0.75);-ms-transform: scale(0.75);-o-transform: scale(0.75);transform: scale(0.75)";

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
