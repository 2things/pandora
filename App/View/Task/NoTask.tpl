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
        <script type="text/javascript" src="/js/App/App.js"></script>
        <script type="text/javascript" src="/js/App/Controller/Task.js"></script>
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
                <div class="left-menu">
                    <ul>
                        <li class="left-menu-toggle">
                            <a href="#"><i class="fa fa-list"></i></a>
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-tasks"></i><span>Daily Tasks</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-text"></i><span>My Notes</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-newspaper-o"></i><span>My Stories</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i><span>My Messages</span></a>
                        </li>
                    </ul>
                </div>
                <div class="main-content">
                    <div class="widget-header">
                        <div class="widget-title"><span>Tasks</span></div>
                        <div class="privacy-message"><i class="fa fa-lock"></i><span>Only you can see your daily tasks.</span></div>
                    </div>
                    <div class="clear"></div>
                    <div class="widget-action-bar">
                        <div>You have no task yet.</div>
                        <div class="add-new" data-ng-app="app" data-ng-controller="TaskController">
                            <div class="error" data-ng-show="message.show">{literal} {{ message.error }} {/literal}</div>
                            <button data-ng-click="addTask.show = true"><i class="fa fa-plus"></i>Add new</button>
                            <div class="new-task-input" data-ng-show="addTask.show">
                                <input type="text" name="task" value="" data-ng-model="addTask.taskTitle" data-ng-keypress="addTask.pressToAdd($event)">
                                <button data-ng-click="addTask.clickToAdd()">Add</button>
                            </div>
                            <div class="task-list">
                                <ul>
                                    <li data-ng-repeat="task in taskList | orderBy:'-created_date'">
                                        {literal}{{ task }}{/literal}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="widget-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
