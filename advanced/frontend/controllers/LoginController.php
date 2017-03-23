<?php

/**
 * Created by PhpStorm.
 * User: say
 * Date: 2017/2/14
 * Time: 15:19
 */

namespace frontend\controllers;


use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;
use  \yii\web\SeaAuth;
use  \yii\web\Cookie;


class LoginController extends Controller{
//    public function beforeAction($action){
//        $action = Yii::$app->controller->action->id;
//        $actions = Yii::$app->controller->id;
//        print_r($action);
//        print_r($actions);die;
//        var_dump($action);die;
//        $res =\Yii::$app->user->can($action);
//        var_dump($res);die;
//        if(\Yii::$app->user->can($action)){
//            return true;
//        }else{
//            throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
//        }
//    }
//构造函数
    public $app_key;
    public $app_secret;
    public $back_url;
public function init(){
    $this->app_key = Yii::$app->params['weibo']['app_key'];
    $this->app_secret = Yii::$app->params['weibo']['app_secret'];
    $this->back_url = Yii::$app->params['weibo']['back_url'];
}


    //登录页面的展示
    public function actionLogin(){
        if(\Yii::$app->request->isGet){
            $sea = new SeaAuth($this->app_key , $this->app_secret);
            $weibo_url = $sea->getAuthorizeURL($this->back_url);
            return $this->render('login',array('link'=>$weibo_url));
        }else{
            $re = \Yii::$app->request->post();
            $info = M('user')->selects($re);
//            print_r($info);die;
            if($info){
                if(isset($re['autoLogin'])){
                    $arr=array('user_id'=>$info['user_id'],'username'=>$info['email'],'type'=>$info['type']);
                    $cookies = Yii::$app->response->cookies;
                    $cookies->add(new \yii\web\Cookie([
                        'name' => 'user',
                        'value' => $arr,
                        'expire'=>time()+7*24*60*60
                    ]));

                }

                $session=Yii::$app->session;
                $session->set('user',$arr);
                $session->get('user');
                return  $this->jump('?r=index/index','恭喜你');
           }else{
            return  $this->jump('?r=login/login','密码错误');
           }
        }
    }

    public function actionReset(){
        if(Yii::$app->request->isGet){
            return $this->renderPartial('reset');
        }else{
            $email=Yii::$app->request->post();
            //查询出用户的密码
            $sql="select password from `user` where username='$email[email]'";
            $pwd=Yii::$app->db->createCommand($sql)->queryOne();
            if(!$pwd){
                echo "<script>alert('邮箱错误');location.href='?r=login/reset'</script>";
            }else{
                //发邮件
                $mail= Yii::$app->mailer->compose();
                $mail->setTo($email['email']);
                $mail->setSubject("密码");
                $mail->setTextBody($pwd['password']);   //发布纯文字文本
//                $mail->setHtmlBody("<br>问我我我我我");    //发布可以带html标签的文本
                if($mail->send()){
                    echo "<script>alert('密码已发至邮箱，请查收');location.href='?r=login/login'</script>";
                } else{
                    echo "<script>alert('重置失败');location.href='?r=login/reset'</script>";
                }
            }
        }
    }



}