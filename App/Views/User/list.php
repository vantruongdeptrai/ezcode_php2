<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Courses</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Thumnail</th>
                <th>Total Registers</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php foreach($courses as $cs){ extract($cs)?>
                <td><?=$name?></td>
                <td><?=$description?></td>
                <td><?=$price?></td>
                <td><?=$thumbnail?></td>
                <td><?=$total_register?></td>
                <?php }?>
            </tr>
        </tbody>
    </table>
</body>
</html>
