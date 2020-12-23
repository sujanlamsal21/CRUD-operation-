<?php

  header('Content-Type: application/json');
  header("Access-Control-Allow-Origin: *");
  //header("Access-Control-Allow-Methods: GET");
  // header("Access-Control-Allow-Header: access-control-header, content-type, Authentication, verfiaction");

  $data = json_decode(file_get_contents("php://input"), true);  // true pass associative array

  $student_id =$data['sid'];

  include("config.php");

  $sql="SELECT * FROM user where  `id`= {$student_id}";

  $res = mysqli_query($link, $sql) or die("sql connection failed");

  if (mysqli_num_rows($res) > 0) {
  	$output = mysqli_fetch_all($res, MYSQLI_ASSOC);
  	echo json_encode($output);
  }else{
  	echo json_decode(array('message'=>'No Record Found.', 'status'=>'false'));
  }

?>