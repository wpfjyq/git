<?php
/**
 * Created by PhpStorm.
 * User: say
 * Date: 2017/2/23
 * Time: 10:50
 */

namespace frontend\models;


use yii\base\Model;
use Yii;

class CompanyModel extends Model{
    //公司信息的完善添加第一步
    public function company_update($re){
        $id =$re['company_id'];
        unset($re['company_id']);
        $res = M('company')->update($re,"company_id=$id");
        return $res;
    }
    //公司信息的完善第二页内容的添加
    public function company_detail_insert($re){
        $res = M('company_detail')->add($re);
        return $res;
    }
    //公司信息的完善第三页信息的更新
    public function company_detail_upd($re,$id){
            unset($re['company_id']);
        foreach($re as $k=>$v){
            $str='';
            foreach($re[$k] as $kk=>$vv){
                $str.=$vv.',';
                $re[$k]=$str;
                $re[$k]=rtrim($re[$k],',');
            }
        }
           return      $res =M('company_detail')->update($re,"company_id=$id");
    }
    //公司跳过信息的更改
    public function upd_status($re,$company_id){
       $res = M('company')->selects(array('company_id'=>$company_id));
//        return $res;
        $info =explode(',',$res['company_status']) ;
//        return $info;
        foreach($info as $k=>$v){
            if($v==$re){
                unset($info[$k]);
            }
        }
//        return $info;
        $mess = implode(',',$info);
        M('company')->update(array('company_status'=>$mess),"company_id=$company_id");
    }
    //判定跳转哪一页
    public function jumps($id){
        $data = M('company')->selects(array('company_id'=>$id));
//        print_r($data);die;
        $info = explode(',',$data['company_status']);
        $pos=array_search(min($info),$info);
        $a = $info[$pos];
        return $a;
    }

}