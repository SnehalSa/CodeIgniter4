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
 
 
</head>
<body>
 
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 ">
           <?php 
           if(session()->getFlashdata('status'))
           {
               echo "<h5>".session()->getFlashdata('status')."</h5>";
           }  
           ?> 
            <div class="card">
            <div class="card-header">
                <h5>Products Data
                <a href="<?= base_url('product-add')?>" class="btn btn-primary float-right btn-sm  ">Add</a>
                </h5>
</div>
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
        </tr>
        </thead>
        <tbody>
           
        <?php foreach($products as $item) :?>
            <tr>
                <td><?= $item['id']?></td>
                <td><?= $item['name']?></td>
                <td><?= $item['price']?></td>
                <td>
            
                    <img src="<?="http://localhost/myci/uploads/".$item['image'];?>" heigth="100px" width="100px" alt="Image">
               </td>
                <td>
                    <a href="<?= base_url('product/edit/'.$item['id'])?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="<?= base_url('product/delete/'.$item['id'])?>" class="btn btn-danger btn-sm">Delete</a>
                </td>

        </tr>
        <?php endforeach;?>
        </tbody>
        <table>
</div>
</div>
</div>
</div>
</div>




 
</body>
</html>
