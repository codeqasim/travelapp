<?php 

use Curl\Curl;

// DEVIDE URL INTO SEGMENTS
$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = explode('/', $url_path);

$parms = array( 'user_id' => $_SESSION['user_id'] );
$req = new Curl();
$req->post(api_url.'app', $parms);
$app = $req->response->data[0];

// REDIRECT IF USER IS NOT LOGGED IN
if(!isset($_SESSION['user_login']) == true ){ header("Location: login"); exit; }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php if(isset($title)){echo $title;} ?></title>
<link rel="shortcut icon" href="./assets/img/favicon.png">
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta http-equiv="Cache-control" content="private">
<link rel="stylesheet" href="./assets/css/app.css" />
<script src="./assets/js/jquery-3.6.0.min.js"></script>

<script>

/*!
 * pace.js v1.2.4
 * https://github.com/CodeByZach/pace/
 * Licensed MIT © HubSpot, Inc.
 */
!function(){function o(t,e){return function(){return t.apply(e,arguments)}}var u,c,i,s,n,y,t,l,v,r,a,p,e,h,w,b,f,g,d,m,k,S,q,L,x,P,T,R,j,O,E,M,A,C,N,_,F,U,W,X,D,H,I,z,G,B,J=[].slice,K={}.hasOwnProperty,Q=function(t,e){for(var n in e)K.call(e,n)&&(t[n]=e[n]);function r(){this.constructor=t}return r.prototype=e.prototype,t.prototype=new r,t.__super__=e.prototype,t},V=[].indexOf||function(t){for(var e=0,n=this.length;e<n;e++)if(e in this&&this[e]===t)return e;return-1};function Y(){}for(g={className:"",catchupTime:100,initialRate:.03,minTime:250,ghostTime:100,maxProgressPerFrame:20,easeFactor:1.25,startOnPageLoad:!0,restartOnPushState:!0,restartOnRequestAfter:500,target:"body",elements:{checkInterval:100,selectors:["body"]},eventLag:{minSamples:10,sampleCount:3,lagThreshold:3},ajax:{trackMethods:["GET"],trackWebSockets:!0,ignoreURLs:[]}},P=function(){var t;return null!=(t="undefined"!=typeof performance&&null!==performance&&"function"==typeof performance.now?performance.now():void 0)?t:+new Date},R=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.msRequestAnimationFrame,f=window.cancelAnimationFrame||window.mozCancelAnimationFrame,p=function(t,e,n){if("function"==typeof t.addEventListener)return t.addEventListener(e,n,!1);var r;"function"!=typeof t["on"+e]||"object"!=typeof t["on"+e].eventListeners?(r=new s,"function"==typeof t["on"+e]&&r.on(e,t["on"+e]),t["on"+e]=function(t){return r.trigger(e,t)},t["on"+e].eventListeners=r):r=t["on"+e].eventListeners,r.on(e,n)},null==R&&(R=function(t){return setTimeout(t,50)},f=function(t){return clearTimeout(t)}),O=function(e){var n=P(),r=function(){var t=P()-n;return 33<=t?(n=P(),e(t,function(){return R(r)})):setTimeout(r,33-t)};return r()},j=function(){var t=arguments[0],e=arguments[1],n=3<=arguments.length?J.call(arguments,2):[];return"function"==typeof t[e]?t[e].apply(t,n):t[e]},d=function(){for(var t,e,n,r=arguments[0],s=2<=arguments.length?J.call(arguments,1):[],o=0,i=s.length;o<i;o++)if(e=s[o])for(t in e)K.call(e,t)&&(n=e[t],null!=r[t]&&"object"==typeof r[t]&&null!=n&&"object"==typeof n?d(r[t],n):r[t]=n);return r},h=function(t){for(var e,n,r=e=0,s=0,o=t.length;s<o;s++)n=t[s],r+=Math.abs(n),e++;return r/e},k=function(t,e){var n,r;if(null==t&&(t="options"),null==e&&(e=!0),r=document.querySelector("[data-pace-"+t+"]")){if(n=r.getAttribute("data-pace-"+t),!e)return n;try{return JSON.parse(n)}catch(t){return"undefined"!=typeof console&&null!==console?console.error("Error parsing inline pace options",t):void 0}}},Y.prototype.on=function(t,e,n,r){var s;return null==r&&(r=!1),null==this.bindings&&(this.bindings={}),null==(s=this.bindings)[t]&&(s[t]=[]),this.bindings[t].push({handler:e,ctx:n,once:r})},Y.prototype.once=function(t,e,n){return this.on(t,e,n,!0)},Y.prototype.off=function(t,e){var n,r,s;if(null!=(null!=(r=this.bindings)?r[t]:void 0)){if(null==e)return delete this.bindings[t];for(n=0,s=[];n<this.bindings[t].length;)this.bindings[t][n].handler===e?s.push(this.bindings[t].splice(n,1)):s.push(n++);return s}},Y.prototype.trigger=function(){var t,e,n,r,s,o,i=arguments[0],a=2<=arguments.length?J.call(arguments,1):[];if(null!=(r=this.bindings)&&r[i]){for(n=0,o=[];n<this.bindings[i].length;)e=(s=this.bindings[i][n]).handler,t=s.ctx,s=s.once,e.apply(null!=t?t:this,a),s?o.push(this.bindings[i].splice(n,1)):o.push(n++);return o}},B=Y,y=window.Pace||{},window.Pace=y,d(y,B.prototype),T=y.options=d({},g,window.paceOptions,k()),X=0,H=(z=["ajax","document","eventLag","elements"]).length;X<H;X++)!0===T[C=z[X]]&&(T[C]=g[C]);function Z(){return Z.__super__.constructor.apply(this,arguments)}function $(){this.progress=0}function tt(){this.bindings={}}function et(){var e,o=this;et.__super__.constructor.apply(this,arguments),e=function(r){var s=r.open;return r.open=function(t,e,n){return A(t)&&o.trigger("request",{type:t,url:e,request:r}),s.apply(r,arguments)}},window.XMLHttpRequest=function(t){t=new W(t);return e(t),t};try{m(window.XMLHttpRequest,W)}catch(t){}if(null!=U){window.XDomainRequest=function(){var t=new U;return e(t),t};try{m(window.XDomainRequest,U)}catch(t){}}if(null!=F&&T.ajax.trackWebSockets){window.WebSocket=function(t,e){var n=null!=e?new F(t,e):new F(t);return A("socket")&&o.trigger("request",{type:"socket",url:t,protocols:e,request:n}),n};try{m(window.WebSocket,F)}catch(t){}}}function nt(){this.complete=o(this.complete,this);var t=this;this.elements=[],S().on("request",function(){return t.watch.apply(t,arguments)})}function rt(t){var e,n,r,s;for(null==t&&(t={}),this.complete=o(this.complete,this),this.elements=[],null==t.selectors&&(t.selectors=[]),n=0,r=(s=t.selectors).length;n<r;n++)e=s[n],this.elements.push(new i(e,this.complete))}function st(t,e){this.selector=t,this.completeCallback=e,this.progress=0,this.check()}function ot(){var t,e,n=this;this.progress=null!=(e=this.states[document.readyState])?e:100,t=document.onreadystatechange,document.onreadystatechange=function(){return null!=n.states[document.readyState]&&(n.progress=n.states[document.readyState]),"function"==typeof t?t.apply(null,arguments):void 0}}function it(t){this.source=t,this.last=this.sinceLastUpdate=0,this.rate=T.initialRate,this.catchup=0,this.progress=this.lastProgress=0,null!=this.source&&(this.progress=j(this.source,"progress"))}B=Error,Q(Z,B),n=Z,$.prototype.getElement=function(){var t;if(null==this.el){if(!(t=document.querySelector(T.target)))throw new n;this.el=document.createElement("div"),this.el.className="pace pace-active",document.body.className=document.body.className.replace(/(pace-done )|/,"pace-running ");var e=""!==T.className?" "+T.className:"";this.el.innerHTML='<div class="pace-progress'+e+'">\n  <div class="pace-progress-inner"></div>\n</div>\n<div class="pace-activity"></div>',null!=t.firstChild?t.insertBefore(this.el,t.firstChild):t.appendChild(this.el)}return this.el},$.prototype.finish=function(){var t=this.getElement();return t.className=t.className.replace("pace-active","pace-inactive"),document.body.className=document.body.className.replace("pace-running ","pace-done ")},$.prototype.update=function(t){return this.progress=t,y.trigger("progress",t),this.render()},$.prototype.destroy=function(){try{this.getElement().parentNode.removeChild(this.getElement())}catch(t){n=t}return this.el=void 0},$.prototype.render=function(){var t,e,n,r,s,o,i;if(null==document.querySelector(T.target))return!1;for(t=this.getElement(),r="translate3d("+this.progress+"%, 0, 0)",s=0,o=(i=["webkitTransform","msTransform","transform"]).length;s<o;s++)e=i[s],t.children[0].style[e]=r;return(!this.lastRenderedProgress||this.lastRenderedProgress|0!==this.progress|0)&&(t.children[0].setAttribute("data-progress-text",(0|this.progress)+"%"),100<=this.progress?n="99":(n=this.progress<10?"0":"",n+=0|this.progress),t.children[0].setAttribute("data-progress",""+n)),y.trigger("change",this.progress),this.lastRenderedProgress=this.progress},$.prototype.done=function(){return 100<=this.progress},c=$,tt.prototype.trigger=function(t,e){var n,r,s,o,i;if(null!=this.bindings[t]){for(i=[],r=0,s=(o=this.bindings[t]).length;r<s;r++)n=o[r],i.push(n.call(this,e));return i}},tt.prototype.on=function(t,e){var n;return null==(n=this.bindings)[t]&&(n[t]=[]),this.bindings[t].push(e)},s=tt,W=window.XMLHttpRequest,U=window.XDomainRequest,F=window.WebSocket,m=function(t,e){var n,r=[];for(n in e.prototype)try{null==t[n]&&"function"!=typeof e[n]?"function"==typeof Object.defineProperty?r.push(Object.defineProperty(t,n,{get:function(t){return function(){return e.prototype[t]}}(n),configurable:!0,enumerable:!0})):r.push(t[n]=e.prototype[n]):r.push(void 0)}catch(t){0}return r},L=[],y.ignore=function(){var t=arguments[0],e=2<=arguments.length?J.call(arguments,1):[];return L.unshift("ignore"),e=t.apply(null,e),L.shift(),e},y.track=function(){var t=arguments[0],e=2<=arguments.length?J.call(arguments,1):[];return L.unshift("track"),e=t.apply(null,e),L.shift(),e},A=function(t){if(null==t&&(t="GET"),"track"===L[0])return"force";if(!L.length&&T.ajax){if("socket"===t&&T.ajax.trackWebSockets)return!0;if(t=t.toUpperCase(),0<=V.call(T.ajax.trackMethods,t))return!0}return!1},Q(et,s),t=et,D=null,M=function(t){for(var e,n=T.ajax.ignoreURLs,r=0,s=n.length;r<s;r++)if("string"==typeof(e=n[r])){if(-1!==t.indexOf(e))return!0}else if(e.test(t))return!0;return!1},(S=function(){return D=null==D?new t:D})().on("request",function(t){var o,i=t.type,a=t.request,e=t.url;if(!M(e))return y.running||!1===T.restartOnRequestAfter&&"force"!==A(i)?void 0:(o=arguments,"boolean"==typeof(e=T.restartOnRequestAfter||0)&&(e=0),setTimeout(function(){var t,e,n,r,s="socket"===i?a.readyState<1:0<(s=a.readyState)&&s<4;if(s){for(y.restart(),r=[],t=0,e=(n=y.sources).length;t<e;t++){if((C=n[t])instanceof u){C.watch.apply(C,o);break}r.push(void 0)}return r}},e))}),nt.prototype.watch=function(t){var e=t.type,n=t.request,t=t.url;if(!M(t))return n=new("socket"===e?r:a)(n,this.complete),this.elements.push(n)},nt.prototype.complete=function(e){return this.elements=this.elements.filter(function(t){return t!==e})},u=nt,a=function(e,n){var t,r,s,o,i=this;if(this.progress=0,null!=window.ProgressEvent)for(p(e,"progress",function(t){return t.lengthComputable?i.progress=100*t.loaded/t.total:i.progress=i.progress+(100-i.progress)/2}),t=0,r=(o=["load","abort","timeout","error"]).length;t<r;t++)p(e,o[t],function(){return n(i),i.progress=100});else s=e.onreadystatechange,e.onreadystatechange=function(){var t;return 0===(t=e.readyState)||4===t?(n(i),i.progress=100):3===e.readyState&&(i.progress=50),"function"==typeof s?s.apply(null,arguments):void 0}},r=function(t,e){for(var n,r=this,s=this.progress=0,o=(n=["error","open"]).length;s<o;s++)p(t,n[s],function(){return e(r),r.progress=100})},rt.prototype.complete=function(e){return this.elements=this.elements.filter(function(t){return t!==e})},k=rt,st.prototype.check=function(){var t=this;return document.querySelector(this.selector)?this.done():setTimeout(function(){return t.check()},T.elements.checkInterval)},st.prototype.done=function(){return this.completeCallback(this),this.completeCallback=null,this.progress=100},i=st,ot.prototype.states={loading:0,interactive:50,complete:100},B=ot,Q=function(){var e,n,r,s,o,i=this;this.progress=0,o=[],s=0,r=P(),n=setInterval(function(){var t=P()-r-50;return r=P(),o.push(t),o.length>T.eventLag.sampleCount&&o.shift(),e=h(o),++s>=T.eventLag.minSamples&&e<T.eventLag.lagThreshold?(i.progress=100,clearInterval(n)):i.progress=3/(e+3)*100},50)},it.prototype.tick=function(t,e){return 100<=(e=null==e?j(this.source,"progress"):e)&&(this.done=!0),e===this.last?this.sinceLastUpdate+=t:(this.sinceLastUpdate&&(this.rate=(e-this.last)/this.sinceLastUpdate),this.catchup=(e-this.progress)/T.catchupTime,this.sinceLastUpdate=0,this.last=e),e>this.progress&&(this.progress+=this.catchup*t),e=1-Math.pow(this.progress/100,T.easeFactor),this.progress+=e*this.rate*t,this.progress=Math.min(this.lastProgress+T.maxProgressPerFrame,this.progress),this.progress=Math.max(0,this.progress),this.progress=Math.min(100,this.progress),this.lastProgress=this.progress,this.progress},v=it,b=e=_=w=E=N=null,y.running=!1,q=function(){if(T.restartOnPushState)return y.restart()},null!=window.history.pushState&&(I=window.history.pushState,window.history.pushState=function(){return q(),I.apply(window.history,arguments)}),null!=window.history.replaceState&&(G=window.history.replaceState,window.history.replaceState=function(){return q(),G.apply(window.history,arguments)}),l={ajax:u,elements:k,document:B,eventLag:Q},(x=function(){var t,e,n,r,s,o,i,a;for(y.sources=N=[],e=0,r=(o=["ajax","elements","document","eventLag"]).length;e<r;e++)!1!==T[t=o[e]]&&N.push(new l[t](T[t]));for(n=0,s=(a=null!=(i=T.extraSources)?i:[]).length;n<s;n++)C=a[n],N.push(new C(T));return y.bar=w=new c,E=[],_=new v})(),y.stop=function(){return y.trigger("stop"),y.running=!1,w.destroy(),b=!0,null!=e&&("function"==typeof f&&f(e),e=null),x()},y.restart=function(){return y.trigger("restart"),y.stop(),y.start()},y.go=function(){var m;return y.running=!0,w.render(),m=P(),b=!1,e=O(function(t,e){w.progress;for(var n,r,s,o,i,a,u,c,l,p,h=a=0,f=!0,g=u=0,d=N.length;u<d;g=++u)for(C=N[g],i=null!=E[g]?E[g]:E[g]=[],s=c=0,l=(r=null!=(p=C.elements)?p:[C]).length;c<l;s=++c)o=r[s],f&=(o=null!=i[s]?i[s]:i[s]=new v(o)).done,o.done||(h++,a+=o.tick(t));return n=a/h,w.update(_.tick(t,n)),w.done()||f||b?(w.update(100),y.trigger("done"),setTimeout(function(){return w.finish(),y.running=!1,y.trigger("hide")},Math.max(T.ghostTime,Math.max(T.minTime-(P()-m),0)))):e()})},y.start=function(t){d(T,t),y.running=!0;try{w.render()}catch(t){n=t}return document.querySelector(".pace")?(y.trigger("start"),y.go()):setTimeout(y.start,50)},"function"==typeof define&&define.amd?define(function(){return y}):"object"==typeof exports?module.exports=y:T.startOnPageLoad&&y.start()}.call(this);

