<?php

  header('Content-Type: application/json');
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Allow-Header: Access-Control-Allow-Header, Content-Type,Access-Control-Allow-Methods ,Authorization, X-Requested-Width"); 

  $data = json_decode(file_get_contents("php://input"), true);  // true pass associative array

  $student_name =$data['sname'];
  $student_age =$data['sage'];
  $student_city =$data['scity'];



  include("config.php");

  $sql="INSERT INTO user(`name`, `age`, `city`) VALUES('{$student_name}', '{$student_age}', '{$student_city}')";

  if(mysqli_query($link, $sql)){
   echo json_encode(array('message'=>'New Record inserted.', 'status'=>'true'));
  }else{
  	echo json_encode(array('message'=>'No Record Found.', 'status'=>'false'));
  }

?>