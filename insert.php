<?php
require_once("config.php");
$data = json_decode(file_get_contents("php://input"));

if(count($data) > 0){
    // malo validacije i unos u bazu
    $first_name = mysqli_real_escape_string($conn, $data->firstname);
    $last_name  = mysqli_real_escape_string($conn, $data->lastname);
    // btn name stavljam u promenljivu
    $btn_name   = $data->btnName;

    // proveravam da li je button ADD i radim insert u bazu
    if($btn_name === "ADD"){
        $query = "INSERT INTO users(f_name, l_name) VALUES ('$first_name', '$last_name')";

        if($conn->query($query) === TRUE){
            echo "Data Inserted Successfully.";
        }else{
            echo "Error. Pleasse try latter.";
        }
    }

    // proveravam da li je button UPDATE i radim update iz baze
    if($btn_name === "UPDATE"){
        // uzimam id iz forme / hidden polje 
        $id = $data->id;
        // query za update usera po id-u
        $query = "UPDATE users SET f_name = '$first_name', l_name = '$last_name' WHERE id = '$id'";

        if($conn->query($query)){
            echo "Data Successfully Updated.";
        }
        else{
            echo "Error. Please try latter!";
        }

    }   
}
$conn->close();

?>