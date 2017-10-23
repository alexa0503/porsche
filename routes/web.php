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
  Route::get('/result/{id?}', function($id){
    $image = App\Image::find($id);
    if( $image == null ){
        return redirect(url('/'));
    }
    return view('result',['image'=>$image]);
})->name('result');
  Route::get('/driver', function(){
    //Session::put('filename','599e9c3635663.jpeg');
    return view('driver');
  });
  //图片卡通化
  Route::any('/cartoon', function(Illuminate\Http\Request $request){
      //x:463,y:725,h:646,w:1334,angle:0.1447,scale:3.7522900169045625
    $scale = $request->scale ? : 1;
    $x = $request->x;
    $y = $request->y;
    $h = $request->h;
    $w = $request->w;
    $gender = $request->gender ? : 1;
    $angle = round($request->angle,4);
    \Log::info('x:'.$x.',y:'.$y.',h:'.$h.',w:'.$w.',angle:'.$angle.',scale:'.$scale);
    $filename = session('filename');
    $image = Image::make(storage_path('app/public/' . $filename));
    //$angle = -24.8746;
    if($h > $w){
        //1.先旋转
        $image->rotate(-1*$angle-90);
    }
    else{
        $image->rotate(-1*$angle);
    }
    $file_cartoon = storage_path('app/public/cartoon/'.$filename);
    $image->save($file_cartoon);

    //缩放
    if($scale != 1){
      $width = $image->width()*$scale;
      $image->resize($width, null, function ($constraint) {
        $constraint->aspectRatio();
      });
    }
    //2.裁切
    if( $gender == 1 ){
        $face_width = 0.2894;
        $face_height = 0.6813;
        $face_left = 0.3531;
        $face_bttom = 0.0573;
    }
    else{
        $face_width = 0.2901;
        $face_height = 0.6827;
        $face_left = 0.3538;
        $face_bttom = 0.0547;
    }
    if($h > $w){
        $top = $h/2 - 390/2 + $x;
        $left = 32 + $y;
    }
    else{
        //37.08 92.48 31.5 0.13
        //$top = $h - 520 - 32 + $x;
        //$left = $w/2 - 390/2 + $y;
        $top = round($h - 512 - $h*$face_bttom + $x);
        $left = round($w - $w*$face_width - $w*$face_left + $y);
    }


    if($h > $w){
        $image->crop(520,390,$left,$top);
        $image->rotate(90);
    }
    else{
        //$image->crop(390,520,$left,$top);
        $image->crop(round($w*$face_width),round(512),$left,$top);
    }

    $file_cartoon = storage_path('app/public/cartoon/'.$filename);
    $image->save($file_cartoon);
    //$file_origin = storage_path('app/public/'.$filename);
    //convert -modulate 100%,80% input.jpg output.jpg
    $process_command =
    'convert -colorspace Gray '.$file_cartoon.' '.$file_cartoon."\n".
    'chmod -R 777 '.$file_cartoon."\n".
    'convert -modulate 150 '.$file_cartoon.' '.$file_cartoon."\n".
    'convert -contrast 120 '.$file_cartoon.' '.$file_cartoon."\n".
    'cartoon -p 80 -e 4 -n 6 '.$file_cartoon.' '.$file_cartoon;
    $process = new Process($process_command);
    $process->start();
    while ($process->isRunning()) {
        // waiting for process to finish
    }
    $oauth_user = session('wechat.oauth_user');
    $wechat_user = App\WechatUser::where('openid', $oauth_user->id)->first();

    $user_id = null == $wechat_user ? 1 : $wechat_user->id;
    $image = new App\Image;
    $image->user_id = $user_id;
    $image->path = $filename;
    $image->gender = session('gender');
    $image->save();
    //$process->wait();
    return response([
      'ret' => 0,
      'msg' => '',
      'shareUrl' => route('result',$image->id),
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
      $filename = '59ece92471b61.jpeg';
    }
    $gender = $request->get('gender') ? : 1;
    Session::put('filename',$filename);
    Session::put('gender',$gender);
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
