<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" type="text/css" href="{{cdn('css/pec.percent-max.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    @if(env('APP_ENV') != 'local')
    var wxData = {
        title: '{{env("WECHAT_SHARE_TITLE")}}', // 分享标题
        desc: '{{env("WECHAT_SHARE_DESC")}}', // 分享描述
        link: '{{url("/")}}', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
        imgUrl: '{{cdn("images/share.jpg")}}' // 分享图标
    };
    @endif
    </script>
    @php
    $js = \EasyWeChat::js();
    @endphp
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109677822-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-109677822-1');
    </script>
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?d5871963e01a1936c8ea6e2d42ae510e";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();

    function track(id){
        //监测代码
        console.log(id);
        _hmt.push(['_trackEvent', 'source', id, 'click']);
        //gtag('send', 'event',id, 'click','label');
        if(id=="btn-start-game"){
            ga('send', 'event', 'button', 'click', 'start');
        }

        //2
        if(id=="soundon"){
            ga('send', 'event', 'button', 'click', 'soundon');
        }
        if(id=="soundoff"){
            ga('send', 'event', 'button', 'click', 'soundoff');
        }


        if(id=="btn-choose-gender-1"){
            ga('send', 'event', 'button', 'click', 'male');
        }
        if(id=="btn-choose-gender-2"){
            ga('send', 'event', 'button', 'click', 'female');
        }
        if(id=="btn-choose-gender-3"){
            if(ABC.gender==1){
                ga('send', 'event', 'button', 'click', 'male');
                //ga('send', 'event', 'button', 'click', 'male-goon');
            }else{
                ga('send', 'event', 'button', 'click', 'female');
                //ga('send', 'event', 'button', 'click', 'female-goon');
            }
        }

        //6+7
        if(id=="btn-photo-1"){
            ga('send', 'event', 'button', 'click', 'takephoto');
        }
        if(id=="btn-photo-2"){
            ga('send', 'event', 'button', 'click', 'preview');
        }

        if(id=="btn-photo-again"){
            ga('send', 'event', 'button', 'click', 'redo');
        }
        if(id=="btn-photo-sure"){
            ga('send', 'event', 'button', 'click', 'confirm');
        }

        //10
        if(id=="btn-game-1"){
            ga('send', 'event', 'button', 'click', 'drift');
        }

        //11
        if(id=="btn-game-2"){
            ga('send', 'event', 'button', 'click', 'sport');
        }

        //12
        //if(id=="btn-photo-sure"){
        //ga('send', 'event', 'button', 'click', 'save');
        //}

        //13


        //14
        if(id=="btn-last-replay"){
            ga('send', 'event', 'button', 'click', 'replay');

        }


        //14
        if(id=="btn-last-quote"){
            ga('send', 'event', 'button', 'click', 'book');

        }

        //15
        if(id=="btn-last-share"){
            ga('send', 'event', 'button', 'click', 'share');
            //ga('send', 'event', 'button', 'click', 'share_success');

        }
        //16
        if(id=="btn-last-notice"){
            ga('send', 'event', 'button', 'click', 'follow');

        }

    }
    </script>
</head>
<body onload='init();' class='Preload'>
    <div class="abs clue" id="clue" >
        <div class="abs clue-bg" ></div>
        <div class="abs clue-ctt" ><img class="ptimg" src="{{cdn('images/clue_ctt.png')}}" /></div>
    </div>
    <div id="pageWrap">
        <div class="abs loading_mid" id="loading_mid">
  <div class="abs loading_frm_pct" > </div>
  <div class="abs assets" ><img class="ptimg" src="{{cdn('images/num.png')}}" /></div>
  <div class="abs css-num">
		<div class="abs npp" ><img class="ptimg" src="{{cdn('pec/loading_mid_npp.png')}}" /></div>
		<div class="abs npos2 " ><div class="abs inner num_n0"></div>
		</div>
		<div class="abs npos1 " ><div class="abs inner num_n0"></div>
		</div>
  </div>
  <div class="abs txt" ><img class="ptimg" src="{{cdn('pec/loading_mid_txt.png')}}" /></div>
  <div class="abs redbar" ><div class="abs inner"><img src="{{cdn('pec/loading_mid_redbar.png')}}" /></div></div>

</div>


<!-------------STT-------------->
<div class="abs game-main-stt">
    <div class="abs n2" >
        <div class="abs m1"><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/m1.png')}}"/></div>
        <div class="abs f1"><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/f1.png')}}"/></div>
        <div class="abs m2"><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/m2.png')}}"/></div>
        <div class="abs f2"><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/f2.png')}}"/></div>
        <div class="abs m3"><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/m3.png')}}"/></div>
        <div class="abs f3"><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/f3.png')}}"/></div>
        <div class="abs m4"><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/m4.png')}}"/></div>
        <div class="abs f4"><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/f4.png')}}"/></div>
        <!--<div class="abs bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n2_bg.png')}}" /></div>-->
        <!--<div class="abs bg" ></div>-->
        <div class="dom-holder"></div>
        <!--<div class="abs gif" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('video/video0txt.gif')}}" /></div>-->

        <div class="abs png_top" ></div>
        <div class="abs btn-start css-btn css-btn-alpha" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n2_btn-start.png')}}" /></div>
    </div>
    <div class="abs n3" >
        <div class="abs n3-bg" ></div>
        <div class="abs bg-light" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n3_bg-light.png')}}" /></div>
        <div class="abs btn-1 css-btn" >
            <div class="abs bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n3_btn-1_bg.png')}}" /></div>
            <div class="abs no-sel" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n3_btn-1_no-sel.png')}}" /></div>
            <div class="abs sel" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n3_btn-1_sel.png')}}" /></div>
            <div class="abs txt" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n3_btn-1_txt.png')}}" /></div>
        </div>
        <div class="abs btn-2 css-btn" >
            <div class="abs bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n3_btn-2_bg.png')}}" /></div>
            <div class="abs no-sel" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n3_btn-2_no-sel.png')}}" /></div>
            <div class="abs sel" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n3_btn-2_sel.png')}}" /></div>
            <div class="abs txt" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n3_btn-2_txt.png')}}" /></div>
        </div>
        <div class="abs title" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n3_title.png')}}" /></div>
        <div class="abs btn-sure css-btn css-btn-alpha" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n3_btn-sure.png')}}" /></div>
    </div>
    <div class="abs n4" id="hitarea">
        <div class="abs" style="width:100%;height:100%;">
            <img id="image" src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/empty.png')}}"  style="pointer-events:none;" />
        </div>
        <div class="abs big-img" >
            <!--<img src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/big.jpg')}}" />-->
        </div>

        <div class="abs txt-top" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_txt-top.png')}}" /></div>
        <div class="abs n4n1" >
            <div class="abs mask" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_n1_mask.png')}}" /></div>
            <div class="abs face" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_n1_face.png')}}" /></div>
            <div class="abs light" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_n1_light.png')}}" /></div>
            <div class="abs dots" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_n1_dots.png')}}" /></div>
        </div>
        <div class="abs n4n2" >
            <div class="abs mask" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_n2_mask.png')}}" /></div>
            <div class="abs face" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_n2_face.png')}}" /></div>
            <div class="abs light" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_n2_light.png')}}" /></div>
            <div class="abs dots" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_n2_dots.png')}}" /></div>
            <!--<div id="logInfo" style="z-index:1100;color:#fff;"></div>-->
        </div>
        <div class="abs txt-bottom" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_txt-bottom.png')}}" /></div>
        <!--<div class="abs btn-photo css-btn" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_btn-photo.png')}}" /></div>-->
        <div class="abs title" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_title.png')}}" /></div>
        <div class="abs btns" >
            <div class="abs btns_frm_pct" > </div>
            <div class="abs btn-sure   css-btn css-btn-alpha" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_btns_btn-sure.png')}}" /></div>
            <div class="abs btn-upload css-btn css-btn-alpha" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n4_btns_btn-upload.png')}}" /></div>
        </div>
    </div>
    <div class="abs n5" >
        <!--face1--->

        <div class="abs layer_189 face1m" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/face1_m_bg.jpg')}}" /></div>
        <div class="abs layer_189 face1f" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/face1_f_bg.jpg')}}" /></div>

        <!--face1 STT--->
        <div class="abs male" id="pre-male" >
            <div class="abs male-bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('face/male_male-bg.png')}}" /></div>
            <div class="abs male-face" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('face/male_male-face.png')}}" /></div>
        </div>
        <div class="abs female" id="pre-female" >
            <div class="abs female-bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('face/female_female-bg.png')}}" /></div>
            <div class="abs female-face" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('face/female_female-face.png')}}" /></div>
        </div>
        <!--face1 END--->

        <div class="abs black" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n5_black.png')}}" /></div>
        <div class="abs btns_"  style="z-index:2000;">
            <div class="abs btns_frm_pct" > </div>
            <div class="abs btn-again css-btn css-btn-alpha" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n5_btns__btn-again.png')}}" /></div>
            <div class="abs bnt-sure  css-btn css-btn-alpha" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n5_btns__bnt-sure.png')}}" /></div>
        </div>
    </div>
