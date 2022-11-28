<?php include "layouts/header.php";
include "connection/connect.php";
$sql = "SELECT ct.* , db.name AS doi_bong FROM cau_thu ct INNER JOIN doi_bong db ON ct.id_doi_bong = db.id";
$query = mysqli_query($conn, $sql);
?>
<div class="container">
    <h2 class="text-center mt-5">Cau Thu</h2>
    <a href="add.php" class="btn btn-success">+Add new cau thu</a>
    <table class="table mt-5">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Doi Bong</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $key => $value) { ?>
                <tr>
                    <td><?=$value['id']?></td>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['price'] ?></td>
                    <td style="width: 20%;">
                        
                            <img src="uploads/<?=$value['image']?>" alt="" class="card-img">
                       

                    </td>
                    <td><?= $value['doi_bong'] ?></td>
                    <td>
                        <a href="update.php?id=<?=$value['id']?> " class="btn btn-success">update</a>
                        <a href="delete.php?id=<?=$value['id']?>" class="btn btn-danger">delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
<?php include "layouts/footer.php" ?>