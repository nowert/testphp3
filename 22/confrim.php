<?php require("dbcon.php"); ?>
<?php 
if(isset($_POST["btn_confrim"]) && $_POST["btn_confrim"]=="ยืนยันการสั่งซื้อ"){
	$sql2="insert into `order` values ('".$_SESSION["orderid"]."','".$_SESSION["username"]."','".$dtstemp."','','".$_POST["address"]."','','รอการชำระเงิน','')";
	$query2=mysqli_query($dbcon,$sql2);
	}
	
$sql3="select * from order_temp where order_temp_id='".$_SESSION["orderid"]."'";
$query3=mysqli_query($dbcon,$sql3);
$data3=mysqli_fetch_array($query3,MYSQLI_ASSOC);
do{
$sql4="SELECT * FROM product WHERE pro_id='".$data3["order_pro_id"]."'";
$query4=mysqli_query($dbcon,$sql4);
$data4=mysqli_fetch_array($query4,MYSQLI_ASSOC);

$sql5="insert into order_detail values ('".$_SESSION["orderid"]."','".$data3["order_pro_id"]."','".$data3["order_unit"]."','".$data4["pro_price"]."')";
$query5=mysqli_query($dbcon,$sql5);

}while($data3=mysqli_fetch_array($query3,MYSQLI_ASSOC));


$sql="select * from order_temp where order_temp_id='".$_SESSION["orderid"]."'";
$query=mysqli_query($dbcon,$sql);
$data=mysqli_fetch_array($query,MYSQLI_ASSOC);

$sql1="select * from member where mem_email='".$_SESSION["username"]."'";
$query1=mysqli_query($dbcon,$sql1);
$data1=mysqli_fetch_array($query1,MYSQLI_ASSOC);

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
	<div class="container" style="background-color:#fff; padding:30px;">
    
    <h3>เข้าสู๋ระบบ</h3><hr>
    <form action="confrim.php" method="post" name="formbuy" class="form-horizontal">
    
   <div class="form-group">
    <label class="control-label col-sm-4">รหัสใบสั่งซื้อ</label>
    <div class="col-sm-4">
    	<label class="form-control"><?php echo $data["order_temp_id"]; ?></label>
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label col-sm-4">ที่อยู่ในการจัดส่ง</label>
      <div class="col-sm-4">
    	<textarea name="address" cols="50" rows="5"><?php echo $data1["mem_nm"]; ?> <?php echo $data1["mem_tel"]; ?> <?php echo $data1["mem_address"]; ?></textarea>
      </div>
      </div>
      
      <div class="form-group">
   
    <div class="col-sm-offset-4 col-sm-4">
    	<input name="btn_confrim" type="submit" value="ยืนยันการสั่งซื้อ" class="btn btn-success form-control">
    </div>
    </div>
    </form>
    
    </div>
    
    <div style="position:absolute; bottom:0; display:block; width:100%;">
    <?php include("footer.php"); ?>
    </div>
</body>
</html>