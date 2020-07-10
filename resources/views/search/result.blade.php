@extends('layouts.home')
@section('content')
@foreach($details as $detail)
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
              <a href="profile-{{ $detail->id}}">
                <img  class="profile-image" src="storage/images/newsfeeds/{{ $detail->image}}" height="50" width="50">
              </a>
            </div>
            <div class="col-md-auto">
              <div>
                <a href="profile-{{ $detail->id}}">
                  <span style="font-size: 16"> <b>{{ $detail->first_name}} {{ $detail->last_name}}</b></span>
                </a>
                <span>{{ \Carbon\Carbon::parse($detail->created_at)->diffForHumans()}}</span>
                <img src="storage/images/status/{{ $detail->status}}.png" height="13" width="10">
              </div>
              <div>
                  <span class="text-primary">{{ $detail->country}}</span>
                  <span class="text-secondary">{{ $detail->phone_number}}</span>
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
    {{ $details->links()}}
  </div>
</div>
@endsection
