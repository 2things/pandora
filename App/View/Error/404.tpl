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
                <div class="error404title">
                    <span>Whoops! Sorry I looked everywhere, but could't find this page.</span>
                </div>
                <div class="error404subtitle">
                    <table>
                        <tr>
                            <td>
                                <span class="number404">404</span>
                            </td>
                            <td>
                                <span>Page not found</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="trythisout">
                    <p>Instead try these:</p>
                    <ul class="inline-menu">
                        <li>
                            <a href="#"><span>Discover recent goals</span></a>
                        </li>
                        <li>
                            <a href="#"><span>Read insprational stories</span></a>
                        </li>
                    </ul>
                    <div class="clear"></div>
                    <span class="search-slogan">or search anything you want!</span>
                    <div class="clear"></div>
                    <div class="search-form-container">
                        <form class="search-form">
                            <input class="search-field" type="text" placeholder="Search">
                            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="error404description">
                    <p>Why we see this error?</p>
                    <p>
                        The Error 404 "Page not found" is the error page displayed whenever someone asks for a page that’s simply not available on your site. The reason for this is that there may be a link on your site that was wrong or the page might have been recently removed from the site. As there is no web page to display, the web server sends a page that simply says "404 Page not found".
The 404 error message is an HTTP (Hypertext Transfer Protocol) standard status code. This "Not Found" response code indicates that although the client could communicate to the server, the server could not find what was requested or it was configured not to fulfill the request.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
