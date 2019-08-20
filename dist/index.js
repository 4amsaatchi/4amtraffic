var app = angular.module('myApp', []);

app.controller('customersCtrl', function($scope, $http){
  $http.get("conexion.php")
  .then(function (response) {$scope.clientes = response.data.records;})
});