</div>


<div class="abs game-main-body">
    <div class="abs movie-bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/bg.png')}}" /></div>
    <div class="abs n6 movie" >
        <div class="abs bg" ><!--<img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n6-movie_bg.png')}}" />--></div>
        <div class="abs timeline"></div>
    </div>
    <div class="abs n7 movie" >
        <div class="abs bg" ><!--<img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n7-movie_bg.png')}}" />--></div>
    </div>
    <div class="abs n8" >
        <div class="abs bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n8_bg.jpg')}}" /></div>
        <div class="abs icons" >
            <div class="abs icons_frm_pct" > </div>
            <div class="abs txt" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n8_icons_txt.png')}}" /></div>
            <div class="abs phone" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/turnleft.gif')}}" /></div>
        </div>
    </div>
    <div class="abs n9" >
        <div class="abs bg" ><!--<img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n9-movie_bg.png')}}" />--></div>
    </div>
    <div class="abs n10" >
        <div class="abs bg" ><!--<img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n10-movie_bg.png')}}" />--></div>
    </div>
    <div class="abs n11" >
        <div class="abs bg" ><!--<img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n11_bg.png')}}" />--></div>
        <div class="abs arrow" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n11_arrow.png')}}" /></div>
        <div class="abs icons" >
            <div class="abs icons_frm_pct" > </div>
            <div class="abs txt" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n11_icons_txt.png')}}" /></div>
            <div class="abs hand" >
                <div class="abs hand-gif" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('images/click.gif')}}" /></div>
                <!--<div class="abs hand" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n11_icons_hand_hand.png')}}" /></div>
                <div class="abs circle-inner" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n11_icons_hand_circle-inner.png')}}" /></div>
                <div class="abs circle-out" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n11_icons_hand_circle-out.png')}}" /></div>-->
            </div>
        </div>
        <div class="abs hotarea" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/n11_hotarea.png')}}" /></div>
    </div>

    <div class="abs movie" >
        <div class="abs bg" ><!--<img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/movie_bg.png')}}" />--></div>
        <div class="abs black-mask" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/movie_black-mask.png')}}" /></div>
        <div class="abs scan-cartoon_mid" >
            <div class="abs bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/movie_scan-cartoon_mid_bg.png')}}" /></div>
            <div class="abs title1" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/movie_scan-cartoon_mid_title1.png')}}" /></div>
            <div class="abs title2" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/movie_scan-cartoon_mid_title2.png')}}" /></div>
        </div>
    </div>
