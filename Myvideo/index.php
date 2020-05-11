<?php
if(isset($_POST['search']))
	{
	if(strlen($_POST['valueToSearch'])>=2)
		{
				$valueToSearch = $_POST['valueToSearch'];	
				$query = "SELECT * FROM `users` WHERE CONCAT(`name`,`key`,`id`,`type`) LIKE '%".$valueToSearch."%'";
				$search_result = filterTable($query);

		}else{
	{
		//empty search//
    $query = "SELECT * FROM `users` ORDER BY `id` ASC";
    $search_result = filterTable($query);
		}
 }
	}
	else {
		{
			//direct entey
    $query = "SELECT * FROM `hello` ORDER BY `type` ASC";
    $search_result = filterTable($query);
	}
	}
	
	
	
// function to connect and execute the query
	function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "12345", "lol");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
//filter result end.....
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Index || MyVideo.Com ||</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<link rel="stylesheet" type="text/css" href="file/style.css" title="style" />
		<link rel="shortcut icon" type="image/png" href="file/icon.png">
  <script type="java/script"> // When the user scrolls the page, execute myFunctionwindow.onscroll = function() {myFunction()};
// Get the headervar header = document.getElementById("myHeader");
// Get the offset position of the navbarvar sticky = header.offsetTop;
// Add the sticky class to the header when you reach its scroll position. Remove"sticky" when you leave the scroll positionfunction myFunction() {if (window.pageYOffset > sticky) {header.classList.add("sticky");} else {header.classList.remove("sticky");}}
</script>
	    <link href="file/jquery.videocontrols.css" rel="stylesheet"/>
    <style>
        .container{
            width: 640px;
            margin: 10px;
			position:fixed;
        }
		.sidebarright{
		width:70%;
		text-align:center;
		margin:5px;
		background-color:#e8e6e6;
		border-radius: 1.0em;
		}
		video{
		width: 40px;
		height:30px;
		}
		.othervideo{
		border-radius: 1.5em;
		text-align:center;
		background-color:#fd002a;
		display: block;
		text-overflow: ellipsis;
		overflow: hidden;
		white-space: nowrap;
		outline: 0px !important;
		
		}
		.othervideo:hover{
		text-align:center;
		background-color:#fd5c64;
		}
    </style>
</head>
<body>

<div class="header" id="myHeader">
		<div class="content">
							<h2>Video engine By Shovon </h2>
				<form action="index.php"method="POST" class="search">
					<input type="text" class="get-text" name="valueToSearch" placeholder="Search your Songs">
					<input type="submit" class="submit" name="search" title="Search your Favourite Songs" value="Search">
				</form>
		</div>
	</div>	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<center>
	<div class="sidebarright">
	<br><br>
	<?php while($row = mysqli_fetch_array($search_result)):?>
	<a href="show?id=<?php echo $row['id'];?>">
	<div class="othervideo">
	 <?php echo $row['name'];?><hr><p style="color:white;">Video Type:- <?php echo $row['type'] ;?></p> </div> </a>
	<br>
	<?php endwhile;?>
	</div>
	</center>
	</body>
	</html>

	
	