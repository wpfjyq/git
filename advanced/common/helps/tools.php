<?php 
/*
 * 自定义全局公共方法
 */
//定义全局常量
function Init()
{
	define('IS_POST',Yii::$app->request->isPost);
	define('IS_GET',Yii::$app->request->isGet);
}
// 获取查询对象
function S($table='')
{
	return (new common\models\M($table))->createQuery();
}
// 获取增，删，改对象
function M($table='')
{
	return new common\models\M($table);
}
/**
* 数据添加 
* @param    obj query对象
* @param    obj page_num 每页显示条数
*/
function page($obj,$page_num)
{
	return  common\models\M::page($obj,$page_num);
}
//文件上传
function upload($filename,&$savePath='')
{
	return common\controllers\C::upload($filename,$savePath);
}
function post($data='',$params='')
{
	$request=Yii::$app->request;
	return empty($data)?$request->post():$request->post($data,$params='');
}
function get($data='',$params='')
{
	$request=Yii::$app->request;
	return empty($data)?$request->get():$request->get($data,$params);
}
function cookieAdd($name,$value)
{
	return Yii::$app->response->cookies->add(new yii\web\Cookie(['name'=>$name,'value'=>$value]));
}
function cookieDel($name)
{
	return Yii::$app->response->cookies->remove($name);
}
function cookieGet($name)
{
	$cookie=Yii::$app->request->cookies->get($name);
 	return  ($cookie!== null) ? $cookie->value: null;
}

function sessionStart() 
{
	return Yii::$app->session->open();
}
function sessionClose() 
{
	return Yii::$app->session->close();
}
function sessionAdd($name,$value) 
{
	return Yii::$app->session->set($name,$value);
}
function sessionGet($name) 
{
	return Yii::$app->session->get($name);
}
function sessionDel($name) 
{
	return Yii::$app->session->remove($name);
}
function query($sql='')
{
	return \Yii::$app->db->createCommand($sql);
}
?>