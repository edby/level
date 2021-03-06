<?php
namespace app\index\controller;

use app\common\Common;

class Base extends Common {
	
	public function _empty(){
		$this->redirect(url('index/index'));
	}
	
    protected $user;
    
    protected function initialize(){
        parent::initialize();
        
        $user = session('user');
        if (empty($user)) {
            return $this->redirect(url('login/index'));
        }
        $user = db('users')->where(['id' => $user['user_id']])->find();
        if (empty($user)) {
            return $this->redirect(url('login/index'));
        }
        $this->user = $user;
        if ($user['level'] == 0){
        	$user['level_text'] = '暂无等级';
        }else{
        	foreach ($this->level() as $val){
        		if ($user['level'] == $val['level']){
        			$user['level_text'] = $val['name'];
        			break;
        		}
        	}
        }
        $this->assign('user', $user);
        $this->assign('user_id', $user['id']+intval(config('webinfo.init_count')));
        $this->assign('init_count', intval(config('webinfo.init_count')));
        
        $this->wxConfig();

    }
    
}