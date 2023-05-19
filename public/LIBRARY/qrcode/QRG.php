					<?php
					
					include('qrlib.php'); 
					// header("Content-type: image/png");
					
					// custom code rendering with GD2 
     	
				    // WARNING!!! this is 'bad' example: 
				    // - JPEG is bad choice for QR-Codes (loosy, artifacts...) 
				    // - blue is bad choise for FG color (should make hi contrast with BG color) 


					// INPUT PARAMETER
				    $command_signal = 'StartEvent';
				    $command_signal = 'AttendEvent';
				    $event_id_signal = '12';
				    $user_id_signal = '12';

				    $command_signal = base64_decode($_GET['action']);
				    $event_id_signal = base64_decode($_GET['eid']);
				    $user_id_signal = base64_decode($_GET['uid']);
				    // END INPUT PARAMETER

				
				    $codeContents = '12345'; 
				    $codeContents = 'popup.html?action='.$command_signal.'&eid='.$event_id_signal.'&uid='.$user_id_signal;


				    $tempDir = "../../MEDIA/QR/"; 
				    $fileName = uniqid().'.jpg'; 
				    $outerFrame = 4; 
				    $pixelPerPoint = 5; 
				    $jpegQuality = 100; 
				     
				    // generating frame 
				    $frame = QRcode::text($codeContents, false, QR_ECLEVEL_M); 
				     
				    // rendering frame with GD2 (that should be function by real impl.!!!) 
				    $h = count($frame); 
				    $w = strlen($frame[0]); 
				     
				    $imgW = $w + 2*$outerFrame; 
				    $imgH = $h + 2*$outerFrame; 
				     
				    $base_image = imagecreate($imgW, $imgH); 
				     
				    $col[0] = imagecolorallocate($base_image,255,255,255); // BG, white  
				    $col[1] = imagecolorallocate($base_image,0,0,0);     // FG, blue 
				
				    imagefill($base_image, 0, 0, $col[0]); 
				
				    for($y=0; $y<$h; $y++) { 
				        for($x=0; $x<$w; $x++) { 
				            if ($frame[$y][$x] == '1') { 
				                imagesetpixel($base_image,$x+$outerFrame,$y+$outerFrame,$col[1]);  
				            } 
				        } 
				    } 
				     
				    // saving to file 
				    $target_image = imagecreate($imgW * $pixelPerPoint, $imgH * $pixelPerPoint); 
				    imagecopyresized( 
				        $target_image,  
				        $base_image,  
				        0, 0, 0, 0,  
				        $imgW * $pixelPerPoint, $imgH * $pixelPerPoint, $imgW, $imgH 
				    ); 
				    imagedestroy($base_image); 
				    imagejpeg($target_image, $tempDir.$fileName, $jpegQuality); 
				    imagedestroy($target_image); 
				
				    // displaying 
				    echo '<img src="'.$tempDir.$fileName.'" />';
    
					?>