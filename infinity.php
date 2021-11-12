<?php
include 'connect.php'; //includes the connection file
// $x = FALSE; 
// if($x==TRUE){


if(isset($_POST['submit'])){  
  $name = $_POST['name'];
  $hobby1 = array_key_exists("hobby1",$_POST) == TRUE?  $_POST['hobby1'] : "";
  $hobby2 = array_key_exists("hobby2",$_POST) == TRUE?  $_POST['hobby2'] : "";
  $hobby3 = array_key_exists("hobby3",$_POST) == TRUE?  $_POST['hobby3'] : "";
  $hobby4 = array_key_exists("hobby4",$_POST) == TRUE?  $_POST['hobby4'] : "";
  $sex =$_POST['sex'];
  $dish = $_POST['dish'];
  $dish1 = array_key_exists(0,$dish) == TRUE?  $dish[0] : "";
  $dish2 = array_key_exists(1,$dish) == TRUE?  $dish[1] : "";
  $dish3 = array_key_exists(2,$dish) == TRUE?  $dish[2] : "";
  $dish4 = array_key_exists(3,$dish) == TRUE?  $dish[3] : "";
 



$insert = "INSERT INTO `infinity` (`name`, `hobby1`, `hobby2`, `hobby3`, `hobby4`, `sex`, `dish1`, `dish2`, `dish3`, `dish4`) VALUES ('$name', '$hobby1', '$hobby2', '$hobby3', '$hobby4', '$sex', '$dish1', '$dish2', '$dish3', '$dish4')";
$sql_query = mysqli_query($conn, $insert);
if ($sql_query == true){
  //$success = "Data submitted";
 // echo $success;
  
}else{
  //$failure = mysqli_error($conn);
 // echo $failure;
  
}

}
//} //alive if

if(isset($_POST['update_record'])){
		  $partId = $_POST['partId'];
		  $name = $_POST['name'];
		  $hobby1 = array_key_exists("hobby1",$_POST) == TRUE?  $_POST['hobby1'] : "";
		  $hobby2 = array_key_exists("hobby2",$_POST) == TRUE?  $_POST['hobby2'] : "";
		  $hobby3 = array_key_exists("hobby3",$_POST) == TRUE?  $_POST['hobby3'] : "";
		  $hobby4 = array_key_exists("hobby4",$_POST) == TRUE?  $_POST['hobby4'] : "";
		  $sex =$_POST['sex'];
		  $dish = $_POST['dish'];
		  $dish1 = array_key_exists(0,$dish) == TRUE?  $dish[0] : "";
		  $dish2 = array_key_exists(1,$dish) == TRUE?  $dish[1] : "";
		  $dish3 = array_key_exists(2,$dish) == TRUE?  $dish[2] : "";
		  $dish4 = array_key_exists(3,$dish) == TRUE?  $dish[3] : "";
    
		$update_query = "UPDATE `infinity` SET `name` = '$name', `hobby1` = '$hobby1', `hobby2` = '$hobby2', `hobby3` = '$hobby3', `hobby4` = '$hobby4', `sex` = '$sex', `dish1` = '$dish1', `dish2` = '$dish2', `dish3` = '$dish3', `dish4` = '$dish4' WHERE `partId` = '$partId'";

      $sql_query3 = mysqli_query($conn, $update_query);
	    if ($sql_query3 == true){
	      // echo "Update Successfull";
	      // exit();
	    }else{
	      echo mysqli_error($conn);
	    }
			}


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>infinity</title>
	<link rel="stylesheet" type="text/css" href="infinity.css">
</head>
<body>

	<div class="head">
		<h1>INFINITY DISCUSSION</h1>
	</div>
	<div class="body">
			<div class="up">
							<div class="part">
								<h3>Participants Online</h3>
								<ul>
									<li>Ssegawa</li>
									<li>Sanga</li>
									<li>Nakalyowa</li>
									<li>Andinda</li>
									<li>Wabyona</li>
								</ul>
							</div>
							<div class="form-area">



 <?php 
  //updating code
    if(isset($_REQUEST['update'])){      
      $partId = $_REQUEST['update'];
      $statement = "SELECT * FROM infinity WHERE partId = '$partId' ";
      $sql_query2 = mysqli_query($conn, $statement);
      $updateRow = mysqli_fetch_assoc($sql_query2);
      extract($updateRow);//extracts the array into variables and values //does it work on normal arrays?
      
		
      //Updating form below

     ?>
    								 <h1>Update <?php echo $name; ?></h1>

								<form method="post" action="infinity.php" >
									
									<label>Full Name: </label>
									<input type="text" name="name" value="<?php echo $name; ?>">
									
									<label>Hobbies:</label>
									
									<!-- note if you want to check the box when you click the word use label -->
									<!-- note2 if you want to the box to be checked by default use checked = "checked" -->
										<input type="checkbox" name="hobby1" value="Football" <?php if($hobby1 == 'Football'){echo 'checked';} ?>> Football
										<input type="checkbox" name="hobby2" value="Swimming" <?php if($hobby2 == 'Swimming'){echo 'checked';} ?>> Swimming
										<input type="checkbox" name="hobby3" value="Codding" <?php if($hobby3 == 'Codding'){echo 'checked';} ?>> Codding
										<input type="checkbox" name="hobby4" value="Cooking" <?php if($hobby4 == 'Cooking'){echo 'checked';} ?>> Cooking
										

									<label>Gender:</label>
									
									<input type="radio" name="sex" value="M" <?php if($sex == 'M'){echo 'checked';} ?> > Male
									<input type="radio" name="sex" value="F" <?php if($sex == 'F'){echo 'checked';} ?>> Female
									

									<label>Favourite Dish:</label>
									<select name="dish[]" size="4" multiple="multiple" >
											<option value="Cassava" <?php if($dish1 == 'Cassava'){echo 'selected';} ?>>Cassava</option>
											<option value="Rice" <?php if($dish2 == 'Rice'){echo 'selected';} ?>>Rice</option>
											<option value="Posho" <?php if($dish3 == 'Posho'){echo 'selected';} ?>>Posho</option>
											<option value="Beans" <?php if($dish4 == 'Beans'){echo 'selected';} ?>>Beans</option>
										</select>
										
									<label>Action</label>			
								
									<input type="submit" name="update_record" value="Update Data">
									<input type="hidden" name="partId" value="<?php echo $partId; ?>">

							</form>

     <?php }else{  //close the update if	 ?>
								<h1>Entry Form</h1>

								<form method="post" action="infinity.php" >
									
									<label>Full Name: </label>
									<input type="text" name="name">
									
									<label>Hobbies:</label>
									
									<!-- note if you want to check the box when you click the word use label -->
									<!-- note2 if you want to the box to be checked by default use checked = "checked" -->
										<input type="checkbox" name="hobby1" value="football" > Football
										<input type="checkbox" name="hobby2" value="swimming"> Swimming
										<input type="checkbox" name="hobby3" value="codding"> Codding
										<input type="checkbox" name="hobby4" value="cocking"> Cooking
										

									<label>Gender:</label>
									
									<input type="radio" name="sex" value="M" > Male
									<input type="radio" name="sex" value="F"> Female
									

									<label>Favourite Dish:</label>
									<select name="dish[]" size="4" multiple="multiple" >
											<option selected="selected" value="cassava" >Cassava</option>
											<option value="rice">Rice</option>
											<option value="posho">Posho</option>
											<option value="bean">Beans</option>
										</select>
										
									<label>Action</label>			
									<input type="reset" name="" value="Clear Fields">
									<input type="submit" name="submit" value=" Submit Your Data">

							</form>
						<?php 	} ?>

							</div>
			</div>
		</div>
		
		<div class="data" style="overflow-y: scroll;">
			<h2>Display Data</h2>

			<?php 
