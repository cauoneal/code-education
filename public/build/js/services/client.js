/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('app.services')
        .service('Client', ['$resource', 'appConfig', function ($resource, appConfig) {
                return $resource(appConfig.baseUrl + '/client/:id',{id:'@id'},{
                    update : {
                        method:'PUT'
                    }
                });
            }]);

