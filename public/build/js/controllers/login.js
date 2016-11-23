/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('app.controllers')
        .controller('LoginController', ['$scope', '$location', 'OAuth', function ($scope, $location, OAuth) {
                $scope.user = {
                    username: '',
                    password: ''
                };
                
                $scope.error = {
                  message : '',
                  error: false
                };
                $scope.login = function () {
                    if ($scope.form.$valid) {
                        OAuth.getAccessToken($scope.user).then(function () {
                            $location.path('clients');
                        }, function (data) {                                                        
                            $scope.error.error  = true;
                            $scope.error.message = data.data.error_description;
                        });
                    }
                };
            }]);

