/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('app.controllers')
        .controller('ClientListController', ['$scope','Client', function ($scope, Client) {                
                $scope.clients = Client.query();
            }]);

