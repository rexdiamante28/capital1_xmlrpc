<?php
	require_once('ripcord.php');

	$HOST = '192.168.110.185';
	$PORT = 8069;
	$DB = 'c1_test1';
	$USER = 'admin@admin.com';
	$PASS = 'admin';
	$ROOT = 'http://$HOST:$PORT/xmlrpc/';


	$url = "http://192.168.110.185:8069/xmlrpc/common";
	$db = "C1_TEST1";
	$username = "admin@admin.com";
	$password = "admin";

	//$info = ripcord::client($url)->login();
	//list($url, $db, $username, $password) = array($info['host'], $info['database'], $info['user'], $info['password']);

	//echo json_encode($info);


	$common = ripcord::client($url);
	//echo json_encode($common->version());

	$uid = $common->authenticate($db, $username, $password, array());

	echo json_encode($uid);


	$models = ripcord::client("http://192.168.110.185:8069/xmlrpc/object");

	//$result = $models->execute_kw($db, $uid, $password,
    //'res.partner', 'check_access_rights',
    //array('read'), array('raise_exception' => false));

    //echo json_encode($result);



	//$models = ripcord::client("http://localhost:8069/xmlrpc/object");
	//$result = $models->execute_kw($db, $uid, $password,
    //'openacademy.session', 'create',
    //array('name'=>'Session yeah', 'course_id'=>'2'), array('raise_exception' => false));

    //echo json_encode($result);


    //$result = $models->execute_kw($db, $uid, $password,
    //'res.partner', 'search', array(
    //    array(array('is_company', '=', false),
    //          array('customer', '=', false))));

    //echo json_encode($result);

    //$result = $models->execute_kw($db, $uid, $password,
	//    'res.partner', 'fields_get',
	//    array(), array('attributes' => array('string', 'help', 'type')));
	//echo json_encode($result);

	//$result = $models->execute_kw($db, $uid, $password,
    //'res.partner', 'search_read',
    //array(array(array('is_company', '=', false),
    //            array('customer', '=', false))),
    //array('fields'=>array('name', 'country_id', 'comment'), 'limit'=>5));

    //echo json_encode($result);


    //$id = $models->execute_kw($db, $uid, $password,
    //'asset_management.category', 'create',
    //array(array('name'=>"New category")));

    //echo $id;


    //$result = $models->execute_kw($db, $uid, $password,
    //'asset_management.category', 'search_read',
    //array(array()),
    //array('fields'=>array('name'), 'limit'=>0));

    //echo json_encode($result);

?>