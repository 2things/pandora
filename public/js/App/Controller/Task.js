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
app.controller('TaskController', ['$scope', '$http', function($scope, $http) {
        $scope.message = {
            'show': false,
            'error': ''
        },
        
        $scope.taskList = [];
        
        $scope.addTask = {
            'show': false,
            
            'taskTitle': '',
            
            
            'http': {
                'method': 'POST',
                'url': '/task/ajaxaddtask',
            },
            
            'pressToAdd': function (event) {
                if (event.charCode != 13) {
                    return;
                }
                if (!$scope.addTask.taskTitle) {
                    return;
                }
                
                $scope.addTask.add($scope.addTask.taskTitle, function () {
                    $scope.taskList.push($scope.addTask.taskTitle);
                    $scope.addTask.taskTitle = '';
                });
            },
            
            'clickToAdd': function () {
                if (!$scope.addTask.taskTitle) {
                    return;
                }
                
                $scope.addTask.add($scope.addTask.taskTitle, function () {
                    $scope.taskList.push($scope.addTask.taskTitle);
                    $scope.addTask.taskTitle = '';
                });
            },
            
            'add': function (taskTitle, callback) {
                $http({
                    method: $scope.addTask.http.method,
                    url: $scope.addTask.http.url,
                    data: {
                        'tasktitle': taskTitle
                    }
                }).success(function (response) {
                    if (response.status == -1) {
                        $scope.message.error = response.html;
                        $scope.message.show = true;
                    } else if (response.status == 1) {
                        callback();
                    }
                }).error(function (data, status) {
                    window.location.href = '/error/error500';
                });
            }
        }
}]);