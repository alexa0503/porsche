var reqAnimationFrame = (function() {
  return window[Hammer.prefixed(window, 'requestAnimationFrame')] || function(callback) {
    window.setTimeout(callback, 1000 / 60);
  };
})();

//var screen = document.querySelector(".device-screen");
var screen = window.screen;
var hitArea = document.querySelector("#hitarea");
var el = document.querySelector("#image");

var START_X = 0;
var START_Y = 0;
var initScale = 1;
var initAngle = 0;
var ticking = false;
var screenScale = window.innerHeight/1334;
if(window.innerHeight < window.innerWidth){
    screenScale = window.innerWidth/1334;
}
var transform;
var timer;
var mc = new Hammer.Manager(hitArea);

mc.add(new Hammer.Pan({
  threshold: 0,
  pointers: 0
}));

mc.add(new Hammer.Swipe()).recognizeWith(mc.get('pan'));
mc.add(new Hammer.Rotate({
  threshold: 0
})).recognizeWith(mc.get('pan'));
mc.add(new Hammer.Pinch({
  threshold: 0
})).recognizeWith([mc.get('pan'), mc.get('rotate')]);

/*
mc.add(new Hammer.Tap({
  event: 'doubletap',
  taps: 2
}));
mc.add(new Hammer.Tap());
*/
mc.on("panstart panmove", onPan);
mc.on("rotatestart rotatemove", onRotate);
mc.on("pinchstart pinchmove", onPinch);
//mc.on("swipe", onSwipe);
//mc.on("tap", onTap);
//mc.on("doubletap", onDoubleTap);

mc.on("hammer.input", function(ev) {
  if (ev.isFinal) {
    //resetElement();
  }
});

function logEvent(ev) {
  var offset = $('#image').offset();
  //console.log(ev,offset);
  //$('#logInfo').html(JSON.stringify(transform)+' type:'+ev.type+' rotation:'+ev.rotation+' offset:'+JSON.stringify(offset)+' screen width:'+window.innerWidth+'window height:'+window.innerHeight);
}

function resetElement() {
  el.className = 'animate';
  transform = {
    translate: {
      x: START_X,
      y: START_Y
    },
    scale: initScale,
    angle: initAngle,
    rx: 0,
    ry: 0,
    rz: 1
  };
  requestElementUpdate();
}

function updateElementTransform() {
  //边界控制
  /*
  if( transform.translate.y > 0 ){
    transform.translate.y = 0;
  }
  if( transform.translate.x > (1334 - 498)*(screen.height/1334)/2){
    transform.translate.x = (1334 - 498)*(screen.height/1334)/2
  }
  //缩放比例控制

  var minScale = getMinScale(el.width,el.height);
  var maxScale = 1;
  if( transform.scale > maxScale ){
    transform.scale = maxScale;
  }
  else if( transform.scale < minScale ){
    transform.scale = minScale;
  }
  */
  var value = [
    'translate3d(' + transform.translate.x + 'px, ' + transform.translate.y + 'px, 0)',
    'scale(' + transform.scale + ', ' + transform.scale + ')',
    'rotate3d(' + transform.rx + ',' + transform.ry + ',' + transform.rz + ',' + transform.angle + 'deg)'
  ];

  value = value.join(" ");
  el.style.webkitTransform = value;
  el.style.mozTransform = value;
  el.style.transform = value;
  ticking = false;
}

function requestElementUpdate() {
  if (!ticking) {
    reqAnimationFrame(updateElementTransform);
    ticking = true;
  }
}

function onPan(ev) {
  el.className = '';
  if (ev.type == 'panstart') {
    START_X = transform.translate.x || START_X;
    START_Y = transform.translate.y || START_Y;
    transform.translate = {
      x: START_X,
      y: START_Y
    };
  }
  else{
      if(window.innerHeight < window.innerWidth){
          transform.translate = {
            x: START_X + ev.deltaX,
            y: START_Y + ev.deltaY
          };
      }
      else{
          transform.translate = {
            x: START_X + ev.deltaY,
            y: START_Y - ev.deltaX
          };
      }

  }
  logEvent(ev);
  requestElementUpdate();
}


function onPinch(ev) {
  if (ev.type == 'pinchstart') {
    initScale = transform.scale || initScale;
  }

  el.className = '';
  transform.scale = initScale * ev.scale;
  logEvent(ev);
  requestElementUpdate();
}
var start_angel = 0;
function onRotate(ev) {
  el.className = '';
  transform.rz = 1;
  var _a = ev.rotation - start_angel;
  if (ev.type == 'rotatestart') {
    start_angel = ev.rotation;
  }
  else{
    start_angel = ev.rotation;
    transform.angle += _a;
  }
  logEvent(ev);
  requestElementUpdate();
}

function onSwipe(ev) {
  //var angle = 50;
  transform.ry = (ev.direction & Hammer.DIRECTION_HORIZONTAL) ? 1 : 0;
  transform.rx = (ev.direction & Hammer.DIRECTION_VERTICAL) ? 1 : 0;
  transform.angle = (ev.direction & (Hammer.DIRECTION_RIGHT | Hammer.DIRECTION_UP)) ? angle : -angle;

  clearTimeout(timer);
  timer = setTimeout(function() {
    resetElement();
  }, 300);

  logEvent(ev);
  requestElementUpdate();
}

