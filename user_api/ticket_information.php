<?php 
require dirname(dirname(__FILE__)) . '/filemanager/evconfing.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-type: text/json');
$data = json_decode(file_get_contents('php://input'), true);
$uid = $data['uid'];
$tid = $data['ticket_id'];
if($uid == ''  or $tid == '')
{
	$returnArr = array("ResponseCode"=>"401","Result"=>"false","ResponseMsg"=>"Something Went wrong  try again !");
}
else 
{
	$datav = array();
	
	$ticket = $evmulti->query("SELECT * FROM `tbl_ticket` where id=".$tid."")->fetch_assoc();
	$eid = $ticket['eid'];
	$sponsore_id = $ticket['sponsore_id'];
	$eve = $evmulti->query("SELECT * FROM `tbl_event` where id=".$ticket['eid']."")->fetch_assoc();
	$user = $evmulti->query("SELECT * FROM `tbl_user` where id=".$ticket['uid']."")->fetch_assoc();
	$pdata = $evmulti->query("select * from tbl_payment_list where id=".$ticket['p_method_id']."")->fetch_assoc();
	$datav['ticket_id'] = $tid;
	$datav['ticket_title'] =  $eve['title'];
	
	$date=date_create($eve['sdate']);
	$datav['start_time'] = date_format($date,"l").','.date_format($date,"M d").' - '.date("g:i A", strtotime($eve['stime'])).' - '.date("g:i A", strtotime($eve['etime']));
	$datav['event_address'] = $eve['address'];
	$datav['event_address_title'] = $eve['place_name'];
	$datav['event_latitude'] = $eve['latitude'];
	$datav['event_longtitude'] = $eve['longtitude'];
	$spon = $evmulti->query("select * from tbl_sponsore where id=".$ticket['sponsore_id']."")->fetch_assoc();

	$datav['sponsore_id'] = $spon['id'];
	$datav['sponsore_img'] = $spon['img'];
	$datav['sponsore_title'] = $spon['title'];
	$datav['qrcode'] = 'https://chart.googleapis.com/chart?cht=qr&chl={%22ticket_id%22:%22'.$tid.'%22,%22uid%22:%22'.$uid.'%22,%22event_id%22:%22'.$eid.'%22,%22orgnizer_id%22:%22'.$sponsore_id.'%22}&chs=180x180&chld=L|0';
    $datav['unique_code'] = $ticket['uniq_id'];
$datav['ticket_username'] =  $user['name'];
$datav['ticket_mobile'] =  $user['ccode'].$user['mobile'];
$datav['ticket_email'] =  $user['email'];
$datav['ticket_rate'] = $ticket['is_review'];
$datav['ticket_type'] = $ticket['type'];
$datav['total_ticket'] = $ticket['total_ticket'];
$datav['ticket_subtotal'] = $ticket['subtotal'];
$datav['ticket_cou_amt'] = $ticket['cou_amt'];
$datav['ticket_wall_amt'] = $ticket['wall_amt'];
$datav['ticket_tax'] = $ticket['tax'];
$datav['ticket_total_amt'] = $ticket['total_amt'];

$datav['ticket_p_method'] = $pdata['title'];
$datav['ticket_transaction_id'] = $ticket['transaction_id'];
if($ticket['ticket_type'] == 'Cancelled')
{
	$datav['ticket_status'] = 'Cancelled';
}
else 
{
$datav['ticket_status'] = 'Paid';
}
	$returnArr = array("ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Ticket Information Get Successfully!","TicketData"=>$datav);
}
echo json_encode($returnArr);