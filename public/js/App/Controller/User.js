/**
 * UserController working with users
 * 
 * @author Gevorg Makaryan <makaryan.gevorg@gmail.com>
 * 
 * @param ngScope $scope
 * @param ngHttp $http
 * 
 * @return void
 */
app.controller('UserController', ['$scope', '$http', function($scope, $http) {
        /**
         * Login model. Provides options for logging in.
         */
        $scope.login = {
            'username': '',
            'password': '',
            'message': {
                'error': '',
                'show': false
            },
            'http': {
                'method': 'POST',
                'url': 'http://fastphpeplanner/user/login'
            },
            'doLogin': function (event) {
                event.preventDefault();
                var username = $scope.login.username;
                var password = $scope.login.password;
                if (!username || !password) {
                    $scope.login.message.error = 'Username and password are required for signing in. Please provide your username and password.';
                    $scope.login.message.show = true;
                    return;
                }
                
                $scope.login.message.error = '';
                $scope.login.message.show = false;
                
                $http({
                    method: $scope.login.http.method,
                    url: $scope.login.http.url,
                    data: {
                        'username': username,
                        'password': password,
                    }
                }).success(function (response) {
                    console.log(response);
                }).error(function (data, status) {
                    console.log(data);
                    console.log(status);
                });

                return false;
            } 
        };
        
        /**
         * Signup model. Provides options for signing in.
         */
        $scope.signup = {
            'email': '',
            'username': '',
            'password': '',
            'passwordRepeat': '',
            'message': {
                'error': '',
                'show': false
            },
            'http': {
                'method': 'POST',
                'url': 'http://fastphpeplanner/user/signup'
            },
            'doSignup': function (event) {
                event.preventDefault();
                $http({
                    method: $scope.signup.http.method,
                    url: $scope.signup.http.url,
                    data: {
                        'email': $scope.signup.email,
                        'username': $scope.signup.username,
                        'password': $scope.signup.password,
                        'passwordRepeat': $scope.signup.passwordRepeat
                    }
                }).success(function (response) {
                    if (response.status == -1) {
                        $scope.signup.message.error = response.html;
                        $scope.signup.message.show = true;
                    } else if (response.status == 1) {
                        //@todo redirect
                        console.log('redirect');
                    }
                }).error(function (data, status) {
                    console.log(data);
                    console.log(status);
                });
                
                return false;
            }
        }
}]);