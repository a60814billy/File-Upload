<?php

class fileuploadModel extends Model{
	public function createTable(){
		$config = <<<EOD
			CREATE TABLE IF NOT EXISTS config (
				name TEXT PRIMARY KEY NOT NULL,
				value TEXT NOT NULL
			);
EOD;
		$upload = <<<UPLOAD
			CREATE TABLE IF NOT EXISTS upload (
				id INTEGER PRIMARY KEY AUTOINCREMENT,
				groupNo Text NOT NULL,
				deletepassword TEXT NOT NULL,
				originfilename TEXT NOT NULL,
				serverfilename TEXT NOT NULL,
				uploadtime DATETIME NOT NULL
			);
UPLOAD;
		$this->_db->exec($config);
		$this->_db->exec($upload);
        $this->_db->exec("INSERT INTO config(name,value) VALUES('password' , '". sha1("123456") ."')");
	}

	public function runSQL($sql){
		return $this->_db->exec($sql);
	}

	public function uploadfile($groupNo , $password , $originfilename  , $serverfilename ){
		$data = array(
			"groupNo"			=> $groupNo,
			"originfilename"	=> $originfilename,
			"serverfilename"	=> $serverfilename,
			"deletepassword"	=> md5($password),
			"uploadtime"		=> time()
		);
		$this->_db->insert('upload' , $data);
	}

	public function lookupByDeletePassword($password){
		$sql = "SELECT * FROM upload WHERE deletepassword='". md5($password). "'";
		Log::write("Pass:". $password);
		$this->_db->query($sql);
		Log::write("Num:".$this->_db->getNum());
		return $this->_db->getDatas();
	}

	public function getAll(){
		$data = $this->_db->getAllData('upload');
		return $data;
	}

    public function changePassword($password){
        $sql = "update config set value='" . sha1($password) . "' WHERE name='password'";
        Log::write("--query: " . $sql);
        $this->_db->exec($sql);
    }

	public function checkpassword($password){
		$sql = "SELECT * FROM config WHERE name='password' and value='" . sha1($password) . "';";
		Log::write("--query: ".$sql);
		$this->_db->query($sql);
		if($this->_db->getNum() == 1){
			return 1;
		}
		return 0;
	}

	public function cleanDB(){
		$this->db->exec("delete from upload");
	}


}