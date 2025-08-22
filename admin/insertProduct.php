<?php
//code here
require_once "dbconnect.php";
try {
    $sql = "select * from category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(); //multiple role returned
} catch (PDOException $e) {
    echo $e->getMessage();
}
//when insert btn clicked
if(isset($_POST["insertBtn"])) {
    $productName = $_POST['pname'];
    $category = $_POST['category'];
    $desc = $_POST['description'];
    $sellPrice = $_POST['sprice'];
    $buyPrice = $_POST['bprice'];
    $qty = $_POST['quantity'];
    $productImage = $_FILES['pimg'];
    $filePath = "productImages/".$productImage['name'];
    // echo $productImage['name']."<br>";
    // echo $productImage['type']."<br>";
    // echo $productImage['size']."<br>";
    // echo $productImage['tmp_name']."<br>";

    //move temp file into specified dierctory
    try{
    if(move_uploaded_file($productImage['tmp_name'],$filePath))
    {
        $sql = 'insert into product 
        (product_name,cost,price,description,image_path,category,quantity)
        value(?, ?, ?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $flag = $stmt->execute([$productName, $buyPrice, $sellPrice, $desc, $filePath, $category, $qty]);
        echo "<script>alert('upload success MF');</script>";
        if($flag)
        {
            header('Location: viewInfo.php');
            exit();
        }
    }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require_once "navigation.php"; ?>
        </div>
        <div class="row">
            <div class="col-md-6 py-5 mx-auto">
                <form action="insertProduct.php" class="form card" method="post" enctype="multipart/form-data">
                    <div class="row mx-auto">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="pname" class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="pname" id="pname" required>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label"></label>
                                <select name="category" id="" class="form-select">
                                    <option value="">Choose Category</option>
                                    <?php
                                    if(isset($categories)){
                                        foreach($categories as $category){
                                            echo "<option value=$category[id]>$category[cat_name]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="desc" class="form-label">Description</label>
                                <textarea name="description" id="desc" class="form-control">

                                </textarea>
                            </div>
                            <div class="mb-2">
                                <label for="bprice" class="form-label">Buy Price</label>
                                <input type="number" class="form-control" name="bprice" id="bprice">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label for="sprice" class="form-label">Sell Price</label>
                                <input type="number" class="form-control" name="sprice" id="sprice">
                            </div>
                            <div class="mb-2">
                                <label for="qty" class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="quantity" id="qty">
                            </div>
                            <div class="mb-2">
                                <label for="pimg" class="form-control">Product Image</label>
                                <input type="file" class="form-control" name="pimg" id="pimg">
                            </div>
                            <div class="mb-2">
                                <button class="btn btn-primary" type="submit" name="insertBtn">Insert Product</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>