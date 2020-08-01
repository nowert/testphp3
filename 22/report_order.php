<?php require("dbcon.php"); ?>
<?php 
$sql="select * from `order` where order_user='".$_SESSION["username"]."'";
$query=mysqli_query($dbcon,$sql);
$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
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
    
    <h3>ตะกร้าสินค้า</h3><hr>
    <table class="table">
<thead>
  <tr>
    <td width="10%">รหัสใบสั่งซื้อ</td>
    <td width="15%">วันที่</td>
    <td width="25%">สลิบ</td>
    <td width="10%">สถานะ</td>
    
  </tr>
</thead>
<tbody>

    <tr>
    <td><?php echo $data["order_id"]; ?></td>
    <td><?php echo $data["order_date"]; ?></td>
    <td><?php if ($data["order_send_pic"]==""){?>
    <a href="pay.php?orderid=<?php echo $data["order_id"]; ?>">แนบสลิบ</a>
    <?php } else {?>
    <a href="image/<?php echo $data["order_send_pic"] ?>" target="_blank">ดูสลิบ</a>
    <?php } ?>
    </td>
    <td><?php echo $data["order_detail_return"]; ?></td>
 
  </tr>

  </tbody>
  
 
</table>

    
    </div>
    <br><br>
    <?php include("footer.php"); ?>
</body>
</html>