// echo "hello";


 // if(isset($_POST['submit'])){
 // 	var_dump($_POST);

 // 	$hobby1 = array_key_exists("hobby1",$_POST) == TRUE?  $_POST['hobby1'] : "hello";

 // 	// if(array_key_exists("hooby1",$_POST)){
 // 	// 	$hobby1 = $_POST['hobby1'];  		
 // 	// }else{
 	
 // 	// $hobby1 = "hello";
 // 	// }
 // 	 echo $hobby1;

 	//} 
// 		foreach ($_POST as $key => $value) {
// 		echo $key." = ".$value."<br>";
// 		// code...
// 				}
// foreach($_POST['dish'] as $dish){
// 	echo $dish."<br>";

// }
// echo "hello world"."<br>";
		
// $food = $_POST['dish'];
// echo $food[0];
	//	}


// echo $success;
// echo $failure;
		

//---select from the db ----
$retreive = "SELECT * FROM infinity";
$sql_query = mysqli_query($conn, $retreive);

///---delete
 
    if(isset($_REQUEST['delete'])){      
      $partId = $_REQUEST['delete'];   
      $delete_query="DELETE FROM infinity WHERE partId='$partId'";
      $sql_query1 = mysqli_query($conn, $delete_query);

      if($sql_query==TRUE){
        echo '<h1 style="background-color:red; text-align:center;">RECORD DELETED</h1>';
      }
      else
        { echo mysqli_error($conn);}


    }

   



?>

<table width="900px" border="1" align="center" class="table" style="background-color: teal; text-align: center; margin-left: 30px; color:#fff; cellpadding:">
          
          <tr style="font-weight: bold; ">
            <td>ID</td>
            <td>Full Name</td>
            <td>Hobby 1</td>
            <td>Hobby 2</td>
            <td>Hobby 3</td>
            <td>Hobby 4</td>
            <td>Gender</td>
            <td>Dish 1</td>
            <td>Dish 2</td>
            <td>Dish 3</td>
            <td>Dish 4</td>
            <td>Action</td>
            <td>Action</td>
          </tr>   
          <?php 
          $retreive = "SELECT * FROM infinity";
			$sql_query = mysqli_query($conn, $retreive);
			$id = 0;
          while ($rows = mysqli_fetch_assoc($sql_query) ) {
          	$id += 1;
            ?>
          <tr>
            <td><?php   echo $id;  ?></td>
            <td><?php   echo $rows['name']; ?></td>
            <td><?php   echo $rows['hobby1']; ?></td>
            <td><?php   echo $rows['hobby2']; ?></td>
            <td><?php   echo $rows['hobby3']; ?></td>
            <td><?php   echo $rows['hobby4']; ?></td>
            <td><?php   echo $rows['sex']; ?></td>
            <td><?php   echo $rows['dish1']; ?></td>
            <td><?php   echo $rows['dish2']; ?></td>
            <td><?php   echo $rows['dish3']; ?></td>
            <td><?php   echo $rows['dish4']; ?></td>
            <!-- to trigger an action ?actionName=PK -->
            <td style="	background-color: white;"> <a href="?delete=<?php   echo $rows['partId']; ?>">Delete </a></td>
            <td style="	background-color: white;"> <a href="?update=<?php   echo $rows['partId']; ?>">Update </a></td>
          </tr> 
          <?php 
            
          } 
          ?>  

</table>



	
	
			 
			 
		</div>
		
	</div>
	<div class="foot">
		<p>All Rights Reserved &copy; 2021 To Infinity and Beyond!</p>
	</div>

</body>
</html>