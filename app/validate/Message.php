<?php
namespace app\validate;
use think\Validate;

class Message extends Validate
{
    protected $rule =   [
        'name'     => 'require',
        'mobile'   => 'require|mobile',
        'email'    => 'require|email',
    ];

    protected $message =   [
        'name.require'       => '请您称呼必须填写啊',
        'mobile.require'     => '请输入手机号吧！',
        'mobile.mobile'      => '请输入合法手机号！',
        'email.require'      => '请输入邮箱！',
        'email.email'        => '请输入合法邮箱！',
    ];

}