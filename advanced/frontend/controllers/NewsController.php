<?php
/**
 * Created by PhpStorm.
 * User: say
 * Date: 2017/2/25
 * Time: 8:34
 */

namespace frontend\controllers;

use yii\web\Controller;
use common\components\CommonFunc;
use \Yii;

class NewsController extends Controller{
    public function actionLists(){

        $re= M('newss')->like(array('place'=>''));

      return   $this->render('list',array('data'=>$re));
    }


    public function actionPro(){
        $if = \Yii::$app->request->post('place');
        $re= M('newss')->like(array('place'=>"$if"));
        $str ='';
        foreach($re as $k=>$v){
                $str.="<tr><td>  ".$v['name']." </td>
                   <td>".$v['sex']." </td>
                  <td> ".$v['age']." </td>
                  <td> ".$v['tel']." </td>
                  <td> ".$v['place']."</td>
                  <td><a href='#'>删除</a></td>
                    </tr>";
        }
        return   $str;
    }
    public function actionExport(){
        //查询数据
        $sql = "SELECT * FROM newss";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
//        print_r($data);die;
        $header = ['id',"name", "sex", "age","tel","place"]; //导出excel的表头
        CommonFunc::exportData($data, $header, "表头", "文件名称");
    }
    //联系我们的展示
    public function actionLis(){
        $sql= "select * from mess";
        $re=\Yii::$app->db->createCommand($sql)->query();
        print_r($re);die;
        $re=M('mess')->se();
         $re=$re[0];

        return   $this->renderPartial('contact',array('model'=>$re));
    }
    public function actionTwo(){
        $re=\Yii::$app->request->post();
        $info=M('datas')->add($re);
        if($info){
            return $this->jump('?r=news/lis','添加成功');
        }
    }



}