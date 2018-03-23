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
$json_string = file_get_contents("http://localhost/api/read.php");
$value =  json_decode($json_string);
?>

    <div class="container">
        <h2>List of student</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($value->data as $idx => $data): ?>
            <tr>
                <td><?php echo $data->id ?></td>
                <td><?php echo $data->name ?></td>
                <td><?php echo $data->address ?></td>
                <td>
                    <a href="http://localhost/api/clientView.php?id=<?php echo $data->id ?>" class="btn btn-info">showPayment</a>
                </td>
            </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>


</body>
</html>