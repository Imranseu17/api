<?php
//open connection to mysql db
require_once __DIR__ . '/Database.php';
$database = new Database();
$db = $database->getConnection();

$table_name = "students";
$table_name2 = "fees_collections";

$ids = isset($_GET['id']) ? $_GET['id'] : die();
$paidAmount = $_POST["oldAmount"]+$_POST["paidAmount"];



//fetch table rows from mysql db
$sql = "UPDATE $table_name2 SET paidAmount = $paidAmount WHERE id = $ids";



$result = $db->prepare($sql);
$result->execute();

if($result){
    echo '{';
    echo '"message": "Payment updated."';
    echo '}';
}

// if unable to update the student, tell the user
else{
    echo '{';
    echo '"message": "Unable to update payment."';
    echo '}';
}

?>
