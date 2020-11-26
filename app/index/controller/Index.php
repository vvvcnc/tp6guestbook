<?php

namespace app\index\controller;

use app\BaseController;
use think\facade\Db;
use think\facade\View;
use app\validate\Message;

class Index extends BaseController
{
    public function index()
    {
//        return View::fetch('index');
        $messageData = Db::name('message')->order('id desc')->paginate(5);
//        print_r($messageData);
        return view('index',[
            'messageData' => $messageData
        ]);
    }

    public function hello1()
    {
        return 'hello123111';
    }

    public function company()
    {
        return View::fetch('index');
    }

    public function message()
    {
        $data = input('post.');
        //$return=['msg'=>'你没有成功','code'=>1];

        try {
            validate(Message::class)->check([
                'name'  => $data['name'],
                'mobile'  => $data['mobile'],
                'email' => $data['email'],
            ]);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            //dump($e->getError());
            //return json($return);
        }



        $data['time'] = time();
        $res = Db::name('message')->insert($data);
        if ($res) {
            return json(['msg'=>'留言成功！我们会尽快与您取得联系！','code'=>1]);
        } else {
            return json(['msg'=>'留言失败！','code'=>0]);
        }
    }
}
