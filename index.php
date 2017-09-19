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
                    <input type="submit" name="btnInsert" class="btn btn-success" ng-click="insertData()" value="ADD"/>  
                    <hr>

                    <h4 class="text-center">All users in Database</h4>
                    <table class="table table-striped">
                        <tr>
                            <th>ID:</th>
                            <th>First Name:</th>
                            <th>Last Name:</th>
                        </tr>
                        <tr ng-repeat="x in names">
                            <td>{{ x.id }}</td>
                            <td>{{ x.f_name }}</td>
                            <td>{{ x.l_name }}</td>
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
        // Insert
        $scope.insertData = function(){  
            $http.post(  
                "insert.php",  
                {'firstname':$scope.firstname, 'lastname':$scope.lastname}  
            ).success(function(data){  
                alert(data);  
                $scope.firstname = null;  
                $scope.lastname = null;  
                $scope.displayData();
            });  
        }  
        // Select
        $scope.displayData = function(){
            $http.get("select.php")
            .success(function(data){
                $scope.names = data;
            });
        }
    });  
</script>  