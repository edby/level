{extend name="public/base" /}
{block name="head"}
<style type="text/css">
body {
    font-family: Arial, Helvetica, Sans-Serif;
    background-color: #fff;
}

/*通用*/
/* common */
.flex {
    display: -webkit-box;      /* OLD - iOS 6-, Safari 3.1-6 */
    display: -moz-box;         /* OLD - Firefox 19- (buggy but mostly works) */
    display: -ms-flexbox;      /* TWEENER - IE 10 */
    display: -webkit-flex;     /* NEW - Chrome */
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;             /* NEW, Spec - Opera 12.1, Firefox 20+ */
}
/* 宽度随屏幕改变变化 */
.flex-1 {
    flex: 1;
    -webkit-flex: 1;
}

/* 垂直 水平 居中 */
.flex-center {
    justify-content: center;
    -webkit-justify-content: center;
    align-items: center;
    -webkit-align-items: center;
}
/* 垂直 居中 */
.flex-ver {
    align-items: center;
    -webkit-align-items: center;
}
.flex-col-ver{
    justify-content: center;
    -webkit-justify-content: center;
}
/* 换行 */
.flex-wrap{
    flex-wrap: wrap;
    -moz-flex-wrap:wrap;
    -webkit-flex-wrap: wrap;
}
.flex-reverse{
    flex-direction:row-reverse;
    -webkit-flex-direction:row-reverse;
    -moz-flex-direction:row-reverse;
}
/* flex 容器（设置为flex）内子元素向两边顶齐平分 */
.flex-jcsb {
    justify-content: space-between;
    -webkit-justify-content: space-between;
}
/*中间空白左右各一个*/
.flex-around{
    justify-content: space-between;
    -webkit-justify-content: space-between;
  }
/*平均分每个空间*/
.flex-pjf{
    justify-content: space-around;
    -webkit-justify-content: space-around;
}
.flex-end{
    align-items: flex-end;
    -webkit-align-items: flex-end;
}
.flex-end1{
    justify-content: flex-end;
    -webkit-justify-content: flex-end;
}

