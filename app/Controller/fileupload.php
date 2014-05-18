<?php

class fileuploadController extends Controller{

	private $_isLogin = false;

	public function __construct(){
		parent::__construct();
		if($_SESSION['login'] == 'admin'){
			$this->_isLogin = true;
		}
	}

	public function index(){
	}

	public function upload(){
		if($this->_request->isPOST()){
			$no = $this->_request->getPost('no');
			$file = $_FILES['paper'];
			$t = explode(".", $file['name']);
			$extname = $t[1];
			$newFilename = substr(SYS_ROOT , 0 , -7). "/upload/" . $no . "_專題報告" . date('Ymd-His')  . "." . $extname;
			if($this->_config['other']['system'] == 'Windows'){
				move_uploaded_file($file['tmp_name'] , iconv('utf-8' , 'big5' , $newFilename));
			}else{
				move_uploaded_file($file['tmp_name'] , $newFilename);	
			}
			
			$pass = $_POST['deletepassword'];
			$this->_model->uploadfile($no , $pass , $file['name'] , $no . "_專題報告" . date('Ymd-His')  . "." . $extname);
		}
		header("Location:" . WEB_ROOT . "?message=1");
		return AUTO_SHOWVIEW_OFF;
	}

	public function login(){
		if($this->_request->isPOST()){
			$password = $this->_request->getPost('password');
			if($this->_model->checkpassword($password) == 1){
				$_SESSION['login'] = "admin";
				$this->_isLogin = true;
			}
		}
		if($this->_isLogin){
			header("Location:" . WEB_ROOT . "/fileupload/admin");
			return AUTO_SHOWVIEW_OFF;
		}
	}

	public function delete(){
		$this->_opdata['viewmode'] = 0;
		if($this->_request->isPOST()){
			$pass = $_POST['password'];
			$data = $this->_model->lookupByDeletePassword($pass);
			$this->_opdata['viewmode'] = 1;
			$this->_opdata['data'] = $data;
		}
	}


	/**
	 * Admin Function
	 */
	public function logout(){
		unset($_SESSION['login']);
		header("Location:" . WEB_ROOT);
		return AUTO_SHOWVIEW_OFF;
	}

	private function isLogin(){
		if(!$this->_isLogin){
			header("Location:" . WEB_ROOT . "/fileupload/login");
			return AUTO_SHOWVIEW_OFF;	
		}
	}

	public function admin(){
		$this->isLogin();
		$this->_opdata['list'] = $this->_model->getAll();
	}

	public function runsql(){
		$this->isLogin();
		if($this->_request->isPOST()){
			$sql = $this->_request->getPost("sqlcmd");
			if($this->_model->runSQL($sql)){
				header("Location:" . WEB_ROOT . "/fileupload/runsql/?message=1");
			}else{
				header("Location:" . WEB_ROOT . "/fileupload/runsql/?message=2");
			}
			return AUTO_SHOWVIEW_OFF;	
		}
	}

	public function createtable(){
		$this->isLogin();
		$this->_model->createtable();
		$this->setCustomerView("admin");
		$this->_opdata['message'] = "Create Table Succeed!";
	}
}