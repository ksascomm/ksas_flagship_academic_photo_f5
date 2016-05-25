<?php $theme_option = flagship_sub_get_global_options(); 
      $analytics_id = $theme_option['flagship_sub_google_analytics']; ?>

<script>
!function(e,a,n,t,c,g,o){e.GoogleAnalyticsObject=c,e[c]=e[c]||function(){(e[c].q=e[c].q||[]).push(arguments)},e[c].l=1*new Date,g=a.createElement(n),o=a.getElementsByTagName(n)[0],g.async=1,g.src=t,o.parentNode.insertBefore(g,o)}(window,document,"script","//www.google-analytics.com/analytics.js","ga"),ga("create","<?php echo $analytics_id; ?>","jhu.edu"),ga("create","UA-40512757-1",{name:"globalKSAS"}),ga("send","pageview"),ga("globalKSAS.send","pageview");

</script>

<script>
!function(){var e=document.createElement("script");e.type="text/javascript",e.async=!0,e.src="//siteimproveanalytics.com/js/siteanalyze_11464.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}();
</script>

<script>
function _gaLt(t){for(var e=t.srcElement||t.target;e&&("undefined"==typeof e.tagName||"a"!=e.tagName.toLowerCase()||!e.href);)e=e.parentNode;if(e&&e.href){var a=e.href;if(-1==a.indexOf(location.host)&&!a.match(/^javascript\:/i)){var n=function(t,e){e?window.open(t,e):window.location.href=t},o=e.target&&!e.target.match(/^_(self|parent|top)$/i)?e.target:!1;ga("send","event","Outgoing Links",a,document.location.pathname+document.location.search,{hitCallback:n(a,o)}),t.preventDefault?t.preventDefault():t.returnValue=!1}}}var w=window;w.addEventListener?w.addEventListener("load",function(){document.body.addEventListener("click",_gaLt,!1)},!1):w.attachEvent&&w.attachEvent("onload",function(){document.body.attachEvent("onclick",_gaLt)});
</script>

<script type="text/javascript">
function viewport(){var e=0,n=0;"number"==typeof window.innerWidth?(e=window.innerWidth,n=window.innerHeight):document.documentElement&&(document.documentElement.clientWidth||document.documentElement.clientHeight)?(e=document.documentElement.clientWidth,n=document.documentElement.clientHeight):document.body&&(document.body.clientWidth||document.body.clientHeight)&&(e=document.body.clientWidth,n=document.body.clientHeight),ga("send","event","Viewport","Size",e+"x"+n,{nonInteraction:1})}
</script>