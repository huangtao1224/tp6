<?php

namespace app\admin\controller;

use app\BaseController;
use think\facade\Db;
use think\facade\View;


class Content extends BaseController
{
    public function index()
    {
        $classify_id = pg('classify_id');
        $type_id = Db::name('classify')->where('classify_id='.$classify_id)->value('type_id');
        $classify_name = Db::name('classify')->where('classify_id='.$classify_id)->value('classify_name');
        $table_name = Db::name('classify_type')->where('type_id='.$type_id)->value('table_name');
        $input = Db::name('input')->where(array('type_id'=>$type_id,'list_switch'=>2))->select()->toArray();
        $input = $this->input_add($input);

        $childType = Db::name('classify_type')->where('glids='.$type_id)->field('table_name,type_name')->select()->toArray();
        $list = Db::table('index_'.$table_name)->alias('c')->join(['index_relevance'=>'r'],'r.classify_id='.$classify_id.' and r.content_id='.$table_name.'_id')->order('date desc')->paginate(['list_rows'=>20,'query' => request()->param()])->each(function ($item,$key){
            $table_name = Db::name('classify_type')->where('type_id='.$item['type_id'])->value('table_name');
            //子栏目
            $childType = Db::name('classify_type')->where('glids='.$item['type_id'])->field('type_id,table_name,type_name')->select()->toArray();
            foreach ($childType as &$v2){
                $v2['count'] = Db::name($v2['table_name'])->where($table_name.'_id='.$item[$table_name.'_id'])->count();
            }
            $item['child'] = $childType;
            return $item;
        });

        //功能开关
        $functionSwitch = Db::name('function_switch')->where('function_switch_id=1')->find();
        $similar = Db::name('classify')->where('version_id=1')->field('classify_id,level_id,classify_pid,type_id,classify_name')->select()->toArray();
        $similar = recursive_menu($similar,$type_id);

        return view('',[
            'type_id'=>$type_id,
            'table_id'=>$table_name.'_id',
            'classify_id'=>$classify_id,
            'classify_name'=>$classify_name,
            'input'=>$input,
            'list'=>$list,
            'functionSwitch'=>$functionSwitch,
            'similar'=>$similar,
            'childType'=>$childType,
        ]);
    }

    //添加内容--页面
    public function add(){
        $classify_id = pg('classify_id');
        $type_id = Db::name('classify')->where('classify_id='.$classify_id)->value('type_id');
        $input = Db::name('input')->where(array('type_id'=>$type_id,'edit_switch'=>2))->select()->toArray();
        $input = $this->input_add($input);
        return view('',[
            'classify_id'=>$classify_id,
            'type_id'=>$type_id,
            'input'=>$input,
        ]);
    }

    //添加内容--保存
    public function add_save(){
        $data = $_REQUEST;
        $type_id = $data['type_id'];
        $table_name = Db::name('classify_type')->where('type_id='.$type_id)->value('table_name');
        //多选框
        $list=Db::name('input')->where(array('type_id'=>$type_id,'edit_switch'=>2,'input_type_id'=>4))->select()->toArray();
        foreach ($list as $k => $v) {
            if(!empty($data[$v['field_name']])){
                $data[$v['field_name']] = serialize($data[$v['field_name']]);
            }
        }
        //上传口
        $list = Db::name('input')->where(array('type_id' =>$type_id, 'edit_switch' => 2, 'input_type_id' => 7))->select()->toArray();
        foreach ($list as $k => $v) {
            if (!empty($_FILES[$v['field_name']]['tmp_name'])) {
                $data[$v['field_name']] = $this->up_file(array('name' => $v['field_name']));
            }
        }
        //日期框
        $list = Db::name('input')->where(array('type_id' =>$type_id, 'edit_switch' => 2, 'input_type_id' => 8))->select()->toArray();
        foreach ($list as $k => $v) {
            $data[$v['field_name']] = strtotime($data[$v['field_name']]);
        }
        $data['date'] = time();
        $res = Db::name($table_name)->insertGetId($data);
        if ($res) {
            Db::name('relevance')->save(['classify_id'=>$data['classify_id'],'content_id'=>$res,'type_id'=>$type_id]);
            $arr['code'] = 200;
            $arr['msg'] = '操作成功';
            echo json_encode($arr);
            die();
        } else {
            $arr['code'] = 300;
            $arr['msg'] = '操作失败';
            echo json_encode($arr);
            die();
        }

    }

