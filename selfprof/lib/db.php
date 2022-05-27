<?php 
try{
    $db = new PDO("mysql:host=localhost;dbname=phone_db","root","123456789");
}catch(PDOException $e){
    print $e->getMessage(); 
}



?>