<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb"><head>
</script><script type="text/javascript" async="" src="style/js/conversion.js"></script><script src="style/js/allmobilize.min.js" charset="utf-8" id="allmobilize"></script><style type="text/css"></style>
<meta content="no-siteapp" http-equiv="Cache-Control">
<link  media="handheld" rel="alternate">
<!-- end 云适配 -->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>平潭协创进出口贸易有限公司-拉勾网-最专业的互联网招聘平台</title>
<meta content="23635710066417756375" property="qc:admins">
<meta name="description" content="平潭协创进出口贸易有限公司 福建平潭协创进出口贸易有限公司 上海 移动互联网 天使轮 150-500人 测试的发打发打发大范德萨发">
<meta name="keywords" content="平潭协创进出口贸易有限公司 福建平潭协创进出口贸易有限公司 上海 移动互联网 天使轮 150-500人 测试的发打发打发大范德萨发">
<meta content="QIQ6KC1oZ6" name="baidu-site-verification">

<!-- <div class="web_root"  style="display:none">http://www.lagou.com</div> -->
<script type="text/javascript">
var ctx = "http://www.lagou.com";
console.log(1);
</script>
    <style>
        .box{
            margin-top: -10px;
            background-color: #fbfbfb;
            height: 300px;
            width: 700px;
        }
        .box img{
            margin-left: 30px;
            margin-top: 60px;
        }
        /*ds是产品简介*/
        .ds{
            text-indent: 30px;
            margin-right: 100px;
            margin-top: 100px;
        }
        .inves{
            font-size: 18px;
            line-height: 36px;
            list-style: none;
        }
        .inves li{
            margin-left: -40px;
        }
        /*#ids{*/
            /*width:600px;*/
            /*height:200px;*/
            /*font-size:13px;*/
        /*}*/
        #ids{
            width:120px;
            font-size:18px;
            align-content: center;
        }

        #ids option{
            width:100px;
            height:30px;
        }

    </style>
<link href="http://www.lagou.com/images/favicon.ico" rel="Shortcut Icon">
<link href="style/css/style.css" type="text/css" rel="stylesheet">
<link href="style/css/external.min.css" type="text/css" rel="stylesheet">
<link href="style/css/popup.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="style/js/jquery.1.10.1.min.js"></script>
<script src="style/js/jquery.lib.min.js" type="text/javascript"></script>
<script type="text/javascript" src="style/js/ajaxfileupload.js"></script>
<script src="style/js/additional-methods.js" type="text/javascript"></script>
<!--[if lte IE 8]>
    <script type="text/javascript" src="style/js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript">
