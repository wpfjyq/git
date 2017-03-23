<?php
/**
 * Created by PhpStorm.
 * User: LAN
 * Date: 2017/2/23
 * Time: 20:22
 */

namespace frontend\controllers;
use Yii;
use yii\web\Controller;


class PositionController extends Controller
{
    public $layout='head';
    public $enableCsrfValidation=false;
    public function actionLook(){
        $position_id=Yii::$app->request->get('position');
        //联查
        $session=Yii::$app->session;
        $user=$session->get('user');
        $sql="select * from `position`,company where position_id=$position_id and `position`.company_id=company.company_id ";
        $info=Yii::$app->db->createCommand($sql)->queryOne();
        $info['position_desc']=htmlspecialchars_decode($info['position_desc']);
        if($user){
            $sql="select * from jianli,ujianli where  user_id=$user[user_id] and jianli.jianli_id=ujianli.jianli_id";
            $jianli=Yii::$app->db->createCommand($sql)->queryAll();
            if(!$jianli){
                $jianli=array();
            }
            //查询该职位是否被收藏过
            $sql1="select * from collect where user_id=$user[user_id] and position_id=$position_id";
            $re=Yii::$app->db->createCommand($sql1)->queryOne();
            if($re){
                $info['status']=2;
            }else{
                $info['status']=3;
            }
            $info['user']=1;
        }else{
            $info['user']=0;
            $jianli="";
        }
//        print_r($info);die;
        return $this->render('jobdetail',['info'=>$info,'jianli'=>$jianli]);
    }

    public function actionCollects(){
        $session=Yii::$app->session;
        $user=$session->get('user');
        $position_id=Yii::$app->request->post("position");
//        echo $position_id;die;
        $sql="select * from collect where position_id=$position_id and user_id=$user[user_id]";
        $info=Yii::$app->db->createCommand($sql)->queryOne();
        if($info){
            $sql="delete from collect where position_id=$position_id and user_id=$user[user_id]";
            $re=Yii::$app->db->createCommand($sql)->execute();
            echo 1;
        }else{
            $sql="insert into collect values(null,$position_id,$user[user_id])";
            $re=Yii::$app->db->createCommand($sql)->execute();
            echo 0;
        }
    }



}