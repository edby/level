<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\facade\Session;

class Login extends Controller {
    
    protected function initialize(){
        parent::initialize();
        $this->assign('domain',$this->request->domain());
    }
    
    public function index(){
        self::_isLogin();
        if ($this->request->isAjax() && $this->request->isPost()) {
            $mobile = $this->request->post('memberdata.mobile');
            $password = $this->request->post('memberdata.password');
            if (empty($mobile)) $this->error('请输入手机号码!');
            if (empty($password)) $this->error('请输入登录密码!');
            $this->loginService($mobile, $password);
            return;
        }
        $this->assign('site_name',config('web.site_name'));
        $this->assign('title','会员登录');
        return $this->fetch('login');
    }
    
    public function sendcode(){
        if ($this->request->isAjax() && $this->request->isPost()) {
            $mobile = $this->request->post('mobile');
            $type = $this->request->post('op');
            $message = new \service\Message();
            if ($type == 'forgetcode'){
                $find = db('users')->where(['mobile' => $mobile])->find();
                if (empty($find)) $this->error('会员手机号不存在!');
                if ($find['status'] == 0) {
                    $this->error('此会员已被禁用!');
                }
                $checkcode = $message->send($this->request);
                $this->success('您的验证码是：'.$checkcode);
            }elseif ($type == 'checkcode'){
                if ($message->check($this->request)){
                    $this->success('ok');
                }else{
                    $this->error('验证码错误!');
                }
            }
        }
    }
    
    public function find(){
        if ($this->request->isAjax() && $this->request->isPost()) {
            $mobile = $this->request->post('mobile');
            $password = $this->request->post('password');
            $cpassword = $this->request->post('cpassword');
            if (!Session::has('check_status') && session('check_status') == 'success'){
                $this->error('验证码错误!');
            }
            $find = db('users')->where(['mobile' => $mobile])->find();
            if (empty($find)) $this->error('会员手机号不存在!');
            if ($find['status'] == 0) {
                $this->error('此会员已被禁用!');
            }
            if (mb_strlen($password) < 6) $this->error('登录密码长度不小于6位!');
            if ($password != $cpassword) $this->error('两次密码不一致!');
            if(db('users')->where(['mobile' => $mobile])->update([
                'update_time' => time(),
                'password' => md5(md5($password))
            ])){
                $message = new \service\Message();
                $message->clear($mobile);
                $this->success('ok');
            }else{
                $this->error('修改失败');
            }
            return;
        }
        return $this->fetch('findpwd');
    }
    
    public function logout(){
        Session::clear();
        //开启在destroy
        //Session::start();
        //Session::destroy();
        $this->redirect(url('index'));
    }
    
    private function loginService($mobile, $password){
       $find = db('users')->where(['mobile' => $mobile])->find();
       if (empty($find)) {
           return $this->error('error');
       }
       if ($find['password'] != md5(md5($password))) {
           return $this->error('error pass');
       }
       if ($find['status'] == 0) {
           return $this->error('error lock');
       }
       session('user', ['user_id' => $find['id'],'username' => $find['username']]);
       $this->success('ok');
    }
    
    private function _isLogin(){
        if (Session::has('user')){
            return $this->redirect(url('index/index'));
        }
    }
    
    public function register(){
        self::_isLogin();
        if ($this->request->isAjax() && $this->request->isPost()) {
            $recommend_name = $this->request->post('memberdata.recommend_name');
            $mobile = $this->request->post('memberdata.mobile');
            $wechat = $this->request->post('memberdata.wechat');
            $password = $this->request->post('memberdata.password');
            $cpassword = $this->request->post('memberdata.cpassword');
            $truename = $this->request->post('memberdata.truename');
            if (empty($recommend_name)) $this->error('请输入推荐人!');
            if (empty($mobile)) $this->error('请输入商家手机号码!');
            if (empty($wechat)) $this->error('请输入商家微信号!');
            if (empty($password)) $this->error('请输入商家登录初始密码!');
            if (mb_strlen($password) < 6) $this->error('登录密码长度不小于6位!');
            if ($password != $cpassword) $this->error('两次密码不一致!');
            $data['username'] = $truename;
            $data['recommend_name'] = $recommend_name;
            $data['password'] = md5(md5($password));
            $data['mobile'] = $mobile;
            $data['wechat'] = $wechat;
            $data['create_time'] = time();
            $data['update_time'] = time();
            
            $find = db('users')->where(['mobile' => $mobile])->find();
            if (!empty($find)) $this->error('手机号码已存在!');
            
            $find = db('users')->where(['wechat' => $wechat])->find();
            if (!empty($find)) $this->error('微信号已存在!');
            
            if (Db::name('users')->insert($data) == 1){
                $this->loginService($mobile, $password);
                $this->success('注册成功',url('index/index'));
            }else{
                $this->error('注册失败，请重试');
            }
            return;
        }
        $this->assign('site_name',config('web.site_name'));
        $this->assign('title', '会员注册');
        return $this->fetch();
    }
    
}