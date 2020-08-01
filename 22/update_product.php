<?php require("dbcon.php"); ?>
<?php 

if($_POST["button"]=="บันทึกการแก้ไข"){
	$sql3="update order_temp set order_pro_unit='".$_POST["prounit"]."' where order_temp_id='".$_SESSION["orderid"]."' and order_pro_id='".$_POST["pro_hid_id"]."' ";
	$query3=mysqli_query($dbcon,$sql3);
if($query3){
	header("location: basket.php");
	}
	}

$sql="select * from order_temp where order_temp_id='".$_SESSION["orderid"]."' and order_pro_id='".$_GET["upunit"]."'";
$query=mysqli_query($dbcon,$sql);
$data=mysqli_fetch_array($query,MYSQLI_ASSOC);

$sql2="select * from product where pro_id='".$_GET["upunit"]."'";
$query2=mysqli_query($dbcon,$sql2);
$data2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
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
        <div class="col-sm-6"><?php echo $data2["pro_nm"]; ?></div>
    </div><br>
    
    <div class="row">
    	<div class="col-sm-4">ราคา</div>
        <div class="col-sm-6"><?php echo $data2["pro_price"]; ?></div>
    </div><br>
    
    <div class="row">
    	<div class="col-sm-4">รายละเอียด</div>
        <div class="col-sm-6"><?php echo $data2["pro_detail"]; ?></div>
    </div><br>
    <form action="update_product.php" name="form" method="post">
    <div class="row">
    	<div class="col-sm-4">จำนวน</div>
        <div class="col-sm-6">
        <input name="pro_hid_id" type="hidden" value="<?php echo 
		$data["order_pro_id"]; ?>">
        <input name="prounit" type="number" max="<?php echo $data["pro_unit"]; ?>" value="<?php echo $data["order_pro_unit"]; ?>"></div>
    </div><br>
    
    <div class="row" align="right" style="padding-right:25px;">
    	<input name="button" type="submit" value="บันทึกการแก้ไข"  class="btn btn-success">
    </div>
        
        </div>
    </div>
    </form>
    </div>
    <br><br>
    <?php include("footer.php"); ?>
</body>
</html>