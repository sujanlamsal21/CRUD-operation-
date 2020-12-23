<?php

  header('Content-Type: application/json');
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: DELETE");
  header("Access-Control-Allow-Header: Access-Control-Allow-Header, Content-Type,Access-Control-Allow-Methods ,Authorization, X-Requested-Width"); 

  $data = json_decode(file_get_contents("php://input"), true);  // true pass associative array

  $student_id =$data['sid'];

  include("config.php");

  $sql="DELETE FROM user where  `id`= {$student_id}";

  $res = mysqli_query($link, $sql) or die("sql connection failed");

   if(mysqli_query($link, $sql)){
   echo json_encode(array('message'=>'Record Deleted.', 'status'=>'true'));
  }else{
    echo json_encode(array('message'=>'Record is not deleted.', 'status'=>'false'));
  }

?>