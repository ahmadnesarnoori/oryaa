@extends('layouts.profile')

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
                <span>{{ number_format( $newsfeed->balance, 2) }}</span>
                <span><b>USD</b></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <ul></ul>
  </div>
</div>
@endforeach
<ul></ul>

<div class="row">
  <div class="col-md-4 col-md-offset-4">
    {{ $newsfeeds->links()}}
  </div>
</div>

@endsection
