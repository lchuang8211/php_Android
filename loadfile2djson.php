<?php 




// $json2d = '[
// 			{
// 				"id":466,
// 				"lang":"zh-tw",
// 				"name":"南鯤鯓代天府",
// 				"summary":"", 
// 				"open_time":"主殿-06:00~21:00、大鯤園-08:00~17:00、凌霄寶殿-07:30~17:00(全年無休)",
// 				"district":"北門區",
// 				"address":"727 臺南市北門區鯤江976號",
// 				"tel":"+886-6-7863711",
// 				"fax":"",
// 				"lat":23.28647,
// 				"long":120.14159,
// 				"services":[ ],
// 				"category":[ 
// 							"歷史古蹟",
// 							"宗教廟宇",
// 							"在地藝文",
// 							"無障礙設施"
// 							],
// 				"update_time":"2020-05-04 18:08:31"
// 			}
// ]';

	$myFile = "台南景點";
	$myDir = "jsonfile";
	$handle = fopen($myDir."/".$myFile.".json","rb");
	$content = "";

	while (!feof($handle)) {
		$content .= fread($handle, 10000);
	}
	fclose($handle);
	$content = json_decode($content,JSON_NUMERIC_CHECK);
	// echo count($content);
	
	
	require("dbconnect.php");
	$tmparraySchema =  array(); // 儲存jsonArray的所有欄位名稱 ( Schema )
	// echo count($arraySchema);
	$arraySchema="'";
	$getSchemaDataType=array();  //儲存所有欄位的資料型別
	$sqlTableSchema=""; //儲存要上傳的SQL指令
	foreach ($content[0] as $t1_schema => $t1_value) {
		//透過 $t1_schema 取得欄位名稱
		$tmparraySchema[count($tmparraySchema)]=$t1_schema;
		//透過 $t1_value/$t2_value 取得欄位的資料型態
		// $getSchemaDataType[count($getSchemaDataType)]=gettype($t1_value);
		$DataType = gettype($t1_value);
		if(is_string($t1_value)){
			echo  strlen($t1_value)." -strlen- "."<br>";
			// if (strlen($t1_value)>500){ 
			//   $getSchemaDataType[count($getSchemaDataType)] = "text";
			// }
		}
		if ( is_array($t1_value) || is_string($t1_value) ) {  // 含 Array 型別再繼續做判斷
			$t2_SchemaDataType=array();	// 儲存Array欄位的內部資料型別	
			// foreach ($t1_value as $t2_schema => $t2_value) {
			//  	$t2_SchemaDataType[count($t2_SchemaDataType)]=gettype($t2_value);
			// }
			// $getSchemaDataType[count($getSchemaDataType)-1]=gettype("string");
			$DataType = "text";  //因為MySQL沒有Array的資料型態所以存沒TEXT (STRING)
		}
		$arraySchema=$t1_schema;
		// echo $t1_schema." ";
		$sqlTableSchema=$sqlTableSchema."`".$t1_schema."` ". $DataType ." NOT NULL,";
	}
	$sqlTableSchema = substr($sqlTableSchema,0,-strlen(","));
	echo '<hr>';		
	print_r($tmparraySchema);echo '<br>';
	print_r($getSchemaDataType);echo '<br>';
	print_r($t2_SchemaDataType);echo '<br>';
	echo '<hr>';
	print_r($sqlTableSchema."<br>");
	echo "<hr>";
	
	// $sqlTableSchema= "`".$tmparraySchema[0]."` ".$getSchemaDataType[0]." NOT NULL, ";
	// print_r($sqlTableSchema."<br>");
	// $sqlTableSchema1= "`".$tmparraySchema[1]."` ".$getSchemaDataType[1]." NOT NULL, ";
	// print_r($sqlTableSchema1."<br>");

	

	$sqlCreateTable = "create table `androiddb`.`autoView` (". $sqlTableSchema .") ENGINE = InnoDB;";
	print_r($sqlCreateTable."<hr>");
	$conn->query($sqlCreateTable);

	"CREATE TABLE `androiddb`.`view` ( `ID` INT NOT NULL , `gender` TEXT NOT NULL , `n5d` DOUBLE NOT NULL , `6hjfgh` DATE NOT NULL ) ENGINE = InnoDB;";
	// $content = $jsonArray
	foreach ($content as $key => $value) {	
		if($value != "" && $value!=null){
			foreach ($value as $t1_schema => $t1_value) {	
				if ( is_array($t1_value) )  {
					$t2_value_array = "";
					foreach ($t1_value as $key2 => $t2_value) {
						$t2_value_array = $t2_value_array . $t2_value . "、";
					}	
						echo $t1_schema . " : " . substr($t2_value_array, 0, -strlen("、"));
				}else{
					echo $t1_schema . " : " . $t1_value;
				}
				echo "<br>";

			}

		}
		echo "<hr>";
		$sqlInsert = "";
	}

?>