var youdao_conv_id = 271546; 
</script> 
<script src="style/js/conv.js" type="text/javascript"></script>
<script src="style/js/ajaxCross.json" charset="UTF-8"></script></head>
<body>
<div id="body">
    <div id="container">
        <div class="clearfix">
            <div class="content_l">
	                <div class="c_detail">
	                	<div style="background-color:#fff;" class="c_logo">
		                	<a title="上传公司LOGO" id="logoShow" class="inline cboxElement" href="#logoUploader">
		                				                			<img width="190" height="190" alt="公司logo" src="style/images/logo_default.png">
	                        		                        	
	                        	<span>更换公司图片<br>190px*190px 小于5M</span>
	                        </a>
		                </div>
                        <div class="c_box companyName">
                            <h2 title="公司名称"><?php echo $model['company_name'] ?></h2>
                            <input id="company_id" type="hidden" value="<?php echo $model['company_id'] ?>"/>
                            <em class="unvalid"></em>
                        		<span class="va dn" style="display: none;">拉勾未认证企业</span>
	                        	<a target="_blank" class="applyC" href="http://www.lagou.com/c/auth.html">申请认证</a>
	                        	                        <div class="clear"></div>
	                       	
	                       		                   			<h1 title="<?php echo $model['company_address']?>" class="fullname"><?php echo $model['company_address']?></h1>
	                        	                        
	                        <form class="clear editDetail dn" id="editDetailForm" style="display: none;">
	                            <input type="text" placeholder="请输入公司简称" maxlength="15" value="" name="companyShortName" id="companyShortName" class="valid">
	                            <input type="text" placeholder="一句话描述公司优势，核心价值，限50字" maxlength="50" value="" name="companyFeatures" id="companyFeatures" class="valid"><span for="companyFeatures" generated="true" class="error" style="display: none;">请输入5-50字的一句话介绍</span>
	                            <input type="hidden" value="25927" id="companyId" name="companyId">
	                            <input type="submit" value="保存" id="saveDetail" class="btn_small">
	                            <a id="cancelDetail" class="btn_cancel_s" >取消</a>
		                    </form>
	                            
	                        <div class="clear oneword" id="oneword" style="display: block;"><img width="17" height="15" src="style/images/quote_l.png">&nbsp; <span id="bright"><?php echo $model['company_bright'] ?></span> &nbsp;<img width="17" height="15" src="style/images/quote_r.png"></div>
	                        <h3 id="dn" class="dn">已选择标签</h3>
	                        <ul style="overflow:auto" id="hasLabels" class="reset clearfix">
                                <?php
                                    $labe=explode(',',$model['label']);
                                foreach($labe as $k=>$v){?>
                                    <li><span ><?php echo $labe[$k] ?></span></li>
                                <?php  }
                                ?>
                                <li class="link">编辑</li>
	                        </ul>
	                        <div class="dn"  id="addLabels">
	                        	<a id="changeLabels" class="change" href="javascript:void(0)">换一换</a>
	                        	<input type="hidden" value="1" id="labelPageNo">
	                            <input type="submit" value="贴上" class="fr" id="add_label">
                            	<input type="text" placeholder="添加自定义标签" name="label" id="label" class="label_form fr">	
	                            <div class="clear"></div>
	                            <ul class="reset clearfix"> </ul>
	                            <a id="saveLabels" class="btn_small" href="javascript:void(0)">保存</a>
	                            <a id="cancelLabels" class="btn_cancel_s" href="javascript:void(0)">取消</a>
	                        </div>
	                    </div>
                        <script>
                            $(function () {
                                //公司简介处
                                $(document).on('click','#saveDetail', function () {
                                    var company_names = $("#companyShortName").val();
                                    var company_bright = $("#companyFeatures").val();
                                    var company_id = $("#company_id").val();
                                    $("#oneword").show();
                                    $("#editDetailForm").hide();
                                    $("#bright").html(company_bright);
                                    $.ajax({
                                        type: "POST",
                                        url: "?r=company/names",
                                        data:{
                                            company_id:company_id,
                                            company_names:company_names,
                                            company_bright:company_bright
                                        },
                                        success: function(msg){

                                        }
                                    });
                                })




                                //labels  处
                                $(document).on('click','#saveLabels', function () {
                                    $("#addLabels").hide();
                                    $("#hasLabels").append('<li class="link">编辑</li>');
                                    $("#dn").hide();
                                    var str = '';
                                    var company_id= $("#company_id").val();
                                    $("ul[id='hasLabels'] span").each(function () {
                                      var labels = $(this).html();
                                            str+=','+labels
                                    });
                                    str= str.substr(1);
                                    //发送ajax
                                    $.ajax({
                                        type: "POST",
                                        url: "?r=company/tail_label",
                                        data: {
                                            label:str,company_id:company_id
                                        },
                                        success: function(msg){
                                        }
                                    });
                                })
                                //公司简介处
                                $("#submitProfile").click(function () {
                                    var newed =  $("#companyProfile").val();
                                    var company_id= $("#company_id").val();
                                    $("#c_section").show();
                                    $("#c_intro").html(newed);
                                    $("#edit").hide();
                                    //发送ajax
                                    $.ajax({
                                        type: "POST",
                                        url: "?r=company/tail_desc",
                                        data:{
                                            desc:newed,company_id:company_id
                                        },
                                        success: function(msg){
                                            if(msg){
                                            }
                                        }
                                    });
                                });
                                //公司规模处的改变
                                $(document).on('click','#submitFeaturess', function () {
                                    var company_id = $("#company_id").val();
                                    var city = $("#city").val();
                                    var companySize = $("#companySize").val();
                                    var select_sca = $("#select_sca").val();
                                    var companyUrl = $("#companyUrl").val();
                                    $("#place").html(city);
                                    $("#guimo").html(companySize);
                                    $("#zhuye").html(companyUrl);
                                    $("#c_tags_show").show();
                                    $("#c_tags_edit").hide();
                                    //发送ajax
                                    $.ajax({
                                        type: "POST",
                                        url: "?r=company/tail_scale",
                                        data:{
                                            company_city:city,company_scale:companySize,company_url:companyUrl,company_id:company_id
                                        },
                                        success: function(msg){

                                        }
                                    });
                                })



                            })
                        </script>
                        <a title="编辑基本信息" class="c_edit" id="editCompanyDetail" href="javascript:void(0);" style="display: block;"></a>
	                	<div class="clear"></div>
	                </div>
                
                	<div class="c_breakline"></div>
                <div id="Product">
                        <h1 style="margin-left: 50px;color: #91cfbf;margin-top: -30px;background-color: #7fa3a7;width: 140px;align-content: center">公司产品</h1>
                    <a href="?r=company/detail_4&company_id=<?php  echo $model['company_id']  ?>&info=tail">重新编辑公司产品</a>

<!--                    循环-->
                    <?php
                    foreach($model['company_product'] as $k=>$v) {?>

                        <div class="box">
                            <dl>
                                <dt style="float: left"><img height="200" width="200" src="<?php  echo  $model['product_logo'][$k] ?>" alt=""/></dt>
                                <dd class="ds" style="align-content: center;width:300px;float: right"><?php  echo  $model['company_desc'][$k] ?> </dd>
                            </dl>
                        </div>
                   <?php  }

                    ?>

       								        						    			        			</div>   <!-- end #Product -->
                <div id="Profile">
			            				        	<div class="profile_wrap">
					             <!--无介绍 -->
									<dl id="c_section" class="c_section dn" style="display: none;">
					                	<dt>
					                    	<h2><em></em>公司介绍</h2>
					                    </dt>
					                    <dd>
					                    	<div class="addnew">
					                        	详细公司的发展历程、让求职者更加了解你!<br>
					                            <a id="addIntro" href="javascript:void(0)">+添加公司介绍</a>
					                        </div>
					                    </dd>
					                </dl>
					            <!--编辑介绍-->
					                <dl id="edit" class="c_section newIntro dn" style="display: none;">
					                    <dt>
					                        <h2><em></em>公司介绍</h2>
					                    </dt>
					                    <dd>
						                    <form id="companyDesForm">
						                        <textarea placeholder="请分段详细描述公司简介、企业文化等" name="companyProfile" id="companyProfile" class="valid"></textarea>
						                        <div class="word_count fr">你还可以输入 <span>955</span> 字</div>
						                        <div class="clear"></div>
						                        <input type="submit" value="保存" id="submitProfile" class="btn_small">
						                        <a id="delProfile" class="btn_cancel_s" href="javascript:void(0)">取消</a>
						                    </form>
					                    </dd>
					                </dl>
                                                        <script>

                                                        </script>
					            <!--有介绍-->
					               <dl class="c_section" style="display: block;">
					               		<dt>
					                   		<h2><em></em>公司介绍</h2>
					                   	</dt>
					                   	<dd>
					                   		<div class="c_intro" id="c_intro"><?php echo $model['desc'] ?></div>
					                   		<a title="编辑公司介绍" id="editIntro" class="c_edit" href="javascript:void(0)"></a>
					                   	</dd>
					               	</dl>
				            </div>
				                 	
	     			</div><!-- end #Profile -->
      	
      	<!--[if IE 7]> <br /> <![endif]-->
	    
	        	 		        	<!--无招聘职位-->
						<dl id="noJobs" class="c_section">
		                	<dt>
		                    	<h2><em></em>招聘职位</h2>
		                    </dt>
		                    <dd>
		                    	<div class="addnew">
		                        	发布需要的人才信息，让伯乐和千里马尽快相遇……<br>
		                            <a href="?r=company/position">+添加招聘职位</a>
		                        </div>
		                    </dd>
		                </dl>
	          	
	          	<input type="hidden" value="" name="hasNextPage" id="hasNextPage">
	          	<input type="hidden" value="" name="pageNo" id="pageNo">
	          	<input type="hidden" value="" name="pageSize" id="pageSize">
          		<div id="flag"></div>
            </div>	<!-- end .content_l -->
            
            <div class="content_r">
            	<div id="Tags">
	            	<div id="c_tags_show" class="c_tags solveWrap" style="display: block;">
	                    <table><tbody><tr><td>地点</td><td id="place">
                          <?php echo $model['company_city'] ?></td></tr>
           <tr><td>领域</td><td id="lingyu"><?php echo $model['company_domain'] ?></td></tr>
           <tr><td>规模</td><td id="guimo"><?php echo $model['company_scale'] ?></td></tr>
               <tr><td>主页</td><td ><a id="zhuye" target="_blank" href="<?php echo $model['company_url'] ?>"><?php echo $model['company_url'] ?></a></td></tr>
                            </tbody></table>
	                    <a id="editTags" class="c_edit" href="javascript:void(0)"></a>
	                </div>
	                <div id="c_tags_edit" class="c_tags editTags dn" style="display: none;">
		                <form id="tagFor" >
		                    <table>
		                        <tbody><tr>
		                            <td>地点</td>
		                            <td>
	<input type="text" placeholder="请输入地点" value="<?php echo $model['company_city'] ?>" name="city" id="city" class="valid"></td></tr>
		                        <tr>
		                            <td>领域</td><!-- 支持多选 -->
		                            <td>
		     <input type="hidden" value="<?php echo $model['company_domain'] ?>" id="industryField" name="industryField" class="valid">
		                            	<input type="button" style="background:none;cursor:default;border:none !important;" disable="disable" value="移动互联网" id="select_ind" class="select_tags">
                                    </td>
		                        </tr>
		                        <tr>
		                            <td>规模</td>
		                            <td>
		                            	<input type="hidden" value="<?php echo $model['company_scale'] ?>" id="companySize" name="companySize" class="valid">
		                            	<input type="button" value="<?php echo $model['company_scale'] ?>" id="select_sca" class="select_tags">
		                                <div class="selectBox dn" id="box_sca" style="display: none;">
		                                    <ul class="reset">
                                                <li>少于15人</li><li>15-50人</li><li>50-150人</li>
                                                <li class="current">150-500人</li>
                                                <li>500-2000人</li>
                                                <li>2000人以上</li></ul></div>
		                            </td>
		                        </tr>
		                        <tr>
		                            <td>主页</td>
		                            <td>
                            			<input type="text" placeholder="请输入网址" value="<?php echo $model['company_url'] ?>" name="companyUrl" id="companyUrl" class="valid">
		                            </td>
		                        </tr>
		                    </tbody></table>
		                    <input type="hidden" id="comCity" value="<?php echo $model['company_city'] ?>">
		                    <input type="hidden" id="comInd" value="<?php echo $model['company_domain'] ?>">
		                    <input type="hidden" id="comSize" value="<?php echo $model['company_scale'] ?>">
		                    <input type="hidden" id="comUrl" value="<?php echo $model['company_email'] ?>">
		                    <input type="button" value="保存" id="submitFeaturess" class="btn_small">
		                    <a id="cancelFeatures" class="btn_cancel_s" href="javascript:void(0)">取消</a>
		                    <div class="clear"></div>
		            	</form>
	                </div>
       			</div><!-- end #Tags -->

                <dl class="c_section c_stages">
                	<dt>
                    	<h2><em></em>融资阶段</h2>
                    	<a title="编辑融资阶段" class="c_edit" href="javascript:void(0)"></a>
                    </dt>


                    <dd>
                    	<ul class="reset stageshow" id="stage">
                    		<li>目前阶段：<span class="c5" id="thiss"><?php echo $model['develop_stage']  ?></span></li>
                        </ul>
                    	<form class="dn" id="stageform">
                    		<div class="stageSelect">
                    			<label>目前阶段</label>
                    			<input type="hidden" value="天使轮" id="financeStage" name="financeStage">
	                         	<input type="button" value="天使轮" id="select_fin" class="select_tags_short fl">
	                            <div class="selectBoxShort dn" id="box_fin" style="display: none;">
	                                 <ul class="reset">
                                         <li>未融资</li>
                                         <li class="current">天使轮</li>
                                         <li>A轮</li>
                                         <li>B轮</li>
                                         <li>C轮</li>
                                         <li>D轮及以上</li>
                                         <li>上市公司</li>
                                     </ul>
	                             </div>	
                    		</div>	
                            <input type="submit" id="descs" value="保存" class="btn_small">
		                    <a id="cancelStages" class="btn_cancel_s" href="javascript:void(0)">取消</a>
                            <div class="clear"></div>
                            <div class="dn" id="cloneInvest">
		                    	<label>融资阶段</label>
	                    		<input type="hidden" class="select_invest_hidden" name="select_invest_hidden">
			                    <input type="button" value="发展阶段" class="select_tags_short select_invest">
			                    <div class="selectBoxShort dn" style="display: none;">
			                        <ul class="reset">
                                        <li>天使轮</li>
                                        <li>A轮</li>
                                        <li>B轮</li>
                                        <li>C轮</li>
                                        <li>D轮及以上</li>
                                        <li>上市公司</li>
                                    </ul>
			                    </div>
			                    <label>投资机构</label>
			                    <input type="text" placeholder="如真格基金" name="stageorg">
		                    </div>
		                </form>
                    </dd>
                </dl><!-- end .c_stages -->
                <!--公司深度报道-->
                <div id="Reported">
                    <!--无报道-->
                    <dl class="c_section c_reported">
                        <dt>
                        <h2><em></em>融资机构</h2>
                        <a class="c_edit member_edit" id="institution" href="javascript:void(0)" title="编辑投资机构"></a>
                        </dt>
                        <dd>
                            <!--here-->
                            <ul id="shows" class="inves">

                                <!--                    		循环投资机构-->
                                <?php
                                $res = explode(',',$model['investment']);
                                foreach($res as $key=>$val){
                                    $res[$key]=explode('.',$val);
                                }
                                foreach($res as $k=>$v){?>
                                    <li><span class="c5"><?php echo $v[0]  ?>   投资机构：<?php echo $v[1]  ?></span></li>
                                <?php        }

                                ?>
                            </ul>


                            <div id="inves"  style="display:none;margin-bottom: 30px">
                                <input type="button" value="保存" id="keep" class="btn_small">
                                 <a id="cancel" class="btn_cancel_s" href="javascript:void(0)">取消</a>
                            </div>
                        </dd>
                        <script>
                            $(function () {
                                $(document).on("click",'#institution', function () {
                                    $("#inves").show();
                                    $("#shows").hide();
                                })

                                $(document).on('click','#keep', function () {
                                    $("#inves").hide();

                                })
                                $(document).on('click','#cancel', function () {
                                    $("#shows").show();
                                    $("#inves").hide();
                                })
                                //融资阶段
                                $(document).on('click','#descs', function () {
                                   var newed =  $("#select_fin").val();
                                    var company_id = $("#company_id").val();
                                    $("#thiss").html(newed);
                                    $("#stageform").hide();
                                    $("#stage").show();
                                    $.ajax({
                                        type: "POST",
                                        url: "?r=company/tail_stage",
                                        data: {company_id:company_id,develop_stage:newed

                                        },
                                        success: function(msg){

                                        }
                                    });
                                })

                            })
                        </script>
                    </dl><!-- end .c_reported -->
                </div><!-- end #Reported -->



                <div id="Member">
		       			       		<!--有创始团队-->
		                <dl class="c_section c_member">
		                	<dt>
		                    	<h2><em></em>创始团队</h2>
                            <a title="编辑创始人" class="c_edit member_edit" href="?r=company/detail_3&company_id=<?php echo $model['company_id'] ?>&info=tail"></a>


                            </dt>
		                    <dd> 
		                    			                    				                    
			       					<div class="member_wrap">
				                        <!-- 无创始人 -->
				                        <div class="member_info addnew_right dn">
				                        	展示公司的领导班子，<br>提升诱人指数！<br>
				                            <a class="member_edit" href="javascript:void(0)">+添加成员</a>
				                        </div>
				                        
				                        <!-- 编辑创始人 -->

				                        
				                        <!-- 显示创始人 -->
                                        <?php
                                        $model['leaderInfosname']=explode(',',$model['leaderInfosname']);
                                        $model['leaderInfosposition']=explode(',',$model['leaderInfosposition']);
                                        $model['leaderInfosweibo']=explode(',',$model['leaderInfosweibo']);
                                        $model['leaderInfosremark']=explode(',',$model['leaderInfosremark']);
                                            foreach($model['leaderInfosname']  as $k=>$v){?>
                                                <div class="member_info">
                                                    <div class="m_portrait">
                                                        <div></div>
                                                        <img width="120" height="120" alt="孙泰英" src="style/images/leader_default.png">
                                                    </div>
                                                    <div class="m_name"><?php echo $model['leaderInfosname'][$k] ?><a target="_blank" class="weibo" href="http://www.zmtpost.com"></a></div>
                                                    <div class="m_position"><?php echo $model['leaderInfosposition'][$k] ?></div>
                                                    <div class="m_intro"><?php echo $model['leaderInfosremark'][$k] ?></div>
                                                </div>

                                            <?php }


                                        ?>

				                        
				                     </div><!-- end .member_wrap -->
				                     				                 		                    </dd>
		                </dl>
		       			       	</div> <!-- end #Member -->
	       	
	       	

	       	
        </div>
   	</div>

