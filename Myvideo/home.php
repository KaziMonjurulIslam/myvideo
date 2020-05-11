<?php
	date_default_timezone_set('Asia/Dhaka');
	$id2 = "10";
	$love = date('H');
	$bdm = date('i:s');
	$bdh = $love;
	$bdtime = "$bdh:$bdm" ;
	$ymd = date('Y-m-d ');
	$bddatetime ="$ymd $bdtime";
if(isset($_GET['id']))
{
	$getid = $_GET['id'];
	$nextid = $_GET['id']+1;
	$prvid = $_GET['id']-1;
	$query = "SELECT name,type FROM `users` WHERE id ='.$getid.'";
	$search_result = filterTable($query);
}
else
{
	$nextid = 10+1;
	$prvid = 10-1;
	$query = "SELECT name,type FROM `users` WHERE id ='.$id2.'";
	$search_result = filterTable($query);
}

function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "12345", "lol");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
	
	while($row = mysqli_fetch_assoc($search_result))
	{
			$name = $row['name'];
			$type = $row['type'];
	}
	//** History INSERT **//
	$con = mysqli_connect("localhost","root","12345","lol");
if(isset($_GET['id']))
{
	$idfor = $_GET['id'];
	$q = "INSERT INTO `sitedata`(`id`, `videoid`, `dtime`) VALUES ('', '$idfor', '$bddatetime')";
	mysqli_query($con,$q);
}
else {
	$idfor = 10;
	$q = "INSERT INTO `sitedata`(`id`, `videoid`, `dtime`) VALUES ('', '$idfor', '$bddatetime')";
	mysqli_query($con,$q);
}
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Show || <?php echo $name;?>||MyVideo.Com || </title>
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
		<link rel="stylesheet" type="text/css" href="file/dynamic.css" title="style" />
		<style>.othervideo{display: block;
		text-overflow: ellipsis;
		overflow: hidden;
		white-space: nowrap;
		outline: 0 !important;}
				
				
		div#load_screen{
			background:#bff1ff;
			opacity: 50;
			position: fixed;
			z-index:10;
			top: 50%;
			right:50%;
			width: 300px;
			height: 150px;
		}
		div#load_screen > div#loading{
			color:#FFF;
			width:300px;
			height:24px;
			top: 50%;
			right:50%;
			text-align:center;
			margin: 50px 0px;
		}
		img.sr{
			position:fixed;
			top:50%;
			right:50%;
		}
		</style>
<script>
window.addEventListener("load", function(){
	var load_screen = document.getElementById("load_screen");
	document.body.removeChild(load_screen);
});
</script>
    
</head>
<body>
<div id="load_screen"><div id="loading"><p style="font-size:20px">loading Video</p>
<img class="sr" src="file/siteads.png" alt="Site Ad" height="150" width="300"></img>
</div></div>
<div class="header" id="myHeader">
		<div class="content">
							<h2>WWW.MyVideo.Com </h2>
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

				<div class="container">
					<video id="myvideo">
            <source src="http://localhost/MyVideo/videos/<?php echo $name;?>" type="video/mp4" autoplay="true">
				</video>
				 
				<button class="left" style="background-color:#171818;text-align:center;float:left;margin:5px; border-radius: 1.0em;"title="Click for Previwes Video"><a style="color:white;" href="show?id=<?php echo $prvid;?>#<?php echo $prvid;?>">Previwes Video</a></button>
				<button class="right" style="background-color:#171818;text-align:center;float:right;margin:5px; border-radius: 1.0em;"title="Click for next Video"><a style="color:white;" href="show?id=<?php echo $nextid;?>#<?php echo $nextid;?>">Next Video</a></button>
				<center>
				<br><br>
		<h2 style="color:#000000;width:100%;display: block;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;outline: 0 !important;" title="Video Name" ><?php echo $name;?></h2>
								<br>
		<p style="font-size:15px; background-color:#ffffff; border-radius: 1.0em; color:#000000" title="Type Of Songs"> Video Type :-<span style="color:red;"> <?php echo $type;?></span> </p>
		<?php
		if(isset($_GET['id']))
		{
			$idget = $_GET['id'];
			$query = "SELECT totalview,lastview FROM `view` WHERE id ='".$idget."'";
			$search_resultv = filterTable($query);
			
		}

	
		?>
		<?php while($dn = mysqli_fetch_array($search_resultv)):?>
		<p style="background-color:#786afe; color:#000000; border-radius:1.0em;" title="Show Total View for This Video"> Total view:- You and <?php echo $my=$dn['totalview'];?> Others</p>
		<p style="background-color:#fe6a6a; color:#000000; border-radius:1.0em;" title="Show Last View Date and Time "> Last View:- <?php echo $dn['lastview'];?></p>
		<?php endwhile;?>
				  <br>
				</center>
					</div>
					
					<?php 
					$con = mysqli_connect("localhost","root","12345","lol");
					if(isset($_GET['id']))
											
					{
						$idget = $_GET['id'];
						
						$totalv = $my+1 ;
						$q = 'update view set id="'.$idget.'", totalview="'.$totalv.'", lastview="'.$bddatetime.'" where id="'.$idget.'"';
						$dolar = mysqli_query($con,$q);
					}

					?>

					
					
<?php
if(isset($_GET['id']))
{
    // search in all table columns
    // using concat mysql function
	$query = "SELECT * FROM `hello` ORDER BY `id` ASC limit 3";
    $search_resultd = filterTable($query);

}
 else {
	{
    $query = "SELECT * FROM `hello` ORDER BY `id` ASC limit 3";
    $search_resultd = filterTable($query);

}

}

//filter result end.....
?>

					<?php
if(isset($_GET['id']))
{
	$getid = $_GET['id'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE CONCAT(`type`) LIKE '%".$type."%' ORDER BY `id` ASC";
    $search_result = filterTable($query);

}
 else {
	{
    $query = "SELECT * FROM `users` ORDER BY `id` ASC";
    $search_result = filterTable($query);

}

}


//filter result end.....
?>

	<div class="sidebarright">
	<br>
	<?php while($sr = mysqli_fetch_array($search_resultd)):?>
	<br>
	<a href="show?id=<?php echo $sr['id'];?>" title="<?php echo $sr['name'];?>">
	<div class="othervideo">
	<?php echo $sr['name'];?></div> </a>
	<br>
	<?php endwhile;?>
	<?php while($row = mysqli_fetch_array($search_result)):?>
	<br>
	<a title="<?php echo $row['name'];?>" href="show?id=<?php echo $row['id'];?>#<?php echo $row['id'];?>">
	<div class="othervideo" id="<?php echo $row['id'];?>">
	<?php echo $row['name'];?><hr><p style="color:white;">Video Type:- <?php echo $row['type'] ;?></p></div></a>
	<br>
	<?php endwhile;?>
	
		
	
	
	
	</div>
<?php// include('totalview.php');?>
    <script src="file/jquery.min.js"></script>
    <script src="file/jquery.videocontrols.js"></script>
    <script>
        $('#myvideo').videocontrols();
    </script>
</body>
</html>
