

!function(c,D,rt){"use strict";function h(r){return function(){var t,e=arguments[0];for(t="["+(r?r+":":"")+e+"] http://errors.angularjs.org/1.5.3/"+(r?r+"/":"")+e,e=1;e<arguments.length;e++){var n;t=t+(1==e?"?":"&")+"p"+(e-1)+"=",t+=encodeURIComponent(n="function"==typeof(n=arguments[e])?n.toString().replace(/ \{[\s\S]*$/,""):void 0===n?"undefined":"string"!=typeof n?JSON.stringify(n):n)}return Error(t)}}function O(t){if(null==t||l(t))return!1;if(Hn(t)||ut(t)||Mn&&t instanceof Mn)return!0;var e="length"in Object(t)&&t.length;return y(e)&&(0<=e&&(e-1 in t||t instanceof Array)||"function"==typeof t.item)}function it(t,e,n){var r,i;if(t)if(ct(t))for(r in t)"prototype"==r||"length"==r||"name"==r||t.hasOwnProperty&&!t.hasOwnProperty(r)||e.call(n,t[r],r,t);else if(Hn(t)||O(t)){var o="object"!=typeof t;for(r=0,i=t.length;r<i;r++)(o||r in t)&&e.call(n,t[r],r,t)}else if(t.forEach&&t.forEach!==it)t.forEach(e,n,t);else if(s(t))for(r in t)e.call(n,t[r],r,t);else if("function"==typeof t.hasOwnProperty)for(r in t)t.hasOwnProperty(r)&&e.call(n,t[r],r,t);else for(r in t)jn.call(t,r)&&e.call(n,t[r],r,t);return t}function o(t,e,n){for(var r=Object.keys(t).sort(),i=0;i<r.length;i++)e.call(n,t[r[i]],r[i]);return r}function v(n){return function(t,e){n(e,t)}}function p(t,e,n){for(var r=t.$$hashKey,i=0,o=e.length;i<o;++i){var a=e[i];if(st(a)||ct(a))for(var s=Object.keys(a),u=0,c=s.length;u<c;u++){var l=s[u],f=a[l];n&&st(f)?g(f)?t[l]=new Date(f.valueOf()):d(f)?t[l]=new RegExp(f):f.nodeName?t[l]=f.cloneNode(!0):m(f)?t[l]=f.clone():(st(t[l])||(t[l]=Hn(f)?[]:{}),p(t[l],[f],!0)):t[l]=f}}return r?t.$$hashKey=r:delete t.$$hashKey,t}function ot(t){return p(t,In.call(arguments,1),!1)}function t(t){return p(t,In.call(arguments,1),!0)}function $(t){return parseInt(t,10)}function P(t,e){return ot(Object.create(t),e)}function I(){}function R(t){return t}function S(t){return function(){return t}}function u(t){return ct(t.toString)&&t.toString!==Un}function at(t){return void 0===t}function C(t){return void 0!==t}function st(t){return null!==t&&"object"==typeof t}function s(t){return null!==t&&"object"==typeof t&&!qn(t)}function ut(t){return"string"==typeof t}function y(t){return"number"==typeof t}function g(t){return"[object Date]"===Un.call(t)}function ct(t){return"function"==typeof t}function d(t){return"[object RegExp]"===Un.call(t)}function l(t){return t&&t.window===t}function lt(t){return t&&t.$evalAsync&&t.$watch}function ft(t){return"boolean"==typeof t}function m(t){return!(!t||!(t.nodeName||t.prop&&t.attr&&t.find))}function ht(t){return Dn(t.nodeName||t[0]&&t[0].nodeName)}function pt(t,e){var n=t.indexOf(e);return 0<=n&&t.splice(n,1),n}function E(t,n){function r(t,e){var n,r=e.$$hashKey;if(Hn(t)){n=0;for(var i=t.length;n<i;n++)e.push(o(t[n]))}else if(s(t))for(n in t)e[n]=o(t[n]);else if(t&&"function"==typeof t.hasOwnProperty)for(n in t)t.hasOwnProperty(n)&&(e[n]=o(t[n]));else for(n in t)jn.call(t,n)&&(e[n]=o(t[n]));return r?e.$$hashKey=r:delete e.$$hashKey,e}function o(t){if(!st(t))return t;if(-1!==(e=i.indexOf(t)))return a[e];if(l(t)||lt(t))throw _n("cpws");var e=!1,n=function(t){switch(Un.call(t)){case"[object Int8Array]":case"[object Int16Array]":case"[object Int32Array]":case"[object Float32Array]":case"[object Float64Array]":case"[object Uint8Array]":case"[object Uint8ClampedArray]":case"[object Uint16Array]":case"[object Uint32Array]":return new t.constructor(o(t.buffer));case"[object ArrayBuffer]":if(t.slice)return t.slice(0);var e=new ArrayBuffer(t.byteLength);return new Uint8Array(e).set(new Uint8Array(t)),e;case"[object Boolean]":case"[object Number]":case"[object String]":case"[object Date]":return new t.constructor(t.valueOf());case"[object RegExp]":return(e=new RegExp(t.source,t.toString().match(/[^\/]*$/)[0])).lastIndex=t.lastIndex,e;case"[object Blob]":return new t.constructor([t],{type:t.type})}if(ct(t.cloneNode))return t.cloneNode(!0)}(t);return n===rt&&(n=Hn(t)?[]:Object.create(qn(t)),e=!0),i.push(t),a.push(n),e?r(t,n):n}var e,i=[],a=[];if(n){if((e=n)&&y(e.length)&&zn.test(Un.call(e))||"[object ArrayBuffer]"===Un.call(n))throw _n("cpta");if(t===n)throw _n("cpi");return Hn(n)?n.length=0:it(n,function(t,e){"$$hashKey"!==e&&delete n[e]}),i.push(t),a.push(n),r(t,n)}return o(t)}function w(t,e){if(Hn(t)){e=e||[];for(var n=0,r=t.length;n<r;n++)e[n]=t[n]}else if(st(t))for(n in e=e||{},t)"$"===n.charAt(0)&&"$"===n.charAt(1)||(e[n]=t[n]);return e||t}function $t(t,e){if(t===e)return!0;if(null===t||null===e)return!1;if(t!=t&&e!=e)return!0;var n,r=typeof t;if(r==typeof e&&"object"==r){if(!Hn(t)){if(g(t))return!!g(e)&&$t(t.getTime(),e.getTime());if(d(t))return!!d(e)&&t.toString()==e.toString();if(lt(t)||lt(e)||l(t)||l(e)||Hn(e)||g(e)||d(e))return!1;for(n in r=gt(),t)if("$"!==n.charAt(0)&&!ct(t[n])){if(!$t(t[n],e[n]))return!1;r[n]=!0}for(n in e)if(!(n in r)&&"$"!==n.charAt(0)&&C(e[n])&&!ct(e[n]))return!1;return!0}if(!Hn(e))return!1;if((r=t.length)==e.length){for(n=0;n<r;n++)if(!$t(t[n],e[n]))return!1;return!0}}return!1}function k(t,e,n){return t.concat(In.call(e,n))}function f(t,e){var n=2<arguments.length?In.call(arguments,2):[];return!ct(e)||e instanceof RegExp?e:n.length?function(){return arguments.length?e.apply(t,k(n,arguments,0)):e.apply(t,n)}:function(){return arguments.length?e.apply(t,arguments):e.call(t)}}function n(t,e){var n=e;return"string"==typeof t&&"$"===t.charAt(0)&&"$"===t.charAt(1)?n=rt:l(e)?n="$WINDOW":e&&D===e?n="$DOCUMENT":lt(e)&&(n="$SCOPE"),n}function A(t,e){return at(t)?rt:(y(e)||(e=e?2:null),JSON.stringify(t,n,e))}function i(t){return ut(t)?JSON.parse(t):t}function b(t,e){t=t.replace(Yn,"");var n=Date.parse("Jan 01, 1970 00:00:00 "+t)/6e4;return isNaN(n)?e:n}function x(t,e,n){n=n?-1:1;var r=t.getTimezoneOffset();return n*=(e=b(e,r))-r,(t=new Date(t.getTime())).setMinutes(t.getMinutes()+n),t}function dt(t){t=Mn(t).clone();try{t.empty()}catch(t){}var e=Mn("<div>").append(t).html();try{return t[0].nodeType===tr?Dn(e):e.match(/^(<[^>]+>)/)[1].replace(/^<([\w\-]+)/,function(t,e){return"<"+Dn(e)})}catch(t){return Dn(e)}}function a(t){try{return decodeURIComponent(t)}catch(t){}}function M(t){var i={};return it((t||"").split("&"),function(t){var e,n,r;t&&(n=t=t.replace(/\+/g,"%20"),-1!==(e=t.indexOf("="))&&(n=t.substring(0,e),r=t.substring(e+1)),C(n=a(n))&&(r=!C(r)||a(r),jn.call(i,n)?Hn(i[n])?i[n].push(r):i[n]=[i[n],r]:i[n]=r))}),i}function r(t){var n=[];return it(t,function(t,e){Hn(t)?it(t,function(t){n.push(N(e,!0)+(!0===t?"":"="+N(t,!0)))}):n.push(N(e,!0)+(!0===t?"":"="+N(t,!0)))}),n.length?n.join("&"):""}function T(t){return N(t,!0).replace(/%26/gi,"&").replace(/%3D/gi,"=").replace(/%2B/gi,"+")}function N(t,e){return encodeURIComponent(t).replace(/%40/gi,"@").replace(/%3A/gi,":").replace(/%24/g,"$").replace(/%2C/gi,",").replace(/%3B/gi,";").replace(/%20/g,e?"%20":"+")}function e(n,t){var r,i,e={};it(Zn,function(t){t+="app",!r&&n.hasAttribute&&n.hasAttribute(t)&&(i=(r=n).getAttribute(t))}),it(Zn,function(t){var e;t+="app",!r&&(e=n.querySelector("["+t.replace(":","\\:")+"]"))&&(i=(r=e).getAttribute(t))}),r&&(e.strictDi=null!==function(t,e){var n,r,i=Zn.length;for(r=0;r<i;++r)if(n=Zn[r]+e,ut(n=t.getAttribute(n)))return n;return null}(r,"strict-di"),t(r,i?[i]:[],e))}function V(e,n,r){st(r)||(r={}),r=ot({strictDi:!1},r);var i=function(){if((e=Mn(e)).injector()){var t=e[0]===D?"document":dt(e);throw _n("btstrpd",t.replace(/</,"&lt;").replace(/>/,"&gt;"))}return(n=n||[]).unshift(["$provide",function(t){t.value("$rootElement",e)}]),r.debugInfoEnabled&&n.push(["$compileProvider",function(t){t.debugInfoEnabled(!0)}]),n.unshift("ng"),(t=Nt(n,r.strictDi)).invoke(["$rootScope","$rootElement","$compile","$injector",function(t,e,n,r){t.$apply(function(){e.data("$injector",r),n(e)(t)})}]),t},t=/^NG_ENABLE_DEBUG_INFO!/,o=/^NG_DEFER_BOOTSTRAP!/;if(c&&t.test(c.name)&&(r.debugInfoEnabled=!0,c.name=c.name.replace(t,"")),c&&!o.test(c.name))return i();c.name=c.name.replace(o,""),Ln.resumeBootstrap=function(t){return it(t,function(t){n.push(t)}),i()},ct(Ln.resumeDeferredBootstrap)&&Ln.resumeDeferredBootstrap()}function j(){c.name="NG_ENABLE_DEBUG_INFO!"+c.name,c.location.reload()}function F(t){if(!(t=Ln.element(t).injector()))throw _n("test");return t.get("$$testability")}function mt(t,n){return n=n||"_",t.replace(Xn,function(t,e){return(e?n:"")+t.toLowerCase()})}function vt(t,e,n){if(!t)throw _n("areq",e||"?",n||"required");return t}function U(t,e,n){return n&&Hn(t)&&(t=t[t.length-1]),vt(ct(t),e,"not a function, got "+(t&&"object"==typeof t?t.constructor.name||"Object":typeof t)),t}function q(t,e){if("hasOwnProperty"===t)throw _n("badname",e)}function _(t,e,n){if(!e)return t;for(var r,i=t,o=(e=e.split(".")).length,a=0;a<o;a++)r=e[a],t&&(t=(i=t)[r]);return!n&&ct(t)?f(i,t):t}function L(t){for(var e,n=t[0],r=t[t.length-1],i=1;n!==r&&(n=n.nextSibling);i++)(e||t[i]!==n)&&(e||(e=Mn(In.call(t,0,i))),e.push(n));return e||t}function gt(){return Object.create(null)}function B(t){return t.replace(ir,function(t,e,n,r){return r?n.toUpperCase():n}).replace(or,"Moz$1")}function H(t){return 1===(t=t.nodeType)||!t||9===t}function z(t,e){var n,r,i=e.createDocumentFragment(),o=[];if(cr.test(t)){for(n=n||i.appendChild(e.createElement("div")),r=(lr.exec(t)||["",""])[1].toLowerCase(),r=hr[r]||hr._default,n.innerHTML=r[1]+t.replace(fr,"<$1></$2>")+r[2],r=r[0];r--;)n=n.lastChild;o=k(o,n.childNodes),(n=i.firstChild).textContent=""}else o.push(e.createTextNode(t));return i.textContent="",i.innerHTML="",it(o,function(t){i.appendChild(t)}),i}function yt(t,e){var n=t.parentNode;n&&n.replaceChild(e,t),e.appendChild(t)}function W(t){if(t instanceof W)return t;var e,n;if(ut(t)&&(t=Wn(t),e=!0),!(this instanceof W)){if(e&&"<"!=t.charAt(0))throw sr("nosel");return new W(t)}e&&(e=D,t=(n=ur.exec(t))?[e.createElement(n[1])]:(n=z(t,e))?n.childNodes:[]);et(this,t)}function bt(t){return t.cloneNode(!0)}function G(t,e){if(e||K(t),t.querySelectorAll)for(var n=t.querySelectorAll("*"),r=0,i=n.length;r<i;r++)K(n[r])}function J(n,t,r,e){if(C(e))throw sr("offargs");var i=(e=Y(n))&&e.events,o=e&&e.handle;if(o)if(t){var a=function(t){var e=i[t];C(r)&&pt(e||[],r),C(r)&&e&&0<e.length||(n.removeEventListener(t,o,!1),delete i[t])};it(t.split(" "),function(t){a(t),ar[t]&&a(ar[t])})}else for(t in i)"$destroy"!==t&&n.removeEventListener(t,o,!1),delete i[t]}function K(t,e){var n=t.ng339,r=n&&nr[n];r&&(e?delete r.data[e]:(r.handle&&(r.events.$destroy&&r.handle({},"$destroy"),J(t)),delete nr[n],t.ng339=rt))}function Y(t,e){var n=(n=t.ng339)&&nr[n];return e&&!n&&(t.ng339=n=++rr,n=nr[n]={events:{},data:{},handle:rt}),n}function Z(t,e,n){if(H(t)){var r=C(n),i=!r&&e&&!st(e),o=!e;if(t=(t=Y(t,!i))&&t.data,r)t[e]=n;else{if(o)return t;if(i)return t&&t[e];ot(t,e)}}}function X(t,e){return!!t.getAttribute&&-1<(" "+(t.getAttribute("class")||"")+" ").replace(/[\n\t]/g," ").indexOf(" "+e+" ")}function Q(e,t){t&&e.setAttribute&&it(t.split(" "),function(t){e.setAttribute("class",Wn((" "+(e.getAttribute("class")||"")+" ").replace(/[\n\t]/g," ").replace(" "+Wn(t)+" "," ")))})}function tt(t,e){if(e&&t.setAttribute){var n=(" "+(t.getAttribute("class")||"")+" ").replace(/[\n\t]/g," ");it(e.split(" "),function(t){t=Wn(t),-1===n.indexOf(" "+t+" ")&&(n+=t+" ")}),t.setAttribute("class",Wn(n))}}function et(t,e){if(e)if(e.nodeType)t[t.length++]=e;else{var n=e.length;if("number"==typeof n&&e.window!==e){if(n)for(var r=0;r<n;r++)t[t.length++]=e[r]}else t[t.length++]=e}}function nt(t,e){return wt(t,"$"+(e||"ngController")+"Controller")}function wt(t,e,n){for(9==t.nodeType&&(t=t.documentElement),e=Hn(e)?e:[e];t;){for(var r=0,i=e.length;r<i;r++)if(C(n=Mn.data(t,e[r])))return n;t=t.parentNode||11===t.nodeType&&t.host}}function xt(t){for(G(t,!0);t.firstChild;)t.removeChild(t.firstChild)}function St(t,e){e||G(t);var n=t.parentNode;n&&n.removeChild(t)}function Ct(t,e){var n=dr[e.toLowerCase()];return n&&mr[ht(t)]&&n}function Et(t,e,n){n.call(t,e)}function kt(t,e,n){var r=e.relatedTarget;r&&(r===t||pr.call(t,r))||n.call(t,e)}function At(){this.$get=function(){return ot(W,{hasClass:function(t,e){return t.attr&&(t=t[0]),X(t,e)},addClass:function(t,e){return t.attr&&(t=t[0]),tt(t,e)},removeClass:function(t,e){return t.attr&&(t=t[0]),Q(t,e)}})}}function Ot(t,e){var n=t&&t.$$hashKey;return n?("function"==typeof n&&(n=t.$$hashKey()),n):"function"==(n=typeof t)||"object"==n&&null!==t?t.$$hashKey=n+":"+(e||function(){return++Bn})():n+":"+t}function Mt(t,e){if(e){var n=0;this.nextUid=function(){return++n}}it(t,this.put,this)}function Tt(t){return(t=t.toString().replace(Sr,"")).match(yr)||t.match(br)}function Nt(t,u){function e(n){return function(t,e){if(!st(t))return n(t,e);it(t,v(n))}}function o(t,e){if(q(t,"service"),(ct(e)||Hn(e))&&(e=f.instantiate(e)),!e.$get)throw Cr("pget",t);return l[t+"Provider"]=e}function n(t,e,n){return o(t,{$get:!1!==n?(r=t,i=e,function(){var t=p.invoke(i,this);if(at(t))throw Cr("undef",r);return t}):e});var r,i}function r(n,r){function s(e,t){if(n.hasOwnProperty(e)){if(n[e]===a)throw Cr("cdep",e+" <- "+c.join(" <- "));return n[e]}try{return c.unshift(e),n[e]=a,n[e]=r(e,t)}catch(t){throw n[e]===a&&delete n[e],t}finally{c.shift()}}function i(t,e,n){for(var r=[],i=0,o=(t=Nt.$$annotate(t,u,n)).length;i<o;i++){var a=t[i];if("string"!=typeof a)throw Cr("itkn",a);r.push(e&&e.hasOwnProperty(a)?e[a]:s(a,n))}return r}return{invoke:function(t,e,n,r){return"string"==typeof n&&(r=n,n=null),n=i(t,n,r),Hn(t)&&(t=t[t.length-1]),(r=!(On<=11)&&("function"==typeof t&&/^(?:class\s|constructor\()/.test(Function.prototype.toString.call(t))))?(n.unshift(null),new(Function.prototype.bind.apply(t,n))):t.apply(e,n)},instantiate:function(t,e,n){var r=Hn(t)?t[t.length-1]:t;return(t=i(t,e,n)).unshift(null),new(Function.prototype.bind.apply(r,t))},get:s,annotate:Nt.$$annotate,has:function(t){return l.hasOwnProperty(t+"Provider")||n.hasOwnProperty(t)}}}u=!0===u;var a={},c=[],s=new Mt([],!0),l={$provide:{provider:e(o),factory:e(n),service:e(function(t,e){return n(t,["$injector",function(t){return t.instantiate(e)}])}),value:e(function(t,e){return n(t,S(e),!1)}),constant:e(function(t,e){q(t,"constant"),l[t]=e,i[t]=e}),decorator:function(t,e){var n=f.get(t+"Provider"),r=n.$get;n.$get=function(){var t=p.invoke(r,n);return p.invoke(e,null,{$delegate:t})}}}},f=l.$injector=r(l,function(t,e){throw Ln.isString(e)&&c.push(e),Cr("unpr",c.join(" <- "))}),i={},h=r(i,function(t,e){var n=f.get(t+"Provider",e);return p.invoke(n.$get,n,rt,t)}),p=h;l.$injectorProvider={$get:S(h)};var $=function n(t){vt(at(t)||Hn(t),"modulesToLoad","not an array");var r,i=[];return it(t,function(e){function t(t){var e,n;for(e=0,n=t.length;e<n;e++){var r=t[e],i=f.get(r[0]);i[r[1]].apply(i,r[2])}}if(!s.get(e)){s.put(e,!0);try{ut(e)?(r=Nn(e),i=i.concat(n(r.requires)).concat(r._runBlocks),t(r._invokeQueue),t(r._configBlocks)):ct(e)?i.push(f.invoke(e)):Hn(e)?i.push(f.invoke(e)):U(e,"module")}catch(t){throw Hn(e)&&(e=e[e.length-1]),t.message&&t.stack&&-1==t.stack.indexOf(t.message)&&(t=t.message+"\n"+t.stack),Cr("modulerr",e,t.stack||t.message||t)}}}),i}(t);return(p=h.get("$injector")).strictDi=u,it($,function(t){t&&p.invoke(t)}),p}function Vt(){var t=!0;this.disableAutoScrolling=function(){t=!1},this.$get=["$window","$location","$rootScope",function(n,i,o){function a(t){var e;t?(t.scrollIntoView(),ct(e=s.yOffset)?e=e():m(e)?(e=e[0],e="fixed"!==n.getComputedStyle(e).position?0:e.getBoundingClientRect().bottom):y(e)||(e=0),e&&(t=t.getBoundingClientRect().top,n.scrollBy(0,t-e))):n.scrollTo(0,0)}function s(t){var e,n,r;(t=ut(t)?t:i.hash())?(e=u.getElementById(t))?a(e):(n=u.getElementsByName(t),r=null,Array.prototype.some.call(n,function(t){if("a"===ht(t))return r=t,!0}),(e=r)?a(e):"top"===t&&a(null)):a(null)}var u=n.document;return t&&o.$watch(function(){return i.hash()},function(t,e){var n,r;t===e&&""===t||(n=function(){o.$evalAsync(s)},"complete"===(r=r||c).document.readyState?r.setTimeout(n):Mn(r).on("load",n))}),s}]}function jt(t,e){return t||e?t?e?(Hn(t)&&(t=t.join(" ")),Hn(e)&&(e=e.join(" ")),t+" "+e):t:e:""}function Dt(t){return st(t)?t:{}}function Pt(o,t,e,a){function r(t){try{t.apply(null,In.call(arguments,1))}finally{if(0===--$)for(;d.length;)try{d.pop()()}catch(t){e.error(t)}}}function n(){b=null,s(),i()}function s(){$t(m=at(m=w())?null:m,C)&&(m=C),C=m}function i(){g===u.url()&&v===m||(g=u.url(),v=m,it(x,function(t){t(u.url(),m)}))}var u=this,c=o.location,l=o.history,f=o.setTimeout,h=o.clearTimeout,p={};u.isMock=!1;var $=0,d=[];u.$$completeOutstandingRequest=r,u.$$incOutstandingRequestCount=function(){$++},u.notifyWhenNoOutstandingRequests=function(t){0===$?t():d.push(t)};var m,v,g=c.href,y=t.find("base"),b=null,w=a.history?function(){try{return l.state}catch(t){}}:I;s(),v=m,u.url=function(t,e,n){if(at(n)&&(n=null),c!==o.location&&(c=o.location),l!==o.history&&(l=o.history),t){var r=v===n;if(g===t&&(!a.history||r))return u;var i=g&&ce(g)===ce(t);return g=t,v=n,!a.history||i&&r?(i&&!b||(b=t),e?c.replace(t):i?(e=c,n=-1===(n=t.indexOf("#"))?"":t.substr(n),e.hash=n):c.href=t,c.href!==t&&(b=t)):(l[e?"replaceState":"pushState"](n,"",t),s(),v=m),u}return b||c.href.replace(/%27/g,"'")},u.state=function(){return m};var x=[],S=!1,C=null;u.onUrlChange=function(t){return S||(a.history&&Mn(o).on("popstate",n),Mn(o).on("hashchange",n),S=!0),x.push(t),t},u.$$applicationDestroyed=function(){Mn(o).off("hashchange popstate",n)},u.$$checkUrlChange=i,u.baseHref=function(){var t=y.attr("href");return t?t.replace(/^(https?\:)?\/\/[^\/]*/,""):""},u.defer=function(t,e){var n;return $++,n=f(function(){delete p[n],r(t)},e||0),p[n]=!0,n},u.defer.cancel=function(t){return!!p[t]&&(delete p[t],h(t),r(I),!0)}}function It(){this.$get=["$window","$log","$sniffer","$document",function(t,e,n,r){return new Pt(t,r,e,n)}]}function Rt(){this.$get=function(){function t(t,e){function n(t){t!=c&&(l?l==t&&(l=t.n):l=t,r(t.n,t.p),r(t,c),(c=t).n=null)}function r(t,e){t!=e&&(t&&(t.p=e),e&&(e.n=t))}if(t in f)throw h("$cacheFactory")("iid",t);var i=0,o=ot({},e,{id:t}),a=gt(),s=e&&e.capacity||Number.MAX_VALUE,u=gt(),c=null,l=null;return f[t]={put:function(t,e){if(!at(e)){if(s<Number.MAX_VALUE)n(u[t]||(u[t]={key:t}));return t in a||i++,a[t]=e,s<i&&this.remove(l.key),e}},get:function(t){if(s<Number.MAX_VALUE){var e=u[t];if(!e)return;n(e)}return a[t]},remove:function(t){if(s<Number.MAX_VALUE){var e=u[t];if(!e)return;e==c&&(c=e.p),e==l&&(l=e.n),r(e.n,e.p),delete u[t]}t in a&&(delete a[t],i--)},removeAll:function(){a=gt(),i=0,u=gt(),c=l=null},destroy:function(){u=o=a=null,delete f[t]},info:function(){return ot({},o,{size:i})}}}var f={};return t.info=function(){var n={};return it(f,function(t,e){n[e]=t.info()}),n},t.get=function(t){return f[t]},t}}function Ft(){this.$get=["$cacheFactory",function(t){return t("templates")}]}function Ut(n,e){function M(t,r,i){var o=/^\s*([@&<]|=(\*?))(\??)\s*(\w*)\s*$/,a={};return it(t,function(t,e){if(t in s)a[e]=s[t];else{var n=t.match(o);if(!n)throw Vr("iscp",r,e,t,i?"controller bindings definition":"isolate scope definition");a[e]={mode:n[1][0],collection:"*"===n[2],optional:"?"===n[3],attrName:n[4]||e},n[4]&&(s[t]=a[e])}}),a}var T={},N=/^\s*directive\:\s*([\w\-]+)\s+(.*)$/,V=/(([\w\-]+)(?:\:([^;]+))?;?)/,c=function(t){var e,n={};for(t=t.split(","),e=0;e<t.length;e++)n[t[e]]=!0;return n}("ngSrc,ngSrcset,src,srcset"),p=/^(?:(\^\^?)?(\?)?(\^\^?)?)?/,d=/^(on[a-z]+|formaction)$/,s=gt();this.directive=function t(a,e){return q(a,"directive"),ut(a)?(function(t){var e=t.charAt(0);if(!e||e!==Dn(e))throw Vr("baddir",t);if(t!==t.trim())throw Vr("baddir",t)}(a),vt(e,"directiveFactory"),T.hasOwnProperty(a)||(T[a]=[],n.factory(a+"Directive",["$injector","$exceptionHandler",function(r,i){var o=[];return it(T[a],function(t,e){try{var n=r.invoke(t);ct(n)?n={compile:S(n)}:!n.compile&&n.link&&(n.compile=S(n.link)),n.priority=n.priority||0,n.index=e,n.name=n.name||a,n.require=n.require||n.controller&&n.name,n.restrict=n.restrict||"EA",n.$$moduleName=t.$$moduleName,o.push(n)}catch(t){i(t)}}),o}])),T[a].push(e)):it(a,v(t)),this},this.component=function(t,n){function r(r){function t(n){return ct(n)||Hn(n)?function(t,e){return r.invoke(n,this,{$element:t,$attrs:e})}:n}var e=n.template||n.templateUrl?n.template:"";return{controller:i,controllerAs:Bt(n.controller)||n.controllerAs||"$ctrl",template:t(e),templateUrl:t(n.templateUrl),transclude:n.transclude,scope:{},bindToController:n.bindings||{},restrict:"E",require:n.require}}var i=n.controller||I;return it(n,function(t,e){"$"===e.charAt(0)&&(r[e]=t,i[e]=t)}),r.$inject=["$injector"],this.directive(t,r)},this.aHrefSanitizationWhitelist=function(t){return C(t)?(e.aHrefSanitizationWhitelist(t),this):e.aHrefSanitizationWhitelist()},this.imgSrcSanitizationWhitelist=function(t){return C(t)?(e.imgSrcSanitizationWhitelist(t),this):e.imgSrcSanitizationWhitelist()};var m=!0;this.debugInfoEnabled=function(t){return C(t)?(m=t,this):m};var j=10;this.onChangesTtl=function(t){return arguments.length?(j=t,this):j},this.$get=["$injector","$interpolate","$exceptionHandler","$templateRequest","$parse","$controller","$rootScope","$sce","$animate","$$sanitizeUri",function(v,g,F,t,$,U,o,r,i,l){function a(){try{if(!--e)throw s=rt,Vr("infchng",j);o.$apply(function(){for(var t=0,e=s.length;t<e;++t)s[t]();s=rt})}finally{e++}}function q(t,e){if(e){var n,r,i,o=Object.keys(e);for(n=0,r=o.length;n<r;n++)this[i=o[n]]=e[i]}else this.$attr={};this.$$element=t}function S(t,e){try{t.addClass(e)}catch(t){}}function _(a,t,e,n,s){a instanceof Mn||(a=Mn(a));for(var r=/\S+/,i=0,o=a.length;i<o;i++){var u=a[i];u.nodeType===tr&&u.nodeValue.match(r)&&yt(u,a[i]=D.createElement("span"))}var c=C(a,t,a,e,n,s);_.$$addScopeClass(a);var l=null;return function(t,e,n){vt(t,"scope"),s&&s.needsNewScope&&(t=t.$parent.$new());var r=(n=n||{}).parentBoundTranscludeFn,i=n.transcludeControllers;if(n=n.futureParentElement,r&&r.$$boundTransclude&&(r=r.$$boundTransclude),l||(l=(n=n&&n[0])&&"foreignobject"!==ht(n)&&Un.call(n).match(/SVG/)?"svg":"html"),n="html"!==l?Mn(Z(l,Mn("<div>").append(a).html())):e?$r.clone.call(a):a,i)for(var o in i)n.data("$"+o+"Controller",i[o].instance);return _.$$addScopeInfo(n,t),e&&e(n,t),c&&c(t,n,n,r),n}}function C(t,l,e,n,r,i){for(var o,a,s,u,f,h=[],c=0;c<t.length;c++)o=new q,(i=(a=L(t[c],[],o,0===c?n:rt,r)).length?k(a,t[c],o,l,e,null,[],[],i):null)&&i.scope&&_.$$addScopeClass(o.$$element),o=i&&i.terminal||!(s=t[c].childNodes)||!s.length?null:C(s,i?(i.transcludeOnThisElement||!i.templateOnThisElement)&&i.transclude:l),(i||o)&&(h.push(c,i,o),u=!0,f=f||i),i=null;return u?function(t,e,n,r){var i,o,a,s,u,c;if(f)for(c=Array(e.length),s=0;s<h.length;s+=3)c[i=h[s]]=e[i];else c=e;for(s=0,u=h.length;s<u;)o=c[h[s++]],e=h[s++],i=h[s++],e?(e.scope?(a=t.$new(),_.$$addScopeInfo(Mn(o),a)):a=t,e(i,a,o,n,e.transcludeOnThisElement?E(t,e.transclude,r):!e.templateOnThisElement&&r?r:!r&&l?E(t,l):null)):i&&i(t,o.childNodes,rt,r)}:null}function E(o,a,s){function t(t,e,n,r,i){return t||((t=o.$new(!1,i)).$$transcluded=!0),a(t,e,{parentBoundTranscludeFn:s,transcludeControllers:n,futureParentElement:r})}var e,n=t.$$slots=gt();for(e in a.$$slots)n[e]=a.$$slots[e]?E(o,a.$$slots[e],s):null;return t}function L(t,e,n,r,i){var o,a,s,u,c=n.$attr;switch(t.nodeType){case 1:y(e,qt(ht(t)),"E",r,i);for(var l,f,h,p=t.attributes,$=0,d=p&&p.length;$<d;$++){var m=!1,v=!1;o=(l=p[$]).name,f=Wn(l.value),l=qt(o),(h=A.test(l))&&(o=o.replace(jr,"").substr(8).replace(/_(.)/g,function(t,e){return e.toUpperCase()})),(l=l.match(O))&&b(l[1])&&(v=(m=o).substr(0,o.length-5)+"end",o=o.substr(0,o.length-6)),c[l=qt(o.toLowerCase())]=o,!h&&n.hasOwnProperty(l)||(n[l]=f,Ct(t,l)&&(n[l]=!0)),x(t,e,f,l,h),y(e,l,"A",r,i,m,v)}if(st(t=t.className)&&(t=t.animVal),ut(t)&&""!==t)for(;o=V.exec(t);)y(e,l=qt(o[2]),"C",r,i)&&(n[l]=Wn(o[3])),t=t.substr(o.index+o[0].length);break;case tr:if(11===On)for(;t.parentNode&&t.nextSibling&&t.nextSibling.nodeType===tr;)t.nodeValue+=t.nextSibling.nodeValue,t.parentNode.removeChild(t.nextSibling);a=e,s=t.nodeValue,(u=g(s,!0))&&a.push({priority:0,compile:function(t){var r=!!(t=t.parent()).length;return r&&_.$$addBindingClass(t),function(t,e){var n=e.parent();r||_.$$addBindingClass(n),_.$$addBindingInfo(n,u.expressions),t.$watch(u,function(t){e[0].nodeValue=t})}}});break;case 8:try{(o=N.exec(t.nodeValue))&&(y(e,l=qt(o[1]),"M",r,i)&&(n[l]=Wn(o[2])))}catch(t){}}return e.sort(w),e}function B(t,e,n){var r=[],i=0;if(e&&t.hasAttribute&&t.hasAttribute(e))do{if(!t)throw Vr("uterdir",e,n);1==t.nodeType&&(t.hasAttribute(e)&&i++,t.hasAttribute(n)&&i--),r.push(t),t=t.nextSibling}while(0<i);else r.push(t);return Mn(r)}function H(o,a,s){return function(t,e,n,r,i){return e=B(e[0],a,s),o(t,e,n,r,i)}}function z(t,e,n,r,i,o){var a;return t?_(e,n,r,i,o):function(){return a||(a=_(e,n,r,i,o),e=n=o=null),a.apply(this,arguments)}}function k(t,v,g,e,n,r,y,b,i){function o(t,e,n,r){t&&(n&&(t=H(t,n,r)),t.require=s.require,t.directiveName=u,(S===s||s.$$isolateScope)&&(t=Q(t,{isolateScope:!0})),y.push(t)),e&&(n&&(e=H(e,n,r)),e.require=s.require,e.directiveName=u,(S===s||s.$$isolateScope)&&(e=Q(e,{isolateScope:!0})),b.push(e))}function a(t,e,n,r,a){var i,o,s,u,c,l,f,h;for(o in v===n?h=(r=g).$$element:r=new q(h=Mn(n),g),c=e,S?u=e.$new(!0):w&&(c=e.$parent),a&&((f=function(t,e,n,r){var i;if(lt(t)||(r=n,n=e,e=t,t=rt),E&&(i=l),n||(n=E?h.parent():h),!r)return a(t,e,i,n,m);var o=a.$$slots[r];if(o)return o(t,e,i,n,m);if(at(o))throw Vr("noslot",r,dt(h))}).$$boundTransclude=a,f.isSlotFilled=function(t){return!!a.$$slots[t]}),x&&(l=function(t,e,n,r,i,o,a){var s,u=gt();for(s in r){var c=r[s],l={$scope:c===a||c.$$isolateScope?i:o,$element:t,$attrs:e,$transclude:n},f=c.controller;"@"==f&&(f=e[c.name]),l=U(f,l,!0,c.controllerAs),u[c.name]=l,t.data("$"+c.name+"Controller",l.instance)}return u}(h,r,f,x,u,e,S)),S&&(_.$$addScopeInfo(h,u,!0,!(C&&(C===S||C===S.$$originalDirective))),_.$$addScopeClass(h,!0),u.$$isolateBindings=S.$$isolateBindings,(s=et(e,r,u,u.$$isolateBindings,S))&&u.$on("$destroy",s)),l){s=x[o];var p=l[o],$=s.$$bindings.bindToController;p.identifier&&$&&(i=et(c,r,p.instance,$,s));var d=p();d!==p.instance&&(p.instance=d,h.data("$"+s.name+"Controller",d),i&&i(),i=et(c,r,p.instance,$,s))}for(it(x,function(t,e){var n=t.require;t.bindToController&&!Hn(n)&&st(n)&&ot(l[e].instance,W(e,n,h,l))}),it(l,function(t){var e=t.instance;ct(e.$onInit)&&e.$onInit(),ct(e.$onDestroy)&&c.$on("$destroy",function(){e.$onDestroy()})}),i=0,o=y.length;i<o;i++)tt(s=y[i],s.isolateScope?u:e,h,r,s.require&&W(s.directiveName,s.require,h,l),f);var m=e;for(S&&(S.template||null===S.templateUrl)&&(m=u),t&&t(m,n.childNodes,rt,a),i=b.length-1;0<=i;i--)tt(s=b[i],s.isolateScope?u:e,h,r,s.require&&W(s.directiveName,s.require,h,l),f);it(l,function(t){ct((t=t.instance).$postLink)&&t.$postLink()})}i=i||{};for(var s,u,c,l,f,h=-Number.MAX_VALUE,w=i.newScopeDirective,x=i.controllerDirectives,S=i.newIsolateScopeDirective,C=i.templateDirective,p=i.nonTlbTranscludeDirective,$=!1,d=!1,E=i.hasElementTranscludeDirective,m=g.$$element=Mn(v),k=e,A=!1,O=!1,M=0,T=t.length;M<T;M++){var N=(s=t[M]).$$start,V=s.$$end;if(N&&(m=B(v,N,V)),c=rt,h>s.priority)break;if((f=s.scope)&&(s.templateUrl||(st(f)?(Y("new/isolated scope",S||w,s,m),S=s):Y("new/isolated scope",S,s,m)),w=w||s),u=s.name,!A&&(s.replace&&(s.templateUrl||s.template)||s.transclude&&!s.$$tlb)){for(f=M+1;A=t[f++];)if(A.transclude&&!A.$$tlb||A.replace&&(A.templateUrl||A.template)){O=!0;break}A=!0}if(!s.templateUrl&&s.controller&&(f=s.controller,x=x||gt(),Y("'"+u+"' controller",x[u],s,m),x[u]=s),f=s.transclude)if($=!0,s.$$tlb||(Y("transclusion",p,s,m),p=s),"element"==f)E=!0,h=s.priority,c=m,m=g.$$element=Mn(_.$$createComment(u,g[u])),v=m[0],X(n,In.call(c,0),v),c[0].$$parentNode=c[0].parentNode,k=z(O,c,e,h,r&&r.name,{nonTlbTranscludeDirective:p});else{var j=gt();if(c=Mn(bt(v)).contents(),st(f)){c=[];var D=gt(),P=gt();for(var I in it(f,function(t,e){var n="?"===t.charAt(0);t=n?t.substring(1):t,D[t]=e,j[e]=null,P[e]=n}),it(m.contents(),function(t){var e=D[qt(ht(t))];e?(P[e]=!0,j[e]=j[e]||[],j[e].push(t)):c.push(t)}),it(P,function(t,e){if(!t)throw Vr("reqslot",e)}),j)j[I]&&(j[I]=z(O,j[I],e))}m.empty(),(k=z(O,c,e,rt,rt,{needsNewScope:s.$$isolateScope||s.$$newScope})).$$slots=j}if(s.template)if(d=!0,Y("template",C,s,m),f=ct((C=s).template)?s.template(m,g):s.template,f=nt(f),s.replace){if(r=s,c=cr.test(f)?Lt(Z(s.templateNamespace,Wn(f))):[],v=c[0],1!=c.length||1!==v.nodeType)throw Vr("tplrt",u,"");X(n,m,v),f=L(v,[],T={$attr:{}});var R=t.splice(M+1,t.length-(M+1));(S||w)&&G(f,S,w),t=t.concat(f).concat(R),J(g,T),T=t.length}else m.html(f);if(s.templateUrl)d=!0,Y("template",C,s,m),(C=s).replace&&(r=s),a=K(t.splice(M,t.length-M),m,g,n,$&&k,y,b,{controllerDirectives:x,newScopeDirective:w!==s&&w,newIsolateScopeDirective:S,templateDirective:C,nonTlbTranscludeDirective:p}),T=t.length;else if(s.compile)try{ct(l=s.compile(m,g,k))?o(null,l,N,V):l&&o(l.pre,l.post,N,V)}catch(t){F(t,dt(m))}s.terminal&&(a.terminal=!0,h=Math.max(h,s.priority))}return a.scope=w&&!0===w.scope,a.transcludeOnThisElement=$,a.templateOnThisElement=d,a.transclude=k,i.hasElementTranscludeDirective=E,a}function W(n,t,r,i){var o;if(ut(t)){var e=t.match(p);t=t.substring(e[0].length);var a=e[1]||e[3];e="?"===e[2];if("^^"===a?r=r.parent():o=(o=i&&i[t])&&o.instance,!o){var s="$"+t+"Controller";o=a?r.inheritedData(s):r.data(s)}if(!o&&!e)throw Vr("ctreq",t,n)}else if(Hn(t))for(o=[],a=0,e=t.length;a<e;a++)o[a]=W(n,t[a],r,i);else st(t)&&(o={},it(t,function(t,e){o[e]=W(n,t,r,i)}));return o||null}function G(t,e,n){for(var r=0,i=t.length;r<i;r++)t[r]=P(t[r],{$$isolateScope:e,$$newScope:n})}function y(t,e,n,r,i,o,a){if(e===i)return null;if(i=null,T.hasOwnProperty(e))for(var s,u=0,c=(e=v.get(e+"Directive")).length;u<c;u++)try{if(s=e[u],(at(r)||r>s.priority)&&-1!=s.restrict.indexOf(n)){if(o&&(s=P(s,{$$start:o,$$end:a})),!s.$$bindings){var l=s,f=s,h=s.name,p={isolateScope:null,bindToController:null};if(st(f.scope)&&(!0===f.bindToController?(p.bindToController=M(f.scope,h,!0),p.isolateScope={}):p.isolateScope=M(f.scope,h,!1)),st(f.bindToController)&&(p.bindToController=M(f.bindToController,h,!0)),st(p.bindToController)){var $=f.controller,d=f.controllerAs;if(!$)throw Vr("noctrl",h);if(!Bt($,d))throw Vr("noident",h)}var m=l.$$bindings=p;st(m.isolateScope)&&(s.$$isolateBindings=m.isolateScope)}t.push(s),i=s}}catch(t){F(t)}return i}function b(t){if(T.hasOwnProperty(t))for(var e=v.get(t+"Directive"),n=0,r=e.length;n<r;n++)if((t=e[n]).multiElement)return!0;return!1}function J(n,r){var i=r.$attr,o=n.$attr,a=n.$$element;it(n,function(t,e){"$"!=e.charAt(0)&&(r[e]&&r[e]!==t&&(t+=("style"===e?";":" ")+r[e]),n.$set(e,t,!0,i[e]))}),it(r,function(t,e){"class"==e?(S(a,t),n.class=(n.class?n.class+" ":"")+t):"style"==e?(a.attr("style",a.attr("style")+";"+t),n.style=(n.style?n.style+";":"")+t):"$"==e.charAt(0)||n.hasOwnProperty(e)||(n[e]=t,o[e]=i[e])})}function K(s,u,c,l,f,h,p,$){var d,m,v=[],g=u[0],y=s.shift(),b=P(y,{templateUrl:null,transclude:null,replace:null,$$originalDirective:y}),w=ct(y.templateUrl)?y.templateUrl(u,c):y.templateUrl,x=y.templateNamespace;return u.empty(),t(w).then(function(t){var n,e;if(t=nt(t),y.replace){if(t=cr.test(t)?Lt(Z(x,Wn(t))):[],n=t[0],1!=t.length||1!==n.nodeType)throw Vr("tplrt",y.name,w);t={$attr:{}},X(l,u,n);var r=L(n,[],t);st(y.scope)&&G(r,!0),s=r.concat(s),J(c,t)}else n=g,u.html(t);for(s.unshift(b),d=k(s,n,c,f,u,y,h,p,$),it(l,function(t,e){t==n&&(l[e]=u[0])}),m=C(u[0].childNodes,f);v.length;){t=v.shift(),e=v.shift();var i=v.shift(),o=v.shift();r=u[0];if(!t.$$destroyed){if(e!==g){var a=e.className;$.hasElementTranscludeDirective&&y.replace||(r=bt(n)),X(i,Mn(e),r),S(Mn(r),a)}e=d.transcludeOnThisElement?E(t,d.transclude,o):o,d(m,t,r,l,e)}}v=null}),function(t,e,n,r,i){t=i,e.$$destroyed||(v?v.push(e,n,r,t):(d.transcludeOnThisElement&&(t=E(e,d.transclude,i)),d(m,e,n,r,t)))}}function w(t,e){var n=e.priority-t.priority;return 0!==n?n:t.name!==e.name?t.name<e.name?-1:1:t.index-e.index}function Y(t,e,n,r){function i(t){return t?" (module: "+t+")":""}if(e)throw Vr("multidir",e.name,i(e.$$moduleName),n.name,i(n.$$moduleName),t,dt(r))}function Z(t,e){switch(t=Dn(t||"html")){case"svg":case"math":var n=D.createElement("div");return n.innerHTML="<"+t+">"+e+"</"+t+">",n.childNodes[0].childNodes;default:return e}}function x(t,e,i,o,a){var s=function(t,e){if("srcdoc"==e)return r.HTML;var n=ht(t);return"xlinkHref"==e||"form"==n&&"action"==e||"img"!=n&&("src"==e||"ngSrc"==e)?r.RESOURCE_URL:void 0}(t,o);a=c[o]||a;var u=g(i,!0,s,a);if(u){if("multiple"===o&&"select"===ht(t))throw Vr("selmulti",dt(t));e.push({priority:100,compile:function(){return{pre:function(t,e,n){if(e=n.$$observers||(n.$$observers=gt()),d.test(o))throw Vr("nodomevents");var r=n[o];r!==i&&(u=r&&g(r,!0,s,a),i=r),u&&(n[o]=u(t),(e[o]||(e[o]=[])).$$inter=!0,(n.$$observers&&n.$$observers[o].$$scope||t).$watch(u,function(t,e){"class"===o&&t!=e?n.$updateClass(t,e):n.$set(o,t)}))}}}})}}function X(t,e,n){var r,i,o=e[0],a=e.length,s=o.parentNode;if(t)for(r=0,i=t.length;r<i;r++)if(t[r]==o){t[r++]=n,i=r+a-1;for(var u=t.length;r<u;r++,i++)i<u?t[r]=t[i]:delete t[r];t.length-=a-1,t.context===o&&(t.context=n);break}for(s&&s.replaceChild(n,o),t=D.createDocumentFragment(),r=0;r<a;r++)t.appendChild(e[r]);for(Mn.hasData(o)&&(Mn.data(n,Mn.data(o)),Mn(o).off("$destroy")),Mn.cleanData(t.querySelectorAll("*")),r=1;r<a;r++)delete e[r];e[0]=n,e.length=1}function Q(t,e){return ot(function(){return t.apply(null,arguments)},t,e)}function tt(t,e,n,r,i,o){try{t(e,n,r,i,o)}catch(t){F(t,dt(n))}}function et(u,c,l,t,f){function h(t,e,n){ct(l.$onChanges)&&e!==n&&(s||(u.$$postDigest(a),s=[]),i||(i={},s.push(r)),i[t]&&(n=i[t].previousValue),i[t]={previousValue:n,currentValue:e})}function r(){l.$onChanges(i),i=rt}var i,p=[];return it(t,function(t,e){var n,r,i,o,a=t.attrName,s=t.optional;switch(t.mode){case"@":s||jn.call(c,a)||(l[e]=c[a]=void 0),c.$observe(a,function(t){ut(t)&&(h(e,t,l[e]),l[e]=t)}),c.$$observers[a].$$scope=u,ut(n=c[a])?l[e]=g(n)(u):ft(n)&&(l[e]=n);break;case"=":if(!jn.call(c,a)){if(s)break;c[a]=void 0}if(s&&!c[a])break;r=$(c[a]),o=r.literal?$t:function(t,e){return t===e||t!=t&&e!=e},i=r.assign||function(){throw n=l[e]=r(u),Vr("nonassign",c[a],a,f.name)},n=l[e]=r(u),(s=function(t){return o(t,l[e])||(o(t,n)?i(u,t=l[e]):l[e]=t),n=t}).$stateful=!0,s=t.collection?u.$watchCollection(c[a],s):u.$watch($(c[a],s),null,r.literal),p.push(s);break;case"<":if(!jn.call(c,a)){if(s)break;c[a]=void 0}if(s&&!c[a])break;r=$(c[a]),l[e]=r(u),s=u.$watch(r,function(t){h(e,t,l[e]),l[e]=t},r.literal),p.push(s);break;case"&":if((r=c.hasOwnProperty(a)?$(c[a]):I)===I&&s)break;l[e]=function(t){return r(u,t)}}}),p.length&&function(){for(var t=0,e=p.length;t<e;++t)p[t]()}}var s,f=/^\w/,h=D.createElement("div"),e=j;q.prototype={$normalize:qt,$addClass:function(t){t&&0<t.length&&i.addClass(this.$$element,t)},$removeClass:function(t){t&&0<t.length&&i.removeClass(this.$$element,t)},$updateClass:function(t,e){var n=_t(t,e);n&&n.length&&i.addClass(this.$$element,n),(n=_t(e,t))&&n.length&&i.removeClass(this.$$element,n)},$set:function(t,e,n,r){var i=Ct(this.$$element[0],t),o=vr[t],a=t;if(i?(this.$$element.prop(t,e),r=i):o&&(this[o]=e,a=o),this[t]=e,r?this.$attr[t]=r:(r=this.$attr[t])||(this.$attr[t]=r=mt(t,"-")),"a"===(i=ht(this.$$element))&&("href"===t||"xlinkHref"===t)||"img"===i&&"src"===t)this[t]=e=l(e,"src"===t);else if("img"===i&&"srcset"===t){i="",o=Wn(e);for(var s=/(\s+\d+x\s*,|\s+\d+w\s*,|\s+,|,\s+)/,u=(s=/\s/.test(o)?s:/(,)/,o=o.split(s),s=Math.floor(o.length/2),0);u<s;u++){var c=2*u;i=(i=i+l(Wn(o[c]),!0))+" "+Wn(o[c+1])}o=Wn(o[2*u]).split(/\s/),i+=l(Wn(o[0]),!0),2===o.length&&(i+=" "+Wn(o[1])),this[t]=e=i}!1!==n&&(null===e||at(e)?this.$$element.removeAttr(r):f.test(r)?this.$$element.attr(r,e):function(t,e,n){h.innerHTML="<span "+e+">";var r=(e=h.firstChild.attributes)[0];e.removeNamedItem(r.name),r.value=n,t.attributes.setNamedItem(r)}(this.$$element[0],r,e)),(t=this.$$observers)&&it(t[a],function(t){try{t(e)}catch(t){F(t)}})},$observe:function(t,e){var n=this,r=n.$$observers||(n.$$observers=gt()),i=r[t]||(r[t]=[]);return i.push(e),o.$evalAsync(function(){i.$$inter||!n.hasOwnProperty(t)||at(n[t])||e(n[t])}),function(){pt(i,e)}}};var n=g.startSymbol(),u=g.endSymbol(),nt="{{"==n&&"}}"==u?R:function(t){return t.replace(/\{\{/g,n).replace(/}}/g,u)},A=/^ngAttr[A-Z]/,O=/^(.+)Start$/;return _.$$addBindingInfo=m?function(t,e){var n=t.data("$binding")||[];Hn(e)?n=n.concat(e):n.push(e),t.data("$binding",n)}:I,_.$$addBindingClass=m?function(t){S(t,"ng-binding")}:I,_.$$addScopeInfo=m?function(t,e,n,r){t.data(n?r?"$isolateScopeNoTemplate":"$isolateScope":"$scope",e)}:I,_.$$addScopeClass=m?function(t,e){S(t,e?"ng-isolate-scope":"ng-scope")}:I,_.$$createComment=function(t,e){var n="";return m&&(n=" "+(t||"")+": "+(e||"")+" "),D.createComment(n)},_}]}function qt(t){return B(t.replace(jr,""))}function _t(t,e){var n="",r=t.split(/\s+/),i=e.split(/\s+/),o=0;t:for(;o<r.length;o++){for(var a=r[o],s=0;s<i.length;s++)if(a==i[s])continue t;n+=(0<n.length?" ":"")+a}return n}function Lt(t){var e=(t=Mn(t)).length;if(e<=1)return t;for(;e--;)8===t[e].nodeType&&Rn.call(t,e,1);return t}function Bt(t,e){if(e&&ut(e))return e;if(ut(t)){var n=Pr.exec(t);if(n)return n[3]}}function Ht(){var l={},f=!1;this.has=function(t){return l.hasOwnProperty(t)},this.register=function(t,e){q(t,"controller"),st(t)?ot(l,t):l[t]=e},this.allowGlobals=function(){f=!0},this.$get=["$injector","$window",function(s,u){function c(t,e,n,r){if(!t||!st(t.$scope))throw h("$controller")("noscp",r,e);t.$scope[e]=n}return function(e,n,t,r){var i,o,a;if(t=!0===t,r&&ut(r)&&(a=r),ut(e)){if(!(r=e.match(Pr)))throw Dr("ctrlfmt",e);o=r[1],a=a||r[3],U(e=l.hasOwnProperty(o)?l[o]:_(n.$scope,o,!0)||(f?_(u,o,!0):rt),o,!0)}return t?(t=(Hn(e)?e[e.length-1]:e).prototype,i=Object.create(t||null),a&&c(n,a,i,o||e.name),ot(function(){var t=s.invoke(e,i,n,o);return t!==i&&(st(t)||ct(t))&&(i=t,a&&c(n,a,i,o||e.name)),i},{instance:i,identifier:a})):(i=s.instantiate(e,n,o),a&&c(n,a,i,o||e.name),i)}}]}function zt(){this.$get=["$window",function(t){return Mn(t.document)}]}function Wt(){this.$get=["$log",function(n){return function(t,e){n.error.apply(n,arguments)}}]}function Gt(t){return st(t)?g(t)?t.toISOString():A(t):t}function Jt(){this.$get=function(){return function(t){if(!t)return"";var n=[];return o(t,function(t,e){null===t||at(t)||(Hn(t)?it(t,function(t){n.push(N(e)+"="+N(Gt(t)))}):n.push(N(e)+"="+N(Gt(t))))}),n.join("&")}}}function Kt(){this.$get=function(){return function(t){if(!t)return"";var e=[];return function n(t,r,i){null===t||at(t)||(Hn(t)?it(t,function(t,e){n(t,r+"["+(st(t)?e:"")+"]")}):st(t)&&!g(t)?o(t,function(t,e){n(t,r+(i?"":"[")+e+(i?"":"]"))}):e.push(N(r)+"="+N(Gt(t))))}(t,"",!0),e.join("&")}}}function Yt(t,e){if(ut(t)){var n=t.replace(_r,"").trim();if(n){var r=e("Content-Type");(r=r&&0===r.indexOf(Rr))||(r=(r=n.match(Ur))&&qr[r[0]].test(n)),r&&(t=i(n))}}return t}function Zt(t){var n,i=gt();return ut(t)?it(t.split("\n"),function(t){n=t.indexOf(":");var e=Dn(Wn(t.substr(0,n)));t=Wn(t.substr(n+1)),e&&(i[e]=i[e]?i[e]+", "+t:t)}):st(t)&&it(t,function(t,e){var n=Dn(e),r=Wn(t);n&&(i[n]=i[n]?i[n]+", "+r:r)}),i}function Xt(e){var n;return function(t){return n||(n=Zt(e)),t?(void 0===(t=n[Dn(t)])&&(t=null),t):n}}function Qt(e,n,r,t){return ct(t)?t(e,n,r):(it(t,function(t){e=t(e,n,r)}),e)}function te(){var y=this.defaults={transformResponse:[Yt],transformRequest:[function(t){return st(t)&&"[object File]"!==Un.call(t)&&"[object Blob]"!==Un.call(t)&&"[object FormData]"!==Un.call(t)?A(t):t}],headers:{common:{Accept:"application/json, text/plain, */*"},post:w(Fr),put:w(Fr),patch:w(Fr)},xsrfCookieName:"XSRF-TOKEN",xsrfHeaderName:"X-XSRF-TOKEN",paramSerializer:"$httpParamSerializer"},b=!1;this.useApplyAsync=function(t){return C(t)?(b=!!t,this):b};var u=!0;this.useLegacyPromiseExtensions=function(t){return C(t)?(u=!!t,this):u};var e=this.interceptors=[];this.$get=["$httpBackend","$$cookieReader","$cacheFactory","$rootScope","$q","$injector",function(p,$,t,d,m,a){function v(t){function r(t){var e=ot({},t);return e.data=Qt(t.data,t.headers,t.status,n.transformResponse),200<=(t=t.status)&&t<300?e:m.reject(e)}if(!st(t))throw h("$http")("badreq",t);if(!ut(t.url))throw h("$http")("badreq",t.url);var n=ot({method:"get",transformRequest:y.transformRequest,transformResponse:y.transformResponse,paramSerializer:y.paramSerializer},t);n.headers=function(t){var e,n,r,i,o,a,s,u=y.headers,c=ot({},t.headers);u=ot({},u.common,u[Dn(t.method)]);t:for(e in u){for(r in n=Dn(e),c)if(Dn(r)===n)continue t;c[e]=u[e]}return i=c,o=w(t),s={},it(i,function(t,e){ct(t)?null!=(a=t(o))&&(s[e]=a):s[e]=t}),s}(t),n.method=Pn(n.method),n.paramSerializer=ut(n.paramSerializer)?a.get(n.paramSerializer):n.paramSerializer;var e=[function(t){var n=t.headers,e=Qt(t.data,Xt(n),rt,t.transformRequest);return at(e)&&it(n,function(t,e){"content-type"===Dn(e)&&delete n[e]}),at(t.withCredentials)&&!at(y.withCredentials)&&(t.withCredentials=y.withCredentials),function(i,t){function o(t,e,n,r){(200<=(e=-1<=e?e:0)&&e<300?s.resolve:s.reject)({data:t,status:e,headers:Xt(n),config:i,statusText:r})}function e(t){o(t.data,t.status,w(t.headers()),t.statusText)}function n(){var t=v.pendingRequests.indexOf(i);-1!==t&&v.pendingRequests.splice(t,1)}var a,r,s=m.defer(),u=s.promise,c=i.headers,l=(f=i.url,h=i.paramSerializer(i.params),0<h.length&&(f+=(-1==f.indexOf("?")?"?":"&")+h),f);var f,h;return v.pendingRequests.push(i),u.then(n,n),!i.cache&&!y.cache||!1===i.cache||"GET"!==i.method&&"JSONP"!==i.method||(a=st(i.cache)?i.cache:st(y.cache)?y.cache:g),a&&(C(r=a.get(l))?r&&ct(r.then)?r.then(e,e):Hn(r)?o(r[1],r[0],w(r[2]),r[3]):o(r,200,{},"OK"):a.put(l,u)),at(r)&&((r=Ke(i.url)?$()[i.xsrfCookieName||y.xsrfCookieName]:rt)&&(c[i.xsrfHeaderName||y.xsrfHeaderName]=r),p(i.method,l,t,function(t,e,n,r){function i(){o(e,t,n,r)}a&&(200<=t&&t<300?a.put(l,[t,e,Zt(n),r]):a.remove(l)),b?d.$applyAsync(i):(i(),d.$$phase||d.$apply())},c,i.timeout,i.withCredentials,i.responseType)),u}(t,e).then(r,r)},rt],i=m.when(n);for(it(s,function(t){(t.request||t.requestError)&&e.unshift(t.request,t.requestError),(t.response||t.responseError)&&e.push(t.response,t.responseError)});e.length;){t=e.shift();var o=e.shift();i=i.then(t,o)}return i.error=u?(i.success=function(e){return U(e,"fn"),i.then(function(t){e(t.data,t.status,t.headers,n)}),i},function(e){return U(e,"fn"),i.then(null,function(t){e(t.data,t.status,t.headers,n)}),i}):(i.success=Br("success"),Br("error")),i}var g=t("$http");y.paramSerializer=ut(y.paramSerializer)?a.get(y.paramSerializer):y.paramSerializer;var s=[];return it(e,function(t){s.unshift(ut(t)?a.get(t):a.invoke(t))}),v.pendingRequests=[],function(t){it(arguments,function(n){v[n]=function(t,e){return v(ot({},e||{},{method:n,url:t}))}})}("get","delete","head","jsonp"),function(t){it(arguments,function(r){v[r]=function(t,e,n){return v(ot({},n||{},{method:r,url:t,data:e}))}})}("post","put","patch"),v.defaults=y,v}]}function ee(){this.$get=function(){return function(){return new c.XMLHttpRequest}}}function ne(){this.$get=["$browser","$window","$document","$xhrFactory",function(t,e,n,r){return b=r,w=(y=t).defer,x=e.angular.callbacks,S=n[0],function(t,r,e,i,n,o,a,s){function u(){f&&f(),h&&h.abort()}function c(t,e,n,r,i){C(g)&&w.cancel(g),f=h=null,t(e,n,r,i),y.$$completeOutstandingRequest(I)}if(y.$$incOutstandingRequestCount(),r=r||y.url(),"jsonp"==Dn(t)){var l="_"+(x.counter++).toString(36);x[l]=function(t){x[l].data=t,x[l].called=!0};var f=(p=r.replace("JSON_CALLBACK","angular.callbacks."+l),$=l,d=function(t,e){c(i,t,x[l].data,"",e),x[l]=I},m=S.createElement("script"),v=null,m.type="text/javascript",m.src=p,m.async=!0,v=function(t){m.removeEventListener("load",v,!1),m.removeEventListener("error",v,!1),S.body.removeChild(m),m=null;var e=-1,n="unknown";t&&("load"!==t.type||x[$].called||(t={type:"error"}),n=t.type,e="error"===t.type?404:200),d&&d(e,n)},m.addEventListener("load",v,!1),m.addEventListener("error",v,!1),S.body.appendChild(m),v)}else{var h=b(t,r);if(h.open(t,r,!0),it(n,function(t,e){C(t)&&h.setRequestHeader(e,t)}),h.onload=function(){var t=h.statusText||"",e="response"in h?h.response:h.responseText,n=1223===h.status?204:h.status;0===n&&(n=e?200:"file"==Je(r).protocol?404:0),c(i,n,e,h.getAllResponseHeaders(),t)},t=function(){c(i,-1,null,null,"")},h.onerror=t,h.onabort=t,a&&(h.withCredentials=!0),s)try{h.responseType=s}catch(t){if("json"!==s)throw t}h.send(at(e)?null:e)}var p,$,d,m,v;if(0<o)var g=w(u,o);else o&&ct(o.then)&&o.then(u)};var y,b,w,x,S}]}function re(){var w="{{",x="}}";this.startSymbol=function(t){return t?(w=t,this):w},this.endSymbol=function(t){return t?(x=t,this):x},this.$get=["$parse","$exceptionHandler","$sce",function($,d,m){function t(t){return"\\\\\\"+t}function v(t){return t.replace(n,w).replace(r,x)}function g(t,e,n,r){var i;return i=t.$watch(function(t){return i(),r(t)},e,n)}function e(i,t,r,o){function e(t){try{var e,n=t;if(t=r?m.getTrusted(r,n):m.valueOf(n),o&&!C(t))e=t;else if(null==t)e="";else{switch(typeof t){case"string":break;case"number":t=""+t;break;default:t=A(t)}e=t}return e}catch(t){d(Hr.interr(i,t))}}var n;if(!i.length||-1===i.indexOf(w))return t||((n=S(t=v(i))).exp=i,n.expressions=[],n.$$watchDelegate=g),n;o=!!o;var a,s,u=0,c=[],l=[];n=i.length;for(var f=[],h=[];u<n;){if(-1==(a=i.indexOf(w,u))||-1==(s=i.indexOf(x,a+y))){u!==n&&f.push(v(i.substring(u)));break}u!==a&&f.push(v(i.substring(u,a))),u=i.substring(a+y,s),c.push(u),l.push($(u,e)),u=s+b,h.push(f.length),f.push("")}if(r&&1<f.length&&Hr.throwNoconcat(i),!t||c.length){var p=function(t){for(var e=0,n=c.length;e<n;e++){if(o&&at(t[e]))return;f[h[e]]=t[e]}return f.join("")};return ot(function(t){var e=0,n=c.length,r=Array(n);try{for(;e<n;e++)r[e]=l[e](t);return p(r)}catch(t){d(Hr.interr(i,t))}},{exp:i,expressions:c,$$watchDelegate:function(r,i){var o;return r.$watchGroup(l,function(t,e){var n=p(t);ct(i)&&i.call(this,n,t!==e?o:n,r),o=n})}})}}var y=w.length,b=x.length,n=new RegExp(w.replace(/./g,t),"g"),r=new RegExp(x.replace(/./g,t),"g");return e.startSymbol=function(){return w},e.endSymbol=function(){return x},e}]}function ie(){this.$get=["$rootScope","$window","$q","$$q","$browser",function(p,$,d,m,v){function t(t,e,n,r){function i(){o?t.apply(null,a):t(c)}var o=4<arguments.length,a=o?In.call(arguments,4):[],s=$.setInterval,u=$.clearInterval,c=0,l=C(r)&&!r,f=(l?m:d).defer(),h=f.promise;return n=C(n)?n:0,h.$$intervalId=s(function(){l?v.defer(i):p.$evalAsync(i),f.notify(c++),0<n&&n<=c&&(f.resolve(c),u(h.$$intervalId),delete g[h.$$intervalId]),l||p.$apply()},e),g[h.$$intervalId]=f,h}var g={};return t.cancel=function(t){return!!(t&&t.$$intervalId in g)&&(g[t.$$intervalId].reject("canceled"),$.clearInterval(t.$$intervalId),delete g[t.$$intervalId],!0)},t}]}function oe(t){for(var e=(t=t.split("/")).length;e--;)t[e]=T(t[e]);return t.join("/")}function ae(t,e){var n=Je(t);e.$$protocol=n.protocol,e.$$host=n.hostname,e.$$port=$(n.port)||Wr[n.protocol]||null}function se(t,e){var n="/"!==t.charAt(0);n&&(t="/"+t);var r=Je(t);e.$$path=decodeURIComponent(n&&"/"===r.pathname.charAt(0)?r.pathname.substring(1):r.pathname),e.$$search=M(r.search),e.$$hash=decodeURIComponent(r.hash),e.$$path&&"/"!=e.$$path.charAt(0)&&(e.$$path="/"+e.$$path)}function ue(t,e){if(0===e.indexOf(t))return e.substr(t.length)}function ce(t){var e=t.indexOf("#");return-1==e?t:t.substr(0,e)}function le(t){return t.replace(/(#.+)|#$/,"$1")}function fe(i,o,a){this.$$html5=!0,a=a||"",ae(i,this),this.$$parse=function(t){var e=ue(o,t);if(!ut(e))throw Gr("ipthprfx",t,o);se(e,this),this.$$path||(this.$$path="/"),this.$$compose()},this.$$compose=function(){var t=r(this.$$search),e=this.$$hash?"#"+T(this.$$hash):"";this.$$url=oe(this.$$path)+(t?"?"+t:"")+e,this.$$absUrl=o+this.$$url.substr(1)},this.$$parseLinkUrl=function(t,e){return e&&"#"===e[0]?(this.hash(e.slice(1)),!0):(C(n=ue(i,t))?r=C(n=ue(a,r=n))?o+(ue("/",n)||n):i+r:C(n=ue(o,t))?r=o+n:o==t+"/"&&(r=o),r&&this.$$parse(r),!!r);var n,r}}function he(i,o,a){ae(i,this),this.$$parse=function(t){var e;at(n=ue(i,t)||ue(o,t))||"#"!==n.charAt(0)?this.$$html5?e=n:(e="",at(n)&&(i=t,this.replace())):at(e=ue(a,n))&&(e=n),se(e,this),t=this.$$path;var n=i,r=/^\/[A-Z]:(\/.*)/;0===e.indexOf(n)&&(e=e.replace(n,"")),r.exec(e)||(t=(e=r.exec(t))?e[1]:t),this.$$path=t,this.$$compose()},this.$$compose=function(){var t=r(this.$$search),e=this.$$hash?"#"+T(this.$$hash):"";this.$$url=oe(this.$$path)+(t?"?"+t:"")+e,this.$$absUrl=i+(this.$$url?a+this.$$url:"")},this.$$parseLinkUrl=function(t,e){return ce(i)==ce(t)&&(this.$$parse(t),!0)}}function pe(i,o,a){this.$$html5=!0,he.apply(this,arguments),this.$$parseLinkUrl=function(t,e){return e&&"#"===e[0]?(this.hash(e.slice(1)),!0):(i==ce(t)?n=t:(r=ue(o,t))?n=i+a+r:o===t+"/"&&(n=o),n&&this.$$parse(n),!!n);var n,r},this.$$compose=function(){var t=r(this.$$search),e=this.$$hash?"#"+T(this.$$hash):"";this.$$url=oe(this.$$path)+(t?"?"+t:"")+e,this.$$absUrl=i+a+this.$$url}}function $e(t){return function(){return this[t]}}function de(e,n){return function(t){return at(t)?this[e]:(this[e]=n(t),this.$$compose(),this)}}function me(){var $="",d={enabled:!1,requireBase:!0,rewriteLinks:!0};this.hashPrefix=function(t){return C(t)?($=t,this):$},this.html5Mode=function(t){return ft(t)?(d.enabled=t,this):st(t)?(ft(t.enabled)&&(d.enabled=t.enabled),ft(t.requireBase)&&(d.requireBase=t.requireBase),ft(t.rewriteLinks)&&(d.rewriteLinks=t.rewriteLinks),this):d},this.$get=["$rootScope","$browser","$sniffer","$rootElement","$window",function(a,s,e,i,o){function u(t,e,n){var r=l.url(),i=l.$$state;try{s.url(t,e,n),l.$$state=s.state()}catch(t){throw l.url(r),l.$$state=i,t}}function c(t,e){a.$broadcast("$locationChangeSuccess",l.absUrl(),t,l.$$state,e)}var l,t;t=s.baseHref();var n,r=s.url();if(d.enabled){if(!t&&d.requireBase)throw Gr("nobase");n=r.substring(0,r.indexOf("/",r.indexOf("//")+2))+(t||"/"),t=e.history?fe:pe}else n=ce(r),t=he;var f=n.substr(0,ce(n).lastIndexOf("/")+1);(l=new t(n,f,"#"+$)).$$parseLinkUrl(r,r),l.$$state=s.state();var h=/^\s*(javascript|mailto):/i;i.on("click",function(t){if(d.rewriteLinks&&!t.ctrlKey&&!t.metaKey&&!t.shiftKey&&2!=t.which&&2!=t.button){for(var e=Mn(t.target);"a"!==ht(e[0]);)if(e[0]===i[0]||!(e=e.parent())[0])return;var n=e.prop("href"),r=e.attr("href")||e.attr("xlink:href");st(n)&&"[object SVGAnimatedString]"===n.toString()&&(n=Je(n.animVal).href),h.test(n)||!n||e.attr("target")||t.isDefaultPrevented()||!l.$$parseLinkUrl(n,r)||(t.preventDefault(),l.absUrl()!=s.url()&&(a.$apply(),o.angular["ff-684208-preventDefault"]=!0))}}),le(l.absUrl())!=le(r)&&s.url(l.absUrl(),!0);var p=!0;return s.onUrlChange(function(r,i){at(ue(f,r))?o.location.href=r:(a.$evalAsync(function(){var t,e=l.absUrl(),n=l.$$state;r=le(r),l.$$parse(r),l.$$state=i,t=a.$broadcast("$locationChangeStart",r,e,i,n).defaultPrevented,l.absUrl()===r&&(t?(l.$$parse(e),u(e,!1,l.$$state=n)):(p=!1,c(e,n)))}),a.$$phase||a.$digest())}),a.$watch(function(){var n=le(s.url()),t=le(l.absUrl()),r=s.state(),i=l.$$replace,o=n!==t||l.$$html5&&e.history&&r!==l.$$state;(p||o)&&(p=!1,a.$evalAsync(function(){var t=l.absUrl(),e=a.$broadcast("$locationChangeStart",t,n,l.$$state,r).defaultPrevented;l.absUrl()===t&&(e?(l.$$parse(n),l.$$state=r):(o&&u(t,i,r===l.$$state?null:l.$$state),c(n,r)))})),l.$$replace=!1}),l}]}function ve(){var r=!0,i=this;this.debugEnabled=function(t){return C(t)?(r=t,this):r},this.$get=["$window",function(n){function t(t){var e=n.console||{},r=e[t]||e.log||I;t=!1;try{t=!!r.apply}catch(t){}return t?function(){var n=[];return it(arguments,function(t){var e;n.push(((e=t)instanceof Error&&(e.stack?e=e.message&&-1===e.stack.indexOf(e.message)?"Error: "+e.message+"\n"+e.stack:e.stack:e.sourceURL&&(e=e.message+"\n"+e.sourceURL+":"+e.line)),e))}),r.apply(e,n)}:function(t,e){r(t,null==e?"":e)}}return{log:t("log"),info:t("info"),warn:t("warn"),error:t("error"),debug:(e=t("debug"),function(){r&&e.apply(i,arguments)})};var e}]}function ge(t,e){if("__defineGetter__"===t||"__defineSetter__"===t||"__lookupGetter__"===t||"__lookupSetter__"===t||"__proto__"===t)throw Kr("isecfld",e);return t}function ye(t){return t+""}function be(t,e){if(t){if(t.constructor===t)throw Kr("isecfn",e);if(t.window===t)throw Kr("isecwindow",e);if(t.children&&(t.nodeName||t.prop&&t.attr&&t.find))throw Kr("isecdom",e);if(t===Object)throw Kr("isecobj",e)}return t}function we(t,e){if(t){if(t.constructor===t)throw Kr("isecfn",e);if(t===Yr||t===Zr||t===Xr)throw Kr("isecff",e)}}function xe(t,e){if(t&&(t===(0).constructor||t===(!1).constructor||t==="".constructor||t==={}.constructor||t===[].constructor||t===Function.constructor))throw Kr("isecaf",e)}function Se(t,e){return void 0!==t?t:e}function Ce(t,e){return void 0===t?e:void 0===e?t:t+e}function Ee(t,e){var n,r;switch(t.type){case ni.Program:n=!0,it(t.body,function(t){Ee(t.expression,e),n=n&&t.expression.constant}),t.constant=n;break;case ni.Literal:t.constant=!0,t.toWatch=[];break;case ni.UnaryExpression:Ee(t.argument,e),t.constant=t.argument.constant,t.toWatch=t.argument.toWatch;break;case ni.BinaryExpression:Ee(t.left,e),Ee(t.right,e),t.constant=t.left.constant&&t.right.constant,t.toWatch=t.left.toWatch.concat(t.right.toWatch);break;case ni.LogicalExpression:Ee(t.left,e),Ee(t.right,e),t.constant=t.left.constant&&t.right.constant,t.toWatch=t.constant?[]:[t];break;case ni.ConditionalExpression:Ee(t.test,e),Ee(t.alternate,e),Ee(t.consequent,e),t.constant=t.test.constant&&t.alternate.constant&&t.consequent.constant,t.toWatch=t.constant?[]:[t];break;case ni.Identifier:t.constant=!1,t.toWatch=[t];break;case ni.MemberExpression:Ee(t.object,e),t.computed&&Ee(t.property,e),t.constant=t.object.constant&&(!t.computed||t.property.constant),t.toWatch=[t];break;case ni.CallExpression:n=!!t.filter&&!e(t.callee.name).$stateful,r=[],it(t.arguments,function(t){Ee(t,e),n=n&&t.constant,t.constant||r.push.apply(r,t.toWatch)}),t.constant=n,t.toWatch=t.filter&&!e(t.callee.name).$stateful?r:[t];break;case ni.AssignmentExpression:Ee(t.left,e),Ee(t.right,e),t.constant=t.left.constant&&t.right.constant,t.toWatch=[t];break;case ni.ArrayExpression:n=!0,r=[],it(t.elements,function(t){Ee(t,e),n=n&&t.constant,t.constant||r.push.apply(r,t.toWatch)}),t.constant=n,t.toWatch=r;break;case ni.ObjectExpression:n=!0,r=[],it(t.properties,function(t){Ee(t.value,e),n=n&&t.value.constant,t.value.constant||r.push.apply(r,t.value.toWatch)}),t.constant=n,t.toWatch=r;break;case ni.ThisExpression:t.constant=!1,t.toWatch=[];break;case ni.LocalsExpression:t.constant=!1,t.toWatch=[]}}function ke(t){if(1==t.length){var e=(t=t[0].expression).toWatch;return 1!==e.length?e:e[0]!==t?e:rt}}function Ae(t){return t.type===ni.Identifier||t.type===ni.MemberExpression}function Oe(t){if(1===t.body.length&&Ae(t.body[0].expression))return{type:ni.AssignmentExpression,left:t.body[0].expression,right:{type:ni.NGValueParameter},operator:"="}}function Me(t){return 0===t.body.length||1===t.body.length&&(t.body[0].expression.type===ni.Literal||t.body[0].expression.type===ni.ArrayExpression||t.body[0].expression.type===ni.ObjectExpression)}function Te(t,e){this.astBuilder=t,this.$filter=e}function Ne(t,e){this.astBuilder=t,this.$filter=e}function Ve(t){return"constructor"==t}function je(t){return ct(t.valueOf)?t.valueOf():ii.call(t)}function De(){var g=gt(),y=gt(),n={true:!0,false:!1,null:null,undefined:rt};this.addLiteral=function(t,e){n[t]=e},this.$get=["$filter",function(u){function t(t,e,n){var r,i,o;switch(n=n||v,typeof t){case"string":o=t=t.trim();var a=n?y:g;if(!(r=a[o])){":"===t.charAt(0)&&":"===t.charAt(1)&&(i=!0,t=t.substring(2));var s=new ei(r=n?m:d);(r=new ri(s,u,r).parse(t)).constant?r.$$watchDelegate=p:i?r.$$watchDelegate=r.literal?f:l:r.inputs&&(r.$$watchDelegate=c),n&&(r=function t(o){function e(t,e,n,r){var i=v;v=!0;try{return o(t,e,n,r)}finally{v=i}}if(!o)return o;e.$$watchDelegate=o.$$watchDelegate;e.assign=t(o.assign);e.constant=o.constant;e.literal=o.literal;for(var n=0;o.inputs&&n<o.inputs.length;++n)o.inputs[n]=t(o.inputs[n]);e.inputs=o.inputs;return e}(r)),a[o]=r}return $(r,e);case"function":return $(t,e);default:return $(I,e)}}function h(t,e){return null==t||null==e?t===e:("object"!=typeof t||"object"!=typeof(t=je(t)))&&(t===e||t!=t&&e!=e)}function c(t,e,n,o,r){var a;if(1===(s=o.inputs).length){var i=h,s=s[0];return t.$watch(function(t){var e=s(t);return h(e,i)||(a=o(t,rt,rt,[e]),i=e&&je(e)),a},e,n,r)}for(var u=[],c=[],l=0,f=s.length;l<f;l++)u[l]=h,c[l]=null;return t.$watch(function(t){for(var e=!1,n=0,r=s.length;n<r;n++){var i=s[n](t);(e||(e=!h(i,u[n])))&&(c[n]=i,u[n]=i&&je(i))}return e&&(a=o(t,rt,rt,c)),a},e,n,r)}function l(t,r,e,n){var i,o;return i=t.$watch(function(t){return n(t)},function(t,e,n){o=t,ct(r)&&r.apply(this,arguments),C(t)&&n.$$postDigest(function(){C(o)&&i()})},e)}function f(t,r,e,n){function i(t){var e=!0;return it(t,function(t){C(t)||(e=!1)}),e}var o,a;return o=t.$watch(function(t){return n(t)},function(t,e,n){a=t,ct(r)&&r.call(this,t,e,n),i(t)&&n.$$postDigest(function(){i(a)&&o()})},e)}function p(t,e,n,r){var i;return i=t.$watch(function(t){return i(),r(t)},e,n)}function $(i,o){if(!o)return i;var t=i.$$watchDelegate,a=!1;t=t!==f&&t!==l?function(t,e,n,r){return n=a&&r?r[0]:i(t,e,n,r),o(n,t,e)}:function(t,e,n,r){return n=i(t,e,n,r),t=o(n,t,e),C(n)?t:n};return i.$$watchDelegate&&i.$$watchDelegate!==c?t.$$watchDelegate=i.$$watchDelegate:o.$stateful||(t.$$watchDelegate=c,a=!i.inputs,t.inputs=i.inputs?i.inputs:[i]),t}var e=Jn().noUnsafeEval,d={csp:e,expensiveChecks:!1,literals:E(n)},m={csp:e,expensiveChecks:!0,literals:E(n)},v=!1;return t.$$runningExpensiveChecks=function(){return v},t}]}function Pe(){this.$get=["$rootScope","$exceptionHandler",function(e,t){return Re(function(t){e.$evalAsync(t)},t)}]}function Ie(){this.$get=["$browser","$exceptionHandler",function(e,t){return Re(function(t){e.defer(t)},t)}]}function Re(t,a){function e(){this.$$state={status:0}}function o(e,n){return function(t){n.call(e,t)}}function s(o){!o.processScheduled&&o.pending&&(o.processScheduled=!0,t(function(){var t,e,n;n=o.pending,o.processScheduled=!1,o.pending=rt;for(var r=0,i=n.length;r<i;++r){e=n[r][0],t=n[r][o.status];try{ct(t)?e.resolve(t(o.value)):1===o.status?e.resolve(o.value):e.reject(o.value)}catch(t){e.reject(t),a(t)}}}))}function u(){this.promise=new e}var n=h("$q",TypeError);ot(e.prototype,{then:function(t,e,n){if(at(t)&&at(e)&&at(n))return this;var r=new u;return this.$$state.pending=this.$$state.pending||[],this.$$state.pending.push([r,t,e,n]),0<this.$$state.status&&s(this.$$state),r.promise},catch:function(t){return this.then(null,t)},finally:function(e,t){return this.then(function(t){return r(t,!0,e)},function(t){return r(t,!1,e)},t)}}),ot(u.prototype,{resolve:function(t){this.promise.$$state.status||(t===this.promise?this.$$reject(n("qcycle",t)):this.$$resolve(t))},$$resolve:function(t){function e(t){i||(i=!0,r.$$reject(t))}var n,r=this,i=!1;try{(st(t)||ct(t))&&(n=t&&t.then),ct(n)?(this.promise.$$state.status=-1,n.call(t,function(t){i||(i=!0,r.$$resolve(t))},e,o(this,this.notify))):(this.promise.$$state.value=t,this.promise.$$state.status=1,s(this.promise.$$state))}catch(t){e(t),a(t)}},reject:function(t){this.promise.$$state.status||this.$$reject(t)},$$reject:function(t){this.promise.$$state.value=t,this.promise.$$state.status=2,s(this.promise.$$state)},notify:function(i){var o=this.promise.$$state.pending;this.promise.$$state.status<=0&&o&&o.length&&t(function(){for(var t,e,n=0,r=o.length;n<r;n++){e=o[n][0],t=o[n][3];try{e.notify(ct(t)?t(i):i)}catch(t){a(t)}}})}});var i=function(t,e){var n=new u;return e?n.resolve(t):n.reject(t),n.promise},r=function(t,e,n){var r=null;try{ct(n)&&(r=n())}catch(t){return i(t,!1)}return r&&ct(r.then)?r.then(function(){return i(t,e)},function(t){return i(t,!1)}):i(t,e)},c=function(t,e,n,r){var i=new u;return i.resolve(t),i.promise.then(e,n,r)},l=function(t){if(!ct(t))throw n("norslvr",t);var e=new u;return t(function(t){e.resolve(t)},function(t){e.reject(t)}),e.promise};return l.prototype=e.prototype,l.defer=function(){var t=new u;return t.resolve=o(t,t.resolve),t.reject=o(t,t.reject),t.notify=o(t,t.notify),t},l.reject=function(t){var e=new u;return e.reject(t),e.promise},l.when=c,l.resolve=c,l.all=function(t){var n=new u,r=0,i=Hn(t)?[]:{};return it(t,function(t,e){r++,c(t).then(function(t){i.hasOwnProperty(e)||(i[e]=t,--r||n.resolve(i))},function(t){i.hasOwnProperty(e)||n.reject(t)})}),0===r&&n.resolve(i),n.promise},l}function Fe(){this.$get=["$window","$timeout",function(t,n){var r=t.requestAnimationFrame||t.webkitRequestAnimationFrame,i=t.cancelAnimationFrame||t.webkitCancelAnimationFrame||t.webkitCancelRequestAnimationFrame,e=!!r,o=e?function(t){var e=r(t);return function(){i(e)}}:function(t){var e=n(t,16.66,!1);return function(){n.cancel(e)}};return o.supported=e,o}]}function Ue(){var b=10,w=h("$rootScope"),x=null,S=null;this.digestTtl=function(t){return arguments.length&&(b=t),b},this.$get=["$exceptionHandler","$parse","$browser",function(f,$,h){function r(t){t.currentScope.$$destroyed=!0}function i(){this.$id=++Bn,this.$$phase=this.$parent=this.$$watchers=this.$$nextSibling=this.$$prevSibling=this.$$childHead=this.$$childTail=null,(this.$root=this).$$destroyed=!1,this.$$listeners={},this.$$listenerCount={},this.$$watchersCount=0,this.$$isolateBindings=null}function p(t){if(v.$$phase)throw w("inprog",v.$$phase);v.$$phase=t}function u(t,e){for(;t.$$watchersCount+=e,t=t.$parent;);}function o(t,e,n){for(;t.$$listenerCount[n]-=e,0===t.$$listenerCount[n]&&delete t.$$listenerCount[n],t=t.$parent;);}function d(){}function m(){for(;n.length;)try{n.shift()()}catch(t){f(t)}S=null}i.prototype={constructor:i,$new:function(t,e){var n;return e=e||this,t?(n=new i).$root=this.$root:(this.$$ChildScope||(this.$$ChildScope=function(t){function e(){this.$$watchers=this.$$nextSibling=this.$$childHead=this.$$childTail=null,this.$$listeners={},this.$$listenerCount={},this.$$watchersCount=0,this.$id=++Bn,this.$$ChildScope=null}return e.prototype=t,e}(this)),n=new this.$$ChildScope),n.$parent=e,n.$$prevSibling=e.$$childTail,e.$$childHead?(e.$$childTail.$$nextSibling=n,e.$$childTail=n):e.$$childHead=e.$$childTail=n,(t||e!=this)&&n.$on("$destroy",r),n},$watch:function(t,e,n,r){var i=$(t);if(i.$$watchDelegate)return i.$$watchDelegate(this,e,n,i,t);var o=this,a=o.$$watchers,s={fn:e,last:d,get:i,exp:r||t,eq:!!n};return x=null,ct(e)||(s.fn=I),a||(a=o.$$watchers=[]),a.unshift(s),u(this,1),function(){0<=pt(a,s)&&u(o,-1),x=null}},$watchGroup:function(t,r){function i(){c=!1,e?(e=!1,r(a,a,u)):r(a,o,u)}var o=Array(t.length),a=Array(t.length),s=[],u=this,c=!1,e=!0;if(t.length)return 1===t.length?this.$watch(t[0],function(t,e,n){a[0]=t,o[0]=e,r(a,t===e?a:o,n)}):(it(t,function(t,n){var e=u.$watch(t,function(t,e){a[n]=t,o[n]=e,c||(c=!0,u.$evalAsync(i))});s.push(e)}),function(){for(;s.length;)s.shift()()});var n=!0;return u.$evalAsync(function(){n&&r(a,a,u)}),function(){n=!1}},$watchCollection:function(t,e){function n(t){var e,n,r;if(!at(i=t)){if(st(i))if(O(i))for(o!==l&&(p=(o=l).length=0,u++),t=i.length,p!==t&&(u++,o.length=p=t),e=0;e<t;e++)r=o[e],n=i[e],r!=r&&n!=n||r===n||(u++,o[e]=n);else{for(e in o!==f&&(o=f={},p=0,u++),t=0,i)jn.call(i,e)&&(t++,n=i[e],r=o[e],e in o?r!=r&&n!=n||r===n||(u++,o[e]=n):(p++,o[e]=n,u++));if(t<p)for(e in u++,o)jn.call(i,e)||(p--,delete o[e])}else o!==i&&(o=i,u++);return u}}n.$stateful=!0;var i,o,r,a=this,s=1<e.length,u=0,c=$(t,n),l=[],f={},h=!0,p=0;return this.$watch(c,function(){if(h?(h=!1,e(i,i,a)):e(i,r,a),s)if(st(i))if(O(i)){r=Array(i.length);for(var t=0;t<i.length;t++)r[t]=i[t]}else for(t in r={},i)jn.call(i,t)&&(r[t]=i[t]);else r=i})},$digest:function(){var t,e,n,r,i,o,a,s,u,c=b,l=[];p("$digest"),h.$$checkUrlChange(),this===v&&null!==S&&(h.defer.cancel(S),m()),x=null;do{for(o=!1,a=this;g.length;){try{(u=g.shift()).scope.$eval(u.expression,u.locals)}catch(t){f(t)}x=null}t:do{if(r=a.$$watchers)for(i=r.length;i--;)try{if(t=r[i])if((e=(0,t.get)(a))===(n=t.last)||(t.eq?$t(e,n):"number"==typeof e&&"number"==typeof n&&isNaN(e)&&isNaN(n))){if(t===x){o=!1;break t}}else o=!0,(x=t).last=t.eq?E(e,null):e,(0,t.fn)(e,n===d?e:n,a),c<5&&(l[s=4-c]||(l[s]=[]),l[s].push({msg:ct(t.exp)?"fn: "+(t.exp.name||t.exp.toString()):t.exp,newVal:e,oldVal:n}))}catch(t){f(t)}if(!(r=a.$$watchersCount&&a.$$childHead||a!==this&&a.$$nextSibling))for(;a!==this&&!(r=a.$$nextSibling);)a=a.$parent}while(a=r);if((o||g.length)&&!c--)throw v.$$phase=null,w("infdig",b,l)}while(o||g.length);for(v.$$phase=null;y.length;)try{y.shift()()}catch(t){f(t)}},$destroy:function(){if(!this.$$destroyed){var t=this.$parent;for(var e in this.$broadcast("$destroy"),this.$$destroyed=!0,this===v&&h.$$applicationDestroyed(),u(this,-this.$$watchersCount),this.$$listenerCount)o(this,this.$$listenerCount[e],e);t&&t.$$childHead==this&&(t.$$childHead=this.$$nextSibling),t&&t.$$childTail==this&&(t.$$childTail=this.$$prevSibling),this.$$prevSibling&&(this.$$prevSibling.$$nextSibling=this.$$nextSibling),this.$$nextSibling&&(this.$$nextSibling.$$prevSibling=this.$$prevSibling),this.$destroy=this.$digest=this.$apply=this.$evalAsync=this.$applyAsync=I,this.$on=this.$watch=this.$watchGroup=function(){return I},this.$$listeners={},this.$$nextSibling=null,function t(e){9===On&&(e.$$childHead&&t(e.$$childHead),e.$$nextSibling&&t(e.$$nextSibling)),e.$parent=e.$$nextSibling=e.$$prevSibling=e.$$childHead=e.$$childTail=e.$root=e.$$watchers=null}(this)}},$eval:function(t,e){return $(t)(this,e)},$evalAsync:function(t,e){v.$$phase||g.length||h.defer(function(){g.length&&v.$digest()}),g.push({scope:this,expression:$(t),locals:e})},$$postDigest:function(t){y.push(t)},$apply:function(t){try{p("$apply");try{return this.$eval(t)}finally{v.$$phase=null}}catch(t){f(t)}finally{try{v.$digest()}catch(t){throw f(t),t}}},$applyAsync:function(t){var e=this;t&&n.push(function(){e.$eval(t)}),t=$(t),null===S&&(S=h.defer(function(){v.$apply(m)}))},$on:function(e,n){var r=this.$$listeners[e];r||(this.$$listeners[e]=r=[]),r.push(n);for(var t=this;t.$$listenerCount[e]||(t.$$listenerCount[e]=0),t.$$listenerCount[e]++,t=t.$parent;);var i=this;return function(){var t=r.indexOf(n);-1!==t&&(r[t]=null,o(i,1,e))}},$emit:function(t,e){var n,r,i,o=[],a=this,s=!1,u={name:t,targetScope:a,stopPropagation:function(){s=!0},preventDefault:function(){u.defaultPrevented=!0},defaultPrevented:!1},c=k([u],arguments,1);do{for(n=a.$$listeners[t]||o,u.currentScope=a,r=0,i=n.length;r<i;r++)if(n[r])try{n[r].apply(null,c)}catch(t){f(t)}else n.splice(r,1),r--,i--;if(s)return u.currentScope=null,u;a=a.$parent}while(a);return u.currentScope=null,u},$broadcast:function(t,e){var n=this,r=this,i={name:t,targetScope:this,preventDefault:function(){i.defaultPrevented=!0},defaultPrevented:!1};if(!this.$$listenerCount[t])return i;for(var o,a,s=k([i],arguments,1);n=r;){for(o=0,a=(r=(i.currentScope=n).$$listeners[t]||[]).length;o<a;o++)if(r[o])try{r[o].apply(null,s)}catch(t){f(t)}else r.splice(o,1),o--,a--;if(!(r=n.$$listenerCount[t]&&n.$$childHead||n!==this&&n.$$nextSibling))for(;n!==this&&!(r=n.$$nextSibling);)n=n.$parent}return i.currentScope=null,i}};var v=new i,g=v.$$asyncQueue=[],y=v.$$postDigestQueue=[],n=v.$$applyAsyncQueue=[];return v}]}function qe(){var i=/^\s*(https?|ftp|mailto|tel|file):/,o=/^\s*((https?|ftp|file|blob):|data:image\/)/;this.aHrefSanitizationWhitelist=function(t){return C(t)?(i=t,this):i},this.imgSrcSanitizationWhitelist=function(t){return C(t)?(o=t,this):o},this.$get=function(){return function(t,e){var n,r=e?o:i;return""===(n=Je(t).href)||n.match(r)?t:"unsafe:"+n}}}function _e(t){var e=[];return C(t)&&it(t,function(t){e.push(function(t){if("self"===t)return t;if(ut(t)){if(-1<t.indexOf("***"))throw oi("iwcard",t);return t=Gn(t).replace("\\*\\*",".*").replace("\\*","[^:/.?&;]*"),new RegExp("^"+t+"$")}if(d(t))return new RegExp("^"+t.source+"$");throw oi("imatcher")}(t))}),e}function Le(){this.SCE_CONTEXTS=ai;var c=["self"],l=[];this.resourceUrlWhitelist=function(t){return arguments.length&&(c=_e(t)),c},this.resourceUrlBlacklist=function(t){return arguments.length&&(l=_e(t)),l},this.$get=["$injector",function(t){function a(t,e){return"self"===t?Ke(e):!!t.exec(e.href)}function e(t){var e=function(t){this.$$unwrapTrustedValue=function(){return t}};return t&&(e.prototype=new t),e.prototype.valueOf=function(){return this.$$unwrapTrustedValue()},e.prototype.toString=function(){return this.$$unwrapTrustedValue().toString()},e}var s=function(t){throw oi("unsafe")};t.has("$sanitize")&&(s=t.get("$sanitize"));var n=e(),u={};return u[ai.HTML]=e(n),u[ai.CSS]=e(n),u[ai.URL]=e(n),u[ai.JS]=e(n),u[ai.RESOURCE_URL]=e(u[ai.URL]),{trustAs:function(t,e){var n=u.hasOwnProperty(t)?u[t]:null;if(!n)throw oi("icontext",t,e);if(null===e||at(e)||""===e)return e;if("string"!=typeof e)throw oi("itype",t);return new n(e)},getTrusted:function(t,e){if(null===e||at(e)||""===e)return e;if((i=u.hasOwnProperty(t)?u[t]:null)&&e instanceof i)return e.$$unwrapTrustedValue();if(t===ai.RESOURCE_URL){var n,r,i=Je(e.toString()),o=!1;for(n=0,r=c.length;n<r;n++)if(a(c[n],i)){o=!0;break}if(o)for(n=0,r=l.length;n<r;n++)if(a(l[n],i)){o=!1;break}if(o)return e;throw oi("insecurl",e.toString())}if(t===ai.HTML)return s(e);throw oi("unsafe")},valueOf:function(t){return t instanceof n?t.$$unwrapTrustedValue():t}}}]}function Be(){var e=!0;this.enabled=function(t){return arguments.length&&(e=!!t),e},this.$get=["$parse","$sceDelegate",function(r,t){if(e&&On<8)throw oi("iequirks");var i=w(ai);i.isEnabled=function(){return e},i.trustAs=t.trustAs,i.getTrusted=t.getTrusted,i.valueOf=t.valueOf,e||(i.trustAs=i.getTrusted=function(t,e){return e},i.valueOf=R),i.parseAs=function(e,t){var n=r(t);return n.literal&&n.constant?n:r(t,function(t){return i.getTrusted(e,t)})};var o=i.parseAs,a=i.getTrusted,s=i.trustAs;return it(ai,function(e,t){var n=Dn(t);i[B("parse_as_"+n)]=function(t){return o(e,t)},i[B("get_trusted_"+n)]=function(t){return a(e,t)},i[B("trust_as_"+n)]=function(t){return s(e,t)}}),i}]}function He(){this.$get=["$window","$document",function(t,e){var n,r={},i=!(t.chrome&&t.chrome.app&&t.chrome.app.runtime)&&t.history&&t.history.pushState,o=$((/android (\d+)/.exec(Dn((t.navigator||{}).userAgent))||[])[1]),a=/Boxee/i.test((t.navigator||{}).userAgent),s=e[0]||{},u=/^(Moz|webkit|ms)(?=[A-Z])/,c=s.body&&s.body.style,l=!1,f=!1;if(c){for(var h in c)if(l=u.exec(h)){n=(n=l[0]).substr(0,1).toUpperCase()+n.substr(1);break}n||(n="WebkitOpacity"in c&&"webkit"),l=!!("transition"in c||n+"Transition"in c),f=!!("animation"in c||n+"Animation"in c),!o||l&&f||(l=ut(c.webkitTransition),f=ut(c.webkitAnimation))}return{history:!(!i||o<4||a),hasEvent:function(t){if("input"===t&&On<=11)return!1;if(at(r[t])){var e=s.createElement("div");r[t]="on"+t in e}return r[t]},csp:Jn(),vendorPrefix:n,transitions:l,animations:f,android:o}}]}function ze(){var u;this.httpOptions=function(t){return t?(u=t,this):u},this.$get=["$templateCache","$http","$q","$sce",function(r,i,o,a){function s(e,n){s.totalPendingRequests++,ut(e)&&r.get(e)||(e=a.getTrustedResourceUrl(e));var t=i.defaults&&i.defaults.transformResponse;return Hn(t)?t=t.filter(function(t){return t!==Yt}):t===Yt&&(t=null),i.get(e,ot({cache:r,transformResponse:t},u)).finally(function(){s.totalPendingRequests--}).then(function(t){return r.put(e,t.data),t.data},function(t){if(!n)throw si("tpload",e,t.status,t.statusText);return o.reject(t)})}return s.totalPendingRequests=0,s}]}function We(){this.$get=["$rootScope","$browser","$location",function(e,n,r){return{findBindings:function(t,n,r){t=t.getElementsByClassName("ng-binding");var i=[];return it(t,function(e){var t=Ln.element(e).data("$binding");t&&it(t,function(t){r?new RegExp("(^|\\s)"+Gn(n)+"(\\s|\\||$)").test(t)&&i.push(e):-1!=t.indexOf(n)&&i.push(e)})}),i},findModels:function(t,e,n){for(var r=["ng-","data-ng-","ng\\:"],i=0;i<r.length;++i){var o=t.querySelectorAll("["+r[i]+"model"+(n?"=":"*=")+'"'+e+'"]');if(o.length)return o}},getLocation:function(){return r.url()},setLocation:function(t){t!==r.url()&&(r.url(t),e.$digest())},whenStable:function(t){n.notifyWhenNoOutstandingRequests(t)}}}]}function Ge(){this.$get=["$rootScope","$browser","$q","$$q","$exceptionHandler",function(u,c,l,f,h){function t(t,e,n){ct(t)||(n=e,e=t,t=I);var r,i=In.call(arguments,3),o=C(n)&&!n,a=(o?f:l).defer(),s=a.promise;return r=c.defer(function(){try{a.resolve(t.apply(null,i))}catch(t){a.reject(t),h(t)}finally{delete p[s.$$timeoutId]}o||u.$apply()},e),s.$$timeoutId=r,p[r]=a,s}var p={};return t.cancel=function(t){return!!(t&&t.$$timeoutId in p)&&(p[t.$$timeoutId].reject("canceled"),delete p[t.$$timeoutId],c.defer.cancel(t.$$timeoutId))},t}]}function Je(t){return On&&(ui.setAttribute("href",t),t=ui.href),ui.setAttribute("href",t),{href:ui.href,protocol:ui.protocol?ui.protocol.replace(/:$/,""):"",host:ui.host,search:ui.search?ui.search.replace(/^\?/,""):"",hash:ui.hash?ui.hash.replace(/^#/,""):"",hostname:ui.hostname,port:ui.port,pathname:"/"===ui.pathname.charAt(0)?ui.pathname:"/"+ui.pathname}}function Ke(t){return(t=ut(t)?Je(t):t).protocol===ci.protocol&&t.host===ci.host}function Ye(){this.$get=S(c)}function Ze(t){function o(e){try{return decodeURIComponent(e)}catch(t){return e}}var a=t[0]||{},s={},u="";return function(){var t,e,n,r,i;if((t=a.cookie||"")!==u)for(t=(u=t).split("; "),s={},n=0;n<t.length;n++)0<(r=(e=t[n]).indexOf("="))&&(i=o(e.substring(0,r)),at(s[i])&&(s[i]=o(e.substring(r+1))));return s}}function Xe(){this.$get=Ze}function Qe(r){function i(t,e){if(st(t)){var n={};return it(t,function(t,e){n[e]=i(e,t)}),n}return r.factory(t+"Filter",e)}this.register=i,this.$get=["$injector",function(e){return function(t){return e.get(t+"Filter")}}],i("currency",rn),i("date",pn),i("filter",tn),i("json",$n),i("limitTo",dn),i("lowercase",mi),i("number",on),i("orderBy",mn),i("uppercase",vi)}function tn(){return function(t,e,n){if(!O(t)){if(null==t)return t;throw h("filter")("notarray",t)}var r,i,o,a,s;switch(nn(e)){case"function":break;case"boolean":case"null":case"number":case"string":r=!0;case"object":o=n,a=r,s=st(i=e)&&"$"in i,!0===o?o=$t:ct(o)||(o=function(t,e){return!(at(t)||(null===t||null===e?t!==e:st(e)||st(t)&&!u(t)||(t=Dn(""+t),e=Dn(""+e),-1===t.indexOf(e))))}),e=function(t){return s&&!st(t)?en(t,i.$,o,!1):en(t,i,o,a)};break;default:return t}return Array.prototype.filter.call(t,e)}}function en(t,e,n,r,i){var o=nn(t),a=nn(e);if("string"===a&&"!"===e.charAt(0))return!en(t,e.substring(1),n,r);if(Hn(t))return t.some(function(t){return en(t,e,n,r)});switch(o){case"object":var s;if(r){for(s in t)if("$"!==s.charAt(0)&&en(t[s],e,n,!0))return!0;return!i&&en(t,e,n,!1)}if("object"!==a)return n(t,e);for(s in e)if(!ct(i=e[s])&&!at(i)&&!en((o="$"===s)?t:t[s],i,n,o,o))return!1;return!0;case"function":return!1;default:return n(t,e)}}function nn(t){return null===t?"null":typeof t}function rn(t){var r=t.NUMBER_FORMATS;return function(t,e,n){return at(e)&&(e=r.CURRENCY_SYM),at(n)&&(n=r.PATTERNS[1].maxFrac),null==t?t:an(t,r.PATTERNS[1],r.GROUP_SEP,r.DECIMAL_SEP,n).replace(/\u00A4/g,e)}}function on(t){var n=t.NUMBER_FORMATS;return function(t,e){return null==t?t:an(t,n.PATTERNS[0],n.GROUP_SEP,n.DECIMAL_SEP,e)}}function an(t,e,n,r,i){if(!ut(t)&&!y(t)||isNaN(t))return"";var o=!isFinite(t),a=!1,s=Math.abs(t)+"",u="";if(o)u="∞";else{for(function(t,e,n,r){var i=t.d,o=i.length-t.i;if(r=i[n=(e=at(e)?Math.min(Math.max(n,o),r):+e)+t.i],0<n){i.splice(Math.max(t.i,n));for(var a=n;a<i.length;a++)i[a]=0}else for(o=Math.max(0,o),t.i=1,i.length=Math.max(1,n=e+1),i[0]=0,a=1;a<n;a++)i[a]=0;if(5<=r)if(n-1<0){for(r=0;n<r;r--)i.unshift(0),t.i++;i.unshift(1),t.i++}else i[n-1]++;for(;o<Math.max(0,e);o++)i.push(0);(e=i.reduceRight(function(t,e,n,r){return e+=t,r[n]=e%10,Math.floor(e/10)},0))&&(i.unshift(e),t.i++)}(a=function(t){var e,n,r,i,o,a=0;for(-1<(n=t.indexOf(fi))&&(t=t.replace(fi,"")),0<(r=t.search(/e/i))?(n<0&&(n=r),n+=+t.slice(r+1),t=t.substring(0,r)):n<0&&(n=t.length),r=0;t.charAt(r)==hi;r++);if(r==(o=t.length))e=[0],n=1;else{for(o--;t.charAt(o)==hi;)o--;for(n-=r,e=[],i=0;r<=o;r++,i++)e[i]=+t.charAt(r)}return li<n&&(e=e.splice(0,li-1),a=n-1,n=1),{d:e,e:a,i:n}}(s),i,e.minFrac,e.maxFrac),u=a.d,s=a.i,i=a.e,o=[],a=u.reduce(function(t,e){return t&&!e},!0);s<0;)u.unshift(0),s++;for(0<s?o=u.splice(s):(o=u,u=[0]),s=[],u.length>=e.lgSize&&s.unshift(u.splice(-e.lgSize).join(""));u.length>e.gSize;)s.unshift(u.splice(-e.gSize).join(""));u.length&&s.unshift(u.join("")),u=s.join(n),o.length&&(u+=r+o.join("")),i&&(u+="e+"+i)}return t<0&&!a?e.negPre+u+e.negSuf:e.posPre+u+e.posSuf}function sn(t,e,n,r){var i="";for((t<0||r&&t<=0)&&(r?t=1-t:(t=-t,i="-")),t=""+t;t.length<e;)t=hi+t;return n&&(t=t.substr(t.length-e)),i+t}function un(e,n,r,i,o){return r=r||0,function(t){return t=t["get"+e](),(0<r||-r<t)&&(t+=r),0===t&&-12==r&&(t=12),sn(t,n,i,o)}}function cn(r,i,o){return function(t,e){var n=t["get"+r]();return e[Pn((o?"STANDALONE":"")+(i?"SHORT":"")+r)][n]}}function ln(t){var e=new Date(t,0,1).getDay();return new Date(t,0,(e<=4?5:12)-e)}function fn(n){return function(t){var e=ln(t.getFullYear());return t=+new Date(t.getFullYear(),t.getMonth(),t.getDate()+(4-t.getDay()))-+e,sn(t=1+Math.round(t/6048e5),n)}}function hn(t,e){return t.getFullYear()<=0?e.ERAS[0]:e.ERAS[1]}function pn(u){var c=/^(\d{4})-?(\d\d)-?(\d\d)(?:T(\d\d)(?::?(\d\d)(?::?(\d\d)(?:\.(\d+))?)?)?(Z|([+-])(\d\d):?(\d\d))?)?$/;return function(e,t,n){var r,i,o="",a=[];if(t=t||"mediumDate",t=u.DATETIME_FORMATS[t]||t,ut(e)&&(e=di.test(e)?$(e):function(t){var e;if(e=t.match(c)){t=new Date(0);var n=0,r=0,i=e[8]?t.setUTCFullYear:t.setFullYear,o=e[8]?t.setUTCHours:t.setHours;e[9]&&(n=$(e[9]+e[10]),r=$(e[9]+e[11])),i.call(t,$(e[1]),$(e[2])-1,$(e[3])),n=$(e[4]||0)-n,r=$(e[5]||0)-r,i=$(e[6]||0),e=Math.round(1e3*parseFloat("0."+(e[7]||0))),o.call(t,n,r,i,e)}return t}(e)),y(e)&&(e=new Date(e)),!g(e)||!isFinite(e.getTime()))return e;for(;t;)t=(i=$i.exec(t))?(a=k(a,i,1)).pop():(a.push(t),null);var s=e.getTimezoneOffset();return n&&(s=b(n,s),e=x(e,n,!0)),it(a,function(t){r=pi[t],o+=r?r(e,u.DATETIME_FORMATS,s):"''"===t?"'":t.replace(/(^'|'$)/g,"").replace(/''/g,"'")}),o}}function $n(){return function(t,e){return at(e)&&(e=2),A(t,e)}}function dn(){return function(t,e,n){return e=1/0===Math.abs(Number(e))?Number(e):$(e),isNaN(e)?t:(y(t)&&(t=t.toString()),Hn(t)||ut(t)?(n=(n=!n||isNaN(n)?0:$(n))<0?Math.max(0,t.length+n):n,0<=e?t.slice(n,n+e):0===n?t.slice(e,t.length):t.slice(Math.max(0,n+e),n)):t)}}function mn(o){function a(t){switch(typeof t){case"number":case"boolean":case"string":return!0;default:return!1}}return function(t,e,n){if(null==t)return t;if(!O(t))throw h("orderBy")("notarray",t);Hn(e)||(e=[e]),0===e.length&&(e=["+"]);var i,s=(i=(i=n)?-1:1,e.map(function(t){var e=1,n=R;if(ct(t))n=t;else if(ut(t)&&("+"!=t.charAt(0)&&"-"!=t.charAt(0)||(e="-"==t.charAt(0)?-1:1,t=t.substring(1)),""!==t&&(n=o(t)).constant)){var r=n();n=function(t){return t[r]}}return{get:n,descending:e*i}}));return s.push({get:function(){return{}},descending:n?-1:1}),(t=Array.prototype.map.call(t,function(n,r){return{value:n,predicateValues:s.map(function(t){var e=t.get(n);return t=typeof e,null===e?(t="string",e="null"):"string"===t?e=e.toLowerCase():"object"===t&&("function"==typeof e.valueOf&&a(e=e.valueOf())||u(e)&&a(e=e.toString())||(e=r)),{value:e,type:t}})}})).sort(function(t,e){for(var n=0,r=0,i=s.length;r<i;++r){n=t.predicateValues[r];var o=e.predicateValues[r],a=0;if(n.type===o.type?n.value!==o.value&&(a=n.value<o.value?-1:1):a=n.type<o.type?-1:1,n=a*s[r].descending)break}return n}),t.map(function(t){return t.value})}}function vn(t){return ct(t)&&(t={link:t}),t.restrict=t.restrict||"AC",S(t)}function gn(t,e,n,r,i){var o=this,a=[];o.$error={},o.$$success={},o.$pending=rt,o.$name=i(e.name||e.ngForm||"")(n),o.$dirty=!1,o.$pristine=!0,o.$valid=!0,o.$invalid=!1,o.$submitted=!1,o.$$parentForm=bi,o.$rollbackViewValue=function(){it(a,function(t){t.$rollbackViewValue()})},o.$commitViewValue=function(){it(a,function(t){t.$commitViewValue()})},o.$addControl=function(t){q(t.$name,"input"),a.push(t),t.$name&&(o[t.$name]=t),t.$$parentForm=o},o.$$renameControl=function(t,e){var n=t.$name;o[n]===t&&delete o[n],(o[e]=t).$name=e},o.$removeControl=function(n){n.$name&&o[n.$name]===n&&delete o[n.$name],it(o.$pending,function(t,e){o.$setValidity(e,null,n)}),it(o.$error,function(t,e){o.$setValidity(e,null,n)}),it(o.$$success,function(t,e){o.$setValidity(e,null,n)}),pt(a,n),n.$$parentForm=bi},kn({ctrl:this,$element:t,set:function(t,e,n){var r=t[e];r?-1===r.indexOf(n)&&r.push(n):t[e]=[n]},unset:function(t,e,n){var r=t[e];r&&(pt(r,n),0===r.length&&delete t[e])},$animate:r}),o.$setDirty=function(){r.removeClass(t,no),r.addClass(t,ro),o.$dirty=!0,o.$pristine=!1,o.$$parentForm.$setDirty()},o.$setPristine=function(){r.setClass(t,no,ro+" ng-submitted"),o.$dirty=!1,o.$pristine=!0,o.$submitted=!1,it(a,function(t){t.$setPristine()})},o.$setUntouched=function(){it(a,function(t){t.$setUntouched()})},o.$setSubmitted=function(){r.addClass(t,"ng-submitted"),o.$submitted=!0,o.$$parentForm.$setSubmitted()}}function yn(e){e.$formatters.push(function(t){return e.$isEmpty(t)?t:t.toString()})}function bn(t,n,r,i,e,o){var a=Dn(n[0].type);if(!e.android){var s=!1;n.on("compositionstart",function(){s=!0}),n.on("compositionend",function(){s=!1,c()})}var u,c=function(t){if(u&&(o.defer.cancel(u),u=null),!s){var e=n.val();t=t&&t.type,"password"===a||r.ngTrim&&"false"===r.ngTrim||(e=Wn(e)),(i.$viewValue!==e||""===e&&i.$$hasNativeValidators)&&i.$setViewValue(e,t)}};if(e.hasEvent("input"))n.on("input",c);else{var l=function(t,e,n){u||(u=o.defer(function(){u=null,e&&e.value===n||c(t)}))};n.on("keydown",function(t){var e=t.keyCode;91===e||15<e&&e<19||37<=e&&e<=40||l(t,this,this.value)}),e.hasEvent("paste")&&n.on("paste cut",l)}n.on("change",c),ji[a]&&i.$$hasNativeValidators&&a===r.type&&n.on("keydown wheel mousedown",function(t){if(!u){var e=this.validity,n=e.badInput,r=e.typeMismatch;u=o.defer(function(){u=null,e.badInput===n&&e.typeMismatch===r||c(t)})}}),i.$render=function(){var t=i.$isEmpty(i.$viewValue)?"":i.$viewValue;n.val()!==t&&n.val(t)}}function wn(i,o){return function(t,e){var n,r;if(g(t))return t;if(ut(t)){if('"'==t.charAt(0)&&'"'==t.charAt(t.length-1)&&(t=t.substring(1,t.length-1)),Ci.test(t))return new Date(t);if(i.lastIndex=0,n=i.exec(t))return n.shift(),r=e?{yyyy:e.getFullYear(),MM:e.getMonth()+1,dd:e.getDate(),HH:e.getHours(),mm:e.getMinutes(),ss:e.getSeconds(),sss:e.getMilliseconds()/1e3}:{yyyy:1970,MM:1,dd:1,HH:0,mm:0,ss:0,sss:0},it(n,function(t,e){e<o.length&&(r[o[e]]=+t)}),new Date(r.yyyy,r.MM-1,r.dd,r.HH,r.mm,r.ss||0,1e3*r.sss||0)}return NaN}}function xn(p,$,d,m){return function(t,e,n,r,i,o,a){function s(t){return t&&!(t.getTime&&t.getTime()!=t.getTime())}function u(t){return C(t)&&!g(t)?d(t)||rt:t}Sn(t,e,n,r),bn(0,e,n,r,i,o);var c,l,f,h=r&&r.$options&&r.$options.timezone;(r.$$parserName=p,r.$parsers.push(function(t){return r.$isEmpty(t)?null:$.test(t)?(t=d(t,c),h&&(t=x(t,h)),t):rt}),r.$formatters.push(function(t){if(t&&!g(t))throw oo("datefmt",t);return s(t)?((c=t)&&h&&(c=x(c,h,!0)),a("date")(t,m,h)):(c=null,"")}),C(n.min)||n.ngMin)&&(r.$validators.min=function(t){return!s(t)||at(l)||d(t)>=l},n.$observe("min",function(t){l=u(t),r.$validate()}));(C(n.max)||n.ngMax)&&(r.$validators.max=function(t){return!s(t)||at(f)||d(t)<=f},n.$observe("max",function(t){f=u(t),r.$validate()}))}}function Sn(t,n,e,r){(r.$$hasNativeValidators=st(n[0].validity))&&r.$parsers.push(function(t){var e=n.prop("validity")||{};return e.badInput||e.typeMismatch?rt:t})}function Cn(t,e,n,r,i){if(C(r)){if(!(t=t(r)).constant)throw oo("constexpr",n,r);return t(e)}return i}function En(h,p){return h="ngClass"+h,["$animate",function(c){function l(t,e){var n=[],r=0;t:for(;r<t.length;r++){for(var i=t[r],o=0;o<e.length;o++)if(i==e[o])continue t;n.push(i)}return n}function f(t){var n=[];return Hn(t)?(it(t,function(t){n=n.concat(f(t))}),n):ut(t)?t.split(" "):st(t)?(it(t,function(t,e){t&&(n=n.concat(e.split(" ")))}),n):t}return{restrict:"AC",link:function(i,o,a){function s(t,e){var n=o.data("$classCounts")||gt(),r=[];return it(t,function(t){(0<e||n[t])&&(n[t]=(n[t]||0)+e,n[t]===+(0<e)&&r.push(t))}),o.data("$classCounts",n),r.join(" ")}function e(t){if(!0===p||i.$index%2===p){var e=f(t||[]);if(u){if(!$t(t,u)){var n=f(u);r=l(e,n),e=l(n,e),r=s(r,1),e=s(e,-1);r&&r.length&&c.addClass(o,r),e&&e.length&&c.removeClass(o,e)}}else{var r=s(e,1);a.$addClass(r)}}u=w(t)}var u;i.$watch(a[h],e,!0),a.$observe("class",function(t){e(i.$eval(a[h]))}),"ngClass"!==h&&i.$watch("$index",function(t,e){var n=1&t;if(n!==(1&e)){var r=f(i.$eval(a[h]));n===p?(n=s(r,1),a.$addClass(n)):(n=s(r,-1),a.$removeClass(n))}})}}}]}function kn(t){function r(t,e){e&&!a[t]?(c.addClass(n,t),a[t]=!0):!e&&a[t]&&(c.removeClass(n,t),a[t]=!1)}function i(t,e){t=t?"-"+mt(t,"-"):"",r(to+t,!0===e),r(eo+t,!1===e)}var o=t.ctrl,n=t.$element,a={},s=t.set,u=t.unset,c=t.$animate;a[eo]=!(a[to]=n.hasClass(to)),o.$setValidity=function(t,e,n){at(e)?(o.$pending||(o.$pending={}),s(o.$pending,t,n)):(o.$pending&&u(o.$pending,t,n),An(o.$pending)&&(o.$pending=rt)),ft(e)?e?(u(o.$error,t,n),s(o.$$success,t,n)):(s(o.$error,t,n),u(o.$$success,t,n)):(u(o.$error,t,n),u(o.$$success,t,n)),o.$pending?(r(io,!0),o.$valid=o.$invalid=rt,i("",null)):(r(io,!1),o.$valid=An(o.$error),o.$invalid=!o.$valid,i("",o.$valid)),i(t,e=o.$pending&&o.$pending[t]?rt:!o.$error[t]&&(!!o.$$success[t]||null)),o.$$parentForm.$setValidity(t,e,o)}}function An(t){if(t)for(var e in t)if(t.hasOwnProperty(e))return!1;return!0}var On,Mn,Tn,Nn,Vn=/^\/(.+)\/([a-z]*)$/,jn=Object.prototype.hasOwnProperty,Dn=function(t){return ut(t)?t.toLowerCase():t},Pn=function(t){return ut(t)?t.toUpperCase():t},In=[].slice,Rn=[].splice,Fn=[].push,Un=Object.prototype.toString,qn=Object.getPrototypeOf,_n=h("ng"),Ln=c.angular||(c.angular={}),Bn=0;On=D.documentMode,I.$inject=[],R.$inject=[];var Hn=Array.isArray,zn=/^\[object (?:Uint8|Uint8Clamped|Uint16|Uint32|Int8|Int16|Int32|Float32|Float64)Array\]$/,Wn=function(t){return ut(t)?t.trim():t},Gn=function(t){return t.replace(/([-()\[\]{}+?*.$\^|,:#<!\\])/g,"\\$1").replace(/\x08/g,"\\x08")},Jn=function(){if(!C(Jn.rules)){var t=D.querySelector("[ng-csp]")||D.querySelector("[data-ng-csp]");if(t){var e=t.getAttribute("ng-csp")||t.getAttribute("data-ng-csp");Jn.rules={noUnsafeEval:!e||-1!==e.indexOf("no-unsafe-eval"),noInlineStyle:!e||-1!==e.indexOf("no-inline-style")}}else{t=Jn;try{new Function(""),e=!1}catch(t){e=!0}t.rules={noUnsafeEval:e,noInlineStyle:!1}}}return Jn.rules},Kn=function(){if(C(Kn.name_))return Kn.name_;var t,e,n,r,i=Zn.length;for(e=0;e<i;++e)if(n=Zn[e],t=D.querySelector("["+n.replace(":","\\:")+"jq]")){r=t.getAttribute(n+"jq");break}return Kn.name_=r},Yn=/:/g,Zn=["ng-","data-ng-","ng:","x-ng-"],Xn=/[A-Z]/g,Qn=!1,tr=3,er={full:"1.5.3",major:1,minor:5,dot:3,codeName:"diplohaplontic-meiosis"};W.expando="ng339";var nr=W.cache={},rr=1;W._data=function(t){return this.cache[t[this.expando]]||{}};var ir=/([\:\-\_]+(.))/g,or=/^moz([A-Z])/,ar={mouseleave:"mouseout",mouseenter:"mouseover"},sr=h("jqLite"),ur=/^<([\w-]+)\s*\/?>(?:<\/\1>|)$/,cr=/<|&#?\w+;/,lr=/<([\w:-]+)/,fr=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:-]+)[^>]*)\/>/gi,hr={option:[1,'<select multiple="multiple">',"</select>"],thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};hr.optgroup=hr.option,hr.tbody=hr.tfoot=hr.colgroup=hr.caption=hr.thead,hr.th=hr.td;var pr=Node.prototype.contains||function(t){return!!(16&this.compareDocumentPosition(t))},$r=W.prototype={ready:function(t){function e(){n||(n=!0,t())}var n=!1;"complete"===D.readyState?setTimeout(e):(this.on("DOMContentLoaded",e),W(c).on("load",e))},toString:function(){var e=[];return it(this,function(t){e.push(""+t)}),"["+e.join(", ")+"]"},eq:function(t){return Mn(0<=t?this[t]:this[this.length+t])},length:0,push:Fn,sort:[].sort,splice:[].splice},dr={};it("multiple selected checked disabled readOnly required open".split(" "),function(t){dr[Dn(t)]=t});var mr={};it("input select option textarea button form details".split(" "),function(t){mr[t]=!0});var vr={ngMinlength:"minlength",ngMaxlength:"maxlength",ngMin:"min",ngMax:"max",ngPattern:"pattern"};it({data:Z,removeData:K,hasData:function(t){for(var e in nr[t.ng339])return!0;return!1},cleanData:function(t){for(var e=0,n=t.length;e<n;e++)K(t[e])}},function(t,e){W[e]=t}),it({data:Z,inheritedData:wt,scope:function(t){return Mn.data(t,"$scope")||wt(t.parentNode||t,["$isolateScope","$scope"])},isolateScope:function(t){return Mn.data(t,"$isolateScope")||Mn.data(t,"$isolateScopeNoTemplate")},controller:nt,injector:function(t){return wt(t,"$injector")},removeAttr:function(t,e){t.removeAttribute(e)},hasClass:X,css:function(t,e,n){if(e=B(e),!C(n))return t.style[e];t.style[e]=n},attr:function(t,e,n){var r=t.nodeType;if(r!==tr&&2!==r&&8!==r)if(r=Dn(e),dr[r]){if(!C(n))return t[e]||(t.attributes.getNamedItem(e)||I).specified?r:rt;n?(t[e]=!0,t.setAttribute(e,r)):(t[e]=!1,t.removeAttribute(r))}else if(C(n))t.setAttribute(e,n);else if(t.getAttribute)return null===(t=t.getAttribute(e,2))?rt:t},prop:function(t,e,n){if(!C(n))return t[e];t[e]=n},text:function(){function t(t,e){if(at(e)){var n=t.nodeType;return 1===n||n===tr?t.textContent:""}t.textContent=e}return t.$dv="",t}(),val:function(t,e){if(at(e)){if(t.multiple&&"select"===ht(t)){var n=[];return it(t.options,function(t){t.selected&&n.push(t.value||t.text)}),0===n.length?null:n}return t.value}t.value=e},html:function(t,e){if(at(e))return t.innerHTML;G(t,!0),t.innerHTML=e},empty:xt},function(a,t){W.prototype[t]=function(t,e){var n,r,i=this.length;if(a!==xt&&at(2==a.length&&a!==X&&a!==nt?t:e)){if(st(t)){for(n=0;n<i;n++)if(a===Z)a(this[n],t);else for(r in t)a(this[n],r,t[r]);return this}for(i=at(n=a.$dv)?Math.min(i,1):i,r=0;r<i;r++){var o=a(this[r],t,e);n=n?n+o:o}return n}for(n=0;n<i;n++)a(this[n],t,e);return this}}),it({removeData:K,on:function(i,t,o,e){if(C(e))throw sr("onargs");if(H(i)){var a=(e=Y(i,!0)).events,s=e.handle;s||(s=e.handle=(c=a,(l=function(t,e){t.isDefaultPrevented=function(){return t.defaultPrevented};var n=c[e||t.type],r=n?n.length:0;if(r){if(at(t.immediatePropagationStopped)){var i=t.stopImmediatePropagation;t.stopImmediatePropagation=function(){t.immediatePropagationStopped=!0,t.stopPropagation&&t.stopPropagation(),i&&i.call(t)}}t.isImmediatePropagationStopped=function(){return!0===t.immediatePropagationStopped};var o=n.specialHandlerWrapper||Et;1<r&&(n=w(n));for(var a=0;a<r;a++)t.isImmediatePropagationStopped()||o(u,t,n[a])}}).elem=u=i,l));for(var n=(e=0<=t.indexOf(" ")?t.split(" "):[t]).length,r=function(t,e,n){var r=a[t];r||((r=a[t]=[]).specialHandlerWrapper=e,"$destroy"===t||n||i.addEventListener(t,s,!1)),r.push(o)};n--;)t=e[n],ar[t]?(r(ar[t],kt),r(t,rt,!0)):r(t)}var u,c,l},off:J,one:function(e,n,r){(e=Mn(e)).on(n,function t(){e.off(n,r),e.off(n,t)}),e.on(n,r)},replaceWith:function(e,t){var n,r=e.parentNode;G(e),it(new W(t),function(t){n?r.insertBefore(t,n.nextSibling):r.replaceChild(t,e),n=t})},children:function(t){var e=[];return it(t.childNodes,function(t){1===t.nodeType&&e.push(t)}),e},contents:function(t){return t.contentDocument||t.childNodes||[]},append:function(t,e){if(1===(n=t.nodeType)||11===n)for(var n=0,r=(e=new W(e)).length;n<r;n++)t.appendChild(e[n])},prepend:function(e,t){if(1===e.nodeType){var n=e.firstChild;it(new W(t),function(t){e.insertBefore(t,n)})}},wrap:function(t,e){yt(t,Mn(e).eq(0).clone()[0])},remove:St,detach:function(t){St(t,!0)},after:function(t,e){for(var n=t,r=t.parentNode,i=0,o=(e=new W(e)).length;i<o;i++){var a=e[i];r.insertBefore(a,n.nextSibling),n=a}},addClass:tt,removeClass:Q,toggleClass:function(n,t,r){t&&it(t.split(" "),function(t){var e=r;at(e)&&(e=!X(n,t)),(e?tt:Q)(n,t)})},parent:function(t){return(t=t.parentNode)&&11!==t.nodeType?t:null},next:function(t){return t.nextElementSibling},find:function(t,e){return t.getElementsByTagName?t.getElementsByTagName(e):[]},clone:bt,triggerHandler:function(e,t,n){var r,i,o=t.type||t,a=Y(e);(a=(a=a&&a.events)&&a[o])&&(r={preventDefault:function(){this.defaultPrevented=!0},isDefaultPrevented:function(){return!0===this.defaultPrevented},stopImmediatePropagation:function(){this.immediatePropagationStopped=!0},isImmediatePropagationStopped:function(){return!0===this.immediatePropagationStopped},stopPropagation:I,type:o,target:e},t.type&&(r=ot(r,t)),t=w(a),i=n?[r].concat(n):[r],it(t,function(t){r.isImmediatePropagationStopped()||t.apply(e,i)}))}},function(a,t){W.prototype[t]=function(t,e,n){for(var r,i=0,o=this.length;i<o;i++)at(r)?C(r=a(this[i],t,e,n))&&(r=Mn(r)):et(r,a(this[i],t,e,n));return C(r)?r:this},W.prototype.bind=W.prototype.on,W.prototype.unbind=W.prototype.off}),Mt.prototype={put:function(t,e){this[Ot(t,this.nextUid)]=e},get:function(t){return this[Ot(t,this.nextUid)]},remove:function(t){var e=this[t=Ot(t,this.nextUid)];return delete this[t],e}};var gr=[function(){this.$get=[function(){return Mt}]}],yr=/^([^\(]+?)=>/,br=/^[^\(]*\(\s*([^\)]*)\)/m,wr=/,/,xr=/^\s*(_?)(\S+?)\1\s*$/,Sr=/((\/\/.*$)|(\/\*[\s\S]*?\*\/))/gm,Cr=h("$injector");Nt.$$annotate=function(t,e,n){var r,i;if("function"==typeof t){if(!(r=t.$inject)){if(r=[],t.length){if(e)throw ut(n)&&n||(n=t.name||((i=Tt(i=t))?"function("+(i[1]||"").replace(/[\s\r\n]+/," ")+")":"fn")),Cr("strictdi",n);it((e=Tt(t))[1].split(wr),function(t){t.replace(xr,function(t,e,n){r.push(n)})})}t.$inject=r}}else Hn(t)?(U(t[e=t.length-1],"fn"),r=t.slice(0,e)):U(t,"fn",!0);return r};var Er=h("$animate"),kr=function(){this.$get=I},Ar=function(){var u=new Mt,c=[];this.$get=["$$AnimateRunner","$rootScope",function(i,o){function a(e,t,n){var r=!1;return t&&it(t=ut(t)?t.split(" "):Hn(t)?t:[],function(t){t&&(r=!0,e[t]=n)}),r}function s(){it(c,function(t){var e=u.get(t);if(e){var n=function(t){ut(t)&&(t=t.split(" "));var e=gt();return it(t,function(t){t.length&&(e[t]=!0)}),e}(t.attr("class")),r="",i="";it(e,function(t,e){t!==!!n[e]&&(t?r+=(r.length?" ":"")+e:i+=(i.length?" ":"")+e)}),it(t,function(t){r&&tt(t,r),i&&Q(t,i)}),u.remove(t)}}),c.length=0}return{enabled:I,on:I,off:I,pin:I,push:function(t,e,n,r){return r&&r(),(n=n||{}).from&&t.css(n.from),n.to&&t.css(n.to),(n.addClass||n.removeClass)&&(e=n.addClass,r=n.removeClass,e=a(n=u.get(t)||{},e,!0),r=a(n,r,!1),(e||r)&&(u.put(t,n),c.push(t),1===c.length&&o.$$postDigest(s))),(t=new i).complete(),t}}}]},Or=["$provide",function(r){var i=this;this.$$registeredAnimations=Object.create(null),this.register=function(t,e){if(t&&"."!==t.charAt(0))throw Er("notcsel",t);var n=t+"-animation";i.$$registeredAnimations[t.substr(1)]=n,r.factory(n,e)},this.classNameFilter=function(t){if(1===arguments.length&&(this.$$classNameFilter=t instanceof RegExp?t:null)&&/(\s+|\/)ng-animate(\s+|\/)/.test(this.$$classNameFilter.toString()))throw Er("nongcls","ng-animate");return this.$$classNameFilter},this.$get=["$$animateQueue",function(o){function i(t,e,n){if(n){var r;t:{for(r=0;r<n.length;r++){var i=n[r];if(1===i.nodeType){r=i;break t}}r=void 0}!r||r.parentNode||r.previousElementSibling||(n=null)}n?n.after(t):e.prepend(t)}return{on:o.on,off:o.off,pin:o.pin,enabled:o.enabled,cancel:function(t){t.end&&t.end()},enter:function(t,e,n,r){return e=e&&Mn(e),n=n&&Mn(n),i(t,e=e||n.parent(),n),o.push(t,"enter",Dt(r))},move:function(t,e,n,r){return e=e&&Mn(e),n=n&&Mn(n),i(t,e=e||n.parent(),n),o.push(t,"move",Dt(r))},leave:function(t,e){return o.push(t,"leave",Dt(e),function(){t.remove()})},addClass:function(t,e,n){return(n=Dt(n)).addClass=jt(n.addclass,e),o.push(t,"addClass",n)},removeClass:function(t,e,n){return(n=Dt(n)).removeClass=jt(n.removeClass,e),o.push(t,"removeClass",n)},setClass:function(t,e,n,r){return(r=Dt(r)).addClass=jt(r.addClass,e),r.removeClass=jt(r.removeClass,n),o.push(t,"setClass",r)},animate:function(t,e,n,r,i){return(i=Dt(i)).from=i.from?ot(i.from,e):e,i.to=i.to?ot(i.to,n):n,i.tempClasses=jt(i.tempClasses,r||"ng-inline-animate"),o.push(t,"animate",i)}}}]}],Mr=function(){this.$get=["$$rAF",function(e){function n(t){r.push(t),1<r.length||e(function(){for(var t=0;t<r.length;t++)r[t]();r=[]})}var r=[];return function(){var e=!1;return n(function(){e=!0}),function(t){e?t():n(t)}}}]},Tr=function(){this.$get=["$q","$sniffer","$$animateAsyncRun","$document","$timeout",function(e,t,r,i,o){function n(t){this.setHost(t);var n=r();this._doneCallbacks=[],this._tick=function(t){var e=i[0];e&&e.hidden?o(t,0,!1):n(t)},this._state=0}return n.chain=function(t,n){var r=0;!function e(){r===t.length?n(!0):t[r](function(t){!1===t?n(!1):(r++,e())})}()},n.all=function(e,n){function r(t){o=o&&t,++i===e.length&&n(o)}var i=0,o=!0;it(e,function(t){t.done(r)})},n.prototype={setHost:function(t){this.host=t||{}},done:function(t){2===this._state?t():this._doneCallbacks.push(t)},progress:I,getPromise:function(){if(!this.promise){var t=this;this.promise=e(function(e,n){t.done(function(t){!1===t?n():e()})})}return this.promise},then:function(t,e){return this.getPromise().then(t,e)},catch:function(t){return this.getPromise().catch(t)},finally:function(t){return this.getPromise().finally(t)},pause:function(){this.host.pause&&this.host.pause()},resume:function(){this.host.resume&&this.host.resume()},end:function(){this.host.end&&this.host.end(),this._resolve(!0)},cancel:function(){this.host.cancel&&this.host.cancel(),this._resolve(!1)},complete:function(t){var e=this;0===e._state&&(e._state=1,e._tick(function(){e._resolve(t)}))},_resolve:function(e){2!==this._state&&(it(this._doneCallbacks,function(t){t(e)}),this._doneCallbacks.length=0,this._state=2)}},n}]},Nr=function(){this.$get=["$$rAF","$q","$$AnimateRunner",function(a,t,s){return function(t,e){function n(){return a(function(){r.addClass&&(t.addClass(r.addClass),r.addClass=null),r.removeClass&&(t.removeClass(r.removeClass),r.removeClass=null),r.to&&(t.css(r.to),r.to=null),i||o.complete(),i=!0}),o}var r=e||{};r.$$prepared||(r=E(r)),r.cleanupStyles&&(r.from=r.to=null),r.from&&(t.css(r.from),r.from=null);var i,o=new s;return{start:n,end:n}}}]},Vr=h("$compile");Ut.$inject=["$provide","$$sanitizeUriProvider"];var jr=/^((?:x|data)[\:\-_])/i,Dr=h("$controller"),Pr=/^(\S+)(\s+as\s+([\w$]+))?$/,Ir=function(){this.$get=["$document",function(e){return function(t){return t?!t.nodeType&&t instanceof Mn&&(t=t[0]):t=e[0].body,t.offsetWidth+1}}]},Rr="application/json",Fr={"Content-Type":Rr+";charset=utf-8"},Ur=/^\[|^\{(?!\{)/,qr={"[":/]$/,"{":/}$/},_r=/^\)\]\}',?\n/,Lr=h("$http"),Br=function(t){return function(){throw Lr("legacy",t)}},Hr=Ln.$interpolateMinErr=h("$interpolate");Hr.throwNoconcat=function(t){throw Hr("noconcat",t)},Hr.interr=function(t,e){return Hr("interr",t,e.toString())};var zr=/^([^\?#]*)(\?([^#]*))?(#(.*))?$/,Wr={http:80,https:443,ftp:21},Gr=h("$location"),Jr={$$html5:!1,$$replace:!1,absUrl:$e("$$absUrl"),url:function(t){if(at(t))return this.$$url;var e=zr.exec(t);return(e[1]||""===t)&&this.path(decodeURIComponent(e[1])),(e[2]||e[1]||""===t)&&this.search(e[3]||""),this.hash(e[5]||""),this},protocol:$e("$$protocol"),host:$e("$$host"),port:$e("$$port"),path:de("$$path",function(t){return"/"==(t=null!==t?t.toString():"").charAt(0)?t:"/"+t}),search:function(n,t){switch(arguments.length){case 0:return this.$$search;case 1:if(ut(n)||y(n))n=n.toString(),this.$$search=M(n);else{if(!st(n))throw Gr("isrcharg");it(n=E(n,{}),function(t,e){null==t&&delete n[e]}),this.$$search=n}break;default:at(t)||null===t?delete this.$$search[n]:this.$$search[n]=t}return this.$$compose(),this},hash:de("$$hash",function(t){return null!==t?t.toString():""}),replace:function(){return this.$$replace=!0,this}};it([pe,he,fe],function(e){e.prototype=Object.create(Jr),e.prototype.state=function(t){if(!arguments.length)return this.$$state;if(e!==fe||!this.$$html5)throw Gr("nostate");return this.$$state=at(t)?null:t,this}});var Kr=h("$parse"),Yr=Function.prototype.call,Zr=Function.prototype.apply,Xr=Function.prototype.bind,Qr=gt();it("+ - * / % === !== == != < > <= >= && || ! = |".split(" "),function(t){Qr[t]=!0});var ti={n:"\n",f:"\f",r:"\r",t:"\t",v:"\v","'":"'",'"':'"'},ei=function(t){this.options=t};ei.prototype={constructor:ei,lex:function(t){for(this.text=t,this.index=0,this.tokens=[];this.index<this.text.length;)if('"'===(t=this.text.charAt(this.index))||"'"===t)this.readString(t);else if(this.isNumber(t)||"."===t&&this.isNumber(this.peek()))this.readNumber();else if(this.isIdent(t))this.readIdent();else if(this.is(t,"(){}[].,;:?"))this.tokens.push({index:this.index,text:t}),this.index++;else if(this.isWhitespace(t))this.index++;else{var e=t+this.peek(),n=e+this.peek(2),r=Qr[e],i=Qr[n];Qr[t]||r||i?(t=i?n:r?e:t,this.tokens.push({index:this.index,text:t,operator:!0}),this.index+=t.length):this.throwError("Unexpected next character ",this.index,this.index+1)}return this.tokens},is:function(t,e){return-1!==e.indexOf(t)},peek:function(t){return t=t||1,this.index+t<this.text.length&&this.text.charAt(this.index+t)},isNumber:function(t){return"0"<=t&&t<="9"&&"string"==typeof t},isWhitespace:function(t){return" "===t||"\r"===t||"\t"===t||"\n"===t||"\v"===t||" "===t},isIdent:function(t){return"a"<=t&&t<="z"||"A"<=t&&t<="Z"||"_"===t||"$"===t},isExpOperator:function(t){return"-"===t||"+"===t||this.isNumber(t)},throwError:function(t,e,n){throw n=n||this.index,e=C(e)?"s "+e+"-"+this.index+" ["+this.text.substring(e,n)+"]":" "+n,Kr("lexerr",t,e,this.text)},readNumber:function(){for(var t="",e=this.index;this.index<this.text.length;){var n=Dn(this.text.charAt(this.index));if("."==n||this.isNumber(n))t+=n;else{var r=this.peek();if("e"==n&&this.isExpOperator(r))t+=n;else if(this.isExpOperator(n)&&r&&this.isNumber(r)&&"e"==t.charAt(t.length-1))t+=n;else{if(!this.isExpOperator(n)||r&&this.isNumber(r)||"e"!=t.charAt(t.length-1))break;this.throwError("Invalid exponent")}}this.index++}this.tokens.push({index:e,text:t,constant:!0,value:Number(t)})},readIdent:function(){for(var t=this.index;this.index<this.text.length;){var e=this.text.charAt(this.index);if(!this.isIdent(e)&&!this.isNumber(e))break;this.index++}this.tokens.push({index:t,text:this.text.slice(t,this.index),identifier:!0})},readString:function(t){var e=this.index;this.index++;for(var n="",r=t,i=!1;this.index<this.text.length;){var o=this.text.charAt(this.index);r=r+o;if(i)"u"===o?((i=this.text.substring(this.index+1,this.index+5)).match(/[\da-f]{4}/i)||this.throwError("Invalid unicode escape [\\u"+i+"]"),this.index+=4,n+=String.fromCharCode(parseInt(i,16))):n+=ti[o]||o,i=!1;else if("\\"===o)i=!0;else{if(o===t)return this.index++,void this.tokens.push({index:e,text:r,constant:!0,value:n});n+=o}this.index++}this.throwError("Unterminated quote",e)}};var ni=function(t,e){this.lexer=t,this.options=e};ni.Program="Program",ni.ExpressionStatement="ExpressionStatement",ni.AssignmentExpression="AssignmentExpression",ni.ConditionalExpression="ConditionalExpression",ni.LogicalExpression="LogicalExpression",ni.BinaryExpression="BinaryExpression",ni.UnaryExpression="UnaryExpression",ni.CallExpression="CallExpression",ni.MemberExpression="MemberExpression",ni.Identifier="Identifier",ni.Literal="Literal",ni.ArrayExpression="ArrayExpression",ni.Property="Property",ni.ObjectExpression="ObjectExpression",ni.ThisExpression="ThisExpression",ni.LocalsExpression="LocalsExpression",ni.NGValueParameter="NGValueParameter",ni.prototype={ast:function(t){return this.text=t,this.tokens=this.lexer.lex(t),t=this.program(),0!==this.tokens.length&&this.throwError("is an unexpected token",this.tokens[0]),t},program:function(){for(var t=[];;)if(0<this.tokens.length&&!this.peek("}",")",";","]")&&t.push(this.expressionStatement()),!this.expect(";"))return{type:ni.Program,body:t}},expressionStatement:function(){return{type:ni.ExpressionStatement,expression:this.filterChain()}},filterChain:function(){for(var t=this.expression();this.expect("|");)t=this.filter(t);return t},expression:function(){return this.assignment()},assignment:function(){var t=this.ternary();return this.expect("=")&&(t={type:ni.AssignmentExpression,left:t,right:this.assignment(),operator:"="}),t},ternary:function(){var t,e,n=this.logicalOR();return this.expect("?")&&(t=this.expression(),this.consume(":"))?(e=this.expression(),{type:ni.ConditionalExpression,test:n,alternate:t,consequent:e}):n},logicalOR:function(){for(var t=this.logicalAND();this.expect("||");)t={type:ni.LogicalExpression,operator:"||",left:t,right:this.logicalAND()};return t},logicalAND:function(){for(var t=this.equality();this.expect("&&");)t={type:ni.LogicalExpression,operator:"&&",left:t,right:this.equality()};return t},equality:function(){for(var t,e=this.relational();t=this.expect("==","!=","===","!==");)e={type:ni.BinaryExpression,operator:t.text,left:e,right:this.relational()};return e},relational:function(){for(var t,e=this.additive();t=this.expect("<",">","<=",">=");)e={type:ni.BinaryExpression,operator:t.text,left:e,right:this.additive()};return e},additive:function(){for(var t,e=this.multiplicative();t=this.expect("+","-");)e={type:ni.BinaryExpression,operator:t.text,left:e,right:this.multiplicative()};return e},multiplicative:function(){for(var t,e=this.unary();t=this.expect("*","/","%");)e={type:ni.BinaryExpression,operator:t.text,left:e,right:this.unary()};return e},unary:function(){var t;return(t=this.expect("+","-","!"))?{type:ni.UnaryExpression,operator:t.text,prefix:!0,argument:this.unary()}:this.primary()},primary:function(){var t,e;for(this.expect("(")?(t=this.filterChain(),this.consume(")")):this.expect("[")?t=this.arrayDeclaration():this.expect("{")?t=this.object():this.selfReferential.hasOwnProperty(this.peek().text)?t=E(this.selfReferential[this.consume().text]):this.options.literals.hasOwnProperty(this.peek().text)?t={type:ni.Literal,value:this.options.literals[this.consume().text]}:this.peek().identifier?t=this.identifier():this.peek().constant?t=this.constant():this.throwError("not a primary expression",this.peek());e=this.expect("(","[",".");)"("===e.text?(t={type:ni.CallExpression,callee:t,arguments:this.parseArguments()},this.consume(")")):"["===e.text?(t={type:ni.MemberExpression,object:t,property:this.expression(),computed:!0},this.consume("]")):"."===e.text?t={type:ni.MemberExpression,object:t,property:this.identifier(),computed:!1}:this.throwError("IMPOSSIBLE");return t},filter:function(t){t=[t];for(var e={type:ni.CallExpression,callee:this.identifier(),arguments:t,filter:!0};this.expect(":");)t.push(this.expression());return e},parseArguments:function(){var t=[];if(")"!==this.peekToken().text)for(;t.push(this.expression()),this.expect(","););return t},identifier:function(){var t=this.consume();return t.identifier||this.throwError("is not a valid identifier",t),{type:ni.Identifier,name:t.text}},constant:function(){return{type:ni.Literal,value:this.consume().value}},arrayDeclaration:function(){var t=[];if("]"!==this.peekToken().text)do{if(this.peek("]"))break;t.push(this.expression())}while(this.expect(","));return this.consume("]"),{type:ni.ArrayExpression,elements:t}},object:function(){var t,e=[];if("}"!==this.peekToken().text)do{if(this.peek("}"))break;t={type:ni.Property,kind:"init"},this.peek().constant?t.key=this.constant():this.peek().identifier?t.key=this.identifier():this.throwError("invalid key",this.peek()),this.consume(":"),t.value=this.expression(),e.push(t)}while(this.expect(","));return this.consume("}"),{type:ni.ObjectExpression,properties:e}},throwError:function(t,e){throw Kr("syntax",e.text,t,e.index+1,this.text,this.text.substring(e.index))},consume:function(t){if(0===this.tokens.length)throw Kr("ueoe",this.text);var e=this.expect(t);return e||this.throwError("is unexpected, expecting ["+t+"]",this.peek()),e},peekToken:function(){if(0===this.tokens.length)throw Kr("ueoe",this.text);return this.tokens[0]},peek:function(t,e,n,r){return this.peekAhead(0,t,e,n,r)},peekAhead:function(t,e,n,r,i){if(this.tokens.length>t){var o=(t=this.tokens[t]).text;if(o===e||o===n||o===r||o===i||!(e||n||r||i))return t}return!1},expect:function(t,e,n,r){return!!(t=this.peek(t,e,n,r))&&(this.tokens.shift(),t)},selfReferential:{this:{type:ni.ThisExpression},$locals:{type:ni.LocalsExpression}}},Te.prototype={compile:function(t,e){var i=this,n=this.astBuilder.ast(t);this.state={nextId:0,filters:{},expensiveChecks:e,fn:{vars:[],body:[],own:{}},assign:{vars:[],body:[],own:{}},inputs:[]},Ee(n,i.$filter);var r,o="";return this.stage="assign",(r=Oe(n))&&(this.state.computing="assign",o=this.nextId(),this.recurse(r,o),this.return_(o),o="fn.assign="+this.generateFunction("assign","s,v,l")),r=ke(n.body),i.stage="inputs",it(r,function(t,e){var n="fn"+e;i.state[n]={vars:[],body:[],own:{}},i.state.computing=n;var r=i.nextId();i.recurse(t,r),i.return_(r),i.state.inputs.push(n),t.watchId=e}),this.state.computing="fn",this.stage="main",this.recurse(n),o='"'+this.USE+" "+this.STRICT+'";\n'+this.filterPrefix()+"var fn="+this.generateFunction("fn","s,l,a,i")+o+this.watchFns()+"return fn;",o=new Function("$filter","ensureSafeMemberName","ensureSafeObject","ensureSafeFunction","getStringValue","ensureSafeAssignContext","ifDefined","plus","text",o)(this.$filter,ge,be,we,ye,xe,Se,Ce,t),this.state=this.stage=rt,o.literal=Me(n),o.constant=n.constant,o},USE:"use",STRICT:"strict",watchFns:function(){var e=[],t=this.state.inputs,n=this;return it(t,function(t){e.push("var "+t+"="+n.generateFunction(t,"s"))}),t.length&&e.push("fn.inputs=["+t.join(",")+"];"),e.join("")},generateFunction:function(t,e){return"function("+e+"){"+this.varsPrefix(t)+this.body(t)+"};"},filterPrefix:function(){var n=[],r=this;return it(this.state.filters,function(t,e){n.push(t+"=$filter("+r.escape(e)+")")}),n.length?"var "+n.join(",")+";":""},varsPrefix:function(t){return this.state[t].vars.length?"var "+this.state[t].vars.join(",")+";":""},body:function(t){return this.state[t].body.join("")},recurse:function(n,t,e,r,i,o){var a,s,u,c,l=this;if(r=r||I,!o&&C(n.watchId))t=t||this.nextId(),this.if_("i",this.lazyAssign(t,this.computedMember("i",n.watchId)),this.lazyRecurse(n,t,e,r,i,!0));else switch(n.type){case ni.Program:it(n.body,function(t,e){l.recurse(t.expression,rt,rt,function(t){s=t}),e!==n.body.length-1?l.current().body.push(s,";"):l.return_(s)});break;case ni.Literal:c=this.escape(n.value),this.assign(t,c),r(c);break;case ni.UnaryExpression:this.recurse(n.argument,rt,rt,function(t){s=t}),c=n.operator+"("+this.ifDefined(s,0)+")",this.assign(t,c),r(c);break;case ni.BinaryExpression:this.recurse(n.left,rt,rt,function(t){a=t}),this.recurse(n.right,rt,rt,function(t){s=t}),c="+"===n.operator?this.plus(a,s):"-"===n.operator?this.ifDefined(a,0)+n.operator+this.ifDefined(s,0):"("+a+")"+n.operator+"("+s+")",this.assign(t,c),r(c);break;case ni.LogicalExpression:t=t||this.nextId(),l.recurse(n.left,t),l.if_("&&"===n.operator?t:l.not(t),l.lazyRecurse(n.right,t)),r(t);break;case ni.ConditionalExpression:t=t||this.nextId(),l.recurse(n.test,t),l.if_(t,l.lazyRecurse(n.alternate,t),l.lazyRecurse(n.consequent,t)),r(t);break;case ni.Identifier:t=t||this.nextId(),e&&(e.context="inputs"===l.stage?"s":this.assign(this.nextId(),this.getHasOwnProperty("l",n.name)+"?l:s"),e.computed=!1,e.name=n.name),ge(n.name),l.if_("inputs"===l.stage||l.not(l.getHasOwnProperty("l",n.name)),function(){l.if_("inputs"===l.stage||"s",function(){i&&1!==i&&l.if_(l.not(l.nonComputedMember("s",n.name)),l.lazyAssign(l.nonComputedMember("s",n.name),"{}")),l.assign(t,l.nonComputedMember("s",n.name))})},t&&l.lazyAssign(t,l.nonComputedMember("l",n.name))),(l.state.expensiveChecks||Ve(n.name))&&l.addEnsureSafeObject(t),r(t);break;case ni.MemberExpression:a=e&&(e.context=this.nextId())||this.nextId(),t=t||this.nextId(),l.recurse(n.object,a,rt,function(){l.if_(l.notNull(a),function(){i&&1!==i&&l.addEnsureSafeAssignContext(a),n.computed?(s=l.nextId(),l.recurse(n.property,s),l.getStringValue(s),l.addEnsureSafeMemberName(s),i&&1!==i&&l.if_(l.not(l.computedMember(a,s)),l.lazyAssign(l.computedMember(a,s),"{}")),c=l.ensureSafeObject(l.computedMember(a,s)),l.assign(t,c),e&&(e.computed=!0,e.name=s)):(ge(n.property.name),i&&1!==i&&l.if_(l.not(l.nonComputedMember(a,n.property.name)),l.lazyAssign(l.nonComputedMember(a,n.property.name),"{}")),c=l.nonComputedMember(a,n.property.name),(l.state.expensiveChecks||Ve(n.property.name))&&(c=l.ensureSafeObject(c)),l.assign(t,c),e&&(e.computed=!1,e.name=n.property.name))},function(){l.assign(t,"undefined")}),r(t)},!!i);break;case ni.CallExpression:t=t||this.nextId(),n.filter?(s=l.filter(n.callee.name),u=[],it(n.arguments,function(t){var e=l.nextId();l.recurse(t,e),u.push(e)}),c=s+"("+u.join(",")+")",l.assign(t,c),r(t)):(s=l.nextId(),a={},u=[],l.recurse(n.callee,s,a,function(){l.if_(l.notNull(s),function(){l.addEnsureSafeFunction(s),it(n.arguments,function(t){l.recurse(t,l.nextId(),rt,function(t){u.push(l.ensureSafeObject(t))})}),c=a.name?(l.state.expensiveChecks||l.addEnsureSafeObject(a.context),l.member(a.context,a.name,a.computed)+"("+u.join(",")+")"):s+"("+u.join(",")+")",c=l.ensureSafeObject(c),l.assign(t,c)},function(){l.assign(t,"undefined")}),r(t)}));break;case ni.AssignmentExpression:if(s=this.nextId(),a={},!Ae(n.left))throw Kr("lval");this.recurse(n.left,rt,a,function(){l.if_(l.notNull(a.context),function(){l.recurse(n.right,s),l.addEnsureSafeObject(l.member(a.context,a.name,a.computed)),l.addEnsureSafeAssignContext(a.context),c=l.member(a.context,a.name,a.computed)+n.operator+s,l.assign(t,c),r(t||c)})},1);break;case ni.ArrayExpression:u=[],it(n.elements,function(t){l.recurse(t,l.nextId(),rt,function(t){u.push(t)})}),c="["+u.join(",")+"]",this.assign(t,c),r(c);break;case ni.ObjectExpression:u=[],it(n.properties,function(e){l.recurse(e.value,l.nextId(),rt,function(t){u.push(l.escape(e.key.type===ni.Identifier?e.key.name:""+e.key.value)+":"+t)})}),c="{"+u.join(",")+"}",this.assign(t,c),r(c);break;case ni.ThisExpression:this.assign(t,"s"),r("s");break;case ni.LocalsExpression:this.assign(t,"l"),r("l");break;case ni.NGValueParameter:this.assign(t,"v"),r("v")}},getHasOwnProperty:function(t,e){var n=t+"."+e,r=this.current().own;return r.hasOwnProperty(n)||(r[n]=this.nextId(!1,t+"&&("+this.escape(e)+" in "+t+")")),r[n]},assign:function(t,e){if(t)return this.current().body.push(t,"=",e,";"),t},filter:function(t){return this.state.filters.hasOwnProperty(t)||(this.state.filters[t]=this.nextId(!0)),this.state.filters[t]},ifDefined:function(t,e){return"ifDefined("+t+","+this.escape(e)+")"},plus:function(t,e){return"plus("+t+","+e+")"},return_:function(t){this.current().body.push("return ",t,";")},if_:function(t,e,n){if(!0===t)e();else{var r=this.current().body;r.push("if(",t,"){"),e(),r.push("}"),n&&(r.push("else{"),n(),r.push("}"))}},not:function(t){return"!("+t+")"},notNull:function(t){return t+"!=null"},nonComputedMember:function(t,e){return t+"."+e},computedMember:function(t,e){return t+"["+e+"]"},member:function(t,e,n){return n?this.computedMember(t,e):this.nonComputedMember(t,e)},addEnsureSafeObject:function(t){this.current().body.push(this.ensureSafeObject(t),";")},addEnsureSafeMemberName:function(t){this.current().body.push(this.ensureSafeMemberName(t),";")},addEnsureSafeFunction:function(t){this.current().body.push(this.ensureSafeFunction(t),";")},addEnsureSafeAssignContext:function(t){this.current().body.push(this.ensureSafeAssignContext(t),";")},ensureSafeObject:function(t){return"ensureSafeObject("+t+",text)"},ensureSafeMemberName:function(t){return"ensureSafeMemberName("+t+",text)"},ensureSafeFunction:function(t){return"ensureSafeFunction("+t+",text)"},getStringValue:function(t){this.assign(t,"getStringValue("+t+")")},ensureSafeAssignContext:function(t){return"ensureSafeAssignContext("+t+",text)"},lazyRecurse:function(t,e,n,r,i,o){var a=this;return function(){a.recurse(t,e,n,r,i,o)}},lazyAssign:function(t,e){var n=this;return function(){n.assign(t,e)}},stringEscapeRegex:/[^ a-zA-Z0-9]/g,stringEscapeFn:function(t){return"\\u"+("0000"+t.charCodeAt(0).toString(16)).slice(-4)},escape:function(t){if(ut(t))return"'"+t.replace(this.stringEscapeRegex,this.stringEscapeFn)+"'";if(y(t))return t.toString();if(!0===t)return"true";if(!1===t)return"false";if(null===t)return"null";if(void 0===t)return"undefined";throw Kr("esc")},nextId:function(t,e){var n="v"+this.state.nextId++;return t||this.current().vars.push(n+(e?"="+e:"")),n},current:function(){return this.state[this.state.computing]}},Ne.prototype={compile:function(t,e){var n,r,i,o=this,a=this.astBuilder.ast(t);this.expression=t,this.expensiveChecks=e,Ee(a,o.$filter),(n=Oe(a))&&(r=this.recurse(n)),(n=ke(a.body))&&(i=[],it(n,function(t,e){var n=o.recurse(t);t.input=n,i.push(n),t.watchId=e}));var s=[];return it(a.body,function(t){s.push(o.recurse(t.expression))}),n=0===a.body.length?I:1===a.body.length?s[0]:function(e,n){var r;return it(s,function(t){r=t(e,n)}),r},r&&(n.assign=function(t,e,n){return r(t,n,e)}),i&&(n.inputs=i),n.literal=Me(a),n.constant=a.constant,n},recurse:function(t,s,e){var o,u,c,l=this;if(t.input)return this.inputs(t.input,t.watchId);switch(t.type){case ni.Literal:return this.value(t.value,s);case ni.UnaryExpression:return u=this.recurse(t.argument),this["unary"+t.operator](u,s);case ni.BinaryExpression:case ni.LogicalExpression:return o=this.recurse(t.left),u=this.recurse(t.right),this["binary"+t.operator](o,u,s);case ni.ConditionalExpression:return this["ternary?:"](this.recurse(t.test),this.recurse(t.alternate),this.recurse(t.consequent),s);case ni.Identifier:return ge(t.name,l.expression),l.identifier(t.name,l.expensiveChecks||Ve(t.name),s,e,l.expression);case ni.MemberExpression:return o=this.recurse(t.object,!1,!!e),t.computed||(ge(t.property.name,l.expression),u=t.property.name),t.computed&&(u=this.recurse(t.property)),t.computed?this.computedMember(o,u,s,e,l.expression):this.nonComputedMember(o,u,l.expensiveChecks,s,e,l.expression);case ni.CallExpression:return c=[],it(t.arguments,function(t){c.push(l.recurse(t))}),t.filter&&(u=this.$filter(t.callee.name)),t.filter||(u=this.recurse(t.callee,!0)),t.filter?function(t,e,n,r){for(var i=[],o=0;o<c.length;++o)i.push(c[o](t,e,n,r));return t=u.apply(rt,i,r),s?{context:rt,name:rt,value:t}:t}:function(t,e,n,r){var i,o=u(t,e,n,r);if(null!=o.value){be(o.context,l.expression),we(o.value,l.expression),i=[];for(var a=0;a<c.length;++a)i.push(be(c[a](t,e,n,r),l.expression));i=be(o.value.apply(o.context,i),l.expression)}return s?{value:i}:i};case ni.AssignmentExpression:return o=this.recurse(t.left,!0,1),u=this.recurse(t.right),function(t,e,n,r){var i=o(t,e,n,r);return t=u(t,e,n,r),be(i.value,l.expression),xe(i.context),i.context[i.name]=t,s?{value:t}:t};case ni.ArrayExpression:return c=[],it(t.elements,function(t){c.push(l.recurse(t))}),function(t,e,n,r){for(var i=[],o=0;o<c.length;++o)i.push(c[o](t,e,n,r));return s?{value:i}:i};case ni.ObjectExpression:return c=[],it(t.properties,function(t){c.push({key:t.key.type===ni.Identifier?t.key.name:""+t.key.value,value:l.recurse(t.value)})}),function(t,e,n,r){for(var i={},o=0;o<c.length;++o)i[c[o].key]=c[o].value(t,e,n,r);return s?{value:i}:i};case ni.ThisExpression:return function(t){return s?{value:t}:t};case ni.LocalsExpression:return function(t,e){return s?{value:e}:e};case ni.NGValueParameter:return function(t,e,n){return s?{value:n}:n}}},"unary+":function(i,o){return function(t,e,n,r){return t=C(t=i(t,e,n,r))?+t:0,o?{value:t}:t}},"unary-":function(i,o){return function(t,e,n,r){return t=C(t=i(t,e,n,r))?-t:0,o?{value:t}:t}},"unary!":function(i,o){return function(t,e,n,r){return t=!i(t,e,n,r),o?{value:t}:t}},"binary+":function(o,a,s){return function(t,e,n,r){var i=o(t,e,n,r);return i=Ce(i,t=a(t,e,n,r)),s?{value:i}:i}},"binary-":function(o,a,s){return function(t,e,n,r){var i=o(t,e,n,r);return t=a(t,e,n,r),i=(C(i)?i:0)-(C(t)?t:0),s?{value:i}:i}},"binary*":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)*o(t,e,n,r),a?{value:t}:t}},"binary/":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)/o(t,e,n,r),a?{value:t}:t}},"binary%":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)%o(t,e,n,r),a?{value:t}:t}},"binary===":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)===o(t,e,n,r),a?{value:t}:t}},"binary!==":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)!==o(t,e,n,r),a?{value:t}:t}},"binary==":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)==o(t,e,n,r),a?{value:t}:t}},"binary!=":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)!=o(t,e,n,r),a?{value:t}:t}},"binary<":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)<o(t,e,n,r),a?{value:t}:t}},"binary>":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)>o(t,e,n,r),a?{value:t}:t}},"binary<=":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)<=o(t,e,n,r),a?{value:t}:t}},"binary>=":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)>=o(t,e,n,r),a?{value:t}:t}},"binary&&":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)&&o(t,e,n,r),a?{value:t}:t}},"binary||":function(i,o,a){return function(t,e,n,r){return t=i(t,e,n,r)||o(t,e,n,r),a?{value:t}:t}},"ternary?:":function(i,o,a,s){return function(t,e,n,r){return t=i(t,e,n,r)?o(t,e,n,r):a(t,e,n,r),s?{value:t}:t}},value:function(t,e){return function(){return e?{context:rt,name:rt,value:t}:t}},identifier:function(i,o,a,s,u){return function(t,e,n,r){return t=e&&i in e?e:t,s&&1!==s&&t&&!t[i]&&(t[i]={}),e=t?t[i]:rt,o&&be(e,u),a?{context:t,name:i,value:e}:e}},computedMember:function(s,u,c,l,f){return function(t,e,n,r){var i,o,a=s(t,e,n,r);return null!=a&&(i=u(t,e,n,r),ge(i+="",f),l&&1!==l&&(xe(a),a&&!a[i]&&(a[i]={})),be(o=a[i],f)),c?{context:a,name:i,value:o}:o}},nonComputedMember:function(i,o,a,s,u,c){return function(t,e,n,r){return t=i(t,e,n,r),u&&1!==u&&(xe(t),t&&!t[o]&&(t[o]={})),e=null!=t?t[o]:rt,(a||Ve(o))&&be(e,c),s?{context:t,name:o,value:e}:e}},inputs:function(i,o){return function(t,e,n,r){return r?r[o]:i(t,e,n)}}};var ri=function(t,e,n){this.lexer=t,this.$filter=e,this.options=n,this.ast=new ni(t,n),this.astCompiler=n.csp?new Ne(this.ast,e):new Te(this.ast,e)};ri.prototype={constructor:ri,parse:function(t){return this.astCompiler.compile(t,this.options.expensiveChecks)}};var ii=Object.prototype.valueOf,oi=h("$sce"),ai={HTML:"html",CSS:"css",URL:"url",RESOURCE_URL:"resourceUrl",JS:"js"},si=h("$compile"),ui=D.createElement("a"),ci=Je(c.location.href);Ze.$inject=["$document"],Qe.$inject=["$provide"];var li=22,fi=".",hi="0";rn.$inject=["$locale"];var pi={yyyy:un("FullYear",4,0,!(on.$inject=["$locale"]),!0),yy:un("FullYear",2,0,!0,!0),y:un("FullYear",1,0,!1,!0),MMMM:cn("Month"),MMM:cn("Month",!0),MM:un("Month",2,1),M:un("Month",1,1),LLLL:cn("Month",!1,!0),dd:un("Date",2),d:un("Date",1),HH:un("Hours",2),H:un("Hours",1),hh:un("Hours",2,-12),h:un("Hours",1,-12),mm:un("Minutes",2),m:un("Minutes",1),ss:un("Seconds",2),s:un("Seconds",1),sss:un("Milliseconds",3),EEEE:cn("Day"),EEE:cn("Day",!0),a:function(t,e){return t.getHours()<12?e.AMPMS[0]:e.AMPMS[1]},Z:function(t,e,n){return(0<=(t=-1*n)?"+":"")+(sn(Math[0<t?"floor":"ceil"](t/60),2)+sn(Math.abs(t%60),2))},ww:fn(2),w:fn(1),G:hn,GG:hn,GGG:hn,GGGG:function(t,e){return t.getFullYear()<=0?e.ERANAMES[0]:e.ERANAMES[1]}},$i=/((?:[^yMLdHhmsaZEwG']+)|(?:'(?:[^']|'')*')|(?:E+|y+|M+|L+|d+|H+|h+|m+|s+|a|Z|G+|w+))(.*)/,di=/^\-?\d+$/;pn.$inject=["$locale"];var mi=S(Dn),vi=S(Pn);mn.$inject=["$parse"];var gi=S({restrict:"E",compile:function(t,e){if(!e.href&&!e.xlinkHref)return function(t,e){if("a"===e[0].nodeName.toLowerCase()){var n="[object SVGAnimatedString]"===Un.call(e.prop("href"))?"xlink:href":"href";e.on("click",function(t){e.attr(n)||t.preventDefault()})}}}}),yi={};it(dr,function(t,r){function i(t,e,n){t.$watch(n[o],function(t){n.$set(r,!!t)})}if("multiple"!=t){var o=qt("ng-"+r),e=i;"checked"===t&&(e=function(t,e,n){n.ngModel!==n[o]&&i(t,0,n)}),yi[o]=function(){return{restrict:"A",priority:100,link:e}}}}),it(vr,function(t,r){yi[r]=function(){return{priority:100,link:function(t,e,n){"ngPattern"===r&&"/"==n.ngPattern.charAt(0)&&(e=n.ngPattern.match(Vn))?n.$set("ngPattern",new RegExp(e[1],e[2])):t.$watch(n[r],function(t){n.$set(r,t)})}}}}),it(["src","srcset","href"],function(o){var a=qt("ng-"+o);yi[a]=function(){return{priority:99,link:function(t,e,n){var r=o,i=o;"href"===o&&"[object SVGAnimatedString]"===Un.call(e.prop("href"))&&(i="xlinkHref",n.$attr[i]="xlink:href",r=null),n.$observe(a,function(t){t?(n.$set(i,t),On&&r&&e.prop(r,n[i])):"href"===o&&n.$set(i,null)})}}}});var bi={$addControl:I,$$renameControl:function(t,e){t.$name=e},$removeControl:I,$setValidity:I,$setDirty:I,$setPristine:I,$setSubmitted:I};gn.$inject=["$element","$attrs","$scope","$animate","$interpolate"];var wi=function(n){return["$timeout","$parse",function(u,e){function c(t){return""===t?e('this[""]').assign:e(t).assign||I}return{name:"form",restrict:n?"EAC":"E",require:["form","^^?form"],controller:gn,compile:function(t,e){t.addClass(no).addClass(to);var s=e.name?"name":!(!n||!e.ngForm)&&"ngForm";return{pre:function(e,t,n,r){var i=r[0];if(!("action"in n)){var o=function(t){e.$apply(function(){i.$commitViewValue(),i.$setSubmitted()}),t.preventDefault()};t[0].addEventListener("submit",o,!1),t.on("$destroy",function(){u(function(){t[0].removeEventListener("submit",o,!1)},0,!1)})}(r[1]||i.$$parentForm).$addControl(i);var a=s?c(i.$name):I;s&&(a(e,i),n.$observe(s,function(t){i.$name!==t&&(a(e,rt),i.$$parentForm.$$renameControl(i,t),(a=c(i.$name))(e,i))})),t.on("$destroy",function(){i.$$parentForm.$removeControl(i),a(e,rt),ot(i,bi)})}}}}}]},xi=wi(),Si=wi(!0),Ci=/^\d{4,}-[01]\d-[0-3]\dT[0-2]\d:[0-5]\d:[0-5]\d\.\d+(?:[+-][0-2]\d:[0-5]\d|Z)$/,Ei=/^[a-z][a-z\d.+-]*:\/*(?:[^:@]+(?::[^@]+)?@)?(?:[^\s:/?#]+|\[[a-f\d:]+\])(?::\d+)?(?:\/[^?#]*)?(?:\?[^#]*)?(?:#.*)?$/i,ki=/^[a-z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-z0-9]([a-z0-9-]*[a-z0-9])?(\.[a-z0-9]([a-z0-9-]*[a-z0-9])?)*$/i,Ai=/^\s*(\-|\+)?(\d+|(\d*(\.\d*)))([eE][+-]?\d+)?\s*$/,Oi=/^(\d{4,})-(\d{2})-(\d{2})$/,Mi=/^(\d{4,})-(\d\d)-(\d\d)T(\d\d):(\d\d)(?::(\d\d)(\.\d{1,3})?)?$/,Ti=/^(\d{4,})-W(\d\d)$/,Ni=/^(\d{4,})-(\d\d)$/,Vi=/^(\d\d):(\d\d)(?::(\d\d)(\.\d{1,3})?)?$/,ji=gt();it(["date","datetime-local","month","time","week"],function(t){ji[t]=!0});var Di={text:function(t,e,n,r,i,o){bn(0,e,n,r,i,o),yn(r)},date:xn("date",Oi,wn(Oi,["yyyy","MM","dd"]),"yyyy-MM-dd"),"datetime-local":xn("datetimelocal",Mi,wn(Mi,"yyyy MM dd HH mm ss sss".split(" ")),"yyyy-MM-ddTHH:mm:ss.sss"),time:xn("time",Vi,wn(Vi,["HH","mm","ss","sss"]),"HH:mm:ss.sss"),week:xn("week",Ti,function(t,e){if(g(t))return t;if(ut(t)){Ti.lastIndex=0;var n=Ti.exec(t);if(n){var r=+n[1],i=+n[2],o=n=0,a=0,s=0,u=ln(r);i=7*(i-1);return e&&(n=e.getHours(),o=e.getMinutes(),a=e.getSeconds(),s=e.getMilliseconds()),new Date(r,0,u.getDate()+i,n,o,a,s)}}return NaN},"yyyy-Www"),month:xn("month",Ni,wn(Ni,["yyyy","MM"]),"yyyy-MM"),number:function(t,e,n,r,i,o){var a,s;(Sn(0,e,0,r),bn(0,e,n,r,i,o),r.$$parserName="number",r.$parsers.push(function(t){return r.$isEmpty(t)?null:Ai.test(t)?parseFloat(t):rt}),r.$formatters.push(function(t){if(!r.$isEmpty(t)){if(!y(t))throw oo("numfmt",t);t=t.toString()}return t}),C(n.min)||n.ngMin)&&(r.$validators.min=function(t){return r.$isEmpty(t)||at(a)||a<=t},n.$observe("min",function(t){C(t)&&!y(t)&&(t=parseFloat(t,10)),a=y(t)&&!isNaN(t)?t:rt,r.$validate()}));(C(n.max)||n.ngMax)&&(r.$validators.max=function(t){return r.$isEmpty(t)||at(s)||t<=s},n.$observe("max",function(t){C(t)&&!y(t)&&(t=parseFloat(t,10)),s=y(t)&&!isNaN(t)?t:rt,r.$validate()}))},url:function(t,e,n,r,i,o){bn(0,e,n,r,i,o),yn(r),r.$$parserName="url",r.$validators.url=function(t,e){var n=t||e;return r.$isEmpty(n)||Ei.test(n)}},email:function(t,e,n,r,i,o){bn(0,e,n,r,i,o),yn(r),r.$$parserName="email",r.$validators.email=function(t,e){var n=t||e;return r.$isEmpty(n)||ki.test(n)}},radio:function(t,e,n,r){at(n.name)&&e.attr("name",++Bn),e.on("click",function(t){e[0].checked&&r.$setViewValue(n.value,t&&t.type)}),r.$render=function(){e[0].checked=n.value==r.$viewValue},n.$observe("value",r.$render)},checkbox:function(t,e,n,r,i,o,a,s){var u=Cn(s,t,"ngTrueValue",n.ngTrueValue,!0),c=Cn(s,t,"ngFalseValue",n.ngFalseValue,!1);e.on("click",function(t){r.$setViewValue(e[0].checked,t&&t.type)}),r.$render=function(){e[0].checked=r.$viewValue},r.$isEmpty=function(t){return!1===t},r.$formatters.push(function(t){return $t(t,u)}),r.$parsers.push(function(t){return t?u:c})},hidden:I,button:I,submit:I,reset:I,file:I},Pi=["$browser","$sniffer","$filter","$parse",function(i,o,a,s){return{restrict:"E",require:["?ngModel"],link:{pre:function(t,e,n,r){r[0]&&(Di[Dn(n.type)]||Di.text)(t,e,n,r[0],o,i,a,s)}}}}],Ii=/^(true|false|\d+)$/,Ri=function(){return{restrict:"A",priority:100,compile:function(t,e){return Ii.test(e.ngValue)?function(t,e,n){n.$set("value",t.$eval(n.ngValue))}:function(t,e,n){t.$watch(n.ngValue,function(t){n.$set("value",t)})}}}},Fi=["$compile",function(r){return{restrict:"AC",compile:function(t){return r.$$addBindingClass(t),function(t,e,n){r.$$addBindingInfo(e,n.ngBind),e=e[0],t.$watch(n.ngBind,function(t){e.textContent=at(t)?"":t})}}}}],Ui=["$interpolate","$compile",function(r,i){return{compile:function(t){return i.$$addBindingClass(t),function(t,e,n){t=r(e.attr(n.$attr.ngBindTemplate)),i.$$addBindingInfo(e,t.expressions),e=e[0],n.$observe("ngBindTemplate",function(t){e.textContent=at(t)?"":t})}}}}],qi=["$sce","$parse","$compile",function(o,n,a){return{restrict:"A",compile:function(t,e){var r=n(e.ngBindHtml),i=n(e.ngBindHtml,function(t){return(t||"").toString()});return a.$$addBindingClass(t),function(t,e,n){a.$$addBindingInfo(e,n.ngBindHtml),t.$watch(i,function(){e.html(o.getTrustedHtml(r(t))||"")})}}}}],_i=S({restrict:"A",require:"ngModel",link:function(t,e,n,r){r.$viewChangeListeners.push(function(){t.$eval(n.ngChange)})}}),Li=En("",!0),Bi=En("Odd",0),Hi=En("Even",1),zi=vn({compile:function(t,e){e.$set("ngCloak",rt),t.removeClass("ng-cloak")}}),Wi=[function(){return{restrict:"A",scope:!0,controller:"@",priority:500}}],Gi={},Ji={blur:!0,focus:!0};it("click dblclick mousedown mouseup mouseover mouseout mousemove mouseenter mouseleave keydown keyup keypress submit focus blur copy cut paste".split(" "),function(o){var a=qt("ng-"+o);Gi[a]=["$parse","$rootScope",function(n,i){return{restrict:"A",compile:function(t,e){var r=n(e[a],null,!0);return function(n,t){t.on(o,function(t){var e=function(){r(n,{$event:t})};Ji[o]&&i.$$phase?n.$evalAsync(e):n.$apply(e)})}}}}]});var Ki=["$animate","$compile",function(u,c){return{multiElement:!0,transclude:"element",priority:600,terminal:!0,restrict:"A",$$tlb:!0,link:function(t,n,r,e,i){var o,a,s;t.$watch(r.ngIf,function(t){t?a||i(function(t,e){a=e,t[t.length++]=c.$$createComment("end ngIf",r.ngIf),o={clone:t},u.enter(t,n.parent(),n)}):(s&&(s.remove(),s=null),a&&(a.$destroy(),a=null),o&&(s=L(o.clone),u.leave(s).then(function(){s=null}),o=null))})}}}],Yi=["$templateRequest","$anchorScroll","$animate",function(d,m,v){return{restrict:"ECA",priority:400,terminal:!0,transclude:"element",controller:Ln.noop,compile:function(t,e){var n=e.ngInclude||e.src,p=e.onload||"",$=e.autoscroll;return function(o,a,t,s,u){var c,e,l,f=0,h=function(){e&&(e.remove(),e=null),c&&(c.$destroy(),c=null),l&&(v.leave(l).then(function(){e=null}),e=l,l=null)};o.$watch(n,function(n){var r=function(){!C($)||$&&!o.$eval($)||m()},i=++f;n?(d(n,!0).then(function(t){if(!o.$$destroyed&&i===f){var e=o.$new();s.template=t,t=u(e,function(t){h(),v.enter(t,null,a).then(r)}),l=t,(c=e).$emit("$includeContentLoaded",n),o.$eval(p)}},function(){o.$$destroyed||i!==f||(h(),o.$emit("$includeContentError",n))}),o.$emit("$includeContentRequested",n)):(h(),s.template=null)})}}}}],Zi=["$compile",function(i){return{restrict:"ECA",priority:-400,require:"ngInclude",link:function(t,e,n,r){Un.call(e[0]).match(/SVG/)?(e.empty(),i(z(r.template,D).childNodes)(t,function(t){e.append(t)},{futureParentElement:e})):(e.html(r.template),i(e.contents())(t))}}}],Xi=vn({priority:450,compile:function(){return{pre:function(t,e,n){t.$eval(n.ngInit)}}}}),Qi=function(){return{restrict:"A",priority:100,require:"ngModel",link:function(t,e,n,r){var i=e.attr(n.$attr.ngList)||", ",o="false"!==n.ngTrim,a=o?Wn(i):i;r.$parsers.push(function(t){if(!at(t)){var e=[];return t&&it(t.split(a),function(t){t&&e.push(o?Wn(t):t)}),e}}),r.$formatters.push(function(t){return Hn(t)?t.join(i):rt}),r.$isEmpty=function(t){return!t||!t.length}}}},to="ng-valid",eo="ng-invalid",no="ng-pristine",ro="ng-dirty",io="ng-pending",oo=h("ngModel"),ao=["$scope","$exceptionHandler","$attrs","$element","$parse","$animate","$timeout","$rootScope","$q","$interpolate",function(i,e,o,a,s,n,r,u,l,t){this.$modelValue=this.$viewValue=Number.NaN,this.$$rawModelValue=rt,this.$validators={},this.$asyncValidators={},this.$parsers=[],this.$formatters=[],this.$viewChangeListeners=[],this.$untouched=!0,this.$touched=!1,this.$pristine=!0,this.$dirty=!1,this.$valid=!0,this.$invalid=!1,this.$error={},this.$$success={},this.$pending=rt,this.$name=t(o.name||"",!1)(i),this.$$parentForm=bi;var f,c=s(o.ngModel),h=c.assign,p=c,$=h,d=null,m=this;this.$$setOptions=function(t){if((m.$options=t)&&t.getterSetter){var n=s(o.ngModel+"()"),r=s(o.ngModel+"($$$p)");p=function(t){var e=c(t);return ct(e)&&(e=n(t)),e},$=function(t,e){ct(c(t))?r(t,{$$$p:e}):h(t,e)}}else if(!c.assign)throw oo("nonassign",o.ngModel,dt(a))},this.$render=I,this.$isEmpty=function(t){return at(t)||""===t||null===t||t!=t},this.$$updateEmptyClasses=function(t){m.$isEmpty(t)?(n.removeClass(a,"ng-not-empty"),n.addClass(a,"ng-empty")):(n.removeClass(a,"ng-empty"),n.addClass(a,"ng-not-empty"))};var v=0;kn({ctrl:this,$element:a,set:function(t,e){t[e]=!0},unset:function(t,e){delete t[e]},$animate:n}),this.$setPristine=function(){m.$dirty=!1,m.$pristine=!0,n.removeClass(a,ro),n.addClass(a,no)},this.$setDirty=function(){m.$dirty=!0,m.$pristine=!1,n.removeClass(a,no),n.addClass(a,ro),m.$$parentForm.$setDirty()},this.$setUntouched=function(){m.$touched=!1,m.$untouched=!0,n.setClass(a,"ng-untouched","ng-touched")},this.$setTouched=function(){m.$touched=!0,m.$untouched=!1,n.setClass(a,"ng-touched","ng-untouched")},this.$rollbackViewValue=function(){r.cancel(d),m.$viewValue=m.$$lastCommittedViewValue,m.$render()},this.$validate=function(){if(!y(m.$modelValue)||!isNaN(m.$modelValue)){var e=m.$$rawModelValue,n=m.$valid,r=m.$modelValue,i=m.$options&&m.$options.allowInvalid;m.$$runValidators(e,m.$$lastCommittedViewValue,function(t){i||n===t||(m.$modelValue=t?e:rt,m.$modelValue!==r&&m.$$writeModelToScope())})}},this.$$runValidators=function(r,i,e){function o(t,e){c===v&&m.$setValidity(t,e)}function t(t){c===v&&e(t)}var a,s,u,n,c=++v;n=m.$$parserName||"parse",(at(f)?(o(n,null),1):(f||(it(m.$validators,function(t,e){o(e,null)}),it(m.$asyncValidators,function(t,e){o(e,null)})),o(n,f),f))?(u=!0,it(m.$validators,function(t,e){var n=t(r,i);u=u&&n,o(e,n)}),u||(it(m.$asyncValidators,function(t,e){o(e,null)}),0)?(a=[],s=!0,it(m.$asyncValidators,function(t,e){var n=t(r,i);if(!n||!ct(n.then))throw oo("nopromise",n);o(e,rt),a.push(n.then(function(){o(e,!0)},function(){o(e,s=!1)}))}),a.length?l.all(a).then(function(){t(s)},I):t(!0)):t(!1)):t(!1)},this.$commitViewValue=function(){var t=m.$viewValue;r.cancel(d),(m.$$lastCommittedViewValue!==t||""===t&&m.$$hasNativeValidators)&&(m.$$updateEmptyClasses(t),m.$$lastCommittedViewValue=t,m.$pristine&&this.$setDirty(),this.$$parseAndValidate())},this.$$parseAndValidate=function(){var e=m.$$lastCommittedViewValue;if(f=!at(e)||rt)for(var t=0;t<m.$parsers.length;t++)if(at(e=m.$parsers[t](e))){f=!1;break}y(m.$modelValue)&&isNaN(m.$modelValue)&&(m.$modelValue=p(i));var n=m.$modelValue,r=m.$options&&m.$options.allowInvalid;m.$$rawModelValue=e,r&&(m.$modelValue=e,m.$modelValue!==n&&m.$$writeModelToScope()),m.$$runValidators(e,m.$$lastCommittedViewValue,function(t){r||(m.$modelValue=t?e:rt,m.$modelValue!==n&&m.$$writeModelToScope())})},this.$$writeModelToScope=function(){$(i,m.$modelValue),it(m.$viewChangeListeners,function(t){try{t()}catch(t){e(t)}})},this.$setViewValue=function(t,e){m.$viewValue=t,m.$options&&!m.$options.updateOnDefault||m.$$debounceViewValueCommit(e)},this.$$debounceViewValueCommit=function(t){var e=0,n=m.$options;n&&C(n.debounce)&&(y(n=n.debounce)?e=n:y(n[t])?e=n[t]:y(n.default)&&(e=n.default)),r.cancel(d),e?d=r(function(){m.$commitViewValue()},e):u.$$phase?m.$commitViewValue():i.$apply(function(){m.$commitViewValue()})},i.$watch(function(){var t=p(i);if(t!==m.$modelValue&&(m.$modelValue==m.$modelValue||t==t)){m.$modelValue=m.$$rawModelValue=t,f=rt;for(var e=m.$formatters,n=e.length,r=t;n--;)r=e[n](r);m.$viewValue!==r&&(m.$$updateEmptyClasses(r),m.$viewValue=m.$$lastCommittedViewValue=r,m.$render(),m.$$runValidators(t,r,I))}return t})}],so=["$rootScope",function(o){return{restrict:"A",require:["ngModel","^?form","^?ngModelOptions"],controller:ao,priority:1,compile:function(t){return t.addClass(no).addClass("ng-untouched").addClass(to),{pre:function(t,e,n,r){var i=r[0];e=r[1]||i.$$parentForm,i.$$setOptions(r[2]&&r[2].$options),e.$addControl(i),n.$observe("name",function(t){i.$name!==t&&i.$$parentForm.$$renameControl(i,t)}),t.$on("$destroy",function(){i.$$parentForm.$removeControl(i)})},post:function(t,e,n,r){var i=r[0];i.$options&&i.$options.updateOn&&e.on(i.$options.updateOn,function(t){i.$$debounceViewValueCommit(t&&t.type)}),e.on("blur",function(){i.$touched||(o.$$phase?t.$evalAsync(i.$setTouched):t.$apply(i.$setTouched))})}}}}}],uo=/(\s+|^)default(\s+|$)/,co=function(){return{restrict:"A",controller:["$scope","$attrs",function(t,e){var n=this;this.$options=E(t.$eval(e.ngModelOptions)),C(this.$options.updateOn)?(this.$options.updateOnDefault=!1,this.$options.updateOn=Wn(this.$options.updateOn.replace(uo,function(){return n.$options.updateOnDefault=!0," "}))):this.$options.updateOnDefault=!0}]}},lo=vn({terminal:!0,priority:1e3}),fo=h("ngOptions"),ho=/^\s*([\s\S]+?)(?:\s+as\s+([\s\S]+?))?(?:\s+group\s+by\s+([\s\S]+?))?(?:\s+disable\s+when\s+([\s\S]+?))?\s+for\s+(?:([\$\w][\$\w]*)|(?:\(\s*([\$\w][\$\w]*)\s*,\s*([\$\w][\$\w]*)\s*\)))\s+in\s+([\s\S]+?)(?:\s+track\s+by\s+([\s\S]+?))?$/,po=["$compile","$parse",function(g,w){var y=D.createElement("option"),b=D.createElement("optgroup");return{restrict:"A",terminal:!0,require:["select","ngModel"],link:{pre:function(t,e,n,r){r[0].registerOption=I},post:function(t,o,e,n){function a(t,e){(t.element=e).disabled=t.disabled,t.label!==e.label&&(e.label=t.label,e.textContent=t.label),t.value!==e.value&&(e.value=t.selectValue)}function s(t,e,n,r){return e&&Dn(e.nodeName)===n?n=e:(n=r.cloneNode(!1),e?t.insertBefore(n,e):t.appendChild(n)),n}function u(t){for(var e;t;)e=t.nextSibling,St(t),t=e}function r(){var t=m&&l.readValue();m=v.getOptions();var r={},i=o[0].firstChild;if($&&o.prepend(c),i=function(t){var e=c&&c[0],n=d&&d[0];if(e||n)for(;t&&(t===e||t===n||8===t.nodeType||"option"===ht(t)&&""===t.value);)t=t.nextSibling;return t}(i),m.items.forEach(function(t){var e,n;C(t.group)?((e=r[t.group])||(e=s(o[0],i,"optgroup",b),i=e.nextSibling,e.label=t.group,e=r[t.group]={groupElement:e,currentOptionElement:e.firstChild}),a(t,n=s(e.groupElement,e.currentOptionElement,"option",y)),e.currentOptionElement=n.nextSibling):(a(t,n=s(o[0],i,"option",y)),i=n.nextSibling)}),Object.keys(r).forEach(function(t){u(r[t].currentOptionElement)}),u(i),f.$render(),!f.$isEmpty(t)){var e=l.readValue();(v.trackBy||h?$t(t,e):t===e)||(f.$setViewValue(e),f.$render())}}var c,l=n[0],f=n[1],h=e.multiple;n=0;for(var i=o.children(),p=i.length;n<p;n++)if(""===i[n].value){c=i.eq(n);break}var $=!!c,d=Mn(y.cloneNode(!1));d.val("?");var m,v=function(t,e,c){function l(t,e,n,r,i){this.selectValue=t,this.viewValue=e,this.label=n,this.group=r,this.disabled=i}function f(t){var e;if(!r&&O(t))e=t;else for(var n in e=[],t)t.hasOwnProperty(n)&&"$"!==n.charAt(0)&&e.push(n);return e}var s=t.match(ho);if(!s)throw fo("iexp",t,dt(e));var n=s[5]||s[7],r=s[6];t=/ as /.test(s[0])&&s[1];var h=s[9];e=w(s[2]?s[1]:n);var p=t&&w(t)||e,i=h&&w(h),$=h?function(t,e){return i(c,e)}:function(t){return Ot(t)},d=function(t,e){return $(t,b(t,e))},m=w(s[2]||s[1]),v=w(s[3]||""),g=w(s[4]||""),y=w(s[8]),o={},b=r?function(t,e){return o[r]=e,o[n]=t,o}:function(t){return o[n]=t,o};return{trackBy:h,getTrackByValue:d,getWatchables:w(y,function(t){for(var e=[],n=f(t=t||[]),r=n.length,i=0;i<r;i++){var o=t[a=t===n?i:n[i]],a=b(o,a);o=$(o,a),e.push(o),(s[2]||s[1])&&(o=m(c,a),e.push(o)),s[4]&&(a=g(c,a),e.push(a))}return e}),getOptions:function(){for(var t=[],e={},n=y(c)||[],r=f(n),i=r.length,o=0;o<i;o++){var a=n===r?o:r[o],s=b(n[a],a),u=p(c,s);u=new l(a=$(u,s),u,m(c,s),v(c,s),s=g(c,s)),t.push(u),e[a]=u}return{items:t,selectValueMap:e,getOptionFromViewValue:function(t){return e[d(t)]},getViewValueFromOption:function(t){return h?Ln.copy(t.viewValue):t.viewValue}}}}}(e.ngOptions,o,t);h?(f.$isEmpty=function(t){return!t||0===t.length},l.writeValue=function(t){m.items.forEach(function(t){t.element.selected=!1}),t&&t.forEach(function(t){(t=m.getOptionFromViewValue(t))&&!t.disabled&&(t.element.selected=!0)})},l.readValue=function(){var t=o.val()||[],e=[];return it(t,function(t){(t=m.selectValueMap[t])&&!t.disabled&&e.push(m.getViewValueFromOption(t))}),e},v.trackBy&&t.$watchCollection(function(){if(Hn(f.$viewValue))return f.$viewValue.map(function(t){return v.getTrackByValue(t)})},function(){f.$render()})):(l.writeValue=function(t){var e=m.getOptionFromViewValue(t);e&&!e.disabled?(o[0].value!==e.selectValue&&(d.remove(),$||c.remove(),o[0].value=e.selectValue,e.element.selected=!0),e.element.setAttribute("selected","selected")):null===t||$?(d.remove(),$||o.prepend(c),o.val(""),c.prop("selected",!0),c.attr("selected",!0)):($||c.remove(),o.prepend(d),o.val("?"),d.prop("selected",!0),d.attr("selected",!0))},l.readValue=function(){var t=m.selectValueMap[o.val()];return t&&!t.disabled?($||c.remove(),d.remove(),m.getViewValueFromOption(t)):null},v.trackBy&&t.$watch(function(){return v.getTrackByValue(f.$viewValue)},function(){f.$render()})),$?(c.remove(),g(c)(t),c.removeClass("ng-scope")):c=Mn(y.cloneNode(!1)),r(),t.$watchCollection(v.getWatchables,r)}}}}],$o=["$locale","$interpolate","$log",function($,d,m){var v=/{}/g,g=/^when(Minus)?(.+)$/;return{link:function(r,i,o){function a(t){i.text(t||"")}var s,t=o.count,u=o.$attr.when&&i.attr(o.$attr.when),c=o.offset||0,l=r.$eval(u)||{},f={},e=d.startSymbol(),n=d.endSymbol(),h=e+t+"-"+c+n,p=Ln.noop;it(o,function(t,e){var n=g.exec(e);n&&(n=(n[1]?"-":"")+Dn(n[2]),l[n]=i.attr(o.$attr[e]))}),it(l,function(t,e){f[e]=d(t.replace(v,h))}),r.$watch(t,function(t){var e=parseFloat(t),n=isNaN(e);n||e in l||(e=$.pluralCat(e-c)),e===s||n&&y(s)&&isNaN(s)||(p(),at(n=f[e])?(null!=t&&m.debug("ngPluralize: no rule defined for '"+e+"' in "+u),p=I,a()):p=r.$watch(n,a),s=e)})}}}],mo=["$parse","$animate","$compile",function(u,E,c){var k=h("ngRepeat"),A=function(t,e,n,r,i,o,a){t[n]=r,i&&(t[i]=o),t.$index=e,t.$first=0===e,t.$last=e===a-1,t.$middle=!(t.$first||t.$last),t.$odd=!(t.$even=0==(1&e))};return{restrict:"A",multiElement:!0,transclude:"element",priority:1e3,terminal:!0,$$tlb:!0,compile:function(t,e){var v=e.ngRepeat,g=c.$$createComment("end ngRepeat",v);if(!(n=v.match(/^\s*([\s\S]+?)\s+in\s+([\s\S]+?)(?:\s+as\s+([\s\S]+?))?(?:\s+track\s+by\s+([\s\S]+?))?\s*$/)))throw k("iexp",v);var n,r=n[1],i=n[2],y=n[3],o=n[4];if(!(n=r.match(/^(?:(\s*[\$\w]+)|\(\s*([\$\w]+)\s*,\s*([\$\w]+)\s*\))$/)))throw k("iidexp",r);var b=n[3]||n[1],w=n[2];if(y&&(!/^[$a-zA-Z_][$a-zA-Z0-9_]*$/.test(y)||/^(null|undefined|this|\$index|\$first|\$middle|\$last|\$even|\$odd|\$parent|\$root|\$id)$/.test(y)))throw k("badident",y);var a,x,S,C,s={$id:Ot};return o?a=u(o):(S=function(t,e){return Ot(e)},C=function(t){return t}),function(p,$,t,e,d){a&&(x=function(t,e,n){return w&&(s[w]=t),s[b]=e,s.$index=n,a(p,s)});var m=gt();p.$watchCollection(i,function(t){var r,e,n,i,o,a,s,u,c,l,f=$[0],h=gt();if(y&&(p[y]=t),O(t))u=t,e=x||S;else for(l in e=x||C,u=[],t)jn.call(t,l)&&"$"!==l.charAt(0)&&u.push(l);for(i=u.length,l=Array(i),r=0;r<i;r++)if(o=t===u?r:u[r],a=t[o],s=e(o,a,r),m[s])c=m[s],delete m[s],h[s]=c,l[r]=c;else{if(h[s])throw it(l,function(t){t&&t.scope&&(m[t.id]=t)}),k("dupes",v,s,a);l[r]={id:s,scope:rt,clone:rt},h[s]=!0}for(n in m){if(s=L((c=m[n]).clone),E.leave(s),s[0].parentNode)for(r=0,e=s.length;r<e;r++)s[r].$$NG_REMOVED=!0;c.scope.$destroy()}for(r=0;r<i;r++)if(o=t===u?r:u[r],a=t[o],(c=l[r]).scope){for(n=f;(n=n.nextSibling)&&n.$$NG_REMOVED;);c.clone[0]!=n&&E.move(L(c.clone),null,f),f=c.clone[c.clone.length-1],A(c.scope,r,b,a,w,o,i)}else d(function(t,e){c.scope=e;var n=g.cloneNode(!1);t[t.length++]=n,E.enter(t,null,f),f=n,c.clone=t,h[c.id]=c,A(c.scope,r,b,a,w,o,i)});m=h})}}}}],vo=["$animate",function(r){return{restrict:"A",multiElement:!0,link:function(t,e,n){t.$watch(n.ngShow,function(t){r[t?"removeClass":"addClass"](e,"ng-hide",{tempClasses:"ng-hide-animate"})})}}}],go=["$animate",function(r){return{restrict:"A",multiElement:!0,link:function(t,e,n){t.$watch(n.ngHide,function(t){r[t?"addClass":"removeClass"](e,"ng-hide",{tempClasses:"ng-hide-animate"})})}}}],yo=vn(function(t,n,e){t.$watch(e.ngStyle,function(t,e){e&&t!==e&&it(e,function(t,e){n.css(e,"")}),t&&n.css(t)},!0)}),bo=["$animate","$compile",function(l,f){return{require:"ngSwitch",controller:["$scope",function(){this.cases={}}],link:function(t,e,n,i){var o=[],a=[],s=[],u=[],c=function(t,e){return function(){t.splice(e,1)}};t.$watch(n.ngSwitch||n.on,function(t){var e,n;for(e=0,n=s.length;e<n;++e)l.cancel(s[e]);for(e=s.length=0,n=u.length;e<n;++e){var r=L(a[e].clone);u[e].$destroy(),(s[e]=l.leave(r)).then(c(s,e))}a.length=0,u.length=0,(o=i.cases["!"+t]||i.cases["?"])&&it(o,function(r){r.transclude(function(t,e){u.push(e);var n=r.element;t[t.length++]=f.$$createComment("end ngSwitchWhen"),a.push({clone:t}),l.enter(t,n.parent(),n)})})})}}}],wo=vn({transclude:"element",priority:1200,require:"^ngSwitch",multiElement:!0,link:function(t,e,n,r,i){r.cases["!"+n.ngSwitchWhen]=r.cases["!"+n.ngSwitchWhen]||[],r.cases["!"+n.ngSwitchWhen].push({transclude:i,element:e})}}),xo=vn({transclude:"element",priority:1200,require:"^ngSwitch",multiElement:!0,link:function(t,e,n,r,i){r.cases["?"]=r.cases["?"]||[],r.cases["?"].push({transclude:i,element:e})}}),So=h("ngTransclude"),Co=vn({restrict:"EAC",link:function(t,e,n,r,i){if(n.ngTransclude===n.$attr.ngTransclude&&(n.ngTransclude=""),!i)throw So("orphan",dt(e));i(function(t){t.length&&(e.empty(),e.append(t))},null,n.ngTransclude||n.ngTranscludeSlot)}}),Eo=["$templateCache",function(n){return{restrict:"E",terminal:!0,compile:function(t,e){"text/ng-template"==e.type&&n.put(e.id,t[0].text)}}}],ko={$setViewValue:I,$render:I},Ao=["$element","$scope",function(e,t){var a=this,r=new Mt;a.ngModelCtrl=ko,a.unknownOption=Mn(D.createElement("option")),a.renderUnknownOption=function(t){t="? "+Ot(t)+" ?",a.unknownOption.val(t),e.prepend(a.unknownOption),e.val(t)},t.$on("$destroy",function(){a.renderUnknownOption=I}),a.removeUnknownOption=function(){a.unknownOption.parent()&&a.unknownOption.remove()},a.readValue=function(){return a.removeUnknownOption(),e.val()},a.writeValue=function(t){a.hasOption(t)?(a.removeUnknownOption(),e.val(t),""===t&&a.emptyOption.prop("selected",!0)):null==t&&a.emptyOption?(a.removeUnknownOption(),e.val("")):a.renderUnknownOption(t)},a.addOption=function(t,e){if(8!==e[0].nodeType){q(t,'"option value"'),""===t&&(a.emptyOption=e);var n=r.get(t)||0;r.put(t,n+1),a.ngModelCtrl.$render(),e[0].hasAttribute("selected")&&(e[0].selected=!0)}},a.removeOption=function(t){var e=r.get(t);e&&(1===e?(r.remove(t),""===t&&(a.emptyOption=rt)):r.put(t,e-1))},a.hasOption=function(t){return!!r.get(t)},a.registerOption=function(t,n,r,e,i){var o;e?r.$observe("value",function(t){C(o)&&a.removeOption(o),o=t,a.addOption(t,n)}):i?t.$watch(i,function(t,e){r.$set("value",t),e!==t&&a.removeOption(e),a.addOption(t,n)}):a.addOption(r.value,n);n.on("$destroy",function(){a.removeOption(r.value),a.ngModelCtrl.$render()})}}],Oo=function(){return{restrict:"E",require:["select","?ngModel"],controller:Ao,priority:1,link:{pre:function(t,n,e,r){var i=r[1];if(i){var o=r[0];if(o.ngModelCtrl=i,n.on("change",function(){t.$apply(function(){i.$setViewValue(o.readValue())})}),e.multiple){o.readValue=function(){var e=[];return it(n.find("option"),function(t){t.selected&&e.push(t.value)}),e},o.writeValue=function(t){var e=new Mt(t);it(n.find("option"),function(t){t.selected=C(e.get(t.value))})};var a,s=NaN;t.$watch(function(){s!==i.$viewValue||$t(a,i.$viewValue)||(a=w(i.$viewValue),i.$render()),s=i.$viewValue}),i.$isEmpty=function(t){return!t||0===t.length}}}},post:function(t,e,n,r){var i=r[1];if(i){var o=r[0];i.$render=function(){o.writeValue(i.$viewValue)}}}}}},Mo=["$interpolate",function(n){return{restrict:"E",priority:100,compile:function(t,e){if(C(e.value))var i=n(e.value,!0);else{var o=n(t.text(),!0);o||e.$set("value",t.text())}return function(t,e,n){var r=e.parent();(r=r.data("$selectController")||r.parent().data("$selectController"))&&r.registerOption(t,e,n,i,o)}}}}],To=S({restrict:"E",terminal:!1}),No=function(){return{restrict:"A",require:"?ngModel",link:function(t,e,n,r){r&&(n.required=!0,r.$validators.required=function(t,e){return!n.required||!r.$isEmpty(e)},n.$observe("required",function(){r.$validate()}))}}},Vo=function(){return{restrict:"A",require:"?ngModel",link:function(t,e,n,r){if(r){var i,o=n.ngPattern||n.pattern;n.$observe("pattern",function(t){if(ut(t)&&0<t.length&&(t=new RegExp("^"+t+"$")),t&&!t.test)throw h("ngPattern")("noregexp",o,t,dt(e));i=t||rt,r.$validate()}),r.$validators.pattern=function(t,e){return r.$isEmpty(e)||at(i)||i.test(e)}}}}},jo=function(){return{restrict:"A",require:"?ngModel",link:function(t,e,n,r){if(r){var i=-1;n.$observe("maxlength",function(t){t=$(t),i=isNaN(t)?-1:t,r.$validate()}),r.$validators.maxlength=function(t,e){return i<0||r.$isEmpty(e)||e.length<=i}}}}},Do=function(){return{restrict:"A",require:"?ngModel",link:function(t,e,n,r){if(r){var i=0;n.$observe("minlength",function(t){i=$(t)||0,r.$validate()}),r.$validators.minlength=function(t,e){return r.$isEmpty(e)||e.length>=i}}}}};c.angular.bootstrap?c.console&&console.log("WARNING: Tried to load angular more than once."):(function(){var i;if(!Qn){var t=Kn();(Tn=at(t)?c.jQuery:t?c[t]:rt)&&Tn.fn.on?(ot((Mn=Tn).fn,{scope:$r.scope,isolateScope:$r.isolateScope,controller:$r.controller,injector:$r.injector,inheritedData:$r.inheritedData}),i=Tn.cleanData,Tn.cleanData=function(t){for(var e,n,r=0;null!=(n=t[r]);r++)(e=Tn._data(n,"events"))&&e.$destroy&&Tn(n).triggerHandler("$destroy");i(t)}):Mn=W,Ln.element=Mn,Qn=!0}}(),ot(Ln,{bootstrap:V,copy:E,extend:ot,merge:t,equals:$t,element:Mn,forEach:it,injector:Nt,noop:I,bind:f,toJson:A,fromJson:i,identity:R,isUndefined:at,isDefined:C,isString:ut,isFunction:ct,isObject:st,isNumber:y,isElement:m,isArray:Hn,version:er,isDate:g,lowercase:Dn,uppercase:Pn,callbacks:{counter:0},getTestability:F,$$minErr:h,$$csp:Jn,reloadWithDebugInfo:j}),(Nn=function(t){function e(t,e,n){return t[e]||(t[e]=n())}var l=h("$injector"),n=h("ng");return(t=e(t,"angular",Object)).$$minErr=t.$$minErr||h,e(t,"module",function(){var t={};return function(s,u,c){if("hasOwnProperty"===s)throw n("badname","module");return u&&t.hasOwnProperty(s)&&(t[s]=null),e(t,s,function(){function t(t,e,n,r){return r||(r=i),function(){return r[n||"push"]([t,e,arguments]),a}}function e(n,r){return function(t,e){return e&&ct(e)&&(e.$$moduleName=s),i.push([n,r,arguments]),a}}if(!u)throw l("nomod",s);var i=[],n=[],r=[],o=t("$injector","invoke","push",n),a={_invokeQueue:i,_configBlocks:n,_runBlocks:r,requires:u,name:s,provider:e("$provide","provider"),factory:e("$provide","factory"),service:e("$provide","service"),value:t("$provide","value"),constant:t("$provide","constant","unshift"),decorator:e("$provide","decorator"),animation:e("$animateProvider","register"),filter:e("$filterProvider","register"),controller:e("$controllerProvider","register"),directive:e("$compileProvider","directive"),component:e("$compileProvider","component"),config:o,run:function(t){return r.push(t),this}};return c&&o(c),a})}})}(c))("ng",["ngLocale"],["$provide",function(t){t.provider({$$sanitizeUri:qe}),t.provider("$compile",Ut).directive({a:gi,input:Pi,textarea:Pi,form:xi,script:Eo,select:Oo,style:To,option:Mo,ngBind:Fi,ngBindHtml:qi,ngBindTemplate:Ui,ngClass:Li,ngClassEven:Hi,ngClassOdd:Bi,ngCloak:zi,ngController:Wi,ngForm:Si,ngHide:go,ngIf:Ki,ngInclude:Yi,ngInit:Xi,ngNonBindable:lo,ngPluralize:$o,ngRepeat:mo,ngShow:vo,ngStyle:yo,ngSwitch:bo,ngSwitchWhen:wo,ngSwitchDefault:xo,ngOptions:po,ngTransclude:Co,ngModel:so,ngList:Qi,ngChange:_i,pattern:Vo,ngPattern:Vo,required:No,ngRequired:No,minlength:Do,ngMinlength:Do,maxlength:jo,ngMaxlength:jo,ngValue:Ri,ngModelOptions:co}).directive({ngInclude:Zi}).directive(yi).directive(Gi),t.provider({$anchorScroll:Vt,$animate:Or,$animateCss:Nr,$$animateJs:kr,$$animateQueue:Ar,$$AnimateRunner:Tr,$$animateAsyncRun:Mr,$browser:It,$cacheFactory:Rt,$controller:Ht,$document:zt,$exceptionHandler:Wt,$filter:Qe,$$forceReflow:Ir,$interpolate:re,$interval:ie,$http:te,$httpParamSerializer:Jt,$httpParamSerializerJQLike:Kt,$httpBackend:ne,$xhrFactory:ee,$location:me,$log:ve,$parse:De,$rootScope:Ue,$q:Pe,$$q:Ie,$sce:Be,$sceDelegate:Le,$sniffer:He,$templateCache:Ft,$templateRequest:ze,$$testability:We,$timeout:Ge,$window:Ye,$$rAF:Fe,$$jqLite:At,$$HashMap:gr,$$cookieReader:Xe})}]),Ln.module("ngLocale",[],["$provide",function(t){t.value("$locale",{DATETIME_FORMATS:{AMPMS:["AM","PM"],DAY:"Sunday Monday Tuesday Wednesday Thursday Friday Saturday".split(" "),ERANAMES:["Before Christ","Anno Domini"],ERAS:["BC","AD"],FIRSTDAYOFWEEK:6,MONTH:"January February March April May June July August September October November December".split(" "),SHORTDAY:"Sun Mon Tue Wed Thu Fri Sat".split(" "),SHORTMONTH:"Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec".split(" "),STANDALONEMONTH:"January February March April May June July August September October November December".split(" "),WEEKENDRANGE:[5,6],fullDate:"EEEE, MMMM d, y",longDate:"MMMM d, y",medium:"MMM d, y h:mm:ss a",mediumDate:"MMM d, y",mediumTime:"h:mm:ss a",short:"M/d/yy h:mm a",shortDate:"M/d/yy",shortTime:"h:mm a"},NUMBER_FORMATS:{CURRENCY_SYM:"$",DECIMAL_SEP:".",GROUP_SEP:",",PATTERNS:[{gSize:3,lgSize:3,maxFrac:3,minFrac:0,minInt:1,negPre:"-",negSuf:"",posPre:"",posSuf:""},{gSize:3,lgSize:3,maxFrac:2,minFrac:2,minInt:1,negPre:"-¤",negSuf:"",posPre:"¤",posSuf:""}]},id:"en-us",localeID:"en_US",pluralCat:function(t,e){var n,r,i=0|t,o=e;return rt===o&&(o=Math.min((n=t,-1==(r=(n+="").indexOf("."))?0:n.length-r-1),3)),Math.pow(10,o),1==i&&0==o?"one":"other"}})}]),Mn(D).ready(function(){e(D,V)}))}(window,document),!window.angular.$$csp().noInlineStyle&&window.angular.element(document.head).prepend('<style type="text/css">@charset "UTF-8";[ng\\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>');

!function(f,_){"use strict";if("IntersectionObserver"in f&&"IntersectionObserverEntry"in f&&"intersectionRatio"in f.IntersectionObserverEntry.prototype)"isIntersecting"in f.IntersectionObserverEntry.prototype||Object.defineProperty(f.IntersectionObserverEntry.prototype,"isIntersecting",{get:function(){return 0<this.intersectionRatio}});else{var e=[];t.prototype.THROTTLE_TIMEOUT=100,t.prototype.POLL_INTERVAL=null,t.prototype.USE_MUTATION_OBSERVER=!0,t.prototype.observe=function(e){if(!this._observationTargets.some(function(t){return t.element==e})){if(!e||1!=e.nodeType)throw new Error("target must be an Element");this._registerInstance(),this._observationTargets.push({element:e,entry:null}),this._monitorIntersections(),this._checkForIntersections()}},t.prototype.unobserve=function(e){this._observationTargets=this._observationTargets.filter(function(t){return t.element!=e}),this._observationTargets.length||(this._unmonitorIntersections(),this._unregisterInstance())},t.prototype.disconnect=function(){this._observationTargets=[],this._unmonitorIntersections(),this._unregisterInstance()},t.prototype.takeRecords=function(){var t=this._queuedEntries.slice();return this._queuedEntries=[],t},t.prototype._initThresholds=function(t){var e=t||[0];return Array.isArray(e)||(e=[e]),e.sort().filter(function(t,e,n){if("number"!=typeof t||isNaN(t)||t<0||1<t)throw new Error("threshold must be a number between 0 and 1 inclusively");return t!==n[e-1]})},t.prototype._parseRootMargin=function(t){var e=(t||"0px").split(/\s+/).map(function(t){var e=/^(-?\d*\.?\d+)(px|%)$/.exec(t);if(!e)throw new Error("rootMargin must be specified in pixels or percent");return{value:parseFloat(e[1]),unit:e[2]}});return e[1]=e[1]||e[0],e[2]=e[2]||e[0],e[3]=e[3]||e[1],e},t.prototype._monitorIntersections=function(){this._monitoringIntersections||(this._monitoringIntersections=!0,this.POLL_INTERVAL?this._monitoringInterval=setInterval(this._checkForIntersections,this.POLL_INTERVAL):(n(f,"resize",this._checkForIntersections,!0),n(_,"scroll",this._checkForIntersections,!0),this.USE_MUTATION_OBSERVER&&"MutationObserver"in f&&(this._domObserver=new MutationObserver(this._checkForIntersections),this._domObserver.observe(_,{attributes:!0,childList:!0,characterData:!0,subtree:!0}))))},t.prototype._unmonitorIntersections=function(){this._monitoringIntersections&&(this._monitoringIntersections=!1,clearInterval(this._monitoringInterval),this._monitoringInterval=null,o(f,"resize",this._checkForIntersections,!0),o(_,"scroll",this._checkForIntersections,!0),this._domObserver&&(this._domObserver.disconnect(),this._domObserver=null))},t.prototype._checkForIntersections=function(){var h=this._rootIsInDom(),c=h?this._getRootRect():{top:0,bottom:0,left:0,right:0,width:0,height:0};this._observationTargets.forEach(function(t){var e=t.element,n=m(e),o=this._rootContainsTarget(e),i=t.entry,r=h&&o&&this._computeTargetAndRootIntersection(e,c),s=t.entry=new a({time:f.performance&&performance.now&&performance.now(),target:e,boundingClientRect:n,rootBounds:c,intersectionRect:r});i?h&&o?this._hasCrossedThreshold(i,s)&&this._queuedEntries.push(s):i&&i.isIntersecting&&this._queuedEntries.push(s):this._queuedEntries.push(s)},this),this._queuedEntries.length&&this._callback(this.takeRecords(),this)},t.prototype._computeTargetAndRootIntersection=function(t,e){if("none"!=f.getComputedStyle(t).display){for(var n,o,i,r,s,h,c,a,u=m(t),l=v(t),p=!1;!p;){var d=null,g=1==l.nodeType?f.getComputedStyle(l):{};if("none"==g.display)return;if(l==this.root||l==_?(p=!0,d=e):l!=_.body&&l!=_.documentElement&&"visible"!=g.overflow&&(d=m(l)),d&&(n=d,o=u,void 0,i=Math.max(n.top,o.top),r=Math.min(n.bottom,o.bottom),s=Math.max(n.left,o.left),h=Math.min(n.right,o.right),a=r-i,!(u=0<=(c=h-s)&&0<=a&&{top:i,bottom:r,left:s,right:h,width:c,height:a})))break;l=v(l)}return u}},t.prototype._getRootRect=function(){var t;if(this.root)t=m(this.root);else{var e=_.documentElement,n=_.body;t={top:0,left:0,right:e.clientWidth||n.clientWidth,width:e.clientWidth||n.clientWidth,bottom:e.clientHeight||n.clientHeight,height:e.clientHeight||n.clientHeight}}return this._expandRectByRootMargin(t)},t.prototype._expandRectByRootMargin=function(n){var t=this._rootMarginValues.map(function(t,e){return"px"==t.unit?t.value:t.value*(e%2?n.width:n.height)/100}),e={top:n.top-t[0],right:n.right+t[1],bottom:n.bottom+t[2],left:n.left-t[3]};return e.width=e.right-e.left,e.height=e.bottom-e.top,e},t.prototype._hasCrossedThreshold=function(t,e){var n=t&&t.isIntersecting?t.intersectionRatio||0:-1,o=e.isIntersecting?e.intersectionRatio||0:-1;if(n!==o)for(var i=0;i<this.thresholds.length;i++){var r=this.thresholds[i];if(r==n||r==o||r<n!=r<o)return!0}},t.prototype._rootIsInDom=function(){return!this.root||i(_,this.root)},t.prototype._rootContainsTarget=function(t){return i(this.root||_,t)},t.prototype._registerInstance=function(){e.indexOf(this)<0&&e.push(this)},t.prototype._unregisterInstance=function(){var t=e.indexOf(this);-1!=t&&e.splice(t,1)},f.IntersectionObserver=t,f.IntersectionObserverEntry=a}function a(t){this.time=t.time,this.target=t.target,this.rootBounds=t.rootBounds,this.boundingClientRect=t.boundingClientRect,this.intersectionRect=t.intersectionRect||{top:0,bottom:0,left:0,right:0,width:0,height:0},this.isIntersecting=!!t.intersectionRect;var e=this.boundingClientRect,n=e.width*e.height,o=this.intersectionRect,i=o.width*o.height;this.intersectionRatio=n?Number((i/n).toFixed(4)):this.isIntersecting?1:0}function t(t,e){var n,o,i,r=e||{};if("function"!=typeof t)throw new Error("callback must be a function");if(r.root&&1!=r.root.nodeType)throw new Error("root must be an Element");this._checkForIntersections=(n=this._checkForIntersections.bind(this),o=this.THROTTLE_TIMEOUT,i=null,function(){i||(i=setTimeout(function(){n(),i=null},o))}),this._callback=t,this._observationTargets=[],this._queuedEntries=[],this._rootMarginValues=this._parseRootMargin(r.rootMargin),this.thresholds=this._initThresholds(r.threshold),this.root=r.root||null,this.rootMargin=this._rootMarginValues.map(function(t){return t.value+t.unit}).join(" ")}function n(t,e,n,o){"function"==typeof t.addEventListener?t.addEventListener(e,n,o||!1):"function"==typeof t.attachEvent&&t.attachEvent("on"+e,n)}function o(t,e,n,o){"function"==typeof t.removeEventListener?t.removeEventListener(e,n,o||!1):"function"==typeof t.detatchEvent&&t.detatchEvent("on"+e,n)}function m(t){var e;try{e=t.getBoundingClientRect()}catch(t){}return e?(e.width&&e.height||(e={top:e.top,right:e.right,bottom:e.bottom,left:e.left,width:e.right-e.left,height:e.bottom-e.top}),e):{top:0,bottom:0,left:0,right:0,width:0,height:0}}function i(t,e){for(var n=e;n;){if(n==t)return!0;n=v(n)}return!1}function v(t){var e=t.parentNode;return e&&11==e.nodeType&&e.host?e.host:e&&e.assignedSlot?e.assignedSlot.parentNode:e}}(window,document);


(function() {
    var app = angular.module("resortpro", ["resortpro.services", "resortpro.filters", "resortpro.property", "resortpro.checkout", "ngMap", "angularPayments"], function($interpolateProvider) {
        $interpolateProvider.startSymbol("{[");
        $interpolateProvider.endSymbol("]}")
    });
    app.config(function($locationProvider,$anchorScrollProvider) {
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false,
            rewriteLinks: false
        })

        $anchorScrollProvider.disableAutoScrolling();
    });
    angular.element(document).ready(function() {
        angular.bootstrap(document, ["resortpro"])
    })
})();
(function() {
    var mapLoaded = false;
    var app = angular.module("resortpro.checkout", ["resortpro.services", "resortpro.filters", "resortpro.directives", "ngCookies"]);
    app.controller("CheckoutController", ["$scope", "$rootScope", "$sce", "$http", "$window", "$filter", "$location", "Alert", "rpapi", "rpuri", "$cookies", function($scope, $rootScope, $sce, $http, $window, $filter, $location, Alert, rpapi, rpuri, $cookies) {
        $scope.error = false;
        $scope.startDate = $filter("date")(rpuri.getQueryStringParam("sd"), "MM/dd/yyyy");
        $scope.endDate = $filter("date")(rpuri.getQueryStringParam("ed"), "MM/dd/yyyy");
        $scope.unit = rpuri.getQueryStringParam("unit");
        $scope.occupants = rpuri.getQueryStringParam("oc");
        $scope.occupants_small = rpuri.getQueryStringParam("ch");
        $scope.pets = rpuri.getQueryStringParam("pets");
        $scope.amenities = [];
        $scope.hasAddOns = false;
        $scope.hasTravelInsurance = false;
        $scope.hasDamageProtection = false;
        $scope.hasCfar = false;
        $scope.protectionError = false;
        $scope.confirmationId = 0;
        $scope.referrer_url = "";
        $scope.pbgEnabled = false;
        $scope.toggleup = false;
        $scope.toggledown = true;
        $scope.optionalItems = "";
        $scope.cookieCheckout = {};
        $scope.cookieConfirmation = {};
        var year = (new Date).getFullYear();
        var range = [];
        range.push(year);
        for (var i = 1; i < 10; i++) {
            range.push(year + i)
        }
        $scope.years = range;
        $scope.stepOneDisabled = true;
        $scope.stepTwoDisabled = true;
        $scope.chkTravelInsurance = false;
        $scope.chkCfar = false;
        $scope.chkTravelInsuranceR = {
            selectedOption: false
        };
        $scope.chkDamageWaiverR = {
            selectedOption: false
        };
        $scope.chkCfarR = {
            selectedOption: false
        };
        $scope.showBtn = true;

        $scope.showload = true;

        $scope.decreaseGuest = function(maxguest) {
           
        }

        $scope.validateStepOne = function(checkout) {
            if (checkout) {
                if (checkout.fname && checkout.lname && checkout.email && checkout.phone) {
                    $scope.stepOneDisabled = false
                } else {
                    $scope.stepOneDisabled = true
                }
            }
        };
        $scope.createCheckoutCookie = function() {
            var now = new Date;
            now.setDate(now.getDate() + 30);
            if ($scope.checkout.fname) {
                $scope.cookieCheckout["fname"] = $scope.checkout.fname
            }
            if ($scope.checkout.lname) {
                $scope.cookieCheckout["lname"] = $scope.checkout.lname
            }
            if ($scope.checkout.email) {
                $scope.cookieCheckout["email"] = $scope.checkout.email
            }
            if ($scope.checkout.phone) {
                $scope.cookieCheckout["phone"] = $scope.checkout.phone
            }
            var res = $cookies.putObject("streamline-checkout-cookie", $scope.cookieCheckout, {
                path: "/",
                expires: now
            })
        };
        $scope.validateStepTwo = function() {
            var travelOk = true;
            var damageOk = true;
            if (($scope.hasTravelInsurance || $scope.hasCfar) && !($scope.chkCfar || $scope.chkTravelInsurance || $scope.chkTravelInsuranceNo)) {
                travelOk = false
            }
            if ($scope.hasDamageProtection && !($scope.chkDamageWaiver || $scope.chkDamageWaiverNo)) {
                damageOk = false
            }
            if (travelOk && damageOk) {
                $scope.stepTwoDisabled = false
            } else {
                $scope.stepTwoDisabled = true
            }
            $scope.getPreReservation()
        };
        $scope.calculateMarkup = function(strPrice) {
            var price = strPrice;
            if (typeof strPrice == "string") {
                price = parseFloat(strPrice.replace("$", "").replace(",", ""))
            }
            if ($rootScope.rateMarkup > 0) {
                var pct = 1 + parseFloat($rootScope.rateMarkup) / 100;
                price = price * pct
            }
            return price
        };
        $scope.toggleCfar = function(feeId) {
            if ($scope.chkCfarR.selectedOption) {
                $scope.chkCfar = true;
                $scope.chkTravelInsuranceNo = false;
                $scope.chkTravelInsurance = false;
                $scope.chkTravelInsuranceR.selectedOption = false
            } else {
                $scope.chkCfar = false
            }
            setTimeout(function() {
                $scope.validateStepTwo()
            }, 100)
        };
        $scope.toggleTravelInsurance = function(feeId) {
            run_waitMe(".price_sticky", "bounce", "Updating price...");
            if ($scope.chkTravelInsuranceR.selectedOption) {
                $scope.chkTravelInsurance = true;
                $scope.chkCfar = false;
                $scope.chkCfarR.selectedOption = false;
                $scope.chkTravelInsuranceNo = false
            } else {
                $scope.chkTravelInsurance = false
            }
            setTimeout(function() {
                $scope.validateStepTwo()
                $scope.toggleup = false;
                $scope.toggledown = true;
            }, 100)
        };
        $scope.acceptCfar = function() {
            if ($scope.chkCfar) {
                $scope.chkTravelInsurance = false;
                $scope.chkTravelInsuranceNo = false;
                $scope.chkCfarR.selectedOption = true;
                $scope.chkTravelInsuranceR.selectedOption = false
            } else {
                $scope.chkCfarR.selectedOption = false
            }
            setTimeout(function() {
                $scope.validateStepTwo()
            }, 100)
        };
        $scope.acceptTravelInsurance = function() {
            run_waitMe(".price_sticky", "bounce", "Updating price...");
            if ($scope.chkTravelInsurance) {
                $scope.chkCfar = false;
                $scope.chkTravelInsuranceNo = false;
                $scope.chkTravelInsuranceR.selectedOption = true;
                $scope.chkCfarR.selectedOption = false

            } else {
                $scope.chkTravelInsuranceR.selectedOption = false
            }
            setTimeout(function() {
                $scope.validateStepTwo()
                $scope.toggleup = false;
                $scope.toggledown = true;
            }, 100)
        };

        $scope.toggleTax = function() {
           
           if( jQuery('.show_tax').find('.fa').attr("class") == "fa fa-chevron-circle-down ng-scope"){

                jQuery('.breakdown-taxes-hidden').css("display","table-row");
                $scope.toggleup = true;
                $scope.toggledown = false;
           }else{
                jQuery('.breakdown-taxes-hidden').css("display","none");
                $scope.toggleup = false;
                $scope.toggledown = true;
           }
        }

        $scope.rejectTravelInsurance = function() {
            run_waitMe(".price_sticky", "bounce", "Updating price...");
            if ($scope.chkTravelInsuranceNo) {
                $scope.chkTravelInsurance = false;
                $scope.chkTravelInsuranceR.selectedOption = false;
                $scope.chkCfar = false;
                $scope.chkCfarR.selectedOption = false
            }
            setTimeout(function() {
                $scope.validateStepTwo()
                $scope.toggleup = false;
                $scope.toggledown = true;
            }, 100)
        };
        $scope.getAmenitiesWithRates = function() {};
        $scope.addToReservation = function() {
            var foundAddon = false;
            jQuery(".addOn:checked").each(function(index) {
                if (jQuery(this).prop("checked")) {
                    foundAddon = true;
                    jQuery("#optional-fee-" + jQuery(this).val()).prop("checked", true);
                    var qty = parseInt(jQuery("#qty-optional-fee-" + jQuery(this).val()).val());
                    if (!isNaN(qty)) {
                        jQuery("#label-qty-" + jQuery(this).val()).html(" x " + jQuery("#qty-optional-fee-" + jQuery(this).val()).val())
                    } else {
                        jQuery("#label-qty-" + jQuery(this).val()).html("")
                    }
                }
            });
            if (foundAddon) {
                $scope.getPreReservation();
                jQuery("#modalAmenities").modal("hide")
            } else {
                alert("You have not selected any add-ons.");
                return false
            }
        };
        $scope.toggleDamageWaiver = function(feeId) {
            run_waitMe(".price_sticky", "bounce", "Updating price...");
            if ($scope.chkDamageWaiverR.selectedOption) {
                $scope.chkDamageWaiver = true;
                $scope.chkDamageWaiverNo = false
            } else {
                $scope.chkDamageWaiver = false
            }
            setTimeout(function() {
                $scope.validateStepTwo()
            }, 100)
        };
        $scope.acceptDamageWaiver = function() {
            run_waitMe(".price_sticky", "bounce", "Updating price...");
            if ($scope.chkDamageWaiver) {
                $scope.chkDamageWaiverNo = false;
                $scope.chkDamageWaiverR.selectedOption = true
            } else {
                $scope.chkDamageWaiverR.selectedOption = false
            }
            setTimeout(function() {
                $scope.validateStepTwo()
            }, 100)
        };

        $scope.toggleAdditionalFees = function() {
              run_waitMe(".price_sticky", "bounce", "Updating price...");
              setTimeout(function() {
                $scope.getPreReservation()
              }, 100)
        }

        $scope.goToStepTwoA = function() {
        	jQuery("form[name='formStep1']")[0].reset();
        	$scope.checkout.country = "US"
            $scope.getStates();
            if (typeof jQuery("#btn-step1").attr("disabled") == "undefined") {
                jQuery("#step0").hide();
                jQuery("#step1").show();
                jQuery("#step2").hide();
                jQuery("#step3").hide();
            }
        };
        $scope.rejectDamageWaiver = function() {
            run_waitMe(".price_sticky", "bounce", "Updating price...");
            if ($scope.chkDamageWaiverNo) {
                $scope.chkDamageWaiver = false;
                $scope.chkDamageWaiverR.selectedOption = false
            }
            setTimeout(function() {
                $scope.validateStepTwo()
            }, 100)
        };
        $scope.goToStepOne = function() {
            jQuery('.main_cnt_step_2').removeAttr('style');
            jQuery("#step2").hide();
            jQuery("#step1").show();
            jQuery("#step3").hide();
            if ($rootScope.checkout_layout_option == "2") {
                if ($scope.reservationDetails.optional_fees.length > 0) {
                    jQuery(".progress-bar").attr("style", "width:33%");
                    jQuery(".r_protection .dot i").removeClass("fa-check");
                    jQuery(".r_protection .dot i").addClass("fa-circle");
                    jQuery(".r_protection .circle").removeClass("primary-button");
                    jQuery(".r_payment .circle").removeClass("primary-button");
                    jQuery(".r_payment .dot i").removeClass("fa-check");
                    jQuery(".r_payment .dot i").addClass("fa-circle")
                } else {
                    jQuery(".r_payment .circle").removeClass("primary-button");
                    jQuery(".r_payment .dot i").removeClass("fa-check");
                    jQuery(".r_payment .dot i").addClass("fa-circle");
                    jQuery(".progress-bar").attr("style", "width:50%")
                }
            }
        };
        $scope.goToStepZero = function() {
            jQuery("#step0").show();
            jQuery("#step1").hide();
            jQuery("#step2").hide();
            jQuery("#step3").hide()
            jQuery('.main_cnt_step_1').removeAttr('style');
        };
        $scope.goToStep2 = function(isPbg) {
            $scope.pbgEnabled = isPbg;
            $scope.createCheckoutCookie();
            if ($scope.formStep1.$valid) {
                if (!$scope.hash && $rootScope.checkoutSettings && $rootScope.checkoutSettings.createLeads == 1 && !$scope.confirmationId > 0) {
                    var params = {
                        not_blocked_request: "yes",
                        startdate: $scope.startDate,
                        enddate: $scope.endDate,
                        occupants: $scope.occupants,
                        occupants_small: $scope.occupants_small,
                        first_name: $scope.checkout.fname,
                        last_name: $scope.checkout.lname,
                        email: $scope.checkout.email,
                        mobile_phone: $scope.checkout.phone,
                        pets: $scope.pets,
                        disable_minimal_days: "yes"
                    };
                    if ($rootScope.bookingSettings && $rootScope.bookingSettings.hearedAboutId > 0) params["hear_about_id"] = $rootScope.bookingSettings.hearedAboutId;
                    if ($scope.referrer_url != "") params["referrer_url"] = $scope.referrer_url;
                    if ($rootScope.roomTypeLogic == 1) {
                        params["use_room_type_logic"] = 1;
                        params["condo_type_id"] = $scope.checkout.condo_type_id;
                        params["location_id"] = $scope.checkout.location_id
                    } else {
                        params["unit_id"] = $scope.unit
                    }
                    params["flags"] = [{
                        flag_id: 2027
                    }];
                    rpapi.getWithParams("MakeReservation", params).success(function(obj) {
                        if (obj.status) {
                            Alert.add(Alert.errorType, obj.status.description)
                        } else {
                            $scope.confirmationId = obj.data.reservation.confirmation_id;
                            $scope.cookieConfirmation["confirmation_id"] = obj.data.reservation.confirmation_id;
                            var now = new Date;
                            now.setDate(now.getDate() + 10);
                            $cookies.putObject("streamline-confirmation-cookie", $scope.cookieConfirmation, {
                                path: "/",
                                expires: now
                            })
                        }
                    })
                }
                if ($scope.reservationDetails.optional_fees.length > 0) {
                    $scope.goToStepTwo();
                    if ($rootScope.checkout_layout_option == "2") {
                        jQuery(".progress-bar").attr("style", "width:66%");
                        jQuery(".r_protection .dot i").removeClass("fa-circle");
                        jQuery(".r_protection .dot i").addClass("fa-check");
                        jQuery(".r_protection .circle").addClass("primary-button")
                    }
                } else {
                    $scope.goToStepThree(true);
                    if ($rootScope.checkout_layout_option == "2") {
                        jQuery(".progress-bar").attr("style", "width:100%");
                        jQuery(".r_protection .dot i").removeClass("fa-circle");
                        jQuery(".r_protection .dot i").addClass("fa-check");
                        jQuery(".r_protection .circle").addClass("primary-button")
                    }
                }
            }
            $scope.getStates()
        };
        $scope.goToStepTwo = function() {
            jQuery("#paymentform")[0].reset();
            jQuery('.main_cnt_step_3').removeAttr('style');
            if ($rootScope.checkout_layout_option == "2") {
                setTimeout(function() {
                    jQuery("#step2").show();
                    jQuery("#step1").hide();
                    jQuery("#step3").hide();
                    jQuery(".progress-bar").attr("style", "width:66%");
                    jQuery(".r_payment .dot i").addClass("fa-circle");
                    jQuery(".r_payment .dot i").removeClass("fa-check");
                    jQuery(".r_payment .circle").removeClass("primary-button");
                    jQuery(".r_confirmation .dot i").addClass("fa-circle");
                    jQuery(".r_confirmation .dot i").removeClass("fa-check");
                    jQuery(".r_confirmation .circle").removeClass("primary-button")
                }, 500)
            } else {
                jQuery("#step2").show();
                jQuery("#step1").hide();
                jQuery("#step3").hide();
            }
            if ($scope.amenities.length > 0 && $rootScope.checkoutSettings.useAddOns == 1) {
                jQuery("#modalAmenities").modal()
            }
        };
        $scope.goToStep3 = function() {
            if (!$scope.stepTwoDisabled) {
                $scope.protectionError = false;
                $scope.goToStepThree($scope.chkDamageWaiverNo);
                if ($scope.pbgEnabled) {
                    //PBG.onReady()
                }
            } else {
                $scope.protectionError = true
            }
        };
        $scope.goToStepThree = function(damageWaiverNo) {
            jQuery(".progress-bar").attr("style", "width:99%");
            jQuery(".r_payment .dot i").removeClass("fa-circle");
            jQuery(".r_payment .dot i").addClass("fa-check");
            jQuery(".r_payment .circle").addClass("primary-button");
            $scope.chkDamageWaiverNo = damageWaiverNo;
            if($rootScope.checkout_layout_option == "2") {
                setTimeout(function() {
                    jQuery("#step3").show();
                    jQuery("#step2").hide();
                    jQuery("#step1").hide()
                }, 500)
            } else {
                jQuery("#step3").show();
                jQuery("#step2").hide();
                jQuery("#step1").hide()
            }
        };
        $scope.validateStep3 = function(checkout) {
            if ($scope.formStep3.$valid) {
                $scope.processCheckout(checkout);
                jQuery(".r_confirmation .dot i").removeClass("fa-circle");
                jQuery(".r_confirmation .dot i").addClass("fa-check");
                jQuery(".r_confirmation .circle").addClass("primary-button");

            }
        };
        $scope.validatePaymentForm = function(checkout) {
            if ($scope.formStep3.$valid) {
                if (parseFloat($scope.checkout.price_balance) < parseFloat($scope.checkout.payment_amount)) {
                    alert("Please enter payment amount lower than the price balance");
                    return false
                }

                run_waitMe("#step3", "bounce", "Processing your request");
                var params = {
                    first_name: checkout.fname,
                    last_name: checkout.lname,
                    email: checkout.email,
                    address: checkout.address,
                    address2: checkout.address2,
                    city: checkout.city,
                    zip: checkout.postal_code,
                    state_name: checkout.state,
                    country_name: checkout.country,
                    confirmation_id: checkout.confirmation_id,
                    payment_amount: checkout.payment_amount
                };
                if (checkout.card_type < 5) {
                    var exp_date = checkout.expiration_date.split("/");
                    params["payment_type_id"] = 1;
                    params["credit_card_type_id"] = checkout.card_type;
                    params["credit_card_number"] = checkout.card_number;
                    params["credit_card_expiration_month"] = exp_date[0];
                    params["credit_card_expiration_year"] = exp_date[1];
                    params["credit_card_cid"] = checkout.card_cvv
                } else {
                    params["payment_type_id"] = 33;
                    params["bank_account_number"] = checkout.bank_account_number;
                    params["bank_routing_number"] = checkout.bank_routing_number;
                    params["bank_account_holder_name"] = checkout.bank_account_holder_name
                }
                rpapi.getWithParams("AddReservationPayment", params).success(function(obj) {
                    hide_waitMe("#step3");
                    if (obj.data.message) {
                        Alert.add(Alert.infoType, obj.data.message)
                    } else {
                        Alert.add(Alert.errorType, "Unknown error ocurred.")
                    }
                })
            }
        };
        
        $scope.requestMoreInfo = function(){
            jQuery('#myModal2').modal('show');
            jQuery('#myModal2').on('shown.bs.modal', function() {
                 jQuery(this).before(jQuery('.modal-backdrop'));
                 jQuery(this).css("z-index", parseInt(jQuery('.modal-backdrop').css('z-index')) + 1);
            }); 
        }

        $scope.setNights = function() {
            
            if($scope.modal_nights) {
                jQuery('#myModal').modal("hide");
                $scope.modal_checkin = jQuery('#modal_checkin').val();
                var frm = new Date($scope.modal_checkin);
                nts = parseInt($scope.modal_nights);

                var the_year = frm.getFullYear();
                if (the_year < 2e3) the_year = 2e3 + the_year % 100;
                var to = new Date(the_year, frm.getMonth(), frm.getDate() + nts);
                $scope.modal_checkout = to.format("mm/dd/yyyy");
                var booking = {
                    checkin: frm.format("mm/dd/yyyy"),
                    checkout: to.format("mm/dd/yyyy"),
                    unit_id: $scope.book.unit_id,
                    occupants: 1,
                    occupants_small: 0,
                    pets: 0
                };
                jQuery("#modal_end_date").datepicker("option", "minDate", frm);
                $scope.book.checkin = frm.format("mm/dd/yyyy");
                $scope.book.checkout = to.format("mm/dd/yyyy");
                jQuery('#book_start_date').val(frm.format("mm/dd/yyyy"));
                jQuery('#book_end_date').val(to.format("mm/dd/yyyy"));
                $scope.getPreReservationPrice2($scope.book,1)
            }
            //$scope.updatePricePopupCalendar()
        };
        $scope.initCheckout = function() {

            if ($scope.hash) {
                var params = {
                    hash: $scope.hash,
                    return_payments: "yes"
                };
                rpapi.getWithParams("GetReservationPrice", params).success(function(obj) {
                    var res_price = obj.data;
                    if (res_price.optional_fees.id) {
                        resultData = [];
                        resultData.push(res_price.optional_fees);
                        res_price.optional_fees = resultData
                    }
                    var arr_amenities = [];
                    if (res_price.optional_fees.length > 0) {
                        angular.forEach(res_price.optional_fees, function(optional_fee, i) {
                            if (optional_fee.travel_insurance == 0 && optional_fee.cfar == 0 && optional_fee.damage_waiver == 0) {
                                arr_amenities.push({
                                    amenity_cost: $filter("currency")(optional_fee.value, undefined, 2),
                                    amenity_id: optional_fee.id,
                                    amenity_thumbnail: null,
                                    amenity_name: optional_fee.name,
                                    amenity_description: optional_fee.description
                                })
                            }
                        })
                    }
                    if ($scope.amenities.length == 0) {
                        $scope.amenities = arr_amenities
                    }
                    if (res_price.required_fees.id) {
                        resultData = [];
                        resultData.push(res_price.required_fees);
                        res_price.required_fees = resultData
                    }
                    if (res_price.taxes_details.id) {
                        resultData = [];
                        resultData.push(res_price.taxes_details);
                        res_price.taxes_details = resultData
                    }
                    if (res_price.security_deposits && res_price.security_deposits.security_deposit.ledger_id) {
                        resultData = [];
                        resultData.push(res_price.security_deposits.security_deposit);
                        res_price.security_deposits.security_deposit = resultData;
                        $scope.chkDamageWaiverNo = true
                    }
                    var total_taxes = 0;
                    angular.forEach(res_price.taxes_details, function(value, key) {
                        total_taxes += value.value
                    });
                    angular.forEach(res_price.required_fees, function(value, key) {
                        total_taxes += value.value
                    });
                    angular.forEach(res_price.optional_fees, function(value, key) {
                        if (value.damage_waiver == 1) {
                            $scope.hasDamageProtection = true;
                            $scope.damageProtection = value.value
                        }
                        if (value.travel_insurance == 1) {
                            $scope.hasTravelInsurance = true;
                            $scope.travelInsurance = value.value
                        }
                        if (value.cfar == 1) {
                            $scope.hasCfar = true;
                            $scope.cfar = value.value
                        }
                        if (!$scope.hasDamageProtection && !$scope.hasTravelInsurance) {
                            $scope.stepTwoDisabled = false
                        }
                    });
                    angular.forEach(res_price.security_deposits, function(value, key) {
                        $scope.securityDeposit = value.value
                    });
                    $scope.subTotal = $scope.calculateMarkup((obj.data.price + obj.data.coupon_discount).toString());
                    var dif = $scope.subTotal - obj.data.coupon_discount - obj.data.price;
                    $scope.taxesAndFees = total_taxes - dif;
                    if (res_price.reservation_id) {
                        rpapi.getWithParams("GetReservationInfo", params).success(function(obj) {
                            var res_info = obj.data.reservation;
                            $scope.unit = res_info.unit_id;
                            var params = {
                                startdate: res_info.startdate,
                                enddate: res_info.enddate,
                                occupants: res_info.occupants,
                                use_room_type_logic: parseInt($rootScope.roomTypeLogic),
                                page_number: 1,
                                page_results_number: 1e3
                            };
                            if (parseInt($rootScope.roomTypeLogic) != 1) {
                                params["unit_id"] = res_info.unit_id
                            } else {
                                params["condo_type_id"] = res_info.condo_type_id;
                                params["location_id"] = res_info.location_id
                            }
                            rpapi.getWithParams("GetPropertyAvailability", params).success(function(obj) {
                                if (obj.status) {
                                    $scope.error = true;
                                    $scope.errorMessage = obj.status.description;
                                    return false
                                } else {
                                    var result = obj.data.available_properties;
                                    if (result.pagination.total_units == 0) {
                                        $scope.error = true;
                                        $scope.errorMessage = "Sorry, this property is not available during the selected dates.";
                                        return false
                                    }
                                }
                            }).error(function() {
                                $scope.error = true;
                                $scope.errorMessage = Alert.errorMessage;
                                return false
                            });
                            $scope.checkout = {
                                fname: res_info.first_name,
                                lname: res_info.last_name,
                                email: res_info.email,
                                phone: $scope.isEmptyObject(res_info.phone) ? "" : res_info.phone,
                                unit: res_info.unit_id,
                                promo_code: $scope.isEmptyObject(res_info.coupon_code) ? "" : res_info.coupon_code
                            };
                            if ($scope.startDate == "" || $scope.startDate == undefined) $scope.startDate = res_info.startdate;
                            if ($scope.endDate == "" || $scope.endDate == undefined) $scope.endDate = res_info.enddate;
                            if ($scope.occupants == "" || $scope.occupants == undefined) $scope.occupants = res_info.occupants;
                            if ($scope.occupants_small == "" || $scope.occupants_small == undefined) $scope.occupants_small = res_info.occupants_small;
                            if ($scope.pets == "" || $scope.pets == undefined) $scope.pets = res_info.pets;
                            $scope.reservationDetails = res_price;
                            $scope.reservationDetails.location_name = res_price.unit_name;
                            if (parseInt($rootScope.roomTypeLogic) == 1) {
                                $scope.unit_name = res_price.condo_type_name
                            }
                            $scope.checkout.address = res_info.address1;
                            $scope.stepOneDisabled = false;
                            $scope.getCountries();
                            $scope.getStates()
                        })
                    }
                })
            } else {
                var checkout_cookie = $cookies.getObject("streamline-checkout-cookie");
                var confirmation_cookie = $cookies.getObject("streamline-confirmation-cookie");
                if (checkout_cookie) {
                    $scope.checkout = {};
                    if (checkout_cookie["fname"]) {
                        $scope.checkout.fname = checkout_cookie["fname"]
                    }
                    if (checkout_cookie["lname"]) {
                        $scope.checkout.lname = checkout_cookie["lname"]
                    }
                    if (checkout_cookie["email"]) {
                        $scope.checkout.email = checkout_cookie["email"]
                    }
                    if (checkout_cookie["phone"]) {
                        $scope.checkout.phone = checkout_cookie["phone"]
                    }
                }
                if (confirmation_cookie) {
                    rpapi.getWithParams("GetReservationInfo", {
                        confirmation_id: confirmation_cookie["confirmation_id"]
                    }).success(function(obj) {
                        if (obj.data) {
                            if (obj.data.reservation.unit_id == $scope.unit && obj.data.reservation.startdate == $scope.startDate && obj.data.reservation.enddate == $scope.endDate) {
                                $scope.confirmationId = confirmation_cookie["confirmation_id"]
                            }
                        }
                    })
                }
                var params = {
                    startdate: $scope.startDate,
                    enddate: $scope.endDate,
                    occupants: $scope.occupants,
                    page_number: 1,
                    page_results_number: 1e3,
                    use_room_type_logic: parseInt($rootScope.roomTypeLogic)
                };
                if (parseInt($rootScope.roomTypeLogic) != 1) {
                    params["unit_id"] = $scope.unit_id
                } else {
                    params["condo_type_id"] = $scope.condo_type_id;
                    params["location_id"] = $scope.location_id
                }
                if ($scope.unit && $scope.startDate && $scope.endDate && $scope.occupants) {
                    rpapi.getWithParams("GetPropertyAvailability", params).success(function(obj) {
                        if (obj.status) {
                            $scope.error = true;
                            $scope.errorMessage = obj.status.description
                        } else {
                            var result = obj.data.available_properties;
                            if (result.pagination.total_units == 0) {
                                $scope.error = true;
                                $scope.errorMessage = "Sorry, this property is not available during the selected dates."
                            } else {
                                $scope.getPreReservation(1);
                                $scope.getCountries();
                                $scope.getStates()
                            }
                        }
                    }).error(function() {
                        $scope.error = true;
                        $scope.errorMessage = Alert.errorMessage
                    })
                } else {
                    $scope.error = true;
                    $scope.errorMessage = Alert.errorMessage
                }
            }
        };
        $scope.isEmptyObject = function(obj) {
            return angular.equals({}, obj)
        };
        $scope.renderCalendar = function(date, checkout) {
            var title = "";
            var booked = false;
            var strClass = "available";
            angular.forEach($rootScope.rates_details, function(rateObj, index) {
                var periodBegin = new Date(rateObj.period_begin);
                var periodEnd = new Date(rateObj.period_end);
                if (date >= periodBegin && date <= periodEnd) {
                    var daysMapping = {
                        Sunday: 0,
                        Monday: 1,
                        Tuesday: 2,
                        Wednesday: 3,
                        Thursday: 4,
                        Friday: 5,
                        Saturday: 6
                    };
                    if (rateObj.daily_first_interval) {
                        var arrInterval = rateObj.daily_first_interval.split("-");
                        title = rateObj.daily_first_interval_price;
                        if (arrInterval.length > 1) {
                            var firstInt = daysMapping[arrInterval[0]];
                            var secondInt = daysMapping[arrInterval[1]];
                            if (secondInt > firstInt) {
                                if (date.getDay() >= firstInt && date.getDay() <= secondInt) {
                                    title = rateObj.daily_first_interval_price
                                } else {
                                    title = rateObj.daily_second_interval_price
                                }
                            } else {
                                if (date.getDay() < firstInt && date.getDay() > secondInt) {
                                    title = rateObj.daily_second_interval_price
                                } else {
                                    title = rateObj.daily_first_interval_price
                                }
                            }
                        } else {
                            title = rateObj.daily_first_interval_price
                        }
                    } else {
                        title = rateObj.season_name
                    }
                }
            });
            angular.forEach($rootScope.calendar, function(calObj, index) {
                var use_slash = false;
                var startdate = new Date(calObj.startdate);
                var enddate = new Date(calObj.enddate);
                if ($rootScope.slash == "1") use_slash = true;
                if (use_slash) {
                    enddate.setTime(enddate.getTime() + 1 * 864e5);
                    if (!checkout) {
                        if (date >= startdate && date <= enddate) {
                            booked = true;
                            strClass = "booked";
                            if (date.getTime() === startdate.getTime()) {
                                if ($rootScope.calendar[index - 1]) {
                                    var previousdate = new Date($rootScope.calendar[index - 1].enddate);
                                    previousdate.setTime(previousdate.getTime() + 1 * 864e5);
                                    if (previousdate.getTime() !== startdate.getTime()) {
                                        booked = true;
                                        strClass = "slashl"
                                    }
                                } else {
                                    booked = true;
                                    strClass = "slashl"
                                }
                            } else if (date.getTime() === enddate.getTime()) {
                                booked = false;
                                strClass = "slashr"
                            }
                        }
                    } else {
                        if (date.getTime() === startdate.getTime()) {
                            if ($rootScope.calendar[index - 1]) {
                                var previousdate = new Date($rootScope.calendar[index - 1].enddate);
                                previousdate.setTime(previousdate.getTime() + 1 * 864e5);
                                if (previousdate.getTime() !== startdate.getTime()) {
                                    booked = false;
                                    strClass = "slashl"
                                } else {
                                    booked = false;
                                    strClass = "booked"
                                }
                            } else {
                                booked = false;
                                strClass = "slashl"
                            }
                        }
                        if (date > startdate && date <= enddate) {
                            booked = true;
                            strClass = "booked";
                            if ($scope.book.checkin) {
                                checkin = new Date($scope.book.checkin);
                                if (date > checkin) {
                                    $scope.maxCalendarDate = date
                                }
                            }
                        }
                    }
                } else {
                    if (!checkout) {
                        if (date >= startdate && date <= enddate) {
                            booked = true;
                            strClass = "booked"
                        }
                    } else {
                        if (date.getTime() === startdate.getTime()) {
                            booked = false;
                            strClass = "available"
                        }
                        if (date > startdate && date <= enddate) {
                            booked = true;
                            strClass = "booked"
                        }
                    }
                }
            });
            if ($rootScope.hideTooltips == 1) {
                title = ""
            }
            return [!booked, strClass, title]
        };
        $scope.renderCalendarNew = function(date, restriction, action) {
            if ($rootScope.calendar2.range) {
                var str_price = "";
                var start_date = new Date($rootScope.calendar2.range.beginDate);
                var end_date = new Date($rootScope.calendar2.range.endDate);
                angular.forEach($rootScope.rates_details, function(rateObj) {
                    var periodBegin = new Date(rateObj.period_begin);
                    var periodEnd = new Date(rateObj.period_end);
                    if (date >= periodBegin && date <= periodEnd) {
                        var daysMapping = {
                            Sunday: 0,
                            Monday: 1,
                            Tuesday: 2,
                            Wednesday: 3,
                            Thursday: 4,
                            Friday: 5,
                            Saturday: 6
                        };
                        if (rateObj.daily_first_interval) {
                            var arrInterval = rateObj.daily_first_interval.split("-");
                            str_price = rateObj.daily_first_interval_price;
                            if (arrInterval.length > 1) {
                                var firstInt = daysMapping[arrInterval[0]];
                                var secondInt = daysMapping[arrInterval[1]];
                                if (secondInt > firstInt) {
                                    if (date.getDay() >= firstInt && date.getDay() <= secondInt) {
                                        str_price = rateObj.daily_first_interval_price
                                    } else {
                                        str_price = rateObj.daily_second_interval_price
                                    }
                                } else {
                                    if (date.getDay() < firstInt && date.getDay() > secondInt) {
                                        str_price = rateObj.daily_second_interval_price
                                    } else {
                                        str_price = rateObj.daily_first_interval_price
                                    }
                                }
                            } else {
                                str_price = rateObj.daily_first_interval_price
                            }
                        } else {
                            str_price = rateObj.season_name
                        }
                    }
                });
                var loop = new Date(start_date);
                var i = 0;
                while (loop <= end_date) {
                    if (date.toDateString() == loop.toDateString()) {
                        var prev_available = $rootScope.calendar2.availability.substring(i - 1, i);
                        var available = $rootScope.calendar2.availability.substring(i, i + 1);
                        var change_over = $rootScope.calendar2.changeOver.substring(i, i + 1);
                        if (available == "Y") {
                            var is_available = true;
                            if (restriction && action == "checkin" && (change_over == "X" || change_over == "O")) {
                                is_available = false
                            } else if (restriction && action == "checkout" && (change_over == "X" || change_over == "I")) {
                                is_available = false
                            } else if (!restriction) {
                                is_available = false
                            }
                            var class_available = prev_available == "N" ? "slash-end available" : "available";
                            return [is_available, class_available, str_price]
                        } else {
                            var class_available = prev_available == "Y" ? "slash-start available" : "booked";
                            var is_available = false;
                            if (prev_available == "Y" && action == "checkout") {
                                is_available = true;
                                class_available = "slash-start available"
                            }
                            return [is_available, class_available, str_price]
                        }
                    }
                    var current_date = loop.setDate(loop.getDate() + 1);
                    loop = new Date(current_date);
                    i++
                }
            }
            return [false, "booked", ""]
        };
        

        $scope.getPreReservationPrice2 = function(booking, res) {
        	Alert.clear();
            if (booking.checkin && booking.checkout) {
                $scope.startDate = booking.checkin;
                $scope.endDate = booking.checkout;
                $scope.occupants = booking.occupants;
                $scope.unit = booking.unit_id;
                $scope.occupants_small = booking.occupants_small;
                $scope.pets = booking.pets;
                rpapi.getWithParams("VerifyPropertyAvailability", {
                    unit_id: booking.unit_id,
                    startdate: booking.checkin,
                    enddate: booking.checkout,
                    occupants: booking.occupants,
                    occupants_small: booking.occupants_small,
                    pets: booking.pets,
                    use_room_type_logic: parseInt($rootScope.roomTypeLogic)
                }).success(function(obj) {
                    if (obj.status) {
                        $scope.reservation_days = [];
                        $scope.total_reservation = 0;
                        $scope.first_day_price = 0;
                        $scope.rent = 0;
                        $scope.taxes = 0;
                        var errorMsg = obj.status.description;
                        if (obj.status.code == "E0031" && $rootScope.searchSettings.restrictionMsg != "") {
                            errorMsg = $rootScope.searchSettings.restrictionMsg
                        }
                        jQuery(".sticky-wrapper").hide();
                        jQuery(".price_sticky").hide();
                        jQuery(".view_breakdown_days").hide();
                        Alert.add(Alert.errorType, errorMsg);
                        hide_waitMe("#resortpro-book-unit form");
                        $scope.isDisabled = true
                    } else {
                        jQuery(".sticky-wrapper").show();
                        jQuery(".price_sticky").show();
                        jQuery(".view_breakdown_days").show();
                        Alert.clear();
                        $scope.isDisabled = false;
                        if ($rootScope.bookingSettings.inquiryOnlyFrom && $rootScope.bookingSettings.inquiryOnlyTo) {
                            var inquiryOnlyFrom = new Date($rootScope.bookingSettings.inquiryOnlyFrom);
                            var inquiryOnlyTo = new Date($rootScope.bookingSettings.inquiryOnlyTo);
                            if (!(checkout.getTime() <= inquiryOnlyFrom.getTime() || checkin.getTime() >= inquiryOnlyTo.getTime())) {
                                Alert.add(Alert.errorType, "These dates are Inquiry Only, please send us a inquiry using the form below");
                                hide_waitMe("#resortpro-book-unit form");
                                $scope.isDisabled = true;
                                return false
                            }
                        }
                        var maxLengthStay = $rootScope.bookingSettings.maxLengthStay;
                        if (maxLengthStay > 0 && stayLength > maxLengthStay) {
                            Alert.add(Alert.errorType, "the max stay is on.");
                            hide_waitMe("#resortpro-book-unit form");
                            $scope.isDisabled = true;
                            return false
                        }
                        $scope.isDisabled = false
                    }
                });
                $scope.getPreReservation()
            }
        };
        $scope.setCheckoutDate = function(date) {
            if ($scope.book.checkout) {
                $scope.book.checkout = date.format("mm/dd/yyyy")
            }
        };

        $scope.checkCode = function(){
        	if($scope.checkout.promo_code){
        		$scope.isCodeDisabled = false;
        	}else{
        		$scope.isCodeDisabled = true;
        	}
        }
        
        $scope.redeemCode = function(){
        	$scope.getPreReservation();
        }


        $scope.getPreReservation = function(use_default) {
        	Alert.clear();

            use_default = use_default || 0;
            var params = {
                startdate: $scope.startDate,
                enddate: $scope.endDate,
                occupants: $scope.occupants,
                unit_id: $scope.unit,
                return_payments: "yes"
            };
            if ($scope.pets) {
                params["pets"] = $scope.pets
            }
            if ($scope.occupants_small) {
                params["occupants_small"] = $scope.occupants_small
            }
            if (use_default == 1 && $rootScope.includeEnabledOptional === 1) {
                params["optional_default_enabled"] = "yes"
            }
            var method = "GetPreReservationPrice";
            if ($scope.checkout && $scope.checkout.promo_code != "") params["coupon_code"] = $scope.checkout.promo_code;
            var arr_fees = [];
            $scope.optionalItems == "";
            jQuery(".optional_fee:checked").each(function(index) {
                if (jQuery(this).prop("checked")) {
                    var qty = parseInt(jQuery("#qty-optional-fee-" + jQuery(this).val()).val());
                    if (!isNaN(qty)) {
                        params["optional_fee_" + jQuery(this).val()] = qty
                    } else {
                        params["optional_fee_" + jQuery(this).val()] = "yes"
                    }
                    arr_fees.push(jQuery(this).val())
                }
            });
            $scope.optionalItems = arr_fees.join(",");
            if ($scope.hash !== "") {
                params["hash"] = $scope.hash;
                method = "GetReservationPrice"
            }
            run_waitMe(".form-checkout-wrapper", "bounce", "Updating Information...");
            run_waitMe("#step0", "bounce", "Updating Price");
            rpapi.getWithParams(method, params).success(function(obj) {
                hide_waitMe(".form-checkout-wrapper");
                hide_waitMe("#step0");
                hide_waitMe(".price_sticky");
                var arr_amenities = [];
                if(obj.status){
                	 Alert.add(Alert.errorType, obj.status.description);
                }else{
                if (obj.data.optional_fees.id) {
                    resultData = [];
                    resultData.push(obj.data.optional_fees);
                    obj.data.optional_fees = resultData
                }
                if ($scope.amenities.length == 0) {
                    if (obj.data.optional_fees.length > 0) {
                        angular.forEach(obj.data.optional_fees, function(optional_fee, i) {
                            if (optional_fee.active == 1) {
                                total_optional_fees += optional_fee.value
                            }
                            if (optional_fee.travel_insurance == 0 && optional_fee.cfar == 0 && optional_fee.damage_waiver == 0) {
                                arr_amenities.push({
                                    amenity_cost: $filter("currency")(optional_fee.value, undefined, 2),
                                    amenity_id: optional_fee.id,
                                    amenity_thumbnail: null,
                                    amenity_name: optional_fee.name,
                                    amenity_description: optional_fee.description
                                })
                            }
                        })
                    }
                    $scope.amenities = arr_amenities
                }
                if (obj.data.required_fees.id) {
                    resultData = [];
                    resultData.push(obj.data.required_fees);
                    obj.data.required_fees = resultData
                }
                if (obj.data.taxes_details.id) {
                    resultData = [];
                    resultData.push(obj.data.taxes_details);
                    obj.data.taxes_details = resultData
                }
                if (obj.data.security_deposits && obj.data.security_deposits.security_deposit.ledger_id) {
                    resultData = [];
                    resultData.push(obj.data.security_deposits.security_deposit);
                    obj.data.security_deposits.security_deposit = resultData
                }
                var total_fees = 0;
                var total_taxes = 0;
                var total_optional_fees = 0;
                angular.forEach(obj.data.optional_fees, function(optional_fee, i) {
                    if (optional_fee.active == 1) {
                        total_optional_fees += optional_fee.value
                    }
                });
                angular.forEach(obj.data.required_fees, function(fee, i) {
                    total_fees += fee.value
                });
                angular.forEach(obj.data.taxes_details, function(fee, i) {
                    total_taxes += fee.value
                });
                $scope.subTotal = $scope.calculateMarkup((obj.data.price + obj.data.coupon_discount).toString());
                var dif = $scope.subTotal - obj.data.coupon_discount - obj.data.price;
                $scope.totalFees = total_fees;
                $scope.totalTaxes = total_taxes;
                $scope.taxesAndFees = total_taxes + total_fees + total_optional_fees - dif;
                $scope.totalPrice = obj.data.total;
                if (arr_fees.length > 0) params["optional_fee"] = arr_fees.join();
                params.use_room_type_logic = parseInt($rootScope.roomTypeLogic);
                if (obj.data.expected_charges && obj.data.expected_charges.type_id) {
                    resultData = [];
                    resultData.push(obj.data.expected_charges);
                    obj.data.expected_charges = resultData
                }
                if ($rootScope.checkoutSettings.groupExpectedCharges === 1 && obj.data.expected_charges.length > 1) {
                    var grouped_charges = [];
                    angular.forEach(obj.data.expected_charges, function(charge, i) {
                        var found_charge = false;
                        angular.forEach(grouped_charges, function(grouped_charge, i) {
                            if (grouped_charge.charge_date == charge.charge_date) {
                                found_charge = true;
                                grouped_charge.charge_value += charge.charge_value;
                                grouped_charge.description = "Payment Schedule"
                            }
                        });
                        if (!found_charge) {
                            grouped_charges.push(charge)
                        }
                    });
                    obj.data.expected_charges = grouped_charges
                }
                $scope.reservationDetails = obj.data;
                angular.forEach(obj.data.optional_fees, function(value, key) {
                    if (value.damage_waiver == 1) {
                        $scope.hasDamageProtection = true;
                        $scope.damageProtection = value.value
                    }
                    if (value.travel_insurance == 1) {
                        $scope.hasTravelInsurance = true;
                        $scope.travelInsurance = value.value
                    }
                    if (value.cfar == 1) {
                        $scope.hasCfar = true;
                        $scope.cfar = value.value
                    }
                });
                if (!$scope.hasDamageProtection && !$scope.hasTravelInsurance && !$scope.hasCfar) {
                    $scope.stepTwoDisabled = false
                }
                var totalDeposits = 0;
                if (obj.data.security_deposits) {
                    angular.forEach(obj.data.security_deposits.security_deposit, function(value, key) {
                        totalDeposits += value.deposit_required
                    })
                }
                $scope.securityDeposit = totalDeposits
              }
            })
        };
        $scope.getTermsAndConditions = function() {
            if ($scope.unit > 0) {
                var params = {
                    trigger_id: 18,
                    unit_id: $scope.unit
                };
                rpapi.getWithParams("GetPropertyDocumentHtml", params).success(function(obj) {
                    if (obj.data && !jQuery.isEmptyObject(obj.data.document_html_code)) {
                        $scope.terms = $sce.trustAsHtml(obj.data.document_html_code)
                    } else {
                        $scope.terms = ""
                    }
                })
            }
        };
        $scope.getPrivacyPolicy = function() {
            if ($scope.unit > 0) {
                var params = {
                    trigger_id: 389
                };
                rpapi.getWithParams("GetCompanyDocumentHtml", params).success(function(obj) {
                    if (obj.data && !jQuery.isEmptyObject(obj.data.document_html_code)) {
                        $scope.privacyPolicyHtml = $sce.trustAsHtml(obj.data.document_html_code)
                    } else {
                        $scope.privacyPolicyHtml = ""
                    }
                })
            }
        };
        $scope.getCountries = function() {
            rpapi.getWpActionWithParams("streamlinecore-get-countries", null).success(function(obj) {
                $scope.countries = obj.data.countries
            })
        };
        $scope.getStates = function() {
            var country = $scope.checkout.country && $scope.checkout.country != "" ? $scope.checkout.country : "US";
            var params = {
                country_name: country
            };
            rpapi.getWpActionWithParams("streamlinecore-get-states", params).success(function(obj) {
                $scope.states = obj.data.states
            })
        };
        $scope.processCheckout = function(checkout) {
            run_waitMe("#step3", "bounce", "Processing your request");
            var params = {
                pricing_model: 0,
                startdate: $scope.startDate,
                enddate: $scope.endDate,
                occupants: $scope.book.occupants,
                occupants_small: $scope.book.occupants_small,
                first_name: checkout.fname,
                last_name: checkout.lname,
                email: checkout.email,
                phone: checkout.phone,
                mobile_phone: checkout.phone,
                address: checkout.address,
                address2: checkout.address2,
                city: checkout.city,
                zip: checkout.postal_code,
                state_name: checkout.state,
                country_name: checkout.country,
                pets:$scope.book.pets
            };
            if ($rootScope.checkoutSettings.createStreamSign == 1) {
                params["streamsign_thankyou_url"] = location.protocol + "//" + location.host + "/thank-you/";
                params["streamsign_redirect"] = "yes"
            }
            if (checkout.notes) {
                params["client_comments"] = checkout.notes
            }
            if (checkout.card_type < 5) {
                var exp_month, exp_year;
                if (checkout.expiration_date) {
                    var exp_date = checkout.expiration_date.split("/");
                    exp_month = exp_date[0];
                    exp_year = exp_date[1]
                } else {
                    exp_month = checkout.expire_month;
                    exp_year = checkout.expire_year
                }
                params["credit_card_type_id"] = checkout.card_type;
                params["credit_card_number"] = checkout.card_number;
                params["credit_card_expiration_month"] = exp_month;
                params["credit_card_expiration_year"] = exp_year;
                params["credit_card_cid"] = checkout.card_cvv
            } else {
                params["payment_type_id"] = 33;
                params["bank_account_number"] = checkout.bank_account_number;
                params["bank_routing_number"] = checkout.bank_routing_number;
                params["bank_account_holder_name"] = checkout.bank_account_holder_name
            }
            jQuery.ajax({
                url: "https://api.ipdata.co",
                global: false,
                type: "GET",
                data: {},
                async: false,
                success: function(data) {
                    params["ip"] = data.ip;
                    params["ip_location"] = data.country_name
                }
            });
            params["time_stamp"] = Math.floor(Date.now() / 1e3);
            if (typeof jQuery(".policy_and_privacy").html() != "undefined") {
                params["privacy_policy"] = jQuery(".policy_and_privacy").html()
            } else {
                params["privacy_policy"] = ""
            }
            if (jQuery("#newsletter").is(":checked")) {
                params["opt_in_marketing"] = "yes"
            } else {
                params["opt_in_marketing"] = "no"
            }
            if ($rootScope.doNotVerifyZip == 1) {
                params["do_not_verify_zip_code"] = 1
            }
            if ($rootScope.roomTypeLogic == 1) {
                params["use_room_type_logic"] = 1;
                params["condo_type_id"] = $scope.checkout.condo_type_id;
                params["location_id"] = $scope.checkout.location_id
            } else {
                params["unit_id"] = $scope.unit
            }
            if ($rootScope.bookingSettings) {
                if ($rootScope.bookingSettings.hearedAboutId > 0) {
                    params["hear_about_id"] = $rootScope.bookingSettings.hearedAboutId
                }
                if ($rootScope.bookingSettings.blockedRequest == 1) {
                    params["status_id"] = 10
                }
            }
            if ($scope.checkout && $scope.checkout.promo_code != "") {
                params["coupon_code"] = $scope.checkout.promo_code
            }
            if ($scope.book.pets && $scope.book.pets > 0) {
                params["pets"] = $scope.book.pets
            }
            if ($scope.hash != "") {
                params["hash"] = $scope.hash
            }
            if ($scope.referrer_url != "") {
                params["referrer_url"] = $scope.referrer_url
            }
            if ($scope.confirmationId > 0) {
                params["confirmation_id"] = $scope.confirmationId
            }
            var amenity_addons = [];
            jQuery(".optional_fee:checked").each(function(index) {
                if (jQuery(this).prop("checked")) {
                    var qty = parseInt(jQuery("#qty-optional-fee-" + jQuery(this).val()).val());
                    if (!isNaN(qty)) {
                        var amenity_addon = {
                            amenity_id: jQuery(this).val(),
                            amenity_quantity: qty
                        };
                        amenity_addons.push(amenity_addon)
                    } else {
                        params["optional_fee_" + jQuery(this).val()] = "yes"
                    }
                }
            });
            if (amenity_addons.length > 0) {
                params["amenity_addon"] = amenity_addons
            }
           
            rpapi.getWithParams("MakeReservation", params).success(function(obj) {
                hide_waitMe("#step3");
                if (obj.status) {
                    Alert.add(Alert.errorType, obj.status.description)
                } else {
                    jQuery("#btn-checkout").attr("disabled", "disabled");
                    var res = obj.data.reservation;
                    jQuery("#confirmation_id").val(res.confirmation_id);
                    jQuery("#location_name").val(res.location_name);
                    jQuery("#condo_type_name").val(res.condo_type_name);
                    jQuery("#unit_name").val(res.unit_name);
                    jQuery("#startdate").val(res.startdate);
                    jQuery("#enddate").val(res.enddate);
                    jQuery("#occupants").val(res.occupants);
                    jQuery("#occupants_small").val(res.occupants_small);
                    jQuery("#petscount").val(res.pets);
                    jQuery("#price_common").val(res.price_common);
                    jQuery("#price_balance").val(res.price_balance);
                    jQuery("#travelagent_name").val(res.travelagent_name);
                    jQuery("#unit_name").val(res.unit_name);
                    var now = new Date;
                    now.setDate(now.getDate() - 10);
                    $cookies.putObject("streamline-confirmation-cookie", null, {
                        path: "/",
                        expires: now
                    });
                    $cookies.remove("streamline-confirmation-cookie");
                    rpapi.getWithParams("GetReservationInfo", {
                        confirmation_id: res.confirmation_id
                    }).success(function(obj) {
                        jQuery('#paymentform')[0].reset();
                        var res_info = obj.data.reservation;
                        jQuery("#email").val(res_info.email);
                        jQuery("#fname").val(res_info.first_name);
                        jQuery("#lname").val(res_info.last_name);
                        jQuery("#unit_id").val(res_info.unit_id);
                        if (res.streamsign_url && res.streamsign_url != "") {
                            window.location.href = res.streamsign_url
                        } else {
                            jQuery("#form_thankyou").submit()
                        }
                    })
                }
            })
        };
        $scope.getPropertyInfo = function() {
            rpapi.getWithParams("GetPropertyInfo", {
                unit_id: $scope.unit
            }).success(function(obj) {
                $scope.property = obj.data;
                if ($scope.checkout) {
                    $scope.checkout.country = "US";
                    $scope.checkout.condo_type_id = obj.data.condo_type_id;
                    $scope.checkout.location_id = obj.data.location_id;
                    if (parseInt($rootScope.roomTypeLogic) == 1) {
                        $scope.unit_name = obj.data.condo_type_name
                    } else {
                        if (obj.data.web_name && obj.data.name != "") {
                            $scope.unit_name = obj.data.web_name
                        } else if (obj.data.name == "Home") {
                            $scope.unit_name = obj.data.location_name
                        } else {
                            $scope.unit_name = obj.data.name
                        }
                    }
                }
            })
        }
    }])
})();
(function() {
    var directives = angular.module("resortpro.directives", []);
    directives.directive("ngAlt", function() {
        return {
            restrict: "A",
            link: function(scope, elem, attrs) {
                if (attrs.ngAlt) {
                    elem.on("load", function(event) {
                        elem[0].setAttribute("alt", attrs.ngAlt)
                    })
                }
            }
        }
    });
    directives.directive("errSrc", function() {
        return {
            link: function(scope, element, attrs) {
                scope.$watch(function() {
                    return attrs["ngSrc"]
                }, function(value) {
                    if (!value) {
                        element.attr("src", attrs.errSrc)
                    }
                });
                element.bind("error", function() {
                    if (attrs.src != attrs.errSrc) {
                        attrs.$set("src", attrs.errSrc)
                    }
                })
            }
        }
    });
    directives.directive("calendar", function($rootScope) {
        return {
            restrict: "A",
            require: "ngModel",
            scope: {
                showDays: "&",
                updateModalCheckin: "&"
            },
            link: function(scope, elem, attrs, pCtrl) {
                var options = {
                    dateFormat: "mm/dd/yy",
                    minDate: 0,
                    numberOfMonths: 4,
                    showButtonPanel: false,
                    onSelect: function(dateText) {
                        scope.updateModalCheckin({
                            date: dateText
                        });
                        pCtrl.$setViewValue(dateText);
                        var myDateArr = dateText.split("/");
                        var month = myDateArr[0] - 1;
                        var day = myDateArr[1];
                        var numDays = 0;
                        var foundDay = false;
                        jQuery(".availability-calendar .ui-datepicker-calendar td").each(function() {
                            if (jQuery(this).attr("data-month") == month) {
                                if (parseInt(jQuery(this).find("a").html()) > parseInt(day)) {
                                    foundDay = true;
                                    numDays++
                                } else if (foundDay) {
                                    return false
                                }
                            }
                        });
                        jQuery("#modal_checkin").val(dateText);
                        jQuery("#myModal").modal();
                        jQuery('#myModal').on('shown.bs.modal', function() {
                             //To relate the z-index make sure backdrop and modal are siblings
                             jQuery(this).before(jQuery('.modal-backdrop'));
                             //Now set z-index of modal greater than backdrop
                             jQuery(this).css("z-index", parseInt(jQuery('.modal-backdrop').css('z-index')) + 1);
                        }); 
                        //jQuery("#myModal").appendTo("body");
                        setTimeout(function() {
                            add_tooltip()
                        }, 500)
                    },
                    beforeShowDay: function(date) {
                        return scope.showDays({
                            date: date
                        })
                    },
                    onChangeMonthYear: function(year, month, inst) {
                        setTimeout(function() {
                            add_tooltip()
                        }, 500)
                    }
                };
                elem.datepicker(options)
            }
        }
    });
    directives.directive("calendarmobile", function($rootScope) {
        return {
            restrict: "A",
            require: "ngModel",
            scope: {
                showDays: "&",
                updateModalCheckin: "&"
            },
            link: function(scope, elem, attrs, pCtrl) {
                var options = {
                    dateFormat: "mm/dd/yy",
                    minDate: 0,
                    numberOfMonths: 1,
                    showButtonPanel: false,
                    onSelect: function(dateText) {
                        scope.updateModalCheckin({
                            date: dateText
                        });
                        pCtrl.$setViewValue(dateText);
                        var myDateArr = dateText.split("/");
                        var month = myDateArr[0] - 1;
                        var day = myDateArr[1];
                        var numDays = 0;
                        var foundDay = false;
                        jQuery(".availability-calendar .ui-datepicker-calendar td").each(function() {
                            if (jQuery(this).attr("data-month") == month) {
                                if (parseInt(jQuery(this).find("a").html()) > parseInt(day)) {
                                    foundDay = true;
                                    numDays++
                                } else if (foundDay) {
                                    return false
                                }
                            }
                        });
                        jQuery("#modal_checkin").val(dateText);
                        jQuery("#myModal").modal();
                        jQuery("#myModal").appendTo("body");
                        setTimeout(function() {
                            add_tooltip()
                        }, 500)
                    },
                    beforeShowDay: function(date) {
                        return scope.showDays({
                            date: date
                        })
                    },
                    onChangeMonthYear: function(year, month, inst) {
                        setTimeout(function() {
                            add_tooltip()
                        }, 500)
                    }
                };
                elem.datepicker(options)
            }
        }
    });
    directives.directive("scrollTo", function($location, $anchorScroll) {
        return function(scope, element, attrs) {
            element.bind("click", function(event) {
                event.stopPropagation();
                scope.$on("$locationChangeStart", function(ev) {
                    ev.preventDefault()
                });
                var location = attrs.scrollTo;
                $location.hash(location);
                $anchorScroll()

            })
        }
    });
    directives.directive("sdpicker", function() {
        return {
            restrict: "A",
            require: "ngModel",
            link: function(scope, element, attrs, ngModelCtrl) {
                jQuery(function() {
                    var checkin_days = 0;
                    if (!isNaN(jQuery("#filter_start_date").data("checkin-days"))) {
                        checkin_days = jQuery("#filter_start_date").data("checkin-days")
                    }
                    var str_filterturndates = jQuery("#filter_start_date").data("filterturndates");
                    var arr_filterturndates = [];
                    if (typeof str_filterturndates == "number") {
                        arr_filterturndates.push(str_filterturndates.toString())
                    } else {
                        if (str_filterturndates && str_filterturndates.indexOf(",") > -1) {
                            arr_filterturndates = str_filterturndates.split(",")
                        }
                    }
                    element.datepicker({
                        dateFormat: "mm/dd/yy",
                        minDate: "+" + checkin_days + "d",
                        onSelect: function(date) {
                            ngModelCtrl.$setViewValue(date);
                            scope.$apply();
                            var frm = new Date(date);
                            nts = 1;
                            if (!isNaN(jQuery("#filter_start_date").attr("data-min-stay"))) {
                                nts = parseInt(jQuery("#filter_start_date").attr("data-min-stay"))
                            }
                            var the_year = frm.getFullYear();
                            if (the_year < 2e3) the_year = 2e3 + the_year % 100;
                            var to = new Date(the_year, frm.getMonth(), frm.getDate() + nts);
                            jQuery("#filter_end_date").datepicker("option", "minDate", to);
                            setTimeout(function() {
                                jQuery("#filter_end_date").datepicker("show")
                            }, 0);
                            scope.search.start_date = frm.format("mm/dd/yyyy");
                            scope.clearProperties();
                            scope.availabilitySearch(scope.search)
                        },
                        beforeShowDay: function(date) {
                            var is_available = true;
                            var class_day = "available";
                            if (arr_filterturndates.length > 0 && jQuery.inArray(date.getUTCDay().toString(), arr_filterturndates) == -1) {
                                is_available = false
                            }
                            if (!is_available) {
                                class_day = "booked"
                            }
                            return [is_available, class_day]
                        }
                    })
                })
            }
        }
    });
    directives.directive("edpicker", function() {
        return {
            restrict: "A",
            minDate: "+1d",
            require: "ngModel",
            link: function(scope, element, attrs, ngModelCtrl) {
                jQuery(function() {
                    var startdate = jQuery("#filter_start_date").val();
                    var frm = new Date(startdate);
                    var str_filterturndates = jQuery("#filter_start_date").data("filterturndates");
                    var arr_filterturndates = [];
                    if (str_filterturndates != "" && !isNaN(str_filterturndates)) {
                        arr_filterturndates.push(str_filterturndates.toString())
                    } else {
                        if (str_filterturndates && str_filterturndates.indexOf(",") > -1) {
                            arr_filterturndates = str_filterturndates.split(",")
                        }
                    }
                    element.datepicker({
                        dateFormat: "mm/dd/yy",
                        minDate: frm,
                        onSelect: function(date) {
                            ngModelCtrl.$setViewValue(date);
                            scope.$apply();
                            var frm = new Date(date);
                            var the_year = frm.getFullYear();
                            if (the_year < 2e3) the_year = 2e3 + the_year % 100;
                            var to = new Date(the_year, frm.getMonth(), frm.getDate());
                            scope.search.end_date = to.format("mm/dd/yyyy");
                            scope.clearProperties();
                            scope.availabilitySearch(scope.search)
                        },
                        beforeShowDay: function(date) {
                            var is_available = true;
                            var class_day = "available";
                            var start_date = jQuery("#filter_start_date").datepicker("getDate");
                            if (start_date) {
                                if (arr_filterturndates.length > 0 && start_date.getUTCDay().toString() != date.getUTCDay().toString()) {
                                    is_available = false;
                                    class_day = "booked"
                                }
                            } else {
                                if (arr_filterturndates.length > 0 && jQuery.inArray(date.getUTCDay().toString(), arr_filterturndates) == -1) {
                                    is_available = false
                                }
                                if (!is_available) {
                                    class_day = "booked"
                                }
                            }
                            return [is_available, class_day]
                        }
                    })
                })
            }
        }
    });
    directives.directive("bookcheckin", function($rootScope) {
        return {
            restrict: "A",
            scope: {
                showDays: "&",
                updatePrice: "&",
                updateCheckout: "&"
            },
            require: "ngModel",
            link: function(scope, element, attrs, ngModelCtrl) {
                jQuery(function() {
                    var days = 0;
                    var appendTimeout;
                    var calendarTips = '<ul class="calendar-tips"><li class="cal-selectable"><span>Checkin Available</span></li><li class="cal-available"><span>Checkout Available</span></li><li class="cal-unavailable"><span>Not Available</span></li></ul>';

                    function appendText(text) {
                        clearTimeout(appendTimeout);
                        appendTimeout = setTimeout(function() {
                            jQuery("#ui-datepicker-div .ui-datepicker-calendar").after("<div>" + text + "</div>")
                        }, 50)
                    }
                    if (!isNaN(jQuery("#book_start_date").attr("data-checkin-days"))) {
                        days = jQuery("#book_start_date").attr("data-checkin-days")
                    }
                    element.datepicker({
                        dateFormat: "mm/dd/yy",
                        minDate: "+" + days + "d",
                        onSelect: function(date) {
                            ngModelCtrl.$setViewValue(date);
                            scope.$apply();
                            var frm = new Date(date);
                            nts = 1;
                            if (!isNaN(jQuery("#book_start_date").attr("data-min-stay"))) {
                                nts = jQuery("#book_start_date").attr("data-min-stay")
                            }
                            var the_year = frm.getFullYear();
                            if (the_year < 2e3) the_year = 2e3 + the_year % 100;
                            var to = new Date(the_year, frm.getMonth(), parseInt(frm.getDate()) + parseInt(nts));
                            jQuery("#book_end_date").datepicker("option", "minDate", to);
                            scope.updateCheckout({
                                date: to
                            })
                        },
                        onClose: function() {
                            setTimeout(function() {
                                jQuery("#book_end_date").datepicker("show")
                            }, 0)
                        },
                        beforeShowDay: function(date) {
                            return scope.showDays({
                                date: date
                            })
                        },
                        beforeShow: function() {
                            appendText(calendarTips)
                        },
                        onChangeMonthYear: function() {
                            appendText(calendarTips)
                        }
                    })
                })
            }
        }
    });
    directives.directive("bookcheckout", function($rootScope) {
        return {
            restrict: "A",
            scope: {
                showDays: "&",
                updatePrice: "&"
            },
            require: "ngModel",
            link: function(scope, element, attrs, ngModelCtrl) {
                jQuery(function() {
                    var startdate = jQuery("#book_start_date").val();
                    var frm = new Date(startdate);
                    var appendTimeout;
                    var calendarTips = '<ul class="calendar-tips"><li class="cal-available"><span>Checkin Available</span></li><li class="cal-selectable"><span>Checkout Available</span></li><li class="cal-unavailable"><span>Not Available</span></li><ul/>';

                    function appendText(text) {
                        clearTimeout(appendTimeout);
                        appendTimeout = setTimeout(function() {
                            jQuery("#ui-datepicker-div .ui-datepicker-calendar").after("<div>" + text + "</div>")
                        }, 50)
                    }
                    element.datepicker({
                        dateFormat: "mm/dd/yy",
                        minDate: frm,
                        onSelect: function(date) {
                            scope.$apply(function() {
                                ngModelCtrl.$setViewValue(date)
                            });
                            scope.updatePrice()
                        },
                        beforeShowDay: function(date) {
                            return scope.showDays({
                                date: date
                            })
                        },
                        beforeShow: function() {
                            appendText(calendarTips)
                        },
                        onChangeMonthYear: function() {
                            appendText(calendarTips)
                        }
                    })
                })
            }
        }
    });
    directives.directive("sliderange", function($rootScope) {
        return {
            restrict: "A",
            scope: {
                showAvailability: "&",
                minPrice: "=",
                maxPrice: "="
            },
            require: "ngModel",
            link: function(scope, element, attrs, ngModelCtrl) {
                jQuery(function() {
                    element.slider({
                        range: true,
                        min: scope.minPrice,
                        max: scope.maxPrice,
                        step: 10,
                        values: [scope.minPrice, scope.maxPrice],
                        slide: function(event, ui) {
                        	scope.showAvailability({
                                minPrice: ui.values[0],
                                maxPrice: ui.values[1]
                            });
                        },
                        change: function(event, ui) {
                            scope.showAvailability({
                                minPrice: ui.values[0],
                                maxPrice: ui.values[1]
                            });
                            scope.$apply()   
                        }
                    });
                    jQuery("#amount").val("$" + scope.minPrice + " - $" + scope.maxPrice)
                    
                })
            }
        }
    });

    directives.directive("lazyLoad", function($rootScope) {

         return {
		        restrict: 'A',
		        link: function(scope, element, attrs){
		            const observer = new IntersectionObserver(loadImg)
		            const img = angular.element(element)[0];
		            observer.observe(img)

		            function loadImg(changes){
		                changes.forEach(change => {
		                    if(change.intersectionRatio > 0){
		                    	if(change.target.getAttribute("datasrc") == "trustpilot1"){
		                    		jQuery('.trustpilotdtl').removeClass("d-none");
		                    	}
		                    	if(change.target.getAttribute("datasrc") == "trustpilot"){
		                    		jQuery('.rating-one').removeClass("d-none");
		                    	}
		                    	if(change.target.getAttribute("datasrc") == "replaceclass"){
		                    		jQuery('.aboutussec').addClass("aboutUs");
		                    	}
		                    	if(change.target.getAttribute("datasrc") == "removeclass"){
		                    		jQuery(".carouselpart").removeClass("d-none");
		                    	}else{
		                    		if(change.target.src!=change.target.getAttribute("datasrc")){
		                    			
		                    			change.target.src = change.target.getAttribute("datasrc")	
		                    		}
		                    	  
		                    	}
		                        
		                    }
		                })
		            }    

		        }
         }

    });

    directives.directive("bedroomrange", function($rootScope) {
        return {
            restrict: "A",
            scope: {
                showAvailability: "&",
                minBedroomsNumber: "=",
                maxBedroomsNumber: "="
            },
            link: function(scope, element, attrs, ngModelCtrl) {
                jQuery(function() {
                    element.slider({
                        range: true,
                        min: scope.minBedroomsNumber,
                        max: scope.maxBedroomsNumber,
                        step: 1,
                        values: [scope.minBedroomsNumber, scope.maxBedroomsNumber],
                        slide: function(event, ui) {
                            jQuery("#streamlinecore_fw_bedrooms_number").val("Min Bed:" + ui.values[0] + " - Max Bed:" + ui.values[1])
                        },
                        change: function(event, ui) {
                            scope.showAvailability({
                                minBedroomsNumber: ui.values[0],
                                maxBedroomsNumber: ui.values[1]
                            });
                            scope.$apply()
                        }
                    });
                    jQuery("#streamlinecore_fw_bedrooms_number").val("Min Bed:" + scope.minBedroomsNumber + " - Max Bed:" + scope.maxBedroomsNumber)
                })
            }
        }
    });
    directives.directive("adultsrange", function($rootScope) {
        return {
            restrict: "A",
            scope: {
                showAvailability: "&",
                minAdultsNumber: "=",
                maxAdultsNumber: "="
            },
            link: function(scope, element, attrs, ngModelCtrl) {
                jQuery(function() {
                    element.slider({
                        range: true,
                        min: scope.minAdultsNumber,
                        max: scope.maxAdultsNumber,
                        step: 1,
                        values: [scope.minAdultsNumber, scope.maxAdultsNumber],
                        slide: function(event, ui) {
                            jQuery("#streamlinecore_fw_adults").val("Min Adults:" + ui.values[0] + " - Max Adults:" + ui.values[1])
                        },
                        change: function(event, ui) {
                            scope.showAvailability({
                                minAdultsNumber: ui.values[0],
                                maxAdultsNumber: ui.values[1]
                            });
                            scope.$apply()
                        }
                    });
                    jQuery("#streamlinecore_fw_adults").val("Min Adults:" + scope.minAdultsNumber + " - Max Adults:" + scope.maxAdultsNumber)
                })
            }
        }
    });
    directives.directive("modalcheckin", function($rootScope) {
        return {
            restrict: "A",
            scope: {
                showDays: "&",
                updatePrice: "&"
            },
            require: "ngModel",
            link: function(scope, element, attrs, ngModelCtrl) {
                jQuery(function() {
                    element.datepicker({
                        dateFormat: "mm/dd/yy",
                        minDate: "+1d",
                        onSelect: function(date) {
                            ngModelCtrl.$setViewValue(date);
                            scope.$apply();
                            var frm = new Date(date);
                            nts = 1;
                            if (!isNaN(jQuery("#modal_end_date").attr("data-min-stay"))) {
                                nts = jQuery("#modal_end_date").attr("data-min-stay")
                            }
                            var the_year = frm.getFullYear();
                            if (the_year < 2e3) the_year = 2e3 + the_year % 100;
                            var to = new Date(the_year, frm.getMonth(), parseInt(frm.getDate()) + parseInt(nts));
                            jQuery("#modal_end_date").datepicker("option", "minDate", to);
                            scope.updatePrice()
                        },
                        beforeShowDay: function(date) {
                            return scope.showDays({
                                date: date
                            })
                        }
                    })
                })
            }
        }
    });
    directives.directive("modalcheckout", function($rootScope) {
        return {
            restrict: "A",
            scope: {
                showDays: "&",
                updatePrice: "&"
            },
            require: "ngModel",
            link: function(scope, element, attrs, ngModelCtrl) {
                jQuery(function() {
                    element.datepicker({
                        dateFormat: "mm/dd/yy",
                        minDate: "+1d",
                        onSelect: function(date) {
                            ngModelCtrl.$setViewValue(date);
                            scope.$apply();
                            scope.updatePrice()
                        },
                        beforeShowDay: function(date) {
                            return scope.showDays({
                                date: date
                            })
                        }
                    })
                })
            }
        }
    });
    directives.directive("starRating", function() {
        return {
            restrict: "A",
            template: '<ul class="rating"><li ng-repeat="star in stars" ng-class="star"><i ng-if="star.filled" class="text-warning fa {[star.filled]}"></i></li></ul>',
            scope: {
                ratingValue: "=",
                max: "="
            },
            link: function(scope, elem, attrs) {
                scope.stars = [];
                for (var i = 0; i < scope.max; i++) {
                    var star = "fa-star-o";
                    if (i < scope.ratingValue) {
                        var modu = scope.ratingValue % 1;
                        if (i + 1 < scope.ratingValue) {
                            star = "fa-star"
                        } else {
                            if (modu != 0) {
                                if (modu <= .5) {
                                    star = "fa-star-o"
                                } else {
                                    star = "fa-star-half-o"
                                }
                            } else {
                                star = "fa-star"
                            }
                        }
                    }
                    scope.stars.push({
                        filled: star
                    })
                }
            }
        }
    });
    directives.directive("checkRequired", function() {
        return {
            restrict: "A",
            require: "ngModel",
            link: function(scope, element, attrs, ngModel) {
                ngModel.$validators.checkRequired = function(modelValue, viewValue) {
                    var value = modelValue || viewValue;
                    var match = scope.$eval(attrs.ngTrueValue) || true;
                    return value && match === value
                }
            }
        }
    })
})();
(function() {
    var Filters = angular.module("resortpro.filters", []);
    Filters.filter("trustedHtml", ["$sce", function($sce) {
        return function(text) {
            return $sce.trustAsHtml(text)
        }
    }]);
    Filters.filter("pluralizeRating", ["$sce", function($sce) {
        return function(rating) {
            return rating > 1 ? rating + " reviews" : rating + " review"
        }
    }])
})();
(function() {
    var mapLoaded = false;
    var app = angular.module("resortpro.property", ["resortpro.services", "resortpro.filters", "resortpro.directives", "ngCookies", "infinite-scroll","ngAnimate", "ui.bootstrap"]);
    var mod = angular.module("infinite-scroll", []);
    mod.directive("infiniteScroll", ["$rootScope", "$window", "$timeout", function($rootScope, $window, $timeout) {
        return {
            link: function(scope, elem, attrs) {
                var checkWhenEnabled, handler, scrollDistance, scrollEnabled;
                $window = angular.element($window);
                scrollDistance = 0;
                if (attrs.infiniteScrollDistance != null) {
                    scope.$watch(attrs.infiniteScrollDistance, function(value) {
                        return scrollDistance = parseInt(value, 10)
                    })
                }
                scrollEnabled = true;
                checkWhenEnabled = false;
                if (attrs.infiniteScrollDisabled != null) {
                    scope.$watch(attrs.infiniteScrollDisabled, function(value) {
                        scrollEnabled = !value;
                        if (scrollEnabled && checkWhenEnabled) {
                            checkWhenEnabled = false;
                            return handler()
                        }
                    })
                }
                handler = function() {
                    if (scope.enableInfinitiScroll) {
                        var elementBottom, remaining, shouldScroll, windowBottom;
                        windowBottom = $window.height() + $window.scrollTop();
                        elementBottom = elem.offset().top + elem.height();
                        remaining = elementBottom - windowBottom;
                        shouldScroll = remaining <= $window.height() * scrollDistance;
                        if (shouldScroll && scrollEnabled) {
                            if ($rootScope.$$phase) {
                                return scope.$eval(attrs.infiniteScroll)
                            } else {
                                return scope.$apply(attrs.infiniteScroll)
                            }
                        } else if (shouldScroll) {
                            return checkWhenEnabled = true
                        }
                    }
                };
                $window.on("scroll", handler);
                scope.$on("$destroy", function() {
                    return $window.off("scroll", handler)
                });
                return $timeout(function() {
                    if (attrs.infiniteScrollImmediateCheck) {
                        if (scope.$eval(attrs.infiniteScrollImmediateCheck)) {
                            return handler()
                        }
                    } else {
                        return handler()
                    }
                }, 0)
            }
        }
    }]);
    app.controller("PlusMinusControler", ["$scope","$rootScope", function($scope,$rootScope) {
        $scope.isMinusDisabled = false;
        $scope.isPlusDisabled  = false;
        $scope.area = undefined;
        $scope.areas = [{'name':'Appalachian Ski Mountain Cabin Rental','id':6289},{'name':'Banner Elk','id':13331},{'name':'Banner Elk Cabin Rental','id':8625},{'name':'Between Boone &amp; Blowing Rock Cabin Rental','id':8629},{'name':'Between Boone &amp; Valle Crucis (Willow Valley)','id':12142},{'name':'Blowing Rock','id':13332},{'name':'Blowing Rock Cabin Rental South Hwy 221','id':8627},{'name':'Blowing Rock Cabin Rental South Hwy 321','id':8628},{'name':'Blowing Rock in Town Vacation Rental','id':6291},{'name':'Blue Ridge Mountain Club Vacation Rental','id':8637},{'name':'Boone','id':13329},{'name':'Boone Cabin Rental Near Town','id':8626},{'name':'Boone Cabin Rental Shores Farm','id':8630},{'name':'Boone New River &amp; Jefferson Cabin Rental','id':7904},{'name':'Eagles Nest','id':13394},{'name':'Eagles Nest Resort near Banner Elk','id':13271},{'name':'Foscoe','id':13333},{'name':'Kerr Scott Lake Cabin Rental','id':8624},{'name':'Linville','id':13334},{'name':'Seven Devils Cabin Rental','id':6294},{'name':'Sugar Grove, Vilas &amp; Bethel Cabin Rental','id':6292},{'name':'Sugar Mountain','id':13330},{'name':'Todd','id':13326},{'name':'Valle Crucis','id':13325},{'name':'Valle Crucis Cabin Rental','id':6339},{'name':'Yonahlossee','id':13328},{'name':'Yonahlossee Vacation Rental','id':8632},{'name':'Zionville','id':13337}];
        $scope.locations = [

             {'name':'1 Abundant Life','id':174640},
             {'name':'1 Amazing View','id':174641},
             {'name':'1 Appalachian Sky','id':174825},
             {'name':'1 Awesome Skyview','id':174826},
             {'name':'1 Beautiful View','id':174642},
             {'name':'1 Million Dollar View','id':340923},
             {'name':'1 Musical View','id':353475},
             {'name':'1 Of A Kind','id':174657},
             {'name':'1 Sublime View','id':355201},
             {'name':'1 Sweet Seclusion','id':174650},
             {'name':'1-2 Remember','id':174635},
             {'name':'2 Beautiful 4 Words','id':174652},
             {'name':'2 Cubs Cabin','id':361714},
             {'name':'3 Peaks Lodge','id':174662},
             {'name':'36 North','id':174658},
             {'name':'4 Seasons Escape','id':304302},
             {'name':'4330 Elevation','id':349682},
             {'name':'4J Getaway','id':174663},
             {'name':'5 OClock Somewhere','id':174668},
             {'name':'7 Bears Lodge','id':354529},
             {'name':'7th Heaven','id':174670},
             {'name':'A Bears Eye View','id':174672},
             {'name':'A Bears Hill','id':174742},
             {'name':'A Bella Vista','id':174470},
             {'name':'A Big View','id':174673},
             {'name':'A Birds Eye View','id':174674},
             {'name':'A Family Tradition','id':174675},
             {'name':'A Great Catch','id':174677},
             {'name':'A Happy Roost','id':174678},
             {'name':'A Haven of Rest','id':174679},
             {'name':'A High Country Retreat','id':174680},
             {'name':'A Honeybear Heaven','id':174681},
             {'name':'A Moon River View','id':174682},
             {'name':'A Mountain Dream','id':353419},
             {'name':'A Mountain Hideaway','id':174684},
             {'name':'A Nest With a View','id':288236},
             {'name':'A Paradise Found','id':174685},
             {'name':'A Parkway Cabin','id':174686},
             {'name':'A Peak of Heaven','id':174687},
             {'name':'A Perfect Retreat','id':174688},
             {'name':'A Point of View','id':174689},
             {'name':'A Positive Outlook','id':174690},
             {'name':'A River Mist','id':174691},
             {'name':'A River Mist Too','id':174692},
             {'name':'A River Mist Walk','id':174696},
             {'name':'A River Runs Through It','id':174697},
             {'name':'A Riversound','id':312261},
             {'name':'A Slopeside Getaway','id':174700},
             {'name':'A Stones Throw','id':174701},
             {'name':'A Sunset View','id':312082},
             {'name':'A Sweet Carolina Home','id':357172},
             {'name':'A Sweet Retreat','id':313043},
             {'name':'A Treetop Escape','id':253033},
             {'name':'A View to Remember','id':174703},
             {'name':'A Walk Through the Clouds','id':174705},
             {'name':'A Watauga River Lookout','id':253300},
             {'name':'Above it All','id':174706},
             {'name':'Absolute Paradise','id':174707},
             {'name':'Acorn Lodge','id':174708},
             {'name':'Adventure Hideaway at Eagles Nest','id':174709},
             {'name':'Agape Cove','id':174710},
             {'name':'Aho Gap Lodge','id':174711},
             {'name':'Almost Heaven','id':354393},
             {'name':'Almost Perfect','id':354449},
             {'name':'Alpenglow','id':266727},
             {'name':'Alpine Lodge','id':174714},
             {'name':'Alpine Vista','id':174715},
             {'name':'Altitude Adjustment','id':174716},
             {'name':'Altitudes Attitude','id':174717},
             {'name':'Amen Corner','id':174719},
             {'name':'Amitola','id':174720},
             {'name':'Among the Trees','id':174721},
             {'name':'An Irish Blessing','id':174722},
             {'name':'Andrews River Haven','id':354412},
             {'name':'Anglers Cabin','id':174724},
             {'name':'Antlers Lodge','id':322107},
             {'name':'AppalJack Retreat','id':174728},
             {'name':'Appalachian Adventure','id':174726},
             {'name':'Appalachian Retreat','id':174729},
             {'name':'Apple of my Eye','id':174730},
             {'name':'Aspen Memories','id':312899},
             {'name':'Aspen View','id':174734},
             {'name':'At Turtle Ridge','id':174736},
             {'name':'Atop Boone','id':174737},
             {'name':'Aussies Den','id':174738},
             {'name':'Azalea Hill','id':174739},
             {'name':'Bairds Creek Cabin','id':354413},
             {'name':'Balloon Landing','id':174740},
             {'name':'Banner View','id':367960},
             {'name':'Bear Bungalow','id':174741},
             {'name':'Bear N Grace','id':313351},
             {'name':'Bear Pause','id':174743},
             {'name':'Bears Repeatin','id':174744},
             {'name':'Beech Haven','id':344046},
             {'name':'Beech View Lodge','id':354445},
             {'name':'Berkshires at Chetola','id':174746},
             {'name':'Big Bear Lodge','id':354414},
             {'name':'Black Bear Lodge','id':354415},
             {'name':'Blackberry Creek Cabin','id':174747},
             {'name':'Blue Ridge Retreat at The Farms','id':354461},
             {'name':'Blue Ridge Shangri La II','id':354417},
             {'name':'Boles Lodge','id':174748},
             {'name':'Boulder Pod: Hidden Nite','id':368014},
             {'name':'Boulder Pod: Rocky Top','id':368001},
             {'name':'Boulder Pod: West Glow','id':368011},
             {'name':'Boulder Ridge','id':354447},
             {'name':'Boulder View','id':354457},
             {'name':'Bridgepoint Cabin','id':354416},
             {'name':'Brookshire Cabin','id':354459},
             {'name':'Buena Vista','id':354418},
             {'name':'Cabin Fever','id':174753},
             {'name':'Canoe Run','id':368087},
             {'name':'Cardinals Nest','id':368116},
             {'name':'Carolina Charm','id':174754},
             {'name':'Castle Rock at Eagles Nest','id':360523},
             {'name':'Cats Creek Cabin','id':354419},
             {'name':'Celestial View','id':174755},
             {'name':'Celtic Mist','id':354420},
             {'name':'Chestnut Lodge','id':174756},
             {'name':'Chetola: Cardinal 101','id':174758},
             {'name':'Chetola: Wren 301','id':174759},
             {'name':'Comptime','id':174760},
             {'name':'Copperleaf at Eagles Nest','id':354448},
             {'name':'Cozy Twin Rivers Edge','id':310905},
             {'name':'Creekside Cabin at Eagles Nest','id':348853},
             {'name':'Crosswind','id':174764},
             {'name':'Cruizin River Dreams','id':354421},
             {'name':'Crystal View','id':254403},
             {'name':'D Coys Nest','id':354469},
             {'name':'Dancing Bear Cottage','id':174767},
             {'name':'Daniel Boone Lodge','id':174768},
             {'name':'Deer Hollow Retreat','id':238223},
             {'name':'Deer Run','id':174769},
             {'name':'Deerview Cottage','id':367169},
             {'name':'Diamond Creek Lodge','id':174770},
             {'name':'Double Eagle Lodge: Bear Suite','id':367962},
             {'name':'Double Eagle Lodge: Buck Suite','id':368020},
             {'name':'Double Eagle Lodge: Owl Suite','id':368033},
             {'name':'Double Eagle Lodge: Wolf Suite','id':368034},
             {'name':'Draggin Fly','id':285139},
             {'name':'Dream Forest','id':206360},
             {'name':'Eagles Long View Lodge','id':341010},
             {'name':'East Meets West','id':284054},
             {'name':'Elk Camp Lodge','id':354451},
             {'name':'Emerald View','id':357363},
             {'name':'Falling Waters','id':174774},
             {'name':'Farallon','id':354423},
             {'name':'Fern Ridge Lodge','id':274273},
             {'name':'Fiddlestix at Yonahlossee','id':354424},
             {'name':'Firefly Cabin','id':322974},
             {'name':'Four Seasons','id':357907},
             {'name':'Grand View','id':203352},
             {'name':'Grandfather Vistas','id':174779},
             {'name':'Grandview Getaway','id':367186},
             {'name':'Grapevine Cottage','id':174780},
             {'name':'Gratitude','id':174781},
             {'name':'Great Escape','id':354425},
             {'name':'Hangin Out','id':174783},
             {'name':'Happy Ours','id':174784},
             {'name':'Hawks View Lodge','id':322770},
             {'name':'Heart Rock Lodge','id':354427},
             {'name':'Heather Heights Cottage','id':349523},
             {'name':'Hebron Falls','id':354428},
             {'name':'Hemlock Hideaway','id':174786},
             {'name':'Hidden Ridge','id':174787},
             {'name':'Hideaway Mountain','id':174788},
             {'name':'Highland Mist','id':354429},
             {'name':'Honey Bear Haven','id':354450},
             {'name':'Hummingbird Hollow','id':354426},
             {'name':'I Cant Believe Its Not Heaven','id':174791},
             {'name':'Innspiration','id':174792},
             {'name':'Katydid','id':354455},
             {'name':'Little Creek Lodge','id':174793},
             {'name':'Lois Lane','id':359248},
             {'name':'Longview at Eagles Nest','id':354456},
             {'name':'Lookout Lodge','id':354511},
             {'name':'Love Hollow','id':174846}
        ]

        $scope.plus = function(max, type) {
            if (type == "search.occupants") {
                if ($scope.search.occupants == max) {$scope.isPlusDisabled = true; $scope.isMinusDisabled = false; } else {
                    $scope.search.occupants++
                    $scope.isPlusDisabled = false;
                    $scope.isMinusDisabled = false;
                }
            }
            if (type == "inquiry_occupants") {
                $scope.inquiry.occTotal = parseInt($scope.inquiry.occupantsSmall) + parseInt($scope.inquiry.occupants);
                if ($scope.inquiry.occTotal == max) { $scope.isPlusDisabled = true; $scope.isMinusDisabled = false; } else {
                    $scope.inquiry.occupants++
                    $scope.isPlusDisabled = false;
                    $scope.isMinusDisabled = false;
                }
            }
            if (type == "modal_occupants") {
                $scope.occTotal = parseInt($scope.modal_occupants_small) + parseInt($scope.modal_occupants);
                if ($scope.occTotal == max) { $scope.isPlusDisabled = true; $scope.isMinusDisabled = false; } else {
                    $scope.modal_occupants++
                    $scope.isPlusDisabled = false;
                    $scope.isMinusDisabled = false;
                }
            }
            if (type == "inquiry_occupants_small") {
                $scope.inquiry.occTotal = parseInt($scope.inquiry.occupantsSmall) + parseInt($scope.inquiry.occupants);
                if ($scope.inquiry.occTotal == max) { $scope.isPlusDisabled = true; $scope.isMinusDisabled = false; } else {
                    $scope.inquiry.occupantsSmall++
                    $scope.isPlusDisabled = false;
                    $scope.isMinusDisabled = false;
                }
            }
            if (type == "search.occupants_small") {
                if($scope.search.occupants_small == max){
            	   $scope.isPlusDisabled = true; 
            	   $scope.isMinusDisabled = false; 
                }else{

                   $scope.search.occupants_small++
                   $scope.isPlusDisabled = false;
                   $scope.isMinusDisabled = false;
                }
            }
            if (type == "modal_occupants_small") {
                $scope.occTotal = parseInt($scope.modal_occupants_small) + parseInt($scope.modal_occupants);
                if ($scope.occTotal == max) { $scope.isPlusDisabled = true; $scope.isMinusDisabled = false; } else {
                    $scope.modal_occupants_small++
                    $scope.isPlusDisabled = false;
                    $scope.isMinusDisabled = false;
                }
            }
            if (type == "search.pets") {
                //$scope.search.pets = 1;
                if ($scope.search.pets == max) {} else {
                    $scope.search.pets++
                }
            }
            if (type == "modal_pets") {
                if ($scope.modal_pets == max) { $scope.isPlusDisabled = true; $scope.isMinusDisabled = false; } else {
                    $scope.modal_pets++
                    $scope.isPlusDisabled = false;
                    $scope.isMinusDisabled = false
                }
            }
            if (type == "inquiry_pets") {
                if ($scope.inquiry.pets == max) { $scope.isPlusDisabled = true; $scope.isMinusDisabled = false; } else {
                    $scope.inquiry.pets++
                    $scope.isPlusDisabled = false;
                    $scope.isMinusDisabled = false
                }
            }
            if (type == "search.num_bedrooms") {
                if ($scope.search.num_bedrooms == max) { $scope.isPlusDisabled = true; $scope.isMinusDisabled = false; } else {
                    $scope.search.num_bedrooms++
                    $scope.isPlusDisabled = false;
                    $scope.isMinusDisabled = false;
                }
            }
        };
        $scope.minus = function(min, type) {

            if (type == "search.occupants") {
                if ($scope.search.occupants == min) {
                    $scope.search.occupants = ""
                    $scope.isMinusDisabled = true
                    $scope.isPlusDisabled  = false
                } else if ($scope.search.occupants == 0 || $scope.search.occupants == null) {$scope.search.occupants = ""} else {
                    if($scope.search.occupants == 1){
                       $scope.search.occupants = "" 
                    }else{
                        $scope.search.occupants--
                        $scope.isMinusDisabled = false;
                        $scope.isPlusDisabled = false;
                    }
                   
                }
            }
            if (type == "inquiry_occupants") {
                if ($scope.inquiry.occupants == min) {
                    $scope.inquiry.occupants = ""
                    $scope.isMinusDisabled = true
                    $scope.isPlusDisabled  = false
                } else if ($scope.inquiry.occupants == 0) {$scope.inquiry.occupants = ""} else {
                    $scope.inquiry.occupants--
                    $scope.isMinusDisabled = false;
                    $scope.isPlusDisabled = false;
                }
            }
            if (type == "modal_occupants") {
                if ($scope.modal_occupants == min) {
                    $scope.modal_occupants = ""
                    $scope.isMinusDisabled = true
                    $scope.isPlusDisabled  = false
                } else if ($scope.modal_occupants == 0) {$scope.modal_occupants = ""} else {
                    $scope.modal_occupants--
                    $scope.isMinusDisabled = false;
                    $scope.isPlusDisabled = false;
                }
            }
            if (type == "inquiry_occupants_small") {
                if ($scope.inquiry.occupantsSmall == min) {
                    $scope.inquiry.occupantsSmall = ""
                    $scope.isMinusDisabled = true
                    $scope.isPlusDisabled  = false
                }
                else if ($scope.inquiry.occupantsSmall == 0) {$scope.inquiry.occupantsSmall = ""} else {

                    if($scope.inquiry.occupantsSmall == 1){
                        $scope.inquiry.occupantsSmall = ""
                    }else{
                        $scope.inquiry.occupantsSmall--
                        $scope.isMinusDisabled = false
                        $scope.isPlusDisabled = false;
                    }
                   
                }
            }
            if (type == "search.occupants_small") {
                if ($scope.search.occupants_small == min) {
                    $scope.search.occupants_small = ""
                    $scope.isMinusDisabled = true
                    $scope.isPlusDisabled  = false
                } else if ($scope.search.occupants_small == 0 || $scope.search.occupants_small == null) {$scope.search.occupants_small = ""} else {
                    if($scope.search.occupants_small == 1){
                       $scope.search.occupants_small = ""; 
                    }else{
                      $scope.search.occupants_small--
                      $scope.isMinusDisabled = false;
                      $scope.isPlusDisabled = false; 
                    }
                    
                }
            }
            if (type == "modal_occupants_small") {
                if ($scope.modal_occupants_small == min) {
                    $scope.modal_occupants_small = ""
                    $scope.isMinusDisabled = true
                    $scope.isPlusDisabled  = false
                } else if ($scope.modal_occupants_small == 0) {$scope.modal_occupants_small = ""} else {
                    $scope.modal_occupants_small--
                    $scope.isMinusDisabled = false
                    $scope.isPlusDisabled = false;
                }
            }
            if (type == "search.pets") {
                //$scope.search.pets = 0;
                if ($scope.search.pets == min) {
                    $scope.search.pets = null
                } else if ($scope.search.pets == 0 || $scope.search.pets == null) {$scope.search.pets = ""} else {
                    if($scope.search.pets == 1){
                       $scope.search.pets = ""; 
                    }else{
                    	$scope.search.pets--
                    }    
                }
            }
            if (type == "modal_pets") {
                if ($scope.modal_pets == min) {
                    $scope.modal_pets = ""
                    $scope.isMinusDisabled = true
                    $scope.isPlusDisabled  = false
                } else if ($scope.modal_pets == 0) {$scope.modal_pet = ""} else {
                    $scope.modal_pets--
                    $scope.isMinusDisabled = false;
                    $scope.isPlusDisabled = false;
                }
            }
            if (type == "inquiry_pets") {
                if ($scope.inquiry.pets == min) {
                    $scope.inquiry.pets = ""
                    $scope.isMinusDisabled = true
                    $scope.isPlusDisabled  = false
                } else if ($scope.inquiry.pets == 0) {$scope.inquiry.pets = ""} else {
                    if($scope.inquiry.pets == 1){
                        $scope.inquiry.pets = "";
                    }else{
                        $scope.inquiry.pets--
                        $scope.isMinusDisabled = false
                        $scope.isPlusDisabled = false;
                    }
                    
                }
            }
            if (type == "search.num_bedrooms") {
                if ($scope.search.num_bedrooms == min) {
                    $scope.search.num_bedrooms = ""
                    $scope.isMinusDisabled = true
                    $scope.isPlusDisabled  = false
                } else if ($scope.search.num_bedrooms == 0 || $scope.search.num_bedrooms == null) {$scope.search.num_bedrooms = ""} else {
                    if($scope.search.num_bedrooms == 1){
                       $scope.search.num_bedrooms = ""
                    }else{
                       $scope.search.num_bedrooms--
                       $scope.isMinusDisabled = false
                       $scope.isPlusDisabled = false;
                    } 
                }
            }
        };
        $scope.resetGuests = function() {
            $scope.search.occupants = "";
            $scope.search.occupants_small = "";
            $scope.search.pets = "";
            $scope.search.num_bedrooms = "";
            jQuery('input[name="pets"]').removeAttr("checked");  
        };

        $scope.closeGuests = function() {
            $scope.class = "hide.bs.dropdown"
        }

        $scope.autocompletesearch = function(options) {
            console.log(JSON.stringify(options));
        }

        $scope.getAreas = function(value){
            if($scope.area){
                for(let i=0; i<data.length; i++){
                    if(data[i].name.startsWith($scope.area)){
                        $scope.areas.push(data[i]);
                    }
                }
            }
        }

        $scope.onLocationSelect = function(id){
           jQuery('#area_id').val(id);
        }

        $scope.onSearchSelect  = function(id){
        	jQuery('#resortpro_sw_bed').val(id);
        	jQuery("#resortpro_sw_bed").val(id).trigger("chosen:updated");
        	setTimeout(function(){
               jQuery('#resortpro_sw_bed').parents('form').submit();
        	},500)
        	
        }

    }]);
    app.controller("PropertyController", ["$scope", "$rootScope", "$sce", "$http", "$window", "$filter", "Alert", "rpapi", "rpuri", "$cookies", "$templateCache", "$location", function($scope, $rootScope, $sce, $http, $window, $filter, Alert, rpapi, rpuri, $cookies, $templateCache, $location) {
        $rootScope.properties = {};
        $rootScope.propList = {};
        $rootScope.rates_details = [];
        $rootScope.amenities = [];
        $rootScope.rates2 = [];
        $rootScope.calendar = [];
        $rootScope.calendar2 = {};
        $rootScope.groups = [];
        $scope.loading = true;
        $scope.foundUnits = true;
        $scope.minPrice = 0;
        $scope.maxPrice = 500;
        $scope.maxOccupants = 0;
        $scope.autoZoom = 0;
        $scope.bedroomsNumber = "";
        $scope.neighborhood = "";
        $scope.viewname = "";
        $scope.locationAreaId = "";
        $scope.mapEnabled = false;
        $scope.mapSearch = false;
        $scope.inquiryOnly = false;
        $scope.showMoreButton = true;
        $scope.startDate = $filter("date")(rpuri.getQueryStringParam("sd"), "MM/dd/yyyy");
        $scope.endDate = $filter("date")(rpuri.getQueryStringParam("ed"), "MM/dd/yyyy");
        $scope.occupants = rpuri.getQueryStringParam("oc");
        $scope.plusLogic = 0;
        $scope.isFitBounds = false;
        $scope.skipUnits = "";
        $scope.showDays = true;
        $scope.modal_total_reservation = 0;
        $scope.total_pages = 0;
        $scope.total_units = 0;
        $scope.daysDiff = 0;
        $scope.method = "";
        $scope.wishlist = [];
        $scope.foundCalendarBooking = false;
        $scope.maxCalendarDate = null;
        $scope.isAvailabilitySearch = false;
        $scope.currentPage = 1;
        $scope.enableInfinitiScroll = false;
        $scope.showAllClicked = false
        var map;
        var markerList = {};
        var arrMarkers = [];
        var infowindow;
        var marker;
        var bounds;
        $scope.loadingShow = "true"
        $scope.enabledlistview = "false"
        $scope.loadMoreShow = "false"
        $scope.showfilter = false;
        $scope.showclearbtn = false;
        $scope.isDataShow = "true";
        $scope.view = "gridview";
        $rootScope.propertiesObj = [];
        $scope.result = [];
        
 
        $scope.isString = function(val, allowEmpty) {
            if (angular.isString(val)) {
                if (allowEmpty) {
                    return true
                } else {
                    if (val != "") {
                        return true
                    }
                }
            }
            return false
        };
        $scope.checkString = function(val, allowEmpty) {
            if (angular.isString(val)) {
                if (allowEmpty) {
                    return true
                } else {
                    if (val != "") {
                        return true
                    }
                }
            }
            return false
        };
        $scope.checkNumber = function(val, allowZero) {
            if (angular.isNumber(val)) {
                if (allowZero) {
                    return true
                } else {
                    if (val > 0) {
                        return true
                    }
                }
            } else {
                if (val && val !== null) {
                    if (val.length > 0) {
                        if (!isNaN(val)) {
                            return true
                        }
                    }
                }
            }
            return false
        };
        $scope.isNumber = function(val, allowZero) {
            if (angular.isNumber(val)) {
                if (allowZero) {
                    return true
                } else {
                    if (val > 0) {
                        return true
                    }
                }
            } else {
                if (val && val !== null) {
                    if (val.length > 0) {
                        if (!isNaN(val)) {
                            return true
                        }
                    }
                }
            }
            return false
        };
        $scope.isArray = angular.isArray;
        if ($rootScope.searchSettings.enable_save_unit_place == 1) {
            var pagination_search_number = $rootScope.searchSettings.propertyPagination;
            var cookiePageObj = jQuery($cookies.get("sl_current_page"));
            jQuery(".filter-widget input, .filter-widget select").on("click", function() {
                $scope.deleteCookiesFilters();
                $cookies.remove("sl_current_page", {
                    path: "/"
                })
            });
            if (cookiePageObj.selector != "") {
                pagination_search_number = cookiePageObj.selector * pagination_search_number
            } else {
                pagination_search_number = $rootScope.searchSettings.propertyPagination
            }
        }
        $scope.initializeData = function() {
            $scope.initializeMap();
        };
        $scope.initializeMap = function() {
            $scope.mapSearchEnabled = false;
            $scope.mapEnabled = true;
            $scope.$on("mapInitialized", function(evt, evtMap) {
                map = evtMap;
                bounds = map.getBounds()
            })
        };
        $scope.toggleMapSearch = function() {
            if ($scope.mapSearchEnabled == false) {
                $scope.mapSearchEnabled = true
            } else {
                $scope.mapSearchEnabled = false
            }
        };
        $scope.goToProperty = function(seo_page_name, sd, ed, adults, children, pets, sale, bedrooms_number, home_type, area, neighborhood, location_resort, view, group_type) {
        	if(jQuery("#chekinhidden").length>0 && jQuery("#chekinhidden").val()!=""){
        		sd = jQuery("#chekinhidden").val()
        	}else{
        		sd = ""
        	}
        	if(jQuery("#checkouthidden").length>0 && jQuery("#checkouthidden").val()!=""){
        		ed = jQuery("#checkouthidden").val()
        	}else{
        		ed = ""
        	}
        	if(jQuery("#adulthidden").length>0 && jQuery("#adulthidden").val()!=""){
        		adults = parseInt(jQuery("#adulthidden").val())
        	}else{
        		adults = ""
        	}
        	if(jQuery("#childhidden").length>0 && jQuery("#childhidden").val()!=""){
        		children = parseInt(jQuery("#childhidden").val())
        	}else{
        		children = ""
        	}
        	if(jQuery("#bedhidden").length>0 && jQuery("#bedhidden").val()!=""){
        		bedrooms_number = parseInt(jQuery("#bedhidden").val())
        	}else{
        		bedrooms_number = ""
        	}
        	if(jQuery("#pethidden").length>0 && jQuery("#pethidden").val()!=""){
        		pets = parseInt(jQuery("#pethidden").val())
        	}else{
        		pets = ""
        	}
        	
        	
            var url = $rootScope.propertyUrl + seo_page_name;
            if ("1" == $rootScope.useHTML) url = url + ".html";
            var query_string = "";
            if (sd != undefined && sd != "") query_string += "sd=" + encodeURIComponent(sd) + "&";
            if (ed != undefined && ed != "") query_string += "ed=" + encodeURIComponent(ed) + "&";
            if (adults != undefined && adults != "") query_string += "oc=" + encodeURIComponent(adults) + "&";
            if (children != undefined && children != "") query_string += "ch=" + encodeURIComponent(children) + "&";
            if (pets != undefined && pets != "") query_string += "pets=" + encodeURIComponent(pets) + "&";
            if (sale != undefined && sale == "yes") query_string += "sale=1";
            if (bedrooms_number != undefined && bedrooms_number != "") query_string += "beds=" + encodeURIComponent(bedrooms_number) + "&";
            if (home_type != undefined && home_type != "") query_string += "property_type_id=" + encodeURIComponent(home_type) + "&";
            if (area != undefined && area != "") query_string += "area_id=" + encodeURIComponent(area) + "&";
            if (neighborhood != undefined && neighborhood != "") query_string += "neighborhood_area_id=" + encodeURIComponent(neighborhood) + "&";
            if (location_resort != undefined && location_resort != "") query_string += "resort_area_id=" + encodeURIComponent(location_resort) + "&";
            if (view != undefined && view != "") query_string += "view_name=" + encodeURIComponent(view) + "&";
            if (group_type != undefined && group_type != "") query_string += "group_id=" + encodeURIComponent(group_type) + "&";
            if (query_string != "") url += "?" + query_string.replace(/&+$/, "");

            return encodeURI(url)
        };
        $scope.checkSorting = function() {
            
            if ($scope.sortBy == "occupants") {
                $scope.sort = true
            }
            if ($scope.sortBy == "occupants_low") {
                $scope.sort = false
            }
            if ($scope.sortBy == "price") {
                $scope.sort = true
            }
            if ($scope.sortBy == "price_low") {
                $scope.sort = false
            }
            if ($scope.sortBy == "pets") {

                $scope.sort = true
            }
            if ($scope.sortBy == "name") {
                $scope.sort = false
            }
            if ($scope.sortBy == "bedrooms_number") {
                $scope.sort = true
            }
            if ($scope.sortBy == "bedrooms_number_low") {
                $scope.sort = false
            }
        };
        $scope.customSorting = function(property) {
            if ($scope.sortBy == "occupants" || $scope.sortBy == "occupants_low") {
                return property.max_occupants
            } else if ($scope.sortBy == "bedrooms_number" || $scope.sortBy == "bedrooms_number_low") {
                return property.bedrooms_number
            } else if ($scope.sortBy == "bathrooms_number") {
                return property.bathrooms_number
            } else if ($scope.sortBy == "name") {
                return property.location_name
            } else if ($scope.sortBy == "area") {
                return property.square_foots
            } else if ($scope.sortBy == "view") {
                return property.view_name
            } else if ($scope.sortBy == "price_low" || $scope.sortBy == "price") {
                if ($scope.method != "GetPropertyAvailabilityWithRatesWordPress") {
                    return property.price_data.daily
                } else {
                    return property.total
                }
            } else if ($scope.sortBy == "pets") {
                return property.max_pets > 0
            } else {
                return []
            }
        };
        $scope.getUnitName = function(unit) {
            if ($scope.isString(unit.web_name) && unit.web_name != "") {
                return unit.web_name
            } else {
                if ($scope.isString(unit.location_name) && (unit.name == "" || unit.name == "Home")) {
                    return unit.location_name
                } else {
                    return unit.name
                }
            }
        };
        $scope.getUnitPrice = function(unit) {};
        $scope.calculateMarkup = function(strPrice) {
            var price = strPrice;
            if (typeof strPrice == "string") {
                price = parseFloat(strPrice.replace("$", "").replace(",", ""))
            }
            if ($rootScope.rateMarkup > 0) {
                var pct = 1 + parseFloat($rootScope.rateMarkup) / 100;
                price = price * pct
            }
            return price
        };
        $scope.disableMapSearch = function() {
            $scope.mapSearchEnabled = false;
            $scope.availabilitySearch($scope.search)
        };
        $scope.clearProperties = function() {
            $rootScope.propList = [];
            $rootScope.properties = []
        };
        $scope.isEmptyString = function(obj) {
            return !(obj != undefined && obj != "")
        };
        $scope.isEmptyObject = function(obj) {
            return angular.equals({}, obj) || obj == null
        };
        $scope.isString = function(item) {
            return angular.isString(item)
        };
        $scope.loadMarkers = function(properties, setBounds) {
            if ($scope.mapEnabled) {
                angular.forEach(properties, function(property) {
                    if (!isNaN(property.location_latitude) && !isNaN(property.location_longitude)) {
                        var marker = {
                            id: property.id,
                            name: property.location_name,
                            latitude: parseFloat(property.location_latitude),
                            longitude: parseFloat(property.location_longitude),
                            image: property.default_thumbnail_path,
                            beds: property.bedrooms_number,
                            baths: property.bathrooms_number,
                            guests: property.max_occupants,
                            seo_page_name: property.seo_page_name
                        };
                        if ($scope.method == "GetPropertyAvailabilityWithRatesWordPress") {
                            marker["price"] = property.total
                        } else {
                            marker["price"] = property.price_data
                        }
                        if (map != undefined) {
                        	/*if(!isNaN(property.location_latitude) && !isNaN(property.location_longitude)){
                        		var latLong = new google.maps.LatLng(parseFloat(property.location_latitude), parseFloat(property.location_longitude));
                                 bounds.extend(latLong);
                        	}*/
                            
                            $scope.loadMarker(marker)
                        } else {
                            setTimeout(function() {
                                if (map != undefined) {
                                    var latLong = new google.maps.LatLng(parseFloat(property.location_latitude), parseFloat(property.location_longitude));
                                    bounds.extend(latLong);
                                    $scope.loadMarker(marker)
                                }
                            }, 2e3)
                        }
                    }
                });
                if (map != undefined && setBounds) {
                    $scope.isFitBounds = true;
                    map.fitBounds(bounds);
                    map.setCenter(bounds.getCenter());
                    $scope.isFitBounds = false
                }
            }
        };

        $scope.deleteCookiesFilters = function() {
            $cookies.remove("unit_id", {
                path: "/"
            })
        };
        $scope.savePagination = function() {
            var savePagination = $cookies.getObject("sl_current_page")
        };
        $scope.saveUnitId = function() {
            var saveUnitId = $cookies.getObject("unit_id")
        };
        $scope.loadMore = function() {
            $scope.loadMoreShow = "true";
            var size = $rootScope.searchSettings.propertyPagination;
            $scope.currentPage++;
            $scope.limit += $rootScope.searchSettings.propertyPagination;
            var params = $scope.getParams();
             var ammenties = [];
			 var pets       = "";
			 var start_date = jQuery('#search_start_date').val();
			 var end_date   = jQuery('#search_end_date').val();
			 var children   = jQuery('#resortpro-search-guests-children-block-not').find('.count-single-child').html();
			 var adults     = jQuery("#resortpro-search-guests-adults-block-not").find('.count-single-adult').html();
			 var beds       = parseInt(jQuery('#resortpro-search-number-bedrooms-block-not').find(".ng-binding").html());
			 var location   = jQuery("#resortpro_sw_ra_id option:selected").val();

			 jQuery('input[name="resortpro_sw_amenities[]"]:checked').each(function(e) {
				ammenties.push({
				      id:jQuery(this).attr("value"),
				      name:jQuery(this).next('label').html()
				   });
			 });
 
            if(adults && adults!=0){
            	params['occupants'] = parseInt(adults);
            }
            if(pets){
            	params['pets'] = parseInt(pets);
            }
            if(beds){
                params['bedrooms_number'] = parseInt(beds);
            }
            if(start_date){
                params['startdate'] = start_date
            }
            if(end_date){
                params['enddate'] = end_date
            }
            if(children){
                params['occupants_small'] = parseInt(children)
            }
            if(location){
                params['resort_area_id'] = parseInt(location)
            }
            if(ammenties.length>0){
            	var ammentiesid = [];
            	for(let i=0; i<ammenties.length; i++){
                      ammentiesid.push(ammenties[i].id);
            	}
            	jQuery("#ammentieshidden").val(ammentiesid.join(","));
                params['amenities_filter'] = ammentiesid.join(",");
            }



            $scope.loadMoreProperties(params, size, $scope.currentPage, false);

            if ($rootScope.searchSettings.enable_save_unit_place == 1) {
                var cookiePageObj = jQuery($cookies.get("sl_current_page"));
                if (cookiePageObj.selector != "") {
                    $cookies.putObject("sl_current_page", parseInt(cookiePageObj.selector) + 1, {
                        path: "/"
                    })
                } else {
                    $cookies.putObject("sl_current_page", $scope.currentPage, {
                        path: "/"
                    })
                }
            }
        };
        if ($rootScope.searchSettings.enable_save_unit_place == 1) {
            jQuery(document).on("click", ".listing", function() {
                var the_unit_link = jQuery(this).attr("id").split("-");
                var the_unit_id = the_unit_link.pop();
                $cookies.putObject("unit_id", the_unit_id, {
                    path: "/"
                })
            })
        }
        if ($rootScope.searchSettings.enable_save_unit_place == 0) {
            $scope.deleteCookiesFilters()
        }
        $scope.prepareMarker = function(property, marker) {
            var ne = map.getBounds().getNorthEast();
            var sw = map.getBounds().getSouthWest();
            if (parseFloat(property.location_latitude) >= sw.lat() && parseFloat(property.location_latitude) <= ne.lat() && property.location_longitude >= sw.lng() && property.location_longitude <= ne.lng()) {
                $scope.loadMarker(marker)
            }
        };
        $scope.getPropertyInfo = function() {
            rpapi.getWithParams("GetPropertyInfo", {
                unit_id: $scope.propertyId
            }).success(function(obj) {
                $scope.property = obj.data;
                $scope.latitude = parseFloat(obj.data.latitude);
                $scope.longitude = parseFloat(obj.data.longitude);
                $scope.$on("mapInitialized", function(evt, evtMap) {
                    map = evtMap;
                    var myLatlng = {
                        lat: parseFloat(obj.data.latitude),
                        lng: parseFloat(obj.data.longitude)
                    };
                    map.setCenter(myLatlng)
                })
            })
        };
        $scope.getPropertyImages = function(unit_id) {
            rpapi.getWithParams("GetPropertyGalleryImages", {
                unit_id: unit_id
            }).success(function(obj) {
                $scope.images = obj.data.image
            })
        };

        $scope.getPropertyCustomFeatured = function(unit_id) {
            rpapi.getWithParams("GetPropertyCustomFields", {
                unit_id: $scope.propertyId
            }).success(function(cst_fields) {
                $scope.data = cst_fields.data;


                   angular.forEach(cst_fields.data['field'], function(c_field, i) {
                    field_custom_name = c_field.name;
                    field_custom_value = c_field.value;
                     //    console.log(field_custom_name);
                     // console.log(field_custom_value);
                     
                    if(field_custom_name == 'Featured' && field_custom_value == "yes"){
                        $scope.custom_featured_field = field_custom_value;

                    }

                });

            })

        };
        $scope.getPropertyCustomSpecial = function(unit_id) {
            rpapi.getWithParams("GetPropertyCustomFields", {
                unit_id: $scope.propertyId
            }).success(function(cst_fields) {
                $scope.data = cst_fields.data;
                   angular.forEach(cst_fields.data['field'], function(c_field, i) {
                    field_custom_name = c_field.name;
                    field_custom_value_c = c_field.value;
                    if(field_custom_name == 'Special' && !$scope.isEmptyObject(field_custom_value_c) ){
                        $scope.custom_special_field = field_custom_value_c;

                    }

                });

            })

        };
        $scope.setAmenityFilter = function(amenityId) {
            run_waitMe(".listings_wrapper_box", "bounce", "Updating Results");
            setTimeout(function() {
                hide_waitMe(".listings_wrapper_box")
            }, 500);
            if ($scope.amenity[amenityId]) {
                $rootScope.amenities.push(amenityId)
            } else {
                var index = $rootScope.amenities.indexOf(amenityId);
                if (index > -1) {
                    $rootScope.amenities.splice(index, 1)
                }
            }
            searchParam = $location.search();
            if ($rootScope.amenities.length) {
                searchParam["amenities"] = $rootScope.amenities.join(",")
            } else {
                searchParam["amenities"] = null
            }
            $location.search(searchParam)
        };

        $scope.setAmenityFilterOr = function(amenityId, group) {
            run_waitMe(".listings_wrapper_box", "bounce", "Updating Results");
            setTimeout(function() {
                hide_waitMe(".listings_wrapper_box")
            }, 500);
            var amenityFound = false;
            if (!$rootScope.groups.length > 0) {
                var gitem = {
                    name: group,
                    amenities: [amenityId]
                };
                $rootScope.groups.push(gitem)
            } else {
                var removeFromArray = false;
                var indexToRemove = 0;
                angular.forEach($rootScope.groups, function(amenity, key) {
                    if ($scope.amenityOr[amenityId]) {
                        if (amenity.name == group) {
                            amenityFound = true;
                            amenity.amenities.push(amenityId)
                        }
                    } else {
                        if (amenity.name == group) {
                            amenityFound = true;
                            var index = amenity.amenities.indexOf(amenityId);
                            if (index > -1) {
                                amenity.amenities.splice(index, 1)
                            }
                            if (amenity.amenities.length == 0) {
                                removeFromArray = true;
                                indexToRemove = key
                            }
                        }
                    }
                });
                if (!amenityFound) {
                    var gitem = {
                        name: group,
                        amenities: [amenityId]
                    };
                    $rootScope.groups.push(gitem)
                }
                if (removeFromArray) {
                    $rootScope.groups.splice(indexToRemove, 1)
                }
            }
            searchParam = $location.search();
            if (typeof searchParam["amenities"] == "undefined") {
                amenities = []
            } else {
                amenities = searchParam["amenities"].split(",")
            }
            amenityIdValue = $scope.amenityOr[amenityId];
            amenityIdPosition = amenities.indexOf(amenityId + "");
            if (amenityIdValue == false && amenityIdPosition > -1) {
                amenities.splice(amenityIdPosition, 1)
            } else {
                amenities.push(amenityIdValue)
            }
            if (amenities.length) {
                searchParam["amenities"] = amenities.join(",")
            } else {
                searchParam["amenities"] = null
            }
            $location.search(searchParam)
        };

        $scope.amenityFilter = function(item) {
            var totalAmenities = $rootScope.amenities.length;
            var i = 0;
            angular.forEach($rootScope.amenities, function(aId) {

                angular.forEach(item.unit_amenities.amenity, function(uaId) {

                    if (aId == uaId.amenity_id ) {
                        i++
                    }
                })
            });
            if (totalAmenities == i) {
                return true
            } else {
                return false
            }
        };

        $scope.amenityFilterOr = function(item) {
            var result = true;
            if ($rootScope.groups.length > 0) {
                result = false
            }
            var totalGroups = $rootScope.groups.length;
            var groupsFound = 0;
            angular.forEach($rootScope.groups, function(group) {
                var keepGoing = true;
                angular.forEach(group.amenities, function(amenity) {
                    angular.forEach(item.unit_amenities.amenity, function(ua) {
                        if (keepGoing) {
                            if (ua.amenity_id == amenity) {
                                groupsFound++;
                                keepGoing = false
                            }
                        }
                    })
                })
            });
            return totalGroups == groupsFound
        };
        $scope.getPropertyAmenities = function() {
            rpapi.getWithParams("GetPropertyAmenities", {
                unit_id: $scope.propertyId
            }).success(function(obj) {
                $scope.amenities = obj.data.amenity
            })
        };
        $scope.getLocations = function() {
            rpapi.get("GetLocationAreasList").success(function(obj) {
                $scope.locations = obj.data.location_area
            })
        };
        $scope.getPropertyReviews = function(unit_id) {
            if (!unit_id) {
                unit_id = $scope.propertyId
            }
            rpapi.getWithParams("GetPropertyFeedbacks", {
                unit_id: unit_id,
                order_by: "newest_first"
            }).success(function(obj) {
                
                if (obj.data.feedbacks.guest_name) {
                    var reviewsArray = [];
                    reviewsArray.push(obj.data.feedbacks);
                    $scope.reviews = reviewsArray
                } else {
                    $scope.reviews = obj.data.feedbacks

                }
            })
        };
        $scope.getPreReservationPrice = function(booking, res) {
        	Alert.clear();
            if (booking.checkin && booking.checkout) {
                var checkin = new Date(booking.checkin);
                var checkout = new Date(booking.checkout);
                var oneDay = 24 * 60 * 60 * 1e3;
                var stayLength = Math.round(Math.abs((checkin.getTime() - checkout.getTime()) / oneDay));
                run_waitMe("#resortpro-book-unit", "bounce", "Updating Price...");
                Alert.clear();
                var totalOccupants = parseInt(booking.occupants) + parseInt(booking.occupants_small);
                if (parseInt($scope.maxOccupants) > 0 && parseInt(booking.occupants) + parseInt(booking.occupants_small) > parseInt($scope.maxOccupants)) {
                    Alert.add(Alert.errorType, "You have selected a total of " + totalOccupants + " guests which exceeds the maximum occupancy of " + $scope.maxOccupants + " of this property. Please adjust your selection.");
                    hide_waitMe("#resortpro-book-unit");
                    $scope.isDisabled = true;
                    return false
                }
                rpapi.getWithParams("VerifyPropertyAvailability", {
                    unit_id: booking.unit_id,
                    startdate: booking.checkin,
                    enddate: booking.checkout,
                    occupants: booking.occupants,
                    occupants_small: booking.occupants_small,
                    pets: booking.pets,
                    use_room_type_logic: parseInt($rootScope.roomTypeLogic)
                }).success(function(obj) {
                    if (obj.status) {
                        $scope.reservation_days = [];
                        $scope.total_reservation = 0;
                        $scope.first_day_price = 0;
                        $scope.rent = 0;
                        $scope.taxes = 0;
                        var errorMsg = obj.status.description;
                        if (obj.status.code == "E0031" && $rootScope.searchSettings.restrictionMsg != "") {
                            errorMsg = $rootScope.searchSettings.restrictionMsg
                        }
                        Alert.add(Alert.errorType, errorMsg);
                        hide_waitMe("#resortpro-book-unit");
                        $scope.isDisabled = true
                    } else {
                        if ($rootScope.bookingSettings.inquiryOnlyFrom && $rootScope.bookingSettings.inquiryOnlyTo) {
                            var inquiryOnlyFrom = new Date($rootScope.bookingSettings.inquiryOnlyFrom);
                            var inquiryOnlyTo = new Date($rootScope.bookingSettings.inquiryOnlyTo);
                            if (!(checkout.getTime() <= inquiryOnlyFrom.getTime() || checkin.getTime() >= inquiryOnlyTo.getTime())) {
                                Alert.add(Alert.errorType, "These dates are Inquiry Only, please send us a inquiry using the form below");
                                hide_waitMe("#resortpro-book-unit");
                                $scope.isDisabled = true;
                                return false
                            }
                        }
                        var maxLengthStay = $rootScope.bookingSettings.maxLengthStay;
                        if (maxLengthStay > 0 && stayLength > maxLengthStay) {
                            Alert.add(Alert.errorType, "the max stay is on.");
                            hide_waitMe("#resortpro-book-unit");
                            $scope.isDisabled = true;
                            return false
                        }
                        var params = {
                            unit_id: booking.unit_id,
                            startdate: booking.checkin,
                            enddate: booking.checkout,
                            occupants: booking.occupants,
                            occupants_small: booking.occupants_small,
                            pets: booking.pets,
                            coupon_code: booking.coupon_code
                        };
                        if ($rootScope.includeEnabledOptional === 1) {
                            params["optional_default_enabled"] = "yes"
                        }
                        $scope.isDisabled = false;
                        rpapi.getWithParams("GetPreReservationPrice", params).success(function(obj) {
                            if (obj.data != undefined) {
                                var total_fees = 0;
                                var total_taxes = 0;
                                if (obj.data.required_fees.id) {
                                    total_fees = obj.data.required_fees.value
                                } else {
                                    angular.forEach(obj.data.required_fees, function(fee, i) {
                                        total_fees += fee.value
                                    })
                                }
                                if (obj.data.taxes_details.id) {
                                    total_taxes = obj.data.taxes_details.value
                                } else {
                                    angular.forEach(obj.data.taxes_details, function(fee, i) {
                                        total_taxes += fee.value
                                    })
                                }
                                $scope.total_reservation = obj.data.total;
                                $scope.total_fees = total_fees;
                                $scope.total_taxes = total_taxes;
                                $scope.rent = obj.data.price;
                                $scope.subTotal = $scope.calculateMarkup((obj.data.price + obj.data.coupon_discount).toString());
                                var dif = $scope.subTotal - obj.data.coupon_discount - obj.data.price;
                                $scope.taxes = obj.data.taxes - dif;
                                $scope.coupon_discount = obj.data.coupon_discount;
                                $scope.reservation_days = obj.data.reservation_days;
                                $scope.security_deposits = obj.data.security_deposits;
                                $scope.first_day_price = obj.data.first_day_price;
                                $scope.required_fees = obj.data.required_fees;
                                $scope.optional_fees = obj.data.optional_fees;
                                $scope.taxes_details = obj.data.taxes_details;
                                $scope.due_today = obj.data.due_today;
                                $scope.res = res;
                                if (obj.data.reservation_days.date != undefined) {
                                    $scope.days = false
                                } else {
                                    $scope.days = true
                                }
                                hide_waitMe("#resortpro-book-unit")
                            }
                        })
                    }
                })
            }
        };
        $scope.getParams = function() {
            var search = $scope.search;
            var params = {};
            if (search && search.sort_by) {
                params.sort_by = search.sort_by
            } else {
                params.sort_by = $scope.sortBy
            }
            params.use_room_type_logic = parseInt($rootScope.roomTypeLogic);
            params.extra_charges = 1;
            if ($rootScope.searchSettings.disableMinimalDays) {
                params.disable_minimal_days = $rootScope.searchSettings.disableMinimalDays
            }
            if ($rootScope.searchSettings.propertyDeleteUnits) {
                params.skip_units = $rootScope.searchSettings.propertyDeleteUnits
            }
            if ($rootScope.searchSettings.locationAreas != "") {
                params.location_areas_id_filter = $rootScope.searchSettings.locationAreas
            }
            if ($scope.checkNumber($rootScope.searchSettings.locationId, false)) {
                params.location_id = $rootScope.searchSettings.locationId
            }
            if ($scope.checkNumber($rootScope.searchSettings.resortAreaId, false)) {
                params.resort_area_id = $rootScope.searchSettings.resortAreaId
            }
            if ($scope.checkNumber($rootScope.searchSettings.neighborhoodId, false)) {
                params.neighborhood_area_id = $rootScope.searchSettings.neighborhoodId
            }
            if ($rootScope.searchSettings.additionalVariables == 1) {
                params.additional_variables = 1
            }
            if ($rootScope.searchSettings.extraCharges == 1) {
                params.extra_charges = 1
            }
            if (parseInt($rootScope.searchSettings.skipAmenities) === 1) {
                params.use_description = "no";
                params.use_amenities = "no"
            }
            if (search) {
                if(search.amenities){
                    params.amenities_filter = search.amenities
                }
                if ($scope.checkNumber(search.occupants, false)) {
                    params.occupants = parseInt(search.occupants);
                    $location.search("oc", params.occupants)
                } else {
                    $location.search("oc", null)
                }
                if (search.start_date && search.end_date) {
                    params.startdate = search.start_date;
                    params.enddate = search.end_date;
                    $location.search("sd", search.start_date);
                    $location.search("ed", search.end_date)
                }
                if ($scope.checkNumber(search.occupants_small, false)) {
                    params.occupants_small = parseInt(search.occupants_small);
                    $location.search("ch", params.occupants_small)
                } else {
                    $location.search("ch", null)
                }
                if ($scope.checkNumber(search.pets, false)) {
                    params.pets = parseInt(search.pets);
                    $location.search("pets", params.pets)
                } else {
                    $location.search("pets", null)
                }
                if ($scope.checkNumber(search.min_pets, false)) {
                    params.min_pets = parseInt(search.min_pets);
                    $location.search("min_pets", parseInt(search.min_pets))
                } else {
                    $location.search("min_pets", null)
                }
                if ($scope.checkNumber(search.location_id, false)) {
                    params.location_id = parseInt(search.location_id)
                }
                if ($scope.checkString(search.amenities_filter, false)) {
                    params.amenities_filter = search.amenities_filter
                }
                if ($scope.checkNumber(search.location_area_id, false)) {
                    params.location_area_id = parseInt(search.location_area_id);
                    $location.search("location_area_id", params.location_area_id)
                } else {
                    $location.search("location_area_id", null);
                    delete params.location_area_id
                }
                if ($scope.checkNumber(search.lodging_type_id, false)) {
                    params.lodging_type_id = parseInt(search.lodging_type_id);
                    $location.search("lodging_type_id", params.lodging_type_id)
                } else {
                    $location.search("lodging_type_id", null);
                    delete params.lodging_type_id
                }
                if (search.num_bedrooms != "undefined" && search.num_bedrooms >= 0 && search.num_bedrooms !== "") {
                    if ($scope.plusLogic === 1) {
                        params.min_bedrooms_number = parseInt(search.num_bedrooms);
                        $location.search("beds", parseInt(search.num_bedrooms))
                    } else {
                        if (search.num_bedrooms == null) {
                            $location.search("beds", null)
                        } else {
                            params.bedrooms_number = parseInt(search.num_bedrooms);
                            $location.search("beds", parseInt(search.num_bedrooms))
                        }
                    }
                } else {
                    $location.search("beds", null)
                }
                if ($scope.checkNumber(search.resort_area_id, false)) {
                    params.resort_area_id = parseInt(search.resort_area_id);
                    $location.search("resort_area_id", params.resort_area_id)
                } else {
                    delete params.resort_area_id;
                    $location.search("resort_area_id", null)
                }
                if ($scope.checkNumber(search.location, false)) {
                    params.location_id = parseInt(search.location);
                    $location.search("location_id", params.location_id)
                } else {
                    $location.search("location_id", null)
                }
                if ($scope.checkNumber(search.neighborhood_area_id, false)) {
                    params.neighborhood_area_id = parseInt(search.neighborhood_area_id);
                    $location.search("neighborhood_area_id", params.neighborhood_area_id)
                } else {
                    delete params.neighborhood_area_id;
                    $location.search("neighborhood_area_id", null)
                }
                if ($scope.checkNumber(search.home_type_id, false)) {
                    params.home_type_id = parseInt(search.home_type_id);
                    $location.search("home_type_id", params.home_type_id)
                } else {
                    delete params.home_type_id;
                    $location.search("home_type_id", null)
                }
                if ($scope.checkString(search.view_name, false)) {
                    params.view_name = search.view_name;
                    $location.search("view_name", params.view_name)
                } else {
                    delete params.view_name;
                    $location.search("view_name", null)
                }
                if ($scope.checkNumber(search.condo_type_id, false)) {
                    params.condo_type_id = parseInt(search.condo_type_id);
                    $location.search("condo_type_id", params.condo_type_id)
                } else {
                    delete params.condo_type_id;
                    $location.search("condo_type_id", null)
                }
                if ($scope.checkNumber(search.group_type, false)) {
                    params.condo_type_group_id = parseInt(search.group_type);
                    $location.search("group_id", params.condo_type_group_id)
                } else {
                    delete params.condo_type_group_id;
                    $location.search("group_id", null)
                }
                if (!$scope.isEmptyString(search.adults) && search.adults > 0) {
                    params.adults = parseInt(search.adults)
                }
                if (!$scope.isEmptyString(search.min_occupants) && search.min_occupants > 0) {
                    params.min_occupants = parseInt(search.min_occupants)
                }
                if (!$scope.isEmptyString(search.min_adults) && search.min_adults > 0) {
                    params.min_occupants = parseInt(search.min_adults)
                }
                if (!$scope.isEmptyString(search.min_pets) && search.min_pets > 0) {
                    params.min_occupants = parseInt(search.min_pets)
                }
                if (!$scope.isEmptyString(search.bedrooms_number) && search.bedrooms_number > 0) {
                    params.bedrooms_number = parseInt(search.bedrooms_number)
                }
                if (!$scope.isEmptyString(search.min_bedrooms_number) && search.min_bedrooms_number > 0) {
                    params.min_bedrooms_number = parseInt(search.min_bedrooms_number)
                }
                if (!$scope.isEmptyString(search.bathrooms_number) && search.bathrooms_number > 0) {
                    params.bathrooms_number = parseInt(search.bathrooms_number)
                }
                if (!$scope.isEmptyString(search.min_bathrooms_number) && search.min_bathrooms_number > 0) {
                    params.min_bathrooms_number = parseInt(search.min_bathrooms_number)
                }
                if (!$scope.isEmptyString(search.neighborhood_area_id_filter)) {
                    params.neighborhood_area_id_filter = search.neighborhood_area_id_filter
                }
                if (!$scope.isEmptyString(search.condo_type_group_id_filter)) {
                    params.condo_type_group_id_filter = search.condo_type_group_id_filter
                }
                if (!$scope.isEmptyString(search.condo_type_id_filter)) {
                    params.condo_type_id_filter = search.condo_type_id_filter
                }
                if (!$scope.isEmptyString(search.home_type_id_filter)) {
                    params.home_type_id_filter = search.home_type_id_filter
                }
                if (!$scope.isEmptyString(search.neighborhood_area_id_filter)) {
                    params.neighborhood_area_id_filter = search.neighborhood_area_id_filter
                }
                if (!$scope.isEmptyString(search.location_id_filter)) {
                    params.location_id_filter = search.location_id_filter
                }
                if (!$scope.isEmptyString(search.location_areas_id_filter)) {
                    params.location_areas_id_filter = search.location_areas_id_filter
                }
                if (!$scope.isEmptyString(search.resort_area_id_filter)) {
                    params.resort_area_id_filter = search.resort_area_id_filter
                }
                if (!$scope.isEmptyString(search.location_area_name)) {
                    params.location_area_name = search.location_area_name
                }
                if ($scope.checkString(search.unit_name, false)) {
                    params.unit_name = search.unit_name
                }
                if (!$scope.isEmptyString(search.location_type_name)) {
                    params.location_type_name = search.location_type_name
                }
                if (!$scope.isEmptyString(search.condo_type_group_name)) {
                    params.condo_type_group_name = search.condo_type_group_name
                }
            }
            $scope.amenities = [];
            angular.forEach($scope.selectedAmenities, function(item) {
                if (item != false) {
                    $scope.amenities.push(item)
                }
            });
            if ($scope.amenities.length > 0) {
                var amenities = $scope.amenities.join();
                params.amenities_filter = amenities
            }
            
            /*if(search.amenities) {
                params.amenities_filter = search.amenities
            }*/

            if ($scope.mapSearchEnabled && angular.isNumber($scope.latNE)) {
                params.latNe = $scope.latNE;
                params.longNe = $scope.longNE;
                params.latSw = $scope.latSW;
                params.longSw = $scope.longSW
            }
            if ($scope.skipUnits != "") {
                params.skip_units = $scope.skipUnits
            }
            return params
        };
        jQuery(".col-md-4.search-sidebar #sticky-wrapper").removeClass("sticky-wrapper");
        $scope.requestPropertyList = function(method) {
            $scope.availabilitySearch()
        };

        $scope.setCookie=function(c_name,value,exdays){
            var exdate=new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
            document.cookie=c_name + "=" + c_value;
        }

        $scope.getCookie=function(c_name){
            var i,x,y,ARRcookies=document.cookie.split(";");
            for (i=0;i<ARRcookies.length;i++)
              {
              x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
              y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
              x=x.replace(/^\s+|\s+$/g,"");
              if (x==c_name)
                {
                return unescape(y);
                }
              }
        }

        $scope.checkCookie= function(){
            var emailaddress=getCookie("emailaddress");
            if (emailaddress!=null && emailaddress!="")
              {
                document.getElementById('newsletter_nav').setAttribute( 'style', 'display:none' );
                document.getElementById('replacement_nav').setAttribute( 'style', 'display:block' );    

              }
            else 
              {
                document.getElementById('newsletter_nav').setAttribute( 'style', 'display:block' );
                document.getElementById('replacement_nav').setAttribute( 'style', 'display:none' );  

              }
        }

        $scope.availabilitySearch = function(search, map_search) {
            var cookiePageObject = jQuery($cookies.get("sl_current_page"));
            var view = jQuery($cookies.get("view"));
            if ($rootScope.searchSettings.enable_save_unit_place == 1 && cookiePageObject.selector != "") {
                size = pagination_search_number
            } else {
                size = $rootScope.searchSettings.propertyPagination
            }
            properties = $rootScope.propList;
            $scope.noResults = false;
            $scope.currentPage = 1;
            if (!$scope.limit) {
                $scope.limit = size
            }
            map_search = typeof map_search !== "undefined" ? map_search : false;
            $scope.mapSearch = map_search;
            $scope.loading = true;
            var params = $scope.getParams();
            params.page_number = $scope.currentPage;
            params.page_results_number = size;
            angular.forEach(arrMarkers, function(item, i) {
                item.setMap(null)
            });
            arrMarkers = [];
            $scope.searchProperties(params, size, 1, true)
            $scope.currentView = "gridview";
            if(view.selector){
                 if(view.selector == "mapview"){
                    $scope.changeToMapView();
                 }

                 if(view.selector == "gridview"){
                    $scope.changeToGridView();
                 }

                 if(view.selector == "listview"){
                    $scope.changeToListView();
                 }
            }else{
                $scope.view = "gridview";
                $scope.showload = true;
            }     
        };

        $scope.clearFilter = function(e){
            jQuery("html, body").animate({ scrollTop: 0 }, "slow");
        	var uri = window.location.href.toString();
			if (uri.indexOf("?") > 0) {
			    var clean_uri = uri.substring(0, uri.indexOf("?"));
			    window.history.replaceState({}, document.title, clean_uri);
			}

			jQuery("input[name=resortpro_sw_children]").val("");
            jQuery("input[name=resortpro_sw_children]").trigger('input');
            jQuery("input[name=resortpro_sw_adults]").val("");
            jQuery("input[name=resortpro_sw_adults]").trigger('input');
            jQuery("input[name=resortpro_sw_bedrooms_number]").val("");
            jQuery("input[name=resortpro_sw_bedrooms_number]").trigger('input');

            jQuery("#checkouthidden").val("");
            jQuery("#adulthidden").val("");
            jQuery("#childhidden").val("");
            jQuery("#bedhidden").val("");
            jQuery("#pethidden").val("");


			jQuery("#resortpro_sw_ra_id").prop('selectedIndex',0);
			jQuery('.custom-control-input').attr('checked', false);
            jQuery('#resortpro-widget-form')[0].reset();
            jQuery('#resortpro-search-guests-children-block-not').find('.ng-binding').html("");
            jQuery('#resortpro-search-number-bedrooms-block-not').find(".ng-binding").html("");
            jQuery('.adultsquant').html("");
            jQuery('.childrenquant').html("");
            jQuery('.petsquant').html("");
            jQuery('.bedsquant').html("");
            jQuery('.checkindate').html("");
            jQuery('.checkoutdate').html("");
            jQuery('.locationname').html("");
            jQuery('.ammenties').html("");
            jQuery('.ammenties-item').children().remove();
            jQuery('.ammenties-item').parent().parent().addClass("d-none");
            setTimeout(function(){
               jQuery('#resetbedsroom').trigger("click");
            },500)

            setTimeout(function(){

                jQuery('.label-single-adult').html("Adult");
                jQuery('.label-single-child').html("Child");
                jQuery('.label-single-bed').html("Bed");
            },100)
             jQuery('.adultsquant').parent().addClass("d-none");
             jQuery('.childrenquant').parent().addClass("d-none");
             jQuery('.guestquant').parent().addClass("d-none");
             jQuery('.petsquant').parent().addClass("d-none");
             jQuery('.bedsquant').parent().addClass("d-none");
             jQuery('.checkindate').parent().addClass("d-none");
             jQuery('.checkoutdate').parent().addClass("d-none");
             jQuery('.locationname').parent().addClass("d-none");
            $scope.noResults = false
            $scope.isDataShow = "false";
            $scope.showfilter = false;
            $scope.showclearbtn = false;
            if ($rootScope.searchSettings.enable_save_unit_place == 1 && cookiePageObject.selector != "") {
                size = pagination_search_number
            } else {
                size = $rootScope.searchSettings.propertyPagination
            }
            var params = $scope.getParams();
            var newparams= {};
            newparams["sort_by"] = "random";
            newparams["use_room_type_logic"] = 0;
            newparams["extra_charges"] = 1;
            newparams["use_description"] = "no";
            newparams["use_amenities"] = "no";
            newparams["use_description"] = "no";
            newparams["use_room_type_logic"] = 0;
            $scope.searchProperties(newparams, size, 1, true)
        }

        $scope.getParameterByName = function(name, url){
        	if (!url) url = window.location.href;
		    name = name.replace(/[\[\]]/g, '\\$&');
		    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
		        results = regex.exec(url);
		    if (!results) return null;
		    if (!results[2]) return '';
		    return decodeURIComponent(results[2].replace(/\+/g, ' '));
        };

        $scope.addQueryParam = function(search, key, val){
			  var newParam = key + '=' + val,
			      params = '?' + newParam;

			  // If the "search" string exists, then build params from it
			  if (search) {
			    // Try to replace an existance instance
			    params = search.replace(new RegExp('([?&])' + key + '[^&]*'), '$1' + newParam);

			    // If nothing was replaced, then add the new param to the end
			    if (params === search) {
			      params += '&' + newParam;
			    }
			  }

			  return params;
         };


        $scope.updateSearchparameter = function(e){
        	var ammenties = [];
            var ammentiestext = [];
            var youngguest = "";
            var totalguest = "";
            var pets       = "";
            var start_date = jQuery('#search_start_date').val();
            var end_date   = jQuery('#search_end_date').val();
            var children   = jQuery('#resortpro-search-guests-children-block-not').find('.count-single-child').html();
            var adults     = jQuery("#resortpro-search-guests-adults-block-not").find('.count-single-adult').html();
            var beds       = parseInt(jQuery('#resortpro-search-number-bedrooms-block-not').find(".ng-binding").html());
            var location   = jQuery("#resortpro_sw_ra_id option:selected").val();
            var location_text = jQuery("#resortpro_sw_ra_id option:selected").text();
            
            if($scope.getParameterByName('pets')){
            	pets = parseInt($scope.getParameterByName('pets'))
            }else{
            	pets = ""
            }
            
          
        	jQuery("input[name=resortpro_sw_children]").val(children);
            jQuery("input[name=resortpro_sw_children]").trigger('input');
            jQuery("input[name=resortpro_sw_adults]").val(adults);
            jQuery("input[name=resortpro_sw_adults]").trigger('input'); 

            jQuery('input[name="resortpro_sw_amenities[]"]:checked').each(function(e) {
                ammenties.push({
                              id:jQuery(this).attr("value"),
                              name:jQuery(this).next('label').html()
                   });
            });
            $scope.showfilter = true;
            
            if(adults && adults!=0){
            	jQuery("#adulthidden").val(adults);
            	if(adults == 1){
            		jQuery('.adultsquant').html(adults+" "+"adult");
            	}else{
            		jQuery('.adultsquant').html(adults+" "+"adults");
            	}
                
                jQuery('.adultsquant').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#adulthidden").val("");
            	jQuery('.adultsquant').html("");
                jQuery('.adultsquant').parent().addClass("d-none");
            }

            if(children && children!=0){
            	jQuery("#childhidden").val(children);
            	if(children == 1){
            		jQuery('.childrenquant').html(children+" "+"child");
            	}else{
            		jQuery('.childrenquant').html(children+" "+"children");
            	}
                
                jQuery('.childrenquant').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#childhidden").val("");
            	jQuery('.childrenquant').html("");
                jQuery('.childrenquant').parent().addClass("d-none");
            }

            if(beds){
            	 jQuery("#bedhidden").val(beds);
            	 jQuery("input[name=resortpro_sw_bedrooms_number]").val(beds);
                 jQuery("input[name=resortpro_sw_bedrooms_number]").trigger('input'); 
            	if(beds == 1){
            		jQuery('.bedsquant').html(beds+" "+"bed");
            	}else{
            		jQuery('.bedsquant').html(beds+" "+"beds");
            	}
                jQuery('.bedsquant').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#bedhidden").val("");
                 jQuery('.bedsquant').html("");
                jQuery('.bedsquant').parent().addClass("d-none");
            }
            
            if(pets!=0 && pets!=""){
            	jQuery("#pethidden").val(pets);
            	if(pets == 1){
            		jQuery('.petsquant').html(pets+" "+"pet");
            	}else{
            		jQuery('.petsquant').html(pets+" "+"pets");
            	}
                jQuery('.petsquant').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#pethidden").val("");
            	jQuery('.petsquant').html("");
            	jQuery('.petsquant').parent().addClass("d-none");
            }
            if(start_date){
            	jQuery("#chekinhidden").val(start_date);
                jQuery('.checkindate').html(start_date);
                jQuery('.checkindate').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#chekinhidden").val("");
                jQuery('.checkindate').html("");
                jQuery('.checkindate').parent().addClass("d-none");
            }
            if(end_date){
            	jQuery("#checkouthidden").val(end_date);
                jQuery('.checkoutdate').html(end_date);
                jQuery('.checkoutdate').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#checkouthidden").val("");
                jQuery('.checkoutdate').html("");
                jQuery('.checkoutdate').parent().addClass("d-none");
            }
            if(location){
            	jQuery("#locationhidden").val(location);
            	if(location_text.length>10){
            		jQuery('.locationname').html(location_text.substr(0, 10) + "...");
            	}else{
            		jQuery('.locationname').html(location_text);
            	}
                
                jQuery('.locationname').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#locationhidden").val("");
                jQuery('.locationname').html("");
                jQuery('.locationname').parent().addClass("d-none");
            }
            if(ammenties.length>0){
            	jQuery('.ammenties-item').html("");
                jQuery('.ammenties-item').parent().parent().removeClass("d-none");
                for(var i=0; i<ammenties.length; i++){
                    var html = '<label class="font-13 font-weight-light-bold d-block" for="customCheck1">'+ammenties[i].name+'</label>'
                    jQuery('.ammenties-item').append(html)
                }
                $scope.showclearbtn = true
            }else{
                 jQuery('.ammenties-item').children().remove();
                 jQuery('.ammenties-item').parent().parent().addClass("d-none");
            }
        }


        $scope.updateSearch = function(e){
        	console.log($scope.total_units);
            jQuery("html, body").animate({ scrollTop: 0 }, "slow");
        	$scope.noResults = false;
            $scope.isDataShow = "false";
            e.preventDefault();
            var ammenties = [];
            var ammentiestext = [];
            var youngguest = "";
            var totalguest = "";
            var pets       = "";
            var count = 0;
            var start_date = jQuery('#search_start_date').val();
            var end_date   = jQuery('#search_end_date').val();
            var children   = jQuery('#resortpro-search-guests-children-block-not').find('.count-single-child').html();
            var adults     = jQuery("#resortpro-search-guests-adults-block-not").find('.count-single-adult').html();
          
            if($scope.getParameterByName('pets')){
            	pets = parseInt($scope.getParameterByName('pets'))
            }else{
            	pets = ""
            }

            var uri = window.location.href.toString();
			if (uri.indexOf("?") > 0) {
			    var clean_uri = uri.substring(0, uri.indexOf("?"));
			    window.history.replaceState({}, document.title, clean_uri);
			}

			var queryparams = document.location.search;

            jQuery("input[name=resortpro_sw_children]").val(children);
            jQuery("input[name=resortpro_sw_children]").trigger('input');
            
            jQuery("input[name=resortpro_sw_adults]").val(adults);
            jQuery("input[name=resortpro_sw_adults]").trigger('input'); 

            var beds       = parseInt(jQuery('#resortpro-search-number-bedrooms-block-not').find(".ng-binding").html());
            var location   = jQuery("#resortpro_sw_ra_id option:selected").val();
            var location_text = jQuery("#resortpro_sw_ra_id option:selected").text();
            jQuery('input[name="resortpro_sw_amenities[]"]:checked').each(function(e) {
                ammenties.push({
                              id:jQuery(this).attr("value"),
                              name:jQuery(this).next('label').html()
                   });
            });
            $scope.showfilter = true;
            
            if(adults && adults!=0){
            	jQuery("#adulthidden").val(adults);
            	if(adults == 1){
            		jQuery('.adultsquant').html(adults+" "+"adult");
            	}else{
            		jQuery('.adultsquant').html(adults+" "+"adults");
            	}
                
                jQuery('.adultsquant').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#adulthidden").val("");
            	jQuery('.adultsquant').html("");
                jQuery('.adultsquant').parent().addClass("d-none");
            }

            if(children && children!=0){
            	jQuery("#childhidden").val(children);
            	if(children == 1){
            		jQuery('.childrenquant').html(children+" "+"child");
            	}else{
            		jQuery('.childrenquant').html(children+" "+"children");
            	}
                
                jQuery('.childrenquant').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#childhidden").val("");
            	jQuery('.childrenquant').html("");
                jQuery('.childrenquant').parent().addClass("d-none");
            }

            if(beds){
            	 jQuery("#bedhidden").val(beds);
            	 jQuery("input[name=resortpro_sw_bedrooms_number]").val(beds);
                 jQuery("input[name=resortpro_sw_bedrooms_number]").trigger('input'); 
            	if(beds == 1){
            		jQuery('.bedsquant').html(beds+" "+"bed");
            	}else{
            		jQuery('.bedsquant').html(beds+" "+"beds");
            	}
                jQuery('.bedsquant').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#bedhidden").val("");
                 jQuery('.bedsquant').html("");
                jQuery('.bedsquant').parent().addClass("d-none");
            }
            
            if(pets!=0 && pets!=""){
            	jQuery("#pethidden").val(pets);
            	if(pets == 1){
            		jQuery('.petsquant').html(pets+" "+"pet");
            	}else{
            		jQuery('.petsquant').html(pets+" "+"pets");
            	}
                jQuery('.petsquant').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#pethidden").val("");
            	jQuery('.petsquant').html("");
            	jQuery('.petsquant').parent().addClass("d-none");
            }
            if(start_date){
            	jQuery("#chekinhidden").val(start_date);
                jQuery('.checkindate').html(start_date);
                jQuery('.checkindate').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#chekinhidden").val("");
                jQuery('.checkindate').html("");
                jQuery('.checkindate').parent().addClass("d-none");
            }
            if(end_date){
            	jQuery("#checkouthidden").val(end_date);
                jQuery('.checkoutdate').html(end_date);
                jQuery('.checkoutdate').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#checkouthidden").val("");
                jQuery('.checkoutdate').html("");
                jQuery('.checkoutdate').parent().addClass("d-none");
            }
            if(location){
            	jQuery("#locationhidden").val(location);
            	if(location_text.length>10){
            		jQuery('.locationname').html(location_text.substr(0, 10) + "...");
            	}else{
            		jQuery('.locationname').html(location_text);
            	}
                
                jQuery('.locationname').parent().removeClass("d-none");
                $scope.showclearbtn = true
            }else{
            	jQuery("#locationhidden").val("");
                jQuery('.locationname').html("");
                jQuery('.locationname').parent().addClass("d-none");
            }
            if(ammenties.length>0){
            	jQuery('.ammenties-item').html("");
                jQuery('.ammenties-item').parent().parent().removeClass("d-none");
                for(var i=0; i<ammenties.length; i++){
                    var html = '<label class="font-13 font-weight-light-bold d-block" for="customCheck1">'+ammenties[i].name+'</label>'
                    jQuery('.ammenties-item').append(html)
                }
                $scope.showclearbtn = true
            }else{
                 jQuery('.ammenties-item').children().remove();
                 jQuery('.ammenties-item').parent().parent().addClass("d-none");
            }

            if(!adults && !children && !beds && !start_date && !end_date && !location && !ammenties.length>0){
                $scope.showfilter = false;
                $scope.showclearbtn = false;
            }
            $scope.loadingShow = "true"
            var cookiePageObject = jQuery($cookies.get("sl_current_page"));
            var view = jQuery($cookies.get("view"));

            if ($rootScope.searchSettings.enable_save_unit_place == 1 && cookiePageObject.selector != "") {
                size = pagination_search_number
            } else {
                size = $rootScope.searchSettings.propertyPagination
            }
            var params = $scope.getParams();

            if(params.hasOwnProperty("skip_units")){
                delete params.skip_units;
            }

            if(params.hasOwnProperty("page_results_number")){
                delete params.page_results_number;
            }

            if(adults && adults!=0){
            	params['occupants'] = parseInt(adults);
            	queryparams =$scope.addQueryParam(queryparams,'oc',parseInt(adults));
            }
            if(pets){
            	params['pets'] = parseInt(pets);
            	queryparams =$scope.addQueryParam(queryparams,'pets',parseInt(pets));
            }
            if(beds){
                params['bedrooms_number'] = parseInt(beds);

                queryparams =$scope.addQueryParam(queryparams,'beds',parseInt(beds));
            }
            if(start_date){
                params['startdate'] = start_date
                queryparams = $scope.addQueryParam(queryparams,'sd',start_date);
            }
            if(end_date){
                params['enddate'] = end_date
                queryparams = $scope.addQueryParam(queryparams,'ed',end_date);
            }
            if(children){
                params['occupants_small'] = parseInt(children)
                queryparams = $scope.addQueryParam(queryparams,'ch',parseInt(children));     
            }
            if(location){
                params['resort_area_id'] = parseInt(location)
                queryparams = $scope.addQueryParam(queryparams,'resort_area_id',parseInt(location));
            }
            if(ammenties.length>0){
            	var ammentiesid = [];
            	for(let i=0; i<ammenties.length; i++){
                      ammentiesid.push(ammenties[i].id);
            	}
            	jQuery("#ammentieshidden").val(ammentiesid.join(","));
                params['amenities_filter'] = ammentiesid.join(",");
                queryparams = $scope.addQueryParam(queryparams,'amenities',ammentiesid.join(","));
            }

            var newRelativePathQuery = queryparams;
            history.pushState(null, '', newRelativePathQuery);
            $scope.searchProperties(params, size, 1, true)
           if($scope.sortBy != "random"){
              jQuery('.sortfilter').val($scope.sortBy);
           }
        }


        $scope.searchMap = function(params, size, page, clearUnits) {
            mapLoaded = true;
            params.page_number = page;
            params.page_results_number = size;
            method = $rootScope.searchSettings.searchMethod;
            if (!(params.startdate == "" || params.startdate == undefined) && !(params.enddate == "" || params.enddate == undefined)) {
                var oneDay = 24 * 60 * 60 * 1e3;
                var checkin = new Date(params.startdate);
                var checkout = new Date(params.enddate);
                var diffDays = Math.round(Math.abs((checkin.getTime() - checkout.getTime()) / oneDay));
                $scope.daysDiff = diffDays;
                if (diffDays > $rootScope.searchSettings.maxSearchDays) {
                    method = "GetPropertyAvailabilitySimple"
                }
            } else {
                method = "GetPropertyListWordPress"
            }
            $scope.method = method;
            //run_waitMe(".map-container-wrapper", "roundBounce", "Getting all the location...");
            $scope.enableInfinitiScroll = false;
            rpapi.getWithParams(method, params).success(function(obj) {
                hide_waitMe(".map-container-wrapper");
                if (!obj.status && obj.data.available_properties && obj.data.available_properties.pagination.total_units > 0) {
                    var tempProperties = [];
                    if (method == "GetPropertyAvailabilitySimple" || method == "GetPropertyListWordPress") {
                        tempProperties = obj.data.property
                    } else {
                        tempProperties = obj.data.available_properties.property
                    }
                    $scope.loadMarkers(tempProperties, false)
                } else {
                    $scope.noResults = true
                }
            });
            $scope.loading = false
            var view = jQuery($cookies.get("view"));
            if(view.selector){
                if(view.selector == "mapview"){
                   jQuery(".loadmore").hide();
                }
            }
        }

        $scope.loadMoreProperties = function(params, size, page, clearUnits){

        	$scope.noResults = false
            $scope.loadingShow = "true"
            $scope.showBtn = false
            params.page_number = page;
            params.page_results_number = size;
            method = $rootScope.searchSettings.searchMethod;
            if (!(params.startdate == "" || params.startdate == undefined) && !(params.enddate == "" || params.enddate == undefined)) {
                var oneDay = 24 * 60 * 60 * 1e3;
                var checkin = new Date(params.startdate);
                var checkout = new Date(params.enddate);
                var diffDays = Math.round(Math.abs((checkin.getTime() - checkout.getTime()) / oneDay));
                $scope.daysDiff = diffDays;
                if (diffDays > $rootScope.searchSettings.maxSearchDays) {
                    method = "GetPropertyAvailabilitySimple"
                }
            } else {
                method = "GetPropertyListWordPress"
            }
            $scope.method = method;
            //run_waitMe(".map-container-wrapper", "bounce", "Getting all the location...");
            //run_waitMe(".listings_wrapper_box", "bounce", "Searching The Best Places For You...");
            //run_waitMe(".list-container-wrapper", "bounce", "Searching The Best Places For You...");
            $scope.enableInfinitiScroll = false;
            rpapi.getWithParams(method, params).success(function(obj) {
                $scope.showBtn = true
                $scope.loadingShow = "false"
                $scope.loadMoreShow = "false"
                $scope.isDataShow = "true";
                jQuery(".col-md-4.search-sidebar #sticky-wrapper").addClass("sticky-wrapper");
                if ($rootScope.searchSettings.enable_save_unit_place == 1) {
                    var cookieunitobj = $cookies.getObject("unit_id");
                    var sl_cookie_unit = "#unit-" + cookieunitobj;
                    setTimeout(function() {
                        offset = 0;
                        if (jQuery("body.admin-bar").length > 0) offset = 32;
                        jQuery(document).ready(function() {
                            if (typeof cookieunitobj != "undefined") {
                                jQuery("html, body").animate({
                                    scrollTop: jQuery(sl_cookie_unit).offset().top + 0
                                }, "slow");
                                $scope.deleteCookiesFilters();
                                return false
                            }
                        })
                    }, 50)
                }
                var cookiePageObject = jQuery($cookies.get("sl_current_page"));
                hide_waitMe(".listings_wrapper_box");
                hide_waitMe(".list-container-wrapper");
                if (clearUnits) {
                    $rootScope.propertiesObj = [];
                    $rootScope.properties = [];
                    if (params.skip_units) {
                        $scope.skipUnits = params.skip_units
                    } else {
                        $scope.skipUnits = ""
                    }
                    if ($rootScope.searchSettings.enable_save_unit_place == 1 && cookiePageObject.selector != "") {
                        $scope.limit = pagination_search_number
                    } else {
                        $scope.limit = $rootScope.searchSettings.propertyPagination
                    }
                }
                if (!obj.status && obj.data.available_properties && obj.data.available_properties.pagination.total_units > 0) {
                    if (obj.data.available_properties.pagination.total_pages > $scope.currentPage) {
                        $scope.enableInfinitiScroll = true
                    }
                    if (clearUnits) {
                        $scope.total_units = obj.data.available_properties.pagination.total_units
                    }
                    $scope.foundUnits = true;
                    var tempProperties = [];
                    if (method == "GetPropertyAvailabilitySimple" || method == "GetPropertyListWordPress") {
                        tempProperties = obj.data.property
                    } else {
                        tempProperties = obj.data.available_properties.property
                    }
                    if ($rootScope.properties.length > 0) {
                        $rootScope.properties = $rootScope.properties.concat(tempProperties)
                    } else {
                        $rootScope.properties = tempProperties
                    }
                    $rootScope.propertiesObj = Object.keys($rootScope.properties).map(function(key) {
                        return $rootScope.properties[key]
                    });
                    if (params.sort_by == "random") {
                        angular.forEach(tempProperties, function(property) {
                            if ($scope.skipUnits == "") {
                                $scope.skipUnits = property.id
                            } else {
                                $scope.skipUnits += "," + property.id
                            }
                        })
                    }
                   
                    //$scope.loadMarkers(tempProperties, false)
                } else {
                	$scope.loadBtn = false;
                    //$scope.noResults = true
                    hide_waitMe(".map-container-wrapper");
                }
                //$scope.searchMap(params, $scope.total_units, 1, true)
            });
            $scope.loading = false
        }

        $scope.searchProperties = function(params, size, page, clearUnits) {
        	console.log("Params while loading");
        	console.log(params);
            $scope.noResults = false
            $scope.loadingShow = "true"
            $scope.showBtn = false
            params.page_number = page;
            params.page_results_number = size;
            method = $rootScope.searchSettings.searchMethod;
            if (!(params.startdate == "" || params.startdate == undefined) && !(params.enddate == "" || params.enddate == undefined)) {
                var oneDay = 24 * 60 * 60 * 1e3;
                var checkin = new Date(params.startdate);
                var checkout = new Date(params.enddate);
                var diffDays = Math.round(Math.abs((checkin.getTime() - checkout.getTime()) / oneDay));
                $scope.daysDiff = diffDays;
                if (diffDays > $rootScope.searchSettings.maxSearchDays) {
                    method = "GetPropertyAvailabilitySimple"
                }
            } else {
                method = "GetPropertyListWordPress"
            }
            $scope.method = method;
            //run_waitMe(".map-container-wrapper", "bounce", "Getting all the location...");
            //run_waitMe(".listings_wrapper_box", "bounce", "Searching The Best Places For You...");
            //run_waitMe(".list-container-wrapper", "bounce", "Searching The Best Places For You...");
            $scope.enableInfinitiScroll = false;
            rpapi.getWithParams(method, params).success(function(obj) {
                $scope.showBtn = true
                $scope.loadingShow = "false"
                $scope.loadMoreShow = "false"
                $scope.isDataShow = "true";
                jQuery(".col-md-4.search-sidebar #sticky-wrapper").addClass("sticky-wrapper");
                if ($rootScope.searchSettings.enable_save_unit_place == 1) {
                    var cookieunitobj = $cookies.getObject("unit_id");
                    var sl_cookie_unit = "#unit-" + cookieunitobj;
                    setTimeout(function() {
                        offset = 0;
                        if (jQuery("body.admin-bar").length > 0) offset = 32;
                        jQuery(document).ready(function() {
                            if (typeof cookieunitobj != "undefined") {
                                jQuery("html, body").animate({
                                    scrollTop: jQuery(sl_cookie_unit).offset().top + 0
                                }, "slow");
                                $scope.deleteCookiesFilters();
                                return false
                            }
                        })
                    }, 50)
                }
                var cookiePageObject = jQuery($cookies.get("sl_current_page"));
                hide_waitMe(".listings_wrapper_box");
                hide_waitMe(".list-container-wrapper");
                if (clearUnits) {
                    $rootScope.propertiesObj = [];
                    $rootScope.properties = [];
                    if (params.skip_units) {
                        $scope.skipUnits = params.skip_units
                    } else {
                        $scope.skipUnits = ""
                    }
                    if ($rootScope.searchSettings.enable_save_unit_place == 1 && cookiePageObject.selector != "") {
                        $scope.limit = pagination_search_number
                    } else {
                        $scope.limit = $rootScope.searchSettings.propertyPagination
                    }
                }
                if (!obj.status && obj.data.available_properties && obj.data.available_properties.pagination.total_units > 0) {
                    if (obj.data.available_properties.pagination.total_pages > $scope.currentPage) {
                        $scope.enableInfinitiScroll = true
                    }
                    if (clearUnits) {
                        $scope.total_units = obj.data.available_properties.pagination.total_units
                    }
                    $scope.foundUnits = true;
                    var tempProperties = [];
                    if (method == "GetPropertyAvailabilitySimple" || method == "GetPropertyListWordPress") {
                        tempProperties = obj.data.property
                    } else {
                        tempProperties = obj.data.available_properties.property
                    }
                    if ($rootScope.properties.length > 0) {
                        $rootScope.properties = $rootScope.properties.concat(tempProperties)
                    } else {
                        $rootScope.properties = tempProperties
                    }
                    $rootScope.propertiesObj = Object.keys($rootScope.properties).map(function(key) {
                        return $rootScope.properties[key]
                    });
                    if (params.sort_by == "random") {
                        angular.forEach(tempProperties, function(property) {
                            if ($scope.skipUnits == "") {
                                $scope.skipUnits = property.id
                            } else {
                                $scope.skipUnits += "," + property.id
                            }
                        })
                    }
                   
                    //$scope.loadMarkers(tempProperties, false)
                } else {
                	var newparams= {};
		            newparams["sort_by"] = "random";
		            newparams["use_room_type_logic"] = 0;
		            newparams["extra_charges"] = 1;
		            newparams["use_description"] = "no";
		            newparams["use_amenities"] = "no";
		            newparams["use_description"] = "no";
		            newparams["use_room_type_logic"] = 0;
		            $scope.noResult(newparams, size, 1, true)
                    //$scope.noResults = true
                    hide_waitMe(".map-container-wrapper");
                }
                $scope.searchMap(params, $scope.total_units, 1, true)
            });
            $scope.loading = false
        };


        $scope.noResult = function(params, size, page, clearUnits) {
        	$scope.noResults = false
            $scope.loadingShow = "true"
            $scope.showBtn = false
            params.page_number = page;
            params.page_results_number = size;
            method = $rootScope.searchSettings.searchMethod;
            if (!(params.startdate == "" || params.startdate == undefined) && !(params.enddate == "" || params.enddate == undefined)) {
                var oneDay = 24 * 60 * 60 * 1e3;
                var checkin = new Date(params.startdate);
                var checkout = new Date(params.enddate);
                var diffDays = Math.round(Math.abs((checkin.getTime() - checkout.getTime()) / oneDay));
                $scope.daysDiff = diffDays;
                if (diffDays > $rootScope.searchSettings.maxSearchDays) {
                    method = "GetPropertyAvailabilitySimple"
                }
            } else {
                method = "GetPropertyListWordPress"
            }
            $scope.method = method;
            //run_waitMe(".map-container-wrapper", "bounce", "Getting all the location...");
            //run_waitMe(".listings_wrapper_box", "bounce", "Searching The Best Places For You...");
            //run_waitMe(".list-container-wrapper", "bounce", "Searching The Best Places For You...");
            $scope.enableInfinitiScroll = false;
            rpapi.getWithParams(method, params).success(function(obj) {
                $scope.showBtn = true
                $scope.loadingShow = "false"
                $scope.loadMoreShow = "false"
                $scope.isDataShow = "true";
                jQuery(".col-md-4.search-sidebar #sticky-wrapper").addClass("sticky-wrapper");
                if ($rootScope.searchSettings.enable_save_unit_place == 1) {
                    var cookieunitobj = $cookies.getObject("unit_id");
                    var sl_cookie_unit = "#unit-" + cookieunitobj;
                    setTimeout(function() {
                        offset = 0;
                        if (jQuery("body.admin-bar").length > 0) offset = 32;
                        jQuery(document).ready(function() {
                            if (typeof cookieunitobj != "undefined") {
                                jQuery("html, body").animate({
                                    scrollTop: jQuery(sl_cookie_unit).offset().top + 0
                                }, "slow");
                                $scope.deleteCookiesFilters();
                                return false
                            }
                        })
                    }, 50)
                }
                var cookiePageObject = jQuery($cookies.get("sl_current_page"));
                hide_waitMe(".listings_wrapper_box");
                hide_waitMe(".list-container-wrapper");
                if (clearUnits) {
                    $rootScope.propertiesObj = [];
                    $rootScope.properties = [];
                    if (params.skip_units) {
                        $scope.skipUnits = params.skip_units
                    } else {
                        $scope.skipUnits = ""
                    }
                    if ($rootScope.searchSettings.enable_save_unit_place == 1 && cookiePageObject.selector != "") {
                        $scope.limit = pagination_search_number
                    } else {
                        $scope.limit = $rootScope.searchSettings.propertyPagination
                    }
                }
                if (!obj.status && obj.data.available_properties && obj.data.available_properties.pagination.total_units > 0) {
                    if (obj.data.available_properties.pagination.total_pages > $scope.currentPage) {
                        $scope.enableInfinitiScroll = true
                    }
                    if (clearUnits) {
                        $scope.total_units = obj.data.available_properties.pagination.total_units
                    }
                    $scope.foundUnits = true;
                    var tempProperties = [];
                    if (method == "GetPropertyAvailabilitySimple" || method == "GetPropertyListWordPress") {
                        tempProperties = obj.data.property
                    } else {
                        tempProperties = obj.data.available_properties.property
                    }
                    if ($rootScope.properties.length > 0) {
                        $rootScope.properties = $rootScope.properties.concat(tempProperties)
                    } else {
                        $rootScope.properties = tempProperties
                    }
                    $rootScope.propertiesObj = Object.keys($rootScope.properties).map(function(key) {
                        return $rootScope.properties[key]
                    });
                    if (params.sort_by == "random") {
                        angular.forEach(tempProperties, function(property) {
                            if ($scope.skipUnits == "") {
                                $scope.skipUnits = property.id
                            } else {
                                $scope.skipUnits += "," + property.id
                            }
                        })
                    }
                   
                    //$scope.loadMarkers(tempProperties, false)
                } else {
                    $scope.noResults = true
                    hide_waitMe(".map-container-wrapper");
                }
                $scope.searchMap(params, $scope.total_units, 1, true)
            });
            $scope.loading = false
        };

        $scope.showAll = function() {
            var params = $scope.getParams();
            $scope.showAllProperties(params, $scope.total_units, 1, false);
        };

        $scope.showAllProperties = function(params, size, page, clearUnits) {
            $scope.showAllClicked = true
            $scope.showBtn = false;
            params.page_number = page;
            params.page_results_number = size;
            params.skip_units = "";
            method = $rootScope.searchSettings.searchMethod;
            if (!(params.startdate == "" || params.startdate == undefined) && !(params.enddate == "" || params.enddate == undefined)) {
                var oneDay = 24 * 60 * 60 * 1e3;
                var checkin = new Date(params.startdate);
                var checkout = new Date(params.enddate);
                var diffDays = Math.round(Math.abs((checkin.getTime() - checkout.getTime()) / oneDay));
                $scope.daysDiff = diffDays;
                if (diffDays > $rootScope.searchSettings.maxSearchDays) {
                    method = "GetPropertyAvailabilitySimple"
                }
            } else {
                method = "GetPropertyListWordPress"
            }
            $scope.method = method;
            run_waitMe(".listings_wrapper_box", "roundBounce", "Searching The Best Places For You...");
            $scope.enableInfinitiScroll = false;
            rpapi.getWithParams(method, params).success(function(obj) {
                $scope.showbuttons = false;
                jQuery(".col-md-4.search-sidebar #sticky-wrapper").addClass("sticky-wrapper");
                hide_waitMe(".listings_wrapper_box");
                if (clearUnits) {
                    $rootScope.propertiesObj = [];
                    $rootScope.properties = [];
                    if (params.skip_units) {
                        $scope.skipUnits = params.skip_units
                    } else {
                        $scope.skipUnits = ""
                    }
                }
                if (!obj.status && obj.data.available_properties && obj.data.available_properties.pagination.total_units > 0) {
                    if (obj.data.available_properties.pagination.total_pages > $scope.currentPage) {
                        $scope.enableInfinitiScroll = true
                    }
                    if (clearUnits) {
                        $scope.total_units = obj.data.available_properties.pagination.total_units
                    }
                    $scope.foundUnits = true;
                    var tempProperties = [];
                    if (method == "GetPropertyAvailabilitySimple" || method == "GetPropertyListWordPress") {
                        tempProperties = obj.data.property
                    } else {
                        tempProperties = obj.data.available_properties.property
                    }
                    if ($rootScope.properties.length > 0) {
                        $rootScope.properties = $rootScope.properties.concat(tempProperties)
                    } else {
                        $rootScope.properties = tempProperties
                    }
                    $rootScope.propertiesObj = tempProperties

                    if (params.sort_by == "random") {
                        angular.forEach(tempProperties, function(property) {
                            if ($scope.skipUnits == "") {
                                $scope.skipUnits = property.id
                            } else {
                                $scope.skipUnits += "," + property.id
                            }
                        })
                    }
                   
                } else {
                    $scope.noResults = true
                }
            });
            $scope.loading = false   
        }


        $scope.paymentLogin = function(login) {
            var data = {
                action: "streamlinecore-payment-login",
                confirmation_id: login.confirmation_id,
                zip_code: login.zip_code,
                nonce: login.nonce
            };
            run_waitMe("#login-payment-form");
            $http({
                method: "POST",
                headers: {
                    "Content-type": "application/json"
                },
                url: streamlinecoreConfig.ajaxUrl,
                params: data
            }).then(function successCallback(response) {
                hide_waitMe("#login-payment-form");
                if (response.data.success) {
                    jQuery("#hash").val(response.data.data.hash);
                    jQuery("#form_payment_login").submit()
                } else {
                    Alert.add(Alert.errorType, "Confirmation number or zip code incorrect.")
                }
            }, function errorCallback(response) {
                Alert.add(Alert.errorType, "Cant send email")
            })
        };
        $scope.shareWithFriends = function() {
            if ($scope.frmShare.$valid) {
                var link = $scope.goToProperty($scope.share.seo_page_name, $scope.share.start_date, $scope.share.end_date, $scope.share.occupants, $scope.share.occupants_small, $scope.share.pets);
                var message = $scope.share.message;
                var data = {
                    action: "streamlinecore-share-with-friends",
                    fnames: $scope.share.fnames,
                    femails: $scope.share.femails,
                    name: $scope.share.name,
                    email: $scope.share.email,
                    msg: message,
                    slug: $scope.share.seo_page_name,
                    link: link,
                    nonce: $scope.share.nonce
                };
                $http({
                    method: "POST",
                    headers: {
                        "Content-type": "application/json"
                    },
                    url: streamlinecoreConfig.ajaxUrl,
                    params: data
                }).then(function successCallback(response) {
                    if (response.data.success) {
                        Alert.add(Alert.successType, response.data.data.message);
                        setTimeout(function() {
                            jQuery("#modalShare").modal("hide")
                        }, 3e3)
                    } else {
                        Alert.add(Alert.errorType, response.data.data.message)
                    }
                }, function errorCallback(response) {
                    Alert.add(Alert.errorType, "Cant send email")
                })
            }
            return false
        };
        $scope.filterByPrice = function(minPrice, maxPrice) {
            $scope.priceRangeEnabled = true;
            $scope.minPrice = minPrice;
            $scope.maxPrice = maxPrice;
            jQuery('.minval').val('$'+minPrice);
            jQuery('.maxval').val('$'+maxPrice);
        };
        $scope.filterByBedroom = function(minBedroom, maxBedroom) {
            $scope.BedroomsRangeEnabled = true;
            $scope.minBedroom = minBedroom;
            $scope.maxBedroom = maxBedroom
        };
        $scope.bedroomFilter = function(item) {
            var result = true;
            if ($scope.bedroomsNumber.indexOf("-") !== -1) {
                var beds = $scope.bedroomsNumber.split("-");
                if (item.bedrooms_number >= beds[0] && item.bedrooms_number <= beds[1]) {
                    return true
                } else {
                    return false
                }
            } else {
                if (parseInt($scope.bedroomsNumber) > 0) {
                    if (item.bedrooms_number == $scope.bedroomsNumber) {
                        result = true
                    } else {
                        result = false
                    }
                }
            }
            return result
        };
        $scope.locationFilter = function(item) {
            var result = true;
            if ($scope.locationAreaId > 0) {
                if (item.location_area_id == $scope.locationAreaId) {
                    result = true
                } else {
                    result = false
                }
            }
            return result
        };
        $scope.neighborhoodFilter = function(item) {
            var result = true;
            if ($scope.neighborhood != "") {
                if (item.neighborhood_name == $scope.neighborhood) {
                    result = true
                } else {
                    result = false
                }
            }
            return result
        };
        $scope.viewNameFilter = function(item) {
            var result = true;
            if ($scope.viewname != "") {
                if (item.view_name == $scope.viewname) {
                    result = true
                } else {
                    result = false
                }
            }
            return result
        };
        $scope.priceRange = function(item) {

            $scope.amenities = [];
            angular.forEach($scope.selected, function(amenity) {
                if (amenity != false) {
                    $scope.amenities.push(item)
                }
            });
            var result = true;
            if ($scope.priceRangeEnabled) {
                if (item.price_data.daily >= $scope.minPrice && item.price_data.daily <= $scope.maxPrice) {
                    result = true
                } else {
                    result = false
                }
            }

            if(!$scope.showAllClicked) {
                 if(jQuery('.grid_view_container').length==0){
                   $scope.showBtn = false;
                }else{
                    $scope.showBtn = true;
                }
            }
            setInterval(function(){ 
                if(jQuery('.propertydtl').length == 0){
                   jQuery('.load-more').addClass("d-none");
                   if(jQuery('.noresultprimary').length==0 && jQuery('.loading').length == 0){
                      jQuery(".noresult").removeClass("d-none");
                   } 
                }else{
                    jQuery('.load-more').removeClass("d-none");
                    jQuery(".noresult").addClass("d-none");
                }

            }, 500);
            return result           
            
        };
        $scope.resetSearch = function() {
            $scope.search.occupants = "";
            $scope.search.end_date = "";
            $scope.search.start_date = "";
            $scope.search.home_type = "";
            $scope.search.group_type = "";
            $scope.search.bedroom_type = "";
            $scope.search.viewname = "";
            $scope.search.area = "";
            $scope.search.location_resort = "";
            $scope.search.neighborhood_id = "";
            $scope.search.location = "";
            $scope.search.num_bedrooms = "";
            $scope.search.occupants_small = "";
            $scope.search.pets = "";
            $scope.search.start_date = "";
            $scope.search.end_date = "";
            jQuery(".ui-slider-range").css("left", "0");
            jQuery(".ui-slider-range").css("width", "100%");
            jQuery(".resortpro-search-price .ui-slider-handle").first().css("left", "0");
            jQuery(".resortpro-search-price .ui-slider-handle").last().css("right", "0");
            jQuery(".resortpro-search-price .ui-slider-handle").last().css("left", "auto");
            $scope.minPrice = 100;
            $scope.maxPrice = "";
            window.setTimeout(function() {
                $scope.availabilitySearch("");
                $scope.filterByPrice(0, 5e3);
                $scope.priceRangeEnabled = false;
                $scope.priceRange()
            }, 100);
            $location.search({
                "": null
            });
            jQuery(".amenity_group input").removeAttr("checked")
        };
        /*jQuery(document).ready(function() {
            jQuery(".view_type_menu li").on("click", function() {
                jQuery(this).parents("ol").find("li").removeClass("selected_view");
                jQuery(this).addClass("selected_view")
            })
        });*/
        $scope.availableProperties = function(id) {
            if ($scope.results.length >= 0) {
                if ($.inArray(id, $scope.results) >= 0) {
                    return true
                } else {
                    return false
                }
            } else {
                return true
            }
        };
        $scope.getRoomDetails = function(unit_id) {
            $scope.room_details = [];
            if (!unit_id) {
                unit_id = $scope.propertyId
            }
            rpapi.getWithParams("GetPropertyRoomsDetailsRawData", {
                unit_id: unit_id
            }).success(function(obj) {
                if (obj.data.roomsdetails) {
                    if (obj.data.roomsdetails.name) {
                        var results = [];
                        results.push(obj.data.roomsdetails);
                        $scope.room_details = results
                    } else {
                        $scope.room_details = obj.data.roomsdetails
                    }
                }
            })
        };
        $scope.getRatesDetails = function(unit_id) {
            if ($rootScope.rates_details.length == 0) {
                var params = {
                    unit_id: unit_id
                };
                if ($rootScope.yielding == "1") params["use_yielding"] = "yes";
                rpapi.getWithParams("GetPropertyRatesRawData", params).success(function(obj) {
                    if (obj.data.rates.period_begin) {
                        var results = [];
                        results.push(obj.data.rates);
                        $rootScope.rates_details = results
                    } else {
                        $rootScope.rates_details = obj.data.rates
                    }
                    jQuery(".availability-calendar").datepicker("refresh");
                    add_tooltip()
                })
            }
        };
        $scope.getCalendarData = function(unit_id) {
            rpapi.getWithParams("GetPropertyAvailabilityCalendarRawData", {
                unit_id: unit_id
            }).success(function(obj) {
                if (obj.data.blocked_period.startdate) {
                    var results = [];
                    results.push(obj.data.blocked_period);
                    $rootScope.calendar = results
                } else {
                    $rootScope.calendar = obj.data.blocked_period
                }
                add_tooltip();
                $scope.getRatesDetails(unit_id);
                jQuery(".availability-calendar").datepicker("refresh")
            })
        };
        $scope.getCalendarDataNew = function(unit_id) {
            var use_room_type = "no";
            if ($rootScope.roomTypeLogic == "1") {
                use_room_type = "yes"
            }
            rpapi.getWithParams("GetPropertyAvailabilityRawData", {
                unit_id: unit_id,
                use_room_type_logic: use_room_type
            }).success(function(obj) {
                if (obj.data) {
                    $rootScope.calendar2 = obj.data
                }
                add_tooltip();
                $scope.getRatesDetails(unit_id);
                jQuery(".availability-calendar").datepicker("refresh")
            })
        };
        $scope.getPropertyRatesAndStay = function(unit_id) {
            var today = new Date;
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = "0" + dd
            }
            if (mm < 10) {
                mm = "0" + mm
            }
            today = mm + "/" + dd + "/" + yyyy;
            var d = new Date;
            d.setFullYear(yyyy + 1);
            dd = d.getDate();
            mm = d.getMonth() + 1;
            yyyy = d.getFullYear();
            var next_year = mm + "/" + dd + "/" + yyyy;
            var params = {
                unit_id: unit_id,
                startdate: today,
                enddate: next_year
            };
            if ($rootScope.roomTypeLogic == "1") params["use_room_type_logic"] = "yes";
            rpapi.getWithParams("GetPropertyRates", params).success(function(obj) {
                if (obj.data.season) {
                    $rootScope.rates.push(obj.data)
                } else {
                    angular.forEach(obj.data, function(rate, index) {
                        $rootScope.rates.push(rate)
                    })
                }
                jQuery(".availability-calendar").datepicker("refresh");
                add_tooltip()
            })
        };
        $scope.renderCalendar = function(date, checkout) {
            var title = "";
            var booked = false;
            var strClass = "available";
            angular.forEach($rootScope.rates_details, function(rateObj, index) {
                var periodBegin = new Date(rateObj.period_begin);
                var periodEnd = new Date(rateObj.period_end);
                if (date >= periodBegin && date <= periodEnd) {
                    var daysMapping = {
                        Sunday: 0,
                        Monday: 1,
                        Tuesday: 2,
                        Wednesday: 3,
                        Thursday: 4,
                        Friday: 5,
                        Saturday: 6
                    };
                    if (rateObj.daily_first_interval) {
                        var arrInterval = rateObj.daily_first_interval.split("-");
                        title = rateObj.daily_first_interval_price;
                        if (arrInterval.length > 1) {
                            var firstInt = daysMapping[arrInterval[0]];
                            var secondInt = daysMapping[arrInterval[1]];
                            if (secondInt > firstInt) {
                                if (date.getDay() >= firstInt && date.getDay() <= secondInt) {
                                    title = rateObj.daily_first_interval_price
                                } else {
                                    title = rateObj.daily_second_interval_price
                                }
                            } else {
                                if (date.getDay() < firstInt && date.getDay() > secondInt) {
                                    title = rateObj.daily_second_interval_price
                                } else {
                                    title = rateObj.daily_first_interval_price
                                }
                            }
                        } else {
                            title = rateObj.daily_first_interval_price
                        }
                    } else {
                        title = rateObj.season_name
                    }
                }
            });
            angular.forEach($rootScope.calendar, function(calObj, index) {
                var use_slash = false;
                var startdate = new Date(calObj.startdate);
                var enddate = new Date(calObj.enddate);
                if ($rootScope.slash == "1") use_slash = true;
                if (use_slash) {
                    enddate.setTime(enddate.getTime() + 1 * 864e5);
                    if (!checkout) {
                        if (date >= startdate && date <= enddate) {
                            booked = true;
                            strClass = "booked";
                            if (date.getTime() === startdate.getTime()) {
                                if ($rootScope.calendar[index - 1]) {
                                    var previousdate = new Date($rootScope.calendar[index - 1].enddate);
                                    previousdate.setTime(previousdate.getTime() + 1 * 864e5);
                                    if (previousdate.getTime() !== startdate.getTime()) {
                                        booked = true;
                                        strClass = "slashl"
                                    }
                                } else {
                                    booked = true;
                                    strClass = "slashl"
                                }
                            } else if (date.getTime() === enddate.getTime()) {
                                booked = false;
                                strClass = "slashr"
                            }
                        }
                    } else {
                        if (date.getTime() === startdate.getTime()) {
                            if ($rootScope.calendar[index - 1]) {
                                var previousdate = new Date($rootScope.calendar[index - 1].enddate);
                                previousdate.setTime(previousdate.getTime() + 1 * 864e5);
                                if (previousdate.getTime() !== startdate.getTime()) {
                                    booked = false;
                                    strClass = "slashl"
                                } else {
                                    booked = false;
                                    strClass = "booked"
                                }
                            } else {
                                booked = false;
                                strClass = "slashl"
                            }
                        }
                        if (date > startdate && date <= enddate) {
                            booked = true;
                            strClass = "booked";
                            if ($scope.book.checkin) {
                                checkin = new Date($scope.book.checkin);
                                if (date > checkin) {
                                    $scope.maxCalendarDate = date
                                }
                            }
                        }
                    }
                } else {
                    if (!checkout) {
                        if (date >= startdate && date <= enddate) {
                            booked = true;
                            strClass = "booked"
                        }
                    } else {
                        if (date.getTime() === startdate.getTime()) {
                            booked = false;
                            strClass = "available"
                        }
                        if (date > startdate && date <= enddate) {
                            booked = true;
                            strClass = "booked"
                        }
                    }
                }
            });
            if ($rootScope.hideTooltips == 1) {
                title = ""
            }
            return [!booked, strClass, title]
        };
        $scope.renderCalendarNew = function(date, restriction, action) {
            if ($rootScope.calendar2.range) {
                var str_price = "";
                var start_date = new Date($rootScope.calendar2.range.beginDate);
                var end_date = new Date($rootScope.calendar2.range.endDate);
                angular.forEach($rootScope.rates_details, function(rateObj) {
                    var periodBegin = new Date(rateObj.period_begin);
                    var periodEnd = new Date(rateObj.period_end);
                    if (date >= periodBegin && date <= periodEnd) {
                        var daysMapping = {
                            Sunday: 0,
                            Monday: 1,
                            Tuesday: 2,
                            Wednesday: 3,
                            Thursday: 4,
                            Friday: 5,
                            Saturday: 6
                        };
                        if (rateObj.daily_first_interval) {
                            var arrInterval = rateObj.daily_first_interval.split("-");
                            str_price = rateObj.daily_first_interval_price;
                            if (arrInterval.length > 1) {
                                var firstInt = daysMapping[arrInterval[0]];
                                var secondInt = daysMapping[arrInterval[1]];
                                if (secondInt > firstInt) {
                                    if (date.getDay() >= firstInt && date.getDay() <= secondInt) {
                                        str_price = rateObj.daily_first_interval_price
                                    } else {
                                        str_price = rateObj.daily_second_interval_price
                                    }
                                } else {
                                    if (date.getDay() < firstInt && date.getDay() > secondInt) {
                                        str_price = rateObj.daily_second_interval_price
                                    } else {
                                        str_price = rateObj.daily_first_interval_price
                                    }
                                }
                            } else {
                                str_price = rateObj.daily_first_interval_price
                            }
                        } else {
                            str_price = rateObj.season_name
                        }
                    }
                });
                var loop = new Date(start_date);
                var i = 0;
                while (loop <= end_date) {
                    if (date.toDateString() == loop.toDateString()) {
                        var prev_available = $rootScope.calendar2.availability.substring(i - 1, i);
                        var available = $rootScope.calendar2.availability.substring(i, i + 1);
                        var change_over = $rootScope.calendar2.changeOver.substring(i, i + 1);
                        if (available == "Y") {
                            var is_available = true;
                            if (restriction && action == "checkin" && (change_over == "X" || change_over == "O")) {
                                is_available = false
                            } else if (restriction && action == "checkout" && (change_over == "X" || change_over == "I")) {
                                is_available = false
                            } else if (!restriction) {
                                is_available = false
                            }
                            var class_available = prev_available == "N" ? "slash-end available" : "available";
                            return [is_available, class_available, str_price]
                        } else {
                            var class_available = prev_available == "Y" ? "slash-start available" : "booked";
                            var is_available = false;
                            if (prev_available == "Y" && action == "checkout") {
                                is_available = true;
                                class_available = "slash-start available"
                            }
                            return [is_available, class_available, str_price]
                        }
                    }
                    var current_date = loop.setDate(loop.getDate() + 1);
                    loop = new Date(current_date);
                    i++
                }
            }
            return [false, "booked", ""]
        };
        $scope.myShowDaysFunction = function(date) {
            var res = $scope.renderCalendar(date, false);
            return res
        };
        $scope.myShowDaysFunctionCheckout = function(date) {
            var res = $scope.renderCalendar(date, true);
            return res
        };
        $scope.dragEnd = function(search) {
            if ($scope.mapSearchEnabled && !$scope.isFitBounds) {
                var ne = map.getBounds().getNorthEast();
                var sw = map.getBounds().getSouthWest();
                $scope.latNE = ne.lat();
                $scope.longNE = ne.lng();
                $scope.latSW = sw.lat();
                $scope.longSW = sw.lng();
                $scope.availabilitySearch($scope.search, true)
            }
        };
        $scope.isSimplePricing = function(property) {
            return !property.price ? true : false
        };
        $scope.getTotalPrice = function(property, decimals) {
            var price = "N/A";
            if ($rootScope.searchSettings.searchMethod == "GetPropertyAvailabilityWithRatesWordPress") {
                if ($rootScope.searchSettings.priceDisplay == "price" && property.price > 0) {
                    price = $filter("currency")(property.price, undefined, decimals)
                } else {
                    price = $filter("currency")(property.total, undefined, decimals)
                }
            }
            return price
        };
        $scope.getOldPrice = function(property, decimals) {
            var price = "N/A";
            if ($rootScope.searchSettings.searchMethod == "GetPropertyAvailabilityWithRatesWordPress") {
                if ($rootScope.searchSettings.priceDisplay == "price" && property.price > 0) {
                    var total = property.price + property.coupon_discount;
                    price = $filter("currency")(total, undefined, decimals)
                } else {
                    var total = property.total + property.coupon_discount;
                    price = $filter("currency")(total, undefined, decimals)
                }
            }
            return price
        };
        $scope.getReservationPrice = function(property) {
            var price = 0;
            if ($rootScope.searchSettings.searchMethod == "GetPropertyAvailabilityWithRatesWordPress") {
                if ($rootScope.searchSettings.priceDisplay == "price" && property.price > 0) {
                    price = property.price
                } else {
                    price = property.total
                }
            }
            return price
        };
        $scope.getTotalAppend = function(property) {
            if ($rootScope.searchSettings.priceDisplay == "price" && property.total && property.total > 0) {
                return "excluding taxes & fees"
            } else {
                return "including taxes & fees"
            }
        };
        $scope.getSimplePrice = function(price_data, decimals) {
            var priceText = "N/A";
            var diffDays = 0;
            if ($scope.search) {
                var oneDay = 24 * 60 * 60 * 1e3;
                var checkin = new Date($scope.search.start_date);
                var checkout = new Date($scope.search.end_date);
                diffDays = Math.round(Math.abs((checkin.getTime() - checkout.getTime()) / oneDay))
            }
            if ($rootScope.searchSettings.useDailyPricing == 1 && price_data.daily && price_data.daily > 0) {
                var dailyPrice = price_data.daily;
                if (diffDays >= 7 && diffDays < 30 && price_data.weekly > 0) {
                    dailyPrice = price_data.weekly / 7
                }
                if (diffDays >= 30 && price_data.monthly > 0) {
                    dailyPrice = price_data.monthly / 30
                }
                priceText = $filter("currency")(dailyPrice, undefined, decimals)
            } else if ($rootScope.searchSettings.useWeeklyPricing == 1 && price_data.weekly && price_data.weekly > 0) {
                priceText = $filter("currency")(price_data.weekly, undefined, decimals)
            } else if ($rootScope.searchSettings.useMonthlyPricing == 1 && price_data.monthly && price_data.monthly > 0) {
                priceText = $filter("currency")(price_data.monthly, undefined, decimals)
            }
            return priceText
        };
        $scope.getDailyPrice = function(price_data) {
            var price = 0;
            var diffDays = 0;
            if ($scope.search) {
                var oneDay = 24 * 60 * 60 * 1e3;
                var checkin = new Date($scope.search.start_date);
                var checkout = new Date($scope.search.end_date);
                diffDays = Math.round(Math.abs((checkin.getTime() - checkout.getTime()) / oneDay))
            }
            if ($rootScope.searchSettings.useDailyPricing == 1 && price_data.daily && price_data.daily > 0) {
                var dailyPrice = price_data.daily;
                if (diffDays >= 7 && diffDays < 30 && price_data.weekly > 0) {
                    dailyPrice = price_data.weekly / 7
                }
                if (diffDays >= 30 && price_data.monthly > 0) {
                    dailyPrice = price_data.monthly / 30
                }
                price = dailyPrice
            } else if ($rootScope.searchSettings.useWeeklyPricing == 1 && price_data.weekly && price_data.weekly > 0) {
                price = price_data.weekly
            } else if ($rootScope.searchSettings.useMonthlyPricing == 1 && price_data.monthly && price_data.monthly > 0) {
                price = price_data.monthly
            }
            return price
        };
        $scope.getPrependTex = function(price_data) {
            var prependText = "";
            if ($rootScope.searchSettings.useDailyPricing == 1 && price_data.daily && price_data.daily > 0) {
                prependText = $rootScope.searchSettings.dailyPrepend
            } else if ($rootScope.searchSettings.useWeeklyPricing == 1 && price_data.weekly && price_data.weekly > 0) {
                prependText = $rootScope.searchSettings.weeklyPrepend
            } else if ($rootScope.searchSettings.useMonthlyPricing == 1 && price_data.monthly && price_data.monthly > 0) {
                prependText = $rootScope.searchSettings.monthlyPrepend
            }
            return prependText
        };
        $scope.getAppendTex = function(price_data) {
            var appendText = "";
            if ($rootScope.searchSettings.useDailyPricing == 1 && price_data.daily && price_data.daily > 0) {
                appendText = $rootScope.searchSettings.dailyAppend
            } else if ($rootScope.searchSettings.useWeeklyPricing == 1 && price_data.weekly && price_data.weekly > 0) {
                appendText = $rootScope.searchSettings.weeklyAppend
            } else if ($rootScope.searchSettings.useMonthlyPricing == 1 && price_data.monthly && price_data.monthly > 0) {
                appendText = $rootScope.searchSettings.monthlyAppend
            }
            return appendText
        };
        $scope.loadMarker = function(markerData) {
            var myLatlng = new google.maps.LatLng(parseFloat(markerData.latitude), parseFloat(markerData.longitude));
            var price = "";
            if ($scope.method == "GetPropertyAvailabilityWithRatesWordPress") {
                price = $filter("currency")(markerData.price, undefined, 0)
            } else {
                var price = "N/A";
                if ($rootScope.searchSettings.useDailyPricing == 1 && markerData.price.daily && markerData.price.daily > 0) {
                    price = $filter("currency")(markerData.price.daily, undefined, 0)
                } else if ($rootScope.searchSettings.useWeeklyPricing == 1 && markerData.price.weekly && markerData.price.weekly > 0) {
                    price = $filter("currency")(markerData.price.weekly, undefined, 0)
                } else if ($rootScope.searchSettings.useMonthlyPricing == 1 && markerData.price.monthly && markerData.price.monthly > 0) {
                    price = $filter("currency")(markerData.price.monthly, undefined, 0)
                }
            }
            var pin = $templateCache.get("pin.html");
            pin = pin.replace("%price%", price);
            var marker = new RichMarker({
                id: markerData.id,
                map: map,
                title: markerData.name,
                position: myLatlng,
                shadow: "none",
                content: pin
            });
            infowindow = new google.maps.InfoWindow;
            var start_date = "";
            var end_date = "";
            var occupants = "";
            var occupants_small = "";
            var pets = "";
            if ($scope.search) {
                start_date = $scope.search.start_date;
                end_date = $scope.search.end_date;
                occupants = $scope.search.occupants;
                occupants_small = $scope.search.occupants_small;
                pets = $scope.search.pets
            }
            var url = $scope.goToProperty(markerData.seo_page_name, start_date, end_date, occupants, occupants_small, pets);
            google.maps.event.addListener(marker, "click", function(marker) {
                return function() {
                    var content = $templateCache.get("marker.html");
                    content = content.replace(/%name%/g, markerData.name);
                    content = content.replace(/%url%/g, url);
                    content = content.replace(/%image%/g, markerData.image);
                    content = content.replace(/%beds%/g, markerData.beds);
                    content = content.replace(/%baths%/g, markerData.baths);
                    content = content.replace(/%guests%/g, markerData.guests);
                    infowindow.setContent(content);
                    infowindow.open(map, marker)
                }
            }(marker));
            arrMarkers.push(marker)
        };
        $scope.normalIcon = function() {
            return {
                url: "http://1.bp.blogspot.com/_GZzKwf6g1o8/S6xwK6CSghI/AAAAAAAAA98/_iA3r4Ehclk/s1600/marker-green.png"
            }
        };
        $scope.highlightedIcon = function() {
            return {
                url: "http://steeplemedia.com/images/markers/markerGreen.png"
            }
        };
        $scope.highlightIcon = function(unit_id) {
            angular.forEach(arrMarkers, function(item) {
                if (item.id == unit_id) {
                    if (item.getContent()) {
                        item.setContent(item.getContent().replace("arrow_box", "arrow_box_hover"))
                    }
                }
            })
        };
        $scope.restoreIcon = function(unit_id) {
            angular.forEach(arrMarkers, function(item) {
                if (item.id == unit_id) {
                    if (item.getContent()) {
                        item.setContent(item.getContent().replace("arrow_box_hover", "arrow_box"))
                    }
                }
            })
        };
        $scope.setModalCheckin = function(date) {
            $scope.modal_checkin = date
        };
        $scope.resetCalendarPopup = function() {
            $scope.showDays = true;
            $scope.modal_total_reservation = 0;
            $scope.modal_nights = ""
        };
        $scope.setNights = function() {
            var frm = new Date($scope.modal_checkin);
            nts = parseInt($scope.modal_nights);
            var the_year = frm.getFullYear();
            if (the_year < 2e3) the_year = 2e3 + the_year % 100;
            var to = new Date(the_year, frm.getMonth(), frm.getDate() + nts);
            $scope.modal_checkout = to.format("mm/dd/yyyy");
            var booking = {
                checkin: frm.format("mm/dd/yyyy"),
                checkout: to.format("mm/dd/yyyy"),
                unit_id: $scope.propertyId,
                occupants: 1,
                occupants_small: 0,
                pets: 0
            };
            jQuery("#modal_end_date").datepicker("option", "minDate", frm);
            $scope.modal_checkin = frm.format("mm/dd/yyyy");
            $scope.modal_checkout = to.format("mm/dd/yyyy");
            $scope.updatePricePopupCalendar()
        };
        $scope.updatePricePopupCalendar = function() {
            run_waitMe("#myModal .modal-content", "bounce");
            Alert.clear();
            rpapi.getWithParams("VerifyPropertyAvailability", {
                unit_id: $scope.propertyId,
                startdate: $scope.modal_checkin,
                enddate: $scope.modal_checkout,
                occupants: $scope.modal_occupants,
                occupants_small: $scope.modal_occupants_small,
                pets: $scope.modal_pets
            }).success(function(obj) {
                if (obj.status) {
                    $scope.reservation_days = [];
                    $scope.total_reservation = 0;
                    $scope.first_day_price = 0;
                    $scope.rent = 0;
                    $scope.taxes = 0;
                    Alert.add(Alert.errorType, obj.status.description);
                    hide_waitMe("#myModal .modal-content")
                } else {
                    rpapi.getWithParams("GetPreReservationPrice", {
                        unit_id: $scope.propertyId,
                        startdate: $scope.modal_checkin,
                        enddate: $scope.modal_checkout,
                        occupants: $scope.modal_occupants,
                        occupants_small: $scope.modal_occupants_small,
                        pets: $scope.modal_pets
                    }).success(function(obj) {
                        if (obj.data != undefined) {
                            $scope.showDays = false;
                            $scope.modal_total_reservation = obj.data.total;
                            $scope.modal_rent = obj.data.price;
                            $scope.modal_taxes = obj.data.taxes;
                            $scope.modal_coupon_discount = obj.data.coupon_discount;
                            $scope.modal_reservation_days = obj.data.reservation_days;
                            $scope.modal_security_deposits = obj.data.security_deposits;
                            $scope.modal_first_day_price = obj.data.first_day_price;
                            $scope.modal_required_fees = obj.data.required_fees;
                            $scope.modal_taxes_details = obj.data.taxes_details;
                            if (obj.data.reservation_days.date != undefined) {
                                $scope.modal_days = false
                            } else {
                                $scope.modal_days = true
                            }
                            hide_waitMe("#myModal .modal-content")
                        }
                    })
                }
            })
        };
        $scope.setCheckoutDate = function(date) {
            if ($scope.book.checkout) {
                $scope.book.checkout = date.format("mm/dd/yyyy")
            }
        };
        $scope.resetInquiry = function(inquiry) {
            $scope.inquiry.unit_id = 0;
            $scope.inquiry.startDate = "";
            $scope.inquiry.endDate = "";
            $scope.inquiry.email = "";
            $scope.inquiry.occupants = "";
            $scope.inquiry.occupantsSmall = "";
            $scope.inquiry.first_name = "";
            $scope.inquiry.last_name = "";
            $scope.inquiry.phone = "";
            $scope.inquiry.message = "";
            $scope.resortpro_inquiry.$setPristine();
            $scope.resortpro_inquiry.$setUntouched();
            $scope.alerts = []
        };
        $scope.resetFavorites = function(favorites) {
            $scope.favorites.unit_id = 0;
            $scope.favorites.startDate = "";
            $scope.favorites.endDate = "";
            $scope.favorites.email = "";
            $scope.favorites.occupants = "";
            $scope.favorites.occupantsSmall = "";
            $scope.favorites.first_name = "";
            $scope.favorites.last_name = "";
            $scope.favorites.phone = "";
            $scope.favorites.message = "";
            $scope.resortpro_save_fav.$setPristine();
            $scope.resortpro_save_fav.$setUntouched()
        };
        $scope.setUnitForInquiry = function(unit_id) {
            if (typeof $scope.inquiry == "undefined") {
                $scope.inquiry = {}
            }
            $scope.inquiry.unit_id = unit_id
        };
        $scope.validateFavorites = function(favorites) {
            var error = false;
            if ($scope.resortpro_save_fav.favorites_email.$error.required && $scope.resortpro_save_fav.favorites_phone.$error.required) {
                error = true
            }
            if ($scope.resortpro_save_fav.favorites_first_name.$error.required || $scope.resortpro_save_fav.favorites_last_name.$error.required || $scope.resortpro_save_fav.favorites_startdate.$error.required || $scope.resortpro_save_fav.favorites_enddate.$error.required) {
                error = true
            }
            if (!error) {
                $scope.saveFavorites(favorites)
            }
        };
        $scope.validateInquiry = function(inquiry, popup) {
        	var reg = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
            var regphone = /^\d+$/;
            var error = false;
            if(regphone.test($scope.resortpro_inquiry.inquiry_phone.$modelValue) == false){
            	error = true;
            }
            if (reg.test($scope.resortpro_inquiry.inquiry_email.$modelValue) == false) 
            {
            	error = true
            }
            if ($scope.resortpro_inquiry.inquiry_email.$error.required && $scope.resortpro_inquiry.inquiry_phone.$error.required ) {
                error = true
            }
            if ($scope.resortpro_inquiry.inquiry_first_name.$error.required || $scope.resortpro_inquiry.inquiry_last_name.$error.required || $scope.resortpro_inquiry.inquiry_startdate.$error.required || $scope.resortpro_inquiry.inquiry_enddate.$error.required) {
                error = true
            }
            if (!error) {
                $scope.propertyInquiry(inquiry, popup)
            }
        };
        $scope.loadFavorites = function() {
            $scope.loading = true;
            var fav_ids = $cookies.getObject("streamline-favorites");
            if (fav_ids) {
                var params = {
                    include_units: fav_ids.join()
                };
                rpapi.getWithParams("GetPropertyListWordPress", params).success(function(obj) {
                    $scope.loading = false;
                    if (obj.data.property.id) {
                        $scope.favoritesObj = [];
                        $scope.favoritesObj.push(obj.data.property)
                    } else {
                        $scope.favoritesObj = Object.keys(obj.data.property).map(function(key) {
                            return obj.data.property[key]
                        })
                    }
                })
            } else {
                $scope.favoritesObj = []
            }
        };
        $scope.checkFavorites = function(property) {
            var favorites = $cookies.getObject("streamline-favorites");
            var found = false;
            if (favorites) {
                angular.forEach(favorites, function(value, key) {
                    if (property.id == value) {
                        found = true
                    }
                })
            }
            return found
        };
        $scope.removeFromFavorites = function(property) {
            if (confirm("Are you sure you want to remove unit " + property.name + " " +"from Favourites")) {
                var favorites = $cookies.getObject("streamline-favorites");
                if (favorites) {
                    angular.forEach(favorites, function(value, key) {
                        if (property.id == value) {
                            favorites.splice(key, 1)
                        }
                    });
                    angular.forEach($scope.favoritesObj, function(prop, key) {
                        if (property.id == prop.id) {
                            $scope.favoritesObj.splice(key, 1)
                        }
                    });
                    if (favorites.length == 0) {
                        $cookies.remove("streamline-favorites", {
                            path: "/"
                        });
                        $scope.wishlist = []
                    } else {
                        $scope.wishlist = favorites;
                        $cookies.putObject("streamline-favorites", favorites, {
                            path: "/"
                        })
                    }
                }
            }
        };
        $scope.addToFavorites = function(property) {
            var favorites = $cookies.getObject("streamline-favorites");
            if (favorites) {
                var foundUnit = false;
                angular.forEach(favorites, function(value, key) {
                    if (property.id == value) {
                        foundUnit = true
                    }
                });
                favorites.push(property.id)
            } else {
                favorites = [];
                favorites.push(property.id)
            }
            var now = new Date;
            now.setDate(now.getDate() + 30);
            $scope.wishlist = favorites;
            $cookies.putObject("streamline-favorites", favorites, {
                path: "/",
                expires: now
            })
        };
        $scope.changeToListView = function() {
        	jQuery("body").removeClass("headerfixed");
        	jQuery('.filter-btn').addClass("d-md-block");
        	jQuery(".filter-menu-show").removeClass("d-none");
            $scope.enabledlistview = "true";
            $scope.currentView = "listview";
            $scope.view = "listview";
            $scope.showload = true;
            var now = new Date();
            $scope.setCookie("view", "listview", 1);
            jQuery('.loadmore').show();
            jQuery(".listings_wrapper_box").hide();
            jQuery(".map-container-wrapper").hide();
            jQuery(".list-container-wrapper").show();
            jQuery(".sorting").removeClass("d-none");
            jQuery('.filtersec').removeClass("d-none");
            jQuery(".sorting").addClass("d-inline-flex");
            jQuery(".show_list_name").show();
            jQuery(".show_grid_name").hide();
            jQuery(".show_map_name").hide();
            jQuery(".streamline-pagination-wrapper").show()
        };
        $scope.changeToGridView = function() {
        	jQuery("body").removeClass("headerfixed");
        	jQuery('.filter-btn').addClass("d-md-block");
        	jQuery(".filter-menu-show").removeClass("d-none");
            $scope.enabledlistview = "false";
            $scope.currentView = "gridview";
            $scope.view = "gridview";
            $scope.showload = true;
            var now = new Date();
            $scope.setCookie("view", "gridview", 1);
            jQuery('.loadmore').show();
            jQuery(".listings_wrapper_box").show();
            jQuery(".list-container-wrapper").hide();
            jQuery(".map-container-wrapper").hide();
            jQuery('.filtersec').removeClass("d-none");
            jQuery(".sorting").removeClass("d-none");
            jQuery(".sorting").addClass("d-inline-flex");
            jQuery(".show_list_name").hide();
            jQuery(".show_map_name").hide();
            jQuery(".show_grid_name").show();
            jQuery(".streamline-pagination-wrapper").show()
        };
        $scope.changeToMapView = function() {
            $scope.enabledlistview = "false";
            $scope.currentView = "mapview";
            $scope.view = "mapview";
            $scope.showload = false;
            jQuery('.filter-btn').removeClass("d-md-block");
            jQuery(".filter-menu-show").addClass("d-none");
            var now = new Date();
            $scope.setCookie("view", "mapview", 1);
            jQuery('.loadmore').hide();
            jQuery('.filtersec').addClass("d-none");
            jQuery(".sorting").addClass("d-none");
            jQuery(".sorting").removeClass("d-inline-flex");
            jQuery(".map-container-wrapper").show();
            jQuery(".listings_wrapper_box").hide();
            jQuery(".list-container-wrapper").hide();
            jQuery(".show_list_name").hide();
            jQuery(".show_grid_name").hide();
            jQuery(".show_map_name").show();
            jQuery(".streamline-pagination-wrapper").hide();
            window.dispatchEvent(new Event('resize'));
        };
        $scope.loadRecents = function() {
            $scope.load = true;
            var recent_ids = $cookies.getObject("streamline-recents");
            var params = {
                include_units: recent_ids.join()
            };
            rpapi.getWithParams("GetPropertyListWordPress", params).success(function(obj) {
                $scope.load = false;
                if (obj.data.property) {
                    if (obj.data.property.id) {
                        $scope.recentsObj = [];
                        $scope.recentsObj.push(obj.data.property)
                    } else {
                        $scope.recentsObj = Object.keys(obj.data.property).map(function(key) {
                            return obj.data.property[key]
                        })
                    }
                }
            })
        };
        $scope.addToRecents = function(property) {
            var recents = $cookies.getObject("streamline-recents");
            if (recents) {
                var foundUnit = false;
                angular.forEach(recents, function(value, key) {
                    if (property.id == value) {
                        foundUnit = true
                    }
                });
                if (!foundUnit) {
                    recents.unshift(property.id)
                }
                if (recents.length > 3) {
                    recents.pop()
                }
            } else {
                recents = [];
                recents.push(property.id)
            }
            var now = new Date;
            now.setDate(now.getDate() + 30);
            $scope.recentProp = recents;
            $cookies.putObject("streamline-recents", recents, {
                path: "/",
                expires: now
            })
        };
        $scope.propertyInquiry = function(inquiry, popup) {
            run_waitMe("#myModal2 .modal-dialog, #inquiry_box", "bounce", "Please wait, sending inquiry...");
            setTimeout(function() {
                var params = {
                    unit_id: inquiry.unit_id,
                    not_blocked_request: "yes",
                    startdate: inquiry.startDate,
                    enddate: inquiry.endDate,
                    occupants: inquiry.occupants,
                    occupants_small: inquiry.occupantsSmall,
                    first_name: inquiry.first_name,
                    last_name: inquiry.last_name,
                    email: inquiry.email,
                    mobile_phone: inquiry.phone,
                    extra_notes: inquiry.message,
                    pets: inquiry.pets,
                    disable_minimal_days: "yes"
                };
                if ($rootScope.bookingSettings.hearedAboutId && $rootScope.bookingSettings.hearedAboutId > 0) {
                    params["hear_about_id"] = $rootScope.bookingSettings.hearedAboutId
                }
                rpapi.getWithParams("MakeReservation", params).success(function(obj) {
                    hide_waitMe("#myModal2 .modal-dialog, #inquiry_box");
                    if (obj.status) {
                        Alert.add(Alert.errorType, obj.status.description)
                    } else {
                        $scope.resetInquiry();
                        if ($rootScope.bookingSettings && $rootScope.bookingSettings.inquiryThankUrl != "") {
                            $window.location.href = $rootScope.bookingSettings.inquiryThankUrl
                        } else {
                            Alert.add(Alert.successType, $rootScope.bookingSettings.inquiryThankMsg);
                            alert("Thanks for your enquiry! Your enquiry has been sent");
                            jQuery("#resortpro_btn_inquiry").prop("disabled", true);
                            if (popup) {
                                jQuery("#myModal2").modal("hide")
                            }
                        }
                    }
                })
            }, 500);
            return false
        };
        $scope.saveFavorites = function(favorites) {
            run_waitMe("#modalFav .modal-dialog, #inquiry_box", "bounce", "Please wait, saving favorites...");
            setTimeout(function() {
                var unit_id = 0;
                var str_favorites = "";
                angular.forEach($scope.favoritesObj, function(prop, key) {
                    if (unit_id == 0) {
                        unit_id = prop.id
                    }
                    str_favorites += prop.name + ",\n\r"
                });
                var params = {
                    unit_id: unit_id,
                    not_blocked_request: "yes",
                    startdate: favorites.startDate,
                    enddate: favorites.endDate,
                    occupants: 1,
                    occupants_small: 0,
                    first_name: favorites.first_name,
                    last_name: favorites.last_name,
                    email: favorites.email,
                    favorites: favorites.phone,
                    extra_notes: "Comments: " + favorites.message + ". Favorite Units: \n\r" + str_favorites,
                    pets: 0,
                    disable_minimal_days: "yes"
                };
                rpapi.getWithParams("MakeReservation", params).success(function(obj) {
                    hide_waitMe("#modalFav .modal-dialog, #inquiry_box");
                    if (obj.status) {
                        Alert.add(Alert.errorType, obj.status.description)
                    } else {
                        $scope.resetFavorites();
                        Alert.add(Alert.successType, "Favorites saved successfully");
                        setTimeout(function() {
                            jQuery("#modalFav").modal("hide")
                        }, 3e3)
                    }
                })
            }, 500);
            return false
        };
        $scope.loadCompare = function() {
            $scope.loading = true;
            var compare_ids = $cookies.getObject("streamline-compare-units");
            if (compare_ids) {
                var params = {
                    include_units: compare_ids.join(),
                    additional_variables: 1
                };
                var cmp_amenity = {};
                rpapi.getWithParams("GetPropertyListWordPress", params).success(function(obj) {
                    $scope.loading = false;
                    angular.forEach(obj.data.property, function(value, property) {
                        if (value.unit_amenities !== null) {
                            angular.forEach(value.unit_amenities.amenity, function(amenity, key) {
                                if ($scope.compareAmenities != "undefined" && amenity.amenity_show_on_website == "yes") {
                                    if (property === 0) {
                                        cmp_amenity[amenity.amenity_name] = [{
                                            name: amenity.amenity_name
                                        }, {
                                            prop1: 1
                                        }, {
                                            prop2: 0
                                        }, {
                                            prop3: 0
                                        }]
                                    }
                                    if (property !== 0) {
                                        if (amenity.amenity_name in cmp_amenity) {
                                            if (property === 1) {
                                                cmp_amenity[amenity.amenity_name][2].prop2 = 1
                                            } else {
                                                cmp_amenity[amenity.amenity_name][3].prop3 = 1
                                            }
                                        } else {
                                            if (property === 1) {
                                                cmp_amenity[amenity.amenity_name] = [{
                                                    name: amenity.amenity_name
                                                }, {
                                                    prop1: 0
                                                }, {
                                                    prop2: 1
                                                }, {
                                                    prop3: 0
                                                }]
                                            } else {
                                                cmp_amenity[amenity.amenity_name] = [{
                                                    name: amenity.amenity_name
                                                }, {
                                                    prop1: 0
                                                }, {
                                                    prop2: 0
                                                }, {
                                                    prop3: 1
                                                }]
                                            }
                                        }
                                    }
                                }
                            })
                        }
                    });
                    if (obj.data.property.id) {
                        $scope.compareObj = [];
                        $scope.compareObj.push(obj.data.property)
                    } else {
                        $scope.compareObj = Object.keys(obj.data.property).map(function(key) {
                            obj.data.property[key].compareAmenities = cmp_amenity;
                            return obj.data.property[key]
                        })
                    }
                })
            } else {
                return false
            }
        };
        $scope.checkCompare = function(property) {
            var compare = $cookies.getObject("streamline-compare-units");
            var found = false;
            if (compare) {
                angular.forEach(compare, function(value, key) {
                    if (property.id == value) {
                        found = true
                    }
                })
            }
            return found
        };
        $scope.removeFromCompare = function(property) {
            var compare = $cookies.getObject("streamline-compare-units");
            if (compare) {
                angular.forEach(compare, function(value, key) {
                    if (property.id == value) {
                        compare.splice(key, 1)
                    }
                });
                if (compare.length == 0) {
                    $cookies.remove("streamline-compare-units", {
                        path: "/"
                    })
                } else {
                    $cookies.putObject("streamline-compare-units", compare, {
                        path: "/"
                    })
                }
            }
            if (window.location.pathname == "/compare/") {
                if (compare.length == 2) {
                    $window.location.href = "/compare"
                }
                if (compare.length == 1) {
                    $window.location.href = "/search-results"
                }
            }
        };
        $scope.addToCompare = function(property) {
            var compare = $cookies.getObject("streamline-compare-units");
            if (compare) {
                var foundUnit = false;
                angular.forEach(compare, function(value, key) {
                    if (property.id == value) {
                        foundUnit = true
                    }
                    if (compare.length >= 3) {
                        compare.splice(key, 1)
                    }
                });
                compare.push(property.id)
            } else {
                compare = [];
                compare.push(property.id)
            }
            var now = new Date;
            now.setDate(now.getDate() + 30);
            $cookies.putObject("streamline-compare-units", compare, {
                path: "/",
                expires: now
            });
            if (compare.length == 3) {
                $window.location.href = "/compare"
            }
        };

        $scope.editSearch = function(){
            jQuery("#search_start_date_single").val(jQuery('.checkinspan').html());
            jQuery("#search_end_date_single").val(jQuery('.checkoutspan').html());
            jQuery("#search_start_date_single").trigger("input");
            jQuery("#search_end_date_single").trigger("input");
            jQuery('html, body').animate({
                scrollTop: jQuery("#sidebar").offset().top-150
            });
        }

        $scope.readyToCompare = function(property) {
            var compare = $cookies.getObject("streamline-compare-units");
            var comparing = 3;
            if (compare) {
                if (compare.length == 1) comparing = 2;
                if (compare.length == 2) comparing = 1;
                if (compare.length == 3) {
                    comparing = 0
                }
            }
            return comparing
        };
        $scope.clearCompare = function(property) {
            $cookies.remove("streamline-compare-units", {
                path: "/"
            })
        };
        $scope.isMobile = function() {
            if (window.innerWidth <= 600 && window.innerHeight <= 900) {
                return true
            } else {
                return false
            }
        };
        $scope.$watch($scope.isMobile, function() {}, true);
        angular.element($window).bind("orientationchange", function() {
            $scope.$apply()
        })
    }])
})();
(function() {
    var app = angular.module("resortpro.services", []);
    app.service("streamlineService", function(rpapi, $q) {
        this.getPreReservationPrice = function(params) {
            return rpapi.getWithParams("GetPreReservationPrice", params).then(function(response) {
                return response.data
            }, function(error) {
                return error
            })
        };
        this.getReservationPrice = function(params) {
            return rpapi.getWithParams("GetReservationPrice", params).then(function(response) {
                return response.data
            }, function(error) {
                return error
            })
        };
        this.getReservationInfo = function(confirmation_id) {
            return rpapi.getWithParams("GetReservationPrice", {
                confirmation_id: confirmation_id
            }).then(function(response) {
                return response.data
            }, function(error) {
                return error
            })
        };
        this.verifyPropertyAvailability = function(startdate, enddate, unit_id, occupants, occupants_small, pets, use_room_type) {
            return rpapi.getWithParams("VerifyPropertyAvailability", {
                unit_id: unit_id,
                startdate: startdate,
                enddate: enddate,
                occupants: occupants,
                occupants_small: occupants_small,
                pets: pets,
                use_room_type_logic: use_room_type
            }).then(function(response) {
                return response.data
            }, function(error) {
                return error
            })
        };
        this.getPropertyInfo = function(unit_id) {
            return rpapi.getWithParams("GetPropertyInfo", {
                unit_id: unit_id
            }).then(function(obj) {
                var response = obj.data;
                return response
            }, function(error) {
                return error
            })
        };
        this.getPropertyRoomsDetailsRawData = function(unit_id) {
            return rpapi.getWithParams("GetPropertyRoomsDetailsRawData", {
                unit_id: unit_id
            }).then(function(obj) {
                var result = [];
                var response = obj.data.data;
                if (response) {
                    if (response.roomsdetails.name) {
                        result.push(response.roomsdetails)
                    } else {
                        result = response.roomsdetails
                    }
                }
                return result
            }, function(error) {
                return error
            })
        };
        this.getPropertyRatesRawData = function(unit_id, use_yielding) {
            return rpapi.getWithParams("GetPropertyRatesRawData", {
                unit_id: unit_id,
                use_yielding: use_yielding
            }).then(function(obj) {
                var result = [];
                var response = obj.data.data;
                if (response) {
                    if (response.rates.period_begin) {
                        result.push(response.rates)
                    } else {
                        result = response.rates
                    }
                }
                return result
            }, function(error) {
                return error
            })
        };
        this.getPropertyFeedbacks = function(unit_id) {
            return rpapi.getWithParams("GetPropertyFeedbacks", {
                unit_id: unit_id
            }).then(function(obj) {
                var result = [];
                var response = obj.data.data;
                if (response) {
                    if (response.feedbacks.guest_name) {
                        result.push(response.feedbacks)
                    } else {
                        result = response.feedbacks
                    }
                }
                return result
            }, function(error) {
                return error
            })
        };
        this.getPropertyAvailabilityCalendarRawData = function(unit_id) {
            return rpapi.getWithParams("GetPropertyAvailabilityCalendarRawData", {
                unit_id: unit_id
            }).then(function(obj) {
                var result = [];
                var response = obj.data.data;
                if (response) {
                    if (response.blocked_period.startdate) {
                        result.push(response.blocked_period)
                    } else {
                        result = response.blocked_period
                    }
                }
                return result
            }, function(error) {
                return error
            })
        };
        this.makeReservation = function(params) {
            return rpapi.getWithParams("MakeReservation", params).then(function(obj) {
                var result = [];
                var response = obj.data;
                return response
            }, function(error) {
                return error
            })
        }
    });
    app.factory("beforeUnload", function($rootScope, $window) {
        $window.onbeforeunload = function(e) {
            var confirmation = {};
            var event = $rootScope.$broadcast("onBeforeUnload", confirmation);
            if (event.defaultPrevented) {
                return confirmation.message
            }
        };
        $window.onunload = function() {
            $rootScope.$broadcast("onUnload")
        };
        return {}
    }).run(function(beforeUnload) {})
})();
(function() {
    var app = angular.module("resortpro.services");
    app.service("Alert", function($rootScope, $timeout) {
        $rootScope.alerts = [];
        this.clear = function() {
            $rootScope.alerts = []
        };
        this.add = function(type, message) {
            var alert = {
                type: type,
                message: message,
                timestamp: Date.now()
            };
            $rootScope.alerts.push(alert)
        };
        this.errorType = "danger", this.errorMessage = "Sorry, there was an error while processing your request.";
        this.successType = "success", this.successMessage = "Saved successfully.";
        this.infoType = "info", this.successMessage = "Sent successfully."
    })
})();
(function() {
    var app = angular.module("resortpro.services");
    app.factory("rpapi", function($http, $rootScope) {
        return {
            get: function(method) {
                var request = {};
                var params = {};
                var use_tokens = false;
                if ($rootScope.companyCode) {
                    params.company_code = $rootScope.companyCode
                } else {
                    use_tokens = true
                }
                request.methodName = method;
                request.params = params;
                var _obj = JSON.stringify(request);
                $http.defaults.useXDomain = true;
                if (use_tokens) {
                    var data = {
                        action: "streamlinecore-api-request",
                        params: request
                    };
                    return $http({
                        method: "POST",
                        headers: {
                            "Content-type": "application/json"
                        },
                        url: streamlinecoreConfig.ajaxUrl,
                        params: data
                    })
                } else {
                    return $http.post($rootScope.APIServer, JSON.stringify(request))
                }
            },
            getWithParams: function(method, params) {
                var request = {};
                var use_tokens = false;
                request.methodName = method;
                if ($rootScope.companyCode) {
                    params.company_code = $rootScope.companyCode
                } else {
                    use_tokens = true
                }
                request.params = params;
                var _obj = JSON.stringify(request);
                $http.defaults.useXDomain = true;
                delete $http.defaults.headers.common["X-Requested-With"];
                if (use_tokens) {
                    var data = {
                        action: "streamlinecore-api-request",
                        params: request
                    };
                    return $http({
                        method: "POST",
                        headers: {
                            "Content-type": "application/json"
                        },
                        url: streamlinecoreConfig.ajaxUrl,
                        params: data
                    })
                } else {
                    return $http.post($rootScope.APIServer, JSON.stringify(request))
                }
            },
            getWpActionWithParams: function(action, params) {
                var data = {
                    action: action
                };
                for (var propertyName in params) {
                    data[propertyName] = params[propertyName]
                }
                return $http({
                    method: "POST",
                    headers: {
                        "Content-type": "application/json"
                    },
                    url: streamlinecoreConfig.ajaxUrl,
                    params: data
                })
            }
        }
    });
    app.factory("rpuri", function($http, $rootScope) {
        return {
            getQueryStringParam: function(sParam) {
                var sPageUrl = window.location.search.substring(1);
                var sURLVariables = sPageUrl.split("&");
                for (var i = 0; i < sURLVariables.length; i++) {
                    var sParameterName = sURLVariables[i].split("=");
                    if (sParameterName[0] == sParam) {
                        return sParameterName[1]
                    }
                }
            }
        }
    })
})();