<script type="text/javascript" src="/js/App/App.js"></script>
<script type="text/javascript" src="/js/App/Controller/Task.js"></script>
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
