<?php

class getfileController extends Controller{
    public function download(){
        $filename = urldecode($this->_parameter[0]);
        if(empty($filename)){
            header("HTTP/1.1 404 Not Found");
            echo substr(SYS_ROOT,0,-7) . '\\upload\\' . $filename;
        }else{
            if($this->_config['other']['system'] == 'Windows'){
                if(!file_exists( iconv('utf-8' , 'big5' , substr(SYS_ROOT,0,-7) . '\\upload\\' . $filename))){
                    header("HTTP/1.1 404 Not Found");
                    echo substr(SYS_ROOT,0,-7) . '\\upload\\' . $filename;
                }else{
                    header("HTTP/1.1 200 OK");
                    header("Content-Type:application");
                    header("Content-Disposition: attachment; filename=" . $filename);
                    @readfile(WEB_ROOT . '/upload/' . $filename);
                    exit(0);
                }
            }else if(!file_exists( substr(SYS_ROOT,0,-7) . '\\upload\\' . $filename)){
                header("HTTP/1.1 404 Not Found");
                echo substr(SYS_ROOT,0,-7) . '\\upload\\' . $filename;
            }else{
                header("HTTP/1.1 200 OK");
                header("Content-Type:application");
                header("Content-Disposition: attachment; filename=" . $filename);
                @readfile(WEB_ROOT . '/upload/' . $filename);
                exit(0);
            }
        }
        return self::AUTO_SHOWVIEW_OFF;
    }
}