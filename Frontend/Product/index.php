<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
            <th>created at</th>
            <th>updated at</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) {
            ?>
            <tr>
                <td><?php echo $product->id()->value() ?></td>
                <td><?php echo $product->name()->value() ?></td>
                <td><?php echo $product->price()->value() ?></td>
                <td><?php echo $product->createdAt()->value() ?></td>
                <td><?php echo $product->updatedAt()->value() ?></td>
            </tr>
            <?php
        } ?>
    </tbody>
</table>
<a href="/test-ddd/Backend/Product/UserInterface/Controller/CreateController.php">Nuevo</a>
</body>
</html>