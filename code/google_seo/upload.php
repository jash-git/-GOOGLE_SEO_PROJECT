<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
header('content-type:text/html;charset=utf-8');
if($_FILES['file']['error']>0){
echo "Error: " . $_FILES['file']['error'];
  exit("檔案上傳失敗！");//如果出現錯誤則停止程式
}
else{
echo "檔案名稱: " . $_FILES['file']['name']."<br/>";
echo "檔案類型: " . $_FILES['file']['type']."<br/>";
echo "檔案大小: " . ($_FILES['file']['size'] / 1024)." Kb<br />";
echo "暫存名稱: " . $_FILES['file']['tmp_name']."<br/>";
$name=iconv("UTF-8", "big5//TRANSLIT//IGNORE","upload/".$_FILES['file']['name']);
echo "path: " .$name."<br/>";
move_uploaded_file($_FILES['file']['tmp_name'], $name);
$name="./".$name;
echo $name."<br>";

include('conn.php');
$handle=fopen($name,"r");
$contents = '';
if ($handle) {
    while (!feof($handle))
	{
        $contents = fgets($handle, 500);
		$contents=trim($contents);
        echo $contents."<br>";
		$url=$contents;
		$year=date("Y");
		$month=date("m");
		$day=date("d");
		$sql = "INSERT INTO `all` (`url`, `year`, `month`, `day`) VALUES ('$url', '$year',$month,'$day')";		
		if(mysqli_query($conn,$sql))
		{
			echo $sql.'<br><br>';
		}
	}
    fclose($handle);
	unlink($name);//函数删除文件。
}

exit('上傳完成！點擊此處 <a href="javascript:history.back(-1);">返回</a> 繼續上傳');
}

?>
