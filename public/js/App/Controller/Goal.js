var appGoal = angular.module('Goal', ['ngRoute']);

appGoal.config([$routeProvider, function ($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: '/templates/.html',
        controller: 'PhoneListCtrl'
      }).
      when('/phones/:phoneId', {
        templateUrl: 'partials/phone-detail.html',
        controller: 'PhoneDetailCtrl'
      }).
      otherwise({
        redirectTo: '/phones'
      });
}]);