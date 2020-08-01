<?php require("dbcon.php"); ?>
<?php 

if(isset($_GET["proidbas"]) && $_GET["proidbas"]<>""){
	if($_SESSION["username"]<>""){
$sql="insert into order_temp values ('".$_SESSION["orderid"]."','".$_GET["proidbas"]."',1,'".$_SESSION["username"]."' )";
$query=mysqli_query($dbcon,$sql);	
$_GET["proidbas"]= NULL;	
$_GET["proidbas"]="";
unset($_GET["proidbas"]);	
		} else {
			echo "<script language=\"javascript\">alert('กรุณาเข้าสู่ระบบ')</script>";
			
			}
	}



$sql="select * from product limit 8";
$query=mysqli_query($dbcon,$sql);

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
<?php echo "ชื่อผู้ใช้ =".$_SESSION["username"]."<br>"; ?>
<?php echo "รหัสใบสั่งซื้อ =".$_SESSION["orderid"]."<br>"; ?>
<?php echo "สิทธิผู้ใช้ =".$_SESSION["status"]."<br>"; ?>

	<!--------------------------- search ----------------------->
	<div class="container">
    	<div class="panel-body center-block">
        	<div class="col-sm-5">
            	<input name="search" type="text" class="form-control input-lg" placeholder="ค้นหา">
            </div>
            
            <div class="col-sm-3">
            	<select name="select1"  class="form-control input-lg">
                <option value="0">เลือก</option>
                <option value="1"></option>
                </select>
            </div>
            
            <div class="col-sm-3">
            	<select name="select1"  class="form-control input-lg">
                <option value="0">เลือก</option>
                <option value="1"></option>
                </select>
            </div>
            
            <div class="col-sm-1">
            	<input name="button" type="submit" class="form-control input-lg btn btn-primary" value="ค้นหา">
            </div>
        </div>
    </div>
<!----------------------------------------------------------->

<!--------------------------- slide ----------------------->

	<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    	<div class="carousel-inner">
        
        <div class="item active">
        	<img src="image/chicago.jpg" width="100%">
        </div>
        
        <div class="item">
        	<img src="image/la.jpg" width="100%">
        </div>
        
        <div class="item">
        	<img src="image/ny.jpg" width="100%">
        </div>
        </div>
        
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        	<span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
        	<span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    </div>
<!--------------------------- ------------------------------>
<br><br>

<!---------------------------แนะนำสินค้า ------------------------------>
	<div class="container" style="background-color:#fff;">
    
    <h3>สินค้าแนะนำ</h3><hr>
    
    <?php if($query){
		while($data=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		?>
    	<div class="col-sm-3">
        	<div class="thumbnail" style="padding:10px;">
            <img src="image/product/img01.png" width="100%">
            
            <div class="row">
            <div class="col-sm-12"><?php echo $data["pro_nm"]; ?></div>
            </div>
            
            <div class="row">
            <div class="col-sm-2">ราคา</div>
            <div class="col-sm-6"><?php echo $data["pro_price"]; ?></div>
            </div>
            
            <center>
            <a class="btn btn-danger" href="index.php?proidbas=<?php echo $data["pro_id"]; ?>">เพิ่มไปยังตะกร้า</a>
            <a class="btn btn-primary" href="product.php?proidtail=<?php echo $data["pro_id"]; ?>">รายละเอียด</a>
            </center>
            
            </div>
        </div>
    <?php }}?>
    </div>
 <!--------------------------- ------------------------------> 
 <br><br>
 <!---------------------------หมวดหมู่ --------------------------->
	<div class="container" style="background-color:#fff;">
    
    <h3><a id="type"></a>หมวดหมู่สินค้า : <a href="index.php#type" class="btn btn-primary">All</a> 
    <?php 
	$sql="select * from product_type";
	$query=mysqli_query($dbcon,$sql);
	
	if($query){
		while($data=mysqli_fetch_array($query,MYSQLI_ASSOC)){
			
	$type=$data["protype_id"];
		
	?>
    
    <a href="index.php?protypeid=<?php echo $type; ?>#type" class="btn btn-primary"><?php echo $data["protype_name"]; ?></a>
    
    <?php }} ?>
    
    </h3><hr>
    
    
    <?php 
	if($_GET["protypeid"]<>""){
		$sql1="select * from product where pro_type='".$_GET["protypeid"]."'";
		}else {
			$sql1="select * from product";
			}
	
	$query=mysqli_query($dbcon,$sql1);
	
	if($query){
		while($data=mysqli_fetch_array($query,MYSQLI_ASSOC)){
	?>
   
    	<div class="col-sm-3">
        	<div class="thumbnail" style="padding:10px;">
            <img src="image/product/img01.png" width="100%">
            
            <div class="row">
            <div class="col-sm-12"><?php echo $data["pro_nm"]; ?></div>
            </div>
            
            <div class="row">
            <div class="col-sm-2">ราคา</div>
            <div class="col-sm-6"><?php echo $data["pro_price"]; ?></div>
            </div>
            
            <center>
             <a class="btn btn-danger" href="index.php?proidbas=<?php echo $data["pro_id"]; ?>">เพิ่มไปยังตะกร้า</a>
             <a class="btn btn-primary" href="product.php?proidtail=<?php echo $data["pro_id"]; ?>">รายละเอียด</a>
            </center>
            
            </div>
        </div>
 <?php }}?>
    </div>
 <!--------------------------- ------------------------------>   
    
    <br><br>
    <?php include("footer.php"); ?>
</body>
</html>