function onTap(ev) {
  transform.rx = 1;
  transform.angle = 25;

  clearTimeout(timer);
  timer = setTimeout(function() {
    resetElement();
  }, 200);

  logEvent(ev);
  requestElementUpdate();
}

function onDoubleTap(ev) {
  transform.rx = 1;
  transform.angle = 80;

  clearTimeout(timer);
  timer = setTimeout(function() {
    resetElement();
  }, 500);

  logEvent(ev);
  requestElementUpdate();
}

function upload(serverId)
{

    if(window.innerHeight < window.innerWidth){
        screenScale = window.innerWidth/1334;
    }
    else{
        screenScale = window.innerHeight/1334;
    }
  var url = '/wx/'+serverId + '?gender='+ABC.gender;
  $.ajax({
    url: url,
    dataType:'json',
    method:'GET'
  }).done(function(json) {
    if (json.ret == 0){
      nWidth = json.data.width;
      nHeight = json.data.height;
      var minScale = getMinScale(nWidth,nHeight);
      if( minScale > 1){
        alert('图片太小，请重新上传');
        return;
      }

      var img = $('#image');
      img.width(nWidth*screenScale);
      img.height(nHeight*screenScale);
      img.attr('src', json.data.url);
      $('#image').show();
      //照片位置初始化
      initScale = 1;
      initAngle = 0;
      //屏幕,设计稿比例
      START_X = (window.innerWidth - nWidth*screenScale)/2;
      START_Y = (window.innerHeight - nHeight*screenScale)/2;
      resetElement();
    }
  }).fail(function(jqXHR, textStatus, errorThrown) {
    alert( "上传失败，请稍候重试" );
  }).always(function() {
    //alert( "complete" );
  });
}
function getMinScale(w,h)
{
  if ( 512/h > 387/w ){
    var minScale = 512/w;
  }
  else{
    var minScale = 387/h;
  }
  return minScale;
}
$().ready(function(){
  var hasCartoon = false;
  $('.btn-photo,.btn-upload').on('touchend', function(){
//upload('local');return false;
    if( hasCartoon ){
      alert('请等待图片处理');
      return false;
    }
    /*
    if ($(this).hasClass('btn-upload')){
        var sourceType = ['album'];
    }
    else{
        var sourceType = ['camera'];
    }
    */
    ABC.inUploadPhotoDisableClue = true;//在提交头像的时候，禁用横屏提示
    var sourceType = ['album','camera'];
    wx.chooseImage({
        count: 1, // 默认9
        sizeType: ['compressed'], // 可以指定是原图还是压缩图，默认二者都有
        sourceType: sourceType,  // 可以指定来源是相册还是相机，默认二者都有
        complete: function(){
            setTimeout(function(){
                ABC.inUploadPhotoDisableClue = false;
            },3000)
        },
        cancel: function(){
            ABC.inUploadPhotoDisableClue = false;
        },
        success: function (res) {
            var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
            setTimeout(function () {
                wx.uploadImage({
                    localId: localIds[0], // 需要上传的图片的本地ID，由chooseImage接口获得
                    isShowProgressTips: 2, // 默认为1，显示进度提示
                    success: function (res) {
                        //var serverId = res.serverId; // 返回图片的服务器端ID
                        upload(res.serverId);
                    }
                });
            },100);
        }
    });
  });

  $('.n4 .btns .btn-sure').on('touchend', function(){
    if( typeof transform == 'undefined'){
      alert('请上传图片')
      return false;
    }
    if( hasCartoon ){
      alert('请等待图片处理');
      return false;
    }
    hasCartoon = true;
    var offset = $('#image').offset();
    var scale = transform.scale;
    var angle = transform.angle;
    var x = -1*offset.top;
    var y = -1*offset.left;

    var data = {
      x:x/screenScale,
      y:y/screenScale,
      scale:scale,
      angle:angle,
      screenScale:screenScale,
      w:window.innerWidth/screenScale,
      h:window.innerHeight/screenScale,
      gender:ABC.gender,
      //h:1334,
      _token:window.Laravel.csrfToken
    };
    SiteEvt.dis("exeing");
    //SiteEvt.dis("imgok",{path:''});
    //$('#image').hide();
    //$('#image').attr('src','');
    $.post('/cartoon', data,function(data){
        if( data.ret == 0){
            ABC.isstatic = false;
            SiteEvt.dis("imgok",{path:data.images.path});
            $('.n5 .btns_ .btn-again').show();
            $('.n5 .btns_ .bnt-sure').show();
            $('.n5').show();
            $('.n4').hide();
            $('.game-main-body').show();
            SiteEvt.dis("exeok");
            if(wx && wxData){
                wxData.link = data.shareUrl;
                wxShare(wxData);
            }
        }
        else{
            alert('处理失败');
            hasCartoon = false;
        }
      //location.href='/result';
    }).fail(function(jqXHR, textStatus, errorThrown){

      hasCartoon = false;
      alert('图片处理失败,请重试');
    })
  })
  $('.n5 .btns_ .btn-again').hide();
  $('.n5 .btns_ .bnt-sure').hide();
  $('.n5 .btns_ .btn-again').on('click', function(){
     $('.n5').hide();
     $('.n4').show();
     $('.game-main-body').hide();
      hasCartoon = false;
  });
  $('.n5 .btns_ .bnt-sure').on('click', function(){
      cn5.load();
  });
})


/*
document.querySelector(".device-button").addEventListener("click", function() {
  document.querySelector(".device").classList.toggle('hammertime');
}, false);
*/
