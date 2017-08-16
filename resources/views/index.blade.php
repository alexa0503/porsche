<html>
<head>
  <title>{{env('APP_NAME')}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.wj.css?v=1">
	<!--JS-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @php
        $js = \EasyWeChat::js();
    @endphp

</head>

<body class="JSloading" onload="init();">
<!--<div class="abs bg" ><img class="ptimg" src="main/bg.png" /></div>
<div class="abs loading-page">

<div class="abs loading_xbg" ><img class="ptimg" src="main/loading_xbg.png" /></div>
<div class="abs loading_xbg" ><img class="ptimg" src="main/loading_xbg.png" /></div>

</div>-->




<div class="abs game-page">
<!--homepage-->
<!--<div class="abs homepage" ><img class="ptimg" src="main/homepage.png" /></div>-->
<!--选择-->
<!--<div class="abs xxb" >
  <div class="abs 3" ><img class="ptimg" src="main/xxb_3.png" /></div>
  <div class="abs male" ><img class="ptimg" src="main/xxb_male.png" /></div>
  <div class="abs male_btn" ><img class="ptimg" src="main/xxb_male_btn.png" /></div>
  <div class="abs female" ><img class="ptimg" src="main/xxb_female.png" /></div>
  <div class="abs female_btn" ><img class="ptimg" src="main/xxb_female_btn.png" /></div>
</div>-->
<div class="abs zpzl" id="photo">
  <div class="abs photo-parent" style="width:100%;height:100%;"><img id="photo-img"  src="main/p1.jpg" style="pointer-events:none;" with="307" height="370" /></div>
  <div class="abs mask" ><img class="ptimg" src="main/mask.png" /></div>
  <div class="abs title" ><img class="ptimg" src="main/zpzl_title.png" /></div>
  <div class="abs layer_152" ><img class="ptimg" src="main/zpzl_layer_152.png" /></div>
  <div class="abs g" ><img class="ptimg" src="main/zpzl_g.png" /></div>
  <div class="abs shape_5" ><img class="ptimg" src="main/zpzl_shape_5.png" /></div>
  <div class="abs sczp" ><img class="ptimg" src="main/zpzl_sczp.png" /></div>
  <div class="abs sczpclick" ><img class="ptimg" src="main/zpzl_sczpclick.png" /></div>
  <div class="abs qd" ><img class="ptimg" src="main/zpzl_qd.png" /></div>
  <div class="abs qd_click" ><img class="ptimg" src="main/zpzl_qd_click.png" /></div>
  <div class="abs psan" ><img class="ptimg" src="main/zpzl_psan.png" /></div>
  <div class="abs psan_click" ><img class="ptimg" src="main/zpzl_psan_click.png" /></div>
</div>
<!--<div class="abs yl_" >
  <div class="abs layer_189" ><img class="ptimg" src="main/yl__layer_189.png" /></div>
  <div class="abs layer_190" ><img class="ptimg" src="main/yl__layer_190.png" /></div>
  <div class="abs zxps" ><img class="ptimg" src="main/yl__zxps.png" /></div>
  <div class="abs qd" ><img class="ptimg" src="main/yl__qd.png" /></div>
  <div class="abs zxps_click" ><img class="ptimg" src="main/yl__zxps_click.png" /></div>
  <div class="abs qdcilck" ><img class="ptimg" src="main/yl__qdcilck.png" /></div>
</div>
<div class="abs 6_dh" ><img class="ptimg" src="main/6_dh.png" /></div>
<div class="abs 7_dh" ><img class="ptimg" src="main/7_dh.png" /></div>
<div class="abs 8" >
  <div class="abs layer_174" ><img class="ptimg" src="main/8_layer_174.png" /></div>
  <div class="abs layer_1" ><img class="ptimg" src="main/8_layer_1.png" /></div>
  <div class="abs shape_2" ><img class="ptimg" src="main/8_shape_2.png" /></div>
</div>
<div class="abs 9_dh" ><img class="ptimg" src="main/9_dh.png" /></div>
<div class="abs 10_dh" ><img class="ptimg" src="main/10_dh.png" /></div>
<div class="abs 11__xbg" ><img class="ptimg" src="main/11__xbg.png" /></div>
<div class="abs 12_dh" ><img class="ptimg" src="main/12_dh.png" /></div>
<div class="abs 13_dh" ><img class="ptimg" src="main/13_dh.png" /></div>
<div class="abs fxzp" >
  <div class="abs 001" ><img class="ptimg" src="main/fxzp_001.png" /></div>
  <div class="abs layer_195" ><img class="ptimg" src="main/fxzp_layer_195.png" /></div>
  <div class="abs curves_13" ><img class="ptimg" src="main/fxzp_curves_13.png" /></div>
  <div class="abs zp" >
    <div class="abs layer_159_copy_2" ><img class="ptimg" src="main/fxzp_zp_layer_159_copy_2.png" /></div>
    <div class="abs wrinkled-5" ><img class="ptimg" src="main/fxzp_zp_wrinkled-5.png" /></div>
    <div class="abs layer_160" ><img class="ptimg" src="main/fxzp_zp_layer_160.png" /></div>
    <div class="abs layer_161" ><img class="ptimg" src="main/fxzp_zp_layer_161.png" /></div>
    <div class="abs layer_164" ><img class="ptimg" src="main/fxzp_zp_layer_164.png" /></div>
    <div class="abs folded-7" ><img class="ptimg" src="main/fxzp_zp_folded-7.png" /></div>
    <div class="abs curves_12" ><img class="ptimg" src="main/fxzp_zp_curves_12.png" /></div>
  </div>
  <div class="abs fxsp_copy" >
    <div class="abs layer_192" ><img class="ptimg" src="main/fxzp_fxsp_copy_layer_192.png" /></div>
    <div class="abs shape_1_copy_26" ><img class="ptimg" src="main/fxzp_fxsp_copy_shape_1_copy_26.png" /></div>
    <div class="abs shape_1_copy" ><img class="ptimg" src="main/fxzp_fxsp_copy_shape_1_copy.png" /></div>
    <div class="abs text-layer1" >分享视频</div>
  </div>
  <div class="abs gzbsjtyzx_copy" >
    <div class="abs layer_193" ><img class="ptimg" src="main/fxzp_gzbsjtyzx_copy_layer_193.png" /></div>
    <div class="abs shape_1_copy_26" ><img class="ptimg" src="main/fxzp_gzbsjtyzx_copy_shape_1_copy_26.png" /></div>
    <div class="abs shape_1_copy" ><img class="ptimg" src="main/fxzp_gzbsjtyzx_copy_shape_1_copy.png" /></div>
    <div class="abs text-layer2" >关注保时捷体验中心</div>
  </div>
  <div class="abs yysj_copy" >
    <div class="abs layer_194" ><img class="ptimg" src="main/fxzp_yysj_copy_layer_194.png" /></div>
    <div class="abs shape_1_copy_26" ><img class="ptimg" src="main/fxzp_yysj_copy_shape_1_copy_26.png" /></div>
    <div class="abs shape_1_copy" ><img class="ptimg" src="main/fxzp_yysj_copy_shape_1_copy.png" /></div>
    <div class="abs text-layer3" >预约体验</div>
  </div>
  <div class="abs fxspclick" >
    <div class="abs layer_192" ><img class="ptimg" src="main/fxzp_fxspclick_layer_192.png" /></div>
    <div class="abs shape_1_copy_26" ><img class="ptimg" src="main/fxzp_fxspclick_shape_1_copy_26.png" /></div>
    <div class="abs shape_1_copy" ><img class="ptimg" src="main/fxzp_fxspclick_shape_1_copy.png" /></div>
    <div class="abs fxsp_copy_3" ><img class="ptimg" src="main/fxzp_fxspclick_fxsp_copy_3.png" /></div>
    <div class="abs text-layer4" >分享视频</div>
  </div>
  <div class="abs gzbsjtyzxclick" >
    <div class="abs layer_193" ><img class="ptimg" src="main/fxzp_gzbsjtyzxclick_layer_193.png" /></div>
    <div class="abs shape_1_copy_26" ><img class="ptimg" src="main/fxzp_gzbsjtyzxclick_shape_1_copy_26.png" /></div>
    <div class="abs shape_1_copy" ><img class="ptimg" src="main/fxzp_gzbsjtyzxclick_shape_1_copy.png" /></div>
    <div class="abs gzbsjtyzx_copy_3" ><img class="ptimg" src="main/fxzp_gzbsjtyzxclick_gzbsjtyzx_copy_3.png" /></div>
    <div class="abs text-layer5" >关注保时捷体验中心</div>
  </div>
  <div class="abs yysjclick" >
    <div class="abs layer_194" ><img class="ptimg" src="main/fxzp_yysjclick_layer_194.png" /></div>
    <div class="abs shape_1_copy_26" ><img class="ptimg" src="main/fxzp_yysjclick_shape_1_copy_26.png" /></div>
    <div class="abs shape_1_copy" ><img class="ptimg" src="main/fxzp_yysjclick_shape_1_copy.png" /></div>
    <div class="abs yyty_copy" ><img class="ptimg" src="main/fxzp_yysjclick_yyty_copy.png" /></div>
    <div class="abs text-layer6" >预约体验</div>
  </div>
  <div class="abs layer_2" ><img class="ptimg" src="main/fxzp_layer_2.png" /></div>
  <div class="abs layer_192_copy" ><img class="ptimg" src="main/fxzp_layer_192_copy.png" /></div>
  <div class="abs layer_191_copy" ><img class="ptimg" src="main/fxzp_layer_191_copy.png" /></div>
</div>
<div class="abs gz" >
  <div class="abs layer_193" ><img class="ptimg" src="main/gz_layer_193.png" /></div>
  <div class="abs qrcode" ><img class="ptimg" src="main/gz_qrcode.png" /></div>
</div>
<div class="abs fx" ><img class="ptimg" src="main/fx.png" /></div>
<div class="abs hy" ><img class="ptimg" src="main/hy.png" /></div>
<div class="abs yl" >
  <div class="abs k" ><img class="ptimg" src="main/yl_k.png" /></div>
  <div class="abs g" ><img class="ptimg" src="main/yl_g.png" /></div>
</div>-->
</div>

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
    var _obj = $('#photo');
    var img = $("#photo-img");
    var manager = new Hammer.Manager(_obj[0]);  	//stage---->表示要加入手势的dom节点
    var Pan = new Hammer.Pan();			//Pan是移动对象实例
    var Pinch = new Hammer.Pinch();		//Pinch是缩放的对象实例

    Pinch.recognizeWith([Pan]);
    manager.add(Pan);
    manager.add(Pinch);
    var deltaX = 0;
    var deltaY = 0;
    var nLeftTemp = 0;
    var nTopTemp = 0;
    var liveScale = 1;
    var currentScale = 1;
    var nWidth = img.width() || 0;
    var nHeight = img.height() || 0;  //获取目标图片的高宽
    var mWidth = _obj.width();
    var mHeight = _obj.height();
    var minScale = 1;
    var screenScale = window.screen.width/1334 //页面图片比例

    //照片居中
    deltaX = (mWidth - nWidth) / 2
    deltaY = (mHeight - nHeight) / 2
    $.Velocity.hook(img, 'translateX', deltaX + 'px');
    $.Velocity.hook(img, 'translateY', deltaY + 'px');
    manager.on('panmove', function (e) {
        var dX = deltaX + e.deltaX;
        var dY = deltaY + e.deltaY;
        $.Velocity.hook(img, 'translateX', dX + 'px');
        $.Velocity.hook(img, 'translateY', dY + 'px');   //注Velocity是动画js库
    });
    manager.on('panend', function (e) {
        borderControl(e);
        scale = currentScale;
    });

    manager.on('pinchmove', function (e) {
        var scale = getRelativeScale(e.scale);
        if(scale > 1){
            scale = 1;
        } //防止图片太糊，这里限制图片放大的最大倍数
        if(scale < minScale){
            scale = minScale;
        }  //不让图片缩小
        $.Velocity.hook(img, 'scale', currentScale);
    });
    manager.on('pinchend', function (e) {
        currentScale = getRelativeScale(e.scale);
        if(currentScale > 1){
            currentScale = 1;
        }

        if(currentScale < minScale){
            currentScale = minScale;
        }
        liveScale = currentScale;
        $.Velocity.hook(img, 'scale', currentScale);  //这里先放缩后然后做边界控制
        nWidth = nWidth*currentScale
        nHeight = nHeight*currentScale
        borderControl(e)
        scale = currentScale;
        //$('#log-info').html('x:'+x+', y:'+y+', scale:'+scale);
    });
    function getRelativeScale(scale) {
        return scale * currentScale;
    }
    function borderControl(e)
    {
        deltaX = deltaX + e.deltaX;
        deltaY = deltaY + e.deltaY;
        var nOffSet = img.offset();  //这行开始下面是控制边界的逻辑
        var nLeft = nOffSet.left;
        var nTop = nOffSet.top;
        var mOffset = _obj.offset();
        var nMaxLeft = mWidth/2 - 205*screenScale
        var nMaxRight = mWidth/2 + 205*screenScale - nWidth
        var nMaxTop = 24*screenScale;
        var nMaxBottom =  624*screenScale - nHeight;

        if ( nLeft < nMaxRight){
            nLeftTemp = nMaxRight;
        }
        else if (nLeft > nMaxLeft){
            nLeftTemp = nMaxLeft;
        }
        else{
            nLeftTemp = nLeft;
        }
        if (nTop < nMaxBottom){
            nTopTemp = nMaxBottom;
        }
        else if (nTop > nMaxTop){
            nTopTemp = nMaxTop;
        }
        else{
            nTopTemp = nTop;
        }
        img.offset({
            left: nLeftTemp,
            top: nTopTemp
        });
        //x = -1*(nLeftTemp);
        //y = -1*(nTopTemp);
    }
})

</script>
</body>
</html>
