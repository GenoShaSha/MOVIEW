<?php

use libs\DBController;

require_once __DIR__.'/libs/dbController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEMO</title>
</head>
<body>
    <h1>Hello World</h1>
    <p>
        <?php 
            $dbController = new DBController();
            // $stmt = $dbController->conn->query("SELECT * FROM table_1");
            $data = $dbController->SelectQuery("SELECT * FROM users");
            echo '<pre>';
            //var_dump($data);
            // echo '</pre>';
            echo 'id='.$data[0]['iD'] . ' email=' . $data[0]['email'];
            echo 'id='.$data[1]['iD'] . ' email=' . $data[1]['email'];

            echo '</pre>';
            exit;
        ?>
    </p>
</body>
</html>