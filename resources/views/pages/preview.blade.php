{{--{{$image->path}}--}}
@extends('master')


@section('content')
<div class="container">
    <div class="row">

        <div class="col-xs-12 col-md-4 col-md-offset-4 text-center">
            <img class="" src="{{asset('storage/images/'.$image->path)}}" alt="">
            {{--<div class="previevImg" style="background-image: url({{asset('storage/images/'.$image->path)}})"></div>--}}
        </div>
        <div class="fixed-bottom controlPanel">
            <div class="position-relative">
                <div class="submitBlock">
                    <a class="btn btn-custom" style="padding-top: 35px;" href="{{asset('storage/images/'.$image->path)}}" download="{{$image->path}}">Download</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection