<?php
    $CONFIG['system']['route'] = array(
        'dufault_controller'    => 'index',
        'default_action'        => 'index',
        'post_str'              => '.php',
        'rewrite'               => TRUE
    );
    
    $CONFIG['system']['lib'] = array(
        'request'   =>  'lib_requests'
    );

    //資料庫設定
    $CONFIG['system']['database'] = array(
        'sql_engine'=>  'sqlite',
        'hostname'  =>  '',
        'username'  =>  '',
        'password'  =>  '',
        'database'  =>  '.fileupload.db'
    );
    $CONFIG['system']['other'] = array(
        'debug_mode'=>  FALSE
    );
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set("display_errors" , "Off");
?>