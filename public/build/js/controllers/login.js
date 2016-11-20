/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('app.controllers')
        .controller('LoginController',['$scope','$location','OAuth', function($scope,$location,OAuth){                
            $scope.user = {                            
                username : '',
                password : ''
            };
            $scope.login = function(){                     
               OAuth.getAccessToken($scope.user).then(function(){
                   $location.path('home');
               },function(){
                   alert('Login invalido');
               }); 
            };
        }]);

