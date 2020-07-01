
<?php
	//GOOGLE: php get google search result
	//資料來源:http://leandroarts.com/how-to-scrape-google-search-results-for-query-popularity-with-php/
	header('content-type:text/html;charset=utf-8');
	
	include_once('simple_html_dom.php');
	$query = "jashliao Windows"; // This is the search term you are using.. use a form submission.. or pull the titles from an RSS feed via SimplePie, etc..
	$domain="http://jashliao.pixnet.net";
	$otherpage="&start=";
	$strStart="start=";//jash add at 2016/12/28
	function fetch_google($query,$domain,$otherpage,$strStart)
	{
		$cleanQuery = str_replace(" ","+",$query);
		$url = 'https://www.google.com/search?q='.$cleanQuery;
		echo "執行查詢網址:".$url."<br>";//jash add at 2016/12/28
		$scrape = file_get_contents($url);
		if(isset($scrape))//jash add at 2016/12/28
		{
			echo "有抓到搜尋資料<br>";
		}
		else
		{
			echo "無抓到搜尋資料<br>";
		}
		$seach_c=0;
		$seo_c=0;
		$seach=array();
		$seo=array();

		$html = str_get_html($scrape);
		if(isset($html))//jash add at 2016/12/28
		{
			echo "有完整的HTML的DOM<br>";
		}
		else
		{
			echo "無完整的HTML的DOM<br>";
		}
		
		$conditions='/url?q='.$domain;//jash add at 2016/12/28
		echo "判斷是否為自己需要網域用字串:".$conditions."<br>";//jash add at 2016/12/28
		
		foreach($html->find('a') as $element)
		{
			echo "抓到連結網址:".$element->href."<br>";
			if (false !== ($rst = strpos($element->href, $strStart)))
			{
				$seach[$seach_c]='https://www.google.com'.$element->href;
				echo "抓到[大神]連結網址:".$seach[$seach_c]."<br><br>";//jash add at 2016/12/28
				$seach_c=$seach_c+1;
			}
			if (false !== ($rst = strpos($element->href, $conditions)))
			{
				$seo[$seo_c]='https://www.google.com'.$element->href;
				echo "抓到SEO的連結網址:".$seo[$seo_c]."<br><br>";//jash add at 2016/12/28
				$seo_c=$seo_c+1;
			}					
		}
		echo "搜尋網址:<br>";
		for($i=0;$i<$seach_c;$i++)
		{
			echo $seach[$i].'<br>';//jash add at 2016/12/28
			$scrape = file_get_contents($seach[$i]);
			$html = str_get_html($scrape);
			foreach($html->find('a') as $element)
			{
				if (false !== ($rst = strpos($element->href, $conditions)))
				{
					$seo[$seo_c]='https://www.google.com'.$element->href;
					$seo_c=$seo_c+1;
				}				
			}
		}
		
		echo "SEO網址:<br>";
		$pf=fopen("js_seo.html","w");
		fprintf($pf,
		'<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8">
		<title>Js控制 iFrame 切换加载网址</title>
		<script language="javascript">
			var count=0
			function jumpto(inputurl)
			{
				if (document.getElementById&&displaymode==0)
					document.getElementById("external").src=inputurl
				else if (document.all&&displaymode==0)
					document.all.external.src=inputurl
				else
				{
					if (!window.win2||win2.closed)
						win2=window.open(inputurl)
					else
					{
						win2.location=inputurl
						win2.focus()
					}
				}
			}
			function Run()
			{
				count++;
				if(count>%d)
				{
					count=0;
				}
				switch(count)
				{',$seo_c);
		for($j=0;$j<$seo_c;$j++)
		{
			echo $seo[$j].'<br>';
			fprintf($pf,
			"case %d:
				jumpto('%s');
				break;\n",$j,$seo[$j]);
		}
		fprintf($pf,'			}
			setTimeout("Run();", 10000);
		}
		function Timer()
        {
            setTimeout("Run();", 10000);
        }		
	</script>
	</head>
	<body  onload="Timer()">
		<script language="javascript">
			<!--
			var displaymode=0');
		$data="\n			var iframecode='<iframe id=\"external\" style=\"width:100%;height:100%\" src=\"http://jashliao.pixnet.net/blog/\"></iframe>'";
		fprintf($pf,"%s\n",$data);
		$data="			if (displaymode==0)
				document.write(iframecode)

			//-->
		</script>
	</body>
</html>";
		fprintf($pf,"%s\n",$data);
	fclose($pf);		
	}
	
	//fetch_google($query,$domain,$otherpage,$strStart);
	if(isset($_POST['searchconditions']))
	{
		$query=$_POST['searchconditions'];
		$domain=$_POST['searchdomain'];
		fetch_google($query,$domain,$otherpage,$strStart);	
	}	
?>