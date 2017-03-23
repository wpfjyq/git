<?php
namespace frontend\controllers;



use yii\web\Controller;
use Yii;

class SubscController extends Controller{
    public $layout='head';
    public function actionIndex(){
        $sql="select * from job";
        $job=Yii::$app->db->createCommand($sql)->queryAll();
//        print_r($job);die;
        //无限极分类
        $arr=array();
        foreach($job as $k=>$v){
            if($v['job_parent']==0){
                $arr[$v['job_name']]=array();
                foreach($job as $key=>$val){
                    if($val['job_parent']==$v['job_id']){
                        $arr[$v['job_name']][$key][$val['job_name']]=array();
                        foreach($job as $keys=>$values){
                            if($values['job_parent']==$val['job_id']){
                                $arr[$v['job_name']][$key][$val['job_name']][]=$values;
                            }
                        }
                    }
                }
            }
        }
          return $this->render('subscribe',array('arr'=>$arr));
      }
//    function actionTest(){
//        \Yii::$app->cache->set('name','1');

//        $res=\Yii::$app->session->get('user');
//
//        ignore_user_abort(); // run script in background
//        set_time_limit(0); // run script forever
//        $interval=1; // do every 15 minutes…
//        do{
//            $re=  \Yii::$app->cache->get('name');
//            $re=$re+1;
//         \Yii::$app->cache->set('name',$re);
//         sleep($interval); // wait 15 minutes
//     }while(true);
//    }
    function actionInsert(){
        $user=Yii::$app->request->get();
        $user['time']=time();
        $sql="insert into subsc VALUES (null,'$user[email]','$user[day]','$user[select]','$user[city]','$user[tip]','$user[lei]','$user[money]','$user[time]')";
        $res=Yii::$app->db->createCommand($sql)->query();
        if($res){
            echo "1";
        }else{
            echo "2";
        }
    }
    function actionTest(){

        ignore_user_abort(); // run script in background
        set_time_limit(0); // run script forever
        $interval=24*60*60; // do every 15 minutes…
        do{
        $sql="select id ,day ,time from subsc ";
        $res=Yii::$app->db->createCommand($sql)->queryAll();
            $time=time();
        $arr='';
        foreach($res as $key=>$val){
            if(ceil($time-$val['time']/60/60/24)%substr($val['day'],0,1)==0){
                $arr.=','.$val['id'];
            }
        }
        $arr=substr($arr,1);
        $sql2="select * from subsc where id IN ($arr)";
        $res2=Yii::$app->db->createCommand($sql2)->queryAll();
            foreach($res2 as $key =>$val){
            $times=$time-substr($val['day'],0,1)*24*60*60;
      $sql2="select * from `position` where positionName='$val[select]' and positionAddress like '$val[city]%' and salary like '$val[money]' and addtime<'$times'";
            $rew[$val['id']]['msg']=Yii::$app->db->createCommand($sql2)->queryAll();
            $rew[$val['id']]['email']=$val['email'];
        }
            $a='';
            foreach($rew as $key =>$val){
         if(!empty($val['msg'])){
             foreach($val['msg'] as $ke=>$va){
              $a.='工资:'.$va['salary'];
              $a.='职位:'.$va['positionName'];
              $a.='<br>';
             }}}
            $mail= Yii::$app->mailer->compose();
            $mail->setTo($val['email']);
            $mail->setSubject("您好，有关于您的最新职位信息");
 //             $mail->setTextBody($pwd['password']);   //发布纯文字文本
            $mail->setHtmlBody($a);
            $mail->send();
         sleep($interval); // wait 15 minutes
     }while(true);
    }

}