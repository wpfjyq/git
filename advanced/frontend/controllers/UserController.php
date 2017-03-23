<?php
/**
 * Created by PhpStorm.
 * User: LAN
 * Date: 2017/2/15
 * Time: 16:07
 */

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use \yii\web\Cookie;
class UserController extends Controller

{
    public $layout='head';
    public $enableCsrfValidation=false;
    public function actionAccountbind(){
        $session=Yii::$app->session;
        $user=$session->get('user');
        return $this->render('accountBind',['username'=>$user['username']]);
    }

    public function actionPwdup(){
        if(Yii::$app->request->isGet){
            $session=Yii::$app->session;
            $user=$session->get('user');
            return $this->render('updatePwd',['user'=>$user]);
        }else{
            $user=Yii::$app->request->post('user');
            $new=Yii::$app->request->post('newpassword');
            $sql="update `user` set password='$new' where user_id=$user";
            $re=Yii::$app->db->createCommand($sql)->query();
            if($re){
                echo "<script>alert('修改成功');location.href='?r=user/pwdup'</script>";
            }else{
                echo "<script>alert('修改失败');location.href='?r=user/pwdup'</script>";
            }


        }

    }


    public function actionCheckpwd(){
        $old=Yii::$app->request->post('oldpassword');
        $user=Yii::$app->request->post('user_id');
        $sql="select password from `user` where user_id=$user";
        $re=Yii::$app->db->createCommand($sql)->queryOne();
        if($re['password']==$old){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function actionJianli(){





        $session=Yii::$app->session;
        $user=$session->get('user');
        if(!isset($user)){
            echo "<script>alert('请先登录');location.href='?r=login/login'</script>";die;
        }
        $sql="select * from jianli,ujianli  where user_id=$user[user_id] and jianli.jianli_id=ujianli.jianli_id";
        $jianli=Yii::$app->db->createCommand($sql)->queryAll();
//        print_r($jianli);die;
        return $this->render('ujianli',['jianli'=>$jianli]);
    }


    public function actionUjianli(){
        $position=Yii::$app->request->get('position');
        return $this->render('jianli');
    }


    public function actionAddjian1(){
        $name=Yii::$app->request->post('name');
        $sex=Yii::$app->request->post('sex');
        $education=Yii::$app->request->post('highestEducation');
        $year=Yii::$app->request->post('workYear');
        $status=Yii::$app->request->post('status');
        $email=Yii::$app->request->post('email');
        $tel=Yii::$app->request->post('phone');
        $ids=Yii::$app->request->post('jianid');
        $img=Yii::$app->request->post('img');
        $session=Yii::$app->session;
        $user=$session->get('user');
        $add_time=time();
        if(empty($ids)){
            $sql="insert into jianli(`name`,sex,education,`year`,tell,email,status,addtime,img) values('$name','$sex','$education','$year','$tel','$email','$status','$add_time','$img');";
            $re=Yii::$app->db->createCommand($sql)->execute();
            $jianli_id=Yii::$app->db->getLastInsertID($re);
            if($re){
                $sql="insert into ujianli values(null,'$user[user_id]','$jianli_id')";
                $res=Yii::$app->db->createCommand($sql)->execute();
                if($res){
                    $info['ids']=$jianli_id;
                    $info['error']=0;
                    $info['msg']="保存成功";
                }else{
                    $info['ids']=$jianli_id;
                    $info['error']=1;
                    $info['msg']="保存失败";
                }
            }else{
                $info['ids']=$jianli_id;
                $info['error']=1;
                $info['msg']="保存失败";
            }
        }else{
            $sql="update jianli set `name`='$name',`sex`='$sex',education='$education',`year`='$year',tell='$tel',email='$email',status='$status',addtime='$add_time',img='$img' where jianli_id=$ids";
            $re=Yii::$app->db->createCommand($sql)->execute();
            if($re){
                $info['ids']=$ids;
                $info['error']=0;
                $info['msg']="保存成功";
            }else{
                $info['ids']=$ids;
                $info['error']=1;
                $info['msg']="保存失败";
            }
        }
        echo json_encode($info);
    }

    public function actionAddjian2(){
        $city=Yii::$app->request->post('city');
        $nature=Yii::$app->request->post('positionType');
        $hope_work=Yii::$app->request->post('positionName');
        $money=Yii::$app->request->post('salarys');
        $ids=Yii::$app->request->post('jianid');
//        print_r($ids);die;
        $sql="update jianli set city='$city',nature='$nature',hope_work='$hope_work',money='$money' where jianli_id=$ids";
        $re=Yii::$app->db->createCommand($sql)->execute();
        if($re){
            $info['error']=0;
            $info['msg']="保存成功";
        }else{
            $info['error']=1;
            $info['msg']="保存失败";
        }

        echo json_encode($info);
    }

    public function actionAddjian3(){
        $company_name=Yii::$app->request->post('companyName');
        $position_name=Yii::$app->request->post('positionName');
        $startY=Yii::$app->request->post('startYear');
        $startM=Yii::$app->request->post('startMonth');
        $endY=Yii::$app->request->post('endYear');
        $endM=Yii::$app->request->post('endMonth');
        $ids=Yii::$app->request->post('jianid');
        $e_year=$startY.".".$startM."-".$endY.".".$endM;
        $sql="update jianli set company_name='$company_name',position_name='$position_name',e_year='$e_year' where jianli_id=$ids";
        $re=Yii::$app->db->createCommand($sql)->execute();
        if($re){
            $info['error']=0;
            $info['msg']="保存成功";
        }else{
            $info['error']=1;
            $info['msg']="保存失败";
        }

        echo json_encode($info);
    }

    public function actionAddjian4(){
        $project_name=Yii::$app->request->post('projectName');
        $p_name=Yii::$app->request->post('positionName');
        $startYear=Yii::$app->request->post('startYear');
        $startMonth=Yii::$app->request->post('startMonth');
        $endYear=Yii::$app->request->post('endYear');
        $endMonth=Yii::$app->request->post('endMonth');
        $p_desc=Yii::$app->request->post('projectRemark');
        $ids=Yii::$app->request->post('jianid');
        $p_year=$startYear.".".$startMonth."-".$endYear.".".$endMonth;
        $sql="update jianli set project_name='$project_name',p_name='$p_name',p_year='$p_year',p_desc='$p_desc' where jianli_id=$ids";
        $re=Yii::$app->db->createCommand($sql)->execute();
        if($re){
            $info['error']=0;
            $info['msg']="保存成功";
        }else{
            $info['error']=1;
            $info['msg']="保存失败";
        }
        echo json_encode($info);
    }

    public function actionAddjian5(){
        $s_name=Yii::$app->request->post('schoolName');
        $s_education=Yii::$app->request->post('education');
        $profession=Yii::$app->request->post('professional');
        $startY=Yii::$app->request->post('startYear');
        $endY=Yii::$app->request->post('endYear');
        $ids=Yii::$app->request->post('jianid');
        $s_year=$startY."-".$endY;
        $sql="update jianli set s_name='$s_name',s_education='$s_education',profession='$profession',s_year='$s_year' where jianli_id=$ids";
        $re=Yii::$app->db->createCommand($sql)->execute();
        if($re){
            $info['error']=0;
            $info['msg']="保存成功";
        }else{
            $info['error']=1;
            $info['msg']="保存失败";
        }
        echo json_encode($info);
    }

    public function actionAddjian6(){
        $my_desc=Yii::$app->request->post('myRemark');
        $ids=Yii::$app->request->post('jianid');
        $sql="update jianli set my_desc='$my_desc' where jianli_id=$ids";
        $re=Yii::$app->db->createCommand($sql)->execute();
        if($re){
            $info['error']=0;
            $info['msg']="保存成功";
        }else{
            $info['error']=1;
            $info['msg']="保存失败";
        }
        echo json_encode($info);

    }

    public function actionAddjian7(){
        $pro_url=Yii::$app->request->post('url');
        $pro_desc=Yii::$app->request->post('workName');
        $ids=Yii::$app->request->post('jianid');
        $sql="update jianli set pro_url='$pro_url',pro_desc='$pro_desc' where jianli_id=$ids";
        $re=Yii::$app->db->createCommand($sql)->execute();
        if($re){
            $info['error']=0;
            $info['msg']="保存成功";
        }else{
            $info['error']=1;
            $info['msg']="保存失败";
        }
        echo json_encode($info);

    }

    public function actionJname(){
        $jian_name=Yii::$app->request->post('resumeName');
        $ids=Yii::$app->request->post('jianid');
        $sql="update jianli set jian_name='$jian_name' where jianli_id=$ids";
        $re=Yii::$app->db->createCommand($sql)->execute();
        if($re){
            $info['error']=0;
            $info['msg']="保存成功";
        }else{
            $info['error']=1;
            $info['msg']="保存失败";
        }
        echo json_encode($info);
    }

    public function actionLook(){
        $jianli_id=Yii::$app->request->get('jianli_id');
        $sql="select * from jianli where jianli_id=$jianli_id";
        $info=Yii::$app->db->createCommand($sql)->queryOne();
        return $this->render('preview',['info'=>$info]);
    }

    public function actionUpjian(){
        $jianli_id=Yii::$app->request->get('jianid');
        $sql="select * from jianli where jianli_id=$jianli_id";
        $jianli= Yii::$app->db->createCommand($sql)->queryOne();
        return $this->render('jian',['jianli'=>$jianli]);
    }

    public function actionAddimg(){
        //
        $img=UploadedFile::getInstanceByName('myfile');
//        print_r($img);die;
        //文件目录
        $dir='upload/';
        //图片的绝对路径
        $path = $dir.$img->name;
        //保存文件函数，在手册上有，将图片保存到本地
        $status = $img->saveAs($path,true);
        if($status){
            echo $path;
        }else{
            echo 0;
        }
    }



    public function actionDeljian(){
        $jianid=Yii::$app->request->post("jianid");
        $sql="delete from jianli where jianli_id=$jianid";
        $re=Yii::$app->db->createCommand($sql)->execute();
        $sql1="delete from ujianli where jianli_id=$jianid";
        $res=Yii::$app->db->createCommand($sql1)->execute();
        if($re&$res){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function actionExit(){
        $cookie = Yii::$app->request->cookies->get('user');
        Yii::$app->response->getCookies()->remove($cookie);
        $session=Yii::$app->session;
        $session->remove('user');
        $this->redirect('?r=login/login');
    }

    public function actionDeliver(){
//        echo 1;die;
        $session=Yii::$app->session;
        $user=$session->get('user');
        $jianli=Yii::$app->request->post('jianli_id');
        $company_id=Yii::$app->request->post('company_id');
        $jianli_id=$jianli[0];
//echo $jianli_id;die;
        $position_id=Yii::$app->request->post('position_id');
        //先查询，看用户是否已经投递过
        $sql="select * from  deliver where user_id=$user[user_id] and position_id=$position_id";
        $data=Yii::$app->db->createCommand($sql)->queryOne();
//        print_r($data);die;
        if(empty($data)){
            $sql1="insert into deliver values(null,$user[user_id],$jianli_id,$position_id,$company_id)";
            $re=Yii::$app->db->createCommand($sql1)->execute();
            if($re){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo  2;

        }
    }



    public function actionCollect(){
        //收藏职位
        $session=Yii::$app->session;
        $user=$session->get('user');
        $sql="select * from `position`,collect,company where collect.user_id=$user[user_id] and `position`.position_id=collect.position_id and `position`.company_id=company.company_id";
        $collection=Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('collections',['collection'=>$collection]);
    }

    public function actionCancel(){
        $session=Yii::$app->session;
        $user=$session->get('user');
        $position_id=Yii::$app->request->post('position_id');
        $sql="delete from collect where user_id=$user[user_id] and position_id=$position_id";
        $re=Yii::$app->db->createCommand($sql)->execute();
        if($re){
            echo 1;
        }else{
            echo 0;
        }
    }
    //投递简历的时候检测是否登陆
    public function actionCheck(){
        $cookies = Yii::$app->request->cookies;
        $u=$cookies->getValue('user');
        $session=Yii::$app->session;
        $user=$session->get('user');
//print_r($u);die;
        if(isset($u)&&!isset($user)){
            $session->set('user',$u);
            $user=$session->get('user');
        }
        if(!isset($u)&&!isset($user)){
            return $this->jump('?r=login/login','请先登陆');
        }else{
            return $this->redirect('');//
        }


    }

}