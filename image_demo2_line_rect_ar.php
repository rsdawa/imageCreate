<?php
$img1   = imagecreatetruecolor(200, 150); //图像资源
$color1 = imagecolorallocate($img1, rand(0, 255), rand(0, 255), rand(0, 255));
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
//保存为图片:
$file1 = 'out_images/line-rect-arc-' . date('YmdHis') . '-1.jpg';
imageJpeg($img1, $file1); //将画布输出（另存为）jpg文件

imagedestroy($img1); //销毁图像
