<?php 
require "connection.php";

if(isset($_POST['submit'])){

   $file = $_FILES['file'];
   $fileName=$_FILES['file']['name'];
   $fileTmpName=$_FILES['file']['tmp_name'];
   $fileSize=$_FILES['file']['size'];
   $fileError=$_FILES['file']['error'];
   $fileType=$_FILES['file']['type'];
 

   $fileExt = explode('.',$fileName);
   $fileActualExt = strtolower(end($fileExt));
   $allowed =array('jpg','jpeg','png','pdf');
   if(in_array($fileActualExt, $allowed)){
      if($fileError === 0){
          if($fileSize < 1000000){
               $fileNameNew =uniqid('',true)."." .$fileActualExt;
         $fileDestination = 'pictures/'.$fileNameNew;
         move_uploaded_file($fileTmpName, $fileDestination);
         echo "<script type= 'text/javascript'>alert('Photo Uploaded!');</script>";
  
            }else{
                echo "<script type= 'text/javascript'>alert('Your file is too big!');</script>";
          }
      }  else{
        echo "<script type= 'text/javascript'>alert('There was error in uploading!');</script>";
      } 
   } else{
    echo "<script type= 'text/javascript'>alert('You can't upload image like this!');</script>";
   }
}

  $name=$_POST['name'];
  $fname=$_POST['fname'];
  $age=$_POST['age'];
  $bgrp=$_POST['bgrp'];
  $address=$_POST['address'];
  $hospital=$_POST['hospital'];

  $sql = "INSERT INTO donors(`name`,`fname`,`age`,`bgrp`,`address`,`hospital`,`img`)
  VALUES ('$name','$fname','$age','$bgrp','$address','$hospital','$fileNameNew')";
  
  if ($conn->query($sql) === TRUE) {
  echo "<script type= 'text/javascript'>alert('Thank you for donating blood!');</script>";
  } else {
  echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
  }


 header('location:thanks.php'); 


?>