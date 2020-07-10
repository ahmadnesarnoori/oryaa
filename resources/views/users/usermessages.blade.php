@extends('layouts.users')
@section('content')

<div class="border-bottom rounded panel panel-default bg-white">
  <div class="bg-white">
    &nbsp;&nbsp;
  </div>
  <form action="messages" method="POST" enctype="multipart/form-data">
    {{ csrf_field()}}
    <div class="modal-body row">
      @foreach ($users as $user)
        <input type="hidden" name="person_id" value="{{ $user->id}}">
        <div class="container">
          <div class="row">
            <div class="col">
              <input placeholder="Write Message" name="message" class="form-control"></input>
            </div>
            <div class="col-md-auto">
              <a  onclick="document.getElementById('fileID9').click(); return false;" />
              <svg height="30" width="30" viewBox="0 0 512 512" fill="hsl(210, 50%, 50%)" stroke="currentColor" stroke-width="0"><path d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"/></svg>
              <!--
              Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
              License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
              -->

              </a>
            </div>
            <div class="col col-lg-2">
              <button class="btn btn-light rounded border">Send</button>
            </div>
          </div>
        </div>
        <input type="file" id="fileID9" name="file" style="visibility: hidden; font-size: 0px" />
      @endforeach
    </div>
  </form>
</div>
<ul></ul>

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
                <img  class="profile-image" src="storage/images/newsfeeds/{{ $newsfeed->image}}" height="30" width="30">
              </a>
            </div>
            <div class="col-md-auto">
              <div>
                <a href="profile-{{ $newsfeed->user_id}}">
                  <span style="font-size: 16"> <b>{{ $newsfeed->first_name}} {{ $newsfeed->last_name}}</b></span>
                </a>
                <span>{{ \Carbon\Carbon::parse($newsfeed->created_at)->diffForHumans()}}</span>
              </div>
            </div>
          </div>

          <div class="col-1">
            <div class="dropleft">
                <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Delete</a>
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="profile-{{ $newsfeed->user_id}}">View Profile</a>
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
        <img class="rounded" src="storage/images/messages/{{ $newsfeed->file}}" width="525"
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