    //修改内容--页面
    public function edit(){
        $type_id = pg('type_id');
        $content_id = pg('content_id');
        $table_name = Db::name('classify_type')->where('type_id='.$type_id)->value('table_name');
        $content = Db::name($table_name)->where($table_name.'_id='.$content_id)->find();
        $input = Db::name('input')->where(array('type_id'=>$type_id,'edit_switch'=>2))->select()->toArray();
        $input = $this->input_edit($input,$content);
        return view('',[
            'table_name'=>$table_name,
            'type_id'=>$type_id,
            'input'=>$input,
            'content_id'=>$content_id,
            'content'=>$content,
        ]);
    }

    //修改内容--保存
    public function edit_save(){
        $data = $_REQUEST;
        $type_id = $data['type_id'];
        $table_name = Db::name('classify_type')->where('type_id='.$type_id)->value('table_name');
        $content = Db::name($table_name)->where($table_name.'_id='.$data[$table_name.'_id'])->find();
        //多选框
        $list=Db::name('input')->where(array('type_id'=>$type_id,'edit_switch'=>2,'input_type_id'=>4))->select()->toArray();
        foreach ($list as $k => $v) {
            if(isset($data[$v['field_name']])){
                $data[$v['field_name']] = serialize($data[$v['field_name']]);
            }
        }
        //上传口
        $list = Db::name('input')->where(array('type_id' =>$type_id, 'edit_switch' => 2, 'input_type_id' => 7))->select()->toArray();
        foreach ($list as $k => $v) {
            if (!empty($_FILES[$v['field_name']]['tmp_name'])) {
                if (file_exists($content[$v['field_name']])) {
                    unlink($content[$v['field_name']]);//通过文件路径来删除
                };
                $data[$v['field_name']] = $this->up_file(array('name' => $v['field_name']));
            }
        }
        //日期框
        $list = Db::name('input')->where(array('type_id' =>$type_id, 'edit_switch' => 2, 'input_type_id' => 8))->select()->toArray();
        foreach ($list as $k => $v) {
            $data[$v['field_name']] = strtotime($data[$v['field_name']]);
        }
        $data['date'] = time();
        $res = Db::name($table_name)->save($data);
        if ($res) {
            $arr['code'] = 200;
            $arr['msg'] = '操作成功';
            echo json_encode($arr);
            die();
        } else {
            $arr['code'] = 300;
            $arr['msg'] = '操作失败';
            echo json_encode($arr);
            die();
        }
    }

