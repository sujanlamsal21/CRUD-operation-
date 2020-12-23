<?php

  header('Content-Type: application/json');
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: PUT");
  header("Access-Control-Allow-Header: Access-Control-Allow-Header, Content-Type,Access-Control-Allow-Methods ,Authorization, X-Requested-Width"); 

  $data = json_decode(file_get_contents("php://input"), true);  // true pass associative array
  
  $student_id =$data['sid'];
  $student_name =$data['sname'];
  $student_age =$data['sage'];
  $student_city =$data['scity'];



  include("config.php");

  $sql="UPDATE user SET `name`='{$student_name}', `age`={$student_age}, `city`='$student_city' WHERE `id`={$student_id}";

  echo $sql;

  if(mysqli_query($link, $sql)){
   echo json_encode(array('message'=>'Record updated.', 'status'=>'true'));
  }else{
  	echo json_encode(array('message'=>'Record is not updated.', 'status'=>'false'));
  }

?>