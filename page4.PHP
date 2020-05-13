
<?php
	// $conn=null;
    $input1 = file_get_contents('php://input');
    // echo $result;
    // $input1 = $result;
    // echo json_decode(json_encode($result));
    
	// $input1 = $_GET['phoneDataJson']; 			      					
    // $json_data = '{ "phoneDataJson" : "' . $input1 . '" }';			      					
    // if($result!=null && $result!=""){
      
    //   echo "phoneDataJson :" . $input1 . "ok";
    //   echo '<br>';
    
    //   echo $obj["phoneDataJson"];
    //   echo '<br>';
    if($input1!=null && $input1!=""){ 
    	$obj = json_decode($input1, true); 
    	$input1 = $obj["phoneDataJson"]; 
    }
    // print_r($obj);
    // }

    // echo '<hr>';
    // 連接資料庫
    
    
 	$servername = "localhost";
    $username = "lchuang";
    $password = "asabee1566";
    $dbname = "androiddb";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
            // echo "Connection successfully"."<br>";
    }
    
    
    
    // echo "<br>";
    // $sql = "select * from fruit";
    
    // if($input1!=null && $input1!=""){
    //   $sql = "insert into fruit (name) Values ('" .  $input1 . "')";
    //   $result = $conn->query($sql);                  
    // }     
    
    $sql_select = "select * from fruitname where name='". $input1 ."'";
    $result = $conn->query($sql_select);
    if ( $result->num_rows > 0) {
        // output data of each row
        // while($row = $result->fetch_assoc()) {
    	$row = $result->fetch_assoc();
    	$phpJson = json_encode($row);
    	echo $phpJson;
        // echo "ID: " . $row["ID"] . " Name: " . $row["Name"]. " 描述: " . $row["description"];
        // }
    }
    mysqli_close($conn);
    
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
      					 