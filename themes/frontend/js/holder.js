var Holder=Holder||{};(function(g,c){var u=false,n=false,b=document.createElement("canvas");document.getElementsByClassName||(document.getElementsByClassName=function(A){var x=document,B,z,w,y=[];if(x.querySelectorAll){return x.querySelectorAll("."+A)}if(x.evaluate){z=".//*[contains(concat(' ', @class, ' '), ' "+A+" ')]",B=x.evaluate(z,x,null,0,null);while(w=B.iterateNext()){y.push(w)}}else{B=x.getElementsByTagName("*"),z=new RegExp("(^|\\s)"+A+"(\\s|$)");for(w=0;w<B.length;w++){z.test(B[w].className)&&y.push(B[w])}}return y});window.getComputedStyle||(window.getComputedStyle=function(x,w){return this.el=x,this.getPropertyValue=function(y){var z=/(\-([a-z]){1})/g;return y=="float"&&(y="styleFloat"),z.test(y)&&(y=y.replace(z,function(){return arguments[2].toUpperCase()})),x.currentStyle[y]?x.currentStyle[y]:null},this});function s(z,K){var A="complete",L="readystatechange",J=!1,C=J,F=!0,B=z.document,H=B.documentElement,E=B.addEventListener?"addEventListener":"attachEvent",I=B.addEventListener?"removeEventListener":"detachEvent",D=B.addEventListener?"":"on",w=function(y){(y.type!=L||B.readyState==A)&&((y.type=="load"?z:B)[I](D+y.type,w,J),!C&&(C=!0)&&K.call(z,null))},x=function(){try{H.doScroll("left")}catch(y){setTimeout(x,50);return}w("poll")};if(B.readyState==A){K.call(z,"lazy")}else{if(B.createEventObject&&H.doScroll){try{F=!z.frameElement}catch(G){}F&&x()}B[E](D+"DOMContentLoaded",w,J),B[E](D+L,w,J),z[E](D+"load",w,J)}}function o(x){x=x.match(/^(\W)?(.*)/);var w=document["getElement"+(x[1]?x[1]=="#"?"ById":"sByClassName":"sByTagName")](x[2]);var y=[];w!=null&&(w.length?y=w:w.length==0?y=w:y=[w]);return y}function r(x,w){var A={};for(var z in x){A[z]=x[z]}for(var y in w){A[y]=w[y]}return A}if(!Object.prototype.hasOwnProperty){Object.prototype.hasOwnProperty=function(x){var w=this.__proto__||this.constructor.prototype;return(x in this)&&(!(x in w)||w[x]!==this[x])}}function l(B,x,A){x=parseInt(x,10);B=parseInt(B,10);var w=Math.max(x,B);var z=Math.min(x,B);var C=1/12;var y=Math.min(z*0.75,0.75*w*C);return{height:Math.round(Math.max(A.size,y))}}function k(G,w,D,C){var A=l(w.width,w.height,D);var B=A.height;var y=w.width*C,F=w.height*C;var z=D.font?D.font:"sans-serif";b.width=y;b.height=F;G.textAlign="center";G.textBaseline="middle";G.fillStyle=D.background;G.fillRect(0,0,y,F);G.fillStyle=D.foreground;G.font="bold "+B+"px "+z;var E=D.text?D.text:(Math.floor(w.width)+"x"+Math.floor(w.height));var x=G.measureText(E).width;if(x/y>=0.75){B=Math.floor(B*0.75*(y/x))}G.font="bold "+(B*C)+"px "+z;G.fillText(E,(y/2),(F/2),y);return b.toDataURL("image/png")}function v(D,y,x,C){var z=x.dimensions,A=x.theme,B=x.text?decodeURIComponent(x.text):x.text;var w=z.width+"x"+z.height;A=(B?r(A,{text:B}):A);A=(x.font?r(A,{font:x.font}):A);if(D=="image"){y.setAttribute("data-src",C);y.setAttribute("alt",B?B:A.text?A.text+" ["+w+"]":w);if(n||!x.auto){y.style.width=z.width+"px";y.style.height=z.height+"px"}if(n){y.style.backgroundColor=A.background}else{y.setAttribute("src",k(m,z,A,e))}}else{if(D=="background"){if(!n){y.style.backgroundImage="url("+k(m,z,A,e)+")";y.style.backgroundSize=z.width+"px "+z.height+"px"}}else{if(D=="fluid"){y.setAttribute("data-src",C);y.setAttribute("alt",B?B:A.text?A.text+" ["+w+"]":w);if(z.height.substr(-1)=="%"){y.style.height=z.height}else{y.style.height=z.height+"px"}if(z.width.substr(-1)=="%"){y.style.width=z.width}else{y.style.width=z.width+"px"}if(y.style.display=="inline"||y.style.display==""){y.style.display="block"}if(n){y.style.backgroundColor=A.background}else{y.holderData=x;h.push(y);f(y)}}}}}function f(y){var w;if(y.nodeType==null){w=h}else{w=[y]}for(i in w){var z=w[i];if(z.holderData){var x=z.holderData;z.setAttribute("src",k(m,{height:z.clientHeight,width:z.clientWidth},x.theme,e))}}}function d(x,z){var y={theme:q.themes.gray},A=false;for(sl=x.length,j=0;j<sl;j++){var w=x[j];if(g.flags.dimensions.match(w)){A=true;y.dimensions=g.flags.dimensions.output(w)}else{if(g.flags.fluid.match(w)){A=true;y.dimensions=g.flags.fluid.output(w);y.fluid=true}else{if(g.flags.colors.match(w)){y.theme=g.flags.colors.output(w)}else{if(z.themes[w]){y.theme=z.themes[w]}else{if(g.flags.text.match(w)){y.text=g.flags.text.output(w)}else{if(g.flags.font.match(w)){y.font=g.flags.font.output(w)}else{if(g.flags.auto.match(w)){y.auto=true}}}}}}}}return A?y:false}if(!b.getContext){n=true}else{if(b.toDataURL("image/png").indexOf("data:image/png")<0){n=true}else{var m=b.getContext("2d")}}var a=1,t=1;if(!n){a=window.devicePixelRatio||1,t=m.webkitBackingStorePixelRatio||m.mozBackingStorePixelRatio||m.msBackingStorePixelRatio||m.oBackingStorePixelRatio||m.backingStorePixelRatio||1}var e=a/t;var h=[];var q={domain:"holder.js",images:"img",bgnodes:".holderjs",themes:{gray:{background:"#eee",foreground:"#aaa",size:12},social:{background:"#3a5a97",foreground:"#fff",size:12},industrial:{background:"#434A52",foreground:"#C2F200",size:12}},stylesheet:".holderjs-fluid {font-size:16px;font-weight:bold;text-align:center;font-family:sans-serif;margin:0}"};g.flags={dimensions:{regex:/^(\d+)x(\d+)$/,output:function(x){var w=this.regex.exec(x);return{width:+w[1],height:+w[2]}}},fluid:{regex:/^([0-9%]+)x([0-9%]+)$/,output:function(x){var w=this.regex.exec(x);return{width:w[1],height:w[2]}}},colors:{regex:/#([0-9a-f]{3,})\:#([0-9a-f]{3,})/i,output:function(x){var w=this.regex.exec(x);return{size:q.themes.gray.size,foreground:"#"+w[2],background:"#"+w[1]}}},text:{regex:/text\:(.*)/,output:function(w){return this.regex.exec(w)[1]}},font:{regex:/font\:(.*)/,output:function(w){return this.regex.exec(w)[1]}},auto:{regex:/^auto$/}};for(var p in g.flags){if(!g.flags.hasOwnProperty(p)){continue}g.flags[p].match=function(w){return w.match(this.regex)}}g.add_theme=function(w,x){w!=null&&x!=null&&(q.themes[w]=x);return g};g.add_image=function(B,z){var A=o(z);if(A.length){for(var y=0,w=A.length;y<w;y++){var x=document.createElement("img");x.setAttribute("data-src",B);A[y].appendChild(x)}}return g};g.run=function(x){var K=r(q,x),H=[],F=[],J=[];if(typeof(K.images)=="string"){F=o(K.images)}else{if(window.NodeList&&K.images instanceof window.NodeList){F=K.images}else{if(window.Node&&K.images instanceof window.Node){F=[K.images]}}}if(typeof(K.bgnodes)=="string"){J=o(K.bgnodes)}else{if(window.NodeList&&K.elements instanceof window.NodeList){J=K.bgnodes}else{if(window.Node&&K.bgnodes instanceof window.Node){J=[K.bgnodes]}}}u=true;for(B=0,A=F.length;B<A;B++){H.push(F[B])}var z=document.getElementById("holderjs-style");if(!z){z=document.createElement("style");z.setAttribute("id","holderjs-style");z.type="text/css";document.getElementsByTagName("head")[0].appendChild(z)}if(!K.nocss){if(z.styleSheet){z.styleSheet.cssText+=K.stylesheet}else{z.appendChild(document.createTextNode(K.stylesheet))}}var G=new RegExp(K.domain+'/(.*?)"?\\)');for(var A=J.length,B=0;B<A;B++){var w=window.getComputedStyle(J[B],null).getPropertyValue("background-image");var y=w.match(G);var E=J[B].getAttribute("data-background-src");if(y){var I=d(y[1].split("/"),K);if(I){v("background",J[B],I,w)}}else{if(E!=null){var I=d(E.substr(E.lastIndexOf(K.domain)+K.domain.length+1).split("/"),K);if(I){v("background",J[B],I,w)}}}}for(A=H.length,B=0;B<A;B++){var C=attr_data_src=w=null;try{C=H[B].getAttribute("src");attr_datasrc=H[B].getAttribute("data-src")}catch(D){}if(attr_datasrc==null&&!!C&&C.indexOf(K.domain)>=0){w=C}else{if(!!attr_datasrc&&attr_datasrc.indexOf(K.domain)>=0){w=attr_datasrc}}if(w){var I=d(w.substr(w.lastIndexOf(K.domain)+K.domain.length+1).split("/"),K);if(I){if(I.fluid){v("fluid",H[B],I,w)}else{v("image",H[B],I,w)}}}}return g};s(c,function(){if(window.addEventListener){window.addEventListener("resize",f,false);window.addEventListener("orientationchange",f,false)}else{window.attachEvent("onresize",f)}u||g.run()});if(typeof define==="function"&&define.amd){define("Holder",[],function(){return g})}})(Holder,window);