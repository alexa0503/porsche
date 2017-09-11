<html>
<head>
  <title>{{env('APP_NAME')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--CSS-->
  <link rel="stylesheet" type="text/css" href="/css/face.percent.css?v=1">
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
<body onload='init();' class='ScreenDriver JS90'>
  <div class="abs game-page">
    <div class="abs male" >
      <div class="abs male-bg" ><img class="ptimg" src="/face/male_male-bg.png" /></div>
      <div class="abs male-face" ><img class="ptimg" src="/face/male_male-face.png" /></div>
      <div class="abs photo p1" ><img class="ptimg" src="/face/male_p1.png" /></div>
      <div class="abs photo p2" ><img class="ptimg" src="/face/male_p2.png" /></div>
      <div class="abs photo p3" ><img class="ptimg" src="/face/male_p3.png" /></div>
    </div>
    <div class="abs female" >
      <div class="abs female-bg" ><img class="ptimg" src="/face/female_female-bg.png" /></div>
      <div class="abs female-face" ><img class="ptimg" src="/face/female_female-face.png" /></div>
      <div class="abs photo p1" ><img class="ptimg" src="/face/female_p1.png" /></div>
      <div class="abs photo p2" ><img class="ptimg" src="/face/female_p2.png" /></div>
      <!--<div class="abs photo p3" ><img class="ptimg" src="face/female_p3.png" /></div>-->
    </div>
  </div>

  <div class="abs buffer" >
    <div class="abs p2" ><img class="ptimg" src="/ScreenLast/empty.png" /></div>
    <div class="abs f2" ><img class="ptimg" src="/ScreenLast/empty.png" /></div>
  </div>
  <script src="/js/pre.js"></script>
  <script type="text/javascript" src="/js/main.js"></script>
  <script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
  <script src="{{asset('js/wx.js')}}"></script>
  <script>
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
    $(".buffer .f2 img")[0].onload = function() {
      new ScreenDriver_Face(2)
    };
    $(".buffer .f2 img")[0].src = "{{asset('/storage/cartoon/'.session('filename'))}}"
    $(".female .female-bg").show();
  })
  </script>
</body>
</html>
