@extends('layouts.master')

@section('title', 'Головна')

@section('content')
    <header id="head" class="secondary"></header>
    <!-- Header -->
    <header id="head" style="background: #181015 url({{$text->photo}}) no-repeat; padding-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-sm-offset-4 col-sm-4 col-xs-4 col-xs-offset-4 col-md-4">
                    <img src="/assets/images/logo.gif" class="img-responsive img-circle">
                </div>
            </div>
            <div class="row">
                <h1 class="lead">{{$text->TextTrans('background_title')}}</h1>
                <p class="tagline">{{$text->TextTrans('background_text')}}
                </p>
                <br>
                <p><a class="btn btn-success btn-lg" role="button" href="/register">{{trans('index.register')}}</a>
                    <a class="btn btn-primary btn-lg" role="button" href="/conference/info">{{trans('index.17')}}</a>
                </p>
            </div>
            </div>
        </div>
    </header>
    <!-- Intro -->
    <div class="container text-center">
        <br> <br>
        <h1 class="thin">{{$text->TextTrans('title')}}</h1>
        <p class="text-muted">
            {!! $text->TextTrans('text') !!}
        </p>
    </div>
    <!-- /Intro-->
    <!-- /Header -->
    <div class="jumbotron top-space">
        <div class="jumbotron2">
            <div class="container">
                <h2 class="text-center thin">{{$text->TextTrans('heading')}}</h2>
                <div class="row">
                    @foreach($categoryes as $key=>$category)
                        <div class="col-lg-3 text-center">
                            <img class="img-rounded img-circle" src="{{$category->photo}}"
                                 alt="Generic placeholder image"
                                 width="140"
                                 height="140">
                            <h4>{{$category->TextTrans('title')}}</h4>
                            <p>{{$category->TextTrans('text')}}</p>
                        </div>
                        @if(($key+1)%4 == 0)
                </div>
                <div class="row">
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection