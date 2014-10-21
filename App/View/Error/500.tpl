<!DOCTYPE html>
<html>
    <head>
        <title>404 Page not found</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex, follow">
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
                {if !$isAuthorized}
                <div class="joinus-link">
                    <a href="/#signup-anchor">Join us</a>
                </div>
                {/if}
            </div>
            <div class="main-container">
                <div class="error500title">
                    <span>Whoops! I am sorry, but some error occurred. Don't worry our group of crazy developers will soon fix it.</span>
                </div>
                <div class="error500subtitle">
                    <table>
                        <tr>
                            <td>
                                <span class="number500">500</span>
                            </td>
                            <td>
                                <span>Server internal error</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="error500description">
                    <p>Why we see this error?</p>
                    <p>
                        The 500 Internal Server Error is a very general HTTP (Hypertext Transfer Protocol) status code that means something has gone wrong on the web site's server but the server could not be more specific on what the exact problem is. Most of the time, "gone wrong" means an issue with the page or site's programming, nothing you have anything to do with.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
