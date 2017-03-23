﻿<?php
use yii\web\Controller;

?>

<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<script id="allmobilize" charset="utf-8" src="style/js/allmobilize.min.js"></script>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" media="handheld"  />
<!-- end 云适配 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>职位订阅-拉勾网-最专业的互联网招聘平台</title>
<meta property="qc:admins" content="23635710066417756375" />
<meta content="拉勾网是3W旗下的互联网领域垂直招聘网站,互联网职业机会尽在拉勾网" name="description">
<meta content="拉勾,拉勾网,拉勾招聘,拉钩, 拉钩网 ,互联网招聘,拉勾互联网招聘, 移动互联网招聘, 垂直互联网招聘, 微信招聘, 微博招聘, 拉勾官网, 拉勾百科,跳槽, 高薪职位, 互联网圈子, IT招聘, 职场招聘, 猎头招聘,O2O招聘, LBS招聘, 社交招聘, 校园招聘, 校招,社会招聘,社招" name="keywords">
<meta name="baidu-site-verification" content="QIQ6KC1oZ6" />

<!-- <div class="web_root"  style="display:none">h</div> -->
<script type="text/javascript">
var ctx = "h";
console.log(1);
</script>
<link rel="Shortcut Icon" href="h/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="style/css/style.css"/>
<link rel="stylesheet" type="text/css" href="style/css/external.min.css"/>
<link rel="stylesheet" type="text/css" href="style/css/popup.css"/>
<script src="style/js/jquery.1.10.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="style/js/jquery.lib.min.js"></script>
<script src="style/js/ajaxfileupload.js" type="text/javascript"></script>
<script type="text/javascript" src="style/js/additional-methods.js"></script>
<!--[if lte IE 8]>
    <script type="text/javascript" src="style/js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript">
