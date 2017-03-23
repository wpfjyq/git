<?php
/**
 * Created by PhpStorm.
 * User: LAN
 * Date: 2017/2/14
 * Time: 15:25
 */
namespace frontend\controllers;
use frontend\models\Company_detail;
use frontend\models\CompanyModel;
use frontend\models\Company;
use frontend\models\User;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
class CompanyController extends Controller
{
    public $layout='head';
    public $enableCsrfValidation=false;
    //开通招聘服务
    public function actionBind(){
        $company_id=Yii::$app->request->get('company_id');
//        print_r($company_id);die;
        if(!empty($company_id)){
            $sql="select company_email,company_tel from company where company_id=$company_id";
            $info=Yii::$app->db->createCommand($sql)->queryOne();
            return $this->render('bindstep1',['company_id'=>$company_id,'company_tel'=>$info['company_tel'],'company_email'=>$info['company_email']]);
        }else{
            return $this->render('bindstep1',['company_id'=>$company_id,'company_tel'=>"",'company_email'=>""]);
        }

    }
    //开通招聘服务第一个页面信息处理入库
    public function actionBind1(){
        if(Yii::$app->request->isPost){
            $session=Yii::$app->session;
            $user=$session->get("user");
            $data['user_id']=$user['user_id'];
            $data['company_tel']=Yii::$app->request->post('tel');
            $data['company_email']=Yii::$app->request->post('email');
            $id=Yii::$app->request->post('company');
            if(empty($id)){
                $obj=Yii::$app->db->createCommand();
                $re=$obj->insert('company',$data)->execute();
                //公司的id值
                $company_id=Yii::$app->db->getLastInsertID($re);
                if($re){
                    return $this->render('bindstep2',['company_id'=>$company_id]);
                }
            }else{
                $sql="update company set company_email='$data[company_email]' where company_id=$id";
                $re=Yii::$app->db->createCommand($sql)->query();
                if($re){
                    return $this->render('bindstep2',['company_id'=>$id]);
                }
            }
        }else{
            return $this->render('bindstep2',['company_id'=>""]);
        }
    }
    //开通招聘服务页面2
    public function actionBind2()
    {
        if (Yii::$app->request->isPost) {
            $company_id = Yii::$app->request->post('company_id');
            $company_name = Yii::$app->request->post('companyName');

            $sql = "update company set company_name='$company_name' where company_id=$company_id";
            $re = Yii::$app->db->createCommand($sql)->query();
            $sql1 = "select company_email from company where company_id=$company_id";
            $email = Yii::$app->db->createCommand($sql1)->queryOne();
            if ($re) {
                //发送邮件
                $mail= Yii::$app->mailer->compose();
                $mail->setTo($email['company_email']);
                $mail->setSubject("链接");
                $mail->setTextBody("http://www.lagous.com/?r=company/position");   //发布纯文字文本
//                $mail->setHtmlBody("<br>问我我我我我");    //发布可以带html标签的文本
                if($mail->send()){
                    return $this->render('bindstep3', ['email' => $email['company_email']]);
                } else{
                    echo "<script>alert('开通失败');location.href='?r=company/bind'</script>";
                }
            }
        }else{
                return $this->render('bindstep3', ['email' =>""]);
        }
    }
    //发布职位
    public function actionPosition(){
        $session=Yii::$app->session;
        $user=$session->get('user');
        $user_id = $user['user_id'];
        $infos = M('company')->selects(array('user_id'=>$user_id));
        if((!empty($infos['company_status']))||empty($infos)){
            return $this->jump("?r=company/company_select&user_id=$user_id",'发布职位需要完善公司信息');
        }
        $sql="select company_email,company_id  from company where user_id=$user[user_id]";
        $ids=Yii::$app->db->createCommand($sql)->queryOne();
        //查询所有数据
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
        return $this->render('create',['job'=>$arr,'ids'=>$ids]);
    }
     //职位的添加入库
    public function actionPositionadd(){
        //可以应用memcache
        $data=Yii::$app->request->post();
        $data['salary']=$data['salaryMin']."k"."-".$data['salaryMax']."k";
        $data['addtime']=time();
        unset($data['salaryMin']);
        unset($data['salaryMax']);
        //插件
        $data['position_desc']=htmlspecialchars($data['position_desc']);
//        print_r($data);die;
        $obj=Yii::$app->db->createCommand();
        $re=$obj->insert('position',$data)->execute();
        if($re){
             $sql="select * from num where company_id=$data[company_id]";
             $info=Yii::$app->db->createCommand($sql)->queryOne();
             if($info){
                $sql="update num set position_num=position_num+1 where company_id=$data[company_id]";
                $re= Yii::$app->db->createCommand($sql)->execute();
             }else{
                $sql="insert into num (company_id,position_num) values('$data[company_id]',1)";
                $re= Yii::$app->db->createCommand($sql)->execute();
             }
             echo "<script>alert('发布成功');location.href='?r=company/position'</script>";
        }else{
            echo "<script>alert('发布失败');location.href='?r=company/position'</script>";
        }

    }
    //公司详细信息的添加
    public function actionDetail_1(){
        $user = \Yii::$app->session->get('user');
        $user_id = $user['user_id'];
//        print_r($user_id);die;
//        $company = M('company')->like(array('user_id'=>$user_id),0,0);
        $company = M('company')->selects(array('user_id'=>$user_id));
        $info = \Yii::$app->request->get('info');
        $info = isset($info)?$info:'no';

            //首先要进行登录测试；如果是公司~表现的index01页面。如果是个人。则展示的是公司的信息的遍历

        return $this->render('index01',array('company'=>$company,'info'=>$info));



    }
    //公司详细信息数组处理入库
    public function actionDetail_t(){
        $model = new CompanyModel();
        $re=\Yii::$app->request->post();
        $company_id=$re['company_id'];
//        print_r($re);die;
        $str='';
        foreach($re['stageorg'] as $k=>$v){
            if(empty($v)){
                unset($re['stageorg'][$k]);
                unset($re['stageorg'][$k]);
                unset($re['select_invest_hidden'][$k]);
                unset($re['select_invest_hidden'][$k]);
            }else{
                $str.=$re['select_invest_hidden'][$k].'.'.$re['stageorg'][$k].',';
            }
        }
       $re['investment']=rtrim($str,',');
        unset($re['select_invest_hidden']);
        unset($re['stageorg']);
        $info = $re['info'];
        unset($re['info']);
//        print_r($re);
        $res = $model->company_update($re);
        if($res){
            //调用model去除跳过页面的status值;
            $model->upd_status('1',$company_id);
            if($info=='yes'){
               $mo =  $model->jumps($company_id);
                if(empty($mo)){
                    return $this->jump("?r=company/detail_six&company_id=$company_id",'完善成功');
                }else{
                    return $this->jump("?r=company/detail_$mo&company_id=$company_id&info=yes",'完善成功');

                }

            }else{
                return $this->jump("?r=company/detail_2&company_id=$company_id",'添加成功');
            }

        }
    }
    //公司信息添加第二个页面展示
    public function actionDetail_2(){
        $re = \Yii::$app->request->get('company_id');
        $info = \Yii::$app->request->get('info');
        $info = isset($info)?$info:'no';
        $status= \Yii::$app->request->get('status');
            $data = M('company')->selects(array('company_id'=>$re));
            $status =$status;
            if(!empty($status)){
                $mess = M('company')->update(array('company_status'=>$status),"company_id=$re");
            }

//        print_r($re);die;

        return $this->render('index02',array('company_id'=>$re,'info'=>$info));
    }
    //第二个公司信息的处理
    public function actionDetail_two_upd(){
        $model = new CompanyModel();
        $re=\Yii::$app->request->post();

        $model->upd_status('2',$re['company_id']);
        $res = $model->company_detail_insert($re);//公司第二部信息的处理
        return $res;
    }
    //第三个公司信息的展示
    public function actionDetail_3(){
        $re = \Yii::$app->request->get('company_id');
        $info = \Yii::$app->request->get('info');
        $info = isset($info)?$info:'no';
        $status= \Yii::$app->request->get('status');

        if(!empty($status)){
            $data = M('company')->selects(array('company_id'=>$re));
            $status = $data['company_status'].','.$status;
            $mess = M('company')->update(array('company_status'=>$status),"company_id=$re");

        }

        return $this->render('index03',array('company_id'=>$re,'info'=>$info));



      ;
    }
    //第三个公司信息的处理
    public function actionDetail_s_upd(){
        $re=\Yii::$app->request->post();
        $id=$re['company_id'];
        $info = $re['info'];
        unset($re['info']);
        $model = new CompanyModel();
        $re=$model->company_detail_upd($re,$id);
        $model->upd_status('3',$id);
        if($info=='no'){
          return   $this->jump("?r=company/detail_4&company_id=$id",'添加合伙人信息添加成功');
        }else{
            $mo =  $model->jumps($id);
            if(empty($mo)){
                return   $this->jump("?r=company/detail_six&company_id=$id",'更新合伙人信息成功');
            }else{
                return   $this->jump("?r=company/detail_$mo&company_id=$id&info=yes",'更新合伙人信息成功');
            }
        }

    }
        //第四个公司信息的展示
    public function actionDetail_4(){
        $re = \Yii::$app->request->get('company_id');
        $info = \Yii::$app->request->get('info');
        $info = isset($info)?$info:'no';
        $status= \Yii::$app->request->get('status');

        if(!empty($status)){
            $data = M('company')->selects(array('company_id'=>$re));
            $status = $data['company_status'].','.$status;
            $mess = M('company')->update(array('company_status'=>$status),"company_id=$re");
        }
        return $this->render('index04',array('company_id'=>$re,'info'=>$info));
    }
    ////第四个公司信息的处理
    public function actionDetail_fo_upd(){
        $re=\Yii::$app->request->post();
//        $mess=$re['company_status'];
//        unset($re['company_status']);
        $company_id=$re['company_id'];
        $infos = $re['info'];
        unset($re['info']);
        unset($re['company_id']);
        $res =UploadedFile::getInstancesByName('my');
        $product_logo='';
        //图片上传
        foreach($res as $k=>$v){
            $dir='upload/';
            $path = $dir.$v->name;
            $status = $v->saveAs($path,true);
            $product_logo.=$path.'_';
        }
        $product_logo=rtrim($product_logo,'_');

        foreach($re as $k=>$v){
            $str='';
            foreach($v as $kk=>$vv){
                $str.='_'.$vv;
                $re[$k]=$str;
                $re[$k]=ltrim($re[$k],'_');
            }
        }
        $re['product_logo']=$product_logo;
        $info = M('company_detail')->update($re,"company_id=$company_id");
        $model = new CompanyModel();
        $model->upd_status('4',$company_id);
        if($infos=='no'){
            return   $this->jump("?r=company/detail_5&company_id=$company_id",'添加公司产品成功');
        }else{
            $mo =  $model->jumps($company_id);
           if(empty($mo)){
               return   $this->jump("?r=company/detail_six&company_id=$company_id",'更新公司产品成功');
           }else{
               return   $this->jump("?r=company/detail_$mo&company_id=$company_id&info=yes",'更新公司产品成功');

           }



        }
    }
    //第五个公司信息的展示
    public function actionDetail_5(){
        $re = \Yii::$app->request->get('company_id');
        $status= \Yii::$app->request->get('status');
        $info = \Yii::$app->request->get('info');
        $info = isset($info)?$info:'no';
        if(!empty($status)){
            $data = M('company')->selects(array('company_id'=>$re));
            $status = $data['company_status'].','.$status;
            $mess = M('company')->update(array('company_status'=>$status),"company_id=$re");
        }
        return $this->render('index05',array('company_id'=>$re,'info'=>$info));
    }
    //第五页面公司简介文化的库入
    public function actionDetail_fv_upd(){
        $id=\Yii::$app->request->post('company_id');
        $desc['desc']=\Yii::$app->request->post('desc');
        $info = M('company_detail')->update($desc,"company_id=$id");
        if($info){
            $session=Yii::$app->session;
            $user=$session->get('user');
            $user_id=$user['user_id'];
            return $this->jump("?r=index/index",'公司文化添加成功');
        }
    }
    //公司详细信息的展示；
    public function actionDetail_six(){
        $re = \Yii::$app->request->get('company_id');
        $res = Company_detail::find()->where(['company_id' => $re])->asArray()->one();
        $re1 = Company::find()->where(['company_id' => $re])->asArray()->one();
        $res['company_desc']=explode('_',$res['company_desc']);
        $res['company_loadurl']=explode('_',$res['company_loadurl']);
        $res['company_product']=explode('_',$res['company_product']);
        $res['product_logo']=explode('_',$res['product_logo']);
        $ress =  array_merge($res,$re1);
//        print_r($ress);die;
        return $this->render('tail',array('model'=>$ress));
    }
    //公司所有信息的页面label页面的修改
    public function actionTail_label(){
        $re=\Yii::$app->request->post();
        $id=$re['company_id'];
        $info = M('company_detail')->update(array('label'=>$re['label']),"company_id=$id");
            return $info;
    }
    //公司所有信息页面的公司介绍模块的修改
    public function actionTail_desc(){
        $re=\Yii::$app->request->post();
        $id=$re['company_id'];
        $info = M('company_detail')->update(array('desc'=>$re['desc']),"company_id=$id");
        return $info;
    }
    //公司规模模块的信息更新
    public function actionTail_scale(){
        $re=\Yii::$app->request->post();
        $id=$re['company_id'];
        $info = M('company')->update($re,"company_id=$id");
        return $info;
    }
    //公司融资阶段的更新
    public function actionTail_stage(){
        $re=\Yii::$app->request->post();
        $id=$re['company_id'];
        $info = M('company')->update($re,"company_id=$id");
        return $info;

    }
    //公司简称方面的更新
    public function actionNames(){
        $re=\Yii::$app->request->post();
        $id=$re['company_id'];
        $info = M('company')->update($re,"company_id=$id");
        return $info;
    }
    //查询登陆用户公司id
    public function actionCompany_select(){
        $re=\Yii::$app->request->get('user_id');
        $sql="select  * from company,`user` WHERE `user`.user_id = '$re' and company.user_id = `user`.user_id";
        $rse= \Yii::$app->db->createCommand($sql)->queryOne();

        $company_id = $rse['company_id'];
        //判断是否开通招聘服务;
            if(empty($rse['company_email'])){
                //未开通
                return $this->jump('?r=company/bind','先开通招聘服务');
            }
            if(!empty($rse['company_status'])){
                //判定哪些步骤是跳过的
                $info = explode(',',$rse['company_status']);
                $pos=array_search(min($info),$info);
                $a = $info[$pos];
                return $this->jump("?r=company/detail_$a&company_id=$company_id&info=yes",'您还有信息未完善,请先完全信息');
            }else{
                return $this->redirect("?r=company/detail_six&company_id=$company_id");
            }
        // 首先判定是否已经完全公司信息。如若未完成，



    }
    //公司列表的展示
    public function actionCompany(){
        $sql="select * from develop";
        $info=Yii::$app->db->createCommand($sql)->queryAll();
        $sql1="select * from market";
        $market=Yii::$app->db->createCommand($sql1)->queryAll();
        //分页
        //搜索条件
        $where="1 and company.company_id=company_detail.company_id";
        $city=isset($_GET['city'])?$_GET['city']:"";

        $stage=isset($_GET['stage'])?$_GET['stage']:"";
        $domain=isset($_GET['domain'])?$_GET['domain']:"";
//        echo $domain;die;
        if(!empty($city)&&$city!='全国'){
            $where.=" and company_city='$city'";
        }

        if(!empty($stage)){
            $where.=" and develop_stage='$stage'";
        }
        if(!empty($domain)){
            $where.=" and company_domain like '%$domain%'";
        }
        //查询总条数
        $page=isset($_GET['page'])?$_GET['page']:1;
        //每页的条数
        $number=6;
        //偏移量
        $limit=($page-1)*$number;
        //总条数
        $sql="select * from company,company_detail where $where";
        $count=Yii::$app->db->createCommand($sql)->query()->rowCount;
        //总页数
        $last=ceil($count/$number);
        //上一页
        $up=$page-1>1?$page-1:1;
        //下一页
        $next=$page+1>$last?$last:$page+1;
        //查询公司的信息
        $sql="select * from company,company_detail where $where  limit $limit,$number";
        $company=Yii::$app->db->createCommand($sql)->queryAll();
        foreach($company as $kkk=>$vvv){
            $company[$kkk]['label']=explode(",",$vvv['label']);
        }

        $num=0;
        foreach($company as $kk=>$vv){
            if($kk==0){
                $company[$kk]['sign']=1;

            }
            if($kk==$num+3){
                $company[$kk]['sign']=1;
                $num=$num+3;
            }

        }

        foreach($company as $key=>$val){
            $sql="select department from `position` where company_id=$val[company_id] limit 3";
            $arr=Yii::$app->db->createCommand($sql)->queryAll();
            $company[$key]['position']=$arr;

        }

//            print_r($company);die;

        $pages="";
        $pages.='<a href="?r=company/company&page='.$up.'&city='.$city.'&stage='.$stage.'&domain='.$domain.'">上一页</a>';
        for($i=1;$i<=$last;$i++){
            $pages.='<a href="?r=company/company&page='.$i.'&city='.$city.'&stage='.$stage.'&domain='.$domain.'">'.$i.'</a>';
        }
        $pages.='<a href="?r=company/company&page='.$next.'&city='.$city.'&stage='.$stage.'&domain='.$domain.'">下一页</a>';

        return $this->render('companylist',['info'=>$info,'market'=>$market,'data'=>$company,'pages'=>$pages,'city'=>$city,'stage'=>$stage,'domain'=>$domain]);
    }
    //用户登录后的详情页
    public function actionCompany_user(){
        $company_id = \Yii::$app->request->get('company_id');
        //查询此公司具体信息
        $sql = "select * from company,company_detail WHERE company.company_id = company_detail.company_id AND company.company_id=$company_id";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $data=$data[0];
        //查询出此公司名下有多少的职位在招聘
        $sql="select  * from position WHERE company_id = $company_id";
        $res = \Yii::$app->db->createCommand($sql)->queryAll();
        $num = count($res);
        return $this->render('company_user',array('data'=>$data,'num'=>$num));
    }
    //公司具体职位的展示
    public function actionCompany_listjob(){
        $company_id = \Yii::$app->request->get('company_id');
        //查询此公司具体信息
        $sql = "select * from company,company_detail WHERE company.company_id = company_detail.company_id AND company.company_id=$company_id";
        $data = \Yii::$app->db->createCommand($sql)->queryAll();
        $data=$data[0];
        //查询出此公司名下有多少的职位在招聘
        $sql="select  * from position WHERE company_id = $company_id";
        $res = \Yii::$app->db->createCommand($sql)->queryAll();
        $num = count($res);
        return $this->render('company_position',array('data'=>$data,'job'=>$res,'num'=>$num));

    }
    //查询公司收到的简历
    public function actionCdeliver(){
        $session=Yii::$app->session;
        $user=$session->get('user');
        $id =$user['user_id'];

        $sql="select company_id from company where user_id=$id";

        $company=Yii::$app->db->createCommand($sql)->queryOne();
//        print_r($company);die;
        if(empty($company)){
           return $this->jump('?r=company/bind','请先开通招聘服务');
        }else{
            $sql1="select * from deliver,`jianli` where company_id=$company[company_id] and deliver.jianli_id=jianli.jianli_id";
            $data=Yii::$app->db->createCommand($sql1)->queryAll();
//        print_r($data);die;
            return $this->render('resume',['data'=>$data]);
        }


    }


