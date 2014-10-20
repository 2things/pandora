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
        <link rel="stylesheet" href="/styles/staticPages.css">
        <script type="text/javascript" src="/js/lib/jquery.min.js"></script>
    </head>
    <body>
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
                {if !$isAuthorized}
                <div class="joinus-link">
                    <a href="/#signup-anchor">Join us</a>
                </div>
                {/if}
            </div>
            <div class="main-container">
                
                
            </div>
        </div>
    </body>
</html>
