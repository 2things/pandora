<!DOCTYPE html>
<html>
    <head>
        <title>Welcome 2things - Log in, Sign up and get done!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
        
        <script type="text/javascript" src="/js/lib/jquery.min.js"></script>
        <link rel="stylesheet" href="/styles/timeline/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="/styles/timeline/css/style.css"> <!-- Resource style -->
	<script src="/styles/timeline/js/modernizr.js"></script> <!-- Modernizr -->
        <link rel="stylesheet" href="/styles/main.css">
        <link rel="stylesheet" href="/styles/staticPages.css">
        <link rel="stylesheet" href="/styles/timeline.css">
        <link href="/styles/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                <header>
                    <h1>Responsive Vertical Timeline</h1>
                </header>

                <section id="cd-timeline" class="cd-container">
                    <div class="cd-timeline-block">
                            <div class="cd-timeline-img cd-picture">
                                    <i class="fa fa-picture-o"></i>
                            </div> <!-- cd-timeline-img -->

                            <div class="cd-timeline-content">
                                    <h2>Title of section 1</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                                    <a href="#0" class="cd-read-more">Read more</a>
                                    <span class="cd-date">Jan 14</span>
                            </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->

                    <div class="cd-timeline-block">
                            <div class="cd-timeline-img cd-movie">
                                    <i class="fa fa-video-camera"></i>
                            </div> <!-- cd-timeline-img -->

                            <div class="cd-timeline-content">
                                    <h2>Title of section 2</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p>
                                    <a href="#0" class="cd-read-more">Read more</a>
                                    <span class="cd-date">Jan 18</span>
                            </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->

                    <div class="cd-timeline-block">
                            <div class="cd-timeline-img cd-picture">
                                    <i class="fa fa-picture-o"></i>
                            </div> <!-- cd-timeline-img -->

                            <div class="cd-timeline-content">
                                    <h2>Title of section 3</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p>
                                    <a href="#0" class="cd-read-more">Read more</a>
                                    <span class="cd-date">Jan 24</span>
                            </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->

                    <div class="cd-timeline-block">
                            <div class="cd-timeline-img cd-location">
                                    <i class="fa fa-location-arrow"></i>
                            </div> <!-- cd-timeline-img -->

                            <div class="cd-timeline-content">
                                    <h2>Title of section 4</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                                    <a href="#0" class="cd-read-more">Read more</a>
                                    <span class="cd-date">Feb 14</span>
                            </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->

                    <div class="cd-timeline-block">
                            <div class="cd-timeline-img cd-location">
                                    <i class="fa fa-location-arrow"></i>
                            </div> <!-- cd-timeline-img -->

                            <div class="cd-timeline-content">
                                    <h2>Title of section 5</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>
                                    <a href="#0" class="cd-read-more">Read more</a>
                                    <span class="cd-date">Feb 18</span>
                            </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->

                    <div class="cd-timeline-block">
                            <div class="cd-timeline-img cd-movie">
                                    <i class="fa fa-video-camera"></i>
                            </div> <!-- cd-timeline-img -->

                            <div class="cd-timeline-content">
                                    <h2>Final Section</h2>
                                    <p>This is the content of the last section</p>
                                    <span class="cd-date">Feb 26</span>
                            </div> <!-- cd-timeline-content -->
                    </div> <!-- cd-timeline-block -->
                </section> <!-- cd-timeline -->
                
                
                
                
                
                
                <div class='title'>
                    <span class="main-title">Your friend in online world and your truly assistant in real world.</span>
                </div>
                <div class="text-description sub-title">
                    <p>2things is a simple beautiful social networks that, connect people who have the same aim and share the same goals.</p>
                    <p>In this crazy life sometimes it's impossible to get our daily activities done and socialize with friends simultaneously, but now you deserve an online friend, which will help you to do so.</p>
                    <p>Create your daily tasks, share your dreams and goals, follow goals and make your personal wishlist, call friends to help you to reach your goals, socialize with them and get things done! It's simple and possible.</p>
                    <p>Be productive and do things you realy like.</p>
                </div>
        </div>
    </body>
</html>