    //批量修改
    public function batch_edit_save(){
        $data = $_REQUEST;
        $classify_id = $data['classify_id'];
        $type_id = $data['type_id'][0];
        $batch_copy_id = $data['batch_copy'];
        $batch_move_id = $data['batch_move'];
        $batch_delete_id = $data['batch_delete'];
        $table_name = Db::name('classify_type')->where('type_id='.$type_id)->value('table_name');
        $newarray = array();
        foreach ($data as $k => $v) {
            if($k=='batch_copy'|| $k=='batch_move' || $k=='batch_delete' || $k=='classify_id'){
                continue;
            }else{
                foreach ($v as $key => $val) {
                    $newarray[$key][$k] = $val;
                }
            }
        }
        foreach ($newarray as $k => &$v) {
            $v['date'] = strtotime($v['date']);
            $table_name = Db::name('classify_type')->where('type_id='.$v['type_id'])->value('table_name');
            $v[$table_name.'_id'] = $v['content_id'];
            unset($v['content_id']);
            Db::name($table_name)->save($v);
        }

        //批量复制
        if($batch_copy_id!=''){
            if(empty($data['child'])){
                $arr['code'] = 300;
                $arr['msg'] = '最少选择一条数据';
                echo json_encode($arr);
                die();
            }else {
                foreach ($data['child'] as $k => $v) {
                    $content = Db::name($table_name)->where(array($table_name . '_id' => $v))->find();
                    $new_content = $content;
                    $new_content['date'] = time() + $k + 60;
                    unset($new_content[$table_name . '_id']);
                    $list = Db::name('input')->where(array('type_id' => $type_id, 'edit_switch' => 2, 'input_type_id' => 7))->select();
                    foreach ($list as $key => $val) {
                        if (file_exists($content[$val['field_name']])) {

                            $suffix = strrchr($content[$val['field_name']], '.');
                            $img_name = rand(1, 8000) . rand(8000, 16000) . '_' . $val['field_name'] . $suffix;

                            $path['path'] = 'Uploads/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
                            if (!file_exists($path['path'])) {
                                mkdir($path['path'], 0777, true);//创建文件
                            }
                            $new_content[$val['field_name']] = $path['path'] . $img_name;
                            copy($content[$val['field_name']], $new_content[$val['field_name']]);
                        }
                    }
                    $res = Db::name($table_name)->insertGetId($new_content);
                    if ($res) {
                        Db::name('relevance')->save(['classify_id' => $batch_copy_id, 'content_id' => $res, 'type_id' => $type_id]);
                    }
                }
            }
        }

        //批量移动
        if($batch_move_id!=''){
            if(empty($data['child'])){
                $arr['code'] = 300;
                $arr['msg'] = '最少选择一条数据';
                echo json_encode($arr);
                die();
            }else {
                foreach ($data['child'] as $k => $v) {
                    $list = Db::name('relevance')->where(array('classify_id' => $batch_move_id, 'content_id' => $v, 'type_id' => $type_id))->find();
                    if (!empty($list)) {
                        Db::name('relevance')->where(array('classify_id' => $batch_move_id, 'content_id' => $v, 'type_id' => $type_id))->delete();

                    }
                    Db::name('relevance')->where(array('content_id' => $v, 'type_id' => $type_id))->save(['classify_id' => $batch_move_id]);
                }
            }
        }

        //批量删除
        if($batch_delete_id!=''){
            if($batch_delete_id==1){
                if(empty($data['child'])){
                    $arr['code'] = 300;
                    $arr['msg'] = '最少选择一条数据';
                    echo json_encode($arr);
                    die();
                }else{
                    foreach ($data['child'] as $k=>$v){
                        $content = Db::name($table_name)->where(array($table_name . '_id' => $v))->find();
                        if(!$content || !$type_id){
                            $arr['code'] = 300;
                            $arr['msg'] = '操作失败';
                            echo json_encode($arr);
                            die();
                        }
                        $list = Db::name('input')->where(array('type_id' => $type_id, 'edit_switch' => 2, 'input_type_id' => 7))->select();
                        foreach($list as $key => $val){
                            if(file_exists($content[$val['field_name']])){
                                unlink($content[$val['field_name']]);	//通过文件路径来删除
                            }
                        }
                        Db::name($table_name)->where(array($table_name.'_id' => $v))->delete();
                        Db::name('relevance')->where(array('content_id' => $v, 'type_id' => $type_id))->delete();
                    }
                }
            }else if($batch_delete_id==2){
                $list = Db::table('index_'.$table_name)->alias('c')->join(['index_relevance'=>'r'],'r.classify_id='.$classify_id.' and r.content_id='.$table_name.'_id')->order('date desc')->select()->toArray();
                foreach ($list as $k=>$v){
                    $input = Db::name('input')->where(array('type_id' => $v['type_id'], 'edit_switch' => 2, 'input_type_id' => 7))->select();
                    foreach($input as $key => $val){
                        if(file_exists($v[$val['field_name']])){
                            unlink($v[$val['field_name']]);	//通过文件路径来删除
                        }
                    }
                    Db::name($table_name)->where(array($table_name.'_id' => $v[$table_name.'_id']))->delete();
                    Db::name('relevance')->where(array('relevance_id' => $v['relevance_id']))->delete();
                }
            }
        }
        $arr['code'] = 200;
        $arr['msg'] = '操作成功';
        echo json_encode($arr);
        die();
    }

