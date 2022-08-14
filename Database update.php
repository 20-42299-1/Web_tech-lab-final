<?php
session_start();
$isPost=false;
$username="";
if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["uname"]!="")
		$username=$_POST["uname"];
	//echo "button clicked";
}
$password="";
if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["pass"]!="")
		$password=$_POST["pass"];
	//echo "button clicked";
}
$mobilenumber="";
if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["num"]!="")
		$password=$_POST["num"];
	//echo "button clicked";
}

$gender="";
if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["gender"]!="")
		$radio=$_POST["gender"];
	//echo "button clicked";
}
$expertise="";
if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["expertise"]!="")
		$radio=$_POST["expertise"];
	//echo "button clicked";
}
$address="";
if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["address"]!="")
		$radio=$_POST["address"];
	//echo "button clicked";
}
?>
<form action="#" method="post">
<p style="font-size:15px;font-family:'public sans' ">Username: <input type="text" value="<?php echo $_SESSION["uname"]; ?>" id="uname" name="uname">
<?php
if($isPost==true && $password=="")
 echo "<span style='color:red;'>Required</span>";
?>

<br><br>
Password: <input type="password" value="<?php echo $_SESSION["pass"]; ?>" id="pass" name="pass">
<?php
if($isPost==true && $username=="")
 echo "<span style='color:red;'>Required</span>";
?>
<br><br>
Mobile Number <input type="number" value="<?php echo $_SESSION["num"]; ?>"  id="email" name="email">
<?php
if($isPost==true && $mobilenumber=="")
 echo "<span style='color:red;'>Required</span>";
?>
<br><br>
Gender: <input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
<input type="radio" name="gender" value="Others">Others
<?php
if($isPost==true && $gender=="")
 echo "<span style='color:red;'>Select one</span>";
?>
<br><br>

Expertise:<input type="checkbox" name="expertise[]" value="Farming">Farming
<input type="checkbox" name="expertise[]" value="Fishing">Fishing
<input type="checkbox" name="expertise[]" value="CowBoy">Cow-Boy
<input type="checkbox" name="expertise[]" value="shepherd">Shepherd
<br><br>

Address: <textarea name="address" value="<?php echo $_SESSION["address"]; ?>" rowspan="3" colspan="30"></textarea>
<?php
if($isPost==true && $address=="")
 echo "<span style='color:red;'>Required</span>";
?>
<br><br>
<input type="submit" style="background-color:RGB(46,139,87); color:white"  value="Submit" name="btnClick">
</form>
<h5 style="float:right">Page 1 of 1</h5><br><br>
<?php
if($_POST["uname"]!="" && $_POST["pass"]!="" && $_POST["num"]!="" && $_POST["gender"]!="" && $_POST["address"]!="")
{

$servername="localhost";
$username="root";
$password="";
$dbname="farmer";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("Connection failed:".$conn->connect_error);
}
else
{
    // echo "Successful connection";
	$q="UPDATE work_table SET Username='".$_POST["uname"]."',Password='".$_POST["pass"]."',Mobilenumber='".$_POST["num"]."',Gender='".$_POST["gender"]."',Address='".$_POST["address"]."' WHERE Username='".$_SESSION["uname"]."'";
	$result=$conn->query($q);
	if($result)
	{
	  echo "data updated";
	}
    else
	{
		echo "data not updated";	
	}
}
$_SESSION["uname"] = $_POST["uname"];
$_SESSION["pass"] = $_POST["pass"];
$_SESSION["num"] = $_POST["num"];
$_SESSION["gender"] = $_POST["gender"];
$_SESSION["address"] = $_POST["address"];
}
?>