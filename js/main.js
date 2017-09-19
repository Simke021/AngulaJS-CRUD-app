var app = angular.module("myapp",[]); 
// Controller
app.controller("usercontroller", function($scope, $http){
    //postavljam value za btn na ADD
    $scope.btnName = "ADD"; 
    // class na success
    $scope.btnClass = "btn btn-success";
    // Insert data into database
    $scope.insertData = function(){  
        // Malo validacije
        if($scope.firstname == null){
            alert("First Name is required!");
        }
        else if($scope.lastname == null){
            alert("Last Name is required!");
        }
        else{
            $http.post(  
                "insert.php",  
                {'firstname':$scope.firstname, 'lastname':$scope.lastname, 'btnName':$scope.btnName, 'id':$scope.id}  
            ).success(function(data){  
                alert(data);  
                $scope.firstname = null;  
                $scope.lastname  = null; 
                $scope.btnName   = "ADD";
                $scope.btnClass  = "btn btn-success";
                $scope.displayData();
            });              
        }
    }  
    // Select all data from Database
    $scope.displayData = function(){
        $http.get("select.php")
        .success(function(data){
            $scope.names = data;
        });
    }
    // Update 
    $scope.updateData = function(id, f_name, l_name){
        $scope.id = id;
        $scope.firstname = f_name;
        $scope.lastname  = l_name;
        // Postavljam btn value na UPDATE
        $scope.btnName = "UPDATE";
        // class na info
        $scope.btnClass = "btn btn-info";

    }
    // Delete
    $scope.deleteData = function(id){
        // Postavljam confirm za brisanje
        if(confirm("Are you sure want to DELETE this user?")){
            // saljem ajax zahtev na server sa id-em - delete.php fajl
            $http.post("delete.php", {'id':id})
            .success(function(data){
                alert(data);
                $scope.displayData();
            });
        }
        else{
            return false;
        }
    }
});  