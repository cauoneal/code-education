/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('app.controllers')
        .controller('ClientNewController', [
            '$scope','$location', 'Client', function ($scope,$location, Client) {                
                $scope.client = new Client();
                
                $scope.save = function(){
                    if($scope.form.$valid){
                        $scope.client.$save().then(function(){
                            $location.path('/clients');
                        });
                    }
                }                
            }]);

