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
        
        $scope.selectedTasks = [];
        
        $scope.isMarked = false;
        
        $scope.toggleMarkAll = function () {
            if ($scope.isMarked == true) {
                $scope.isMarked = false;
                $scope.selectedTasks = [];
            } else {
                $scope.isMarked = true;
                $scope.selectedTasks = $scope.taskList;
            }
        };
        
        $scope.getTasks = function (dbOffset) {
            $http({
                method: 'POST',
                url: '/task/ajaxloadmoretasks',
                data: {
                    'dboffset': dbOffset
                }
            }).success(function (response) {
                if (response.status == -1) {
                    $scope.message.error = response.html;
                    $scope.message.show = true;
                } else if (response.status == 1) {
                    $scope.taskList = response.data;
                }
            }).error(function (data, status) {
                window.location.href = '/error/error500';
            });
        };
        
        $scope.setAsDone = {
            'http': {
                'method': 'POST',
                'url': '/task/ajaxsetasdone',
            },
            
            'clickToSetAsDone': function () {
                if ($scope.selectedTasks.length < 1) {
                    return;
                }
                $http({
                    method: $scope.setAsDone.http.method,
                    url: $scope.setAsDone.http.url,
                    data: {
                        'tasks': $scope.selectedTasks
                    }
                }).success(function (response) {
                    if (response.status == -1) {
                        $scope.message.error = response.html;
                        $scope.message.show = true;
                    } else if (response.status == 1) {
                        for (var i in $scope.selectedTasks) {
                            var task = $scope.selectedTasks[i];
                            console.log(task);
                            angular.element('#task-' + task.id + ' .task-title span.task-title-sp').addClass('task-status-1');
                        }
                    }
                }).error(function (data, status) {
                    window.location.href = '/error/error500';
                });
            }
        };
        
        $scope.deleteTasks = {
            'http': {
                'method': 'POST',
                'url': '/task/ajaxdeletetasks',
            },
            
            'clickToDelete': function () {
                $http({
                    method: $scope.deleteTasks.http.method,
                    url: $scope.deleteTasks.http.url,
                    data: {
                        'tasks': $scope.selectedTasks
                    }
                }).success(function (response) {
                    if (response.status == -1) {
                        $scope.message.error = response.html;
                        $scope.message.show = true;
                    } else if (response.status == 1) {
                        window.location.reload();
                    }
                }).error(function (data, status) {
                    window.location.href = '/error/error500';
                });
            }
        };
        
        $scope.addTask = {
            'show': false,
            
            'taskTitle': '',
            
            'showTextField': false,
            
            'http': {
                'method': 'POST',
                'url': '/task/ajaxaddtask',
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
                
                $scope.addTask.add($scope.addTask.taskTitle, function ($task, $scope) {
                    $scope.taskList.push($task);
                    $scope.addTask.taskTitle = '';
                });
            },
            
            'clickToAdd': function () {
                if (!$scope.addTask.taskTitle) {
                    return;
                }
                
                $scope.addTask.add($scope.addTask.taskTitle, function ($task, $scope) {
                    $scope.taskList.push($task);
                    $scope.addTask.taskTitle = '';
                });
            },
            
            'toggleAddTask': function () {
                if (!$scope.addTask.showTextField) {
                    $scope.addTask.showTextField = !$scope.addTask.showTextField;
                    return;
                }
                return $scope.addTask.clickToAdd();
            },
            
//            'edit': function (taskTitle) {
//                $http({
//                    method: $scope.addTask.http.method,
//                    url: $scope.addTask.http.editTaskAjaxUrl,
//                    data: {
//                        'tasktitle': taskTitle
//                    }
//                }).success(function (response) {
//                    if (response.status == -1) {
//                        $scope.message.error = response.html;
//                        $scope.message.show = true;
//                    } else if (response.status == 1) {
//                        callback();
//                    }
//                }).error(function (data, status) {
//                    window.location.href = '/error/error500';
//                });
//            },
            
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
                        callback(response.data, $scope);
                    }
                }).error(function (data, status) {
                    window.location.href = '/error/error500';
                });
            }
        }
}]);