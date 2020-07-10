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
              <a href="#">
                <img  class="profile-image" src="storage/images/indexes/{{ $newsfeed->id}}.png" height="50" width="50">
              </a>
            </div>
            <div class="col-md-auto">
              <div>
                <a href="#}">
                  <span style="font-size: 16"> <b>{{ $newsfeed->name}}</b></span>
                </a>
                <span>{{ \Carbon\Carbon::parse($newsfeed->updated_at)->diffForHumans()}}</span>
              </div>
              <div>
                <span class="text-primary">{{ $newsfeed->value}}</span>
                <span class="text-secondary">{{ $newsfeed->percentage}}%</span>
                <img src="storage/images/status/{{ $newsfeed->status}}.png" height="10" width="10">
              </div>
            </div>
          </div>
        <div class="col-3">
          <form action="indexfollowers" method="POST">
            {{ csrf_field()}}
            <input type="hidden" value="{{ $newsfeed->id}}" name="id"></input>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="login btn border btn-light">Add</button>
          </form>
        </div>
      </div>
    </div>
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
