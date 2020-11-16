@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://instagram.fkul15-1.fna.fbcdn.net/v/t51.2885-19/s320x320/36136463_485984398505401_8031418354793185280_n.jpg?_nc_ht=instagram.fkul15-1.fna.fbcdn.net&_nc_ohc=gquW1aRSjVgAX_y1-LM&_nc_tp=25&oh=4242395fe0060c6fc328d773624972f7&oe=5FD908E4" class="rounded-circle mw-100" alt="">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>192</strong> followers</div>
                <div class="pr-5"><strong>187</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description ?? 'N/A' }}</div>
            <div><a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a></div>
        </div>
    </div>    

    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pt-4">
            <a href="/p/show/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
