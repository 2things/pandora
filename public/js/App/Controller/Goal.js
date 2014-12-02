/**
 * TaskController working with users
 * 
 * @author Gevorg Makaryan <makaryan.gevorg@gmail.com>
 * 
 * @param ngScope $scope
 * @param ngHttp $http
 * 
 * @return void
 */
app.controller('GoalController', ['$scope', '$http', function($scope, $http) {
        $scope.categories = [];
        
        $scope.getCategories = function () {
            $http({
                'method': 'POST',
                'url': '/goal/getcategories'
            }).success(function (response) {
                if (response.status == -1) {
                    //TODO show error
                } else {
                    $scope.categories = response.data;
                }
            }).error(function (data, status) {
                window.location.href = '/error/error500';
            });;
        };
        
        $scope.add = function () {
            
        }
}]);