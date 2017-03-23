<?php
/**
 * Created by PhpStorm.
 * User: LAN
 * Date: 2017/2/14
 * Time: 15:13
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
//use frontend\models\User;

class RegisterController extends Controller
{
    //绕开csrf
    public $enableCsrfValidation=false;
    public function actionRegister(){
//        $user=new User;
        if(Yii::$app->request->isGet){
            return $this->renderPartial('register');
        }else{
            $info['type']=Yii::$app->request->post('type');
            $info['username']=Yii::$app->request->post('email');
            $info['password']=Yii::$app->request->post('password');
            $info['last_ip']=$_SERVER['SERVER_ADDR'];
            $info['reg_time']=time();
            $obj=Yii::$app->db->createCommand();
            $re=$obj->insert('user',$info)->execute();
            $id=Yii::$app->db->getLastInsertID($re);
//            echo $id;die;
                if($re){
                    //设置session
                    $session=Yii::$app->session;
                    $session->set('user',array('user_id'=>$id,'username'=>$info['username'],'type'=>$info['type']));
                     $this->redirect('?r=index/index');
                }else{
                    echo "<script>alert('注册失败');location.href='?r=register/register'</script>";
                }
        }

    }

     public function actionCheck(){
         $username=Yii::$app->request->post('username');
         $sql="select username from `user` where username='$username'";
         $re=Yii::$app->db->createCommand($sql)->queryOne();
         if($re){
            echo 0;
         }else{
             echo 1;
         }


     }


}