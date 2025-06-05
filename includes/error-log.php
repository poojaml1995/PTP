<?php
function InsertErrorLog($Page, $Exception){
    $sql="INSERT INTO error_log (page_name,error_message) VALUES ('$Page','$e->getMessage()')";
    // echo $sql;
}

?>