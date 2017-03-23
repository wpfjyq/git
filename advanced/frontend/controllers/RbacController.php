<?php
/**
 * Created by PhpStorm.
 * User: say
 * Date: 2017/2/19
 * Time: 20:43
 */

namespace frontend\controllers;
use frontend\models\Rbac;
use yii\web\Controller;
use yii;
use frontend\models\User;
use frontend\models\AuthItemChild;
use frontend\models\AuthItem;



class RbacController  extends Controller
{

    public  function  actionPower(){
        $models = new Rbac();
        return $this->render('power',['models'=>$models]);
    }
    //创建权限
    public function actionCreatepower()
    {
        $items= Yii::$app->request->post();
        $item = $items['Rbac']['power'];
//        print_r($item);die;
        $auth = Yii::$app->authManager;
        $createPost = $auth->createPermission($item);
        $createPost->description = '创建了 ' . $item . ' 权限';
        $auth->add($createPost);
        return $this->redirect('?r=rbac/role');
    }

//显示创建角色的表单

    public function actionRole(){
        $models = new Rbac();
        return $this->render('role',['models'=>$models]);
    }


//创建角色
    public function actionCreaterole()
    {
        $items= Yii::$app->request->post();
        $item = $items['Rbac']['role'];
        $auth = Yii::$app->authManager;
        $role = $auth->createRole($item);
        $role->description = '创建了 ' . $item . ' 角色';
        $auth->add($role);

    }
//查询所有的用户

    public function actionRp(){
        $model = new Rbac();
        $role =  AuthItem::find()->where('type=1')->asArray()->all();
        foreach($role as $value){
            $roles[$value['name']] = $value['name'];
        }
        $power=  AuthItem::find()->where('type=2')->asArray()->all();
        foreach($power as $value){
            $powers[$value['name']] = $value['name'];
        }

        return $this->render('rp',['model'=>$model,'role'=>$roles,'power'=>$powers]);
    }
//将赋予的权限入库保存
    public function actionEmpower()
    {
        $items= Yii::$app->request->post();
        $role = $items['Rbac']['role'];
        foreach($items['Rbac']['power'] as $value ){
            $auth = Yii::$app->authManager;
            $parent = $auth->createRole($role);
            $child = $auth->createPermission($value);
            $auth->addChild($parent, $child);
        }
        return $this->redirect('?r=rbac/fenpei');
    }



//给用户分配角色  首先查出所有用户和角色

    public function actionFenpei(){
        $model = new Rbac();
        $role =  AuthItem::find()->where('type=1')->asArray()->all();
        foreach($role as $value){
            $roles[$value['name']] = $value['name'];
        }
        $user=  User::find()->asArray()->all();
//        print_r($user);die;
        foreach($user as $value){
            $users[$value['id']] = $value['username'];
        }
        return $this->render('fenpei',['model'=>$model,'role'=>$roles,'user'=>$users]);
    }
//将给用户分配的角色入库
    public function actionUr(){
        $auth = Yii::$app->authManager;
        $data = \Yii::$app->request->post('Rbac');
        $role = $data['role'];
        $power = $data['user'];
//        print_r($power);die;
        foreach($role as $value) {
            foreach ($power as $v) {
                $reader = $auth->createRole($value);
                $auth->assign($reader, $v);
            }
        }
    }
//    public function beforeAction($action){
//        $action = Yii::$app->controller->action->id;
//        $res =\Yii::$app->user->can($action);
//        if(\Yii::$app->user->can($action)){
//            return true;
//        }else{
//            throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
//        }
//    }


}
