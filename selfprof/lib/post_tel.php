<?php 
require_once("./db.php");

if(isset($_POST['tel_no'])){
    $base_telno = $_POST['tel_no'];
    $isValid = telValidate($base_telno);
    if($isValid && !empty($_POST['name'])){
        insertTel($base_telno,$_POST['name']);
    }else if($isValid && empty($_POST['name'])){
        echo json_encode("error2");
    }else{
        echo json_encode("error3");
    }
}

function telValidate($tel){
    preg_match('/^[+]*90{1}\s(5|2|3|4){1}[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}/', $tel, $output_array);
    if(!empty($output_array[0])){
        return true;
    }else{
        return false;
    }
}

function insertTel($no,$name){
    global $db;
    $isDuplicate =checkDuplicate($no);
    if(!$isDuplicate){
        $query = $db->prepare("INSERT INTO phone_numbers (phone_number,isim) VALUES(?,?)");
        $query->execute(array($no,$name));
        echo json_encode("success");
    }else{
        echo json_encode("error1");
    }
    exit();
}

function checkDuplicate($no){
    global $db;
    $query = $db->prepare("SELECT phone_number FROM phone_numbers WHERE phone_number=?");
    $query->execute(array($no));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if(!$result){
        return false;
    }else{
        return true;
    }
}


?>