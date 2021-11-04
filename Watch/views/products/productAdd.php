<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Catholic Uniforms Websites</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->


<body>
    <div>
        <?php
        require_once 'views/header.php';
        ?>
    </div>
    <form action="index.php?controller=productController&action=store" method="POST" enctype="multipart/form-data" class="form">
            <div class="form-group row">
                <label for="id"  class="col-sm-2 col-form-label">ID </label>
                <input type="text" class="form-control" id="id" name="id">
             <p><font color = 'red'> <?php  if (isset($err['id'])) echo $err['id']; ?></font></p>
            </div>
            <div class="form-group row">
                <label for="name"  class="col-sm-2 col-form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
                <p><font color = 'red'> <?php  if (isset($err['name'])) echo $err['name']; ?></font></p>
            </div>
            <div class="form-group row" >
                <label for="image"  class="col-sm-2 col-form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <p><font color = 'red'> <?php  if (isset($err['image'])) echo $err['image']; ?></font></p>
            </div>
            <div class="form-group row">
                <label for="price"  class="col-sm-2 col-form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price">
                <p><font color = 'red'> <?php  if (isset($err['price'])) echo $err['price']; ?></font></p>
            </div>
            <button type = "submit" name="add" class="btn btn-primary" >Add Product</button>
    </form>

</body>

</html>
<style>
    .form
{
    display: table-cell;
    text-align: justify-all;
    vertical-align: middle;
    position: absolute;
    left: 38%;
    top: 10%;
}
</style>