<!-------------------------------------弹窗lightbox  ----------------------------------------->
<div style="display:none;">
	<div style="width:650px;height:470px;" class="popup" id="logoUploader">
		<object width="650" height="470" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="FlashID">
		  <param value="../../flash/avatar.swf?url=http://www.lagou.com/cd/saveProfileLogo.json" name="movie">
		  <param value="high" name="quality">
		  <param value="opaque" name="wmode">
		  <param value="111.0.0.0" name="swfversion">
		  <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
		  <param value="../../Scripts/expressInstall.swf" name="expressinstall">
		  <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
		  <!--[if !IE]>-->
		  <object width="650" height="470" data="../../flash/avatar.swf?url=http://www.lagou.com/cd/saveProfileLogo.json" type="application/x-shockwave-flash">
		    <!--<![endif]-->
		    <param value="high" name="quality">
		    <param value="opaque" name="wmode">
		    <param value="111.0.0.0" name="swfversion">
		    <param value="../../Scripts/expressInstall.swf" name="expressinstall">
		    <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
		    <div>
		      <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
		      <p><a href="http://www.adobe.com/go/getflashplayer"><img width="112" height="33" src="style/images/get_flash_player.gif" alt="获取 Adobe Flash Player"></a></p>
		    </div>
		    <!--[if !IE]>-->
		  </object>
		  <!--<![endif]-->
		</object>
	</div><!-- #logoUploader -->
</div>
<!------------------------------------- end ----------------------------------------->

<script src="style/js/company.min.js" type="text/javascript"></script>
<script>
var avatar = {};
avatar.uploadComplate = function( data ){
	var result = eval('('+ data +')');
	if(result.success){
		jQuery('#logoShow img').attr("src",ctx+ '/'+result.content);
		jQuery.colorbox.close();
	}
};
</script>
			<div class="clear"></div>
			<input type="hidden" value="af5b64a9520a4b7da6287ff3400dde11" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
	    </div><!-- end #container -->
	</div><!-- end #body -->
	<div id="footer">
		<div class="wrapper">
			<a rel="nofollow" target="_blank" href="about.html">联系我们</a>
		    <a target="_blank" href="http://www.lagou.com/af/zhaopin.html">互联网公司导航</a>
		    <a rel="nofollow" target="_blank" href="http://e.weibo.com/lagou720">拉勾微博</a>
		    <a rel="nofollow" href="javascript:void(0)" class="footer_qr">拉勾微信<i></i></a>
			<div class="copyright">&copy;2013-2014 Lagou <a href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action" target="_blank">京ICP备14023790号-2</a></div>
		</div>
	</div>

<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>

<!--  -->


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>