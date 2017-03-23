<?php
$cookies = Yii::$app->request->cookies;
$u=$cookies->getValue('user');
$session=Yii::$app->session;
$user=$session->get('user');
//print_r($u);die;
if(isset($u)&&!isset($user)){
    $session->set('user',$u);
    $user=$session->get('user');
}

 if(isset($user)){
        $status=1 ;
    }else{
        $status=0;
    }



?>
<!--判断是哪个版本0用户版1企业版-->
<?php if($user['type']==0){?>
    <div id="header">
        <div class="wrapper">
            <a href="?r=index/index" class="logo">
                <img src="style/images/logo.png" width="229" height="43" alt="拉勾招聘-专注互联网招聘" />
            </a>
            <ul class="reset" id="navheader">
                <li class="current"><a href="?r=index/index">首页</a></li>
                <li ><a href="?r=company/company" >公司</a></li>
                <li ><a href="?r=user/jianli" rel="nofollow">我的简历</a></li>
                <li ><a href="?r=user/collect" rel="nofollow">我的收藏</a></li>
            </ul>
            <input type="hidden" value="<?php echo $status?>" name="status" title="<?php echo $user['username']?>" types="<?php echo $user['type']?>">
            <span id="box"></span>
        </div>
    </div>
    <?php }else{?>
    <div id="header">
        <div class="wrapper">
            <a href="?r=index/index" class="logo">
                <img src="style/images/logo.png" width="229" height="43" alt="拉勾招聘-专注互联网招聘" />
            </a>
            <ul class="reset" id="navheader">
                <li class="current"><a href="?r=index/index">首页</a></li>
                <li ><a href="?r=company/company_select&user_id=<?php   echo $user['user_id'] ?>" >公司</a></li>
                <li ><a href="?r=company/position" rel="nofollow">发布职位</a></li>

            </ul>
            <input type="hidden" value="<?php echo $status?>" name="status" title="<?php echo $user['username']?>" types="<?php echo $user['type']?>">
            <span id="box"></span>
        </div>
    </div>
<?php }?>
<script src="js.js"></script>
<script>
    $(document).ready(function(){
         var status=$("input[name='status']").val();
         var username=$("input[name='status']").attr('title');
         var types=$("input[name='status']").attr('types');
//         alert(types);
        if(status==0){
            var val ='<ul class="loginTop"><li><a href="?r=login/login" rel="nofollow">登录</a></li><li>|</li><li><a href="?r=register/register" rel="nofollow">注册</a></li></ul>';
            $("#box").html(val);
        }else{
            if(types==0){
                val ='<dl class="collapsible_menu"><dt><span>'+username+'&nbsp;</span><span class="red dn" id="noticeDot-1"></span><i></i></dt><dd><a href="?r=user/jianli">我的简历</a></dd><dd><a href="list.html">我要找工作</a></dd><dd><a href="?r=user/accountbind">帐号设置</a></dd><dd class="logout"><a rel="nofollow" href="?r=user/exit">退出</a></dd></dl>';
                $("#box").html(val);
            }else{
                val ='<dl class="collapsible_menu"><dt><span>'+username+'&nbsp;</span></dd><dd><a href="?r=company/cdeliver">我收到的简历</a></dd><dd class="btm"><a href="myhome.html">我的公司主页</a></dd><dd><a href="?r=user/accountbind">帐号设置</a></dd><dd class="logout"><a rel="nofollow" href="?r=user/exit">退出</a></dd></dl>';
                $("#box").html(val);
            }

         }
    })
</script>
<?=$content?>