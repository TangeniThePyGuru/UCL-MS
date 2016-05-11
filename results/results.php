<?php include '/ucl/nav.php';
	  require '/ucl/functions.php';
 ?>
<!DOCTYPE html>
<html  lang="en-us">
<head>
	<title>Results</title>
	<style>
		body{
			margin: auto;
		}
	table {
	    width:60%;
		margin: auto;
	}
	div{
		width: 100%;
		margin:auto;
	}
	
	body{
		margin:auto;
	}
	table, th, td {
	    border: 1px solid black;
	    border-collapse: collapse;
	}
	th, td {
	    padding: 5px;
	    text-align: left;
	}
	
	table#t01 tr:nth-child(odd) {
	   background-color:#fff;
	}
	table#t01 th	{
	    background-color: #e3e3e3;
	    color: black;
	}

	h1 { 
		color: inherit;
	    font-weight: normal;
	    text-align: center; 
    }

	footer { text-align: center; }
    </style>
	
	
</head>
<meta charset="UTF-8">
<header>
	<link rel="stylesheet"href="/ucl/style/bootstrap.min.css">
		  
    <h1 style="color: inherit; font-weight: normal; text-align: center;">
    <img src="ucl/img/unam-logo.jpg" alt="Unam Logo" style="width: 175px; height: 80px; align="middle"; "><br>Computer Literacy Test Results</h1>
    
	
</header>
<body>
<div class="table-responsive">
	 <script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if ('https:' === document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly"    onclick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;margin:0 6px"  src="http://cdn.printfriendly.com/pf-icon.gif" width="23" height="25" alt="Print Friendly and PDF" />Print Friendly</a>
	
	
	<table id="t01" class="table table-bordered">
	<tr>
		<th>#</th>
		<th>Student Number</th>
		<th>Incorrect Answers</th>
		<th>Correct Answers</th>		
		<th>Final Percentage</th>
		
	<?php 
	
		$sql = "SELECT * FROM marks";
		
		$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				$count = 1;
				while($row = mysqli_fetch_assoc($result)) { 
					echo "<tr>"."<td>".$count."</td>";
					echo "<td>".$row["srnumber"]."</td>";
					echo "<td>".$row["incorrect"]."</td>";
					echo "<td>".$row["correct"]."</td>";
					echo "<td>".$row["grade"]."</td>";
					echo "</tr>"."<br>";
					$count++;
					}
				} 
				mysqli_close($conn);
	?>
 </table>
</div>

<!--some javascript files-->
<script src="/ucl/js/jquery.min.js"></script>
<script src="/ucl/js/bootstrap.min.js"></script>

</body>
<footer>
	<p>&copy; All Rights Reserved to Group 1.</p>
</footer>
</html>