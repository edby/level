<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>config('admin.title')</title>
<link rel="shortcut icon" href="favicon.ico"> <link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="__CSS__/font-awesome.css?v=4.4.0" rel="stylesheet">
<link href="__CSS__/animate.css" rel="stylesheet">
<link href="__CSS__/style.css?v=4.1.0" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Welcome</h5>
                </div>
                <div class="ibox-content">
                    <h2>管理后台<br/></h2>
                    <p>欢迎使用管理后台</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>基本信息</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    运行环境
                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">

                                            <tr>
                                                <th>PHP 版本</th>
                                                <td>{$Think.PHP_VERSION}</td>
                                            </tr>
                                            <tr>
                                                <th>MYSQL 版本</th>
                                                <td>{:mysqli_get_client_version()}</td>
                                            </tr>
                                            <tr>
                                                <th>WEB 服务器</th>
                                                <td>{$_SERVER['SERVER_SOFTWARE']}</td>
                                            </tr>
                                            <tr>
                                                <th>操作系统</th>
                                                <td>{$Think.PHP_OS}</td>
                                            </tr>
                                            <tr>
                                                <td>opcache (建议开启)</td>
                                                {if condition="function_exists('opcache_get_configuration')"}
                                                    <td>{:opcache_get_configuration()['directives']['opcache.enable'] ? '开启' : '关闭' }</td>
                                                {else/}
                                                    <td>未开启</td>
                                                {/if}
                                            </tr>
                                            <tr>
                                                <td>脚本最大执行时间(s)</td>
                                                <td>{:get_cfg_var("max_execution_time")}</td>
                                            </tr>
                                            <tr>
                                                <td>上传限制大小(M)</td>
                                                <td>{:get_cfg_var ("upload_max_filesize")}</td>
                                            </tr>
                                            <tr>
                                                <td>当前时间</td>
                                                <td>{:date("Y-m-d H:i:s")}</td>
                                            </tr>
                                            <tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- 全局js -->
<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<!-- 自定义js -->
<script src="__JS__/content.js?v=1.0.0"></script>

</body>

</html>
