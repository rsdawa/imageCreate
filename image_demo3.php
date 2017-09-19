<?php
//载入图片,构成画布
$imgFile = './images/082.jpg';
$img1    = imageCreateFromJpeg($imgFile);
$x       = imagesx($img1);
$y       = imagesy($img1);
echo "<br>image width:{$x}px;image height:{$y}px";

$arr = getimagesize($imgFile);
echo "<pre>";
print_r($arr);

$arr = getimagesize('http://www.baidu.com/img/bd_logo1.png');
echo "<pre>";
print_r($arr);
