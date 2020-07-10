@extends('layouts.home')
@section('content')
@foreach($newsfeeds as $newsfeed)
<div>
  <div class="border-bottom rounded panel panel-default bg-white">
    <div class="container  col panel-heading">
      <div>

        <div class="bg-white cols">
        &nbsp;&nbsp;
        </div>

        <div class="row">
          <div class="row col">
            <div class="col-sm-auto border-right">
              <a href="profile-{{ $newsfeed->person_id}}">
                <img  class="profile-image" src="storage/images/newsfeeds/{{ $newsfeed->image}}" height="50" width="50">
              </a>
            </div>
            <div class="col-md-auto">
              <div>
                <a href="profile-{{ $newsfeed->person_id}}">
                  <span style="font-size: 16"> <b>{{ $newsfeed->first_name}} {{ $newsfeed->last_name}}</b></span>
                </a>
                <span>{{ \Carbon\Carbon::parse($newsfeed->created_at)->diffForHumans()}}</span>
                <span><b>{{ $newsfeed->type}}</b></span>
                <img src="storage/images/status/{{ $newsfeed->status}}.png" height="13" width="10">
              </div>
              <div>
                  <span class="text-primary">{{ $newsfeed->country}}</span>
                  <span class="text-secondary">{{ $newsfeed->phone_number}}</span>
              </div>
            </div>
          </div>
          <div class="col-2">
              <form class="row" action="followers/{{ $newsfeed->id}}" method="POST">

                {{ method_field('DELETE')}}
                {{ csrf_field()}}
                <input type="hidden" name="id" value="{{ $newsfeed->id}}"></input>
                  <button type="submit" class="login btn btn-light border"> Unfollow &nbsp;&nbsp; </button>&nbsp;&nbsp;&nbsp;
              </form>
          </div>
        </div>
      </div>
    </div>
    <ul></ul>
  </div>
</div>
@endforeach
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    {{ $newsfeeds->links()}}
  </div>
</div>

@endsection
