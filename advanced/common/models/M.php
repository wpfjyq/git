<?php
namespace common\models;
use Yii;
/**
 * 公共model
 * 
 */
class M
{
    protected static $query=null;//qb对象
    protected static $table='';//表名
    public function __construct($table='')
    {
        self::$table=$table;    
    }
    public function __call($name,$args)
    {
        if(method_exists(self::$query,$name))
        {
            switch ($name)
            {
                case 'select':
                    $obj=call_user_func_array(array(self::$query,$name),$args);
                    return $obj->from(self::$table);
                    break;
                default:
                    $obj=self::$query->from(self::$table);
                     return call_user_func_array(array($obj,$name),$args);
                    break;
            }
            
        }
                
    }



   
    /**
    * 数据添加 
    * @param    array $data数据 
    * @param    array $params    
    * @return   array
    */
    final public function add($data)
    {
        if(empty($data)) return 0;
        $data=$this->filter($data,$this->get_fields());
//        return $data;die;
        $obj=\Yii::$app->db->createCommand();
        $res=$obj->insert(self::$table,$data)->execute();
        return $res===1?\Yii::$app->db->getLastInsertID():0;
    }
    final public function selects($data){
        if (empty($data)||!is_array($data)) return 0;
        //过滤表中不存在字段;
        $datas  = $this->filter($data,$this->get_fields());
        //根据传值数组进行数据库查询
        $table = self::$table;
        $sql = "select  *  from  $table where 1 ";
        foreach($datas as $k=>$v){
            $sql.="and `$k`= '$v'";
        }

        $info=\Yii::$app->db->createCommand($sql)->queryAll();
        if(count($info)==1){
            return $info[0];
        }else{
            return $info;
        }
    }
    //模糊查询封装
    final public function like($like,$offset='',$limit=0,$orderby='',$type='asc'){
        $table = self::$table;
        $arr =array();
        if(!is_array($like)){
            return "查询条件必须是数组";
        }
        $sql = "select * from  $table WHERE 1 ";
            foreach($like as $k=>$v){
               $sql.="AND `$k` like '%$v%'";
            }
        if($orderby!=''){
            $sql.=" ORDER BY $orderby $type";
        }

//        return $sql;
            $info=\Yii::$app->db->createCommand($sql)->queryAll();
        if($limit!==0){
            $end =($offset+$limit)-1;
            for($i=$offset;$i<=$end;$i++){
                $arr[]=$info[$i];
            }
            $info = $arr;
        }
        if(count($info)==1){
            return $info[0];
        }else{
            return $info;
        }

    }


    //数据限制
    final public function limits($obj,$offset,$limit){
        $arr =array();
        for($i=$offset;$i<=$limit-1;$i++){
            $arr[]=$obj[$i];
        }
        return $arr;
    }

   
   /**
   * 数据批量添加 
   * @param    array  $data
   * @return   int
   */
  final public function addAll($data='')
  {
     
    if (empty($data)||!is_array($data)) return 0;
    foreach ($data as $key => $value)
    { 
        $data[$key]=$this->filter($value,$this->get_fields()); 
        $keys=array_keys($value);    
    }
    $obj=\Yii::$app->db->createCommand();
    return $obj->batchInsert(self::$table,$keys,$data)->execute();
     
  }
    /**
    * 创建数据查询对象 
    * @return   obj
    */
    final public function createQuery()
    {
        self::$query=(new \yii\db\Query());
        return $this;
    }
    /**
    *数据删除
    * @param    int  $id
    * @param    int|array  $arr
    * @param    mixed $params  
    * @return   int
    */
   final public function delete($id,$arr,&$params='')
   {
        $num=0;
        $del = function ($value) use ($id,&$num,&$params)
        {
            $obj=\Yii::$app->db->createCommand();
            $res=$obj->delete(self::$table,"$id=$value",$params)->execute();
            $num=($res)?$num+1:$num;
        };
        is_array($arr)?array_walk($arr,$del):$del($arr);
        return $num;     
   }
   /**
   * 获取表的所有字段 
   * @return   array
   */
    final public function get_fields()
    {
        $fields=array();
        $db=Yii::$app->getDb()
        ->getSchema()
        ->getTableSchema(self::$table);
        foreach ($db->columns as $key => $value)
        {
            $fields[]=$value->name;
        }
        return $fields;
    }
    /**
    * 过滤数据表中不存在的字段
    * @param    array $data
    * @param    array $fields
    * @return   array  
    */
    private function  filter($data,$fields)
   {
        foreach ($data as $key => $value)
        {
            if (!in_array($key,$fields))
            {
                unset($data[$key]);
            }
        }
        return $data;
   }
 
    /**
    * 数据修改 
    * @param    array $data  待修改数据
    * @param    array $where  条件
    * @param    array $params
    * @return   array
    */
    final public function update($data,$where='')
    {
        $data=$this->filter($data,$this->get_fields());
        $obj=\Yii::$app->db->createCommand();
        return $obj->update(self::$table,$data,$where)->execute();
    }
    /**
    * 分页
    * @param    obj  $obj
    * @param    int  $page_num 每页显示条数
    * @return   array
    */
   public static function page(\yii\db\Query $obj,$page_num)
   {
        $page_obj = new \yii\data\Pagination([
            //总条数
            'totalCount' => $obj->count(),
            'pageSize'   => $page_num//每页显示条数
        ]);
        $offset = $page_obj->offset;
        $limit = $page_obj->limit; 
        $result=$obj->offset($offset)->limit($limit)->all();
        $pages=\yii\widgets\LinkPager::widget([
        'pagination' => $page_obj,]);
        return ['pages'=>$pages,'result'=>$result];
   }

//  下面是自己定义的一些内部变量
    private $auth_assignment='auth_assignment';
    private $auth_item_child='auth_item_child';


    /**
     * Initializes the application component.
     */
    //进行rbac权限控制的一个方法

    public function get_rbac($controller,$action){
        $res   = \Yii::$app->session->get('user');
        $user_id=$res['user_id'];
        $table1 =  $this->auth_assignment;
        $table2 =  $this->auth_item_child;
        $sql="select * from $table1,$table2 WHERE $table1.item_name=$table2.parent AND user_id=$user_id AND controller='$controller' AND child='$action'";
        $re=\Yii::$app->db->createCommand($sql)->queryAll();
        return $re;
    }
    public function chuli(){
        return 1;
    }



 
}
