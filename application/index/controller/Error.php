<?php
namespace app\index\controller;
use think\Controller;

class Error extends Controller {
	
	public function index(){
		$this->redirect(url('index/index'));
	}
	
}