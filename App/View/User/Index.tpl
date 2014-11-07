<!DOCTYPE html>
<html>
    <head>
        <title>Welcome 2things - Log in, Sign up and get done!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
        <link href="styles/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/styles/main.css">
        <link rel="stylesheet" href="/styles/index.css">
        <link rel="stylesheet" href="/styles/staticPages.css">
        <script type="text/javascript" src="/js/lib/jquery.min.js"></script>
        <script type="text/javascript" src="/js/lib/angular.js"></script>
        <script type="text/javascript" src="/js/App/App.js"></script>
        <script type="text/javascript" src="/js/App/Controller/User.js"></script>
    </head>
    <body>
        <style>
            .main-container {
                width: inherit;
                max-width: inherit;
                min-width: inherit;
                background: none;
                border:none;
            }
            
            .intro-auth {
                margin: 90px auto;
                position: inherit;
            }
        </style>
        <div class="body">
            <div class="head">
                <div class="logo-container logo-small">
                    <a href="/">
                        <span>2things</span>
                    </a>
                </div>
                <div class="main-navigation">
                    <ul class="inline-menu">
                        <li>
                            <a class="active" href="/static/about"><span>About 2things</span></a>
                        </li>
                        <li>
                            <a href="/static/privacy"><span>Privacy</span></a>
                        </li>
                        <li>
                            <a href="/static/featurelist"><span>Feature list</span></a>
                        </li>
                        <li>
                            <a href="/static/faq"><span>FAQ</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-container">
                <div class="intro-auth" data-ng-app="app" data-ng-controller="UserController">
                    <div class="title-hint"><span>There are just&nbsp;</span><div class="title-logo"></div><span>&nbsp;things...</span></div>
                    <div class="login">
                        <form name="loginForm" id="login-form" class="form" action="/user/login" method="post" data-ng-submit="login.doLogin($event)">
                            <div class="error login-common-error" data-ng-show="login.message.show">{literal} {{ login.message.error }} {/literal}</div>
                            <div class="form-text-field">
                                <input placeholder="Username" type="text" name="username" id="login-username" data-ng-model="login.username">
                            </div>
                            <div class="form-text-field">
                                <input placeholder="Password" type="password" name="password" id="login-password" data-ng-model="login.password">
                            </div>
                            <div class="clear"></div>
                            <div class="form-btn-container">
                                <input class="btn-blue" type="submit" name="login" id="login-submit" value="Log in">
                            </div>
                        </form>
                    </div>
                    <div class="holder-or">
                        <hr />
                        <div class="word-or">or</div>
                    </div>
                    <div class="signup">
                        <form name="signupForm" id="signup-form" action="/user/signup" method="post" data-ng-submit="signup.doSignup($event)">
                            <div class="error" data-ng-show="signup.message.show">{literal} {{ signup.message.error }} {/literal}</div>
                            <div class="form-text-field">
                                <input placeholder="E-mail" type="text" name="email" id="signup-email" data-ng-model="signup.email">
                            </div>
                            <div class="form-text-field">
                                <input placeholder="Username" type="text" name="username" id="signup-username" data-ng-model="signup.username">
                            </div>
                            <div class="form-text-field">
                                <input placeholder="Password" type="password" name="password" id="signup-password" data-ng-model="signup.password">
                            </div>
                            <div class="form-text-field">
                                <input placeholder="Confirm password" type="password" name="passwordRepeat" id="signup-password-repeat" data-ng-model="signup.passwordRepeat">
                            </div>
                            <div class="form-btn-container">
                                <input class="btn-red" type="submit" name="signup" id="signup-submit" value="Sign up. It's free!">
                            </div>
                        </form>
                    </div>
                    <div class="title-hint you-are-done"><span>... and you are done!</span></div>
                </div>
            </div>
        </div>
    </body>
</html>
