<?php /*a:1:{s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\login\index.html";i:1649468976;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/public/admin/js/layui/css/layui.css">
    <link rel="stylesheet" href="/public/admin/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/admin/css/common.css">
    <link rel="stylesheet" href="/public/admin/css/login.css">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_3306110_7buisppgqck.css">
    <script type="text/javascript" src="/public/admin/js/layui/layui.js"></script>
    <script type="text/javascript" src="/public/admin/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/public/admin/js/canvas-particle.js"></script>
    <script type="text/javascript" src="/public/admin/js/common.js"></script>
</head>
<body>
<div id="particles">
    <div class="login_box">
        <div class="login_tit">后台管理系统</div>
        <div class="login_subtit">System Management Center </div>
        <div class="login_line"></div>
        <div class="login_submit">
            <form autocomplete="off">
                <p>
                    <i class="iconfont icon-user"></i>
                    <input type="text" name="username" placeholder="用户名" autocomplete="off">
                </p>
                <p>
                    <i class="iconfont icon-Password"></i>
                    <input type="password" name="password" placeholder="密码" autocomplete="off">
                </p>
                <p>
                    <i class="iconfont icon-anquan"></i>
                    <input type="text" class="item" placeholder="验证码" name="code">
                    <img src="<?php echo url('admin/login/verify'); ?>" alt="captcha" class="yzm" onclick="this.src='<?php echo url('admin/login/verify'); ?>?code='+Math.random()"/>
                </p>
                <p><a class="login_a" onclick="link_login();">登录</a></p>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function() {
        //配置
        var config = {
            vx: 4,	//小球x轴速度,正为右，负为左
            vy: 4,	//小球y轴速度
            height: 2,	//小球高宽，其实为正方形，所以不宜太大
            width: 2,
            count: 200,		//点个数
            color: "121, 162, 185", 	//点颜色
            stroke: "130,255,255", 		//线条颜色
            dist: 6000, 	//点吸附距离
            e_dist: 20000, 	//鼠标吸附加速距离
            max_conn: 10 	//点到点最大连接数
        }
        //调用
        CanvasParticle(config);
    }
</script>
</body>
</html>