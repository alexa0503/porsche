<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Symfony\Component\Process\Process;

Route::group(['middleware' => ['web', 'wechat.oauth:snsapi_userinfo']], function () {
  Route::get('/', function () {
    return view('index');
  });
  Route::get('/user', function () {
    return session('wechat.oauth_user')->toArray();
  });
  Route::get('/result/{sex?}', function($sex = 'male'){
      return redirect(asset('storage/cartoon/' . session('filename')));
      //return session('filename');
    //return redirect(url('/driver'));
    //return view('result');
  });
  Route::get('/driver', function(){
    //Session::put('filename','599e9c3635663.jpeg');
    return view('driver');
  });
  Route::get('/topic', function () {
    $topic_id = 1;
    $count = App\Vote::where('topic_id', $topic_id)->count();
    $count1 = App\Vote::where('topic_id', $topic_id)->where('option_id', 1)->count();
    $count2 = App\Vote::where('topic_id', $topic_id)->where('option_id', 2)->count();
    $count3 = App\Vote::where('topic_id', $topic_id)->where('option_id', 3)->count();
    $count4 = App\Vote::where('topic_id', $topic_id)->where('option_id', 4)->count();
    $count = $count == 0 ? 1 : $count;
    $rates = [
      ($count1/$count)*100,
      ($count2/$count)*100,
      ($count3/$count)*100,
      ($count4/$count)*100,
    ];
    $numbs = [
      $count1,
      $count2,
      $count3,
      $count4,
    ];
    return view('topic', [
      'rates'=>$rates,
      'numbs' => $numbs,
      'user'=>session('wechat.oauth_user'),
    ]);
  });
  Route::post('/vote', function () {
    $option_id = (int)Request::input('option_id');
    if ($option_id < 1 || $option_id > 4) {
      return response(['ret'=>1002,'msg'=>'请选择再投票~']);
    }
    $topic_id = 1;
    $oauth_user = session('wechat.oauth_user');
    $user = App\WechatUser::where('openid', $oauth_user->id)->first();

    DB::beginTransaction();
    try {
      $count = App\Vote::where('topic_id', $topic_id)->where('user_id', $user->id)->lockforupdate()->count();
      if ($count > 0) {
        return response(['ret'=>1001,'msg'=>'每个人只有一次投票机会哦~']);
      } else {
        $vote = new App\Vote;
        $vote->topic_id = $topic_id;
        $vote->user_id = $user->id;
        $vote->option_id = $option_id;
        $vote->save();
        DB::commit();
        return response(['ret'=>0,'msg'=>'恭喜你，投票成功~']);
      }
    } catch (Exception $e) {
      return response(['ret'=>1003,'msg'=>'抱歉，服务器发生错误~'.$e->getMessage()]);
      DB::rollback();
    }
  });
  //图片卡通化
  Route::any('/cartoon', function(Illuminate\Http\Request $request){
    $scale = $request->scale ? : 1;
    $x = ceil($request->x);
    $y = ceil($request->y);
    $h = ceil($request->h);
    $w = ceil($request->w);
    $angle = round($request->angle,4);
    $filename = session('filename');
    $image = Image::make(storage_path('app/public/' . $filename));

    if($h > $w){
        //1.先旋转
        $image->rotate(-1*$angle-90);
    }

    //缩放
    if($scale != 1){
      $width = $image->width()*$scale;
      $image->resize($width, null, function ($constraint) {
        $constraint->aspectRatio();
      });
    }
    //2.裁切
    if($h > $w){
        $top = $h/2 - 390/2 + $x;
        $left = 32 + $y;
    }
    else{
        $top = $h - 520 - 32 + $x;
        $left = $w/2 - 390/2 + $y;
    }


    if($h > $w){
        $image->crop(520,390,$left,$top);
        $image->rotate(90);
    }
    else{
        $image->crop(390,520,$left,$top);
    }

    $file_cartoon = storage_path('app/public/cartoon/'.$filename);
    $image->save($file_cartoon);
    //$file_origin = storage_path('app/public/'.$filename);
    $process_command =
    'convert -colorspace Gray '.$file_cartoon.' '.$file_cartoon."\n".
    'chmod -R 777 '.$file_cartoon."\n".
    'cartoon -p 60 -e 4 -n 6 '.$file_cartoon.' '.$file_cartoon;
    $process = new Process($process_command);
    $process->start();
    while ($process->isRunning()) {
        // waiting for process to finish
    }
    //$process->wait();
    return response([
      'ret' => 0,
      'msg' => '',
      'images' => [
          'url' => asset('storage/cartoon/' . $filename),
          'path' => 'storage/cartoon/' . $filename,
      ]
    ]);
  });
  //微信客户端获取图片
  Route::any('/wx/{id}', function ($id, Illuminate\Http\Request $request) {
    if($id != 'local'){
      $wechat = app('wechat');
      $temporary = $wechat->material_temporary;
      $content = $temporary->getStream($id);
      $filename = uniqid();
      \Storage::disk('public')->put($filename, $content);
      $extension = image_type_to_extension(exif_imagetype(storage_path('app/public/'.$filename)));
      \Storage::disk('public')->move($filename, $filename.$extension);
      $filename = $filename.$extension;
    }
    else{
      $filename = 'IMG_0612.JPG';
    }
    Session::put('filename',$filename);
    $image = Image::make(storage_path('app/public/' . $filename));
    return response([
      'ret' => 0,
      'msg' => '',
      'data' => [
        'url' => asset('storage/' . $filename),
        'path' => 'storage/' . $filename,
        'width' => $image->width(),
        'height' => $image->height()
      ],
    ]);
  });
});
