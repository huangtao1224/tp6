<?php /*a:3:{s:56:"D:\phpstudy_pro\WWW\tp\app\admin\view\classify\edit.html";i:1650598504;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\head.html";i:1655533487;s:54:"D:\phpstudy_pro\WWW\tp\app\admin\view\Common\foot.html";i:1649475024;}*/ ?>
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
<style>#right{padding: 0;}</style>
<div id="right">
    <div class="layui-fluid">
        <div class="layui-row">
            <form class="layui-form" id="layui-form" enctype="multipart/form-data" method="post" action="/admin/classify/edit_save">
                <input type="hidden" name="classify_id" value="<?php echo htmlentities($classify['classify_id']); ?>">
                <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                    <ul class="layui-tab-title">
                        <li class="layui-this">基本设置</li>
                        <li>SEO设置</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show">
                            <div class="layui-form-item">
                                <label for="classify_name" class="layui-form-label">分类名称</label>
                                <div class="layui-input-inline">
                                    <input type="text" id="classify_name" name="classify_name" value="<?php echo htmlentities($classify['classify_name']); ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">父级</label>
                                <div class="layui-input-inline">
                                    <select name="classify_pid">
                                        <option value="1">根目录</option>
                                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo htmlentities($vo['classify_id']); ?>" <?php if($classify['classify_pid']==$vo['classify_id']): ?> selected <?php endif; ?>><?php echo htmlentities($vo['classify_name']); ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">类型</label>
                                <div class="layui-input-inline">
                                    <select name="type_id">
                                        <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo htmlentities($vo['type_id']); ?>" <?php if($classify['type_id']==$vo['type_id']): ?> selected <?php endif; ?>><?php echo htmlentities($vo['type_name']); ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <?php if(is_array($input) || $input instanceof \think\Collection || $input instanceof \think\Paginator): $i = 0; $__LIST__ = $input;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;switch($vo['input_type_id']): case "1": ?>
                            <div class="layui-form-item">
                                <label for="<?php echo htmlentities($vo['field_name']); ?>" class="layui-form-label"><?php echo htmlentities($vo['input_name']); if($vo['prompt']!=''): ?><i class="bi bi-question-circle-fill" lay-tips="<?php echo htmlentities($vo['prompt']); ?>"></i><?php endif; ?></label>
                                <div class="layui-input-inline">
                                    <input type="text" id="<?php echo htmlentities($vo['field_name']); ?>" name="<?php echo htmlentities($vo['field_name']); ?>" value="<?php echo htmlentities($classify[$vo['field_name']]); ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <?php break; case "2": ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><?php echo htmlentities($vo['input_name']); ?></label>
                                <div class="layui-input-inline">
                                    <textarea name="<?php echo htmlentities($vo['field_name']); ?>" value="<?php echo htmlentities($classify[$vo['field_name']]); ?>" class="layui-textarea"><?php echo htmlentities($classify[$vo['field_name']]); ?></textarea>
                                </div>
                            </div>
                            <?php break; case "3": ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><?php echo htmlentities($vo['input_name']); ?></label>
                                <div class="layui-input-inline">
                                    <script type="text/javascript">KindEditor.ready(function (K) {window.editor = K.create('#<?php echo htmlentities($vo['editor']); ?>', {afterBlur: function () {this.sync();}});});</script>
                                    <textarea id="<?php echo htmlentities($vo['editor']); ?>" name="<?php echo htmlentities($vo['field_name']); ?>" style="width:100%;height:200px;"><?php echo htmlentities($classify[$vo['field_name']]); ?></textarea>
                                </div>
                            </div>
                            <?php break; case "4": ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><?php echo htmlentities($vo['input_name']); ?></label>
                                <div class="layui-input-inline">
                                    <?php if(is_array($vo['site_subclass']) || $vo['site_subclass'] instanceof \think\Collection || $vo['site_subclass'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['site_subclass'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><input type="checkbox" name="<?php echo htmlentities($vo['field_name']); ?>[]" lay-skin="primary" title="<?php echo htmlentities($vo2['input_name']); ?>" value="<?php echo htmlentities($vo2['input_value']); ?>" <?php if(isset($vo['site'])&&(in_array($vo2['input_value'],$vo['site']))): ?> checked <?php endif; ?>>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                            <?php break; case "5": ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><?php echo htmlentities($vo['input_name']); ?></label>
                                <div class="layui-input-inline">
                                    <?php if(is_array($vo['site_subclass']) || $vo['site_subclass'] instanceof \think\Collection || $vo['site_subclass'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['site_subclass'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                                    <input type="radio" name="<?php echo htmlentities($vo['field_name']); ?>" title="<?php echo htmlentities($vo2['input_name']); ?>" value="<?php echo htmlentities($vo2['input_value']); ?>" <?php echo $classify[$vo['field_name']]==$vo2['input_value'] ? 'checked' : ''; ?>>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                            <?php break; case "6": ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><?php echo htmlentities($vo['input_name']); ?></label>
                                <div class="layui-input-inline">
                                    <select name="<?php echo htmlentities($vo['field_name']); ?>">
                                        <?php if(is_array($vo['site_subclass']) || $vo['site_subclass'] instanceof \think\Collection || $vo['site_subclass'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['site_subclass'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo htmlentities($vo2['input_value']); ?>" <?php echo $classify[$vo['field_name']]==$vo2['input_value'] ? 'selected' : ''; ?>><?php echo htmlentities($vo2['input_name']); ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <?php break; case "7": ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><?php echo htmlentities($vo['input_name']); ?></label>
                                <div class="layui-input-inline">
                                    <div class="link_up_size layui-btn <?php echo !empty($vo['note']) ? 'state' : ''; ?>" data-id="<?php echo htmlentities($vo['input_id']); ?>" >
                                        <input type="file" name="<?php echo htmlentities($vo['field_name']); ?>">
                                        <i class="bi bi-cloud-arrow-up"></i>&nbsp;上传文件
                                    </div>
                                    <div class="file_name" style="display: inline-block;"></div>
                                    <?php if(!(empty($classify[$vo['field_name']]) || (($classify[$vo['field_name']] instanceof \think\Collection || $classify[$vo['field_name']] instanceof \think\Paginator ) && $classify[$vo['field_name']]->isEmpty()))): ?>
                                    <div style="display: inline-block;">
                                        <img src="/<?php echo htmlentities($classify[$vo['field_name']]); ?>" style="width: 50px;height: 30px;">
                                        <?php if(!(empty($vo['note']) || (($vo['note'] instanceof \think\Collection || $vo['note'] instanceof \think\Paginator ) && $vo['note']->isEmpty()))): ?>
                                        <span><?php echo htmlentities($vo['note']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <button type="button" class="layui-btn layui-btn-danger">删除</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php break; case "8": ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><?php echo htmlentities($vo['input_name']); ?></label>
                                <div class="layui-input-inline">
                                    <input name="<?php echo htmlentities($vo['field_name']); ?>" type="text" value="<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($classify[$vo['field_name']])? strtotime($classify[$vo['field_name']]) : $classify[$vo['field_name']])); ?>" autocomplete="off" class="layui-input layerdate"/><i class="bi bi-calendar3"></i>
                                </div>
                            </div>
                            <?php break; case "9": ?>
                            大文件
                            <?php break; case "10": ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label"><?php echo htmlentities($vo['input_name']); ?></label>
                                <div class="layui-input-inline">
                                    <div class="layui-form-item">
                                        <div class="layui-input-inline">
                                            <input type="text" name="<?php echo htmlentities($vo['field_name']); ?>" value="<?php echo htmlentities($classify[$vo['field_name']]); ?>" class="layui-input">
                                        </div>
                                        <div class="coloris"></div>
                                    </div>
                                </div>
                            </div>
                            <?php break; ?>
                            <?php endswitch; ?>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="layui-tab-item">
                            <div class="layui-form-item">
                                <label for="title" class="layui-form-label">浏览器标题</label>
                                <div class="layui-input-inline">
                                    <input type="text" id="title" name="title" value="<?php echo htmlentities($classify['title']); ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="keywords" class="layui-form-label">浏览器关键词</label>
                                <div class="layui-input-inline">
                                    <input type="text" id="keywords" name="keywords" value="<?php echo htmlentities($classify['keywords']); ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="description" class="layui-form-label">浏览器描述</label>
                                <div class="layui-input-inline">
                                    <input type="text" id="description" name="description" value="<?php echo htmlentities($classify['description']); ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" type="submit">立即提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>