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
        <script type="text/javascript" src="/js/lib/jquery.min.js"></script>
        <script type="text/javascript" src="/js/lib/angular.js"></script>
        <script type="text/javascript" src="/js/App/App.js"></script>
        <script type="text/javascript" src="/js/App/Controller/User.js"></script>
    </head>
    <body>
        <style>
            .intro-auth {
                margin-bottom: 0px;
                border-bottom-left-radius: 0px;
                border-bottom-right-radius: 0px;
            }
            
            .intro-auth .main-navigation {
                width: 390px;
                margin: 0 auto;
                font-family: arial;
                overflow: auto;
            }
            
            .intro-auth .main-navigation ul li a {
                font-weight: normal;
            }
        </style>
        <div class="body">
            <div class="main-container">
                <div id="banner"></div>
                <div class="intro-auth">
                    <div class="logo-container">
                        <a href="/">
                            <span>2things</span>
                        </a>
                    </div>
                    <div class='title'>
                        <span class="main-title">Your friend in online world and your truly assistant in real world.</span>
                        <span class="sub-title">Use 2things to make your dreams come true.</span>
                    </div>
                    <div class="clear"></div>
                    <form action='/user' method='get'>
                        <div class="form-btn-container">
                            <input class="btn-blue" type="submit" name="login" id="login-submit" value="Log in">
                        </div>
                        <div class="clear"></div>
                        <div class="holder-or">
                            <hr />
                            <div class="word-or">or</div>
                        </div>
                        <div class="clear"></div>
                        <div class="form-btn-container">
                            <input class="btn-red" type="submit" name="signup" id="signup-submit" value="Sign up. It's free!">
                        </div>
                    </form>
                    <div class="clear"></div>
                    <div class="use-for">
                        <p class="tb">Use 2things to</p>
                        <table>
                            <tr>
                                <td>
                                    <div><i class="fa fa-bookmark-o"></i></div>
                                    <p>Realize your goals</p>
                                </td>
                                <td>
                                    <div><i class="fa fa-list"></i></div>
                                    <p>Get to-dos done</p>
                                </td>
                                <td>
                                    <div><i class="fa fa-calendar-o"></i></div>
                                    <p>Create events</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div><i class="fa fa-user"></i></div>
                                    <p>Find friends</p>
                                </td>
                                <td>
                                    <div><i class="fa fa-bullhorn"></i></div>
                                    <p>Follow goals</p>
                                </td>
                                <td>
                                    <div><i class="fa fa-file-text-o"></i></div>
                                    <p>Make whishlists</p>
                                </td>
                            </tr>
                        </table>
                        <p class="tb">And mach more things you realy like.</p>
                    </div>
                    <div>
                        <div class="main-navigation">
                            <ul class="inline-menu">
                                <li>
                                    <a href="/static/about"><span>About 2things</span></a>
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
                </div>
            </div>
        </div>
    </body>
</html>
