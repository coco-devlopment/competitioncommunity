<?php
require_once('../../../../config.php');

if(isset($_REQUEST['packageid'])){
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    $packageid = $_REQUEST['packageid'];
    $userid = $_REQUEST['userid'];
    $testid = $_REQUEST['testid'];
	$amount = $_REQUEST['amount'];

	$record = new stdClass();
    $record->ipaddress = $ipaddress;
    $record->timecreated = time();
    $orderid = $DB->insert_record('order', $record, true);

    $orderno = 5000 + $orderid;

    $DB->execute("UPDATE {order} set orderno = ".$orderno." WHERE id = ".$orderid);

    $record1 = new stdClass();
    $record1->orderid = $orderid;
    $record1->testid = $testid;
    $record1->packageid = $packageid;
    $record1->amount = $amount;
    $record1->discount = 0;
    $DB->insert_record('order_details', $record1, true);
    
	$sql = "SELECT COUNT(id) AS cnt FROM {order} WHERE userid = $userid AND status = 0";
	$result=$DB->get_record_sql($sql);	
	$cnt = $result->cnt;
	echo json_encode(array("status" => "success", "data" => $cnt));
}
?>