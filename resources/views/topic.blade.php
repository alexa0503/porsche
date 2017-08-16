<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <div id="app" class="container">
        <div class="" style="position:absolute;top:20px;right:20px;"><img class="img-circle" src="{{$user->avatar}}" width="100" height="100" /></div>
        <div class="rows">
            <h3>TB投票</h3>
            <div class="radio">
                <label>
                    <input type="radio" name="option_id" id="optionsRadios1" value="1" checked>
                    1、建德亲水之旅2日
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="option_id" id="optionsRadios2" value="2">
                    2、舟山捕鱼畅享2日
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="option_id" id="optionsRadios3" value="3">
                    3、宁波九龙湖尊享2日
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="option_id" id="optionsRadios3" value="4">
                    4、不参加
                </label>
            </div>
            <div><button class="btn btn-primary" id="submit-01">确定投票</button></div>
        </div>
        <div class="rows">
            <h3>投票结果</h3>
            <label>1、建德亲水之旅2日 ({{$numbs[0]}}票)</label>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;width:{{$rates[0]}}%;">
                    {{sprintf('%.2f',$rates[0])}}%
                </div>
            </div>
            <label>2、舟山捕鱼畅享2日 ({{$numbs[1]}}票)</label>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{$rates[1]}}%;">
                    {{sprintf('%.2f',$rates[1])}}%
                </div>
            </div>
            <label>3、宁波九龙湖尊享2日 ({{$numbs[2]}}票)</label>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{$rates[2]}}%;">
                    {{sprintf('%.2f',$rates[2])}}%
                </div>
            </div>
            <label>4、不参加 ({{$numbs[3]}}票)</label>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{$rates[3]}}%;">
                    {{sprintf('%.2f',$rates[3])}}%
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script src="{{asset('js/wx.js')}}"></script>

    <script>
    @if(env('APP_ENV') != 'local')
    wx.config({!! $js->config(array('onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ', 'onMenuShareWeibo','chooseImage','uploadImage','downloadImage'), false) !!});
    var wxData = {
        title: '{{env("WECHAT_SHARE_TITLE")}}', // 分享标题
        desc: '{{env("WECHAT_SHARE_DESC")}}', // 分享描述
        link: '{{url("/topic")}}', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
        imgUrl: '{{asset("share.jpg")}}' // 分享图标
    };
    wxShare(wxData);
    @endif
    $().ready(function(){
        $('#submit-01').on('click',function(){
            var url = '{{url("vote")}}';
            var option_id = $("input[name='option_id']:checked").val();
            $.post(url,{_token:window.Laravel.csrfToken,option_id:option_id},function(data){
                alert(data.msg);
                if(data.ret == 0){
                    window.location.reload();
                }
            },"JSON").fail(function() {
                alert( "error" );
            })
        });
    });
    </script>
</body>
</html>
