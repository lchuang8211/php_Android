
<?php
	/////////// input data from android ///////////
    $input1 = file_get_contents("php://input",'rb');
    if($input1!=null){ 
        $input1 = urldecode($input1);   // 必要條件 避免中文亂碼    
        // echo $input1."**++--";    
        if(substr($input1,0,3) == pack("CCC",0xEF,0xBB,0xBF))   //去BOM檔頭
            $input1 = substr($input1,3);
        $input1 = json_decode( $input1,  true);//解json
        $input1 = $input1["phoneDataJson"];  //取物件的名稱(value)     
         
     
    /////////// input data from android ///////////   
        // echo var_dump($input1)."---++--";  
        if ($input1!="") {
            # code...
        
            // 連接資料庫 //
            require("dbconnect.php");
         	// 連接資料庫 //
                             
            // `name` as 景點, `lat`as 緯度,`long` as 經度
            $sql_ViewSelect = "select `name`,`lat`,`long` from 台南景點 where name like '%". $input1 ."%';";    
            $result = $conn->query($sql_ViewSelect);
            if ( $result->num_rows > 0) {
                // output data of each row  fetch_array
                // while($row = $result->fetch_assoc()) { //如果多行
                	$row = $result->fetch_assoc();
                	$phpJson = json_encode($row,true);
                	echo $phpJson;
                    // echo "ID: " . $row["ID"] . " Name: " . $row["Name"]. " 描述: " .   $row["description"];
                // }
            }
            mysqli_close($conn);
        }
    }
    // $sql_select ="select * from fruitname where name='". $input1 ."'";
    // $result = $conn->query($sql_select);

    // if ( $result->num_rows > 0) {
        // output data of each row
        // while($row = $result->fetch_assoc()) {
    	// $row = $result->fetch_assoc();
    	// $phpJson = json_encode($row);
    	// echo $phpJson;
        // echo "ID: " . $row["ID"] . " Name: " . $row["Name"]. " 描述: " . $row["description"];
        // }
    // } 
    // else {
    //   echo "0 results";
    // }
    // echo '<hr>';
    
    //列出資料庫資料
    // mydb_connect();
    //  $sql = "select * from fruitname";
    // $result = $conn->query("select * from fruitname");
    // if ( $result->num_rows > 0) {
    //   // output data of each row
    //   while($row = $result->fetch_assoc()) {            
    //     echo "ID: " . $row["ID"] . " Name: " . $row["Name"]. " 描述: " . $row["description"]. "<br>";
    //   }
    // } else {
    //   echo "0 results";
    // } 

    // $data = [ 'name' => 'God', 'age' => 2 ] ;
    // header("Content-Type: application/json;");
	// header("Content-Type: text/html; charset=UTF-8");
    // echo json_encode($data);
    

    // echo '<hr>';
    
    // function json_response(){					                
       //  $data = [ 'name' => 'God', 'age' => 2 ] ;
       //  header("Content-Type: application/json;");
       //  echo json_encode($data);
       //  exit();
    // }
    // echo json_response();
    
    // if ($conn->query($sql) === TRUE) {
    //   echo "Record updated successfully" . "<br>";
    // } else {
    //   echo "Error updating record: " . $sql . $conn->error . "<br>";
    // }
?>
      					 