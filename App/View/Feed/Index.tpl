<script type="text/javascript" src="/js/App/App.js"></script>
<script type="text/javascript" src="/js/App/Controller/Goal.js"></script>
<style>
    .share-goal {
        padding: 10px;
    }
    
    .action-title {
        color: #444;
        font-weight: bold;
    }
    
    .my-goal {
        width: 450px;
        padding: 5px 10px;
        outline: none;
        margin-left: 20px;
        margin-right: 20px;
    }
    
    .add-button {
        background-color: #ab171e;
        border: 1px solid;
        color: #fff;
        padding: 5px 10px;
        outline: none;
        border-bottom-color: #820a0f;
        border-left-color: #9a1015;
        border-right-color: #9a1015;
        border-top-color: #af151b;
    }
    
</style>
<div data-ng-app="app" data-ng-controller="GoalController">
<div class="main-content">
    <div class="share-goal">
        <span class="action-title">I want to:</span>&nbsp;<input data-ng-model="goalTitle" type="text" name="my-goal" class="my-goal"/><button class="add-button" data-ng-click="getCategories()">Add</button>
    </div>
    {literal}
    <div data-ng-show="categories">
        <ul>
            <li data-ng-repeat="category in categories">
                <input type="checkbox" name="category-item"  data-ng-click="fillSelectedCategory(category.id, !isCategorySelected)" data-ng-model="isCategorySelected" value="{{category.id}}" id="category-item-{{category.id}}">
                <label for="category-item-{{category.id}}">{{ category.name }}</label>
            </li>
            <li>
                <button data-ng-click="postGoal()">Post</button>
            </li>
        </ul>
    </div>
    {/literal}
</div>
<div class="main-content">
    
</div>
</div>