    //修改简历的状态
    public function actionPreview(){
        $jianli_id=Yii::$app->request->get('jianli_id');
        $sql1="update deliver set s=1 where jianli_id=$jianli_id";
        Yii::$app->db->createCommand($sql1)->execute();
        $sql="select * from jianli where jianli_id=$jianli_id";
        $info=Yii::$app->db->createCommand($sql)->queryOne();
        return $this->render('cpreview',['info'=>$info]);
    }
//修改简历的状态
    public function actionNotice(){
        $type=Yii::$app->request->post('type');
        $jianli_id=Yii::$app->request->post('jianli_id');
        if($type=="notice"){
            $sql1="update deliver set s=2 where jianli_id=$jianli_id";
            Yii::$app->db->createCommand($sql1)->execute();
            echo 1;
        }else if($type=="no"){
            $sql1="update deliver set s=3 where jianli_id=$jianli_id";
            Yii::$app->db->createCommand($sql1)->execute();
            echo 2;
        }else if($type=="deng"){
            $sql1="update deliver set s=4 where jianli_id=$jianli_id";
            Yii::$app->db->createCommand($sql1)->execute();
            echo 3;
        }

    }

    //修改简历的状态
    public function actionSign(){
        $jianli_id=Yii::$app->request->post('deliverIds');
        $sql="update deliver set s=3 where jianli_id in($jianli_id)";
        $re=Yii::$app->db->createCommand($sql)->execute();
        if($re){
            $data['error']=0;
        }else{
            $data['error']=1;
        }
        echo json_encode($data);
    }
//修改简历的状态
    public function actionDeng(){
        $jianli_id=Yii::$app->request->post('deliverIds');
        $sql="update deliver set s=4 where jianli_id in($jianli_id)";
        $re=Yii::$app->db->createCommand($sql)->execute();
        if($re){
            $data['error']=0;
        }else{
            $data['error']=1;
        }
        echo json_encode($data);
    }

