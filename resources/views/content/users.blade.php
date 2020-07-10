<div class="row align-self-start">
    <div class="bg-white">
      @foreach ($users as $users)
        <a href="#">
          <img src="storage/images/cover/{{ $users->file}}"  width="320"></img>
          <div class="col">
              <div class="text-dark align-self-start">
                  <div>
                      <ul></ul>
                      <img class=" border playOverlay profile-image" src="storage/images/profile/{{ $users->image}}" height="90" width="90"></img>
                  </div>
              </div>
          </div>
        </a>

        <div>
            <div class="container">
                <div class="row">
                    <div class="col col-4">

                    </div>
                    <div class="col col-8 text-dark">
                        <h5><b>{{ $users->first_name}}</b> {{ $users->last_name}}</h5>
                        <a href="#"><b>@</b>{{ $users->name}}</a>
                        <ul></ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col text-center">
            <div>
              <a class="nav-link row active" href="userfollowing-{{ $users->id}}">
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
            <div class="text-center">
              <a class="nav-link row active" href="userfollowers-{{ $users->id}}">
              <b>Followers</b>
              </a>
            </div>
            <div class=" text-center">
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

        @endforeach
        <ul></ul>
        @include ('content.information')
        <div>&nbsp;&nbsp;</div>
    </div>

</div>