/**!
* PJAX- Standalone
* @version 0.6.1
 * @source https://github.com/thybag/PJAX-Standalone
 */
(function(){ 

var internal = {
   "firstrun": true,
   "is_supported": window.history && window.history.pushState && window.history.replaceState && !navigator.userAgent.match(/((iPod|iPhone|iPad).+\bOS\s+[1-4]|WebApps\/.+CFNetwork)/),
   "loaded_scripts": []
};

  if(!internal.is_supported) {
   var pjax_shell = {
     "connect": function() { return; },
     "invoke": function() {
        var url = (arguments.length === 2) ? arguments[0] : arguments.url;
        document.location = url;
        return;	
     } 
  };
  // AMD support
  if (typeof define === 'function' && define.amd) { 
     define( function() { return pjax_shell; }); 
  } else { 
     window.pjax = pjax_shell; 
  }
  return;
}

internal.addEvent = function(obj, event, callback) {
  obj.addEventListener(event, callback, false);
};

internal.clone = function(obj) {
  var object = {};
  // For every option in object, create it in the duplicate.
  for (var i in obj) {
     object[i] = obj[i];
  }
  return object;
};

internal.triggerEvent = function(node, event_name, data) {
  // Good browsers
  var evt = document.createEvent("HTMLEvents");
  evt.initEvent(event_name, true, true);
  // If additional data was provided, add it to event
  if(typeof data !== 'undefined') evt.data = data;
  node.dispatchEvent(evt);
};

internal.addEvent(window, 'popstate', function(st) {
  if(st.state !== null) {

     var opt = {	
        'url': st.state.url, 
        'container': st.state.container, 
        'title' : st.state.title,
        'history': false
     };

     // Merge original in original connect options
     if(typeof internal.options !== 'undefined'){
        for(var a in internal.options){ 
           if(typeof opt[a] === 'undefined') opt[a] = internal.options[a];
        }
     }

     // Convert state data to PJAX options
     var options = internal.parseOptions(opt);
     // If something went wrong, return.
     if(options === false) return;
     // If there is a state object, handle it as a page load.
     internal.handle(options);
  }
});

internal.attach = function(node, options) {

  // Ignore external links.
  if ( node.protocol !== document.location.protocol ||
     node.host !== document.location.host ) {
     return;
  }

  // Ignore anchors on the same page
  if(node.pathname === location.pathname && node.hash.length > 0) {
     return;
  }

  // Ignore common non-PJAX loadable media types (pdf/doc/zips & images) unless user provides alternate array
  var ignoreFileTypes = ['pdf','doc','docx','zip','rar','7z','gif','jpeg','jpg','png'];
  if(typeof options.ignoreFileTypes === 'undefined') options.ignoreFileTypes = ignoreFileTypes;
  // Skip link if file type is within ignored types array
  if(options.ignoreFileTypes.indexOf( node.pathname.split('.').pop().toLowerCase() ) !== -1){
     return;
  }

  // Add link HREF to object
  options.url = node.href;

  // If PJAX data is specified, use as container
  if(node.getAttribute('data-pjax')) {
     options.container = node.getAttribute('data-pjax');
  }

  // If data-title is specified, use as title.
  if(node.getAttribute('data-title')) {
     options.title = node.getAttribute('data-title');
  }

  // Check options are valid.
  options = internal.parseOptions(options);
  if(options === false) return;

  // Attach event.
  internal.addEvent(node, 'click', function(event) {
     // Allow middle click (pages in new windows)
     if ( event.which > 1 || event.metaKey || event.ctrlKey ) return;
     // Don't fire normal event
     if(event.preventDefault){ event.preventDefault(); }else{ event.returnValue = false; }
     // Take no action if we are already on said page?
     if(document.location.href === options.url) return false;
     // handle the load.
     internal.handle(options);
  });
};

internal.parseLinks = function(dom_obj, options) {

  var nodes;

  if(typeof options.useClass !== 'undefined'){
     // Get all nodes with the provided class name.
     nodes = dom_obj.getElementsByClassName(options.useClass);
  }else{
     // If no class was provided, just get all the links
     nodes = dom_obj.getElementsByTagName('a');
  }

  // For all returned nodes
  for(var i=0,tmp_opt; i < nodes.length; i++) {
     var node = nodes[i];
     if(typeof options.excludeClass !== 'undefined') {
        if(node.className.indexOf(options.excludeClass) !== -1) continue;
     }
     // Override options history to true, else link parsing could be triggered by back button (which runs in no-history mode)
     tmp_opt = internal.clone(options);
     tmp_opt.history = true;
     internal.attach(node, tmp_opt);
  }

  if(internal.firstrun) {
     // Store array or all currently included script src's to avoid PJAX accidentally reloading existing libraries
     var scripts = document.getElementsByTagName('script');
     for(var c=0; c < scripts.length; c++) {
        if(scripts[c].src && internal.loaded_scripts.indexOf(scripts[c].src) === -1){
           internal.loaded_scripts.push(scripts[c].src);
        }
     }

     // Fire ready event once all links are connected
     internal.triggerEvent(internal.get_container_node(options.container), 'ready');
     
  }
};

internal.smartLoad = function(html, options) {
  // Grab the title if there is one
  var title = html.getElementsByTagName('title')[0];
  if(title)
     document.title = title.innerHTML;

  var container = html.querySelector("#" + options.container.id);
  if(container !== null) return container;

  // If our container was not found, HTML will be returned as is.
  return html;
};

internal.updateContent = function(html, options){
  // Create in memory DOM node, to make parsing returned data easier
  var tmp = document.createElement('div');
  tmp.innerHTML = html; 

  // Ensure we have the correct HTML to apply to our container.
  if(options.smartLoad) tmp = internal.smartLoad(tmp, options);

  // If no title was provided, extract it
  if(typeof options.title === 'undefined'){
     // Use current doc title (this will be updated via smart load if its enabled)
     options.title = document.title;

     // Attempt to grab title from non-smart loaded page contents 
     if(!options.smartLoad){
        var tmpTitle = tmp.getElementsByTagName('title');
        if(tmpTitle.length !== 0) options.title = tmpTitle[0].innerHTML;
     }
  }

  // Update the DOM with the new content
  options.container.innerHTML = tmp.innerHTML;

  // Run included JS?
  if(options.parseJS) internal.runScripts(tmp);
  
  // Send data back to handle
  return options;
};

internal.runScripts = function(html){
  // Extract JavaScript & eval it (if enabled)
  var scripts = html.getElementsByTagName('script');
  for(var sc=0; sc < scripts.length;sc++) {
     // If has an src & src isn't in "loaded_scripts", load the script.
     if(scripts[sc].src && internal.loaded_scripts.indexOf(scripts[sc].src) === -1){
        // Append to head to include
        var s = document.createElement("script"); 
        s.src = scripts[sc].src;
        document.head.appendChild(s);
        // Add to loaded list
        internal.loaded_scripts.push(scripts[sc].src);
     }else{
        // If raw JS, eval it. 
        eval(scripts[sc].innerHTML);
     }
  }
};

internal.handle = function(options) {
  
  // Fire beforeSend Event.
  internal.triggerEvent(options.container, 'beforeSend', options);

  // Do the request
  internal.request(options.url, function(html) {

     // Fail if unable to load HTML via AJAX
     if(html === false){
        internal.triggerEvent(options.container,'complete', options);
        internal.triggerEvent(options.container,'error', options);
        return;
     }

     // Parse page & update DOM
     options = internal.updateContent(html, options);
     
     // Do we need to add this to the history?
     if(options.history) {
        // If this is the first time pjax has run, create a state object for the current page.
        if(internal.firstrun){
           window.history.replaceState({'url': document.location.href, 'container':  options.container.id, 'title': document.title}, document.title);
           internal.firstrun = false;
        }
        // Update browser history
        window.history.pushState({'url': options.url, 'container': options.container.id, 'title': options.title }, options.title , options.url);
     }

     // Initialize any new links found within document (if enabled).
     if(options.parseLinksOnload){
        internal.parseLinks(options.container, options);
     }

     // Fire Events
     internal.triggerEvent(options.container,'complete', options);
     internal.triggerEvent(options.container,'success', options);
     
     // Don't track if page isn't part of history, or if autoAnalytics is disabled
     if(options.autoAnalytics && options.history) {
        // a trackPageView, so PJAX loaded pages can be tracked successfully.
        if(window._gaq) _gaq.push(['_trackPageview']);
        if(window.ga) ga('send', 'pageview', {'page': options.url, 'title': options.title});
     }

     // Set new title
     document.title = options.title;

     // Scroll page to top on new page load
     if(options.returnToTop) {
        window.scrollTo(0, 0);
     } 
  });
};

internal.request = function(location, callback) {
  // Create xmlHttpRequest object.
  var xmlhttp;
  try { 
     xmlhttp = window.XMLHttpRequest? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"); 
  }  catch (e) { 
     console.log("Unable to create XMLHTTP Request");
     return; 
  }
  // Add state listener.
  xmlhttp.onreadystatechange = function() {
     if ((xmlhttp.readyState === 4) && (xmlhttp.status === 200)) {
        // Success, Return HTML
        callback(xmlhttp.responseText);
     }else if((xmlhttp.readyState === 4) && (xmlhttp.status === 404 || xmlhttp.status === 500)){
        // error (return false)
        callback(false);
     }
  };
  // Secret pjax ?get param so browser doesn't return pjax content from cache when we don't want it to
   xmlhttp.open("GET", location + ((!/[?&]/.test(location)) ? '?_pjax' : '&_pjax'), true);
   xmlhttp.setRequestHeader('X-PJAX', 'true'); // PJAX header
  xmlhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');// Standard AJAX header.

  xmlhttp.send(null);
};

internal.parseOptions = function(options) {

  var defaults = {
     "history": true,
     "parseLinksOnload": true,
     "smartLoad" : true,
     "autoAnalytics": true,
     "returnToTop": true,
     "parseJS": true
  };

  // Ensure a URL and container have been provided.
  if(typeof options.url === 'undefined' || typeof options.container === 'undefined' || options.container === null) {
     console.log("URL and Container must be provided.");
     return false;
  }

  // Check required options are defined, if not, use default
  for(var o in defaults) {
     if(typeof options[o] === 'undefined') options[o] = defaults[o];
  }

  // Ensure history setting is a boolean.
  options.history = (options.history === false) ? false : true;

  // Get container (if its an id, convert it to a DOM node.)
  options.container = internal.get_container_node(options.container);

  // Events
  var events = ['ready', 'beforeSend', 'complete', 'error', 'success'];

  // If everything went okay thus far, connect up listeners
  for(var e in events){
     var evt = events[e];
     if(typeof options[evt] === 'function'){
        internal.addEvent(options.container, evt, options[evt]);
     }
  }

  // Return valid options
  return options;
};

internal.get_container_node = function(container) {
  if(typeof container === 'string') {
     container = document.getElementById(container);
     if(container === null){
        console.log("Could not find container with id:" + container);
        return false;
     }
  }
  return container;
};

this.connect = function(/* options */) {
  // connect();
  var options = {};
  // connect(container, class_to_apply_to)
  if(arguments.length === 2){
     options.container = arguments[0];
     options.useClass = arguments[1];
  }
  // Either JSON or container id
  if(arguments.length === 1){
     if(typeof arguments[0] === 'string' ) {
        //connect(container_id)
        options.container = arguments[0];
     }else{
        //Else connect({url:'', container: ''});
        options = arguments[0];
     }
  }
  // Delete history and title if provided. These options should only be provided via invoke();
  delete options.title;
  delete options.history;
  
  internal.options = options;
  if(document.readyState === 'complete') {
     internal.parseLinks(document, options);
  } else {
     //Don't run until the window is ready.
     internal.addEvent(window, 'load', function(){	
        //Parse links using specified options
        internal.parseLinks(document, options);
     });
  }
};

this.invoke = function(/* options */) {

  var options = {};
  // url, container
  if(arguments.length === 2){
     options.url = arguments[0];
     options.container = arguments[1];
  }else{
     options = arguments[0];
  }

  // Process options
  options = internal.parseOptions(options);
  // If everything went okay, activate pjax.
  if(options !== false) internal.handle(options);
};

// Make object usable
var pjax_obj = this;
if (typeof define === 'function' && define.amd) {
  // Register pjax as AMD module
  define( function() {
     return pjax_obj;
  });
}else{
  // Make PJAX object accessible in global name space
  window.pjax = pjax_obj;
}

}).call({}); 