</div>

<!-------------END-------------->
<div class="abs game-main-end">
    <div class="abs last" >


        <div class="abs bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/share-out_bg.png')}}" /></div>
        <!--<div class="abs photo" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/last_photo.png')}}" /></div>-->
        <div class="abs button" >
            <div class="abs btn-share btn" onclick='window.share.doAni();track("btn-last-share");'><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/last_button_btn-share.png')}}" /></div>
            <div class="abs btn-notice btn" onclick='window.h5jump.doRoute("b",1);track("btn-last-notice");'><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/last_button_btn-notice.png')}}" /></div>
            <div class="abs btn-quote btn" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/last_button_btn-quote.png')}}" /></div>
        </div>
        <div class="abs lastphoto" >
            <div class="abs female" >
                <div class="abs bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('lastPhoto/lastphoto_female_bg.png')}}" /></div>
                <div class="abs black" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('lastPhoto/lastphoto_female_black.png')}}" /></div>
            </div>
            <div class="abs male" >
                <div class="abs bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('lastPhoto/lastphoto_male_bg.png')}}" /></div>
                <div class="abs black" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('lastPhoto/lastphoto_male_black.png')}}" /></div>
            </div>
        </div>
        <div class="abs lastDom">
            <!--<div class="abs frame" >-->
            <img class="ptimg frameimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('lastPhoto/lastphoto_frame.png')}}" />
            <!--</div>-->
			<div class="abs replay" onclick="window.cn5.replay();track('btn-last-replay')"><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('lastPhoto/lastphoto_replay.png')}}" /></div>
	  </div>


        <div class="abs female" >
            <div class="abs bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('ScreenLast/zhy_female_bg.png')}}" /></div>
            <div class="abs face" >
                <div class="abs black" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('ScreenLast/zhy_female_face_black.png')}}" /></div>
            </div>
        </div>
        <div class="abs male" >
            <div class="abs bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('ScreenLast/zhy_male_bg.png')}}" /></div>
            <div class="abs face" >
                <div class="abs black" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('ScreenLast/zhy_male_face_black.png')}}" /></div>
            </div>
        </div>

        <div class="abs title_top" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/last_title_top.png')}}" /></div>
        <div class="abs note" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/last_note.png')}}" /></div>
        <div class="abs arrow" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/last_arrow.png')}}" /></div>
    </div>
    <div class="abs qrcode" >
        <!--<div class="abs bg" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/qrcode_bg.png')}}" /></div>-->
        <div class="abs black-70" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/qrcode_black-70.png')}}" /></div>
        <div class="abs layer_1" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/qrcode_layer_1.png')}}" /></div>
    </div>
    <div class="abs share" >
        <div class="abs black-90" ><!--<img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/share_black-90.png')}}" />--></div>
        <div class="abs timeline"></div>
        <div class="abs txt" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/share_txt.png')}}" /></div>
    </div>
    <div class="abs share-out" >
        <div class="abs bg" >
        </div>
        <div class="abs photo" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/share-out_photo.png')}}" /></div>
        <div class="abs title" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/share-out_title.png')}}" /></div>
        <div class="abs btn-start" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/share-out_btn-start.png')}}" /></div>
    </div>


    <!--	<div class="abs music" >
    <div class="abs music-on_" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/music_music-on_.png')}}" /></div>
    <div class="abs music-off" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/music_music-off.png')}}" /></div>
