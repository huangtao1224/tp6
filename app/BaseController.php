<?php
declare (strict_types = 1);

namespace app;

use think\App;
use think\exception\ValidateException;
use think\Validate;
use think\facade\Db;

/**
 * 控制器基础类
 */
abstract class BaseController
{
    /**
     * Request实例
     * @var \think\Request
     */
    protected $request;

    /**
     * 应用实例
     * @var \think\App
     */
    protected $app;

    /**
     * 是否批量验证
     * @var bool
     */
    protected $batchValidate = false;

    /**
     * 控制器中间件
     * @var array
     */
    protected $middleware = [];

    /**
     * 构造方法
     * @access public
     * @param  App  $app  应用对象
     */
    public function __construct(App $app)
    {
        $this->app     = $app;
        $this->request = $this->app->request;

        // 控制器初始化
        $this->initialize();
    }

    // 初始化
    protected function initialize()
    {}

    /**
     * 验证数据
     * @access protected
     * @param  array        $data     数据
     * @param  string|array $validate 验证器名或者验证规则数组
     * @param  array        $message  提示信息
     * @param  bool         $batch    是否批量验证
     * @return array|string|true
     * @throws ValidateException
     */
    protected function validate(array $data, $validate, array $message = [], bool $batch = false)
    {
        if (is_array($validate)) {
            $v = new Validate();
            $v->rule($validate);
        } else {
            if (strpos($validate, '.')) {
                // 支持场景
                [$validate, $scene] = explode('.', $validate);
            }
            $class = false !== strpos($validate, '\\') ? $validate : $this->app->parseClass('validate', $validate);
            $v     = new $class();
            if (!empty($scene)) {
                $v->scene($scene);
            }
        }

        $v->message($message);

        // 是否批量验证
        if ($batch || $this->batchValidate) {
            $v->batch(true);
        }

        return $v->failException(true)->check($data);
    }

    //文件上传
    public function up_file($arr = array())
    {
        if (is_uploaded_file($_FILES[$arr['name']]['tmp_name'])) {
            $upfile = $_FILES[$arr['name']];
            $name = $upfile["name"];
            $type = $upfile["type"];
            $size = $upfile["size"];
            $tmp_name = $upfile["tmp_name"];
            $error = $upfile["error"];
            if($error=='0')
            {
                $suffix=substr($name, strrpos($name, ".")+1);
                $img_name=time().'_'.$arr['name'].'.'.$suffix;
                $save_path = 'Uploads/images/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
                if (!file_exists($save_path)) {
                    mkdir($save_path, 0777, true);//创建文件
                }
                $file_path = $save_path . $img_name;
                move_uploaded_file($tmp_name,$file_path);
            }
        }
        return $file_path;
    }

    //递归分类
    public function sort($data,$pid =0,$level = 0){
        //定义一个静态数组
        static $arr  = [];
        foreach($data  as $v){
            if ($pid == $v['classify_pid']){
                $v['level_id']=$level;
                $arr[] =  $v;
                $this->sort($data,$v['classify_id'],$level+1);
            }
        }
        //获得一级id
        return $arr;
    }

    //表单显示--添加页面
    public function input_add($arr){
        foreach ($arr as &$v){
            switch ($v['input_type_id']){
                case 3:
                    $v['site'] = 'editor'.mt_rand(100000,999999);
                    break;
                case 4:
                    $v['site_subclass'] = Db::name('input')->where('input_pid='.$v['input_id'])->select()->toArray();
                    break;
                case 5:
                    $v['site_subclass'] = Db::name('input')->where('input_pid='.$v['input_id'])->select()->toArray();
                    break;
                case 6:
                    $v['site_subclass'] = Db::name('input')->where('input_pid='.$v['input_id'])->select()->toArray();
                    break;
            }
        }
        return $arr;
    }

    //表单显示--修改页面
    public function input_edit($arr,$content){
        foreach ($arr as &$v){
            switch ($v['input_type_id']){
//                case 1:
//                    $v['site'] = $site[$v['field_name']];
//                    break;
//                case 2:
//                    $v['site'] = $site[$v['field_name']];
//                    break;
                case 3:
                    $v['site'] = 'editor'.mt_rand(100000,999999);
                    break;
                case 4:
                    $v['site_subclass'] = Db::name('input')->where('input_pid='.$v['input_id'])->select()->toArray();
                    if(!empty($content[$v['field_name']])){
                        $v['site'] = @unserialize($content[$v['field_name']]);
                    }
                    break;
                case 5:
                    $v['site_subclass'] = Db::name('input')->where('input_pid='.$v['input_id'])->select()->toArray();
//                    $v['site'] = $site[$v['field_name']];
                    break;
                case 6:
                    $v['site_subclass'] = Db::name('input')->where('input_pid='.$v['input_id'])->select()->toArray();
//                    $v['site'] = $site[$v['field_name']];
                    break;
//                case 7:
//                    $v['site'] = $site[$v['field_name']];
//                    break;
//                case 8:
//                    $v['site'] = $site[$v['field_name']];
//                    break;
//                case 9:
//                    $v['site'] = $site[$v['field_name']];
//                    break;
//                case 10:
//                    $v['site'] = $site[$v['field_name']];
//                    break;
            }
        }
        return $arr;
    }

}
