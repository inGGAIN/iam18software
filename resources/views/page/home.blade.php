@extends('template')
@section('content')
<div class="carousel slide" id="slideHome" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#slideHome" data-bs-slide-to="0" aria-label="Slide 1" class="active"></li>
        <li data-bs-target="#slideHome" data-bs-slide-to="1" aria-label="Slide 2"></li>
        <li data-bs-target="#slideHome" data-bs-slide-to="2" aria-label="Slide 3"></li>
        <li data-bs-target="#slideHome" data-bs-slide-to="3" aria-label="Slide 4"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('pictures/slideshow/pict-1.jpg')}}" alt="Slideshow 1" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="{{asset('pictures/slideshow/pict-2.jpg')}}" alt="Slideshow 2" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="{{asset('pictures/slideshow/pict-3.jpg')}}" alt="Slideshow 3" class="d-block w-100">
        </div>
    </div>
    <button data-bs-target="#slideHome" class="carousel-control-prev" type="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button data-bs-target="#slideHome" class="carousel-control-next" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="jumbotron">
    <h1 class="display-4">Welcome to {{ config('app.name') }}</h1>
    <p class="lead">Leading...</p>
    <hr class="my-4">
    <p>Blablalbala....</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Ceck</a>
</div>
<h2>Last Post</h2>
<div class="row">
    @foreach($posts as $post)
    <div class="col-md-4">
        <h4><a href="{{route('post.show', $post)}}">{{$post->title}}</a></h4>
    </div>
    <a href="{{route('post.show', $post)}}">
        <img src="{{$post->picture()}}" alt="Post Image" class="img-fluid">
    </a>
</div>
<div class="">
    {{$post->summary(15)}} ...
</div>
@endforeach

@endsection