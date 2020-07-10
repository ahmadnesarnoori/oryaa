@extends('layouts.home')
<style>
.item{position:relative}
img.playOverlay{
   position:absolute;
   top: 90%;
   left: 22%;
   transform: translate(-50%, -65%);
}

</style>
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
                <span><b>{{ $newsfeed->currency}}</b></span>
                <span><b>{{ $newsfeed->amount}}</b></span>
                <span>{{ $newsfeed->type}}</span>
              </div>
              <div>
                <a href="#">
                  <span>{{ $newsfeed->account_number}}</span>
                  <span>{{ $newsfeed->account}}</span>
                   <img  class="img-fluid" alt="Responsive image" src="storage/images/status/{{ $newsfeed->account_number}}.png" height="12" width="10"></imag>
                </a>
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
        <p class="font-weight-light">{{ $newsfeed->description }}</p>
        <ul></ul>
        <img class="rounded" src="storage/images/posts/{{ $newsfeed->file}}" height="300" width="525"
        onerror="this.style.display='none'">
        <ul></ul>
    </div>

    <div>
      <div class="row">
        <div class="col-4">
          <a  class="nav-link active" href="home">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 512 512" fill="none" stroke="currentColor" stroke-width="40"><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"/></svg>
            <!--
            Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
            License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
                        -->
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
            ACCOUNT<span class="sr-only">(current)</span>
          </a>
        </div>

        <div class="col-8">
          <form action="{{ $newsfeed->link}}/{{ $newsfeed->id}}" method="POST">

          {{ method_field('PUT')}}
          {{ csrf_field()}}

            <div class="row">
              <div class="col-8">
                <select required type="number" name="second_account" class="form-control border-white">
                    <option vluae="{{ $newsfeed->said}}">{{ $newsfeed->said}} . {{ $newsfeed->saac}}</option>
                    <option value="10000">10000 . Physical Cash</option>
                    <option value="11000">11000 . Inventory</option>
                    <option value="12000">12000 . Supplies</option>
                    <option value="15000">15000 . Land</option>
                    <option value="16000">16000 . Buildings</option>
                    <option value="17000">17000 . Equipment</option>
                    <option value="18000">18000 . Vehicles</option>
                    <option value="19000">19000 . Furniture & Fixtures</option>
                    <option value="19500">19500 . Accumulated Depreciation</option>
                    <option value="19600">19600 . Intellectual Property</option>
                    <option value="19800">19800 . Goodwill</option>
                    <option value="40000">40000 . Income/Revenue</option>
                    <option value="41000">41000 . Sales</option>
                    <option value="42000">42000 . Fees</option>
                    <option value="43000">43000 . Interest Revenue</option>
                    <option value="44000">44000 . Rent Revenue</option>
                    <option value="45000">45000 . Dividend Revenue</option>
                    <option value="90000">90000 . Other Income</option>
                  </select>
                </div>

                <div class="col-2">
                  <button type="submit" class="login btn btn-link border">Update</button>
                </div>
              </div>
          </form>
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
