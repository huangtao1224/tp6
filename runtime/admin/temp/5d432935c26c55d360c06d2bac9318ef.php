<?php /*a:5:{s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\index\index.html";i:1649486602;s:53:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\top.html";i:1649642853;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1655533487;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\left.html";i:1650360106;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
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
<div class="top">
    <a href="javascript:;" class="logo">后台管理系统</a>
    <div class="top_li">
        <i class="bi bi-list "></i>
        <a class="hidden-sm" target="_blank" href="/">网站首页</a>
        <a class="hidden-sm" href="javascript:;" onclick="cache('<?php echo url('admin/index/del_cache'); ?>')">清除缓存</a>
    </div>
    <div class="user">
        <p><a href="admin.php?m=site&a=password_edit&admin_classify_id=2">管理员</a></p>
        <div class="skin hidden-sm">
            <i class="bi bi-palette-fill"></i>
            <ul>
                <li><a href="javascript:;" data-val="default" title="默认（黑色）"><span style="background: #000"></span>默认（黑色）</a></li>
                <li><a href="javascript:;" data-val="blue" title="蓝色"><span style="background:blue"></span>蓝色</a></li>
                <li><a href="javascript:;" data-val="green" title="绿色"><span style="background: green"></span>绿色</a></li>
                <li><a href="javascript:;" data-val="red" title="红色"><span style="background: red"></span>红色</a></li>
                <li><a href="javascript:;" data-val="orange" title="橙色"><span style="background:orange"></span>橙色</a></li>
            </ul>
        </div>
        <p><a href="<?php echo url('admin/login/logout'); ?>"><i class="bi bi-power"></i></a></p>
    </div>
</div>
<script>
    $('.skin').hover(function(){
        $(this).children('ul').stop().slideToggle();
    })
    $('.skin ul li').hover(function(){
        var color = $(this).children('a').attr('data-val');
        if(color!='default'){
            $(this).children('a').css('color',color);
        }
    },function(){
        $(this).children('a').css('color','#000');
    })
    $(function(){
        if($.cookie("bg-pic")==""||$.cookie("bg-pic")==null){
            $('#left').removeClass('left_'+$.cookie("bg-pic"));
        }else{
            $('.top').addClass($.cookie("bg-pic"));
            $('.tables tr.title').addClass($.cookie("bg-pic"));
            $('#left').addClass('left_'+$.cookie("bg-pic"));
        }
        $('.skin ul li a').click(function(){
            var color = $(this).attr("data-val");
            $('.top').removeClass().addClass('top '+color);
            $('.tables tr.title').removeClass().addClass('title '+color);
            $('#left').removeClass().addClass('left_panel left_'+color);
            $.cookie("bg-pic",color);
        });
    });
    function cache(path) {
        layer.confirm(
            '确定要清除缓存嘛？'
            ,function(){
                $.ajax({
                    type: "post",
                    url: path,
                    data: '',
                    dataType:"html",
                    success: function(htmls)
                    {
                        if(htmls){
                            layer.msg('清除成功',{icon:1,time:1000});
                        }
                    }
                });
            }
        )
    }
</script>

<!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <?php if(is_array($classify) || $classify instanceof \think\Collection || $classify instanceof \think\Paginator): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li>
                <a <?php if(!empty($vo['subclass'])||$vo['admin_classify_id']==3): ?> href="javascript:;" <?php else: ?> onclick="xadmin.add_tab('<?php echo htmlentities($vo['classify_name']); ?>','<?php echo htmlentities($vo['classify_url']); ?>')" <?php endif; ?>>
                    <i class="bi bi-<?php echo htmlentities($vo['classify_icon']); ?>" lay-tips="<?php echo htmlentities($vo['classify_name']); ?>"></i>
                    <cite><?php echo htmlentities($vo['classify_name']); ?></cite>
                    <?php if(!empty($vo['subclass'])||$vo['admin_classify_id']==3): ?><i class="bi bi-chevron-left nav_right"></i><?php endif; ?>
                </a>
                <?php if(!empty($vo['subclass'])): ?>
                <ul class="sub-menu">
                    <?php if(is_array($vo['subclass']) || $vo['subclass'] instanceof \think\Collection || $vo['subclass'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['subclass'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a onclick="xadmin.add_tab('<?php echo htmlentities($vo2['classify_name']); ?>','<?php echo htmlentities($vo2['classify_url']); ?>')">
                            <i class="bi bi-chevron-right"></i>
                            <cite><?php echo htmlentities($vo2['classify_name']); ?></cite>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php endif; if($vo['admin_classify_id']==3): ?>
                <ul class="sub-menu">
                    <?php if(is_array($classify2) || $classify2 instanceof \think\Collection || $classify2 instanceof \think\Paginator): $i = 0; $__LIST__ = $classify2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a onclick="xadmin.add_tab('<?php echo htmlentities($vo2['classify_name']); ?>','/admin/classify/?classify_id=<?php echo htmlentities($vo2['classify_id']); ?>')">
                            <i class="bi bi-chevron-right"></i>
                            <cite><?php echo htmlentities($vo2['classify_name']); ?></cite>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<!-- 左侧菜单结束 -->
<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowClose="true">
        <ul class="layui-tab-title">
            <li class="home layui-this">
                <i class="layui-icon">&#xe68e;</i>我的桌面
            </li>
        </ul>

        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src="<?php echo url('/admin/common/welcome'); ?>" frameborder="0" scrolling="yes"></iframe>
            </div>
        </div>
        <div id="tab_show"></div>
    </div>
</div>
<div class="page-content-bg"></div>
</body>
</html>
