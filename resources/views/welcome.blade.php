<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>{{env('APP_NAME')}}</title>
        <link href="/css/app.css" rel="stylesheet" type="text/css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        @php
            $js = \EasyWeChat::js();
        @endphp
    </head>
    <body>
        <div id="app">
            <index></index>
        </div>
        <script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
        <script src="{{mix('js/app.js')}}"></script>
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
        </script>
    </body>
</html>
