<!DOCTYPE html>  
<!-- index.php !-->  
<html>  
     <head>  
          <title>AngularJS CRUD App</title>  
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <link rel="stylesheet" href="css/style.css"> 
          <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  

     </head>  
     <body>  
          <br /><br />  
          <div class="container" >  
               <h3 class="text-center">AngularJS APP - CRUD with php</h3> 
               <hr> 
               <div ng-app="myapp" ng-controller="usercontroller" ng-init="displayData()">  
                    <label>First Name:</label>  
                    <input type="text" name="first_name" ng-model="firstname" class="form-control" />  
                    <br />  
                    <label>Last Name:</label>  
                    <input type="text" name="last_name" ng-model="lastname" class="form-control" />  
                    <br />  
                    <input type="hidden" ng-model="id">
                    <input type="submit" name="btnInsert" class="{{ btnClass }}" ng-click="insertData()" value="{{ btnName }}"/>  
                    <hr>

                    <h4 class="text-center">All users in Database</h4>
                    <table class="table table-striped">
                        <tr>
                            <th>ID:</th>
                            <th>First Name:</th>
                            <th>Last Name:</th>
                            <th>Update:</th>
                            <th>Delede:</th>
                        </tr>
                        <tr ng-repeat="x in names">
                            <td>{{ x.id }}</td>
                            <td>{{ x.f_name }}</td>
                            <td>{{ x.l_name }}</td>
                            <td><button ng-click="updateData(x.id, x.f_name, x.l_name)" class="btn btn-info btn-xs">Update</button></td>
                            <td><button ng-click="deleteData(x.id)" class="btn btn-danger btn-xs">Delete</button></td>
                        </tr>
                    </table>
                    <hr>
               </div>  
          </div>  
     </body>  
</html>  
<script>  
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
</script>  