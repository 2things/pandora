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
                'addTaskAjaxUrl': '/task/ajaxaddtask',
                'editTaskAjaxUrl': '/task/ajaxedittask',
            },
            
            'pressToAdd': function (event) {
                $scope.message.show  = false;
                $scope.message.error = '';
                
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
            
            'edit': function (taskTitle) {
                $http({
                    method: $scope.addTask.http.method,
                    url: $scope.addTask.http.editTaskAjaxUrl,
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
            },
            
            'add': function (taskTitle, callback) {
                $http({
                    method: $scope.addTask.http.method,
                    url: $scope.addTask.http.addTaskAjaxUrl,
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