var youdao_conv_id = 271546; 
</script> 
<script type="text/javascript" src="style/js/conv.js"></script>
</head>
<body>
<div id="body">


    <div id="container">

        <div class="clearfix">
            <div class="content_l">
            	<h1>我的职位订阅</h1>
            	            		            
	           <!--      -->
          		<input type="hidden" id="orderCount" value="0" />
          	
                <form id="subForm"  >
                	<input type="hidden" value="" name="id" id="orderId" />
	                <div class="s_form">
	                	<p>筛选下面的职位订阅条件，实现精准匹配的个性化职位定制，我们帮你挑工作！</p>
	                    <dl>
	                    	<dt>
	                        	<h3>接收邮箱  <i class="rss_circle"></i>&nbsp; 发送周期 <em></em><span>（必填）</span></h3>
	                        </dt>
	                        <dd>
	                        	<input type="text" id="subEmail" name="email" class="email" style="height: 45px" placeholder="请输入接收邮箱" value="" />
	                        	<span id="emailError" class="error" style="display:none;">请输入接收邮箱</span>
	                        </dd>
	                        <dd>
	                        	<input type="hidden" id="select_day_hidden" name="sendMailPer" value="" />
	                       		<ul class="s_radio clearfix day">
	                       				                            		<li title="3">3天</li>
	                            		                            		<li title="7">7天</li>
	                            		                            </ul> 	
	                            <span id="sendError" class="error" style="display:none;">请选择发送周期</span>
	                        </dd>
	                    </dl>
	                    <dl>
	                    	<dt>
	                        	<h3>职位名称 <em></em><span>（必填）</span></h3>	
	                        </dt>
	                        <dd>
	                        	<input type="hidden" id="select_job_hidden" name="positionName" value="" />
	                       		<input type="button" class="select" id="select_job" value="请选择职位名称" />
	                       		
	                            <div id="sub_box_job" class="dn">
                                    <?php foreach($arr as $k=>$v){?>
                                        <dl>
                                            <dt><?php echo $k?></dt>
                                            <dd>
                                                <?php foreach($v as $key=>$val){?>
                                                    <?php foreach($val as $kk=>$vv){?>
                                                        <ul class="reset job_main">
                                                            <li>
                                                                <span title="<?php echo $key?>"><?php echo $kk?></span>
                                                                <ul class="reset job_sub dn">
                                                                    <?php foreach($vv as $kkk=>$vvv){?>
                                                                        <li><?php echo $vvv['job_name']?></li>
                                                                    <?php }?>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    <?php }?>
                                                <?php }?>

                                            </dd>
                                        </dl>
                                    <?php }?>

		                            	                            </div>
	                            <span id="positionError" class="error" style="display:none;">请选择职位名称 </span>		
	                        </dd>
	                    </dl>
	                    <dl>
	                    	<dt>
	                        	<h3>工作地点 <em></em><span>（必填）</span></h3>
	                        </dt>
	                        <dd>
	                        	<input type="hidden" id="select_city_hidden" name="city" value="" />
                                <ul class="s_radio clearfix city">
                                        <li title="北京">北京</li>
                                        <li title="上海">上海</li>
                                        <li title="广州">广州</li>
                                        <li title="深圳">深圳</li>
                                        <li title="成都">成都</li>
                                        <li title="杭州">杭州</li>
                                </ul>
                                <span id="cityError" class="error" style="display:none;">请选择工作地点 </span>
	                        </dd>
	                    </dl>
	                    <dl>
	                    	<dt>
	                        	<h3>发展阶段 <em></em></h3>
	                        </dt>
	                        <dd>
	                        	<input type="hidden" id="select_stage_hidden" name="financeStage" value="" />
	                        	<ul class="s_tips clearfix s_radio_sp tip">
	                            		                            		<li title="初创型">初创型</li>
	                            		                            		<li title="成长型">成长型</li>
	                            		                            		<li title="成熟型">成熟型</li>
	                            		                            		<li title="上市公司">上市公司</li>
	                            		                            </ul> 
	                            <span id="stageError" class="error" style="display:none;">请选择发展阶段 </span>		
	                        </dd>
	                    </dl>
	                    <dl>
	                    	<dt>
	                        	<h3>行业领域 <em></em></h3>
	                        </dt>
	                        <dd>
	                        	<input type="hidden" id="select_industry_hidden" name="industryField" value="" />
	                            <input type="button" class="select" id="select_industry" value="请选择行业领域" />
	                            <div id="box_industry" class="dn">
	                            	<ul class="reset lei">
	                                		                                		<li>移动互联网</li>
	                                		                                		<li>电子商务</li>
	                                		                                		<li>社交</li>
	                                		                                		<li>企业服务</li>
	                                		                                		<li>O2O</li>
	                                		                                		<li>教育</li>
	                                		                                		<li>文化艺术</li>
	                                		                                		<li>游戏</li>
	                                		                                		<li>在线旅游</li>
	                                		                                		<li>金融互联网</li>
	                                		                                		<li>健康医疗</li>
	                                		                                		<li>生活服务</li>
	                                		                                		<li>硬件</li>
	                                		                                		<li>搜索</li>
	                                		                                		<li>安全</li>
	                                		                                		<li>运动体育</li>
	                                		                                		<li>云计算\大数据</li>
	                                		                                		<li>移动广告</li>
	                                		                                		<li>社会化营销</li>
	                                		                                		<li>视频多媒体</li>
	                                		                                		<li>媒体</li>
	                                		                                		<li>智能家居</li>
	                                		                                		<li>智能电视</li>
	                                		                                		<li>分类信息</li>
	                                		                                		<li>招聘</li>
	                                		                                </ul>
	                            </div>
	                            <span id="fieldError" class="error" style="display:none;">请选择行业领域 </span>	
	                        </dd>
	                    </dl>
	                    <dl>
	                    	<dt>
	                        	<h3>月薪范围 <em></em></h3>
	                        </dt>
	                        <dd>
	                        	<input type="hidden" id="select_salary_hidden" name="salary" value="" />
	                            <input type="button" class="select" id="select_salary" value="请选择月薪范围" />
	                            <div id="box_salary" class="dn">
	                            	<ul class="reset money">
	                                		                                		<li>2k以下</li>
	                                		                                		<li>2k-5k</li>
	                                		                                		<li>5k-10k</li>
	                                		                                		<li>10k-15k</li>
	                                		                                		<li>15k-25k</li>
	                                		                                		<li>25k-50k</li>
	                                		                                		<li>50k以上</li>
	                                		                                </ul>
	                            </div>
	                       		<!-- <div>
	                                <input type="text" name="salaryMin" id="salary_low" placeholder="最低月薪" /> 
	                                <span>k</span>
	                            </div>
	                       		<div>
	                                <input type="text" name="salaryMax" id="salary_high" placeholder="最高月薪" /> 
	                                <span>k</span>
	                            </div>
	                            <span>请输入整数，如：4</span> -->
	                            <span id="salaryError" class="error" style="display:none;">请选择月薪范围 </span>	
	                        </dd>
	                    </dl>
	                    <span id="commonError" class="error" style="display:none;">系统异常</span>
	                    <input type="submit" class="btn_big" id="subSubmit" value="保存并订阅" />
	                    <a href="javascript:void(0)" class="btn_cancel">取 消</a>
	                </div>
	        	</form>
            </div>	
            <div class="content_r">
            	<div class="subscribe_side mb20 c5">
                    <div class="why">我们为什么强烈推荐你</div>
                    <h2>订阅</h2>
                    <ul class="reset">
                    	<li class="sub1">帮助你节省浏览和筛选时间，快速找到适合的职位信息。</li>
                    	<li class="sub2">我们会严格按照你订阅的频次和条件给你发送邮件，并对你的个人信息绝对保密。</li>
                    </ul>
                </div>
            </div>
       	</div>
      <input type="hidden" value="" name="userid" id="userid" />
        <input name="" type="hidden" class="session" value="<?php  echo   \Yii::$app->session->get('user')['user_id']; ?>"/>
