@extends('layouts.master')

@section('title', 'Головна')

@section('content')

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">{{trans('index.main')}}</a></li>
            <li class="active">{{trans('index.archive')}}</li>
        </ol>
        <h1 class="thin">{{trans('index.archive')}}</h1>
        @foreach($archives as $archive)
            <div class="jumbotron jumbotron-archive top-space">
                <h2 class="text-center">{{$archive->TextTrans('title')}}</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <img src="{{$archive->photo_thesis}}" class="img-rounded center-block archive-img" alt="{{$archive->TextTrans('title')}}">
                        <br>
                        <p class="text-right"><a class="btn btn-success btn-lg btn-block"
                                                 @if($archive->thesis ==null)disabled="disabled" @endif
                                                 href="{{$archive->thesis}} "
                                                 download>{{trans('conference.downloads')}}</a></p>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{$archive->photo_img}}" class="img-rounded center-block archive-img" alt="{{$archive->TextTrans('title')}}">
                        <br>
                        <p class="text-right"><a class="btn btn-primary btn-lg btn-block"
                                                 @if($archive->img ==null)disabled="disabled" @endif
                                                 href="{{$archive->img}}" @if(!preg_match('/http.*/', $archive->img)) download @endif>{{trans('conference.photo')}}</a></p>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection