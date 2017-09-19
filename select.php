<?php
require_once("config.php");
// Prazan niz
$output = array();
// Utimam sve iz baze
$query  = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($query);
// Ako postoji podataka u bazi
if($result->num_rows > 0){
    while($row = $result->fetch_array()){
        $output[] = $row;
    }
    echo json_encode($output);
}
$conn->close();
?>