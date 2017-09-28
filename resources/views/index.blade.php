<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" type="text/css" href="css/pec.percent-max.css?v=1">
    <script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    </script>
    @php
    $js = \EasyWeChat::js();
    @endphp
</head>
<body onload='init();' class='Preload'>
    <div class="abs clue" id="clue" >
        <div class="abs clue-bg" ></div>
        <div class="abs clue-ctt" ><img class="ptimg" src="images/clue_ctt.png" /></div>
    </div>
    <div id="pageWrap">
        <div class="abs loading_mid" id="loading_mid">
            <div class="abs loading_frm_pct" > </div>
            <div class="abs assets" ><img class="ptimg" src="images/empty.png"  original-data="images/num.png" /></div>
            <div class="abs css-num">
                <div class="abs npp" ><img class="ptimg" src="images/empty.png" original-data="pec/loading_mid_npp.png" /></div>
                <div class="abs npos2 " ><div class="abs inner num_n0"></div>
            </div>
            <div class="abs npos1 " ><div class="abs inner num_n0"></div>
        </div>
    </div>
    <div class="abs txt" ><img class="ptimg" src="images/empty.png" original-data="pec/loading_mid_txt.png" /></div>
    <div class="abs redbar" ><div class="abs inner"><img class="ptimg" src="images/empty.png" original-data="pec/loading_mid_redbar.png" /></div></div>

</div>


