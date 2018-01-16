window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'UA-102982479-1');
 
  var trackOutboundLink = function(url) {
                   gtag('event', 'click', {
                   'event_category': 'outbound',
                   'event_label': url,
                   'transport_type': 'beacon',
                   'event_callback': function(){ window.open(url);}
                   });
          }