<script>
    $(document).on('click','#subSubmit',function(){
        var session=$('.session').val();
        if(session==''){
            alert('为了方便您今后查询，请先登录');location.href='?r=login/login';
        }
        var email=$('.valid').val();
        var current=$('.day li');
        var select=$('.select').val();
        var citys=$('.city li');
        var tips=$('.tip li');
        var leis=$('.lei li');
        var moneys=$('.money li');
        var day='';
        var city='';
        var tip='';
        var lei='';
        var money='';
        for(var i=0;i<current.length;i++){
            if(current.eq(i).hasClass('current')){
                day=current.eq(i).text();
            }
        }
        for(var j=0;j<citys.length;j++){
            if(citys.eq(j).hasClass('current')){
                city=citys.eq(j).text();
            }
        }
        for(var h=0;h<tips.length;h++){
            if(tips.eq(h).hasClass('current')){
                tip=tips.eq(h).text();
            }
        }
        for(var k=0;k<leis.length;k++){
            if(leis.eq(k).hasClass('current')){
                lei=leis.eq(k).text();
            }
        }
        for(var a=0;a<moneys.length;a++){
            if(moneys.eq(a).hasClass('current')){
                money=moneys.eq(a).text();
            }
        }
        var html='<div id="subscribeSuccessLogined" class="popup">\
            <h4>职位订阅成功！</h4>\
        <p>我们将定期发送订阅邮件至：<a>'+email+'</a>，请注意查收。</p>\
        <table width="100%">\
        <tr>\
        <td align="center"><a href="?r=index/index" class="btn_s">确&nbsp;定</a></td>\
        </tr>\
        </table>\
        </div>';
        $.ajax({
            type:'get',
            url:"?r=subsc/insert",
            data:{email:email,day:day,select:select,city:city,tip:tip,lei:lei,money:money},
            success:function(msg){
                if(msg==1){
                 $('.clearfix').html(html)
                }
            }
        })
    })