.flex-col {

    flex-direction: column;
    -webkit-flex-direction: column;

}
/*通用结束*/
.rucian_ny{
    width: 85%;
    margin: 0 auto;
    margin-top: 5%;
    padding: 10px;
    background-color: rgb(242, 242, 242);
    position: relative;
}
.rucian_ty{
    position: absolute;
    width: 68px;
    background-color: white;
    border-radius: 6px;
    text-align: center;
    line-height: 35px;
    right: 20px;
    color: rgb(0, 0, 0);
    top: 50%;
    margin-top: -17.5px;
}
.rucian_sj{
    width: 80%;
    margin: 19% auto;
    text-align: center;
    font-size: 16px;
    color: rgb(26, 196, 199);
}
body{background:#fff;}
.weui-cell__bd p{color: #282828;font-size: 15px;}
.btnWrap{width: 90%;margin:15px auto;}
.exitBtn{width: 100%;background: #e45050;height: 45px;line-height: 45px;font-size: 15px;}
a,a:hover,a:active{color: #282828;text-decoration: none;}
.weui-form-preview:before{border:none;}
.weui-form-preview__label{text-align:right;text-align-last:right;min-width:5em;margin-bottom:0;}
.weui-form-preview__value{text-align:left;}
.weui-form-preview__bd{line-height:1.5;}
label{font-weight:normal;}
</style>
{/block}
{block name="main"}
<div class="page_topbar">
    <a href="javascript:;" class="back" onclick="history.back();"><i class="fa fa-angle-left"></i></a>
    <div class="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;审核升级<a href="{:url('log')}" style="float:right;color:#06f;">审核记录&nbsp;&nbsp;</a></div>
</div>
{if empty($lists)}
	<div class="rucian_sj">暂无审核升级申请!</div>
{else}

<div class="weui-cells" style="margin-top:0px">
	{foreach $lists as $key => $value}
	<div class="weui-form-preview">
	  <div class="weui-form-preview__bd">
	    <div class="weui-form-preview__item">
	      <label class="weui-form-preview__label">会员编号：</label>
	      <span class="weui-form-preview__value">{$value['user_id']+$init_count} {if condition="!$value['check_time']"}<button style="float: right;" item="{$value['id']}" class="btn btn-default agree btn-sm">同意</button>{/if}</span>
	    </div>
	    <div class="weui-form-preview__item">
	      <label class="weui-form-preview__label">姓名：</label>
	      <span class="weui-form-preview__value" style="padding-bottom: 5px;">{$value['username']}</span>
	    </div>
	    <div class="weui-form-preview__item">
	      <label class="weui-form-preview__label">准等级：</label>
	      <span class="weui-form-preview__value">{$value['level_text']} {if condition="!$value['check_time']"}<button style="float: right;" item="{$value['id']}" class="btn btn-default reject btn-sm">拒绝</button>{/if}</span>
	    </div>
	    	    <div class="weui-form-preview__item">
	      <label class="weui-form-preview__label">手机号码：</label>
	      <span class="weui-form-preview__value" style="padding-bottom: 5px;">{$value['mobile']}</span>
	    </div>
	    	    <div class="weui-form-preview__item">
	      <label class="weui-form-preview__label">微信号：</label>
	      <span class="weui-form-preview__value">{$value['wechat']}</span>
	    </div>
	  </div>
	</div>
	{/foreach}
	</div>
{/if}
<style type="text/css">
    .num1{right: 10px;top:3px;width: 7px;height: 7px;}
    footer#footer-nav{bottom: -1px;}
    footer#footer-nav .menu-list li.active a > span{color: #e45050;}
    footer#footer-nav .menu-list li.active a > i{color: #e45050;}
    footer#footer-nav{    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fff), color-stop(1, #fff));}
    footer#footer-nav{height: 57px !important}

    .f-tac{text-align: center;} 
    .weui-flex .weui-flex__item i,.weui-flex .weui-flex__item .ftext{color: #747474;line-height: 17px;font-size: 14px;}
    .weui-flex .weui-flex__item a.active i,.weui-flex .weui-flex__item a.active .ftext{color: #e45050;}
    .weui-flex .weui-flex__item a .iconfont{font-size: 25px;line-height: 25px;}
    .weui-flex .weui-flex__item a {padding: 6px 0;display: block;}
    .weui-flex .weui-flex__item a:hover,.weui-flex .weui-flex__item a:active{text-decoration: none;}
</style>
<div style="height:50px; width:100%;margin:0;padding:0;float:left;display:block;"></div>
        <style type="text/css">
                footer#footer-nav .menu-list li { width:20%}
            </style>
    
    <script id="tpl_show_message" type="text/html">
	<style>
		body{ background: #fff; }
	</style>
	<div class="sweet-alert" style="display:block;">
        <%if type=='error'%><div class="icon error animateErrorIcon" style="display: block;"><span class="x-mark animateXMark"><span class="line left"></span><span class="line right"></span></span></div><%/if%>
        <%if type=='warning'%><div class="icon warning pulseWarning" style="display: block;"><span class="body pulseWarningIns"></span><span class="dot pulseWarningIns"></span></div><%/if%>
        <%if type=='success'%><div class="icon success animate" style="display: block;"><span class="line tip animateSuccessTip"></span><span class="line long animateSuccessLong"></span><div class="placeholder"></div><div class="fix"></div></div><%/if%>
        <div class="info"><%message%><%if url%><br><span>如果您的浏览器没有自动跳转请点击此处</span><%/if%></div>
        
        <div class="sub" 
             <%if url%>
                    onclick="location.href='<%url%>'"
             <%else%>
                    <%if js%>
                        onclick="<%js%>"
                    <%else%>
                        onclick="history.back()"
                    <%/if%>
             <%/if%>
             >
        <%if type=='success'%><div class="green">确认</div><%/if%>
        <%if type=='warning'%><div class="grey">确认</div><%/if%>
        <%if type=='error'%><div class="red">确认</div><%/if%>
    </div>
</script>
<span style="display:none"></span>
{/block}
{block name="footer"}
{include file="public/footer_share" /}
<script>
require(['tpl', 'core'], function(tpl, core) {
	$('.agree').click(function(){
		var type = 1;
		var item_id = $(this).attr('item');
        core.json("{:url()}",{type:type,id:item_id},function(json){
            if(json.code == 1){
               core.tip.show(json.msg);
               setTimeout(function(){window.location.reload();},1500);
             }else{
                core.tip.show(json.msg);
            }
         },true,true);
	});
	$('.reject').click(function(){
		var item_id = $(this).attr('item');
		var type = 2;
        core.json("{:url()}",{type:type,id:item_id},function(json){
            if(json.code == 1){
               core.tip.show(json.msg);
               setTimeout(function(){window.location.reload();},1500);
             }else{
                core.tip.show(json.msg);
            }
         },true,true);
	});
});
</script>
{/block}