<?php
// Konekcija
$conn   = new mysqli("localhost", "root", "", "angular_crud");
// Prazan niz
$output = array();
// Utimam sve iz baze
$query  = "SELECT * FROM users";
$result = $conn->query($query);
// Ako postoji podataka u bazi
if($result->num_rows > 0){
    while($row = $result->fetch_array()){
        $output[] = $row;
    }
    echo json_encode($output);
}

?>