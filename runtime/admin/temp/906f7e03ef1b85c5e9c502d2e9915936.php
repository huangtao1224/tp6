<?php /*a:3:{s:57:"D:\phpstudy_pro\WWW\tp\app\admin\view\common\welcome.html";i:1649475049;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1655533487;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi">
    <link rel="stylesheet" href="/public/admin/js/layui/css/layui.css">
    <link rel="stylesheet" href="/public/admin/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/admin/css/common.css">
    <link rel="stylesheet" href="/public/admin/css/main.css">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_3306110_7buisppgqck.css">
    <script type="text/javascript" src="/public/admin/js/layui/layui.js"></script>
    <script type="text/javascript" src="/public/admin/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/public/admin/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/public/admin/js/canvas-particle.js"></script>
    <script type="text/javascript" src="/public/admin/js/common.js"></script>
    <script type="text/javascript" src="/public/admin/js/xadmin.js"></script>
    <script charset="utf-8" src="/public/kindeditor/kindeditor-all-min.js"></script>
</head>
<style>
    html,body{height: 100%;}

    @media screen and (min-width: 768px) {
        #right::-webkit-scrollbar {
            width: 5px;
            height: 5px;
            background-color: #EEEEEE;
        }
        /*定义滚动条轨道 内阴影+圆角*/
        #right::-webkit-scrollbar-track {
            border-radius: 5px;
            background-color: #EEEEEE;
        }
        /*定义滑块 内阴影+圆角*/
        #right::-webkit-scrollbar-thumb
        {
            border-radius: 5px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
        .layui-table-body::-webkit-scrollbar {
            width: 5px;
            height: 5px;
            background-color: #EEEEEE;
        }

        /*定义滚动条轨道 内阴影+圆角*/
        .layui-table-body::-webkit-scrollbar-track {
            border-radius: 5px;
            background-color: #EEEEEE;
        }

        /*定义滑块 内阴影+圆角*/
        .layui-table-body::-webkit-scrollbar-thumb {
            border-radius: 5px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }
        .layui-form-selected dl::-webkit-scrollbar {
            width: 5px;
            height: 5px;
            background-color: #EEEEEE;
        }
        /*定义滚动条轨道 内阴影+圆角*/
        .layui-form-selected dl::-webkit-scrollbar-track {
            border-radius: 5px;
            background-color: #EEEEEE;
        }
        /*定义滑块 内阴影+圆角*/
        .layui-form-selected dl::-webkit-scrollbar-thumb
        {
            border-radius: 5px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
        .classify_icon::-webkit-scrollbar {width : 5px;height: 5px;background: transparent;}
        .classify_icon::-webkit-scrollbar-thumb {border-radius: 5px;box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);background:#666;}
        .classify_icon::-webkit-scrollbar-track {background:transparent;}
    }
</style>
<body>
<div id="right">
    <div class="layui-card">
        <div class="layui-card-body">
            <div class="layui-elem-quote welcome_box">
                欢迎管理员：<span class="admin_name">管理员</span>&nbsp;&nbsp;&nbsp;当前时间:<span class="nowTime"><?php echo date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);?></span>
            </div>
        </div>
    </div>
    <div class="layui-card">
        <div class="layui-card-header">数据统计</div>
        <div class="layui-card-body">
            <ul class="layui-row layui-col-space10">
                <li class="layui-col-md2 layui-col-xs6">
                    <a href="javascript:;" class="card_list">
                        <h3>文章数</h3>
                        <p>66</p>
                    </a>
                </li>
                <li class="layui-col-md2 layui-col-xs6">
                    <a href="javascript:;" class="card_list">
                        <h3>文章数</h3>
                        <p>66</p>
                    </a>
                </li>
                <li class="layui-col-md2 layui-col-xs6">
                    <a href="javascript:;" class="card_list">
                        <h3>文章数</h3>
                        <p>66</p>
                    </a>
                </li>
                <li class="layui-col-md2 layui-col-xs6">
                    <a href="javascript:;" class="card_list">
                        <h3>文章数</h3>
                        <p>66</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="layui-card">
        <div class="layui-card-header">系统信息</div>
        <div class="layui-card-body">
            <table class="system_table layui-table">
                <tr>
                    <th>服务器语言</th>
                    <td><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];?></td>
                </tr>
                <tr>
                    <th>操作系统</th>
                    <td><?php echo php_uname();?></td>
                </tr>
                <tr>
                    <th>域名</th>
                    <td><?php echo $_SERVER['HTTP_HOST'];?></td>
                </tr>
                <tr>
                    <th>运行环境</th>
                    <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
                </tr>
                <tr>
                    <th>php版本</th>
                    <td><?php echo PHP_VERSION;?></td>
                </tr>
                <tr>
                    <th>Zend版本</th>
                    <td><?php echo Zend_Version();?></td>
                </tr>
                <tr>
                    <th>MYSQL版本</th>
                    <td><?php echo htmlentities($mysql_version); ?></td>
                </tr>
                <tr>
                    <th>PHP运行方式</th>
                    <td><?php echo php_sapi_name();?></td>
                </tr>
                <tr>
                    <th>上传附件</th>
                    <td><?php echo get_cfg_var("upload_max_filesize");?></td>
                </tr>
                <tr>
                    <th>最大执行时间</th>
                    <td><?php echo (get_cfg_var("max_execution_time")?:'0').'秒';?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="quote_box">
        <div class="quote">
            技术支持
        </div>
    </div>
</div>
<script>
    function current(){
        var d=new Date(),str='';
        str +=d.getFullYear()+'-'; //获取当前年份
        if(d.getMonth()+1<=9) {
            str += ("0" + (d.getMonth()+1) + '-');
        }else{
            str +=d.getMonth()+1+'-';
        }
        if(d.getDate()<=9) {
            str += ("0" + d.getDate() + ' ');
        }else{
            str +=d.getDate()+' ';
        }
        if(d.getHours()<=9) {
            str += ("0" + d.getHours() + ':');
        }else{
            str +=d.getHours()+':';
        }
        if(d.getMinutes()<=9) {
            str += ("0" + d.getMinutes() + ':');
        }else{
            str +=d.getMinutes()+':';
        }
        if(d.getSeconds()<=9) {
            str += ("0" + d.getSeconds());
        }else{
            str +=d.getSeconds();
        }
        return str;
    }
    setInterval(function(){$(".nowTime").html(current)},1000);
</script>
</body>
</html>