    //未定的简历
    public function actionD(){
        //查询公司收到的简历
        $session=Yii::$app->session;
        $user=$session->get('user');
        $sql="select company_id from company where user_id=$user[user_id]";
        $company=Yii::$app->db->createCommand($sql)->queryOne();
        $sql1="select * from deliver,`jianli` where company_id=$company[company_id] and s=4  and deliver.jianli_id=jianli.jianli_id";
        $data=Yii::$app->db->createCommand($sql1)->queryAll();
//        print_r($data);die;
        return $this->render('dresume',['data'=>$data]);
    }
    //不合适 的简历
    public function actionNo(){
        //查询公司收到的简历
        $session=Yii::$app->session;
        $user=$session->get('user');
        $sql="select company_id from company where user_id=$user[user_id]";
        $company=Yii::$app->db->createCommand($sql)->queryOne();
        $sql1="select * from deliver,`jianli` where company_id=$company[company_id] and s=3  and deliver.jianli_id=jianli.jianli_id";
        $data=Yii::$app->db->createCommand($sql1)->queryAll();
//        print_r($data);die;
        return $this->render('nresume',['data'=>$data]);
    }
    //已经通知过的简历
    public function actionYi(){
        //查询公司收到的简历
        $session=Yii::$app->session;
        $user=$session->get('user');
        $sql="select company_id from company where user_id=$user[user_id]";
        $company=Yii::$app->db->createCommand($sql)->queryOne();
        $sql1="select * from deliver,`jianli` where company_id=$company[company_id] and s=2  and deliver.jianli_id=jianli.jianli_id";
        $data=Yii::$app->db->createCommand($sql1)->queryAll();
//        print_r($data);die;
        return $this->render('yresume',['data'=>$data]);
    }

