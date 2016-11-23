/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('app.controllers')
        .controller('ClientRemoveController', [
            '$scope','$location','$routeParams', 'Client', 
            function ($scope,$location,$routeParams, Client) {                
                $scope.client = Client.get({id: $routeParams.id});
                
                $scope.remove = function(){
                    $scope.client.$delete().then(function(){
                        $location.path('/clients');
                    });                    
                }                
            }]);

