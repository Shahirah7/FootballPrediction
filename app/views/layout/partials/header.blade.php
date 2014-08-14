<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Last Man Standing</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="{{ action('HomeController@showAboutPage') }}">About</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li><a href="{{ action('UserController@login') }}">Login</a></li>
                <li><a href="{{ action('UserController@register') }}">Register</a></li>
            </ul>
        </div>
    </div>
</div>