    //待处理的简历
    public function actionPending(){
        //查询公司收到的简历
        $session=Yii::$app->session;
        $user=$session->get('user');
        $sql="select company_id from company where user_id=$user[user_id]";
        $company=Yii::$app->db->createCommand($sql)->queryOne();
        $sql1="select * from deliver,`jianli` where company_id=$company[company_id] and s=0  and deliver.jianli_id=jianli.jianli_id";
        $data=Yii::$app->db->createCommand($sql1)->queryAll();
//        print_r($data);die;
        return $this->render('presume',['data'=>$data]);
    }


    //审阅过得简历
    public function actionLooks(){
        //查询公司收到的简历
        $session=Yii::$app->session;
        $user=$session->get('user');
        $sql="select company_id from company where user_id=$user[user_id]";
        $company=Yii::$app->db->createCommand($sql)->queryOne();
        $sql1="select * from deliver,`jianli` where company_id=$company[company_id] and s=1  and deliver.jianli_id=jianli.jianli_id";
        $data=Yii::$app->db->createCommand($sql1)->queryAll();
//        print_r($data);die;
        return $this->render('lresume',['data'=>$data]);
    }
//查询发布过的所有职位
    public function actionValid(){
        $session=Yii::$app->session;
        $user=$session->get('user');
        $sql="select company_id from company where user_id=$user[user_id]";
        $company=Yii::$app->db->createCommand($sql)->queryOne();
        $sql1="select * from `position` where company_id=$company[company_id]";
        $data=Yii::$app->db->createCommand($sql1)->query();
        return $this->render('mylist',['data'=>$data]);

    }

}