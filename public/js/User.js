User = {
    signup: function () {
        $.ajax({
            'type': 'POST',
            'url': '/user/signup',
            'data': {
                'email': $('#signup-email').val(),
                'username': $('#signup-username').val(),
                'password': $('#signup-password').val(),
                'password-repeat': $('#signup-password-repeat').val()
            },
            'success': function (response) {
                if (response.status == -1) {
                    $('#signup-form .error').html(response.html);
                } else if (response.status == 0) {
                    window.location.href = '/feed/daily';
                } else {
                    window.location.href = '/profile/create';
                }
            }
        });
        
        return false;
    },
    
    login: function () {
        $.ajax({
            'type': 'POST',
            'url': '/user/login',
            'data': {
                'username': $('#login-username').val(),
                'password': $('#login-password').val()
            },
            'success': function (response) {
                if (response.status == -1) {
                    $('#login-form .error').html(response.html);
                } else if (response.status == 0 || response.status == 1) {
                    window.location.href = '/feed/daily';
                }
            }
        });
        
        return false;
    }
}