</div>-->
<!--<div class="abs top" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/top.png')}}" /></div>
--><!--<div class="abs photo-man" ><img class="ptimg" src="{{cdn('images/empty.png')}}" original-data="{{cdn('pec/photo-man.png')}}" /></div>-->
</div>
<div class="abs buffer" >
    <div class="abs buffer1" ><img class="ptimg" src="{{cdn('images/empty.png')}}" /></div>
    <div class="abs buffer2" ><img class="ptimg" src="{{cdn('images/empty.png')}}"  /></div>
</div>
<div class="btm-red-bar-out"><div class="btm-red-bar"></div></div>
<div class="abs music_icon" id="music_icon">
  <div class="abs music_off" onclick="Preload.me.click_music_off();track('soundon');"><img class="ptimg" src="{{cdn('/images/music_icon/music_icon_music_off.png')}}" /></div>
  <div class="abs music_on" onclick="Preload.me.click_music_on();track('soundoff');"><img class="ptimg" src="{{cdn('/images/music_icon/music_icon_music_on.png')}}" /></div>
</div>
</div>
<div class="right-bottom-banner">
	<div class="abs b21" >
	  <div class="abs banner" ><img class="ptimg" src="{{cdn('/banner/b21_banner.png')}}" /></div>
	</div>
	<div class="abs b22" >
	  <div class="abs banner" ><img class="ptimg" src="{{cdn('/banner/b22_banner.png')}}" /></div>
	</div>
	<div class="abs b51" >
	  <div class="abs banner" ><img class="ptimg" src="{{cdn('/banner/b51_banner.png')}}" /></div>
	</div>
	<div class="abs b52" >
	  <div class="abs banner" ><img class="ptimg" src="{{cdn('/banner/b52_banner.png')}}" /></div>
	</div>
	<div class="abs b72" >
	  <div class="abs banner" ><img class="ptimg" src="{{cdn('/banner/b72_banner.png')}}" /></div>
	</div>
</div>
<!--<div class="abs dom-video" id="dom-video">-->
<!--<video id="myVideo" poster="{{cdn('video/video2.jpg')}}" class="video" controls src="video/video2.webm" webkit-playsinline="true" playsinline="true" x-webkit-airplay="allow" x5-video-player-type="h5" x5-video-player-fullscreen="true"></video>
-->
<!--<video id="video" class="video" preload="auto"  poster="{{cdn('video/video2.jpg')}}" src="video/video2.mp4" controls autoplay></video>-->
<!--<video id="video" class="video" preload="auto" playsinline  poster="{{cdn('video/video2.jpg')}}" src="video/video2.mp4" type="video/mp4" ></video>
--><!--<source src="video/video2.webm"></source>-->

<!--<video id="video123" class="video" poster="{{cdn('video/video0loop.jpg')}}" type="video/mp4" playsinline="" x-webkit-airplay="allow" webkit-playsinline="true" x5-video-player-type="h5" x5-video-player-fullscreen="false" src="video/video0loop.mp4" preload="true" style="width: 766.8px; height: 432px;" loop=""></video>
<button id="endBtn">再次播放</button>
</div>-->
<audio style="display:none" id="mp3bg0" class="audio"  loop src="{{cdn('music/empty.mp3')}}" ></audio>
<audio style="display:none" id="mp3bg1" class="audio"  loop src="{{cdn('music/empty.mp3')}}" ></audio>
<audio style="display:none" id="mp3bg2" class="audio"  loop src="{{cdn('music/empty.mp3')}}" ></audio>
<audio style="display:none" id="mp3btn" class="audio"  src="{{cdn('music/btn_.mp3')}}" ></audio>
<script src="{{cdn('js/jquery.min.js')}}"></script>
<script src="{{cdn('js/route.js')}}"></script>
<script src="{{cdn('js/preload.js')}}"></script>

<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script src="{{cdn('js/wx.js')}}"></script>
<script src="{{cdn('js/hammer.min.js')}}"></script>
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
wxShare(wxData);
@endif
</script>

</body>
</html>
