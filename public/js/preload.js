function H5Loader(){}H5Loader.prototype.constructor=H5Loader;H5Loader.loadImg=function(e,t,n,i){var r=$(e);var o=0;function s(){o++;t.call(i,o,r.length);if(o==r.length){n.call(i)}}for(var a=0;a<r.length;a++){var l=r[a];if(!$(l).attr("original-data")){continue}var u=$(l).attr("original-data");l.onload=l.onerror=function(){s()};if(!u){console.log(u,l)}if(u==undefined){console.log("错误",l)}l.src=u}};H5Loader.loadImg_oj=function(e,t,n,i){var r=OJ.getAll(e);var o=0;function s(){o++;t.call(i,o,r.length);if(o==r.length){n.call(i)}}for(var a=0;a<r.length;a++){var l=r[a];var u=l.getAttribute("original-data");l.onload=l.onerror=function(){s()};l.src=u}};H5Loader.delayloadjs=function(e,t,n,i,r){if(r==undefined)r=false;var o=0;window.delyjsok=function(){o++;if(o==e.length){n.call(i)}else{t.call(i)}};e.map(function(e,t,n){var i=document.getElementsByTagName("head")[0];var o=document.createElement("script");o.type="text/javascript";if(r)e=e+"?r="+Math.random();o.src=e;o.setAttribute("onload","window.delyjsok();");i.appendChild(o)})};H5Loader.loadMp3_oj_dy=function(e,t,n,i){var r=[];var o=e.length;var s=0;function a(){s++;if(t){t.call(i,s,o)}if(s==o){if(n){n.call(i,r)}}}for(var l=0;l<e.length;l++){var u=e[l];var c=new Audio(u);c.onloadedmetadata=a;c.src=u;r.push(c)}};H5Loader.loadImg2=function(e,t,n,i,r,o){var s=[];var a=uMath.random(14);var l=0;var u=[];var c=$('<div class="abs temp'+a+'"></div>');$("body").append(c);c.css("left","-10000px");c.css("top","-10000px");var p=c[0];function d(){l++;if(r){t.call(i,l,e.length,o)}else{t.call(i,l,e.length)}if(l==e.length){if(o){o.unshift(s);n.apply(i,o)}else{n.call(i,s)}}else{}}for(var f=0;f<e.length;f++){var v=e[f];var h=new Image;h.onload=h.onerror=function(){this.style.display="none";d()};h.src=v;s.push(h);p.appendChild(h)}};function HKit(){}HKit.prototype.constructor=HKit;HKit.delay=function(e,t,n,i){if(t==undefined){console.error("错误")}var r=window.setTimeout(function(){if(i==null){t.call(n)}else{t.apply(n,i)}},e*1e3);return r};HKit.loop=function(e,t,n,i){var r=window.setInterval(function(){if(i)t.apply(n,i);else if(n)t.call(n);else t()},e*1e3);if(i)t.apply(n,i);else t.call(n);return r};HKit.enterframe=function(e,t,n,i){window.requestAnimFrame=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)}}();(function e(){requestAnimFrame(e);if(i)t.apply(n,i);else t.call(n)})()};HKit.getMcInRoot=function(e,t){var n=e[t];e.removeChild(n);if(n.hasOwnProperty("gotoAndStop"))n.gotoAndStop(0);return n};HKit.aCt=function(e){var t=new createjs.Container;e.addChild(t);return t};HKit.aRec=function(e,t){var n=new createjs.Shape;n.graphics.beginFill(t).drawRect(0,0,660,960);e.addChild(n);return n};HKit.getMc=function(e,t){return HKit.getChild(e,t)};HKit.getChild=function(e,t){if(e==null)console.err(t+"之前为空");if(t==null)console.err(t+"为空");if(t.indexOf(".")==-1){return e[t]}var n=t.split(".").length;var i=e;while(n>1){var r=t.substring(0,t.indexOf("."));t=t.substring(t.indexOf(".")+1,t.length);i=i[r];n=t.split(".").length}if(i==null)console.err(t+"之前a为空");if(t==null)console.err(t+"为空");return i[t]};HKit.getText=function(e,t){var n=e[t];return n};HKit.fun2=function(e,t,n){return function(){if(arguments.length>0){e.apply(t,arguments)}else{e.call(t)}}};HKit.fn=function(e,t,n){var i=function(){if(arguments.length>0){if(n!=undefined){var i=[];for(var r=0;r<arguments.length;r++){i[r]=arguments[r]}i=i.concat(n);e.apply(t,i)}else{e.apply(t,arguments)}}else{if(n!=undefined){e.apply(t,n)}else{e.call(t)}}};if(HKit._deleArr_==undefined){HKit._deleArr_=[]}HKit._deleArr_.push({fn:e,ref:t,ff:i});return i};HKit.de=function(e,t){if(HKit._deleArr_==undefined)return undefined;for(var n=HKit._deleArr_.length-1;n>=0;n--){var i=HKit._deleArr_[n];if(i["fn"]==e&&i["ref"]==t){return i["ff"]}}return undefined};HKit.debugLayer=function(e){for(var t=0;t<e.numChildren;t++){}};HKit.remove=function(e){if(e.parent!=undefined){e.parent.removeChild(e)}};function JSdebug(){}JSdebug.prototype.constructor=JSdebug;JSdebug.initDebug=function(){if(OJ.getAll(".debug").length==0){var e=document.createElement("div");e.setAttribute("class","debug");window.document.body.appendChild(e)}};JSdebug.print=function(){JSdebug.trace.apply(JSdebug,arguments)};JSdebug.trace=function(){var e=[];for(var t=0;t<arguments.length;t++){e.push(arguments[t])}var n=OJ.getOne(".debug");if(!n)return;var i=n.innerText;n.innerText=(e.join("    ")+""+i).substring(0,500)};JSdebug.clear=function(){var e=OJ.getOne(".debug");if(e)e.innerText=""};function OJ(){}OJ.prototype.constructor=OJ;OJ.GetQueryString=function(e){var t=new RegExp("(^|&)"+e+"=([^&]*)(&|$)");var n=window.location.search.substr(1).match(t);if(n!=null)return unescape(n[2]);return null};OJ.getSub=function(e,t){var n=t.split(" ");var i=e;var r=[];function o(e,t){if(t.indexOf(".")==0){t=t.replace(".","");_outArr2=e.getElementsByClassName(t);d=[];for(var n=0;n<_outArr2.length;n++){d.push(_outArr2[n])}}else if(t.indexOf("#")==0){t=t.replace("#","");d=[e.getElementById(t)]}else{_outArr2=e.getElementsByTagName(t);d=[];for(var n=0;n<_outArr2.length;n++){d.push(_outArr2[n])}}return d}var s=[i];var a=0;while(n.length){var l=n.shift();if(l==""){continue}var u=[];for(var c=0;c<s.length;c++){var p=s[c];var d=o(p,l);u=u.concat(d)}s=u.concat();a++}for(var f=0;f<d.length;f++){r.push(d[f])}return r};OJ.getAll=function(e){return OJ.getSub(document,e)};OJ.getOne=function(e){return OJ.getSub(document,e)[0]};OJ.offset=function(e){var t={top:0,left:0};OJ.getOffset(t,e,true);return t};OJ.getOffset=function(e,t,n){var i;if(t.nodeType!==1){return}i=window.getComputedStyle(t)["position"];if(typeof n==="undefined"&&i==="static"){OJ.getOffset(e,t.parentNode);return}e.top=t.offsetTop+e.top-t.scrollTop;e.left=t.offsetLeft+e.left-t.scrollLeft;if(i==="fixed"){return}OJ.getOffset(e,t.parentNode)};OJ.text=function(e){var t="";e=e.childNodes||e;for(var n=0;n<e.length;n++){t+=e[n].nodeType!=1?e[n].nodeValue:text(e[n].childNodes)}return t};OJ.getWH=function(){if(window.innerHeight)winHeight=window.innerHeight;else if(document.body&&document.body.clientHeight)winHeight=document.body.clientHeight;return winHeight};OJ.hasClass=function(e,t){return e.className.match(new RegExp("(\\s|^)"+t+"(\\s|$)"))};OJ.addClass=function(e,t){if(!this.hasClass(e,t))e.className+=" "+t};OJ.removeClass=function(e,t){if(OJ.hasClass(e,t)){var n=new RegExp("(\\s|^)"+t+"(\\s|$)");e.className=e.className.replace(n," ")}};OJ.toggleClass=function(e,t){if(hasClass(e,t)){OJ.removeClass(e,t)}else{OJ.addClass(e,t)}};OJ.toggleClassTest=function(){var e=document.getElementById("test");OJ.toggleClass(e,"testClass")};OJ.remove=function(e){var t=e.parentNode;if(t){t.removeChild(e)}};OJ.getTime=function(){var e=new Date;return e.getTime()};function UDevice(){}UDevice.prototype.constructor=UDevice;UDevice.prototype.HasPerformance;UDevice.prototype.DevicePixelRatio;UDevice.prototype.ImgRatio;UDevice.prototype.BrowserID;UDevice.prototype.PlatformID;UDevice.prototype.isApple;UDevice.prototype.isMobile;UDevice.prototype.LoopInterval;UDevice.me;UDevice.getMe=function(){if(UDevice.me==null){UDevice.me=new UDevice;UDevice.me.init()}return UDevice.me};UDevice.prototype.init=function(){this.DevicePixelRatio=UDevice.getDevicePixelRatio();this.HasPerformance=UDevice.supportPerformance();this.ImgRatio=UDevice.getImgRatio();this.BrowserID=UDevice.CheckExplorerID();this.PlatformID=UDevice.getPlatformID();this.isApple=this.checkIsApple();this.isMobile=this.checkIsMobile();this.HasFastLoop=this.supportFastLoop()};UDevice.checkSupportAdvanceH5=function(){var e=document.createElement("canvas");e.h5ou=false;var t={h5qu:false,h5ru:false,set_opacity:true,zDistance:true,h5tu:false,h5uu:false,h5vu:true};var n=["experimental-webgl","webgl","webkit-3d","moz-webgl"];for(var i=0;i<n.length;i++){try{e.h5ou=e.getContext(n[i],t)}catch(e){}if(e.h5ou){break}}var r=e.h5ou!==false?true:false;e.h5ou=null;e=null;return r};UDevice.check_canvas2d=function(){var e=document.createElement("canvas");var t=e.getContext("2d");var n=typeof t=="object"?true:false;e=null;t=null;return n};UDevice.checkSupportBaseH5=function(){return UDevice.check_transform()&&UDevice.check_canvas2d()};UDevice.check_transform=function(){if(!Ucss.contain_css_attribute("transform webkitTransform mozTransform oTransform msTransform"))return false;if(!Ucss.isSupport_perspective()){return false}return true};UDevice.prototype.getBestLoopInterval=function(){switch(this.PlatformID){case 1:return 33;case 2:var e=this.getSthNum222();switch(e){case 0:return 50;case 1:return 40;case 2:return 33;case 3:return 25;default:return 33}return 5;case 3:return 33;case 4:return 33;default:return 33}};UDevice.prototype.getSthNum222=function(){var e=UDevice.getMe().screenSize.x<UDevice.getMe().screenSize.y?UDevice.getMe().screenSize.x:UDevice.getMe().screenSize.y;var t=UDevice.getMe().screenSize.x<UDevice.getMe().screenSize.y?UDevice.getMe().screenSize.y:UDevice.getMe().screenSize.x;if(e==320)return t==480?0:1;if(e==375)return 2;if(e==414)return 3;return-1};UDevice.prototype.supportFastLoop=function(){return window.requestAnimationFrame!==undefined?true:false};UDevice.prototype.isScreenScaleOK=function(){if(!UDevice.getMe().isMobile){return false}var e=3/4;var t=UDevice.getMe().screenSize.x/UDevice.getMe().screenSize.y;var n=Math.abs(e-t);if(n<.01){return true}return UDevice.getMe().screenSize.x>=580?true:false};UDevice.prototype.checkIsMobile=function(){return this.PlatformID>=0&&this.PlatformID<=4};UDevice.supportPerformance=function(){if(typeof window.h5qq!=="undefined"){if(typeof window.h5qq.now!=="undefined"){return true}}return false};UDevice.prototype.checkIsApple=function(){switch(this.PlatformID){case 2:return true;case 1:default:return false}};UDevice.getDevicePixelRatio=function(){return window.devicePixelRatio!==undefined?Math.max(window.devicePixelRatio,1):1};UDevice.getScreenSize=function(){if(window.screen==undefined){return UDevice.countScreenSize(window.innerWidth,window.innerHeight)}if(window.screen.width==undefined){return UDevice.countScreenSize(window.innerWidth,window.innerHeight)}return UDevice.countScreenSize(window.screen.width,window.screen.height)};UDevice.countScreenSize=function(e,t){};UDevice.getImgRatio=function(){return 1/UDevice.getDevicePixelRatio()};UDevice.CheckExplorerID=function(){if(navigator.userAgent.indexOf("Firefox")!=-1)return 2;else if(navigator.userAgent.indexOf("Chrome")!=-1)return 3;else if(navigator.userAgent.indexOf("Safari")!=-1)return 4;else if(navigator.userAgent.indexOf("MSIE")!=-1)return 1;else if(navigator.userAgent.indexOf("rv:")!=-1)return 1;else if(navigator.userAgent.indexOf("iPhone")!=-1)return 4;else if(navigator.userAgent.indexOf("iPod")!=-1)return 4;else if(navigator.userAgent.indexOf("iPad")!=-1)return 4;return 0};UDevice.getPlatformID=function(){if(navigator.userAgent.indexOf("Android")!=-1)return 1;else if(navigator.userAgent.indexOf("iPad")!=-1)return 2;else if(navigator.userAgent.indexOf("iPod")!=-1)return 2;else if(navigator.userAgent.indexOf("iPhone")!=-1)return 2;else if(navigator.userAgent.indexOf("webOS")!=-1)return 3;else if(navigator.userAgent.indexOf("mobile")!=-1)return 4;else if(navigator.userAgent.indexOf("Windows Phone")!=-1)return 4;else if(navigator.userAgent.indexOf("Windows Mobile")!=-1)return 4;else if(navigator.userAgent.indexOf("IEMobile")!=-1)return 4;else if(navigator.userAgent.indexOf("Nokia")!=-1)return 4;else if(navigator.appVersion.indexOf("Win")!=-1)return 5;else if(navigator.appVersion.indexOf("Mac")!=-1)return 6;else if(navigator.appVersion.indexOf("Linux")!=-1)return 7;else if(navigator.appVersion.indexOf("X11")!=-1)return 8;return 0};UDevice.is_weixin=function(){var e=navigator.userAgent.toLowerCase();if(e.match(/MicroMessenger/i)=="micromessenger"){return true}else{return false}};function uMath(){}uMath.prototype.constructor=uMath;uMath.formate_time=function(e){if(e<60){if(e<10)return n="00:0"+e;return"00:"+e}var t=Math.floor(e/60);var n=e%60;if(n<10)n="0"+n;if(t<10)return"0"+t+":"+n;else return"0"+t+":"+n;return"00:00"};uMath.vvScope=function(e,t,n){return(e[0]-e[1])*(n-t[1])/(t[0]-t[1])+e[1]};uMath.systemChange=function(e,t,n){var i=parseInt(e,t);return i.toString(n)};uMath.random=function(e){return Math.ceil(Math.random()*e)};uMath.randomWithin=function(e,t,n){var i=Math.floor((t-e+n)/n);return Math.floor(Math.random()*i)*n+e};uMath.limit=function(e,t,n){if(e>t)return Math.max(t,Math.min(e,n));else return Math.max(e,Math.min(t,n));return n};uMath.abs=function(e){return e<0?-e:e};uMath.distance=function(e,t){return Math.abs(Math.sqrt((e.x-t.x)*(e.x-t.x)+(e.y-t.y)*(e.y-t.y)))};uMath.distanceV2=function(e,t){var e=e.localToLocal(e.x,e.y,t);return Math.abs(Math.sqrt((e.x-t.x)*(e.x-t.x)+(e.y-t.y)*(e.y-t.y)))};function WXDevil(){}WXDevil.prototype.constructor=WXDevil;WXDevil.me;WXDevil.getMe=function(){if(WXDevil.me==null){WXDevil.me=new WXDevil}return WXDevil.me};WXDevil.prototype.killWXdevil=function(){var e=this;if(UDevice.getMe().isMobile){document.addEventListener("touchmove",function(t){e.setXorYType22(t)});document.addEventListener("touchstart",function(t){e.setclientXorY22(t)});document.addEventListener("touchend",function(t){e.clearSthCCC(t)})}else{if(window.h5xo){document.onmousemove=function(t){e.setXorY(t)};document.onmousedown=function(t){e.h5ep(t)};document.onmouseup=function(t){e.clearSthBBB(t)}}else{document.onmousemove=function(t){e.setXorYType2(t)};document.onmousedown=function(t){e.setclientXorY(t)};document.onmouseup=function(t){e.clearSthAAA(t)}}}};WXDevil.prototype.setXorYType22=function(e){this.isTouched=true;e.preventDefault()};WXDevil.prototype.setclientXorY22=function(e){this.isTouched=true};WXDevil.prototype.setclientXorY=function(e){this.isTouched=true};WXDevil.prototype.setXorYType33=function(e){this.isTouched=true};WXDevil.prototype.clearSthCCC=function(e){this.isTouched=false};WXDevil.prototype.clearSthAAA=function(e){this.isTouched=false};WXDevil.prototype.clearSthBBB=function(e){this.isTouched=false};WXDevil.prototype.setXorYType2=function(e){};WXDevil.prototype.setXorY=function(e){};function Evt(e,t){this.type=e;this.news=t==null?undefined:t}Evt.prototype={constructor:Evt,type:undefined,news:undefined};function SiteEvt(e){if(e!=SiteEvt._guard||SiteEvt._guard==null){}}SiteEvt._instance=undefined;SiteEvt._guard=undefined;SiteEvt.list={};SiteEvt.listOnce={};SiteEvt.getMe=function(){if(SiteEvt._instance==null){SiteEvt._instance=new SiteEvt(SiteEvt._guard=arguments.callee)}return SiteEvt._instance};SiteEvt.rea=function(e){SiteEvt.getMe().removeAll(e)};SiteEvt.re_=function(e,t){SiteEvt.getMe().remove(e,t)};SiteEvt.add=function(e,t,n){SiteEvt.getMe().addEvt(e,t,n)};SiteEvt.dis=function(e,t){SiteEvt.getMe().dispatch(new Evt(e,t))};SiteEvt.prototype={constructor:SiteEvt,addEvt:function(e,t,n){if(SiteEvt.list[e]==null){SiteEvt.list[e]={};SiteEvt.list[e].listener=[];SiteEvt.list[e].listener.push(t);SiteEvt.list[e].ref=[];SiteEvt.list[e].ref.push(n)}else{SiteEvt.list[e].listener.push(t);SiteEvt.list[e].ref.push(n)}},getInfo:function(e){return'[type="'+e+'",'+"len=["+SiteEvt.list[e].listener.length+"]]"},hasType:function(e){return SiteEvt.list[e]==null?false:true},has:function(e,t){if(SiteEvt.list[e]==null){return false}else{var n=SiteEvt.list[e].listener.length;for(var i=0;i<n;i++){if(SiteEvt.list[e].listener[i]==t){return true}}}return false},addOnce:function(e,t){if(SiteEvt.listOnce[e]==null){SiteEvt.listOnce[e]={};SiteEvt.listOnce[e].listener=[];SiteEvt.listOnce[e].listener.push(t);SiteEvt.listOnce[e].ref=[];SiteEvt.listOnce[e].ref.push(t)}else{SiteEvt.listOnce[e].listener.push(t);SiteEvt.listOnce[e].ref.push(t)}},dispatch:function(e){this.dispatchNormal(e);this.dispatchOnce(e)},dispatchNormal:function(e){if(SiteEvt.list[e.type]==null)return;var t=SiteEvt.list[e.type].listener.length-1;for(var n=t;n>=0;n--){if(SiteEvt.list[e.type]!=null&&SiteEvt.list[e.type].listener[n]!=null&&SiteEvt.list[e.type].ref[n]!=null)SiteEvt.list[e.type].listener[n].apply(SiteEvt.list[e.type].ref[n],[e])}},dispatchOnce:function(e){if(SiteEvt.listOnce[e.type]==null)return;var t=SiteEvt.listOnce[e.type].listener.length-1;for(var n=t;n>=0;n--){if(SiteEvt.listOnce[e.type]!=null&&SiteEvt.listOnce[e.type].listener[n]!=null&&SiteEvt.listOnce[e.type].ref[n]!=null){SiteEvt.listOnce[e.type].listener[n].apply(SiteEvt.listOnce[e.type].ref[n],[e]);SiteEvt.listOnce[e.type].listener.splice(n,1);SiteEvt.listOnce[e.type].ref.splice(n,1)}}},removeAll:function(e){if(SiteEvt.list[e]==null)return;SiteEvt.list[e]=null},remove:function(e,t){if(SiteEvt.list[e]==null)return;var n=SiteEvt.list[e].listener.length-1;for(var i=n;i>=0;i--){if(SiteEvt.list[e].listener!=null&&SiteEvt.list[e].listener[i]==t){SiteEvt.list[e].listener.splice(i,1);SiteEvt.list[e].ref.splice(i,1)}}}};function enumID(){}enumID.prototype.constructor=enumID;enumID.onresize=1;enumID.onorientationchange=2;enumID.onrotated=4;function ImgAsset(e){this.assets=[];this.typeid=e;var t=[];var n=0;this.splitData=[];this.splitData.push(0);for(var i=0;i<ABC.jpgArr.length;i++){var r=ABC.jpgArr[i];var o=r[0];var s=r[1];if(o==this.typeid){console.log("type",this.typeid);var a=this.getURLArr(r);t=t.concat(a);n+=ABC.num[s];this.splitData.push(n)}}console.log("共计图片",t.length);H5Loader.loadImg2(t,this.loading,this.loadok,this)}ImgAsset.prototype.constructor=ImgAsset;ImgAsset.prototype.splitData;ImgAsset.prototype.assets;ImgAsset.prototype.typeid;ImgAsset.prototype.ing;ImgAsset.prototype.ok;ImgAsset.prototype.getImg=function(e,t){var n=[];for(var i=0;i<e.length;i++){var r=e[i];var o=this.getImgOne(r,t);n.push(o)}return n};ImgAsset.prototype.kill=function(e,t){var n=[];for(var i=0;i<e.length;i++){var r=e[i];this.killImgOne(r,t)}};ImgAsset.prototype.getImgOne=function(e,t){var n=0;for(var i=0;i<ABC.jpgArr.length;i++){var r=ABC.jpgArr[i];var o=r[0];var s=r[1];if(o==this.typeid){if(e==s){var a=this.splitData[n];var l=this.splitData[n+1]-1;var u=[];for(var c=a;c<=l;c++){var p=this.assets[c];u.push(p)}return u}n++}}return[]};ImgAsset.prototype.killImgOne=function(e,t){var n=0;for(var i=0;i<ABC.jpgArr.length;i++){var r=ABC.jpgArr[i];var o=r[0];var s=r[1];if(o==this.typeid){if(e==s){var a=this.splitData[n];var l=this.splitData[n+1]-1;for(var u=a;u<=l;u++){var c=this.assets[u];this.assets[u]=null}return}n++}}return[]};ImgAsset.prototype.loadok=function(e){this.assets=e;if(this.ing){this.ing.call(window,e.length,e.length)}if(this.ok){this.ok.call(window)}};ImgAsset.prototype.loading=function(e,t){if(this.ing){this.ing.call(window,e,t)}};ImgAsset.prototype.getURLArr=function(e){var t=e[1];var n=e[2];var i=1;var r=ABC.num[t];var o=[];for(var s=i;s<=r;s++){if(t==12){var s=this.get0(s,3);var a=n.replace("*",s);o.push(a)}else if(t==4){var a=n.replace("*",s);o.push(a)}else{var s=this.get0(s,6);var a=n.replace("*",s);o.push(a)}}return o};ImgAsset.prototype.get0=function(e,t){var n=""+e;while(n.length<t){n="0"+n}return n};function JS90(){WXDevil.getMe().killWXdevil();UDevice.getMe().init();var e=$(window).width();var t=$(document.body).height();this.state=0;SiteEvt.add(enumID.onresize,this.onresize,this);this.onresize()}JS90.prototype.constructor=JS90;JS90.prototype.state;JS90.getWH=function(){var e=document.body.clientWidth;var t=document.body.clientHeight;if(e>t){return[e,t]}else{return[t,e]}};JS90.prototype.onresize=function(e){var t=$(window).width();var n=$(window).height();if(t<n){this.doV()}else{this.do__()}SiteEvt.dis(enumID.onrotated)};JS90.prototype.onorientationonchange=function(e){var t=window.orientation;if(t==90||t==-90){this.doV()}else{this.do__()}};JS90.prototype.do__=function(){var e=document.body.clientWidth;var t=document.body.clientHeight;document.body.style.transform="rotate(0deg)";document.body.style.width=e+"px";document.body.style.height=t+"px"};JS90.prototype.doV=function(){var e=document.body.clientWidth;var t=document.body.clientHeight;var n=(t-e)/2+"px";document.body.style.transform="rotate(90deg) translate("+n+","+n+")";document.body.style.width=t+"px";document.body.style.height=e+"px";document.body.style.display="block"};function Main(){var e=document.body.getAttribute("class");var t=/\S+/g;var n=[1];while(n){var n=t.exec(e);if(n){n.map(function(e){if(window[e]){new window[e]}else{}})}}window.onresize=function(){SiteEvt.dis(enumID.onresize)};window.onorientationchange=function(){SiteEvt.dis(enumID.onorientationchange)}}Main.prototype.constructor=Main;function init(){new Main}function Mp3Asset(){Mp3Asset.me=this;var e=[];for(var t in Muz){var n=Muz[t];e.push(n)}H5Loader.loadMp3_oj_dy(e,this.oning__,this.onok__,this)}Mp3Asset.prototype.constructor=Mp3Asset;Mp3Asset.me;Mp3Asset.prototype.asset;Mp3Asset.prototype.ing;Mp3Asset.prototype.ok;Mp3Asset.prototype.onok__=function(e){this.asset=e;if(this.ok){this.ok.call(window)}};Mp3Asset.prototype.oning__=function(e,t){if(this.ing){this.ing.call(window,e,t)}};Mp3Asset.prototype.getMp3=function(e){var t=0;for(var n in Muz){var i=Muz[n];if(e==i){return this.asset[t]}t++}};Mp3Asset.prototype.getMp3Path=function(e){var t=0;for(var n in Muz){var i=Muz[n];if(e==i){return this.asset[t].src}t++}};function Preload(){window.preload=this;if(OJ.GetQueryString("test")){JSdebug.initDebug()}new JS90;UDevice.getMe();WXDevil.getMe().killWXdevil();Preload.me=this;this.end=false;this.oldn=0;this.n=0;this.now=0;this.olda="0";this.oldb="0";this.mp3Tag=[];this.mp3bg=[];this.oldTime=OJ.getTime();OJ.getOne(".loading_mid .txt").style.display="none";H5Loader.loadImg_oj(".loading_mid img",this.onloading,this.onloadok,this);document.getElementById("clue").style.display="block";document.getElementById("loading_mid").style.display="none";function e(){console.log("初始化");var e=document.getElementById("mp3bg0");e.muted=true;e.play();var t=document.getElementById("mp3bg1");t.muted=true;t.play();window.preload.mp3bg=[];window.preload.mp3bg.push(e);window.preload.mp3bg.push(t);var n=document.getElementById("mp3btn");n.muted=true;n.play();window.preload.mp3btn=n}document.addEventListener("WeixinJSBridgeReady",e,false);if(!UDevice.is_weixin()){e()}}Preload.prototype.constructor=Preload;Preload.prototype.redbar;Preload.prototype.npos1;Preload.prototype.npos2;Preload.prototype.olda;Preload.prototype.oldb;Preload.prototype.enterID;Preload.prototype.end;Preload.prototype.oldn;Preload.prototype.n;Preload.prototype.now;Preload.prototype.mp3ass;Preload.prototype.mp3bg;Preload.prototype.mp3btn;Preload.prototype.mp3ID;Preload.prototype.mp3Tag;Preload.prototype.oldTime;Preload.prototype.checkID;Preload.prototype.imgass;Preload.me;Preload.prototype.onloading=function(){};Preload.prototype.onloadok=function(){this.checkID=HKit.loop(1,this.checkTime,this)};Preload.prototype.doNext=function(){this.redbar=OJ.getOne(".loading_mid .redbar .inner");this.redbar.style.width="1%";OJ.getOne(".loading_mid .npos1").style.opacity=1;OJ.getOne(".loading_mid .npos2").style.opacity=1;this.npos1=OJ.getOne(".loading_mid .npos1 .inner");this.npos2=OJ.getOne(".loading_mid .npos2 .inner");this.npos1.style.disply="block";this.npos2.style.disply="block";this.enterID=HKit.loop(.04,this.loop,this);var e=ABC.jsArr;H5Loader.delayloadjs(e,this.onjsloading,this.onjsloadok,this,true)};Preload.prototype.checkTime=function(){if(OJ.getTime()-this.oldTime>2e3){clearInterval(this.checkID);document.getElementById("clue").style.display="none";document.getElementById("loading_mid").style.display="block";this.doNext()}};Preload.prototype.loop=function(){if(this.end){if(Math.abs(this.n-this.now)<.1){PEC.me.doFade();clearInterval(this.enterID)}}if(Math.abs(this.n-this.now)<.1){this.now=this.n}else{this.now+=(this.n-this.now)*.3}this.updateView(parseInt(this.now))};Preload.prototype.onjsloading=function(){this.n=3};Preload.prototype.onjsloadok=function(){if(window.onjqok){window.onjqok()}ABC.posData=window.data0;this.n=6;this.loadPng()};Preload.prototype.loadPng=function(){var e=ABC.pngArr;for(var t=0;t<e.length;t++){var n=e[t];var i=n[0];if(i==1){var r=n[1];var o=n[2];var s=n[3];var a=[];for(var l=o;l<=s;l++){if(l<10){l="0"+l}a.push(r.replace("*",l))}break}}if(a){H5Loader.loadImg2(a,this.img_process,this.img_ok,this)}};Preload.prototype.img_process=function(e,t){var n=uMath.vvScope([6,12],[0,t],e);this.n=n};Preload.prototype.img_ok=function(e){ABC.logoArr=e;new PEC};Preload.prototype.doUpdate=function(e,t){if(e+2==t){MV1.init();this.imgass=new ImgAsset(3);this.imgass.ing=HKit.fn(this.oning__img,this);this.imgass.ok=HKit.fn(this.onloadok__img,this)}else{var n=uMath.vvScope([12,50],[0,t],e);this.n=n}};Preload.prototype.oning__img=function(e,t){};Preload.prototype.oning__img=function(e,t){this.n=uMath.vvScope([50,80],[0,t],e)};Preload.prototype.onloadok__img=function(){this.loadMP3()};Preload.prototype.loadMP3=function(){this.mp3ass=new Mp3Asset;this.mp3ass.ing=HKit.fn(this.oning__mp3,this);this.mp3ass.ok=HKit.fn(this.onok__mp3,this)};Preload.prototype.onok__mp3=function(){this.end=true;this.playMp3pre(Muz.m0,true)};Preload.prototype.playMp3=function(e,t){var n=0;var i=0;for(var r=0;r<this.mp3Tag.length;r++){if(e==this.mp3Tag[r]){i=r}else{n=r}}var o=this.mp3bg[n];o.pause();var s=this.mp3bg[i];s.pause();if(t){s.setAttribute("loop","loop")}else{s.removeAttribute("loop")}s.currentTime=0;s.volume=.8;s.play();s.muted=false};Preload.prototype.playMp3pre=function(e,t){var n=this.playMp3preImmediately(e,t);n.muted=true};Preload.prototype.playMp3preImmediately=function(e,t){this.mp3ID=this.mp3ID==0?1:0;var n=this.mp3ass.getMp3Path(e);this.mp3Tag[this.mp3ID]=e;var i=this.mp3bg[this.mp3ID];i.pause();i.src=n;if(t){i.setAttribute("loop","loop")}else{i.removeAttribute("loop")}i.play();i.muted=false;return i};Preload.prototype.playMp3btn=function(e,t){var n=this.mp3ass.getMp3Path(e);this.mp3btn.src=n;this.mp3btn.play()};Preload.prototype.oning__mp3=function(e,t){this.n=uMath.vvScope([80,99],[0,t],e)};Preload.prototype.updateView=function(e){if(isNaN(e)){e=0}this.redbar.style.width=e+"%";if(e<10){a=0;b=e}else{txt=e+"";a=txt.charAt(0);b=txt.charAt(1)}if(a!=this.olda){OJ.removeClass(this.npos1,"num_n"+this.olda);OJ.addClass(this.npos1,"num_n"+a)}if(b!=this.oldb){OJ.removeClass(this.npos2,"num_n"+this.oldb);OJ.addClass(this.npos2,"num_n"+b)}this.olda=a;this.oldb=b};