// ==============================================================>

// if(typeof console === 'undefined') console = {"log":function(m){}};

// PJAX links!
pjax.connect({
  'container': 'content',
  'success': function(event){
     var url = (typeof event.data !== 'undefined') ? event.data.url : '';
     // console.log("Successfully loaded "+ url);
  },
  'error': function(event){
     var url = (typeof event.data !== 'undefined') ? event.data.url : '';
     // console.log("Could not load "+ url);
  },
  'ready': function(){
     // console.log("PJAX loaded!");
  }
});

// pjax.connect('content', 'pjaxer');
// pjax.connect('content');
// pjax.connect();
</script>


<script>setTimeout(function() { $('.bodyload').fadeOut(); }, 10);</script>
</head>

<body class="nav-fixed">

<!-- <div class="bodyload">
<div class="rotatingDiv"></div>
</div> -->

<nav class="top-app-bar navbar navbar-expand navbar-light bg-light" style="background:#fff !important">
    <div class="container-fluid px-4">
        <!-- Drawer toggle button-->
        <button class="btn btn-lg btn-icon order-1 order-lg-0 mdc-ripple-upgraded" id="drawerToggle" href="javascript:void(0);"><i class="material-icons">menu</i></button>
        <!-- Navbar brand-->
        <a class="navbar-brand me-auto loadeffect" href="./"><div class="text-uppercase font-monospace"><?=$app->business_name?></div></a>
        <!-- Navbar items-->
        <div class="d-flex align-items-center mx-3 me-lg-0">
            <!-- Navbar-->
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item"><a class="nav-link" href="./dashboard" target=""><?=T::dashboard?></a></li>
                <li class="nav-item"><a class="nav-link" href="https://docs.phptravels.com" target="_blank">Docs</a></li>
            </ul>
            <!-- Navbar buttons-->
            <div class="d-flex">
                <!-- Messages dropdown-->
                <div class="dropdown dropdown-notifications d-none d-sm-block">
                    <button class="btn btn-lg btn-icon dropdown-toggle me-30 mdc-ripple-upgraded" id="dropdownMenuMessages" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>

                    </button>
                    <ul class="dropdown-menu dropdown-menu-end me-3 mt-3 py-0 overflow-hidden" aria-labelledby="dropdownMenuMessages">
                        <li><h6 class="dropdown-header bg-primary text-white fw-500 py-3">Messages</h6></li>
                        <li><hr class="dropdown-divider my-0"></li>
                        <li>
                            <a class="dropdown-item unread mdc-ripple-upgraded" href="#!">
                                <div class="dropdown-item-content">
                                    <div class="dropdown-item-content-text"><div class="text-truncate d-inline-block" style="max-width: 18rem">Hi there, I had a question about something, is there any way you can help me out?</div></div>
                                    <div class="dropdown-item-content-subtext">Mar 12, 2021 · Juan Babin</div>
                                </div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider my-0"></li>

                    </ul>
                </div>
                <!-- Notifications and alerts dropdown-->
                <div class="dropdown dropdown-notifications d-none d-sm-block">
                    <button class="btn btn-lg btn-icon dropdown-toggle me-0 mdc-ripple-upgraded" id="dropdownMenuNotifications" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg>

                    </button>
                    <ul class="dropdown-menu dropdown-menu-end me-0 mt-3 py-0 overflow-hidden" aria-labelledby="dropdownMenuNotifications">
                        <li><h6 class="dropdown-header bg-primary text-white fw-500 py-3">Alerts</h6></li>
                        <li><hr class="dropdown-divider my-0"></li>
                        <li>
                            <a class="dropdown-item unread mdc-ripple-upgraded" href="#!">
                                <i class="material-icons leading-icon">assessment</i>
                                <div class="dropdown-item-content me-2">
                                    <div class="dropdown-item-content-text">Your March performance report is ready to view.</div>
                                    <div class="dropdown-item-content-subtext">Mar 12, 2021 · Performance</div>
                                </div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider my-0"></li>

                    </ul>
                </div>

                <div class="dropdown">
                    <button class="btn btn-lg btn-icon dropdown-toggle mdc-ripple-upgraded" id="dropdownMenuProfile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="dropdownMenuProfile">

						            <li>
                            <a class="dropdown-item loadeffect mdc-ripple-upgraded loading_effect" href="./account-profile?id=<?=$_SESSION['user_id']?>">
                                <svg class="me-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <div class="me-3"><?=T::profile?></div>
                            </a>
                        </li>
                        <?php if($_SESSION['user_type'] == 'admin'){ ?>
                          <li>
                            <a class="dropdown-item loadeffect mdc-ripple-upgraded loading_effect" href="./settings">
                                <svg class="me-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                <div class="me-3"><?=T::settings?></div>
                            </a>
                        </li>
                        <?php } ?>
                         <li>
                            <a class="dropdown-item mdc-ripple-upgraded" href="./help" target="_blank">
                                <svg class="me-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                <div class="me-3"><?=T::help?></div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item loadeffect mdc-ripple-upgraded loading_effect" href="<?=root?>logout">
                                <svg class="me-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 3H6a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h4M16 17l5-5-5-5M19.8 12H9"/></svg>
                                <div class="me-3"><?=T::logout?></div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</nav>

