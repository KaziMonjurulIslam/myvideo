<?php
	$text = "Insert Search Update Delete";
	
//Search Section
	$id2 = 1;
if(isset($_POST['search']))
{
	$id = $_POST['id'];
	$query = "SELECT * FROM `users` WHERE CONCAT(`id`) LIKE '".$id."'";
	$search_result = filterTable($query);
}
else
{
	{
	$query = "SELECT * FROM `users` WHERE CONCAT(`id`) LIKE '".$id2."'";
	$search_result = filterTable($query);
	}
}


function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "12345", "lol");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

//Insert Section

 $connect = mysqli_connect("localhost", "root", "12345", "lol");

function getPosts()
{
    $posts = array();
    $posts[1] = $_POST['id'];
	$posts[2] = $_POST['name'];
	$posts[3] = $_POST['type'];
	$posts[4] = $_POST['key'];
	$posts[5] = $_POST['link'];
    return $posts;
}

if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `hello`(`id`, `name`, `type`, `key`, `link`) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted b';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert because of problem '.$ex->getMessage();
    }
}


?>

<!DOCTYPE HTML>
<html>
<head>
<title>MyVideo || Find Update and Delete ||</title>
<link rel="shortcut icon" type="image/png" href="file/icon.png">
<style>
input.id{text-align:center; font-size:100px; width:200px;color:red;}
input.name{text-align:center; font-size:20px; width:95%; height:100px;color:green;}
input.link{text-align:center; font-size:20px; width:95%; height:100px;color:;}
input.type{text-align:center; font-size:30px; width:300px;color:gold;}
input.key{text-align:center; font-size:25px; width:1200px;color:blue;}


</style>
</head>
<body>
<center>
<h2><?php echo $text ;?> </h2>
<form action="custom" method="POST">
<?php
	while($row = mysqli_fetch_array($search_result)):
	?>
<input type="text" class="id" name="id" value="<?php echo $row['id']; ?>" placeholder="ID"><br><br>
<input type="text" class="link" name="link" value="<?php echo $row['name']; ?>" placeholder="link"><br><br>
<input type="text" class="name" name="name" value="<?php echo $row['name']; ?>" placeholder="Name"><br><br>
<input type="text" class="type" name="type" value="<?php echo $row['type']; ?>" placeholder="type"><br><br>
<input type="text" class="key" name="key" value="<?php echo $row['key']; ?>" placeholder="key"><br><br>
	
<input type="submit" class="search" name="search" value="Search">
<input type="submit" class="insert" name="insert" value="Insert">
<input type="submit" class="update" name="update" value="Update">
<input type="submit" class="delete" name="delete" value="Delete">
<?php endwhile ;?>
</form>
</center>
<?php 	$now = $data[1]+1;?>
<p><?php echo $now;?></p>
</body>
</html>
