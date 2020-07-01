<?php
include('conn.php');
header('content-type:text/html;charset=utf-8');
/////////////////////////////
$res="SELECT * FROM `all`";
$result=mysqli_query($conn,$res);
$num=mysqli_num_rows($result);
////////////////////////////
srand((double)microtime()*1000000);
$v1=rand(1,($num-1)/4);
srand((double)microtime()*1000000);
$v2=rand(($num-1)/4,($num-1)/4*2);
srand((double)microtime()*1000000);
$v3=rand(($num-1)/4*2,($num-1)/4*3);
srand((double)microtime()*1000000);
$v4=rand(($num-1)/4*3,($num-1));
$sql_1="SELECT * FROM `all`where uid=$v1";
$sql_2="SELECT * FROM `all`where uid=$v2";
$sql_3="SELECT * FROM `all`where uid=$v3";
$sql_4="SELECT * FROM `all`where uid=$v4";
$Ans1=mysqli_query($conn,$sql_1);
$Ans2=mysqli_query($conn,$sql_2);
$Ans3=mysqli_query($conn,$sql_3);
$Ans4=mysqli_query($conn,$sql_4);
$url_1="";
$url_2="";
$url_3="";
$url_4="";
if (mysqli_num_rows($Ans1) > 0) 
{
 
        $row1 = mysqli_fetch_array($Ans1);
		$url_1=$row1["url"];
}
if (mysqli_num_rows($Ans2) > 0) 
{
 
        $row2 = mysqli_fetch_array($Ans2);
		$url_2=$row2["url"];
}
if (mysqli_num_rows($Ans3) > 0) 
{
 
        $row3 = mysqli_fetch_array($Ans3);
		$url_3=$row3["url"];
}
if (mysqli_num_rows($Ans4) > 0) 
{
 
        $row4 = mysqli_fetch_array($Ans4);
		$url_4=$row4["url"];
}
?>
<html>
  <head>
    <meta http-equiv="refresh" content="300;url=http://jashliao.eu/google_seo/index02.php"/>  
    <title>Read File (via User Input selection)</title>
	<script type="text/javascript">

		function sleep(milliseconds) {
			//http://trufflepenne.blogspot.com/2011/09/javascriptsleep.html
		  var start = new Date().getTime();
		  for (var i = 0; i < 1e7; i++) {
			if ((new Date().getTime() - start) > milliseconds){
			  break;
			}
		  }
		}
	
		function load(num) {
			switch(num)
			{
				case 0:
					document.getElementById('external_1').src=<?php echo"\"$url_2\""; ?>;
					var aa = document.getElementById('external_1'); 
					//aa.onload = load(1);
					sleep(5000);
					load(1);
					break;
				case 1:
					document.getElementById('external_2').src=<?php echo"\"$url_3\""; ?>;
					var bb = document.getElementById('external_2'); 
					//bb.onload = load(2);
					sleep(5000);
					load(2);					
					break;
				case 2:
					document.getElementById('external_3').src=<?php echo"\"$url_4\""; ?>;
					var cc = document.getElementById('external_3'); 
					/*
					cc.onload = function() { 
						setTimeout("location.href='http://149.56.83.152/google_seo/index02.php?a=<?php echo $v1.'-'.$v2.'-'.$v3.'-'.$v4; ?>'",90000);
					};
					*/
					sleep(5000);
					setTimeout("location.href='http://jashliao.eu/google_seo/index02.php?a=<?php echo $v1.'-'.$v2.'-'.$v3.'-'.$v4; ?>'",90000);
					break;				
			}
		}
	</script>
</head>
<body>
	<?php
		echo "總筆數:".$num;
		echo "<br>\n";
		echo $url_1;
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo $v1;
		echo "<br>\n";
		echo $url_2;
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo $v2;
		echo "<br>\n";
		echo $url_3;
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo $v3;
		echo "<br>\n";
		echo $url_4;
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo $v4;
		echo "<br>\n";		
	?>
    <div id="container">    
		<script language="javascript">
			<!--
			var displaymode=0
			var iframecode0='<iframe id="external_0" style="width:100%;height:25%" onload="load(0)" src=<?php echo"\"$url_1\""; ?>></iframe>'
			var iframecode1='<iframe id="external_1" style="width:100%;height:25%"></iframe>'
			var iframecode2='<iframe id="external_2" style="width:100%;height:25%"></iframe>'
			var iframecode3='<iframe id="external_3" style="width:100%;height:25%"></iframe>'
			if (displaymode==0)
			{
				document.write(iframecode0)
				document.write(iframecode1)
				document.write(iframecode2)
				document.write(iframecode3)
			}

			//-->
		</script>
		
    </div>
	
</body>
</html>
