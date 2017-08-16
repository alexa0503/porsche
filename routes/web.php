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
    Route::get('/user', function(){
        return session('wechat.oauth_user')->toArray();
    });
    Route::get('/topic', function(){
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
        return view('topic',[
            'rates'=>$rates,
            'numbs' => $numbs
        ]);
    });
    Route::post('/vote', function(){
        $option_id = (int)Request::input('option_id');
        if( $option_id < 1 || $option_id > 3){
            return response(['ret'=>1002,'msg'=>'请选择再投票~']);
        }
        $topic_id = 1;
        $oauth_user = session('wechat.oauth_user');
        $user = App\WechatUser::where('openid', $oauth_user->id)->first();

        DB::beginTransaction();
        try {
            $count = App\Vote::where('topic_id', $topic_id)->where('user_id', $user->id)->lockforupdate()->count();
            if($count > 0){
                return response(['ret'=>1001,'msg'=>'每个人只有一次投票机会哦~']);
            }
            else{
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
    Route::any('/image/{id}', function($id){
        $wechat = app('wechat');
        $temporary = $wechat->material_temporary;
        $content = $temporary->getStream($id);
        $filename = uniqid();
        \Storage::disk('public')->put($filename, $content);
        $extension = image_type_to_extension(exif_imagetype(storage_path('app/public/'.$filename)));
        \Storage::disk('public')->move($filename, $filename.$extension);
        $filename = $filename.$extension;
        $filename1 = uniqid().$extension;
        $filename2 = uniqid().$extension;
        $filename3 = uniqid().$extension;
        $filename4 = uniqid().$extension;

        $file_origin = storage_path('app/public/'.$filename);
        $file1 = storage_path('app/public/'.$filename1);
        $file2 = storage_path('app/public/'.$filename2);
        $file3 = storage_path('app/public/'.$filename3);
        $file4 = storage_path('app/public/'.$filename4);
        $process_command =
            //'convert '.$file_origin.' -charcoal 0.5 '.$file1."\n".
            'convert '.$file_origin.' -colorspace Gray '.$file1."\n".
            'convert '.$file_origin.' -colorspace Gray -paint 12 '.$file2."\n".
            'convert '.$file_origin.' -colorspace Gray -paint 15 '.$file3."\n".
            //'convert '.$file_origin.' -colorspace Gray -paint 30 '.$file4."\n".
            'convert '.$file_origin.' -colorspace Gray -sample 10% -sample 1000% '.$file4;
            //-sigmoidal-contrast 2,0% 亮度
        $process = new Process($process_command);
        $process->start();
        $process->wait();
        //$image = \Image::make(storage_path('app/public/' . $filename));
        return response([
            'ret' => 0,
            'msg' => '',
            'images' => [
                [
                    'url' => asset('storage/' . $filename),
                    'path' => 'storage/' . $filename,
                    'title' => '原图',
                ],
                [
                    'url' => asset('storage/' . $filename1),
                    'path' => 'storage/' . $filename1,
                    'title' => '黑白',
                ],
                [
                    'url' => asset('storage/' . $filename2),
                    'path' => 'storage/' . $filename2,
                    'title' => '油画黑白 效果一',
                ],
                [
                    'url' => asset('storage/' . $filename3),
                    'path' => 'storage/' . $filename3,
                    'title' => '油画黑白 效果二',
                ],
                [
                    'url' => asset('storage/' . $filename4),
                    'path' => 'storage/' . $filename4,
                    'title' => '黑白马赛克 效果',
                ],
            ]
        ]);
    });
});
