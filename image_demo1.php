<?php
//需开启GD库(php_gd2.dll)
$img1  = imageCreateTrueColor(200, 150);
$img2  = imageCreateFromJpeg('./images/082.jpg');
$file1 = 'out_images/' . date('YmdHis') . '-1.png';
$file2 = 'out_images/' . date('YmdHis') . '-2.png';

$color1 = imageColorAllocate($img1, 255, 0, 0);
$color2 = imageColorAllocate($img2, 0, 255, 0);
//填充
imageFill($img1, 100, 70, $color1);
imageFill($img2, 400, 310, $color2);
//写字
//imageString(画布,大小(1-5),x,y,文字,颜色)
imageString($img1, 3, 100, 80, 'abc中文', $color2);
imageString($img2, 3, 200, 100, 'abc中文', $color2);
//保存图片
imagePng($img1, $file1); //将画布输出（另存为）png文件
imagePng($img2, $file2); //将画布输出（另存为）png文件

imageDestroy($img1); //销毁画布资源
imagedestroy($img2);
