<?php
// konekcija sa bazom
$conn = new mysqli("localhost", "root", "", "angular_crud");
$data = json_decode(file_get_contents("php://input"));

if(count($data) > 0){
    // malo validacije i unos u bazu
    $first_name = mysqli_real_escape_string($conn, $data->firstname);
    $last_name  = mysqli_real_escape_string($conn, $data->lastname);

    $query = "INSERT INTO users(f_name, l_name) VALUES ('$first_name', '$last_name')";

    if($conn->query($query) === TRUE){
        echo "Data Inserted Successfully.";
    }else{
        echo "Error. Pleasse try latter.";
    }
}

?>