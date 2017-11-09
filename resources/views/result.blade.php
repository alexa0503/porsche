<html>
<head>
  <title>{{env('APP_NAME')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--CSS-->
  <link rel="stylesheet" type="text/css" href="{{cdn('/css/pec.percent-max.css')}}">
  <!--JS-->
  <script type="text/javascript" src="{{cdn('/js/jquery.min.js')}}"></script>
  <script>
  window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
  ]) !!};
  </script>
  @php
  $js = \EasyWeChat::js();
  @endphp

</head>

<body onload='init();' class='Shareout'>

<div class="abs game-main-end">
	<div class="abs last share-out" >


	  <div class="abs bg" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/pec/share-out_bg.png" /></div>
	  <!--<div class="abs photo" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/pec/last_photo.png" /></div>-->
	 <!--<div class="abs btn-start" onclick="window.location.href='/';"><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/pec/share-out_btn-start.png" /></div>-->
       <a href="/"><div class="abs btn-start"><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/pec/share-out_btn-start.png" /></div></a>
	  <!--<div class="abs button" >
		<div class="abs btn-share btn" onclick='window.share.doAni();'><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/pec/last_button_btn-share.png" /></div>
		<div class="abs btn-notice btn" onclick='window.h5jump.doRoute("b",1); '><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/pec/last_button_btn-notice.png" /></div>
		<div class="abs btn-quote btn" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/pec/last_button_btn-quote.png" /></div>
	  </div>-->

	<div class="abs lastphoto" >
	  <div class="abs female" >
		<div class="abs bg" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/lastPhoto/lastphoto_female_bg.png" /></div>
		<div class="abs black" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/lastPhoto/lastphoto_female_black.png" /></div>
	  </div>
	  <div class="abs male" >
		<div class="abs bg" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/lastPhoto/lastphoto_male_bg.png" /></div>
		<div class="abs black" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/lastPhoto/lastphoto_male_black.png" /></div>
	  </div>
	</div>
	  <div class="abs lastDom">
		<!--<div class="abs frame" >-->
		<img class="ptimg frameimg" src="{{cdn('/images/empty.png')}}" original-data="/lastPhoto/lastphoto_frame.png" />
		<!--</div>-->
	  </div>

	<div class="abs female" >
		<div class="abs bg" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/ScreenLast/zhy_female_bg.png" /></div>
		<div class="abs face" >
			<div class="abs black" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/ScreenLast/zhy_female_face_black.png" /></div>
		</div>
	</div>
	<div class="abs male" >
		<div class="abs bg" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/ScreenLast/zhy_male_bg.png" /></div>
		<div class="abs face" >
			<div class="abs black" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/ScreenLast/zhy_male_face_black.png" /></div>
		</div>
	  </div>

	  <div class="abs title_top" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" original-data="/pec/last_title_top.png" /></div>
</div>


<div class="abs buffer" >
	<div class="abs buffer1" ><img class="ptimg" src="{{cdn('/images/empty.png')}}" /></div>
	<div class="abs buffer2" ><img class="ptimg" src="{{cdn('/images/empty.png')}}"  /></div>
</div>
<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script src="{{cdn('js/wx.js')}}"></script>

<script>
@if(env('APP_ENV') != 'local')
wx.config({!! $js->config(array('onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ', 'onMenuShareWeibo','chooseImage','uploadImage','downloadImage'), false) !!});
var wxData = {
  title: '{{env("WECHAT_SHARE_TITLE")}}', // 分享标题
  desc: '{{env("WECHAT_SHARE_DESC")}}', // 分享描述
  link: '{{url("/")}}', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
  imgUrl: '{{cdn("images/share.jpg")}}' // 分享图标
};
wxShare(wxData);
@endif

ABC={}
//ABC.isstatic=true;
ABC.path="{{cdn('storage/cartoon/'.$image->path)}}";
ABC.gender={{$image->gender}};
</script>
<script src="{{cdn('/js/jquery.min.js')}}"></script>
<!--<script src="js/route.js?id=12155"></script>-->
<script src="{{cdn('/js/shareout.js')}}"></script>
</body>
</html>
