<?php
require_once('ripcord.php');

$HOST = '192.168.110.185';
$PORT = 8069;
$DB = 'C1_TEST1';
$USER = 'admin@admin.com';
$PASS = 'admin';
$ROOT = 'http://'.$HOST.':'.$PORT.'/xmlrpc/';
$URL = $ROOT.'common';
$MODELS = $ROOT.'object';

 $readerName = $_POST['reader_name'];
 $macAddress = $_POST['mac_address'];
 //$lineEnding = $_POST['line_ending'];
 //$fieldDelim = $_POST['field_delim'];
 //$fieldNames = $_POST['field_names'];
 $fieldValues = $_POST['field_values'];

//get ecp and tid

 $refnos = explode("," , $fieldValues);

 $common = ripcord::client($URL);

 $uid = $common->authenticate($DB, $USER, $PASS, array());

 $models = ripcord::client($MODELS);


 $id = $models->execute_kw($DB, $uid, $PASS,
 'asset_management.transaction', 'create',
 array(
	 	array(
	 		'reader_name' => trim($readerName,'"'),
	 		'mac_address' => trim($macAddress,'"'),
	 		'tid' => str_replace('"','',trim($refnos[1],'"')),
	 		'epc' => trim($refnos[0],'"')
	 	)
     )
 );


 //create logs
 $fn = "log.txt";
 $fp = fopen($fn, "a");
 $rawPostData = file_get_contents('php://input');
 fwrite($fp, date("l F d, Y, h:i A") . ", Reader name: " . $readerName . ", mac address: " . $macAddress . ", TID: " . $$refnos[1] . ", EPC: " . $$refnos[0] . "\n"); 

 fclose($fp);

 echo json_encode($id);


?>