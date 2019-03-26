<?php
  include '../dbConnection.php';
  
  $conn = getDataBaseConnection();
  
  
  $sql = "SELECT productName, productPrice FROM mp_product ORDER BY productName";
  // $sql = "SELECT * FROM mp_product";
  
  $stmt = $conn->prepare($sql);
  $stmt -> execute();
  $records = $stmt-> fetchAll(PDO::FETCH_ASSOC);
  
  
  
  echo json_encode($records[rand(0,sizeof($records))]);

?>