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
    	
    	<label class="label_1">Page 2</label>
      	<hr>
      	<fieldset>
      		<div>
      			<ul>
      				<li>
      					<label>showinput</label>
      					 <?php $input1=$_POST['phonedata'];
echo "phonedata :" . $input1 . "ok";
$obj = json_decode($input1, true);
echo $obj[0]["phonedata"] ;
print_r($obj);
?>
      				</li>
      			</ul>
      		</div>
      	</fieldset>
      	
    </body>
</html>
