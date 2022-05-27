<?php 
require_once("./post_tel.php");
if(isset($_POST['oldNo'])){
    updateNumber($_POST['oldNo'],$_POST['newNo']);
}


function updateNumber($oldno,$newno){
    global $db;
    $isDuplicate =checkDuplicate($newno);
    $isValid = telValidate($newno);
    if($isValid && !$isDuplicate){
        $query = $db->prepare("UPDATE phone_numbers SET phone_number=? WHERE phone_number=?");
        $result = $query->execute([$newno,$oldno]);
        
            echo json_encode("success");
        
    }else if(!$isValid){
        echo json_encode("error1");
    }else if(!$isDuplicate){
        echo json_encode("error2");
    }
    exit();
}



?>