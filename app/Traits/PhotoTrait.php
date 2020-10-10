<?php
namespace App\Traits;

Trait PhotoTrait
{

 function ImgUpload($photo,$path){
    $file_ex = $photo->getClientOriginalExtension ();
        $file_name = time().'.'.$file_ex;
        $photo-> move($path,$file_name);

    return $file_name;
    }
}
