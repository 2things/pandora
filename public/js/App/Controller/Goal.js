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
        $scope.goalList = [];
        
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
                if (response.status == 1) {
                    $scope.categories = [];
                    $scope.goalTitle = '';
                    $scope.selectedCategories = [];

                } else {
                    // show error
                }
                
            }).error(function (data, status) {
                window.location.href = '/error/error500';
            });
        };       
        
        $scope.getGoals = function (offset) {
            $http({
                method: 'POST',
                url: '/goal/getlist',
                data: {
                    'offset': offset
                }
            }).success(function (response) {
                console.log(response);
                if (response.status == 1) {
                    $scope.goalList = response.data;
                }
                
            }).error(function (data, status) {
                window.location.href = '/error/error500';
            });
        }
}]);