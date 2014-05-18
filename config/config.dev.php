<?php
    //路由設定
    $CONFIG['system']['route'] = array(
        'dufault_controller'    => 'fileupload',
        'default_action'        => 'index',
        'post_str'              => '.php',
        'rewrite'               => TRUE
    );
    //資料庫設定
    $CONFIG['system']['database'] = array(
        'sql_engine'=>  'sqlite',
        'hostname'  =>  '',
        'username'  =>  '',
        'password'  =>  '',
        'database'  =>  '.fileupload.db'
    );
    //其他設定
    $CONFIG['system']['other'] = array(
        'debug_mode'=>  TRUE,
        'system'    =>  'Windows'
    );

    $CONFIG['system']['log'] = array(
        'filepattern'   =>  'Ymd'
    );

    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT ^ E_NOTICE);
    ini_set("display_errors" , "On");
?>
