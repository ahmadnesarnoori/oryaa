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
              <a href="#">
                <img  class="profile-image" src="storage/images/newsfeeds/{{ $newsfeed->image}}" height="50" width="50">
              </a>
            </div>
            <div class="col-md-auto">
              <div>
                <a href="#">
                  <span style="font-size: 16"> <b>{{ $newsfeed->first_name}} {{ $newsfeed->last_name}}</b></span>
                </a>
                <span>{{ \Carbon\Carbon::parse($newsfeed->created_at)->diffForHumans()}}</span>
              </div>
              <div>
                  <span>
                    <img src="storage/images/currency/{{ $newsfeed->from_currency}}.png" height="20" width="20">
                    {{ $newsfeed->from_amount}}
                    {{ $newsfeed->firstcurrency}}
                  </span>
                   &nbsp;&nbsp;/&nbsp;&nbsp;
                  <span>
                    <img src="storage/images/currency/{{ $newsfeed->to_currency}}.png" height="20" width="20">
                    {{ $newsfeed->to_amount}}
                    {{ $newsfeed->secondcurrency}}
                  </span>
              </div>
            </div>
          </div>
          <div>
            <form action="acceptexchanges" method="POST">

            {{ csrf_field()}}

              <input type="hidden" value="{{ $newsfeed->id}}" name="id"></input>
              <button type="submit" class="btn login border btn-light">Accept</b>
              </button>
              &nbsp;&nbsp;
            </form>
          </div>
        </div>
      </div>
      <ul></ul>
    </div>
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
