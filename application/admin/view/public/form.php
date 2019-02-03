<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{:config('admin.title')}</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__CSS__/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="__PLUGINS__/css/iCheck/custom.css" rel="stylesheet">
    <link href="__CSS__/animate.css" rel="stylesheet">
    <link href="__CSS__/style.css?v=4.1.0" rel="stylesheet">
    <link href="__PLUGINS__/css/toastr/toastr.min.css" rel="stylesheet">
    {block name="css"}{/block}
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="ibox-title">首页 / {block name="menu"}{/block}</div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    {if condition="!isset($hideForm)"}
                    <form method="post" class="form-horizontal {block name="class"}{/block}" enctype="multipart/form-data" action="{block name='action'}{/block}">
                        {block name="form"}{/block}
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary submit" type="submit">保存</button>
                                <span class="btn btn-white" onclick="history.back()">返回</span>
                            </div>
                        </div>
                    </form>
                    {/if}
                    {block name="main"}{/block}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 全局js -->
<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<!-- 自定义js -->
<script src="__PLUGINS__/js/toastr/toastr.min.js"></script>
<script src="__JS__/content.js?v=1.0.0"></script>
<script src="__JS__/jquery.form.js"></script>
<!-- iCheck -->
<script src="__PLUGINS__/js/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
        {if condition="isset($alert)"}
	        $('form.ajaxPost .submit').click(function(){
		        var x = $('input[name=level]:checked').attr('item');
		        if(confirm("你确认要将该会员的当前等级：\n{$user['level_text']}\n改为\n"+x)){
			        $('form.ajaxPost').ajaxForm(function(response) {
			            if (!response.code) {
			                warning(response.msg)
			            } else {
			                success(response.msg)
			                setTimeout(function(){
			                    window.location.href = response.url
			                }, response.wait * 1000);
			            }
			        });
		        }
				return false;
	        });
        {else}
	        $('form.ajaxPost').ajaxForm(function(response) {
	            if (!response.code) {
	                warning(response.msg)
	            } else {
	                success(response.msg)
	                setTimeout(function(){
	                    window.location.href = response.url
	                }, response.wait * 1000);
	            }
	        });
        {/if}
    });
</script>
{block name="js"}{/block}
</body>
</html>
