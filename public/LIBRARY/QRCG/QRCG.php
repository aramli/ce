<?php
// Include the QRCode generator library
use Endroid\QrCode\QrCode;

$qrCode = new QrCode();
$qrCode->setText('http://ourcodeworld.com')
    ->setSize(300)
    ->setPadding(10)
    ->setErrorCorrection('high')
    ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
    ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
    // Path to your logo with transparency
    //->setLogo("logo.png")
    // Set the size of your logo, default is 48
    //->setLogoSize(98)
    ->setImageType(QrCode::IMAGE_TYPE_PNG)
;

// Send output of the QRCode directly
header('Content-Type: '.$qrCode->getContentType());
$qrCode->render();
?>