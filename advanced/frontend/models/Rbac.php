<?php
/**
 * Created by PhpStorm.
 * User: say
 * Date: 2017/2/19
 * Time: 20:11
 */

namespace frontend\models;


class Rbac extends \yii\base\Model
{
    public $power;
    public $role;
    public $user;

    public function rules()
    {
        return [
            // 在这里定义验证规则
        ];
    }

    public function attributeLabels()
    {
        return [
            'power'=>'权限',
            'role'=>'角色',
            'user'=>'用户',
        ];
    }

}
