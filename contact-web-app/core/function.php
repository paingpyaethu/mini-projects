<?php

function runQuery($sql){
   $con = conn();
   if(mysqli_query($con,$sql)){
      return true;
   }else{
      die("Query Fail : ".mysqli_error($con));
   }
}

function fetchAll($sql){
   $query = mysqli_query(conn(), $sql);
   $rows = [];

   while ($row = mysqli_fetch_assoc($query)){
      array_push($rows,$row);
   }
   return $rows;
}

function redirect($l){
   header("location:$l");
}
function linkTo($l){
   echo "<script>location.href='$l'</script>";
}

function showTime($timestamp, $format = "d-m-y"){
   return date($format,strtotime($timestamp));
}

/*---------------
Add_New_Contact
----------------*/
function createContact(){
//   $file = $_FILES['upload'];
   $fileName = $_FILES['upload']['name'];
   $tempFile = $_FILES['upload']['tmp_name'];
   $fileSize = $_FILES['upload']['size'];
   $fileType = $_FILES['upload']['type'];

   $photo = "upload/".$fileName;
//   $photo = $saveFolder.$fileName;
   move_uploaded_file($tempFile,$photo); // Enable to see front panel....


   $user_name = $_POST['user_name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];

   $sql = "INSERT INTO contacts (photo, user_name, email, phone) VALUES ('$photo','$user_name','$email', '$phone')";
   if (runQuery($sql)){
      linkTo("index.php");
   }

}

function contactDetails(){
   $sql = "SELECT * FROM contacts";
   return fetchAll($sql);
}