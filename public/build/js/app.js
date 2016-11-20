/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = angular.module('app', ['ngRoute','angular-oauth2', 'app.controllers']);

angular.module('app.controllers', ['angular-oauth2']);

app.config(['$routeProvider','OAuthProvider', function($routeProvider,OAuthProvider) {
    $routeProvider
            .when('/login', {
                templateUrl: 'build/views/login.html',
                contorller: 'LoginController'
            })
            .when('/home', {
                templateUrl: 'build/views/home.html',
                contorller: 'HomeController'
            });        
    OAuthProvider.configure({
      baseUrl: 'http://localhost:8000',
      clientId: 'app',
      clientSecret: 'secret', // optional
      grant_path: 'oauth/access_token'
    });
  }]);
  
app.run(['$rootScope', '$window', 'OAuth', function($rootScope, $window, OAuth) {
        
    $rootScope.$on('oauth:error', function(event, rejection) {
      // Ignore `invalid_grant` error - should be catched on `LoginController`.
      if ('invalid_grant' === rejection.data.error) {
        return;
      }

      // Refresh token when a `invalid_token` error occurs.
      if ('invalid_token' === rejection.data.error) {
        return OAuth.getRefreshToken();
      }
      console.log(rejection.data.error);
      // Redirect to `/login` with the `error_reason`.
      return $window.location.href = '/login?error_reason=' + rejection.data.error;
    });
  }]);
