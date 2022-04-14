<?php

class hilltopLove{
    public $mysqli;

    function connectdb(){
        $mysqli=mysqli_connect('localhost','root', '500@yolanda' ,'hilltoplove');
        return $mysqli;

    }

}





?>
