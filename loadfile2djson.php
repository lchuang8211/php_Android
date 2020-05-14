<?php 

$json2d = '[
			{
				"id":466,
				"lang":"zh-tw",
				"name":"南鯤鯓代天府",
				"summary":"", 
				"open_time":"主殿-06:00~21:00、大鯤園-08:00~17:00、凌霄寶殿-07:30~17:00(全年無休)",
				"district":"北門區",
				"address":"727 臺南市北門區鯤江976號",
				"tel":"+886-6-7863711",
				"fax":"",
				"lat":23.28647,
				"long":120.14159,
				"services":[ ],
				"category":[ 
							"歷史古蹟",
							"宗教廟宇",
							"在地藝文",
							"無障礙設施"
							],
				"update_time":"2020-05-04 18:08:31"
			}
]';

$myFile="台南景點";
$myDir="jsonfile";
echo '<br><hr>';
$handle = fopen($myDir."/".$myFile.".json","rb");
$content = "";
while (!feof($handle)) {	
	$content .= fread($handle, 10000);
}
fclose($handle);
$content = json_decode($content);
echo count($content);
echo '<hr>';
$get_value2="";
echo strlen("、");
echo '<hr>';
foreach ($content as $key => $value) {	
	if($value!="" && $value!=null){
		foreach ($value as $schema_key => $value1) {	
			if ( is_array($value1) )  {
				$get_value2="";
				foreach ($value1 as $key2 => $value2) {
					$get_value2=$get_value2.$value2."、";
				}	
					echo $schema_key." : ".substr($get_value2, 0, -strlen("、"));
			}else{
				echo $schema_key. " : " . $value1 . "<br>";
			}
			echo "<br>";
		}
	}
}

?>