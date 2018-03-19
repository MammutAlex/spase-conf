<!DOCTYPE html>
<html lang="{{App::getLocale()}}">
<head>
    <meta charset="utf-8">
    <title> {{trans('index.title')}}- @yield('title')</title>
    <link rel="shortcut icon" href="/assets/images/gt_favicon.png">

    <link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="/assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/chosen.css">
    <meta name="google-site-verification" content="6BTceHoPVXGNUzhZNwM0K4WpvinJIr6xMNGwAfvwVG4"/>
</head>
<body>
<nav class="navbar navbar-inverse headroom  @if(isset($page)) navbar-fixed-top @endif">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navigationbar">

            <ul class="nav navbar-nav">
                <li>
                    <div class="navbar-header">
                        @if(!isset($page))
                            <a class="navbar-brand" href="/">
                                <img src="/assets/images/logo.png" alt="">
                            </a>
                        @endif
                    </div>
                </li>
                <li>
                    <a href="/">{{trans('index.main')}}</a>
                </li>
                <li>
                    <a href="/archive">{{trans('index.archive')}}</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle lead" data-toggle="dropdown"> <b
                                class="caret"></b> {{trans('index.18')}}</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/conference/info">{{trans('master.info')}}</a>
                        </li>
                        <li>
                            <a href="/conference/thesis">{{trans('master.thesis')}}</a>
                        </li>
                        <li>
                            <a href="/conference/place">{{trans('master.place')}}</a>
                        </li>
                        <li>
                            <a href="/conference/committee">{{trans('master.committee')}}</a>
                        </li>
                    </ul>
                </li>
                <li><a href="/contact">{{trans('master.contact')}}</a></li>


                @if(Sentinel::guest())
                    <li><a class="btn" href="/login">{{trans('master.login')}}</a></li>

                @elseif(Sentinel::inRole('user'))
                    <li><a class="btn" href="/home">{{trans('master.home')}}</a></li>
                    @if(Sentinel::inRole('admin'))
                        <li><a class="btn" href="/admin">{{trans('master.admin_panel')}}</a></li>
                    @endif
                @endif

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <b class="caret"></b> {{ Config::get('languages')[App::getLocale()] }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <li>
                                    <a rel="alternate" hreflang="{{$lang}}" href="{{ route('lang.switch', $lang) }}">
                                        {{$language}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>
            @if(!Sentinel::guest())
                @if(Sentinel::inRole('user'))
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout">{{trans('master.logout')}}</a></li>
                    </ul>
                @endif
            @endif
        </div>
    </div>
</nav>

@yield('content')
<footer id="footer" class="top-space">

    <div class="footer1">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-md-offset-2 widget">
                    <h3 class="widget-title">{{trans('master.contacts')}}</h3>
                    <div class="widget-body">
                        {{trans('master.admin')}}
                        <p>
                            <a href="tel:+380445261583">+38 (044) 526-15-83</a><br>
                            <a href="tel:+380502387882">+38 (050) 238-78-82</a><br>
                            <a href="mailto:ukrainianspaceconf@gmail.com">ukrainianspaceconf@gmail.com</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-2 widget">
                    <h3 class="widget-title">{{trans('master.pages')}}</h3>
                    <div class="widget-body">
                        <p class="follow-me-icons">
                            <a href="https://twitter.com/space_conf" target="_blank">
                                <i class="fa fa-twitter fa-2"></i>
                            </a>
                            <a href="https://github.com/MammutAlex/spase-conf" target="_blank">
                                <i class="fa fa-github fa-2"></i>
                            </a>
                            <a href="https://www.facebook.com/ukrainianspaceconf" target="_blank">
                                <i class="fa fa-facebook fa-2"></i>
                            </a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 widget">
                    <div class="widget-body">
                        <p class="text-center">
                            &copy; Copyright 2018. All Right Reserved. By <a href="https://alex-kovalchuk.site" target="_blank">mammut</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="/assets/js/headroom.min.js"></script>
<script src="/assets/js/jQuery.headroom.min.js"></script>
<script src="/assets/js/template.js"></script>
<script src="/assets/js/is.mobile.js"></script>
<script src="/assets/js/script.js"></script>
<script>
    document.onreadystatechange = function () {
        if (document.readyState === "complete") {
            console.log('hello');
            if ($(document).height() <= $(window).height())
                $("footer#footer").addClass("navbar-fixed-bottom");
        }
    }
</script>
</body>
</html>