<?php
//open connection to mysql db
require_once __DIR__ . '/Database.php';
$database = new Database();
$db = $database->getConnection();

 $table_name = "students";
 $table_name2 = "fees_collections";

$ids = isset($_GET['id']) ? $_GET['id'] : die();

//fetch table rows from mysql db
$sql = "SELECT $table_name.id, $table_name.name,$table_name.address,
                  $table_name2.feesAmount,$table_name2.paidAmount,
                  $table_name2.payment_date FROM $table_name2,
                  students where students.id = $ids and $table_name2.id = $ids";


$result = $db->prepare($sql);
$result->execute();

$student_arr=array();
$student_arr["data"]=array();

//create an array
// $emparray[] = array();
while($row = $result->fetch(PDO::FETCH_ASSOC))
{

    extract($row);

    $student_info=array(
        "student_id" => $id,
        "name" => $name,
        "address" => html_entity_decode($address),
        "feesStatus" => $feesAmount <= $paidAmount ? "paid" : "due" ,
        "feesAmount" => $feesAmount,
        "paidAmount" => $paidAmount,
        "dueAmount" => $feesAmount - $paidAmount,
        "payment_date"=>$payment_date,

    );

    array_push($student_arr["data"], $student_info);
}
//print_r($emparray);
echo json_encode($student_arr);

?>
