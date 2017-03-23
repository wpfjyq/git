<?php 
namespace common\controllers;
use yii;
use yii\web\Controller;
use yii\web\UploadedFile;
class C extends Controller
{
	 
	/**
	* 文件上传 
	* @author   syh
	* @param    string filename 文件名
	* @param    string savePath 保存路径的变量
	* @return   bool
	*/
	public  static function upload($filename,&$savePath='')
    {
       
     $file = UploadedFile::getInstanceByName($filename); 
     $basePath = Yii::getAlias('@webroot');
     $savePath = '/uploads/'.$file->baseName.time().'.'.$file->extension;
     return $file->saveAs($basePath.$savePath);    
    }
	 
}
?>