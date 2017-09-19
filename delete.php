<?php
require_once("config.php");
// data sa index strane
$data = json_decode(file_get_contents("php://input"));

if(count($data) > 0){
    // stavljam u promenljivu id iz objekta
    $id = $data->id;
    // query ka bazi za delete po id-u - i stavljam limit 1
    $query = "DELETE FROM users WHERE id = '$id' LIMIT 1";
    if($conn->query($query) === true){
        echo "User deleted Successfully!";
    }
    else{
        echo "Error. Please try latter!";
    }
}
$conn->close();
?>