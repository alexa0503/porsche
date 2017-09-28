ABC={};
//
ABC.start = "n2";
//ABC.start = "n5";
//ABC.start = "n6";

ABC.isstatic=false;
ABC.gender=1;

ABC.playAsVideo=3;
//ABC.frame=1/160;
ABC.frame=0.083;
//ABC.frame=1/2;
//
ABC.route = [];
//逻辑电路
ABC.route=[];
ABC.route.push('n2,n3,n4,n5,n6');
ABC.route.push('n3,n4,n5,n6');
ABC.route.push('n4,n5,n6');
ABC.route.push('n6');
ABC.route.push('n5,n6');


ABC.pngArr=[];
ABC.pngArr.push(['1',"images/start/star_sup_04_000*.png",0,15]);

ABC.jpgArr=[];
//ABC.jpgArr.push([0,"0","video/video0.mp4",'jpg',"1"]);
//ABC.jpgArr.push([0,"1","video/video0loop.mp4",'jpg',"loop"]);
//ABC.jpgArr.push([0,"2","video/video2.mp4",'jpg',"3?"]);
//ABC.jpgArr.push([0,"4","video/video4loop.mp4",'jpg',"5"]);
//ABC.jpgArr.push([0,"5","video/video5.mp4",'jpg',"6?"]);
//ABC.jpgArr.push([0,"7","video/video7.mp4",'jpg',"8"]);
//ABC.jpgArr.push([0,"9","video/video9.mp4",'jpg',"10?"]);
//ABC.jpgArr.push([0,"11","video/video11.mp4",'jpg','']);

ABC.jpgArr.push([3,"0","images/3/0/*.jpg",1,15,"","0a"]);
ABC.jpgArr.push([3,"0a","images/3/0a/*.jpg",1,15,"loop","",'$(".btn-start").fadeIn();an.do_png_top();',false]);
ABC.jpgArr.push([3,"2","images/3/2/*.jpg",1,273,"","3?"]);
ABC.jpgArr.push([3,"4","images/3/4/*.jpg",1,1,"","5"]);
ABC.jpgArr.push([3,"5","images/3/5/*.jpg",1,275,"","6?"]);
ABC.jpgArr.push([3,"7","images/3/7/*.jpg",1,201,"","8"]);
ABC.jpgArr.push([3,"8","images/3/8/*.jpg",1,1,"loop","9",'mv1.load(9,"10?",11);',false]);
ABC.jpgArr.push([3,"9","images/3/9/*.jpg",1,40,"","10?"]);
ABC.jpgArr.push([3,"11","images/3/11/*.jpg",1,50,"",""]);

ABC.jpgArr.push([1,'1',"images/1/1/*.jpg",1,15,"","2"]);
ABC.jpgArr.push([1,'3',"images/1/3/*.jpg",1,35,"",""]);
ABC.jpgArr.push([1,'6',"images/1/6/*.jpg",1,34,"","7"]);
ABC.jpgArr.push([1,'10',"images/1/10/*.jpg",1,23,"","11"]);
ABC.jpgArr.push([2,'1',"images/2/1/*.jpg",1,15,"","2"]);
ABC.jpgArr.push([2,'3',"images/2/3/*.jpg",1,35,"",""]);
ABC.jpgArr.push([2,'6',"images/2/6/*.jpg",1,34,"","7"]);
ABC.jpgArr.push([2,'10',"images/2/10/*.jpg",1,23,"","11"]);

//video2.webm
//加载
ABC.jsArr=[];
ABC.jsArr.push("js/pos.js");
ABC.jsArr.push("js/num.js");
//ABC.jsArr.push("js/jquery.js");
ABC.jsArr.push("js/main.js");
ABC.jsArr.push("js/index.js");

ABC.isEnterHome=false;
//初始化
ABC.init = [];
ABC.init.push(["n2",".n2",'an.now(".n2");$(".n2").show();$(".btn-start").hide(); ']);
ABC.init.push(["n3",".n3",'an.now(".n3");$(".n3").show();an.loop(".n3 .bg-light");Cn3.me.init();']);
ABC.init.push(["n4",".n4",'an.now(".n4");$(".n4").fadeIn();new Cn4();']);
ABC.init.push(["n5",".n5",'an.now(".n5");$(".n5").fadeIn();new Cn5();']);
ABC.init.push(["n6",".n6",'an.now(".n6");$(".n6").fadeIn();MV2.init();']);
//ABC.init.push(["n2",".n2",'new PageFront();$(".game-main-stt").show();$(".game-main-stt>div").hide();$(".n2").show();']);



//事件
ABC.btn=[];

ABC.btn.push(['n2','.btn-start','h5jump.doNext();$(".n2").hide();mv1.kill();']);//跳过按钮
ABC.btn.push(['n3','.btn-1','Cn3.me.sel1();']);//选择1
ABC.btn.push(['n3','.btn-2','Cn3.me.sel2();']);//选择2
ABC.btn.push(['n3','.btn-sure','if(Cn3.me.sel){$(".n3 .btn-sure").removeClass("css-btn-alpha");HKit.delay(0.6,function(){$(".n3").fadeOut();h5jump.doNext();});}']);//跳过按钮
