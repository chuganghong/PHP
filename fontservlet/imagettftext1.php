<?php
$font ="c:/windows/fonts/msyhbd.ttf";
$image = imagecreate(1024,768);
$font_size = 80;
$black = imagecolorallocate($image, 0, 0, 0);
$yellow = imagecolorallocate($image, 255, 255, 0);
$text = 'STRSTR substr';
$start_x = 30;
$start_y = 70;
$max_width = 800;

write_multiline_text($image, $font_size, $yellow, $font, $text, $start_x, $start_y, $max_width);

ob_clean();
Header('Content-Type:image/png');
imagepng($image);

 
function write_multiline_text($image, $font_size, $color, $font, $text, $start_x, $start_y, $max_width) 
{ 
        //split the string 
        //build new string word for word 
        //check everytime you add a word if string still fits 
        //otherwise, remove last word, post current string and start fresh on a new line 
        $words = explode(" ", $text); 
        $string = ""; 
        $tmp_string = ""; 
        
        for($i = 0; $i < count($words); $i++) 
        { 
            $tmp_string .= $words[$i]." "; 
            
            //check size of string 
            $dim = imagettfbbox($font_size, 0, $font, $tmp_string); 
            
            if($dim[4] < $max_width) 
            { 
                $string = $tmp_string; 
            } 
			else
			{ 
               $i--; 
               $tmp_string = ""; 
               imagettftext($image, 11, 0, $start_x, $start_y, $color, $font, $string); 
                
               $string = ""; 
               $start_y += 40; //change this to adjust line-height. Additionally you could use the information from the "dim" array to automatically figure out how much you have to "move down" 
            } 
        } 
                                
		imagettftext($image, 11, 0, $start_x, $start_y, $color, $font, $string); //"draws" the rest of the string 
}
?> 