var app = angular.module('app', ['ngRoute']);

app.config(['$routeProvider', function ($routeProvider) {
        $routeProvider.
            when('/', {
              templateUrl: '/templates/home.html',
              controller: 'UserController'
            }).
            when('/feed/daily', {
              templateUrl: '/templates/feed/daily.html',
              controller: 'GoalController'
            }).
            otherwise({
              redirectTo: '/'
            });
}]);