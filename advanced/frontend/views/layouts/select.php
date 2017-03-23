<div id="search_box">
    <form id="searchForm" name="searchForm" action="?r=index/jobselect" method="post">
        <ul id="searchType">
            <li data-searchtype="1" class="type_selected">职位</li>
            <li data-searchtype="4">公司</li>
        </ul>
        <div class="searchtype_arrow"></div>
        <!--            <script src="js.js"></script>-->
        <script type="text/javascript">
            $(function () {
                $(document).on('keydown','#search_input', function () {
                    str = $("#search_input").val();

                })
                $(document).on('keyup','#search_input', function () {
                    var selects = $("#search_input").val();
//                    alert($("#aa").html())
                    if(selects!=str){
                        $.ajax({
                            type: "POST",
                            url: "?r=index/selects",
                            data:{name:selects},
                            success: function(msg){
                                $("#aa").html(msg)

                            }
                        });
                    }

                })
            })

        </script>
        <!--            这里-->
        <input type="text" list="aa" id="search_input" name = "kd"  tabindex="1" value=""  placeholder="请输入职位名称，如：产品经理"  />

        <!--        <input type="hidden" name="spc" id="spcInput" value=""/>-->
        <!--        <input type="hidden" name="pl" id="plInput" value=""/>-->
        <!--        <input type="hidden" name="gj" id="gjInput" value=""/>-->
        <input type="hidden" name="xl" id="xlInput" value=""/>
        <input type="hidden" name="yx" id="yxInput" value=""/>
        <input type="hidden" name="gx" id="gxInput" value="" />
        <input type="hidden" name="st" id="stInput" value="" />
        <input type="hidden" name="labelWords" id="labelWords" value="" />
        <input type="hidden" name="lc" id="lc" value="" />
        <input type="hidden" name="workAddress" id="workAddress" value=""/>
        <input type="hidden" name="city" id="cityInput" value=""/>
        <input type="submit" id="search_button" value="搜索" />
        <datalist style="height: 100px" id="aa">
        </datalist>
    </form>
</div>
<style>
    .ui-autocomplete{width:488px;background:#fafafa !important;position: relative;z-index:10;border: 2px solid #91cebe;}
    .ui-autocomplete-category{font-size:16px;color:#999;width:50px;position: absolute;z-index:11; right: 0px;/*top: 6px; */text-align:center;border-top: 1px dashed #e5e5e5;padding:5px 0;}
    .ui-menu-item{ *width:439px;vertical-align: middle;position: relative;margin: 0px;margin-right: 50px !important;background:#fff;border-right: 1px dashed #ededed;}
    .ui-menu-item a{display:block;overflow:hidden;}
</style>
<script type="text/javascript" src="style/js/search.min.js"></script>
<dl class="hotSearch">
    <dt>热门搜索：</dt>
    <?php
    foreach($hot as $k=>$v){?>
        <dd><a style="color: #9CCBD6" href="?r=index/jobselect&select=<?php echo $v['job_name'] ?>"><?php echo $v['job_name'] ?></a></dd>
    <?php   }
    ?>

</dl>
<?=$selectss?>
