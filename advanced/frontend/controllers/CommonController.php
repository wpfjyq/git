<?php
/**
 * Created by PhpStorm.
 * User: LAN
 * Date: 2017/2/15
 * Time: 16:37
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class CommonController   extends Controller
{

    //公共的样式
   public function init()
   {
       $session=Yii::$app->session;
       $user=$session->get('user');
       if(isset($user)){
           $status=1 ;
       }else{
           $status=0;
       }
//       echo  $this->renderPartial('//layouts/header',['status'=>$status,'username'=>$user['username']]);
   }

   public function check(){
       $session=Yii::$app->session;
       $user=$session->get('user');
       if(!isset($user)){
            echo "<script>alert('请先登录');location.href='?r=login/login'</script>";
       }

   }
}