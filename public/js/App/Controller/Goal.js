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
        $scope.goalTitle = '';
        $scope.selectedCategories = [];
        
        $scope.getCategories = function () {
            if (!$scope.goalTitle) {
                return false;
            }
            
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
        
        $scope.fillSelectedCategory = function (categoryId, isCategorySelected) {
            var i = --categoryId;
            if (!$scope.categories[i]) {
                return false;
            }
            
            if (isCategorySelected) {
                $scope.selectedCategories.push($scope.categories[i]);
            } else {
                $scope.selectedCategories.splice(i, 1);
            }
        };
        
        $scope.postGoal = function () {
                        
            $http({
                method: 'POST',
                url: '/goal/post',
                data: {
                    'title': $scope.goalTitle,
                    'categories': $scope.selectedCategories,
                }
            }).success(function (response) {
                
            }).error(function (data, status) {
                window.location.href = '/error/error500';
            });
        };       
        
}]);