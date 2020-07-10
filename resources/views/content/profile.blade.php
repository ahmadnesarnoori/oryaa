<div class="row align-self-start">
    <div class="bg-white">

        <a href="image">
          <div class="containerr">
            <img src="storage/images/cover/{{ Auth::user()->file}}" width="320"></img>
            <button class="btnn btn-light login1 rounded"><b>CHANGE</b></button>
          </div>
          <div class="col">
              <div class="text-dark align-self-start">
                  <div>
                      <ul></ul>
                      <img class=" border playOverlay profile-image" src="storage/images/profile/{{ Auth::user()->image}}" height="90" width="90"></img>
                  </div>
              </div>
          </div>
        </a>

        <div class="row">
          <div class="col">

          </div>
          <div class="col col-8 text-dark">
            <h5><b>{{ Auth::user()->first_name}}</b> {{ Auth::user()->last_name}}</h5>
            <a href="profile"><b>@</b>{{ Auth::user()->name}}</a>
            <ul></ul>
          </div>
        </div>


        <div class="row">
          <div class="col text-center">
            <div>
              <a class="nav-link row active" href="following">
              <b>Following</b>
              </a>
            </div>
            <div class="border-right">
              @foreach ($following as $following)
              {{ $following->following}}
              @endforeach
            </div>

          </div>
          <div class="col text-center">
            <div>
              <a class="nav-link row active" href="followers">
              <b>Followers</b>
              </a>
            </div>
            <div >
              @foreach ($followers as $followers)
              {{ $followers->followers}}
              @endforeach
            </div>
          </div>
          <div class="col text-center">
            <div>
              <a class="nav-link row active" href="posts">
              <b>Posts</b>
              </a>
            </div>
            <div class="border-left">
              @foreach ($posts as $posts)
              {{ $posts->posts}}
              @endforeach
            </div>
          </div>
        </div>

        <ul></ul>
        @include ('content.reports')
        @include ('content.information')
        <div>&nbsp;&nbsp;</div>
    </div>
</div>