<!-------------STT-------------->
<div class="abs game-main-stt">
    <div class="abs n2" >
        <div class="abs m1"><img class="ptimg" src="images/empty.png" original-data="images/m1.png"/></div>
        <div class="abs f1"><img class="ptimg" src="images/empty.png" original-data="images/f1.png"/></div>
        <div class="abs m2"><img class="ptimg" src="images/empty.png" original-data="images/m2.png"/></div>
        <div class="abs f2"><img class="ptimg" src="images/empty.png" original-data="images/f2.png"/></div>
        <div class="abs m3"><img class="ptimg" src="images/empty.png" original-data="images/m3.png"/></div>
        <div class="abs f3"><img class="ptimg" src="images/empty.png" original-data="images/f3.png"/></div>
        <div class="abs m4"><img class="ptimg" src="images/empty.png" original-data="images/m4.png"/></div>
        <div class="abs f4"><img class="ptimg" src="images/empty.png" original-data="images/f4.png"/></div>
        <!--<div class="abs bg" ><img class="ptimg" src="images/empty.png" original-data="pec/n2_bg.png" /></div>-->
        <!--<div class="abs bg" ></div>-->
        <div class="dom-holder"></div>
        <!--<div class="abs gif" ><img class="ptimg" src="images/empty.png" original-data="video/video0txt.gif" /></div>-->

        <div class="abs png_top" ></div>
        <div class="abs btn-start css-btn css-btn-alpha" ><img class="ptimg" src="images/empty.png" original-data="pec/n2_btn-start.png" /></div>
    </div>
    <div class="abs n3" >
        <div class="abs n3-bg" ></div>
        <div class="abs bg-light" ><img class="ptimg" src="images/empty.png" original-data="pec/n3_bg-light.png" /></div>
        <div class="abs btn-1 css-btn" >
            <div class="abs bg" ><img class="ptimg" src="images/empty.png" original-data="pec/n3_btn-1_bg.png" /></div>
            <div class="abs no-sel" ><img class="ptimg" src="images/empty.png" original-data="pec/n3_btn-1_no-sel.png" /></div>
            <div class="abs sel" ><img class="ptimg" src="images/empty.png" original-data="pec/n3_btn-1_sel.png" /></div>
            <div class="abs txt" ><img class="ptimg" src="images/empty.png" original-data="pec/n3_btn-1_txt.png" /></div>
        </div>
        <div class="abs btn-2 css-btn" >
            <div class="abs bg" ><img class="ptimg" src="images/empty.png" original-data="pec/n3_btn-2_bg.png" /></div>
            <div class="abs no-sel" ><img class="ptimg" src="images/empty.png" original-data="pec/n3_btn-2_no-sel.png" /></div>
            <div class="abs sel" ><img class="ptimg" src="images/empty.png" original-data="pec/n3_btn-2_sel.png" /></div>
            <div class="abs txt" ><img class="ptimg" src="images/empty.png" original-data="pec/n3_btn-2_txt.png" /></div>
        </div>
        <div class="abs title" ><img class="ptimg" src="images/empty.png" original-data="pec/n3_title.png" /></div>
        <div class="abs btn-sure css-btn css-btn-alpha" ><img class="ptimg" src="images/empty.png" original-data="pec/n3_btn-sure.png" /></div>
    </div>
    <div class="abs n4" id="hitarea">
        <div class="abs" style="width:100%;height:100%;">
            <img id="image" src="images/empty.png" original-data="images/empty.png"  style="pointer-events:none;" />
        </div>
        <div class="abs big-img" >
            <!--<img src="images/empty.png" original-data="images/big.jpg" />-->
        </div>

        <div class="abs txt-top" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_txt-top.png" /></div>
        <div class="abs n4n1" >
            <div class="abs mask" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_n1_mask.png" /></div>
            <div class="abs face" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_n1_face.png" /></div>
            <div class="abs light" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_n1_light.png" /></div>
            <div class="abs dots" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_n1_dots.png" /></div>
        </div>
        <div class="abs n4n2" >
            <div class="abs mask" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_n2_mask.png" /></div>
            <div class="abs face" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_n2_face.png" /></div>
            <div class="abs light" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_n2_light.png" /></div>
            <div class="abs dots" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_n2_dots.png" /></div>
        </div>
        <div class="abs txt-bottom" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_txt-bottom.png" /></div>
        <div class="abs btn-photo css-btn" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_btn-photo.png" /></div>
        <div class="abs title" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_title.png" /></div>
        <div class="abs btns" >
            <div class="abs btns_frm_pct" > </div>
            <div class="abs btn-sure   css-btn css-btn-alpha" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_btns_btn-sure.png" /></div>
            <div class="abs btn-upload css-btn css-btn-alpha" ><img class="ptimg" src="images/empty.png" original-data="pec/n4_btns_btn-upload.png" /></div>
        </div>
    </div>
    <div class="abs n5" >
        <!--face1--->

        <div class="abs layer_189 face1m" ><img class="ptimg" src="images/empty.png" original-data="pec/face1_m_bg.jpg" /></div>
        <div class="abs layer_189 face1f" ><img class="ptimg" src="images/empty.png" original-data="pec/face1_f_bg.jpg" /></div>

        <!--face1 STT--->
        <div class="abs male" id="pre-male" >
            <div class="abs male-bg" ><img class="ptimg" src="images/empty.png" original-data="face/male_male-bg.png" /></div>
            <div class="abs male-face" ><img class="ptimg" src="images/empty.png" original-data="face/male_male-face.png" /></div>
        </div>
        <div class="abs female" id="pre-female" >
            <div class="abs female-bg" ><img class="ptimg" src="images/empty.png" original-data="face/female_female-bg.png" /></div>
            <div class="abs female-face" ><img class="ptimg" src="images/empty.png" original-data="face/female_female-face.png" /></div>
        </div>
        <!--face1 END--->

        <div class="abs black" ><img class="ptimg" src="images/empty.png" original-data="pec/n5_black.png" /></div>
        <div class="abs btns_" >
            <div class="abs btns_frm_pct" > </div>
            <div class="abs btn-again css-btn css-btn-alpha" ><img class="ptimg" src="images/empty.png" original-data="pec/n5_btns__btn-again.png" /></div>
            <div class="abs bnt-sure  css-btn css-btn-alpha" ><img class="ptimg" src="images/empty.png" original-data="pec/n5_btns__bnt-sure.png" /></div>
        </div>
    </div>
</div>


