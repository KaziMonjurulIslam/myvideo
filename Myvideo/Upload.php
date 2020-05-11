<?php
$con = mysqli_connect("localhost","root","12345","lol");
if(isset($_POST['submit']))
{
	$name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];
	$key = $_POST['key'];
	$type = $_POST['type'];
	$id = $_POST['id'];
	$showid = $_POST['id']+1;

	$q = "INSERT INTO `users`(`id`, `name`, `type`, `key`) VALUES ('$id', '$name', '$type', '$key')";
	if(mysqli_query($con,$q))
	{
		echo "Submitted to Database...";
	}
	else
	{
		echo "Data Not INSERT";
	}
		move_uploaded_file($temp,"videos/".$name);
}
?>
<!DOCTYPE Html>
<html>
<head>
<title> Upload || MyVideo.Com || </title>
<link rel="shortcut icon" type="image/png" href="file/icon.png">
</head>
<body>
<form method="post" enctype="multipart/form-data">
	<input type="file" name="file" /><br>
	<input type="number" name="id" value="<?php echo $showid;?>" placeholder="Type ID"/>
	<input type="text" name="key" value="" placeholder="Search Key"/>
	<select name="type">
	<option value=""></option>
    <option value="Bollywood">Bollywood</option>
	<option value="Hollywood ">Hollywood </option>
	<option value=" Bangla "> Bangla </option>
	<option value=" Tollywood ">Tollywood</option>
	<option value="Movie"> Movie </option>
	<option value="Movie"> Animation </option>
	<option value="Gojol"> Gojol/was </option>
	</select>
	<input type="submit" name="submit" value="Upload"/>
	</form>
	</body>
	</html>
