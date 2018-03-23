<?php
//open connection to mysql db
$connection = mysqli_connect("localhost","root","","apiService")
or die("Error " . mysqli_error($connection));

$table_name = "students";
$table_name2 = "fees_collections";

$ids = isset($_GET['id']) ? $_GET['id'] : die();
$paidAmount = $_POST["oldAmount"]+$_POST["paidAmount"];



//fetch table rows from mysql db
$sql = "UPDATE $table_name2 SET paidAmount = $paidAmount WHERE id = $ids";



$result = mysqli_query($connection, $sql)
or die("Error in Selecting " . mysqli_error($connection));

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




mysqli_close($connection);
?>