    //删除
    public function del_save(){
        $data = $_REQUEST;
        $table_name = Db::name('classify_type')->where('type_id='.$data['type_id'])->value('table_name');
        $list = Db::table('index_'.$table_name)->alias('c')->join(['index_relevance'=>'r'],'r.classify_id='.$data['classify_id'].' and r.content_id='.$table_name.'_id and c.'.$table_name.'_id='.$data['id'])->order('date desc')->find();
        $input = Db::name('input')->where(array('type_id' => $list['type_id'], 'edit_switch' => 2, 'input_type_id' => 7))->select();
        foreach($input as $key => $val){
            if(file_exists($list[$val['field_name']])){
                unlink($list[$val['field_name']]);	//通过文件路径来删除
            }
        }
        if(!empty($list)){
            Db::name($table_name)->where(array($table_name.'_id' => $list[$table_name.'_id']))->delete();
            Db::name('relevance')->where(array('relevance_id' => $list['relevance_id']))->delete();
            $arr['code'] = 200;
            $arr['msg'] = '操作成功';
            echo json_encode($arr);
            die();
        }else{
            $arr['code'] = 300;
            $arr['msg'] = '操作失败';
            echo json_encode($arr);
            die();
        }
    }

    //子栏目页面
    public function apply(){
        $type_id = pg('type_id');
        $content_id = pg('content_id');

        $table = Db::name('classify_type')->where('type_id='.$type_id)->field('table_name,glids')->find();
        $ptable_name = Db::name('classify_type')->where('type_id='.$table['glids'])->value('table_name');

        $input = Db::name('input')->where(array('type_id'=>$type_id,'list_switch'=>2))->select()->toArray();
        $input = $this->input_add($input);

        $childType = Db::name('classify_type')->where('glids='.$type_id)->field('table_name,type_name')->select()->toArray();
        $list = Db::name($table['table_name'])->where($ptable_name.'_id='.$content_id)->order('date desc')->paginate(['list_rows'=>20,'query' => request()->param()])->each(function ($item,$key){
            $table_name = Db::name('classify_type')->where('type_id='.$item['type_id'])->value('table_name');
            //子栏目
            $childType = Db::name('classify_type')->where('glids='.$item['type_id'])->field('type_id,table_name,type_name')->select()->toArray();
            foreach ($childType as &$v2){
                $v2['count'] = Db::name($v2['table_name'])->where($table_name.'_id='.$item[$table_name.'_id'])->count();
            }
            $item['child'] = $childType;
            return $item;
        });

        //功能开关
        $functionSwitch = Db::name('function_switch')->where('function_switch_id=1')->find();
        $similar = Db::name('classify')->where('version_id=1')->field('classify_id,level_id,classify_pid,type_id,classify_name')->select()->toArray();
        $similar = recursive_menu($similar,$type_id);

        return view('',[
            'type_id'=>$type_id,
            'table_id'=>$table['table_name'].'_id',
//            'classify_id'=>$classify_id,
//            'classify_name'=>$classify_name,
            'input'=>$input,
            'list'=>$list,
            'functionSwitch'=>$functionSwitch,
            'similar'=>$similar,
            'childType'=>$childType,
        ]);
    }
}