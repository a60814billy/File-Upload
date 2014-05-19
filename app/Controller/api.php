<?php

class apiController extends Controller{

    public function __construct(){
        ini_set("display_errors" , "Off");
    }

    public function file(){
        $header = "HTTP/1.1 200 OK";

        /**
         * Status Code
         * 200 OK
         * 400 Bad Request
         * 404 Not Found
         * 201 CREATED
         * 404 Not Found
         * 204 No Content
         */
        if($this->_request->isPost()){
            //POST
            if(!empty($this->_parameter[0])){
                // Update data
            }else{
                // New data
            }

        }else if($this->_request->isDelete()){
            $id = $this->_parameter[0];
            if(!empty($id)){
                $header = "HTTP/1.1 202 Accepted";
                $success = $this->_model->delete($id);
                if(!$success){
                    $header = "HTTP/1.1 406 Not Acceptable";
                }
            }else{
                $header = "HTTP/1.1 404 Not Found";
            }
        }else{
            //GET
            if(!empty($this->_parameter[0])){
                //GET one resource
            }else{
                if(empty($_SESSION['auth'])){
                    $header = "HTTP/1.1 401 Unauthorized";
                }
                if($_SESSION['auth'] == 'true'){
                    $pass = $_SESSION['auth_pass'];
                    if($pass == ""){
                        header("HTTP/1.1 401 Unauthorized");
                        exit;
                    }else{
                        $result = $this->_model->getFileList($pass);
                    }
                }
                //GET all resource
            }

        }
        header($header);
        print json_encode($result);
        //header("HTTP/1.1 200 OK");
        //header("HTTP/1.1 404 Not Found");
        //header("Context-Type:application/json; charset=utf-8");
        //print json_encode($this->_model->getFileList());
        return self::AUTO_SHOWVIEW_OFF;
    }

    public function auth(){
        $header = "HTTP/1.1 404 Not Found";
        $d = array();
        if($this->_request->isPost()){
            $data = json_decode(file_get_contents('php://input'));
            if(!empty($data->password)){
                $pass = $data->password;
                if($pass != ""){
                    if($this->_model->checkPassword($pass) > 0){
                        $_SESSION['auth'] = 'true';
                        $_SESSION['auth_pass'] = $pass;
                        $header = "HTTP/1.1 200 OK";
                        $d = array(
                            "auth" => true,
                            "num" => $this->_model->checkPassword($pass)
                        );
                    }
                }
            }
        }
        header($header);
        header("Content-Type:application/json; charset=utr-8");
        print json_encode($d);
        return self::AUTO_SHOWVIEW_OFF;
    }

}