<div class="abs game-main-body">
    <div class="abs movie-bg" ><img class="ptimg" src="images/empty.png" original-data="images/bg.png" /></div>
    <div class="abs n6 movie" >
        <div class="abs bg" ><!--<img class="ptimg" src="images/empty.png" original-data="pec/n6-movie_bg.png" />--></div>
        <div class="abs title" ><img class="ptimg" src="images/empty.png" original-data="pec/n6-movie_title.png" /></div>
        <div class="abs timeline"></div>
    </div>
    <div class="abs n7 movie" >
        <div class="abs bg" ><!--<img class="ptimg" src="images/empty.png" original-data="pec/n7-movie_bg.png" />--></div>
        <div class="abs title" ><img class="ptimg" src="images/empty.png" original-data="pec/n7-movie_title.png" /></div>
    </div>
    <div class="abs n8" >
        <div class="abs bg" ><img class="ptimg" src="images/empty.png" original-data="pec/n8_bg.jpg" /></div>
        <div class="abs icons" >
            <div class="abs icons_frm_pct" > </div>
            <div class="abs txt" ><img class="ptimg" src="images/empty.png" original-data="pec/n8_icons_txt.png" /></div>
            <div class="abs phone" ><img class="ptimg" src="images/empty.png" original-data="images/turnleft.gif" /></div>
        </div>
    </div>
    <div class="abs n9" >
        <div class="abs bg" ><!--<img class="ptimg" src="images/empty.png" original-data="pec/n9-movie_bg.png" />--></div>
        <div class="abs title" ><img class="ptimg" src="images/empty.png" original-data="pec/n9-movie_title.png" /></div>
    </div>
    <div class="abs n10" >
        <div class="abs bg" ><!--<img class="ptimg" src="images/empty.png" original-data="pec/n10-movie_bg.png" />--></div>
        <div class="abs title" ><img class="ptimg" src="images/empty.png" original-data="pec/n10-movie_title.png" /></div>
    </div>
    <div class="abs n11" >
        <div class="abs bg" ><!--<img class="ptimg" src="images/empty.png" original-data="pec/n11_bg.png" />--></div>
        <div class="abs arrow" ><img class="ptimg" src="images/empty.png" original-data="pec/n11_arrow.png" /></div>
        <div class="abs icons" >
            <div class="abs icons_frm_pct" > </div>
            <div class="abs txt" ><img class="ptimg" src="images/empty.png" original-data="pec/n11_icons_txt.png" /></div>
            <div class="abs hand" >
                <div class="abs hand-gif" ><img class="ptimg" src="images/empty.png" original-data="images/click.gif" /></div>
                <!--<div class="abs hand" ><img class="ptimg" src="images/empty.png" original-data="pec/n11_icons_hand_hand.png" /></div>
                <div class="abs circle-inner" ><img class="ptimg" src="images/empty.png" original-data="pec/n11_icons_hand_circle-inner.png" /></div>
                <div class="abs circle-out" ><img class="ptimg" src="images/empty.png" original-data="pec/n11_icons_hand_circle-out.png" /></div>-->
            </div>
        </div>
        <div class="abs hotarea" ><img class="ptimg" src="images/empty.png" original-data="pec/n11_hotarea.png" /></div>
    </div>
    <div class="abs n12" >
        <div class="abs bg" ><!--<img class="ptimg" src="images/empty.png" original-data="pec/n12-movie_bg.png" />--></div>
        <div class="abs title" ><img class="ptimg" src="images/empty.png" original-data="pec/n12-movie_title.png" /></div>
    </div>
    <div class="abs n13" >
        <div class="abs bg" ><!--<img class="ptimg" src="images/empty.png" original-data="pec/n13-movie_bg.png" />--></div>
        <div class="abs black30" ><img class="ptimg" src="images/empty.png" original-data="pec/n13-movie_black30.png" /></div>
        <div class="abs scan-cartoon_mid" >
            <div class="abs road-white" ><img class="ptimg" src="images/empty.png" original-data="pec/n13-movie_scan-cartoon_mid_road-white.png" /></div>
            <div class="abs red-car" ><img class="ptimg" src="images/empty.png" original-data="pec/n13-movie_scan-cartoon_mid_red-car.png" /></div>
            <div class="abs title1" ><img class="ptimg" src="images/empty.png" original-data="pec/n13-movie_scan-cartoon_mid_title1.png" /></div>
            <div class="abs title2" ><img class="ptimg" src="images/empty.png" original-data="pec/n13-movie_scan-cartoon_mid_title2.png" /></div>
        </div>
    </div>
    <div class="abs movie" >
        <div class="abs bg" ><!--<img class="ptimg" src="images/empty.png" original-data="pec/movie_bg.png" />--></div>
        <div class="abs black-mask" ><img class="ptimg" src="images/empty.png" original-data="pec/movie_black-mask.png" /></div>
        <div class="abs scan-cartoon_mid" >
            <div class="abs bg" ><img class="ptimg" src="images/empty.png" original-data="pec/movie_scan-cartoon_mid_bg.png" /></div>
            <div class="abs title1" ><img class="ptimg" src="images/empty.png" original-data="pec/movie_scan-cartoon_mid_title1.png" /></div>
            <div class="abs title2" ><img class="ptimg" src="images/empty.png" original-data="pec/movie_scan-cartoon_mid_title2.png" /></div>
        </div>
    </div>