</script>
<!------------------------------------- 弹窗lightbox ----------------------------------------->
<div style="display:none;">
	<!-- 
		登录帐号订阅成功
		1、已登录用户，且是自有用户，已验证，订阅职位<=1，提示订阅成功；接收邮箱默认为登录邮箱，可修改。
		2、已登录用户，但是第三方用户，订阅职位<=1，提示订阅成功；接收邮箱手动输入可修改。
		未登录帐号订阅成功 
		未登录用户，但填写的邮箱为已注册、已验证邮箱，且订阅职位<=1，订阅成功，点击确定显示登录框
	-->
		<div id="subscribeSuccessLogined" class="popup">
        	<h4>职位订阅成功！</h4>
        	<p>我们将定期发送订阅邮件至：<a></a>，请注意查收。</p>
            <table width="100%">
            	<tr>
                	<td align="center"><a href="subscribe.html" class="btn_s">确&nbsp;定</a></td>
                </tr>
            </table>
        </div><!--/#subscribeSuccessLogined-->
   	
   	<!-- 
		未登录未注册帐号订阅成功
		提示注册框
	-->
		<div id="subscribeSuccessRegister" class="popup" style="height:370px;">
        	<h4>职位订阅成功！</h4>
        	<p>我们将定期发送订阅邮件至：<a><em></em></a>，请注意查收。</p>
        	<hr>
        	<p>现在只需设置密码就可成功注册拉勾，并可长期保存及管理订阅信息。</p>
        	<form id="registerPopForm">
	            <table width="100%">
	            	<tr>
	                	<td>注册邮箱 :</td>
	                	<td><em></em></td>
	                </tr>
	                <tr>
	                	<td valign="top">注册密码 :</td>
	                	<td>
	                		<input type="password" name="password" id="psw"  placeholder="请输入注册密码" />
	                		<span class="error" style="display:none;" id="beError_register"></span>
	                	</td>
	                </tr>
	                <tr>
	                	<td></td>
	                	<td>
	                		<label class="fl" for="checkbox">
	                			<input type="checkbox" id="checkbox" name="checkbox" checked  class="checkbox valid" />
	                			我已阅读并同意<a href="h/privacy.html" target="_blank">《拉勾用户协议》</a>
	                		</label>
	                	</td>
	                </tr>
	            	<tr>
	            		<td></td>
	                	<td>
	                		<input type="submit" class="btn_s" value="注 册" />
	                	</td>
	                </tr>
	            </table>
	        </form>
        </div><!--/#subscribeSuccessRegister-->
        
     <!-- 
		未登录注册帐号订阅成功
		弹出框有登录按钮，提示登录
	-->
		<div id="subscribeSuccessLogin" class="popup">
        	<h4>职位订阅成功！</h4>
        	<p>我们将定期发送订阅邮件至：<a></a>，请注意查收。</p>
            <table width="100%">
            	<tr>
                	<td align="center"><a href="#loginPop" class="btn inline" title="登录">登 录</a></td>
                </tr>
            </table>
        </div><!--/#subscribeSuccessLogin-->
		
     <!-- 登录框 -->
	<div id="loginPop" class="popup" style="height:240px;">
       	<form id="loginForm">
			<input type="text" id="email" name="email" tabindex="1" placeholder="请输入登录邮箱地址" />
			<input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
			<span class="error" style="display:none;" id="beError"></span>
		    <label class="fl" for="remember"><input type="checkbox" id="remember" value="" checked="checked" name="autoLogin" /> 记住我</label>
		    <a href="h/reset.html" class="fr" target="_blank">忘记密码？</a>
		    <input type="submit" id="submitLogin" value="登 &nbsp; &nbsp; 录" />
		</form>
		<div class="login_right">
			<div>还没有拉勾帐号？</div>
			<a href="register.html" class="registor_now">立即注册</a>
		    <div class="login_others">使用以下帐号直接登录:</div>
		    <a href="h/ologin/auth/sina.html" target="_blank" class="icon_wb" title="使用新浪微博帐号登录"></a>
		    <a href="h/ologin/auth/qq.html" class="icon_qq" target="_blank" title="使用腾讯QQ帐号登录"></a>
		</div>
    </div><!--/#loginPop-->
    
     <!--退订-->	
    <div id="cancelSub" class="popup">
       	<h4>确认要退订该订阅？</h4>
       	<table width="100%">
       		<tr>
       			<td align="center"><p>点击确认后你将不再收到拉勾为你提供的精准职位推送。</p></td>
       		</tr>
        	<tr>
            	<td align="center">
            		<input type="button" class="btn_s" id="confirmCancel" value="确认退订" />
            		<a href="javascript:void(0)" class="btn_s">取消</a>
            	</td>
            </tr>
        </table>
    </div><!--/#cancelSub-->
</div>
<!------------------------------------- end ----------------------------------------->

<script src="style/js/sub.min.js"></script>
<!-- 退订 | 从邮箱进来订阅页  -->

<!-- 订阅成功弹出注册框 | 从邮箱进来订阅页  -->

<!-- 订阅成功弹出登录框 | 从邮箱进来订阅页  -->

<!-- 从激活页点换个邮箱进入订阅页 -->
			<div class="clear"></div>
			<input type="hidden" id="resubmitToken" value="f828aecf8b80414491d138ca1190fb6d" />
	    	<a id="backtop" title="回到顶部" rel="nofollow"></a>
	    </div><!-- end #container -->
	</div><!-- end #body -->
	<div id="footer">
		<div class="wrapper">
			<a href="h/about.html" target="_blank" rel="nofollow">联系我们</a>
		    <a href="h/af/zhaopin.html" target="_blank">互联网公司导航</a>
		    <a href="http://e.weibo.com/lagou720" target="_blank" rel="nofollow">拉勾微博</a>
		    <a class="footer_qr" href="javascript:void(0)" rel="nofollow">拉勾微信<i></i></a>
			<div class="copyright">&copy;2013-2014 Lagou <a target="_blank" href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action">京ICP备14023790号-2</a></div>
		</div>
	</div>

<script type="text/javascript" src="style/js/core.min.js"></script>
<script type="text/javascript" src="style/js/popup.min.js"></script>

<!--  -->

</body>
</html>