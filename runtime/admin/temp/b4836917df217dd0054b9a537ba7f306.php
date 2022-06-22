<?php /*a:3:{s:56:"D:\phpstudy_pro\WWW\tp\app\admin\view\content\apply.html";i:1655864150;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1655533487;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
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
            <a href="javascript:;" onclick="xadmin.open('添加表单','<?php echo url('admin/content/add'); ?>')" class="layui-btn"><i class="layui-icon"></i>添加内容</a>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="javascript:history.back(-1);" title="返回"><i class="bi bi-arrow-left" style="line-height:30px"></i></a>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="window.location.reload();" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-card-body layui-table-body visible">
            <form class="layui-form">
                <table class="layui-table layui-form">
                    <thead>
                    <tr>
                        <th width="80">
                            <input type="checkbox" lay-skin="primary" lay-filter="choseAll" title="全选" class="choseAll">
                        </th>
                        <?php if(is_array($input) || $input instanceof \think\Collection || $input instanceof \think\Paginator): $i = 0; $__LIST__ = $input;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <th><?php echo htmlentities($vo['input_name']); ?></th>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <th>归属栏目</th>
                        <?php if(!(empty($childType) || (($childType instanceof \think\Collection || $childType instanceof \think\Paginator ) && $childType->isEmpty()))): ?>
                        <th>子栏目</th>
                        <?php endif; ?>
                        <th width="160">排序</th>
                        <th width="200">操作</th>
                    </tr>
                    </thead>
                    <tbody class="x-cate">
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td>
                            <input name="content_id[]" type="hidden" value="<?php echo htmlentities($vo[$table_id]); ?>" />
                            <input type="hidden" name="type_id[]" value="<?php echo htmlentities($type_id); ?>">
                            <input type="checkbox" lay-filter="child" name="child[]" lay-skin="primary" title="<?php echo htmlentities($vo[$table_id]); ?>" value="<?php echo htmlentities($vo[$table_id]); ?>" class="child">
                        </td>
                        <?php if(is_array($input) || $input instanceof \think\Collection || $input instanceof \think\Paginator): $i = 0; $__LIST__ = $input;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                        <td>
                            <?php switch($vo2['input_type_id']): case "1": ?>
                            <!--输入框-->
                            <input name="<?php echo htmlentities($vo2['field_name']); ?>[]" type="text" value="<?php echo htmlentities($vo[$vo2['field_name']]); ?>" autocomplete="off" class="layui-input"/>
                            <?php break; case "2": ?>
                            <!--多行框-->
                            <?php echo htmlentities($vo[$vo2['field_name']]); break; case "3": ?>
                            <!--智能口-->
                            <?php echo htmlentities($vo[$vo2['field_name']]); break; case "4": ?>
                            <!--多选框-->
                            <?php echo htmlentities($vo[$vo2['field_name']]); break; case "5": ?>
                            <!--单选框-->
                            <?php echo htmlentities($vo[$vo2['field_name']]); break; case "6": ?>
                            <!--下拉框-->
                            <select name="<?php echo htmlentities($vo2['field_name']); ?>[]">
                                <option value="">请选择</option>
                                <?php if(is_array($vo2['site_subclass']) || $vo2['site_subclass'] instanceof \think\Collection || $vo2['site_subclass'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo2['site_subclass'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo htmlentities($vo3['input_value']); ?>" <?php echo $vo[$vo2['field_name']]==$vo3['input_value'] ? 'selected' : ''; ?>><?php echo htmlentities($vo3['input_name']); ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <?php break; case "7": ?>
                            <!--上传口-->
                            <a href="/<?php echo htmlentities($vo[$vo2['field_name']]); ?>"><img src="/<?php echo htmlentities($vo[$vo2['field_name']]); ?>" style="width: 50px;height: 30px;"></a>
                            <?php break; case "8": ?>
                            <!--日期框-->
                            <?php if(!(empty($vo[$vo2['field_name']]) || (($vo[$vo2['field_name']] instanceof \think\Collection || $vo[$vo2['field_name']] instanceof \think\Paginator ) && $vo[$vo2['field_name']]->isEmpty()))): ?>
                            <?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo[$vo2['field_name']])? strtotime($vo[$vo2['field_name']]) : $vo[$vo2['field_name']])); ?>
                            <?php endif; break; case "9": ?>
                            大文件
                            <?php break; case "10": ?>
                            <?php echo htmlentities($vo[$vo2['field_name']]); break; ?>
                            <?php endswitch; ?>
                        </td>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <td style="font-weight: bold;color:#000;"></td>
                        <?php if(!(empty($childType) || (($childType instanceof \think\Collection || $childType instanceof \think\Paginator ) && $childType->isEmpty()))): ?>
                        <td>
                            <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?>
                            <a href="/admin/content/apply/?content_id=<?php echo htmlentities($vo[$table_id]); ?>&type_id=<?php echo htmlentities($child['type_id']); ?>" class="layui-btn layui-btn layui-btn-normal"><i class="layui-icon layui-icon-list"></i><?php echo htmlentities($child['type_name']); ?>(<?php echo htmlentities($child['count']); ?>)</a>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                        <?php endif; ?>
                        <td><input name="date[]" type="text" value="<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['date'])? strtotime($vo['date']) : $vo['date'])); ?>" autocomplete="off" class="layui-input"/></td>
                        <td>
                            <button type="button" class="layui-btn layui-btn-normal layui-btn-xs layui-btn2" onclick="xadmin.open('修改','<?php echo url('admin/content/edit'); ?>?content_id=<?php echo htmlentities($vo[$table_id]); ?>&type_id=<?php echo htmlentities($vo['type_id']); ?>')"><i class="layui-icon"></i>修改</button>
                            <button class="layui-btn-danger layui-btn layui-btn-xs layui-btn2" type="button" onclick="content_del(this,'<?php echo url('/admin/content/del_save'); ?>','<?php echo htmlentities($vo[$table_id]); ?>','<?php echo htmlentities($type_id); ?>')"><i class="layui-icon"></i>删除</button>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>

                <div class="layui-form-item btn_box">
                    <?php if($functionSwitch['batch_move']==1): ?>
                    <select name="batch_move">
                        <option value="">批量移动</option>
                        <?php if(is_array($similar) || $similar instanceof \think\Collection || $similar instanceof \think\Paginator): $i = 0; $__LIST__ = $similar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['classify_id']); ?>"><?php echo htmlentities($vo['classify_name']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <?php endif; if($functionSwitch['batch_copy']==1): ?>
                    <select name="batch_copy">
                        <option value="">批量复制</option>
                        <?php if(is_array($similar) || $similar instanceof \think\Collection || $similar instanceof \think\Paginator): $i = 0; $__LIST__ = $similar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['classify_id']); ?>"><?php echo htmlentities($vo['classify_name']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <?php endif; if($functionSwitch['batch_delete']==1): ?>
                    <select name="batch_delete">
                        <option value="">批量删除</option>
                        <option value="1">删除选中数据</option>
                        <option value="2">全部数据删除</option>
                    </select>
                    <?php endif; ?>
                    <button class="layui-btn" lay-submit lay-filter="batch_edit_save" data-url="/admin/content/batch_edit_save">立即提交</button>
                    <!--<button type="reset" class="layui-btn layui-btn-primary">重置</button>-->
                </div>
                <?php echo $list; ?>
            </form>
        </div>
    </div>
    <hr>

</div>
</body>
</html>