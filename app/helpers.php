<?php

function test(){
    echo 'hello test';
}

if(!function_exists('isPermittedExtension')){
   function isPermittedExtension($ext) :bool {
        $permit = ['png','jpg','jpeg'];
        if(in_array($ext,$permit)){
            return true;
        }
        return false;
    }
}