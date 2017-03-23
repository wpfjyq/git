<?php
/**
 * Created by PhpStorm.
 * User: say
 * Date: 2017/2/14
 * Time: 15:23
 */

namespace frontend\controllers;
use frontend\models\User;
use yii\web\Controller;
class RegisterController extends Controller{
    //注册页面的展示
    public $enableCsrfValidation=false;
    public function actionRegister(){
        if(\Yii::$app->request->isGet){
            return $this->renderPartial('register');
        }else{
            $re=\Yii::$app->request->post();
            $re['username'] = $re['email'];
            $ip = $_SERVER["REMOTE_ADDR"];
            $time = time();
            $re['last_time']=$time;
            $re['reg_time']=$time;
            $re['last_ip']=$ip;
            unset($re['checkbox']);
            $info = M('user')->add($re);
            if($info){
                return $this->jump('?r=login/login','注册成功');
            }else{

                return $this->jump('?r=register/register','注册失败');
            }
        }
    }
    //注册页面数据处理
    public function actionRegister_pro(){

    }
}