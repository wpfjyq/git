<?php
/**
 * Created by PhpStorm.
 * User: LAN
 * Date: 2017/2/16
 * Time: 12:12
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class CheckController extends Controller
{
    public function init(){
        $session=Yii::$app->session;
        $user=$session->get('user');
        if(!isset($user)){
            echo "<script>alert('请先登录');location.href='?r=login/login'</script>";
        }

    }
}