<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./style.css">
 
</head>
<body>
 
<div class="container mt-4">
    <div class="row justify-content-center">
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
            <div class="card-header">
                <h5>Edit  Product data 
                <a href="<?= base_url('products')?>" class="btn btn-danger float-right btn-sm  ">Back</a>
                </h5>
</div>
<div class="card-body">
<form action="<?= base_url('product/update/'.$product['id'])  ?>" method="POST" enctype="multipart/form-data">
    



<div class="row">
<div class="col-md-6">
                    <div class="form-group mb-2">
                        <label>Product  Name</label>
                        <input type="text" maxlength="8" minlength="3" name="name" value="<?= $product['name']?>" class="form-control" placeholder="Enter product Name">
</div>
</div>
<div class="col-md-6">
                    <div class="form-group mb-2">
                        <label>Description</label>
                        <input type="text" maxlength="25" minlength="3" name="description" class="form-control" required placeholder="Enter description" rows="3"><?= $product['description']?>"
</div>
</div>
<div class="col-md-6">
                    <div class="form-group mb-2">
                        <label>Price</label>
                        <input type="number" max="25000" min="10" name="price" value="<?= $product['price']?>" class="form-control" placeholder="Enter product price">
</div>
</div>
<div class="col-md-6">
                    <div class="form-group mb-2">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" >
</div>
</div>
</div class="col-md-5">
<img src="<?= base_url('/uploads/'.$product['image']) ?>" class="w-30" alt="Product Image">
</div>
<div class="col-md-6">
                  <hr>
                      
                        <button type="submit"  class="btn btn-primary px-4 float-end">Update</button>
</div>
</div>

</form>
</div>
</div>
  
</div>
</div>


</div>
</div>



 
</body>
</html>
