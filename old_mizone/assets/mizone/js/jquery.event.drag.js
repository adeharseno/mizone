;(function($){$.fn.drag=function(str,arg,opts){var type=typeof str=="string"?str:"",fn=$.isFunction(str)?str:$.isFunction(arg)?arg:null;if(type.indexOf("drag")!==0)
type="drag"+type;opts=(str==fn?arg:opts)||{};return fn?this.bind(type,opts,fn):this.trigger(type);};var $event=$.event,$special=$event.special,drag=$special.drag={defaults:{which:1,distance:0,not:':input',handle:null,relative:false,drop:true,click:false,axis:null},datakey:"dragdata",noBubble:true,add:function(obj){var data=$.data(this,drag.datakey),opts=obj.data||{};data.related+=1;$.each(drag.defaults,function(key,def){if(opts[key]!==undefined)
data[key]=opts[key];});},remove:function(){$.data(this,drag.datakey).related-=1;},setup:function(){if($.data(this,drag.datakey))
return;var data=$.extend({related:0},drag.defaults);$.data(this,drag.datakey,data);$event.add(this,"touchstart mousedown",drag.init,data);if(this.attachEvent)
this.attachEvent("ondragstart",drag.dontstart);},teardown:function(){var data=$.data(this,drag.datakey)||{};if(data.related)
return;$.removeData(this,drag.datakey);$event.remove(this,"touchstart mousedown",drag.init);drag.textselect(true);if(this.detachEvent)
this.detachEvent("ondragstart",drag.dontstart);},init:function(event){if(drag.touched)
return;var dd=event.data,results;if(event.which!=0&&dd.which>0&&event.which!=dd.which)
return;if($(event.target).is(dd.not))
return;if(dd.handle&&!$(event.target).closest(dd.handle,event.currentTarget).length)
return;drag.touched=event.type=='touchstart'?this:null;dd.propagates=1;dd.mousedown=this;dd.interactions=[drag.interaction(this,dd)];dd.target=event.target;dd.pageX=event.pageX;dd.pageY=event.pageY;dd.dragging=null;results=drag.hijack(event,"draginit",dd);if(!dd.propagates)
return;results=drag.flatten(results);if(results&&results.length){dd.interactions=[];$.each(results,function(){dd.interactions.push(drag.interaction(this,dd));});}
dd.propagates=dd.interactions.length;if(dd.drop!==false&&$special.drop)
$special.drop.handler(event,dd);drag.textselect(false);if(drag.touched)
$event.add(drag.touched,"touchmove touchend",drag.handler,dd);else
$event.add(document,"mousemove mouseup",drag.handler,dd);if(!drag.touched||dd.live)
return false;},interaction:function(elem,dd){var offset=$(elem)[dd.relative?"position":"offset"]()||{top:0,left:0};return{drag:elem,callback:new drag.callback(),droppable:[],offset:offset};},handler:function(event){var dd=event.data;switch(event.type){case!dd.dragging&&'touchmove':if(dd.axis==='x'){if(Math.abs(event.pageX-dd.pageX)>=Math.abs(event.pageY-dd.pageY)){event.preventDefault();}}
else if(dd.axis==='y'){if(Math.abs(event.pageX-dd.pageX)<=Math.abs(event.pageY-dd.pageY)){event.preventDefault();}}
else{event.preventDefault();}
case!dd.dragging&&'mousemove':if(Math.pow(event.pageX-dd.pageX,2)+Math.pow(event.pageY-dd.pageY,2)<Math.pow(dd.distance,2))
break;event.target=dd.target;drag.hijack(event,"dragstart",dd);if(dd.propagates)
dd.dragging=true;case'touchmove':case'mousemove':if(dd.dragging){drag.hijack(event,"drag",dd);if(dd.propagates){if(dd.drop!==false&&$special.drop)
$special.drop.handler(event,dd);break;}
event.type="mouseup";}
case'touchend':case'mouseup':default:if(drag.touched)
$event.remove(drag.touched,"touchmove touchend",drag.handler);else
$event.remove(document,"mousemove mouseup",drag.handler);if(dd.dragging){if(dd.drop!==false&&$special.drop)
$special.drop.handler(event,dd);drag.hijack(event,"dragend",dd);}
drag.textselect(true);if(dd.click===false&&dd.dragging)
$.data(dd.mousedown,"suppress.click",new Date().getTime()+5);dd.dragging=drag.touched=false;break;}},hijack:function(event,type,dd,x,elem){if(!dd)
return;var orig={event:event.originalEvent,type:event.type},mode=type.indexOf("drop")?"drag":"drop",result,i=x||0,ia,$elems,callback,len=!isNaN(x)?x:dd.interactions.length;event.type=type;event.originalEvent=null;dd.results=[];do if(ia=dd.interactions[i]){if(type!=="dragend"&&ia.cancelled)
continue;callback=drag.properties(event,dd,ia);ia.results=[];$(elem||ia[mode]||dd.droppable).each(function(p,subject){callback.target=subject;event.isPropagationStopped=function(){return false;};result=subject?$event.dispatch.call(subject,event,callback):null;if(result===false){if(mode=="drag"){ia.cancelled=true;dd.propagates-=1;}
if(type=="drop"){ia[mode][p]=null;}}
else if(type=="dropinit")
ia.droppable.push(drag.element(result)||subject);if(type=="dragstart")
ia.proxy=$(drag.element(result)||ia.drag)[0];ia.results.push(result);delete event.result;if(type!=="dropinit")
return result;});dd.results[i]=drag.flatten(ia.results);if(type=="dropinit")
ia.droppable=drag.flatten(ia.droppable);if(type=="dragstart"&&!ia.cancelled)
callback.update();}
while(++i<len)
event.type=orig.type;event.originalEvent=orig.event;return drag.flatten(dd.results);},properties:function(event,dd,ia){var obj=ia.callback;obj.drag=ia.drag;obj.proxy=ia.proxy||ia.drag;obj.startX=dd.pageX;obj.startY=dd.pageY;obj.deltaX=event.pageX-dd.pageX;obj.deltaY=event.pageY-dd.pageY;obj.originalX=ia.offset.left;obj.originalY=ia.offset.top;obj.offsetX=obj.originalX+obj.deltaX;obj.offsetY=obj.originalY+obj.deltaY;obj.drop=drag.flatten((ia.drop||[]).slice());obj.available=drag.flatten((ia.droppable||[]).slice());return obj;},element:function(arg){if(arg&&(arg.jquery||arg.nodeType==1))
return arg;},flatten:function(arr){return $.map(arr,function(member){return member&&member.jquery?$.makeArray(member):member&&member.length?drag.flatten(member):member;});},textselect:function(bool){$(document)[bool?"unbind":"bind"]("selectstart",drag.dontstart).css("MozUserSelect",bool?"":"none");document.unselectable=bool?"off":"on";},dontstart:function(){return false;},callback:function(){}};drag.callback.prototype={update:function(){if($special.drop&&this.available.length)
$.each(this.available,function(i){$special.drop.locate(this,i);});}};var $dispatch=$event.dispatch;$event.dispatch=function(event){if($.data(this,"suppress."+event.type)-new Date().getTime()>0){$.removeData(this,"suppress."+event.type);return;}
return $dispatch.apply(this,arguments);};var touchHooks=$event.fixHooks.touchstart=$event.fixHooks.touchmove=$event.fixHooks.touchend=$event.fixHooks.touchcancel={props:"clientX clientY pageX pageY screenX screenY".split(" "),filter:function(event,orig){if(orig){var touched=(orig.touches&&orig.touches[0])||(orig.changedTouches&&orig.changedTouches[0])||null;if(touched)
$.each(touchHooks.props,function(i,prop){event[prop]=touched[prop];});}
return event;}};$special.draginit=$special.dragstart=$special.dragend=drag;})(jQuery);