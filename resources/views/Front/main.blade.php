<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Laravel| Blog
    </title>
    <link rel="stylesheet" href="{{asset('css/components.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsee.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- CUSTOM STYLE -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/template-style.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/responsee.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body class="size-1140">
<!-- TOP NAV WITH LOGO -->
<header class="margin-bottom">
    <div class="line">
        <nav>
            <div class="top-nav">
                <p class="nav-text"></p>
                <a class="logo" href="index.html">
                    Fashion<span>Blog</span>
                </a>
                <h1>free fashion blog template</h1>
                <ul class="top-ul right">
                    <li>
                        <a href="{{route('main')}}">Home</a>

                    <li>
                        <a href="{{route('Front.archive.index')}}">Archive</a>
                    </li>
                    @foreach($menus as $item)
                        <li>
                            <a>{{$item->title}}</a>
                            @if(count((array)$item->subMenu))

                            <ul>
                                @foreach($item->subMenu as $subitem)
                                    <li>
                                        <a>{{$subitem->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    @endforeach

                    <div class="social right">
                        <a target="_blank" href="https://www.facebook.com/myresponsee">
                            <i class="icon-facebook_circle icon2x"></i>
                        </a>
                        <a target="_blank" href="https://twitter.com/MyResponsee">
                            <i class="icon-twitter_circle icon2x"></i>
                        </a>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- MAIN SECTION -->
@yield('content')
<!-- FOOTER -->
<div class="line">
    <footer>
        <div class="s-12 l-8">
            <p>
                Copyright 2015, Vision Design - graphic zoo<br>
                All images is purchased from Bigstock. Do not use the image in your website.
            </p>
        </div>
        <div class="s-12 l-4">
            <a class="right" href="http://www.myresponsee.com" title="Responsive framework">Design and coding<br>
                by Responsee Team
            </a>
        </div>
    </footer>
</div>
</body>
</html>
