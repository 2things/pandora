<!DOCTYPE html>
<html>
    <head>
        <title>404 Page not found</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
        <link href="/styles/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/styles/main.css">
        <link rel="stylesheet" href="/styles/feed.css">
        <script type="text/javascript" src="/js/lib/jquery.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        <script type="text/javascript" src="/js/left-menu-effect.js"></script>
        <script type="text/javascript" src="/js/lib/angular.js"></script>
    </head>
    <body>
        <div class="body">
            <div class="head">
                <div class="logo-container logo-small">
                    <a href="/">
                        <span>2things</span>
                    </a>
                </div>
                <div class="search-form-container">
                    <form class="search-form">
                        <input class="search-field" type="text" placeholder="Search">
                        <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="main-container">
                {if !$isHiddenleftMenu}
                <div class="left-menu">
                    <ul>
                        <li class="left-menu-toggle">
                            <a href="#"><i class="fa fa-list"></i></a>
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-tasks"></i><span>Feed</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tasks"></i><span>To-dos</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-text"></i><span>Notes</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-newspaper-o"></i><span>Stories</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i><span>Messages</span></a>
                        </li>
                    </ul>
                </div>
                {/if}
                {if $pageContent}
                {$pageContent}
                {/if}
            </div>
        </div>
    </body>
</html>
