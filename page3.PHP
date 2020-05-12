<!DOCTYPE html>
<html>
    <head> <!--網頁設定 標頭-->
      <meta charset="utf-8">
      <meta name="description" content="傳接資料"> <!--這個網頁的描述/形容-->
      <meta name="keywords" content="html, web, 網頁, 學習, 教學, post, get"> <!--搜尋KEYWORD-->
      <meta name="author" context="huang"> <!--作者是誰-->
      <title>PHP PAGE2</title>
      <style type="text/css">
      	.label_1{
      		font-size: 55px;
      	}
      </style>
      <script>

      </script>
    </head>
    
    <body> <!-- 主要內容 -->
    	
    	<label class="label_1">Database Data</label>
      	<hr>
      	<fieldset>
      		<div>
      			<ul>
      				<li>
      					<label>showinput</label><hr>
      					<?php 

                $result = file_get_contents('php://input');
                echo $result;

                // echo json_decode(json_encode($result));


      					$input1 = $_GET['phoneDataJson']; 
      					echo "phoneDataJson :" . $input1 . "ok";
                echo '<br>';
                $json_data = '{ "phoneDataJson" : "' . $input1 . '" }';
      					$obj = json_decode($json_data, true);
      					echo $obj["phoneDataJson"];
                echo '<br>';
      					print_r($obj);

                echo '<hr>';

                $input1 = $result;
                $servername = "localhost";
                $username = "lchuang";
                $password = "asabee1566";
                $dbname = "androiddb";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                } else{
                  echo "Connection successfully"."<br>";
                }
                echo "<br>";
                $sql = "select * from fruit";
                $sql = "insert into fruit (name) Values ('" .  $input1 . "')";
                if($input1!=null && $input1!=""){
                  $result = $conn->query($sql);                
                }
                $sql = "select * from fruit";
                $result = $conn->query($sql);
                if ( $result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "Name: " . $row["name"] . "<br>";
                  }
                } else {
                  echo "0 results";
                } 
                // if ($conn->query($sql) === TRUE) {
                //   echo "Record updated successfully" . "<br>";
                // } else {
                //   echo "Error updating record: " . $sql . $conn->error . "<br>";
                // }

      					 ?>
      				</li>
      			</ul>
      		</div>
      	</fieldset>
      	
    </body>
</html>
