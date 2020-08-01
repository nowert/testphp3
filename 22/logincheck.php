<?php require("dbcon.php"); ?>
<?php
$sql="select mem_email, mem_password, mem_status from member where mem_email='".$_GET["email"]."' and mem_password='".$_GET["password"]."'";
$query=mysqli_query($dbcon,$sql);
$data=mysqli_fetch_assoc($query);

$_SESSION["username"] = $data["mem_email"];
$_SESSION["status"] = $data["mem_status"];
$_SESSION["orderid"]=date("U");

if($_SESSION["status"]=="admin"){
	header("location: admin.php");
	} else if($_SESSION["status"]=="webuser"){
		header("location: index.php");
		} else {
			header("location: login.php");
			}
			
?>