<div id="layoutDrawer">
    <!-- Layout navigation-->
    <div id="layoutDrawer_nav" class="user_account_not_logged">
        <!-- Drawer navigation-->
        <nav class="drawer accordion drawer-light bg-white" id="drawerAccordion">
            <div class="drawer-menu">
                <div class="nav">
                    <!-- Drawer section heading (Account)-->
                    <div class="drawer-menu-heading d-sm-none">Account</div>
                    <!-- Drawer link (Notifications)-->
                    <a class="nav-link d-sm-none mdc-ripple-upgraded" href="#!">
                        <div class="nav-link-icon"><i class="material-icons">notifications</i></div>
                        Notifications
                    </a>
                    <!-- Drawer link (Messages)-->
                    <a class="nav-link d-sm-none mdc-ripple-upgraded" href="#!">
                        <div class="nav-link-icon"><i class="material-icons">mail</i></div>
                        Messages
                    </a>

                    <!-- Divider-->
                    <div class="drawer-menu-divider d-sm-none"></div>
                    <!-- Drawer section heading (Interface)-->
                    <div class="drawer-menu-heading">Menu</div>
                    <!-- Drawer link (Dashboard)-->
                    <a class="nav-link mdc-ripple-upgraded loading_effect <?php if (end($url) == "dashboard") {echo "active";} ?>" href="./dashboard">
                        <!-- <div class="nav-link-icon"><i class="material-icons">laptop</i></div> -->

                        <div class="nav-link-icon">
                            <svg opacity="0.8" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                        </div>
                        <?=T::dashboard?>
                    </a>

                    <?php if($_SESSION['user_type'] == 'agency'){ ?>
                    <a class="nav-link collapsed mdc-ripple-upgraded <?php if (end($url) == "settings" || end($url) == "modules" || end($url) == "currencies" || end($url) == "payment-gateways" || end($url) == "email-settings" ) {echo "active mdc-ripple-upgraded--background-focused";} ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                        <div class="nav-link-icon">
                        <svg opacity="0.8" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        </div>
                        <?=T::settings?>
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>
                    <!-- Nested drawer nav (Products Menu)-->
                    <div class="collapse <?php if (end($url) == "settings" || end($url) == "modules" || end($url) == "settings-module" || end($url) == "currencies" || end($url) == "payment-gateways" || end($url) == "email-settings" ) {echo "show";} ?>" id="collapseDashboards" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                        <nav class="drawer-menu-nested nav">
                            <a class="nav-link mdc-ripple-upgraded loading_effect <?php if (end($url) == "settings") {echo "active";} ?>" href="./settings"><?=T::generalsettings?></a>
                            <a class="nav-link mdc-ripple-upgraded loading_effect <?php if (end($url) == "modules" || end($url) == "settings-module") {echo "active";} ?>" href="./modules"><?=T::modules?></a>
                            <a class="nav-link mdc-ripple-upgraded loading_effect <?php if (end($url) == "currencies") {echo "active";} ?>" href="./currencies"><?=T::currencies?></a>
                            <a class="nav-link mdc-ripple-upgraded loading_effect <?php if (end($url) == "payment-gateways") {echo "active";} ?>" href="./payment-gateways"><?=T::paymentgateways?></a>
                            <a class="nav-link mdc-ripple-upgraded loading_effect <?php if (end($url) == "email-settings") {echo "active";} ?>" href="./email-settings"><?=T::emailsettings?></a>
                        </nav>
                    </div>
                    <!-- Drawer link (Contacts)-->
                    <a class="nav-link collapsed mdc-ripple-upgraded" href="./contacts">

                        <div class="nav-link-icon">
                            <svg width="18" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="nav-inactive-icon"><g opacity="0.8"><g clip-path="url(#clip0)"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.69 12.2V13.43C11.6913 13.5083 11.677 13.5861 11.6479 13.6588C11.6189 13.7316 11.5756 13.7978 11.5207 13.8537C11.4658 13.9095 11.4003 13.9538 11.3281 13.9841C11.2559 14.0144 11.1783 14.03 11.1 14.03C10.9408 14.03 10.7882 13.9668 10.6757 13.8542C10.5632 13.7417 10.5 13.5891 10.5 13.43V12.2C10.5 11.7014 10.3019 11.2232 9.94931 10.8706C9.59674 10.5181 9.11857 10.32 8.61996 10.32H3.66995C3.17308 10.3226 2.69748 10.5218 2.34708 10.8741C1.99667 11.2264 1.79995 11.7031 1.79996 12.2V13.43C1.79996 13.5891 1.73676 13.7417 1.62424 13.8542C1.51172 13.9668 1.35908 14.03 1.19995 14.03C1.04082 14.03 0.888218 13.9668 0.775696 13.8542C0.663174 13.7417 0.599976 13.5891 0.599976 13.43V12.2C0.599976 11.3858 0.923409 10.6049 1.49915 10.0292C2.07488 9.45342 2.85574 9.12996 3.66995 9.12996H8.61996C9.02349 9.12864 9.42329 9.20716 9.79636 9.36098C10.1694 9.51479 10.5084 9.74086 10.7937 10.0262C11.0791 10.3115 11.3051 10.6505 11.459 11.0236C11.6128 11.3966 11.6913 11.7964 11.69 12.2Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M6.11993 1.70001C5.51274 1.70001 4.91919 1.88007 4.41433 2.21741C3.90948 2.55474 3.51599 3.03422 3.28363 3.59518C3.05127 4.15615 2.99046 4.77341 3.10891 5.36893C3.22737 5.96445 3.51978 6.51148 3.94912 6.94083C4.37847 7.37017 4.92547 7.66258 5.52099 7.78104C6.11651 7.89949 6.7338 7.83868 7.29477 7.60632C7.85574 7.37396 8.33521 6.98048 8.67254 6.47562C9.00988 5.97076 9.18994 5.37721 9.18994 4.77002C9.1873 3.95662 8.863 3.17728 8.28784 2.60211C7.71267 2.02695 6.93333 1.70265 6.11993 1.70001ZM6.11993 6.65002C5.7481 6.65002 5.38463 6.53977 5.07547 6.33319C4.7663 6.12661 4.52532 5.833 4.38302 5.48947C4.24073 5.14595 4.20352 4.76794 4.27606 4.40326C4.3486 4.03857 4.52766 3.70357 4.79059 3.44064C5.05351 3.17772 5.38849 2.99869 5.75317 2.92615C6.11786 2.85361 6.49586 2.89082 6.83938 3.03311C7.18291 3.1754 7.47653 3.41639 7.6831 3.72556C7.88968 4.03472 7.99994 4.39819 7.99994 4.77002C7.99994 5.26863 7.80184 5.7468 7.44928 6.09937C7.09671 6.45193 6.61854 6.65002 6.11993 6.65002Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.4 12.2V13.43C15.4013 13.5083 15.387 13.5861 15.358 13.6588C15.3289 13.7316 15.2857 13.7978 15.2307 13.8537C15.1758 13.9095 15.1103 13.9538 15.0381 13.9841C14.9658 14.0144 14.8883 14.03 14.81 14.03C14.6508 14.03 14.4982 13.9668 14.3857 13.8542C14.2732 13.7417 14.21 13.5891 14.21 13.43V12.2C14.2116 11.7828 14.0737 11.377 13.8182 11.0473C13.5627 10.7175 13.2043 10.4826 12.7999 10.38C12.6463 10.34 12.5147 10.2407 12.4341 10.1038C12.3535 9.967 12.3304 9.80379 12.37 9.64998C12.3904 9.5744 12.4257 9.50363 12.4738 9.44182C12.5218 9.38001 12.5817 9.32839 12.65 9.28996C12.7395 9.23337 12.8441 9.20547 12.9499 9.20998C12.9995 9.20027 13.0504 9.20027 13.1 9.20998C13.7623 9.37977 14.3486 9.76646 14.7655 10.3084C15.1824 10.8503 15.4057 11.5163 15.4 12.2Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M12.93 4.78002C12.9357 5.46632 12.7113 6.13472 12.2925 6.67851C11.8738 7.22231 11.285 7.61013 10.62 7.78002C10.5447 7.80023 10.4662 7.80533 10.389 7.79503C10.3118 7.78473 10.2373 7.75921 10.17 7.71999C10.0353 7.63641 9.9385 7.50372 9.89998 7.34999C9.87977 7.27474 9.87467 7.19624 9.88497 7.119C9.89527 7.04177 9.92076 6.96734 9.95998 6.90001C10.0443 6.76608 10.1767 6.66946 10.33 6.62999C10.7333 6.52559 11.0905 6.29019 11.3454 5.96077C11.6004 5.63135 11.7388 5.2266 11.7388 4.81001C11.7388 4.39343 11.6004 3.98865 11.3454 3.65923C11.0905 3.32981 10.7333 3.09441 10.33 2.99001C10.176 2.94624 10.0439 2.84634 9.95998 2.71001C9.92023 2.64289 9.89442 2.56843 9.88411 2.49111C9.8738 2.41378 9.87921 2.33518 9.89998 2.26C9.91867 2.18428 9.95219 2.11302 9.99858 2.05034C10.045 1.98766 10.1033 1.93481 10.1703 1.89482C10.2372 1.85484 10.3115 1.82849 10.3887 1.81737C10.4658 1.80625 10.5445 1.81055 10.62 1.83C11.2767 1.99777 11.8594 2.3781 12.2772 2.91173C12.6951 3.44535 12.9246 4.10228 12.93 4.78002Z" fill="white"></path></g></g><defs><clipPath id="clip0"><rect width="14.8" height="12.33" fill="white" transform="translate(0.599976 1.70001)"></rect></clipPath></defs></svg>
                        </div>

                        Contacts
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>

                    <!-- Drawer link (Products)-->
                    <a class="nav-link collapsed mdc-ripple-upgraded" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseOrders" aria-expanded="false" aria-controls="collapseOrders">
                        <!-- <div class="nav-link-icon"><i class="material-icons">dashboard</i></div> -->

                        <div class="nav-link-icon">
                            <svg width="18" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="nav-inactive-icon"><g opacity="0.8"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.4376 1.58989C11.2893 0.957005 10.7245 0.5 10.0642 0.5H5.93576L5.83102 0.50393L5.72216 0.516339L5.6151 0.537137C4.98221 0.685402 4.52521 1.2503 4.52521 1.91055V2.08258H3.35548L3.23545 2.08574C2.16237 2.14235 1.29126 2.95316 1.29126 3.97478V13.6078L1.29481 13.7204C1.35842 14.7257 2.26836 15.5 3.35548 15.5H12.6445L12.7645 15.4969C13.8376 15.4402 14.7087 14.6294 14.7087 13.6078V3.97478L14.7051 3.86216C14.6415 2.8569 13.7316 2.08258 12.6445 2.08258H11.4748V1.91055L11.4708 1.80581L11.4584 1.69695L11.4376 1.58989ZM11.4748 3.11469V3.2867C11.4748 3.94695 11.0177 4.51185 10.3849 4.66011L10.2778 4.68091L10.1689 4.69332L10.0642 4.69725H5.93576C5.27551 4.69725 4.71061 4.24024 4.56234 3.60736L4.54155 3.50029L4.52914 3.39144L4.52521 3.2867V3.11469H3.35548C2.80708 3.11469 2.37671 3.46857 2.32797 3.89421L2.32337 3.97478V13.6078C2.32337 14.0413 2.72149 14.4207 3.2541 14.4638L3.35548 14.4679H12.6445C13.1929 14.4679 13.6232 14.114 13.672 13.6884L13.6766 13.6078V3.97478C13.6766 3.54129 13.2785 3.1619 12.7459 3.11877L12.6445 3.11469H11.4748ZM6.14196 1.29128H9.85799C10.2156 1.29128 10.5272 1.52067 10.6402 1.85491L10.6643 1.94058L10.6788 2.0289L10.6837 2.117L10.6832 3.09366L10.676 3.19145L10.659 3.28068L10.6295 3.37519C10.5425 3.6029 10.3586 3.77954 10.127 3.86008L10.038 3.88569L9.94496 3.90122L9.85799 3.90596L6.12858 3.90553L6.03079 3.89833L5.94156 3.88132L5.84705 3.85175C5.61934 3.76474 5.4427 3.58083 5.36216 3.34925L5.33655 3.26026L5.32102 3.16724L5.31628 3.08025L5.31671 2.10359L5.32391 2.0058L5.34092 1.91657L5.37049 1.82206C5.4575 1.59435 5.64141 1.41771 5.87299 1.33717L5.96198 1.31156L6.055 1.29603L6.14196 1.29128Z" fill="white"></path><path d="M4.37032 8.47675C4.7505 8.47675 5.0587 8.16856 5.0587 7.78838C5.0587 7.4082 4.7505 7.1 4.37032 7.1C3.99014 7.1 3.68195 7.4082 3.68195 7.78838C3.68195 8.16856 3.99014 8.47675 4.37032 8.47675Z" fill="white"></path><path d="M6.43548 7.1588C6.08986 7.1588 5.80968 7.43898 5.80968 7.7846C5.80968 8.13021 6.08986 8.41039 6.43548 8.41039H11.6922C12.0378 8.41039 12.318 8.13021 12.318 7.7846C12.318 7.43898 12.0378 7.1588 11.6922 7.1588H6.43548Z" fill="white"></path><path d="M5.80971 11.3217C5.80971 10.9761 6.08988 10.696 6.4355 10.696H11.6922C12.0378 10.696 12.318 10.9761 12.318 11.3217C12.318 11.6674 12.0378 11.9475 11.6922 11.9475H6.4355C6.08988 11.9475 5.80971 11.6674 5.80971 11.3217Z" fill="white"></path><path d="M4.37035 12.0139C4.75053 12.0139 5.05873 11.7057 5.05873 11.3255C5.05873 10.9453 4.75053 10.6371 4.37035 10.6371C3.99017 10.6371 3.68197 10.9453 3.68197 11.3255C3.68197 11.7057 3.99017 12.0139 4.37035 12.0139Z" fill="white"></path></g></svg>
                        </div>

                        Orders
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>
                    <!-- Nested drawer nav (Products Menu)-->
                    <div class="collapse" id="collapseOrders" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                        <nav class="drawer-menu-nested nav">
                            <a class="nav-link mdc-ripple-upgraded" href="./orders">All Orders</a>
                            <a class="nav-link mdc-ripple-upgraded" href="./orders-completed">Completed Orders</a>
                            <a class="nav-link mdc-ripple-upgraded" href="./orders-pending">Pending Orders</a>
                        </nav>
                    </div>

                    <!-- Divider-->
                    <div class="drawer-menu-divider"></div>

                    <div class="drawer-menu-heading">Management</div>

                    <a class="nav-link collapsed mdc-ripple-upgraded" href="./deliveries" >
                        <div class="nav-link-icon">
                            <svg width="18" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="nav-inactive-icon"><g opacity="0.8"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.72998 2.50001C0.72998 2.19626 0.976224 1.95001 1.27998 1.95001H10.4441C10.7479 1.95001 10.9941 2.19626 10.9941 2.50001V10.4423C10.9941 10.746 10.7479 10.9923 10.4441 10.9923H1.27998C0.976224 10.9923 0.72998 10.746 0.72998 10.4423V2.50001ZM1.82998 3.05001V9.89228H9.89414V3.05001H1.82998Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.89413 5.55476C9.89413 5.251 10.1404 5.00476 10.4441 5.00476H12.8879C13.0338 5.00476 13.1737 5.0627 13.2768 5.16585L15.1097 6.99868C15.2128 7.10182 15.2707 7.24172 15.2707 7.38759V10.4423C15.2707 10.7461 15.0245 10.9923 14.7207 10.9923L10.4441 10.9923C10.1404 10.9923 9.89413 10.7461 9.89413 10.4423V5.55476ZM10.9941 6.10476V9.89231H14.1707V7.6154L12.6601 6.10476H10.9941Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M4.02919 10.9923C3.48941 10.9923 3.05183 11.4299 3.05183 11.9696C3.05183 12.5094 3.48941 12.947 4.02919 12.947C4.56897 12.947 5.00655 12.5094 5.00655 11.9696C5.00655 11.4299 4.56897 10.9923 4.02919 10.9923ZM1.95183 11.9696C1.95183 10.8223 2.8819 9.89228 4.02919 9.89228C5.17649 9.89228 6.10655 10.8223 6.10655 11.9696C6.10655 13.1169 5.17649 14.047 4.02919 14.047C2.8819 14.047 1.95183 13.1169 1.95183 11.9696Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9715 10.9923C11.4317 10.9923 10.9941 11.4299 10.9941 11.9696C10.9941 12.5094 11.4317 12.947 11.9715 12.947C12.5113 12.947 12.9489 12.5094 12.9489 11.9696C12.9489 11.4299 12.5113 10.9923 11.9715 10.9923ZM9.89413 11.9696C9.89413 10.8223 10.8242 9.89228 11.9715 9.89228C13.1188 9.89228 14.0489 10.8223 14.0489 11.9696C14.0489 13.1169 13.1188 14.047 11.9715 14.047C10.8242 14.047 9.89413 13.1169 9.89413 11.9696Z" fill="white"></path></g></svg>
                        </div>
                        Delivery
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>

                    <a class="nav-link collapsed mdc-ripple-upgraded" href="./discounts" >
                        <div class="nav-link-icon">
                            <svg width="18" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="nav-inactive-icon"><g opacity="0.8"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.27 9.42999L14.72 8.20999C14.6732 8.11339 14.6493 8.00733 14.65 7.89999C14.6469 7.79242 14.671 7.6858 14.72 7.59L15.25 6.38998C15.3622 6.15234 15.4204 5.89278 15.4204 5.62997C15.4204 5.36717 15.3622 5.10764 15.25 4.87C15.1491 4.63436 14.9991 4.42298 14.81 4.25C14.6215 4.08035 14.4003 3.95103 14.16 3.87L12.93 3.40997C12.8286 3.36905 12.7367 3.3078 12.66 3.22998C12.5864 3.15559 12.5287 3.06719 12.49 2.97L12.02 1.72998C11.9258 1.48905 11.7844 1.2694 11.6041 1.08392C11.4238 0.89845 11.2082 0.750916 10.97 0.649994C10.7289 0.550941 10.4707 0.499991 10.21 0.5C9.95135 0.507616 9.69664 0.565333 9.45999 0.669983L8.25998 1.22C8.06107 1.30009 7.83889 1.30009 7.63998 1.22L6.43997 0.669983C6.20135 0.567927 5.94453 0.51532 5.685 0.51532C5.42546 0.51532 5.16862 0.567927 4.92999 0.669983C4.68836 0.770505 4.47036 0.920371 4.28998 1.10999C4.10072 1.29054 3.95683 1.51325 3.87 1.75998L3.40997 3C3.37131 3.09719 3.31352 3.18559 3.23999 3.25998C3.16323 3.33779 3.07135 3.39908 2.97 3.44L1.72998 3.89999C1.48802 3.99171 1.26698 4.13114 1.07999 4.31C0.892351 4.48997 0.745698 4.70824 0.649994 4.94998C0.550941 5.19112 0.499991 5.4493 0.5 5.70999C0.50632 5.97202 0.564064 6.23025 0.669983 6.47L1.22 7.66998C1.30009 7.86889 1.30009 8.09107 1.22 8.28998L0.669983 9.48999C0.56279 9.7254 0.508186 9.98133 0.509979 10.24C0.508008 10.5019 0.562588 10.7611 0.669983 11C0.770447 11.2327 0.918423 11.4418 1.1044 11.614C1.29038 11.7862 1.51027 11.9177 1.75 12L2.98999 12.47C3.09157 12.5058 3.18383 12.5639 3.25998 12.64C3.33613 12.7162 3.39423 12.8084 3.42999 12.91L3.88998 14.14C4.02855 14.5003 4.2725 14.8104 4.59 15.03C4.85811 15.2223 5.1723 15.3402 5.50073 15.3719C5.82916 15.4035 6.16012 15.3476 6.45999 15.21L7.65997 14.66C7.7562 14.6121 7.86255 14.5881 7.97 14.59C8.07823 14.5916 8.18451 14.619 8.28 14.67L9.47998 15.2C9.71768 15.3056 9.97489 15.3601 10.235 15.3601C10.4951 15.3601 10.7523 15.3056 10.99 15.2C11.2316 15.0995 11.4496 14.9496 11.63 14.76C11.8109 14.5746 11.9506 14.3531 12.04 14.11L12.51 12.88C12.5457 12.7784 12.6038 12.6861 12.68 12.61C12.7561 12.5338 12.8484 12.4758 12.95 12.44L14.18 11.97C14.4195 11.8826 14.6402 11.7502 14.83 11.58C15.0189 11.4107 15.169 11.2027 15.27 10.97C15.3774 10.7311 15.432 10.4719 15.43 10.21C15.4377 9.94112 15.3829 9.67413 15.27 9.42999V9.42999ZM13.68 8.69L14.17 9.84998C14.2077 9.9426 14.2313 10.0404 14.24 10.14C14.2403 10.243 14.2199 10.345 14.18 10.44C14.1387 10.5328 14.0811 10.6175 14.01 10.69C13.9334 10.7582 13.8454 10.8124 13.75 10.85L12.58 11.3C12.3218 11.3861 12.0885 11.5337 11.9 11.73C11.7069 11.9211 11.5599 12.1536 11.47 12.41L11 13.64C10.9258 13.8344 10.7787 13.9922 10.59 14.08C10.3962 14.1503 10.1838 14.1503 9.98999 14.08L8.78998 13.53C8.54169 13.4179 8.27242 13.3599 8 13.3599C7.72758 13.3599 7.45828 13.4179 7.20999 13.53L6.00998 14.08C5.91158 14.1201 5.80625 14.1405 5.69998 14.14C5.60127 14.1388 5.50337 14.1219 5.40997 14.09C5.22173 14.0034 5.07216 13.8502 4.98999 13.66L4.53 12.42C4.43891 12.1642 4.29202 11.9319 4.10004 11.7399C3.90805 11.5479 3.67576 11.4011 3.41998 11.31L2.17999 10.84C2.08457 10.8024 1.99654 10.7482 1.91998 10.68C1.84883 10.6075 1.79127 10.5228 1.75 10.43C1.71014 10.335 1.6897 10.233 1.68997 10.13C1.69867 10.0304 1.72228 9.93262 1.75998 9.84L2.31 8.63998C2.42209 8.3917 2.48004 8.12239 2.48004 7.84998C2.48004 7.57756 2.42209 7.30828 2.31 7.06L1.75998 5.85999C1.68969 5.66616 1.68969 5.4538 1.75998 5.25998C1.80792 5.16007 1.87213 5.06884 1.94998 4.98999C2.03492 4.91772 2.13356 4.8633 2.23999 4.82999L3.47998 4.37C3.73634 4.28012 3.96887 4.13308 4.15997 3.94C4.33988 3.7557 4.4825 3.53837 4.57999 3.29999L5.03998 2.06C5.11876 1.86752 5.26942 1.71326 5.45999 1.62997C5.55563 1.61002 5.65436 1.61002 5.75 1.62997C5.85627 1.62945 5.9616 1.64986 6.06 1.69L7.25998 2.23999C7.50827 2.35208 7.77757 2.41003 8.04999 2.41003C8.3224 2.41003 8.59171 2.35208 8.84 2.23999L10.04 1.69C10.1324 1.64706 10.2331 1.62479 10.335 1.62479C10.4369 1.62479 10.5376 1.64706 10.63 1.69C10.7241 1.72886 10.8092 1.78672 10.88 1.85999C10.9538 1.93222 11.0088 2.02152 11.04 2.12L11.51 3.35999C11.6023 3.61517 11.749 3.8472 11.94 4.03998C12.1311 4.23305 12.3636 4.38012 12.62 4.47L13.86 4.92999C14.0525 5.00878 14.2067 5.1594 14.29 5.34998C14.3603 5.5438 14.3603 5.75616 14.29 5.94998L13.74 7.14999C13.6221 7.3936 13.5573 7.65947 13.55 7.92999C13.5376 8.18976 13.582 8.44912 13.68 8.69V8.69Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.86001 8.66999C9.71535 8.66942 9.57198 8.69739 9.43814 8.7523C9.30429 8.80721 9.1826 8.88799 9.08002 8.99C8.9268 9.14408 8.82264 9.34008 8.7807 9.55329C8.73876 9.7665 8.76089 9.98736 8.84433 10.188C8.92777 10.3886 9.06878 10.5601 9.24954 10.6807C9.4303 10.8013 9.64272 10.8656 9.86001 10.8656C10.0773 10.8656 10.2897 10.8013 10.4705 10.6807C10.6512 10.5601 10.7923 10.3886 10.8757 10.188C10.9591 9.98736 10.9813 9.7665 10.9393 9.55329C10.8974 9.34008 10.7932 9.14408 10.64 8.99C10.5374 8.88799 10.4157 8.80721 10.2819 8.7523C10.148 8.69739 10.0047 8.66942 9.86001 8.66999V8.66999Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M10.43 5.29999C10.4059 5.15335 10.3273 5.02122 10.21 4.92999C10.1138 4.85222 9.99373 4.80986 9.86999 4.81H9.78C9.70526 4.81972 9.63319 4.84416 9.56796 4.88193C9.50273 4.91969 9.44564 4.97003 9.39999 5.03L5.64999 10.03C5.60685 10.0913 5.57314 10.1587 5.54998 10.23C5.53998 10.303 5.53998 10.377 5.54998 10.45C5.56002 10.5252 5.5874 10.5971 5.62997 10.66C5.66891 10.7255 5.71981 10.7832 5.78 10.83C5.87953 10.9003 5.99812 10.9387 6.11999 10.94C6.21014 10.9405 6.29915 10.9199 6.37997 10.88C6.45938 10.8403 6.52801 10.782 6.57998 10.71L10.33 5.70999C10.4155 5.5916 10.4514 5.44447 10.43 5.29999V5.29999Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M6.89005 6.79999C7.09524 6.59223 7.2103 6.31199 7.2103 6.01999C7.2103 5.72799 7.09524 5.44775 6.89005 5.23999C6.68229 5.0348 6.40205 4.91974 6.11005 4.91974C5.81804 4.91974 5.5378 5.0348 5.33005 5.23999C5.12318 5.44686 5.00696 5.72743 5.00696 6.01999C5.00696 6.31255 5.12318 6.59312 5.33005 6.79999C5.53692 7.00686 5.81749 7.12308 6.11005 7.12308C6.4026 7.12308 6.68318 7.00686 6.89005 6.79999V6.79999Z" fill="white"></path></g></svg>
                        </div>
                        Discounts
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>

                    <a class="nav-link collapsed mdc-ripple-upgraded" href="./payments" >
                        <div class="nav-link-icon">
                            <svg width="18" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="nav-inactive-icon"><g opacity="0.8"><path d="M4.18182 5.6H14.8182C15.1677 5.6 15.4 5.86257 15.4 6.125V12.875C15.4 13.1374 15.1677 13.4 14.8182 13.4H4.18182C3.83229 13.4 3.6 13.1374 3.6 12.875V6.125C3.6 5.86257 3.83229 5.6 4.18182 5.6Z" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.5 11.5C10.6046 11.5 11.5 10.6046 11.5 9.5C11.5 8.39543 10.6046 7.5 9.5 7.5C8.39543 7.5 7.5 8.39543 7.5 9.5C7.5 10.6046 8.39543 11.5 9.5 11.5Z" fill="white"></path><path d="M4 5.4C3.66863 5.4 3.4 5.66863 3.4 6V10.4H1.18182C0.762625 10.4 0.6 10.1309 0.6 10V3C0.6 2.86913 0.762626 2.6 1.18182 2.6H11.8182C12.2374 2.6 12.4 2.86913 12.4 3L12.4 5.4H4Z" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                         </div>
                        Payments
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>

                    <a class="nav-link collapsed mdc-ripple-upgraded" href="./reports" >
                        <div class="nav-link-icon">
                            <svg opacity="0.8" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/><path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/></svg>
                         </div>
                        Reports
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>

                     <a class="nav-link collapsed mdc-ripple-upgraded loading_effect" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapSettings" aria-expanded="false" aria-controls="collapSettings">
                        <div class="nav-link-icon">
                            <svg opacity="0.8" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        </div>
                        Settings
                        <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                    </a>

                    <!-- Nested drawer nav (Content)-->
                    <div class="collapse" id="collapSettings" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                        <nav class="drawer-menu-nested nav">
                            <a class="nav-link mdc-ripple-upgraded" href="./settings">General Settings</a>
                            <a class="nav-link mdc-ripple-upgraded" href="./domains">Domains</a>
                        </nav>
                    </div>

                    <!-- Divider-->
                    <div class="drawer-menu-divider"></div>
                    <!-- Drawer section heading (Plugins)-->
                    <div class="drawer-menu-heading">Marketing</div>
                    <!-- Drawer link (Charts)-->
                    <a class="nav-link mdc-ripple-upgraded" href="plugins-charts.html">
                        <div class="nav-link-icon"><i class="material-icons">bar_chart</i></div>
                        Charts
                    </a>
                    <!-- Drawer link (Code Blocks)-->
                    <a class="nav-link mdc-ripple-upgraded" href="plugins-code-blocks.html">
                        <div class="nav-link-icon"><i class="material-icons">code</i></div>
                        Code Blocks
                    </a>
                    <!-- Drawer link (Data Tables)-->
                    <a class="nav-link active mdc-ripple-upgraded" href="plugins-data-tables.html">
                        <div class="nav-link-icon"><i class="material-icons">filter_alt</i></div>
                        Data Tables
                    </a>
                    <!-- Drawer link (Date Picker)-->
                    <a class="nav-link mdc-ripple-upgraded" href="plugins-date-picker.html">
                        <div class="nav-link-icon"><i class="material-icons">date_range</i></div>
                        Date Picker
                    </a>

                    <?php } ?>

                </div>
            </div>

            <!-- Drawer footer -->
            <div class="drawer-footer">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/><circle cx="12" cy="10" r="3"/><circle cx="12" cy="12" r="10"/></svg>
                    <div class="ms-3">
                        <div class="caption">Logged in as:</div>
                        <div class="small fw-500" style="text-transform:capitalize"><?=$_SESSION['user_type']?></div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Layout content-->
    <div id="layoutDrawer_content">
        <!-- Main page content-->
        <main>

            <div class="container-xl" id="content">