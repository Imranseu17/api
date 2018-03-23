


<?php
    //open connection to mysql db
    $connection = mysqli_connect("localhost","root","","apiService")
    or die("Error " . mysqli_error($connection));



    //fetch table rows from mysql db
    $sql = "select * from students";

    $result = mysqli_query($connection, $sql)
    or die("Error in Selecting " . mysqli_error($connection));

        $student_arr=array();
        $student_arr["data"]=array();

    while($row =mysqli_fetch_assoc($result))
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

           


//close the db connection
mysqli_close($connection);
?>
