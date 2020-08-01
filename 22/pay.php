<?php require("dbcon.php"); ?>
<?php 

if($_POST["confrimslip"]=="ยืนยัน"){
	echo $_POST["hid_orderid"]."<br>";
	echo $_POST["bankselect"];
	$sql2="UPDATE `order` SET order_bank_id = '".$_POST["bankselect"]."', order_send_pic = 'ny.jpg', order_detail_return = 'รอรอการตรวจสอบ' WHERE order.order_id= '".$_POST["hid_orderid"]."'";
$query2=mysqli_query($dbcon,$sql2);
	}
$sql="select * from order_detail where order_id='".$_GET["orderid"]."'";
$query=mysqli_query($dbcon,$sql);
$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
do {
$totalprice=$totalprice+($data["order_pro_price"]*$data["order_unit"]);

}while($data=mysqli_fetch_array($query,MYSQLI_ASSOC));
		if($totalprice>=5000) {
				      $lod=$totalprice*(3/100);
						  $lodshow="5%";
			        } else if($totalprice>=3000){
					  $lod=$totalprice*(2/100);
	 					  $lodshow="3%";
						} else if($totalprice>=2000){
					  $lod=$totalprice*(1/100);
  					  $lodshow="2%";
						} else {
							$lod=0;
							}

$vat=($totalprice-$lod)*(7/107); 


?>
<?php $carry =($totalprice-$lod)+$vat; ?>
        <?php 
		if($carry>=1 and $carry<=499 ) {
				      $totalcarry=80; 
					  
			        } else if($carry>=500 and $carry<=1000){
					  $totalcarry=120;
					  
	 				} else if($carry>=1001 and $carry<=5000){
					  $totalcarry=150;
					  
  					} else if($carry>=5001 and $carry<=10000){
					  $totalcarry=200;
					  
  					} else if($carry>=10001 and $carry<=20000){
					  $totalcarry=300;
  					 
						} else {
							$totalcarry=0;
							}
		
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
    
    <h3>ยืนยันการชำระเงิน</h3><hr>
    <form action="pay.php" method="get" name="form" class="form-horizontal">
    
    <div class="form-group">
    <label class="control-label col-sm-4">รหัสใบสั่งซื้อ</label>
    <div class="col-sm-4">
    	<label class="form-control"><?php echo $_GET["orderid"]; ?></label>
    </div>
    </div>
    
     <div class="form-group">
    <label class="control-label col-sm-4">จำนวนเงินที่ต้องชำระ</label>
    <div class="col-sm-4">
    	<label class="form-control"><?php echo number_format(($totalprice-$lod)+($vat+$totalcarry),2); ?></label>
    </div>
    </div>
    
     <div class="form-group">
    <label class="control-label col-sm-4">แนบไฟล์สลิบ</label>
    <div class="col-sm-4">
    	<input name="slip" type="file">
    </div>
    </div>
    
     <div class="form-group">
     <?php 
	 $sql1="select * from bank";
	$query1=mysqli_query($dbcon,$sql1);
	$data1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
	 ?>
    <label class="control-label col-sm-4">โอนผ่านบัญชี</label>
    <div class="col-sm-4">
    	<select name="select" class="form-control">
        <option value="0" selected>เลือกบัญชีธนาคาร</option>
        <?php while($data1=mysqli_fetch_array($query1,MYSQLI_ASSOC)){?>
        <option value="<?php echo $data1["bank_id"]; ?>"><?php echo $data1["bank_name"]; ?></option>
        <?php }?>
        </select>
    </div>
    </div>
    
    <div class="col-sm-offset-4 col-sm-4">
    <input type="hidden" name="hid_orderid" value="<?php echo $_GET["orderid"]; ?>">
    <input name="button" type="submit" class="form-control btn btn-success" value="ยืนยัน"><br>
    </div>
    </form>
    
    </div>
    
    <div style="position:absolute; bottom:0; display:block; width:100%;">
    <?php include("footer.php"); ?>
    </div>
</body>
</html>