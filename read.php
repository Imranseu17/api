
<?php

    //open connection to mysql db
require_once __DIR__ . '/Database.php';
    $database = new Database();
    $db = $database->getConnection();



    //fetch table rows from mysql db
    $sql = "select * from students";

    $result = $db->prepare($sql);
    $result->execute();

        $student_arr=array();
        $student_arr["data"]=array();

    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {

         extract($row);

        $student_info=array(
            "id" => $id,
            "name" => $name,
            "address" => html_entity_decode($address),
            "paymentInfo" => "http://localhost/api/readone.php?id=".$id,

        );

        array_push($student_arr["data"], $student_info);
    }
    //print_r($emparray);
     echo json_encode($student_arr);

           



?>
