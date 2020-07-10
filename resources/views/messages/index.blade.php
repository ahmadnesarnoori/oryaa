@extends('layouts.home')

@section('content')

@foreach($newsfeeds as $newsfeed)
  <div class="border-bottom rounded panel panel-default bg-white">
    <div class="container  col panel-heading">
      <div>

        <div class="bg-white cols">
        &nbsp;&nbsp;
        </div>

        <div class="row">
          <div class="row col">
            <div class="col-sm-auto border-right">
              <a href="message-{{ $newsfeed->person_id}}">
                <img  class="profile-image" src="storage/images/newsfeeds/{{ $newsfeed->image}}" height="50" width="50">
              </a>
            </div>
            <div class="col-md-auto">
              <div>
                <a href="message-{{ $newsfeed->person_id}}">
                  <span style="font-size: 16"> <b>{{ $newsfeed->first_name}} {{ $newsfeed->last_name}}</b></span>
                </a>
                <span>{{ \Carbon\Carbon::parse($newsfeed->created_at)->diffForHumans()}}</span>
                <span>{{ $newsfeed->type}}</span>
              </div>
            </div>
          </div>

          <div class="col-1">
            <div class="dropleft">
                <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Copy post link</a>
                <a class="dropdown-item" href="#">Mute @<span>{{ $newsfeed->name}}</span></a>
                <a class="dropdown-item" href="#">Unfollow @<span>{{ $newsfeed->name}}</span></a>
                <a class="dropdown-item" href="#">Block @<span>{{ $newsfeed->name}}</span></a>
                <a class="dropdown-item" href="#">Report Post</a>
                <a class="dropdown-item" href="#">Show less often</a>
                <a class="dropdown-item" href="#">New Post</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class=" col panel-body">
        <b style="font-size: 4px">&nbsp;</b>
        <p class="font-weight-light">{{ $newsfeed->description }}</p>
        <ul></ul>
        <img class="rounded" src="storage/images/posts/{{ $newsfeed->file}}" height="300" width="525"
        onerror="this.style.display='none'">
        <ul></ul>
    </div>
    <ul></ul>
  </div>
@endforeach
<ul></ul>

<div class="row">
  <div class="col-md-4 col-md-offset-4">
    {{ $newsfeeds->links()}}
  </div>
</div>

@endsection
