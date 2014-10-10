<!DOCTYPE HTML>
<html>
    {$htmlHead}
    <body>
        <script type="text/javascript" src="/js/User.js"></script>
        <form name="login-form" id="login-form" action="/user/login" method="post" onsubmit="User.login(); return false;">
            <div class="error"></div>
            username: <input type="text" name="username" id="login-username">
            <br>
            password: <input type="password" name="password" id="login-password">
            <br>
            <input type="submit" name="login" id="login-submit">
        </form>
        <form name="signup-form" id="signup-form" action="/user/signup" method="post" onsubmit="User.signup(); return false;">
            <div class="error"></div>
            e-mail: <input type="text" name="email" id="signup-email">
            <br>
            username: <input type="text" name="username" id="signup-username">
            <br>
            password: <input type="password" name="password" id="signup-password">
            <br>
            password repeat: <input type="password" name="password-repeat" id="signup-password-repeat">
            <br>
            <input type="submit" name="signup" id="signup-submit">
        </form>
	{$htmlFooter}		
    </body>
</html>