</div>

<!-------------END-------------->
<div class="abs game-main-end">
    <div class="abs last" >


        <div class="abs bg" ><img class="ptimg" src="images/empty.png" original-data="pec/share-out_bg.png" /></div>
        <!--<div class="abs photo" ><img class="ptimg" src="images/empty.png" original-data="pec/last_photo.png" /></div>-->
        <div class="abs button" >
            <div class="abs btn-share btn" onclick='window.share.doAni();'><img class="ptimg" src="images/empty.png" original-data="pec/last_button_btn-share.png" /></div>
            <div class="abs btn-notice btn" onclick='window.h5jump.doRoute("b",1); '><img class="ptimg" src="images/empty.png" original-data="pec/last_button_btn-notice.png" /></div>
            <div class="abs btn-quote btn" ><img class="ptimg" src="images/empty.png" original-data="pec/last_button_btn-quote.png" /></div>
        </div>
        <div class="abs lastphoto" >
            <div class="abs female" >
                <div class="abs bg" ><img class="ptimg" src="images/empty.png" original-data="lastPhoto/lastphoto_female_bg.png" /></div>
                <div class="abs black" ><img class="ptimg" src="images/empty.png" original-data="lastPhoto/lastphoto_female_black.png" /></div>
            </div>
            <div class="abs male" >
                <div class="abs bg" ><img class="ptimg" src="images/empty.png" original-data="lastPhoto/lastphoto_male_bg.png" /></div>
                <div class="abs black" ><img class="ptimg" src="images/empty.png" original-data="lastPhoto/lastphoto_male_black.png" /></div>
            </div>
        </div>
        <div class="abs lastDom">
            <!--<div class="abs frame" >-->
            <img class="ptimg frameimg" src="images/empty.png" original-data="lastPhoto/lastphoto_frame.png" />
            <!--</div>-->
        </div>


        <div class="abs female" >
            <div class="abs bg" ><img class="ptimg" src="images/empty.png" original-data="ScreenLast/zhy_female_bg.png" /></div>
            <div class="abs face" >
                <div class="abs black" ><img class="ptimg" src="images/empty.png" original-data="ScreenLast/zhy_female_face_black.png" /></div>
            </div>
        </div>
        <div class="abs male" >
            <div class="abs bg" ><img class="ptimg" src="images/empty.png" original-data="ScreenLast/zhy_male_bg.png" /></div>
            <div class="abs face" >
                <div class="abs black" ><img class="ptimg" src="images/empty.png" original-data="ScreenLast/zhy_male_face_black.png" /></div>
            </div>
        </div>

        <div class="abs title_top" ><img class="ptimg" src="images/empty.png" original-data="pec/last_title_top.png" /></div>
        <div class="abs note" ><img class="ptimg" src="images/empty.png" original-data="pec/last_note.png" /></div>
        <div class="abs arrow" ><img class="ptimg" src="images/empty.png" original-data="pec/last_arrow.png" /></div>
    </div>
    <div class="abs qrcode" >
        <!--<div class="abs bg" ><img class="ptimg" src="images/empty.png" original-data="pec/qrcode_bg.png" /></div>-->
        <div class="abs black-70" ><img class="ptimg" src="images/empty.png" original-data="pec/qrcode_black-70.png" /></div>
        <div class="abs layer_1" ><img class="ptimg" src="images/empty.png" original-data="pec/qrcode_layer_1.png" /></div>
    </div>
    <div class="abs share" >
        <div class="abs black-90" ><!--<img class="ptimg" src="images/empty.png" original-data="pec/share_black-90.png" />--></div>
        <div class="abs timeline"></div>
        <div class="abs txt" ><img class="ptimg" src="images/empty.png" original-data="pec/share_txt.png" /></div>
    </div>
    <div class="abs share-out" >
        <div class="abs bg" >
        </div>
        <div class="abs photo" ><img class="ptimg" src="images/empty.png" original-data="pec/share-out_photo.png" /></div>
        <div class="abs title" ><img class="ptimg" src="images/empty.png" original-data="pec/share-out_title.png" /></div>
        <div class="abs btn-start" ><img class="ptimg" src="images/empty.png" original-data="pec/share-out_btn-start.png" /></div>
    </div>


    <!--	<div class="abs music" >
    <div class="abs music-on_" ><img class="ptimg" src="images/empty.png" original-data="pec/music_music-on_.png" /></div>
    <div class="abs music-off" ><img class="ptimg" src="images/empty.png" original-data="pec/music_music-off.png" /></div>
