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
               <h3 align="center">AngularJS APP - Insert Data into Mysql Database with PHP</h3>  
               <div ng-app="myapp" ng-controller="usercontroller">  
                    <label>First Name</label>  
                    <input type="text" name="first_name" ng-model="firstname" class="form-control" />  
                    <br />  
                    <label>Last Name</label>  
                    <input type="text" name="last_name" ng-model="lastname" class="form-control" />  
                    <br />  
                    <input type="submit" name="btnInsert" class="btn btn-info" ng-click="insertData()" value="ADD"/>  
               </div>  
          </div>  
     </body>  
</html>  
<script>  
var app = angular.module("myapp",[]);  
app.controller("usercontroller", function($scope, $http){  
     $scope.insertData = function(){  
          $http.post(  
               "insert.php",  
               {'firstname':$scope.firstname, 'lastname':$scope.lastname}  
          ).success(function(data){  
               alert(data);  
               $scope.firstname = null;  
               $scope.lastname = null;  
          });  
     }  
});  
</script>  