 <?php include "layouts/header.php";
    include "connection/connect.php";
    $error = [];
    $sqldoi_bong = mysqli_query($conn, "SELECT * FROM doi_bong");

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $id_doi_bong = $_POST['id_doi_bong'];

        if (empty($name)) {
            $error['name_r'] = "ten khong duoc de trong";
        };
        if (empty($price)) {
            $error['price_r'] = "gia khong duoc de trong";
        } else {
            if (!is_numeric($price)) {
                $error['price_i'] = "gia khong dung dinh dang";
            } elseif ($price < 0) {
                $error['price_i'] = "gia phai lon hon 0";
            }
        };

        if (!empty($_FILES['image']['name'])) {
            $img_type = ['image/jpg', 'image/png', 'image/jpeg'];
            $file = $_FILES['image'];
            if (!in_array($file['type'], $img_type)) {
                $error['image_i'] = "anh khong dung dinh dang";
            } else {
                $image = $file['name'];
                move_uploaded_file($file['tmp_name'], "uploads/" . $image);
            }
        } else {
            $image = "";
        }

        if (!$error) {
            $sql="INSERT INTO cau_thu (name,price,image,id_doi_bong) VALUES ('$name','$price','$image','$id_doi_bong')";
            $query=mysqli_query($conn,$sql);

            if($query){
                header('location: index.php');
                exit;
            }
        }
    };




    ?>

 <div class="container mt-5">
     <?php if ($error) { ?>
         <div class="alert alert-primary alert-dismissible fade show" role="alert">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 <span class="sr-only">Close</span>
             </button>
             <?php foreach ($error as $key => $value) { ?>
                 <strong>
                     <?= $value ?>
                 </strong>
             <?php } ?>

         </div>
     <?php } ?>

     <form action="" method="POST" enctype="multipart/form-data">
         <div class="form-group">
             <label for="">Name</label>
             <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">

         </div>
         <div class="form-group">
             <label for="">Price</label>
             <input type="text" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId">

         </div>
         <div class="form-group">
             <label for="">Image</label>
             <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">

         </div>
         <div class="form-group">
             <label for="">Doi Bong</label>
             <select class="form-control" name="id_doi_bong" id="">
                 <?php foreach ($sqldoi_bong as $key => $value) { ?>
                     <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                 <?php } ?>
             </select>
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>

     </form>
 </div>
 <?php include "layouts/footer.php" ?>