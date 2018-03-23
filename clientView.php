<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$ids = isset($_GET['id']) ? $_GET['id'] : die();
$json_string = file_get_contents("http://localhost/api/readone.php?id=".$ids);
$value = json_decode($json_string);

?>

<div class="container">

    <?php foreach ($value->data as $idx => $data): ?>
        <h1>Information about <b><?php echo $data->name ?></b>  </h1>

        <h2>Student ID:<b> <?php echo $data->student_id ?></h2>
        <h3>Address:<b> <?php echo $data->address ?></h3>
        <h3>Payment status:<b> <?php echo $data->feesStatus ?></h3>
        <h3>Total amount:<b> <?php echo $data->feesAmount ?></h3>
        <h3>Paid amount:<b> <?php echo $data->paidAmount ?></h3>
        <h3>Due amount:<b> <?php echo $data->dueAmount ?></h3>
        <h3>Payment Date :<b> <?php echo $data->payment_date?></h3>
        <td>
            <a class="btn btn-danger" href="http://localhost/api/client.php">Back</a>
            <a class="btn btn-success" href="http://localhost/api/clientPayment.php?id=<?php echo $data->student_id ?>" class="btn btn-info">Update Payment</a>
        </td>

    <?php endforeach; ?>

</div>


</body>
</html>