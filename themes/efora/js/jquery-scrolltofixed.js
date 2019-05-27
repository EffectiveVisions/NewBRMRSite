!function(C){C.isScrollToFixed=function(o){return!!C(o).data("ScrollToFixed")},C.ScrollToFixed=function(o,i){var s=this;s.$el=C(o),s.el=o,s.$el.data("ScrollToFixed",s);var l,r,e,t,d=!1,c=s.$el,p=0,x=0,f=-1,a=-1,n=null;function u(){var o=s.options.limit;return o?"function"==typeof o?o.apply(c):o:0}function F(){return"fixed"===l}function g(){return"absolute"===l}function T(){return!(F()||g())}function S(){if(!F()){var o=c[0].getBoundingClientRect();n.css({display:c.css("display"),width:o.width,height:o.height,float:c.css("float")}),cssOptions={"z-index":s.options.zIndex,position:"fixed",top:-1==s.options.bottom?h():"",bottom:-1==s.options.bottom?"":s.options.bottom,"margin-left":"0px"},s.options.dontSetWidth||(cssOptions.width=c.css("width")),c.css(cssOptions),c.addClass(s.options.baseClassName),s.options.className&&c.addClass(s.options.className),l="fixed"}}function b(){var o=u(),i=x;s.options.removeOffsets&&(i="",o-=p),cssOptions={position:"absolute",top:o,left:i,"margin-left":"0px",bottom:""},s.options.dontSetWidth||(cssOptions.width=c.css("width")),c.css(cssOptions),l="absolute"}function m(){T()||(a=-1,n.css("display","none"),c.css({"z-index":t,width:"",position:r,left:"",top:e,"margin-left":""}),c.removeClass("scroll-to-fixed-fixed"),s.options.className&&c.removeClass(s.options.className),l=null)}function w(o){o!=a&&(c.css("left",x-o),a=o)}function h(){var o=s.options.marginTop;return o?"function"==typeof o?o.apply(c):o:0}function v(){if(C.isScrollToFixed(c)&&!c.is(":hidden")){var o=d,i=T();d?T()&&(p=c.offset().top,x=c.offset().left):(c.trigger("preUnfixed.ScrollToFixed"),m(),c.trigger("unfixed.ScrollToFixed"),a=-1,p=c.offset().top,x=c.offset().left,s.options.offsets&&(x+=c.offset().left-c.position().left),-1==f&&(f=x),l=c.css("position"),d=!0,-1!=s.options.bottom&&(c.trigger("preFixed.ScrollToFixed"),S(),c.trigger("fixed.ScrollToFixed")));var e=C(window).scrollLeft(),t=C(window).scrollTop(),n=u();s.options.minWidth&&C(window).width()<s.options.minWidth?T()&&o||(U(),c.trigger("preUnfixed.ScrollToFixed"),m(),c.trigger("unfixed.ScrollToFixed")):s.options.maxWidth&&C(window).width()>s.options.maxWidth?T()&&o||(U(),c.trigger("preUnfixed.ScrollToFixed"),m(),c.trigger("unfixed.ScrollToFixed")):-1==s.options.bottom?0<n&&t>=n-h()?i||g()&&o||(U(),c.trigger("preAbsolute.ScrollToFixed"),b(),c.trigger("unfixed.ScrollToFixed")):t>=p-h()?(F()&&o||(U(),c.trigger("preFixed.ScrollToFixed"),S(),a=-1,c.trigger("fixed.ScrollToFixed")),w(e)):T()&&o||(U(),c.trigger("preUnfixed.ScrollToFixed"),m(),c.trigger("unfixed.ScrollToFixed")):0<n?t+C(window).height()-c.outerHeight(!0)>=n-(h()||-(s.options.bottom?s.options.bottom:0))?F()&&(U(),c.trigger("preUnfixed.ScrollToFixed"),"absolute"===r?b():m(),c.trigger("unfixed.ScrollToFixed")):(F()||(U(),c.trigger("preFixed.ScrollToFixed"),S()),w(e),c.trigger("fixed.ScrollToFixed")):w(e)}}function U(){var o=c.css("position");"absolute"==o?c.trigger("postAbsolute.ScrollToFixed"):"fixed"==o?c.trigger("postFixed.ScrollToFixed"):c.trigger("postUnfixed.ScrollToFixed")}var z=function(o){c.is(":visible")?(d=!1,v()):m()},A=function(o){window.requestAnimationFrame?requestAnimationFrame(v):v()};s.init=function(){s.options=C.extend({},C.ScrollToFixed.defaultOptions,i),t=c.css("z-index"),s.$el.css("z-index",s.options.zIndex),n=C("<div />"),l=c.css("position"),r=c.css("position"),c.css("float"),e=c.css("top"),T()&&s.$el.after(n),C(window).bind("resize.ScrollToFixed",z),C(window).bind("scroll.ScrollToFixed",A),"ontouchmove"in window&&C(window).bind("touchmove.ScrollToFixed",v),s.options.preFixed&&c.bind("preFixed.ScrollToFixed",s.options.preFixed),s.options.postFixed&&c.bind("postFixed.ScrollToFixed",s.options.postFixed),s.options.preUnfixed&&c.bind("preUnfixed.ScrollToFixed",s.options.preUnfixed),s.options.postUnfixed&&c.bind("postUnfixed.ScrollToFixed",s.options.postUnfixed),s.options.preAbsolute&&c.bind("preAbsolute.ScrollToFixed",s.options.preAbsolute),s.options.postAbsolute&&c.bind("postAbsolute.ScrollToFixed",s.options.postAbsolute),s.options.fixed&&c.bind("fixed.ScrollToFixed",s.options.fixed),s.options.unfixed&&c.bind("unfixed.ScrollToFixed",s.options.unfixed),s.options.spacerClass&&n.addClass(s.options.spacerClass),c.bind("resize.ScrollToFixed",function(){n.height(c.height())}),c.bind("scroll.ScrollToFixed",function(){c.trigger("preUnfixed.ScrollToFixed"),m(),c.trigger("unfixed.ScrollToFixed"),v()}),c.bind("detach.ScrollToFixed",function(o){var i;(i=(i=o)||window.event).preventDefault&&i.preventDefault(),i.returnValue=!1,c.trigger("preUnfixed.ScrollToFixed"),m(),c.trigger("unfixed.ScrollToFixed"),C(window).unbind("resize.ScrollToFixed",z),C(window).unbind("scroll.ScrollToFixed",A),c.unbind(".ScrollToFixed"),n.remove(),s.$el.removeData("ScrollToFixed")}),z()},s.init()},C.ScrollToFixed.defaultOptions={marginTop:0,limit:0,bottom:-1,zIndex:1e3,baseClassName:"scroll-to-fixed-fixed"},C.fn.scrollToFixed=function(o){return this.each(function(){new C.ScrollToFixed(this,o)})}}(jQuery);