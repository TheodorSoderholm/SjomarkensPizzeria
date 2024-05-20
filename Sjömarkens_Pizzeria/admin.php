<?php include('db.php'); ?>
<?php include('functions.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Sjömarkens Pizzeria</title>
</head>

<body>
    <ul>
        <?php
        if (isset($_POST['submit'])) {
            $deleteData = $_POST['order-id'];
            deleteOrder($deleteData);
        }
        $orders = getOrders();
        ?>
        <?php foreach ($orders as $order) : ?>
            <li>
                <b>id: </b><?php echo $order['id'] . "," ?>
                <br />
                <b>rätter: </b><?php echo $order['dishes'] . "," ?>
                <br />
                <b>kommentar: </b><?php echo $order['comment'] . "." ?>
                <br />
                <form method="post" action="admin.php">
                    <input type="hidden" name="order-id" value="<?php echo $order['id'] ?>">
                    <button type="submit" name="submit" value="submit">Ta bort order</button>
                </form>
            </li>
        <?php endforeach ?>
    </ul>
</body>

</html>