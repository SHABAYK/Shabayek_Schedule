<?php

/*if(!function_exists('student')){
    function student(){
        return auth()->guard('student');
    }
}*/

/*if (!function_exists('student')){
    function student(){
        auth()->user()->

    }
}*/


if(!function_exists('active_menu')){
    function active_menu($link){
        if (preg_match('/'.$link.'/i',Request::segment(1))){
                return ['menu-open','display:block'];
        }else{
            return ['',''];
        }
    }
}



/////////// Validate Helper Functions //////////

if(!function_exists('validate_image')){
    function validate_image($ext=null){
        if ($ext === null){
            return 'image|mimes:jpg,jpeg,png,gif,bmp';
        }else{
            return 'image|mimes:'.$ext;
        }
    }
}