<?php

class apiModel extends Model{

    public function getFileList($pass){
        $this->_db->query("SELECt * FROM upload WHERE deletepassword='" . md5($pass). "'");
        $result = $this->_db->getDatas();

        return $result;
    }

    public function checkPassword($pass){
        $this->_db->query("SELECT * from upload WHERE deletepassword='". md5($pass) ."'");
        Log::write($this->_db->getNum());
        return $this->_db->getNum();
    }

    public function delete($id){
        $this->_db->query("SELECT * FROM upload WHERE id=". $id . " AND deletepassword='". md5($_SESSION['auth_pass']) ."'");
        if($this->_db->getNum()>=1){
            $data = $this->_db->getData();
            $file = substr(SYS_ROOT , 0 , -7). "/upload/" . $data['serverfilename'];
            if($this->_config['other']['system'] == 'Windows'){
                $success = unlink(iconv('utf-8' , 'big5' , $file));
            }else{
                $success = ($file);
            }
            $this->_db->delete('upload' , $data['id']);
            return true;
            return false;
        }
        return false;
    }

}