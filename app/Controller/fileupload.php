<?php

class fileuploadController extends Controller{

	private $_isLogin = false;

	public function __construct(){
		parent::__construct();
		if($_SESSION['login'] == 'admin'){
			$this->_isLogin = true;
		}
	}


    /**
     * 首頁
     */
    public function index(){
        //$this->_model->createTable();
	}

    /**
     * 接收上傳POST，重新導到index
     */
    public function upload(){
		if($this->_request->isPost()){
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
		return self::AUTO_SHOWVIEW_OFF;
	}

    public function login(){
		if($this->_request->isPost()){
			$password = $this->_request->getPost('password');
			if($this->_model->checkpassword($password) == 1){
				$_SESSION['login'] = "admin";
				$this->_isLogin = true;
			}
		}
		if($this->_isLogin){
			header("Location:" . WEB_ROOT . "/fileupload/admin");
			return self::AUTO_SHOWVIEW_OFF;
		}
	}

    public function delete(){
        
    }

	/**
	 * Admin Function
	 */
	public function logout(){
		unset($_SESSION['login']);
		header("Location:" . WEB_ROOT);
		return self::AUTO_SHOWVIEW_OFF;
	}

	private function isLogin(){
		if(!$this->_isLogin){
			header("Location:" . WEB_ROOT . "/fileupload/login");
			return self::AUTO_SHOWVIEW_OFF;
		}
	}

	public function admin(){
		$this->isLogin();
		$this->_opdata['list'] = $this->_model->getAll();
	}

	public function runsql(){
		$this->isLogin();
		if($this->_request->isPost()){
			$sql = $this->_request->getPost("sqlcmd");
			if($this->_model->runSQL($sql)){
				header("Location:" . WEB_ROOT . "/fileupload/runsql/?message=1");
			}else{
				header("Location:" . WEB_ROOT . "/fileupload/runsql/?message=2");
			}
			return self::AUTO_SHOWVIEW_OFF;
		}
	}

	public function createtable(){
		$this->isLogin();
		$this->_model->createtable();
		$this->setCustomerView("admin");
		$this->_opdata['message'] = "Create Table Succeed!";
	}

    public function changepassword(){
        $this->isLogin();
        if($this->_request->isPost()){
            $pass = $_POST['password'];
            $this->_model->changePassword($pass);
            Log::write("New pass:" . $pass);
            header("Location:" . WEB_ROOT . "/fileupload/admin");
            return self::AUTO_SHOWVIEW_OFF;
        }
    }
}