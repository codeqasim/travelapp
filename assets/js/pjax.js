
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