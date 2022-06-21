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
        $table_name = Db::name('classify_type')->where('type_id='.$type_id)->value('table_name');
        $input = Db::name('input')->where(array('type_id'=>$type_id,'list_switch'=>2))->select()->toArray();
        $input = $this->input_add($input);
        $list = Db::table('index_'.$table_name)->alias('c')->join(['index_relevance'=>'r'],'r.classify_id='.$classify_id.' and r.content_id='.$table_name.'_id')->order('date desc')->paginate(['list_rows'=>2,'query' => request()->param()]);
        //功能开关
//        $functionSwitch = Db::name('function_switch')->where('function_switch_id=1')->find();
//        $similar = Db::name('classify')->where('version_id=1')->field('classify_id,level_id,classify_pid,type_id,classify_name')->fetchSql(true)->select()->toArray();

        return view('',[
            'type_id'=>$type_id,
            'table_id'=>$table_name.'_id',
            'classify_id'=>$classify_id,
            'input'=>$input,
            'list'=>$list,
//            'functionSwitch'=>$functionSwitch,
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
        $newarray = array();
        foreach ($data as $k => $v) {
            foreach ($v as $key => $val) {
                $newarray[$key][$k] = $val;
            }
        }
        foreach ($newarray as $k => &$v) {
            $v['date'] = strtotime($v['date']);
            $table_name = Db::name('classify_type')->where('type_id='.$v['type_id'])->value('table_name');
            $v[$table_name.'_id'] = $v['content_id'];
            unset($v['content_id']);
            Db::name($table_name)->save($v);
        }
        $arr['code'] = 200;
        $arr['msg'] = '操作成功';
        echo json_encode($arr);
        die();
    }
}