</div>-->
<!--<div class="abs top" ><img class="ptimg" src="images/empty.png" original-data="pec/top.png" /></div>
--><!--<div class="abs photo-man" ><img class="ptimg" src="images/empty.png" original-data="pec/photo-man.png" /></div>-->
</div>
<div class="abs buffer" >
    <div class="abs buffer1" ><img class="ptimg" src="images/empty.png" /></div>
    <div class="abs buffer2" ><img class="ptimg" src="images/empty.png"  /></div>
</div>
<div class="btm-red-bar-out"><div class="btm-red-bar"></div></div>
</div>

<!--<div class="abs dom-video" id="dom-video">-->
<!--<video id="myVideo" poster="video/video2.jpg" class="video" controls src="video/video2.webm" webkit-playsinline="true" playsinline="true" x-webkit-airplay="allow" x5-video-player-type="h5" x5-video-player-fullscreen="true"></video>
-->
<!--<video id="video" class="video" preload="auto"  poster="video/video2.jpg" src="video/video2.mp4" controls autoplay></video>-->
<!--<video id="video" class="video" preload="auto" playsinline  poster="video/video2.jpg" src="video/video2.mp4" type="video/mp4" ></video>
--><!--<source src="video/video2.webm"></source>-->

<!--<video id="video123" class="video" poster="video/video0loop.jpg" type="video/mp4" playsinline="" x-webkit-airplay="allow" webkit-playsinline="true" x5-video-player-type="h5" x5-video-player-fullscreen="false" src="video/video0loop.mp4" preload="true" style="width: 766.8px; height: 432px;" loop=""></video>
<button id="endBtn">再次播放</button>
</div>-->
<audio style="display:none" id="mp3bg0" class="audio"  loop src="music/btn_.mp3" ></audio>
<audio style="display:none" id="mp3bg1" class="audio"  loop src="music/btn_.mp3" ></audio>
<audio style="display:none" id="mp3btn" class="audio"  src="music/btn_.mp3" ></audio>
<script src="js/jquery.min.js?id=12155"></script>
<script src="js/route.js?id=12155"></script>
<script src="js/preload.js?id=1522"></script>

<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script src="{{asset('js/wx.js')}}"></script>
<script src="{{asset('js/hammer.min.js')}}"></script>
<script>
window.onjqok = function(){ }
/*
domvideo =  document.getElementById("dom-video");
domvideo.style.display="none";
document.addEventListener("WeixinJSBridgeReady", function (){
alert(123)
video =  document.getElementById("video");
video.play();
video.pause();
}, false);

domvideo =  document.getElementById("dom-video");
domvideo.style.display="block";
video =  document.getElementById("video");
video.play();
endBtn.ontouchend = endBtn.onclick = function(){
this.classList.remove('move')
video.play()
}*/
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
</script>

</body>
</html>
