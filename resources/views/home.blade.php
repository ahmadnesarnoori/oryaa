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
                <span>{{ $newsfeed->type}}</span>
                <span><b>{{ $newsfeed->currency}}</b></span>
                <span><b>{{ $newsfeed->amount}}</b></span>
              </div>
              <div>
                <a href="#">
                  <img  class="img-fluid" alt="Responsive image" src="storage/images/status/{{ $newsfeed->account_number}}.png" height="12" width="10" onerror="this.style.display='none'">
                  <span>{{ $newsfeed->account_number}}</span>
                  <span>{{ $newsfeed->account}}</span>
                </a>
                <span>{{ \Carbon\Carbon::parse($newsfeed->created_at)->diffForHumans()}}</span>
              </div>
            </div>
          </div>

          <div class="col-0.1">
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
        <p class="font-weight-light">{{ $newsfeed->description }}</p>
        <img class="rounded" src="storage/images/posts/{{ $newsfeed->file}}"  width="525"
        onerror="this.style.display='none'">
        <ul></ul>
    </div>

    <div>
      <div class="row">
        <div class="col">
          <form action="like" method="POST">
            {{ csrf_field()}}
            <input type="hidden" value="post" name="type"></input>
            <input type="hidden" value="{{ $newsfeed->id}}" name="value"></input>
            <button type="submit" class="btn btn-link">
              <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 512 512" fill="none" stroke="currentColor" stroke-width="40"><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"/></svg>
              <!--
              Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
              License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
                          -->
              <polyline points="9 22 9 12 15 12 15 22"></polyline>
              Like<span class="sr-only">(current)</span>
            </button>
          </form>
        </div>
        <div class="col">
          <a class="nav-link active" data-toggle="modal" href="#newmodell">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 512 512" fill="none" stroke="currentColor" stroke-width="40"><path d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32z"/></svg>
            <!--
            Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
            License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
            -->
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
            Comment<span class="sr-only">(current)</span>
          </a>

          <div class="modal fade" id="newmodell" tabindex="-1" role="dialog" aria-labelledby="newmodell" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="newmodell">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <a class="nav-link" href="home">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 512 512"
            fill="hsl(200, 60%, 50%)" stroke="currentColor" stroke-width="0"><path d="M0 180V56c0-13.3 10.7-24 24-24h124c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H64v84c0 6.6-5.4 12-12 12H12c-6.6 0-12-5.4-12-12zM288 44v40c0 6.6 5.4 12 12 12h84v84c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12V56c0-13.3-10.7-24-24-24H300c-6.6 0-12 5.4-12 12zm148 276h-40c-6.6 0-12 5.4-12 12v84h-84c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h124c13.3 0 24-10.7 24-24V332c0-6.6-5.4-12-12-12zM160 468v-40c0-6.6-5.4-12-12-12H64v-84c0-6.6-5.4-12-12-12H12c-6.6 0-12 5.4-12 12v124c0 13.3 10.7 24 24 24h124c6.6 0 12-5.4 12-12z"/></svg>
            <!--
            Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
            License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
            -->

            View
          </a>
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
