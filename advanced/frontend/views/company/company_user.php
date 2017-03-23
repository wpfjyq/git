<!DOCTYPE HTML>
<link rel="stylesheet" type="text/css" href="style/jjs/mCustomScrollbar_ac2fb8b.css">
<link rel="stylesheet" type="text/css" href="style/jjs/layout_19d0413.css">
<link rel="stylesheet" type="text/css" href="style/jjs/widgets_ea16201.css">
<link rel="stylesheet" type="text/css" href="style/jjs/main.css">
<link href="http://www.lagou.com/images/favicon.ico" rel="Shortcut Icon">
<link href="style/css/style.css" type="text/css" rel="stylesheet">
<link href="style/css/external.min.css" type="text/css" rel="stylesheet">
<link href="style/css/popup.css" type="text/css" rel="stylesheet">
<script charset="utf-8" class="lazyload" src="style/jjs/jquery.js"></script><style charset="utf-8" class="lazyload"</style><script async="" src="company_user_files/msgPopup_0cca837.js" data-require-id="common/widgets/common/msgPopup"></script><script charset="utf-8" class="lazyload" src="company_user_files/lagou_5427c0e.js"></script><script async="" src="company_user_files/main_e08c2f2.js" data-require-id="common/components/template-helper/main"></script><style type="text/css">.amap-container{cursor:url(https://webapi.amap.com/theme/v1.3/openhand.cur),default;}.amap-drag{cursor:url(https://webapi.amap.com/theme/v1.3/closedhand.cur),default;}</style>








<body>


<div class="top_info">
    <div class="top_info_wrap">
        <?php
            $img = explode('_',$data['product_logo'])

        ?>
        <img src="<?php echo $img[0] ?>" alt="<?php echo $data['company_name'] ?>Logo" heihgt="164" width="164">
        <div class="company_info">
            <div class="company_main">
                <h1>
                    <a href="http://www.zaih.com/?utm_source=baidupinzhuan&amp;utm_medium=pcsearch&amp;utm_campaign=series2" class="hovertips" target="_blank" rel="nofollow" title="北京我最在行信息技术有限公司">
                        在行&amp;分答
                    </a>
                </h1>
                                    <a href="http://www.zaih.com/?utm_source=baidupinzhuan&amp;utm_medium=pcsearch&amp;utm_campaign=series2" class="icon-wrap" target="_blank" rel="nofollow" title="http://www.zaih.com/?utm_source=baidupinzhuan&amp;utm_medium=pcsearch&amp;utm_campaign=series2">
                        <i></i>
                    </a>
                                                    <a class="identification" title="拉勾认证企业">
                        <i></i>
                        <span>拉勾认证</span>
                    </a>
                                <div class="company_word">
            <?php echo $data['company_bright'] ?>  &nbsp; &nbsp;&nbsp;  <?php echo $data['develop_stage'] ?>          </div>
            </div>
            <div class="company_data">
                <ul>
                    <li>
                        <strong>
                                <?php echo $num ?>
                                                    </strong>
                        <br>
                        <span class="tipsys" original-title="该公司的在招职位数量">
                            <span>招聘职位</span><span class="tip"></span>
                        </span>
                    </li>
                    <li>
                        <strong>
                                                            94%
                                                    </strong>
                        <span class="tipsys" original-title="该公司所有职位收到的简历中，在投递后7天内处理完成的简历所占比例">
                            <span>简历及时处理率</span><span class="tip"></span>
                        </span>
                    </li>
                    <li>
                        <strong>
                                                            1天
                                                    </strong>
                        <br>
                        <span class="tipsys" original-title="该公司的所有职位管理者完成简历处理的平均用时">
                            <span>简历处理用时</span><span class="tip"></span>
                        </span>
                    </li>
                    <li id="mspj" style="cursor:pointer;">
                        <strong>
                                                            57个
                                                    </strong>
                        <br>
                        <span class="tipsys" original-title="该公司收到的面试评价数量">
                            <span>面试评价</span><span class="tip"></span>
                        </span>
                    </li>
                    <li>
                        <strong>今天</strong><br>
                        <span class="tipsys" original-title="该公司职位管理者最近一次登录时间">
                            <span>企业最近登录</span><span class="tip"></span>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

    <!--
    @require "company-c/modules/common/main.less"
    @require "company-c/modules/tabs/main.less"
-->

<div id="company_navs" class="company_navs">
    <div class="company_navs_wrap">
        <ul data-pjax="">
            <li class="current">
                <a href="1" data-lg-tj-id="9100" data-lg-tj-no="0001" data-lg-tj-cid="idnull">公司主页</a>
            </li>
            <li>
                <a href="?r=company/company_listjob&company_id=<?php echo $data['company_id'] ?>" data-lg-tj-id="9100" data-lg-tj-no="0002" data-lg-tj-cid="idnull">招聘职位（   <?php echo $num ?>）</a>
            </li>
            <li>
                <a href="3" data-lg-tj-id="9100" data-lg-tj-no="0003" data-lg-tj-cid="idnull">公司问答</a>
                <i class="icon_new"></i>
            </li>
        </ul>
        <div class="company_share">
            <span>分享</span>
            <a href="javascript:;" class="share_weibo" rel="nofollow" title="分享到微博"></a>
            <a href="javascript:;" class="share_weixin" rel="nofollow" title="分享到微信"></a>
            <div class="share_weixin_success">
                <img alt="移动端公司主页二维码">
            </div>
        </div>
    </div>
</div>
<div style="display: none;" class="company_navs_shadow"></div>

    <div id="main_container">
                <div id="container_left">
            <div id="containerCompanyDetails">
                <!--
    @require "company-c/modules/common/main.less"
    @require "company-c/modules/products/main.less"
-->

<div class="item_container" id="company_products">
    <div class="item_ltitle">公司产品</div>
    <div class="item_content">
        <?php
        $img = explode('_',$data['product_logo']);
        $company_loadurl = explode('_',$data['company_loadurl']);
        $company_product = explode('_',$data['company_product']);
        $company_desc = explode('_',$data['company_desc']);
        foreach($img as $k=>$v){?>

        <div class="product_content product_item clearfix" data-id="84400" data-index="0">
            <img src="<?php echo  $v ?>" alt="产品图片" height="180" width="300">
            <div class="product_details">
                <h4 class="product_url_all">
                    <div class="product_url">
                        <a href="http://fd.zaih.com/fenda?smtid=464947554z1kt6zqieaz2b4z0zMQ**" class="url_valid" target="_blank" rel="nofollow" title="http://fd.zaih.com/fenda?smtid=464947554z1kt6zqieaz2b4z0zMQ**">
                            分答 —— 值得付费的语音问答平台
                        </a>
                        <a href="http://fd.zaih.com/fenda?smtid=464947554z1kt6zqieaz2b4z0zMQ**" target="_blank" rel="nofollow" title="http://fd.zaih.com/fenda?smtid=464947554z1kt6zqieaz2b4z0zMQ**">
                            <i></i>
                        </a>
                    </div>
                </h4>
                <ul class="clearfix">
                    <li>移动app</li>
                    <li>其他</li>
                </ul>
                <div class="product_profile mCustomScrollbar _mCS_1"><div class="mCustomScrollBox mCS-dark-2" id="mCSB_1" style="position:relative; height:100%; overflow:hidden; max-width:100%;"><div class="mCSB_container mCS_no_scrollbar" style="position:relative; top:0;">
                            <p><?php echo $company_desc[$k] ?></p>
                        </div><div class="mCSB_scrollTools" style="position: absolute; display: none;"><div class="mCSB_draggerContainer"><div class="mCSB_dragger" style="position: absolute; top: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="position:relative;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
            </div>
        </div>

        <?php  }

        ?>


            >

        </div>
</div>

                <!--
    @require "company-c/modules/common/main.less"
    @require "company-c/modules/intro/main.less"
-->

<div class="item_container" id="company_intro">
    <div class="item_ltitle">公司介绍</div>
    <div class="item_content">
        <div style="display: block;" class="company_intro_text">
            <span class="company_content"><p><strong>【江湖地位】</strong></p>
<p class="MsoListParagraph">&nbsp; - 2015年度中国最佳创新公司TOP50；</p>
<p class="MsoListParagraph">&nbsp; - 入选国家信息中心信息化研究部《中国分享经济发展报告2016》白皮书；</p>
<p class="MsoListParagraph">&nbsp; - 作为品牌案例收录腾讯研究院《中国分享经济全景解读报告》；</p>
<p class="MsoListParagraph">&nbsp; - 3次登陆央视《新闻联播》；</p>
<p class="MsoListParagraph">&nbsp; - 2016年6月获2500万美金A轮投资，估值超1亿美金；</p>
<p class="MsoListParagraph">&nbsp; -&nbsp;知识分享经济领域的领军者，常常被权威媒体引用为“分答模式”和“在行模式”；</p>
<p class="MsoListParagraph">&nbsp; -「在行」被称作“私人</p><p class="MsoListParagraph"></p><p class="MsoListParagraph"><br></p><p><strong></strong></p><p><strong><br></strong></p><p><strong></strong><br></p><p><strong></strong></p><p class="MsoListParagraph"></p><p><strong><br></strong></p><p><strong><strong></strong></strong></p><p><strong></strong></p><p><strong></strong>...</p></span>
        </div>
    </div>
</div>
                <div class="tags_container item_container" id="tags_container">
                    <div class="item_ltitle">公司标签</div>
                    <div class="tags_warp">
                        <div class="item_content">
                            <ul class="item_con_ul clearfix">
                                <?php
                                $ss = explode(',',$data['label']);
                                    foreach($ss as $k=>$v){?>
                                        <li class="con_ul_li"><?php echo $v ?></li>
                                  <?php   }
                                ?>


                            </ul>
                        </div>
                    </div>
                </div>
                <!--
    @require "company-c/modules/common/main.less"
    @require "company-c/modules/history/main.less"
-->




                <!--
    @require "company-c/modules/common/main.less"
    @require "company-c/modules/reviews/main.less"
    @require "company-c/modules/reviews-latest/main.less"
-->



                <!--
    @require "company-c/modules/common/main.less"
    @require "company-c/modules/address/main.less"
-->


<!-- 公司详情页、职位详情页 推荐-->
            </div>
        </div>

        <div id="container_right">
                        <!--
    @require "company-c/modules/common/main.less"
    @require "company-c/modules/basic-info/main.less"
-->

<div class="item_container" id="basic_container">
    <div class="item_ltitle">公司基本信息</div>
    <div class="item_content">
        <ul>
            <li>
                <i class="type"></i>
                <span><?php  echo $data['company_domain'] ?></span>
            </li>
            <li>
                <i class="process"></i>
                <span><?php  echo $data['develop_stage'] ?></span>
            </li>
            <li>
                <i class="number"></i>
                <span><?php  echo $data['company_scale'] ?></span>
            </li>
                        <li>
                <i class="address"></i>
                <span><?php  echo $data['company_city'] ?></span>
            </li>
                    </ul>
    </div>
</div>


            <!--
    @require "company-c/modules/common/main.less"
    @require "company-c/modules/managers/main.less"
-->

<div class="company_managers item_container" id="company_managers">
    <div class="item_ltitle">管理团队</div>
    <div class="company_mangers_item">
        <div class="managelist_wrap">
            <?php
                $leaderInfosname = explode(',',$data['leaderInfosname']);
                $leaderInfosposition = explode(',',$data['leaderInfosposition']);
                $leaderInfosweibo = explode(',',$data['leaderInfosweibo']);
                $leaderInfosremark = explode(',',$data['leaderInfosremark']);
                    foreach($leaderInfosname as $kk=>$vv){ ?>
                        <ul style="width: 750px; left: 0px;" class="manager_list">
                            <li style="float: left;" class="item_has rotate_item  rotate_active ">
                                <p class="item_manager_name">
                                    <span></span>
                                    <a href="http://weibo.com/jshisan?c=spr_qdhz_bd_baidusmt_weibo_s&amp;nick=%e5%a7%ac%e5%8d%81%e4%b8%89" target="_blank" rel="nofollow" title="新浪微博"></a>
                                </p>
                                <p class="item_manager_title"><?php echo $leaderInfosname[$kk] ?></p>
                                <p class="item_manager_title"><?php echo $leaderInfosposition[$kk] ?></p>
                                <p class="item_manager_title"><?php echo $leaderInfosweibo[$kk] ?></p>
                                <p class="item_manager_title"><?php echo $leaderInfosremark[$kk] ?></p>
                                <div class="item_manager_content mCustomScrollbar _mCS_3"><div class="mCustomScrollBox mCS-dark-2" id="mCSB_3" style="position:relative; height:100%; overflow:hidden; max-width:100%;">
                                        <div class="mCSB_container" style="position:relative; top:0;">
                                            <p><br></p></div>
                                        <div class="mCSB_scrollTools" style="position: absolute; display: block;"><div class="mCSB_draggerContainer"><div class="mCSB_dragger" style="position: absolute; height: 135px; top: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="position: relative; line-height: 135px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
                                <a href="http://baike.baidu.com/link?url=XCHAXodpd7z_DJdrrqNiURsQ96-lTFCdRN5rEV7SLm9No73f_nTzRZmAjZ6d0VFUjYJWKQKbYGxbweufH4cfX7DHWdNO4n3GWGe7dzGMoYwEshEGdZBUaUsMDf4HRPWp" target="_blank" class="item_manager_baidu" rel="nofollow">

                                </a>
                            </li><li style="float: left;" class="item_has rotate_item ">
                                <img class="item_manger_photo_show" src="company_user_files/CgqKkVghUKmAMtw_AAAMghoZoxs564.jpg" alt="创始人头像" height="118" width="118">
                                <p class="item_manager_name">
                                    <span>曾静</span>
                                </p>
                                <p class="item_manager_title">联合创始人、运营VP</p>
                            </li><li style="float: left;" class="item_has rotate_item ">
                                <img class="item_manger_photo_show" src="company_user_files/CgqKkVghUOKACZ3hAAAMjImo828540.jpg" alt="创始人头像" height="118" width="118">
                                <p class="item_manager_name">
                                    <span>杨璐</span>
                                </p>
                                <p class="item_manager_title">联合创始人、市场VP</p>
                            </li></ul>
                 <?php    }
            ?>



        </div>
                    <div class="managers-switch-line">
                <div class="managers-switch-wrapper no_select">
                    <div class="managers-switch switch-disable managers-previous"></div>
                    <div class="managers-switch switch-enable managers-next"></div>
                </div>
            </div>
            </div>
</div>

            <!--
    @require "company-c/modules/common/main.less"
    @require "company-c/modules/tags/main.less"
-->




            <!--
    @require "company-c/modules/common/main.less"
    @require "company-c/modules/navigator/main.less"
-->


        </div>
            </div>

    <a style="display: none;" id="backtop" title="回到顶部" rel="nofollow"></a>
<!-- feedback -->
<!--
    @require "common/widgets/footer_c/modules/feedback/feedback.less"
-->

<div id="product-fk">
	<div id="feedback-icon">
		<div class="fb-icon"></div>
		<span>我要反馈</span>
	</div>
</div>

<div id="footer">
    <div class="wrapper">
        <i class="footer_lagou_icon"></i>
        <div class="inner_wrapper">
            <a class="footer_app" href="http://www.lagou.com/app/download.html" rel="nofollow">拉勾APP<span>new</span><img src="company_user_files/Cgp3O1h0u3yAHBOLAAEEpK9-Koc621.JPG" data-delay-src="https://www.lgstatic.com/i/image/M00/8A/35/Cgp3O1h0u3yAHBOLAAEEpK9-Koc621.JPG" height="256" width="256"></a>
            <a href="http://e.weibo.com/lagou720" target="_blank" rel="nofollow">拉勾微博</a>
            <a class="footer_qr" href="javascript:void(0)" rel="nofollow">拉勾微信<img src="company_user_files/CgpzWlZNl0qAZitPAABXEpAOJx0071.JPG" data-delay-src="http://www.lagou.com/image2/M00/18/45/CgpzWlZNl0qAZitPAABXEpAOJx0071.JPG" height="242" width="242"></a>
            <a href="http://activity.lagou.com/topic/whatisnew.html" target="_blank" rel="nofollow">版本更新</a>
            <a href="https://www.lagou.com/qa.html?t=1" target="_blank" rel="nofollow">帮助中心</a>
            <a href="https://www.lagou.com/about.html" target="_blank" rel="nofollow">联系我们</a>
            <a href="https://activity.lagou.com/activity/dist/business/index.html" target="_blank" rel="nofollow">招聘解决方案</a>
            <span class="tel">服务热线：<em>4006-2828-35 (9:00 -18:00)</em></span>
        </div>
        <div class="copyright ">
            <span><em>©</em>2017 Lagou </span>
            <a target="_blank" href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action" rel="nofollow">京ICP备14023790号-2</a>
            <span>京公网安备11010802017116号</span>
        </div>
    </div>
</div>
<script type="text/javascript" src="company_user_files/vendor_e3ddeee.js"></script>

<script type="text/javascript" src="company_user_files/main.js"></script>
<script type="text/javascript" src="company_user_files/widgets_b4a49f4.js"></script>
<script type="text/javascript" src="company_user_files/userinfo_7f282e9.js"></script>
<script type="text/javascript" src="company_user_files/layout_89bb557.js"></script>
<script type="text/javascript" src="company_user_files/main_002.js"></script>
<script type="text/javascript">
        window.global = window.global || {};
        global.companyInfo = JSON.parse(document.getElementById('companyInfoData').innerHTML);
        global.interviewExperiences = JSON.parse(document.getElementById('interviewExperiencesData').innerHTML);
        global.comprehensiveScore = "4.5";
        global.describeScore =  "4.5";
        global.interviewerScore =  "4.7";
        global.companyScore =  "4.4";
    

    require(['common/widgets/header_c/modules/emailvalid/main']);


    require(['common/widgets/passport/passport'], function() {

    
        require(['common/widgets/common/msgPopup']);
        // require('notice');

    
    });


	    require(['common/widgets/header_c/layout/main']);
	

	require(['company-c/modules/event/activity1230/main']);


    require(['company-c/modules/top-info/main']);


    require(['company-c/modules/tabs/main']);


    require(['company-c/modules/products/main']);


    require(['company-c/modules/intro/main']);


    require(['company-c/modules/reviews-latest/main']);


    require(['company-c/modules/address/main']);


    require(['common/widgets/recommend/main']);


    require(['company-c/modules/managers/main']);


    require(['company-c/modules/navigator/main']);


    require(['company-c/modules/reviews-latest/main']);


    require(['common/widgets/recommend/main']);


    require(['common/widgets/recommend/main']);


	require(['common/widgets/footer_c/modules/feedback/feedback']);


    require(['common/widgets/footer_c/layout/main']);
    
    $(document).ready(function () {
        var selector = '#webchat7moor';
        if ($(selector).length) { 
            return;
        }

        var jqIframe = $('<iframe>', {
            id: selector.slice(1),
            src: '//www.lgstatic.com/third-parties/webchat7moor/main_22faef3.html',
            style: 'margin:0;'
                 + 'padding:0;'
                 + 'width:320px;'
                 + 'height:500px;'
                 + 'border-width:0;'
                 + 'border-radius: 3px;'
                 + 'transition: height 0.5s ease-out;'
                 + 'z-index:-99999;'
                 + 'display: none;'
                 + 'bottom:0;'
                 + 'right:0;'
                 + 'position:fixed;'
        });
        $(document.body).append(jqIframe);

        var child = jqIframe[0].contentWindow;
        var target = window.location.protocol + '//' + (window.GLOBAL_CDN_DOMAIN || 'www.lgstatic.com');

        $('#onlineService, #feedback-icon').on('click', function (e) {
            jqIframe.css('z-index', 99999).show();
            child.postMessage('{"code":1,"message":"open webchat plugin"}', target);
        });

        $(window).on('message', function (e) {
            var origin = e.origin || e.originalEvent.origin;
            if (origin.indexOf(target) !== 0) { 
                return;
            }

            var data = e.data || e.originalEvent.data;
            if (data.code === 2 && typeof data.css !== 'undefined') { 
                jqIframe.css(data.css);
            } else { 
                jqIframe.css('z-index', -99999).hide();
            }
        });
    });
</script><script src="company_user_files/maps"></script>
<script type="text/javascript" src="company_user_files/lg-analytics_da6a007.js"></script>
<script type="text/javascript" src="company_user_files/oss.js"></script>

<div style="display: none;" id="cboxOverlay"></div><div style="display: none;" tabindex="-1" role="dialog" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><button id="cboxPrevious" type="button"></button><button id="cboxNext" type="button"></button><button id="cboxSlideshow"></button><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div></div><iframe style="margin:0;padding:0;width:320px;height:500px;border-width:0;border-radius: 3px;transition: height 0.5s ease-out;z-index:-99999;display: none;bottom:0;right:0;position:fixed;" src="company_user_files/main_22faef3.htm" id="webchat7moor"></iframe><div style="visibility: hidden; left: -1px; top: 4171px; min-width: 1425px;" class="amap-sug-result"></div></body></html>