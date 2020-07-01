<?php
	include('conn.php');

	header('content-type:text/html;charset=utf-8');
	$now=1;

	/////////////////////////////
	$res="SELECT * FROM `all`";
	$result=mysql_query($res);
	$num=mysql_num_rows($result);
	////////////////////////////
	
	////////////////////////////
	if(isset($_REQUEST['now']))//GET&POST
	{
		$now=$_REQUEST['now'];//GET&POST
	}
	
	if($now < $num)
	{
		$res="SELECT * FROM `all`where uid=$now";
	}
	else
	{
		$now=1;
		$res="SELECT * FROM `all`where uid=$now";
	}
	$Ans=mysql_query($res);
	////////////////////////////
	
	////////////////////////////
	if (mysql_num_rows($Ans) > 0) 
	{
 
        $row = mysql_fetch_array($Ans);
 
		$data = array();
		$data["uid"] = $row["uid"];
		$data["url"] = $row["url"];
		$data["year"] = $row["year"];
		$data["month"] = $row["month"];
		$data["day"] = $row["day"];	
		
		// success
		$response["A11_count"] = $num;
		// user node
		$response["data_select"] = array();
		array_push($response["data_select"], $data);
 
		// echoing JSON response
		echo json_encode($response);
	}
	else
	{
		$response["A11_count"] = -1;
		echo json_encode($response);
	}
	////////////////////////////
	
?>