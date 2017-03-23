<?php
namespace frontend\controllers;


use common\models\M;
use frontend\models\IndexModel;
use yii\web\Controller;
use Yii;

class IndexController extends Controller{
    public $layout='head';
    public function actionIndex(){

        //热门搜索数组的处理
        $moel = new IndexModel();
        $res=  $moel->hotarray();
//        print_r($res);die;
        $is = $moel->leftjob();
        //最新职位与热门职位
        //热门职位(两表联查)
        $sql="select * from `position`,company,company_detail where `position`.company_id=company.company_id and company.company_id=company_detail.company_id order by num desc limit 10";
        $hot=Yii::$app->db->createCommand($sql)->queryAll();
        foreach($hot as $k=>$v){
            $hot[$k]['label']=explode(",",$v['label']);
        }

        $sql1="select * from `position`,company,company_detail where `position`.company_id=company.company_id and company.company_id=company_detail.company_id order by addtime desc limit 10";
        $num=Yii::$app->db->createCommand($sql1)->queryAll();
        foreach($num as $k=>$v){
            $num[$k]['label']=explode(",",$v['label']);
        }
        return $this->render('index',array('data'=>$is,'hot'=>$res,'hots'=>$hot,'num'=>$num));

    }
    //职位搜索后主页的页面的展示
    public function actionJobselect(){
        $moel = new IndexModel();
        $res=  $moel->hotarray();
        if(\Yii::$app->request->isPost){
                $if = \Yii::$app->request->post('kd');
            $sql="select * from position,company where positionName LIKE '%$if%' AND position.company_id=company.company_id";

                   $data = \Yii::$app->db->createCommand($sql)->queryAll();


                //  $data =M('position')->like(array('positionName'=>"$if"),0,0,'position_id');
            }else{
                $if = \Yii::$app->request->get('select');
                $ifs = \Yii::$app->request->get('info');
//                echo $ifs;die;
                if($ifs){
                    $sql="select * from position,company,company_detail where positionType LIKE '%$if%' AND position.company_id=company.company_id AND company_detail.company_id = company.company_id";
                    $data = \Yii::$app->db->createCommand($sql)->queryAll();
                    //$data =M('position')->like(array('positionType'=>"$if"),0,0,'position_id');

                }else{
                    $sql="select * from position,company,company_detail where positionName LIKE '%$if%' AND position.company_id=company.company_id";
                    $data = \Yii::$app->db->createCommand($sql)->queryAll();
                    //$data =M('position')->like(array('positionName'=>"$if"),0,0,'position_id');
                }
            }


            return  $this->render('list',array('data'=>$data,'ifs'=>$if,'hot'=>$res));
    }
    //具体职位描述页面的展示
//    public function actionJoblist(){
//            $re = \Yii::$app->request->get('position_id');
//            //根据具体信息去查库
//            $data = M('position')->selects(array('position_id'=>$re));
//
//        return $this->render('jobdetail1',array('data'=>$data));
//    }


    public function actionJoblist(){
        $position_id=Yii::$app->request->get('position_id');
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



    //搜索长短词搜索补全
    public function actionSelects(){
        $res = \Yii::$app->request->post('name');
            $re =new IndexModel();
            $data = $re->actionArray($res);
        return $data;
        //以下为memcache中获取，不合适
//        $re = \Yii::$app->cache->get("selects_job");
////        return $re;
//        if(empty($re["".$res.""])){
//                //前台搜索长短词数组处理
//            $re =new IndexModel();
//            $data = $re->actionArray($res);
//            $arr = \Yii::$app->cache->get('selects_job');
//            $arr["$res"]  = $data;
//            \Yii::$app->cache->set('selects_job',$arr);
//            return $data;
//        }else{
//            $ress =$re["".$res.""];
//            return $ress;
//        }


    }
    //    public $layout='select';
//    public function beforeAction($action){
//        $action = Yii::$app->controller->action->id;//方法名
//        $controller = Yii::$app->controller->id;//控制器名字
//        $res = M()->get_rbac($controller,$action);
//        if($res){
//            return true;
//        }else{
//            throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
//        }
//    }
    //主页面的展示
}