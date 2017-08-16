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
        <div class="well" style="margin-top:10px;">
            <p>dear all… 大家翘首期待的部门team building目前正在前期准备中… 暂定日期为下月22-23两天… 大致行程为22日周五早上出发… 周六23日午餐后回程…此次TB的主旨以休闲娱乐为主… 现初步TB地点如下:</p>
            <p>1、 建德亲水之旅<br/>包括：船游富春江-水上俱乐部（皮划艇、水上摩托等）-大岩寺及新叶古村游览</p>
    <p>2、 舟山捕鱼畅享游<br/>包括：南洞艺谷-蓝堡游艇会（游艇漂移+皮划艇）-舟山出海捕鱼</p>
    <p>3、 宁波九龙湖尊享游<br/>包括：游览郑氏十七房及九龙湖景区-游览杭州湾湿地公园</p>
    <p style="color:red;">备注:每人限投一票</p>
        </div>
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
        title: 'TBTBTBTBTB', //
        desc: '投票投票投票投票票', //
        link: '{{url("/topic")}}', //
        imgUrl: '{{$user->avatar}}' //
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
                    location.reload();
                }
            },"JSON").fail(function() {
                alert( "error" );
            })
        });
    });
    </script>
</body>
</html>
