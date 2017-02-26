<?php   
      
    header("Content-Type:image/png");  
      
    //开启session  
    session_start();  
      
    //随机4个数字  
    $code = "";  
    $arr = array();  
    for($i=0;$i<4;$i++){  
          
        $arr[$i] = rand(0,9);  
        $code .= (string)$arr[$i];  
    }  
      
    //设置入session中，方便比对  
    $_SESSION["validcode"] = $code;  
      
    //开始绘图  
    $width = 100;  
    $height = 25;  
    $img = imagecreatetruecolor($width,$height);  
      
    //填充背景色  
    $backcolor = imagecolorallocate($img,0,0,0);  
    imagefill($img,0,0,$backcolor);  
      
    //获取随机较深颜色   
    for($i=0;$i<4;$i++){  
          
        $textcolor = imagecolorallocate($img,rand(50,180),rand(50,180),rand(50,180));   
        imagechar($img,12,7+$i*25,3,(string)$arr[$i],$textcolor);  
    }  
      
    //显示图片  
    imagepng($img);  
      
    //销毁图片  
    imagedestroy($img);  
?>  