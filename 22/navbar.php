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

<body style="font-size:20px;">
	<div class="navbar navbar-inverse">
    	<div class="container-fluid">
        	<div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <div class="navbar-brand">
            	<span class="glyphicon glyphicon-shopping-cart" style="font-size:22px;"></span>
                <span style="font-size:22px;">MAGIC SHOP</span>
            </div>
            </div>
            
            <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
        	<li><a href="index.php">หน้าหลัก</a></li>
            <li><a href="">สินค้า</a></li>
            
            <?php if(!isset($_SESSION["status"])){?>
            
            <li><a href="">สมัครสมาชิก</a></li>
            <li><a href="login.php">เข้าสู่ระบบ</a></li>
            
            <?php } else if(isset($_SESSION["status"])){?>
            
            <li><a href="basket.php">ตะกร้าสินค้า</a></li>
            
            <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
            	<span class="glyphicon glyphicon-user">
                <ul class="dropdown-menu">
                	<li><a href="">แก้ไขโปรไฟล์</a></li>
                    <li><a href="report_order.php">รายการสั่งซื้อ</a></li>
                </ul>
            </a></li>
            
            <li><a href="logout.php">ออกจากระบบ</a></li>
            <?php } ?>
        </ul>
            </div>
            
        </div>
    </div>

</body>
</html>