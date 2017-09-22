<?php
//图片缩放演示

//载入原始图，得到画布1
$imgPath = './images/103.jpg';
$img1    = imagecreatefromjpeg($imgPath);
$width1  = imagesx($img1);
$height1 = imagesy($img1);
//取图片属性
$arr       = getimagesize($imgPath);
$type_code = $arr[2]; //属性值1-gif,2-jpeg,3-png
$arr_type  = ['GIF', 'JPEG', 'PNG'];
$type      = $arr_type[$type_code];

//创建一个新画布
$width2  = $width1 / 2;
$height2 = $height1 / 2;
$img2    = imagecreateTrueColor($width2, $height2);

//缩放操作
/*
imagecopyresampled(
dst_image,  //目标图画布
src_image, //原图画布
dst_x, //目标位置x
dst_y, //目标位置y
src_x, //原图位置x
src_y, //原图位置y
dst_w, //目标区域宽度
dst_h, //目标区域高度
src_w, //原图采样区域宽度
src_h  //原图采样区域高度
)
 */
imagecopyresampled(
    $img2, //目标图画布
    $img1, //原图画布
    0, //目标位置x
    0, //目标位置y
    0, //原图位置x
    0, //原图位置y
    $width2, //目标区域宽度
    $height2, //目标区域高度
    $width1, //原图采样区域宽度
    $height1 //原图采样区域高度
);

//保存缩略图

$file2 = getSmallImg($imgPath);
if ($type == 'GIF') {
    // $pos1  = strrpos($img_file, '.'); //获得文件名最后一个点的位置
    // $qian  = substr($img_file, 0, $pos1); //取得该文件名最后一个点前面的所有字符
    // $hou   = strRchr($img_file, '.'); //返回后缀（包括点.）
    // $file2 = $qian . "_small" . $hou;
    // $file2 = str_replace("/images/", "/small_images/", $file2);

    imagegif($img2, $file2);
}
if ($type == 'JPEG') {
    imagejpeg($img2, $file2);
}
if ($type == 'PNG') {
    imagejpeg($img2, $file2);
}

//路径形式：small_images/xxx_small.gif
function getSmallImg($img_file)
{
    $pos1  = strrpos($img_file, '.'); //获得文件名最后一个点的位置
    $qian  = substr($img_file, 0, $pos1); //取得该文件名最后一个点前面的所有字符
    $hou   = strRchr($img_file, '.'); //返回后缀（包括点.）
    $file2 = $qian . "_small" . $hou;
    $file2 = str_replace("/images/", "/small_images/", $file2);
    return $file2;
}

header("content-type:image/jpg");
//imagejpeg($img1);
imagejpeg($img2);
imagedestroy($img1);
