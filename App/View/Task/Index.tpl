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
                        <div class="main-actions">
                            <form>
                                <table>
                                    <tr>
                                        <td>
                                            <div class="marker">	
                                                <input type="checkbox" value="None" id="marker" name="check" />
                                                <label for="marker"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="set-done">
                                                <button><i class="fa fa-check"></i>Set as done</button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cancel">
                                                <button><i class="fa fa-close"></i>Cancel</button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="add-new">
                                                <button><i class="fa fa-plus"></i>Add new</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="widget-filter">
                            <form>
                                <i class="fa fa-search"></i>
                                <input type="text" placeholder="Search...">
                            </form>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="widget-body">
                        <ul class="task-list">
                            {foreach $tasks as $task}
                            <li>
                                <div class="task-checkbox">
                                    <div class="checker">
                                        <input type="checkbox" value="None" id="{$task['id']}" name="check" />
                                        <label for="{$task['id']}"></label>
                                    </div>
                                </div>
                                <div class="task-title">
                                    <span class="task-title-sp">{$task['title']}</span>
                                </div>
                                <div class="task-config">
                                    <div class="task-config-btn btn-group">
                                        <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                    <a href="#">
                                                    <i class="fa fa-check"></i> Complete </a>
                                            </li>
                                            <li>
                                                    <a href="#">
                                                    <i class="fa fa-pencil"></i> Edit </a>
                                            </li>
                                            <li>
                                                    <a href="#">
                                                    <i class="fa fa-trash-o"></i> Cancel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <p class="task-additional-info"><span>Created at 10 Nov 2014, 23:14.</span>&nbsp;<span>By&nbsp;<a href="#">Gevorg Makaryan</a></span></p>
                                <div class="clear"></div>
                            </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
