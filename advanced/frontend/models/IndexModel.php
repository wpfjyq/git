<?php
/**
 * Created by PhpStorm.
 * User: say
 * Date: 2017/2/16
 * Time: 14:54
 */

namespace frontend\models;
use yii\web\Controller;


use yii\base\Model;
use yii\web\Application;
use yii\caching\MemCache;

class IndexModel extends Model{
    //左侧导航数组初步处理
    public function leftjob(){
        $res = S('job')->all();
        //对数组进行hot排序；
        $re  = M('job')->like(array('job_name'=>''),0,0,'job_hot','desc');
        $info =$this->actionJobarray($res);//进行原始导航数组处理；
        $is=$this->actionArrs($info,$re);//对原始数组进行处理（hot） 三级具体职位的颜色处理
        return $is;
    }
    //讲热词处理的job_id拿到一个数组中
    public function actionHot($data){
        $arrs = array();
            foreach($data as $k=>$v){
                foreach($v['hot'] as $kk=>$vv){
                    $arrs[]=$vv['job_id'];
                }

            }
        return $arrs;
    }
    //处理导航条数组  ，不附带hot热词
    public function actionJobarray($data,$id=0){
        $info =array();
        foreach($data as $k=>$v){
            if($v['job_parent']==$id){
                $info[$v['job_id']]=$v;
                $info[$v['job_id']]['son']=$this->actionJobarray($data,$v['job_id']);
            }
        }
        return $info;
    }
    //左侧导航附带hot数组的处理
    public function actionArrs($data,$arrs){
        $num_all = count($arrs);
        foreach($data as $k=>$v){
            $rand  = mt_rand(3,5);;
   //             $rand  = 3;
            $num=1;
            foreach($arrs as $kk=>$vv){
                $reg = '/^\d+_\d+_\d+$/';
                $info = preg_match($reg,$vv['job_path'],$arr);
                $ss = explode('_',$vv['job_path']);
                if($info&&$ss[0]==$v['job_id']){
                    if($num<=$rand){
                        $data[$k]['hot'][$vv['job_id']]=$vv;
                        $num=$num+1;
                    }
                }
            }
        }
        $res = $this->actionColor($data);
        return $res;
    }
        //  左侧3级职位的颜色处理 ，给hot数组里面的数组进行加一个属性color，前台通过判断这个属性进行颜色样式
    public function actionColor($data){
        foreach($data as $k=>$v){
            foreach($v['son'] as $kk=>$vv){
                foreach($vv['son'] as $kkk=>$vvv){
                    foreach($v['hot'] as $khot=>$vhot){
                        if($kkk==$khot){
                            $data[$k]['son'][$kk]['son'][$kkk]['color']=1;
                        }
                    }

                }
            }
        }
        return $data;
    }
    //长短词数组处理
    public function actionArray($re){
        $str ='';
        $data = M('position')->like(array("positionName"=>"$re"),0,0,'position_id');
        foreach($data as $k=>$v){
            $str.="<option  value='".$v['positionName']."'>".$v['positionName']."</option>";
        }
        return $str;
//        if(\Yii::$app->cache->get("$re")){
//            $str = \Yii::$app->cache->get("$re");
//            return 1;
//        }else{
//            $str ='';
//            $data = M('position')->like(array("position_name"=>"$re"),0,0,'position_id');
//            foreach($data as $k=>$v){
//                $str.="<option  value='".$v['position_name']."'>".$v['position_name']."</option>";
//            }
//            $str = \Yii::$app->cache->set("$re",$str);
//            return 2;
//        }
    }
    //搜索框下面热门搜索的数组处理
    public function hotarray(){
        $sql = "select job_id,job_name from job WHERE `job_path` REGEXP '^[0-9]{1,9}_[0-9]{1,9}_[0-9]{1,9}$' ORDER BY job_hot desc limit 0,6 ";
            $data = \Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

}