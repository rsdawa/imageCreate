<?php
//独立图片浏览器输出
//需开启GD库(php_gd2.dll)
$img1   = imageCreateTrueColor(200, 150);
$color1 = imageColorAllocate($img1, 255, 0, 0);
//填充
imageFill($img1, 100, 70, $color1);

$color2 = imagecolorallocate($img1, rand(0, 255), rand(0, 255), rand(0, 255));
$color3 = imagecolorallocate($img1, rand(0, 255), rand(0, 255), rand(0, 255));
//画直线：
imageLine($img1, 0, 0, 100, 75, $color1); //从起点(左上角),到中心点
imageLine($img1, 100, 0, 100, 150, $color1); //从中间纵向贯穿
//画矩形
imagerectangle($img1, 50, 37, 150, 113, $color2);
//画圆弧
imagearc($img1, 100, 75, 100, 75, 0, 360, $color3);
imagearc($img1, 50, 37, 100, 75, 225, 360, $color3);

header("content-type:image/gif"); //也可以是jpeg,png
imagepng($img1);
imagedestroy($img1);
