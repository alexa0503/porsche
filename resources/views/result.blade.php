<html>
<head>
  <title>{{env('APP_NAME')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--CSS-->
  <link rel="stylesheet" type="text/css" href="/css/ScreenLast.percent-btm.css?v=1">
  <!--JS-->
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script>
  window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
  ]) !!};
  </script>
  @php
  $js = \EasyWeChat::js();
  @endphp

</head>

<body onload='init();' class='ScreenLast JS90'>
  <div class="abs zhy" >
    <div class="abs bg" ><img class="ptimg" src="/ScreenLast/zhy_bg.png" /></div>
    <div class="abs photo-1" ><img class="ptimg" src="/ScreenLast/zhy_photo-1.png" /></div>
    <div class="abs photo-2" ><img class="ptimg" src="/ScreenLast/zhy_photo-2.png" /></div>
    <div class="abs female" >
      <div class="abs bg" ><img class="ptimg" src="/ScreenLast/zhy_female_bg.png" /></div>
      <div class="abs face" >
        <div class="abs bg" ><img class="ptimg" src="/ScreenLast/zhy_female_face_bg.png" /></div>
        <div class="abs black" ><img class="ptimg" src="/ScreenLast/zhy_female_face_black.png" /></div>
        <div class="abs hole" ><img class="ptimg" src="/ScreenLast/zhy_female_face_hole.png" /></div>
        <div class="abs p2" ><img class="ptimg" src="/ScreenLast/zhy_female_face_p2.png" /></div>
      </div>
    </div>
    <div class="abs male" >
      <div class="abs bg" ><img class="ptimg" src="/ScreenLast/zhy_male_bg.png" /></div>
      <div class="abs face" >
        <div class="abs bg" ><img class="ptimg" src="/ScreenLast/zhy_male_face_bg.png" /></div>
        <div class="abs black" ><img class="ptimg" src="/ScreenLast/zhy_male_face_black.png" /></div>
        <div class="abs hole" ><img class="ptimg" src="/ScreenLast/zhy_male_face_hole.png" /></div>
        <div class="abs p2rot" ><img class="ptimg" src="/ScreenLast/zhy_male_face_p2rot.png" /></div>
        <div class="abs p2" ><img class="ptimg" src="/ScreenLast/zhy_male_face_p2.png" /></div>
        <div class="abs p1b" ><img class="ptimg" src="/ScreenLast/zhy_male_face_p1b.png" /></div>
        <div class="abs p2b" ><img class="ptimg" src="/ScreenLast/zhy_male_face_p2b.png" /></div>
        <div class="abs p3b" ><img class="ptimg" src="/ScreenLast/zhy_male_face_p3b.png" /></div>
      </div>
    </div>
    <div class="abs button1" ><img class="ptimg" src="/ScreenLast/zhy_button1.png" /></div>
    <div class="abs button2" ><img class="ptimg" src="/ScreenLast/zhy_button2.png" /></div>
    <div class="abs button3" ><img class="ptimg" src="/ScreenLast/zhy_button3.png" /></div>
    <div class="abs logo" ><img class="ptimg" src="/ScreenLast/zhy_logo.png" /></div>
    <div class="abs txt" ><img class="ptimg" src="/ScreenLast/zhy_txt.png" /></div>
    <div class="abs arrow" ><img class="ptimg" src="/ScreenLast/zhy_arrow.png" /></div>
  </div>
  <div class="abs buffer" >
    <div class="abs p2" ><img class="ptimg" src="{{asset('/storage/cartoon/'.session('filename'))}}" /></div>
    <div class="abs f2" ><img class="ptimg" src="{{asset('/storage/cartoon/'.session('filename'))}}" /></div>
  </div>

<script type="text/javascript" src="/js/main.js"></script>
<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script src="{{asset('js/wx.js')}}"></script>
<script src="{{asset('js/hammer.min.js')}}"></script>
<script src="{{asset('js/velocity.min.js')}}"></script>
<script src="{{asset('js/velocity.ui.min.js')}}"></script>

<script>
document.addEventListener('touchstart', function(event) {
  // 判断默认行为是否可以被禁用
  if (event.cancelable) {
    // 判断默认行为是否已经被禁用
    if (!event.defaultPrevented) {
      event.preventDefault();
    }
  }
}, false);
@if(env('APP_ENV') != 'local')
wx.config({!! $js->config(array('onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ', 'onMenuShareWeibo','chooseImage','uploadImage','downloadImage'), false) !!});
var wxData = {
  title: '{{env("WECHAT_SHARE_TITLE")}}', // 分享标题
  desc: '{{env("WECHAT_SHARE_DESC")}}', // 分享描述
  link: '{{url("/")}}', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
  imgUrl: '{{asset("share.jpg")}}' // 分享图标
};
wxShare(wxData);
@endif
$().ready(function(){
  @if(Request::segment(2) == 'male')
    //绘制男，1表示男
    $(".buffer .p2 img")[0].onload=function ()
    {
      //trace("图片加载完成");
      new ScreenLast_Face(1);
    }
    $(".buffer .p2 img")[0].src = "{{asset('/storage/cartoon/'.session('filename'))}}"; //缓冲区内的图片，
  @else
    //绘制女，2表示女
    $(".buffer .f2 img")[0].onload=function ()
    {
      //trace("图片加载完成");
      new ScreenLast_Face(2);
    }
    $(".buffer .p2 img")[0].src="{{asset('/storage/cartoon/'.session('filename'))}}"; //缓冲区内的图片，
  @endif
})

</script>
</body>
</html>
