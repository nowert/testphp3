<?php require("dbcon.php"); ?>
<?php 
$sql="select * from product where pro_id='".$_GET["proidtail"]."'";
$query=mysqli_query($dbcon,$sql);
$data=mysqli_fetch_assoc($query);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<title>Untitled Document</title>
</head>

<body style="font-size:18px; background-color:#ededed;">
<?php include("navbar.php"); ?>
	<div class="container" style="background-color:#fff;">
    
    <h3>สินค้า</h3><hr>
    
    <div class="row" style="padding:25px;" >
    	<div class="col-sm-6"><img src="image/product/img01.png" width="100%"></div>
        
        <div class="col-sm-6">
        
    <br><div class="row">
    	<div class="col-sm-4">ชื่อสินค้า</div>
        <div class="col-sm-6"><?php echo $data["pro_nm"]; ?></div>
    </div><br>
    
    <div class="row">
    	<div class="col-sm-4">ราคา</div>
        <div class="col-sm-6"><?php echo $data["pro_price"]; ?></div>
    </div><br>
    
    <div class="row">
    	<div class="col-sm-4">รายละเอียด</div>
        <div class="col-sm-6"><?php echo $data["pro_detail"]; ?></div>
    </div><br>
    <form action="basket.php" method="get">
    <div class="row">
    	<div class="col-sm-4">จำนวน</div>
        <div class="col-sm-6"><input name="prounit" type="number" mix="<?php echo $data["pro_unit"]; ?>"></div>
    </div><br>
    </form>
    <div class="row" align="right" style="padding-right:25px;">
    	<a class="btn btn-danger" href="">เพิ่มไปยังตะกร้า</a>
    </div>
        
        </div>
    </div>
    
    </div>
    <br><br>
    <?php include("footer.php"); ?>
</body>
</html>