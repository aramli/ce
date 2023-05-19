<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCODE_GENERATOR extends Controller
{
    public function GenerateQRCode($action, $eid, $uid){
		
		// INPUT PARAMETER
		$command_signal = 'StartEvent';
		$command_signal = 'AttendEvent';
		$event_id_signal = '12';
		$user_id_signal = '12';
		
		// $_GET['action'] = 'U3RhcnRFdmVudA';
		// $_GET['eid'] = 'MQ==';
		// $_GET['uid'] = 'MTM=';

		$command_signal = base64_decode($action);
		$event_id_signal = base64_decode($eid);
		$user_id_signal = base64_decode($uid);
		// END INPUT PARAMETER
		
		
		$codeContents = '12345'; 
		$codeContents = 'popup.html?action='.$command_signal.'&eid='.$event_id_signal.'&uid='.$user_id_signal;

		return view('QRCODE.index', compact('codeContents'));

	}
}
