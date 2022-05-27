<?php 
require_once("./db.php");

if(isset($_POST['page'])){
    echo json_encode(getAllNumbersPaged($_POST['page']));
}
if(isset($_POST['count'])){
    echo json_encode(getCountofNumbers($_POST['count']));
}
if(isset($_POST['delete'])){
    deleteNumber($_POST['delete']);
    echo json_encode("post");
}

function getAllNumbersPaged($start){
    global $db;
    $numbers = [];
    $query = $db->prepare("SELECT * FROM phone_numbers ORDER BY id DESC LIMIT $start,5");
    $query->execute();
    $numbers = $query->fetchAll();
    return $numbers;
}
function getCountofNumbers(){
    global $db;
    $numbers = [];
    $query = $db->prepare("SELECT count(id) FROM phone_numbers ");
    $query->execute();
    $numbers = $query->fetchAll();
    return $numbers;
}
function deleteNumber($no){
    global $db;
    $query =  $db->prepare("DELETE FROM phone_numbers WHERE id = ?");
    $result = $query->execute([$no]);
    if($result){
        echo json_encode("Silme Başarılı");
    }else{
        echo json_encode("Silinemedi");
    }
    exit();
}
?>