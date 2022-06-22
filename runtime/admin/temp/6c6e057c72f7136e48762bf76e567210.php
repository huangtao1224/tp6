<?php /*a:3:{s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\input\index.html";i:1652156769;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1655533487;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
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
            <a href="javascript:;" onclick="xadmin.open('添加表单','<?php echo url('admin/input/add'); ?>?content_id=<?php echo htmlentities($id); ?>')" class="layui-btn"><i class="layui-icon"></i>添加表单</a>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="javascript:history.back(-1);" title="返回"><i class="bi bi-arrow-left" style="line-height:30px"></i></a>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="window.location.reload();" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-card-body layui-table-body">
            <form class="layui-form" id="layui-form" style="width: 100%">
                <table class="layui-table layui-form">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th></th>
                        <th>默认值</th>
                        <th>提示</th>
                        <th>备注</th>
                        <th>颜色</th>
                        <th>表单名</th>
                        <th>后台</th>
                        <th>表单类型</th>
                        <th>数据类型</th>
                        <th>数据长度</th>
                        <th>列表</th>
                        <th width="160">排序</th>
                        <th width="160">操作</th>
                    </tr>
                    </thead>
                    <tbody class="x-cate">
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td>
                            <input name="input_id[]" type="hidden" value="<?php echo htmlentities($vo['input_id']); ?>" />
                            <?php echo htmlentities($vo['input_id']); ?>
                        </td>
                        <td>
                            <input name="input_name[]" type="text" value="<?php echo htmlentities($vo['input_name']); ?>" autocomplete="off" class="layui-input"/>
                            <input name="input_value[]" type="hidden" value="<?php echo htmlentities($vo['input_value']); ?>" />
                        </td>
                        <td>
                            <?php if($vo['is_parent']==2): ?>
                            <a href="javascript:;" onclick="xadmin.open('添加','<?php echo url('admin/input/child_add'); ?>?input_pid=<?php echo htmlentities($vo['input_id']); ?>')" class="layui-btn"><i class="layui-icon"></i>添加</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <input name="default_value[]" type="text" value="<?php echo htmlentities($vo['default_value']); ?>" autocomplete="off" class="layui-input"/>
                        </td>
                        <td>
                            <input name="prompt[]" type="text" value="<?php echo htmlentities($vo['prompt']); ?>" autocomplete="off" class="layui-input"/>
                        </td>
                        <td>
                            <input name="note[]" type="text" value="<?php echo htmlentities($vo['note']); ?>" autocomplete="off" class="layui-input"/>
                        </td>
                        <td>
                            <input name="color[]" type="text" value="<?php echo htmlentities($vo['color']); ?>" autocomplete="off" class="layui-input"/>
                        </td>
                        <td>
                            <input name="field_name[]" type="text" value="<?php echo htmlentities($vo['field_name']); ?>" autocomplete="off" class="layui-input"/>
                        </td>
                        <td>
                            <select name="edit_switch[]">
                                <option value="1" <?php echo $vo['edit_switch']=="1" ? 'selected' : ''; ?>>隐藏</option>
                                <option value="2" <?php echo $vo['edit_switch']=="2" ? 'selected' : ''; ?>>显示</option>
                            </select>
                        </td>
                        <td>
                            <select name="input_type_id[]">
                            <?php if(is_array($type_list) || $type_list instanceof \think\Collection || $type_list instanceof \think\Paginator): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo htmlentities($vo2['input_type_id']); ?>" <?php echo $vo['input_type_id']==$vo2['input_type_id'] ? 'selected' : ''; ?>><?php echo htmlentities($vo2['input_type_name']); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                        <td>
                            <select name="data_type_id[]">
                                <?php if(is_array($data_list) || $data_list instanceof \think\Collection || $data_list instanceof \think\Paginator): $i = 0; $__LIST__ = $data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo htmlentities($vo2['data_type_id']); ?>" <?php echo $vo['data_type_id']==$vo2['data_type_id'] ? 'selected' : ''; ?>><?php echo htmlentities($vo2['data_type_name']); ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                        <td>
                            <input name="data_length[]" type="text" value="<?php echo htmlentities($vo['data_length']); ?>" autocomplete="off" class="layui-input"/>
                        </td>
                        <td>
                            <select name="list_switch[]">
                                <option value="1" <?php echo $vo['list_switch']=="1" ? 'selected' : ''; ?>>隐藏</option>
                                <option value="2" <?php echo $vo['list_switch']=="2" ? 'selected' : ''; ?>>显示</option>
                            </select>
                        </td>
                        <td>
                            <input name="date[]" type="text" value="<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['date'])? strtotime($vo['date']) : $vo['date'])); ?>" autocomplete="off" class="layui-input"/>
                        </td>
                        <td>
                            <button class="layui-btn-danger layui-btn layui-btn-xs layui-btn2" type="button" onclick="member_del(this,'<?php echo url('/admin/input/del_save'); ?>','<?php echo htmlentities($vo['input_id']); ?>')"><i class="layui-icon"></i>删除</button>
                        </td>
                    </tr>
                    <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td></td>
                        <td>
                            <input name="input_id[]" type="hidden" value="<?php echo htmlentities($vo2['input_id']); ?>" />
                            <input name="default_value[]" type="hidden" value="<?php echo htmlentities($vo2['default_value']); ?>" />
                            <input name="prompt[]" type="hidden" value="<?php echo htmlentities($vo2['prompt']); ?>" />
                            <input name="note[]" type="hidden" value="<?php echo htmlentities($vo2['note']); ?>" />
                            <input name="field_name[]" type="hidden" value="<?php echo htmlentities($vo2['field_name']); ?>" />
                            <input name="edit_switch[]" type="hidden" value="1" />
                            <input name="input_type_id[]" type="hidden" value="1" />
                            <input name="data_type_id[]" type="hidden" value="1" />
                            <input name="list_switch[]" type="hidden" value="1" />
                            <input name="data_length[]" type="hidden" value="<?php echo htmlentities($vo2['data_length']); ?>" />
                            <?php echo htmlentities($vo2['input_id']); ?>
                        </td>
                        <td><input name="input_name[]" type="text" value="<?php echo htmlentities($vo2['input_name']); ?>" autocomplete="off" class="layui-input"/></td>
                        <td><input name="input_value[]" type="text" value="<?php echo htmlentities($vo2['input_value']); ?>" autocomplete="off" class="layui-input"/></td>
                        <td></td>
                        <td></td>
                        <td><input name="color[]" type="text" value="<?php echo htmlentities($vo2['color']); ?>" autocomplete="off" class="layui-input"/></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input name="date[]" type="text" value="<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo2['date'])? strtotime($vo2['date']) : $vo2['date'])); ?>" autocomplete="off" class="layui-input"/></td>
                        <td>
                            <button class="layui-btn-danger layui-btn layui-btn-xs layui-btn2" type="button" onclick="member_del(this,'<?php echo url('/admin/input/del_save'); ?>','<?php echo htmlentities($vo2['input_id']); ?>')"><i class="layui-icon"></i>删除</button>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <div class="layui-form-item btn_box">
                    <button class="layui-btn" lay-submit lay-filter="batch_edit_save" data-url="/admin/input/batch_edit_save">立即提交</button>
                    <!--<button type="reset" class="layui-btn layui-btn-primary">重置</button>-->
                </div>
            </form>
        </div>
    </div>
    <hr>
</div>
</body>
</html>