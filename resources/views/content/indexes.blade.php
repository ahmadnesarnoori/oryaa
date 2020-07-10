<div class="">
    <div class="row bg-white">
        <div class="col">
          <ul></ul>
            <spna><a href="watchlist"> WATCH LIST</a></span>
          <ul></ul>
        </div>
    </div>
</div>
  <div class="bg-white">
  @foreach ($index as $index)
  <div class="row bg-white">
      <div class="col">
        <div>

          <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="storage/images/indexes/{{ $index->id}}.png" height="45" width="45">

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Add New</a>
                <a class="dropdown-item" href="watchlist">View All</a>
                <a class="dropdown-item" href="#">News related to {{ $index->name}}</a>
            </div>
          </a>
        </div>
      </div>
      <div>
          <div class="col text-right">
              <a href="#">
                <b>
                <span>{{ $index->name}}</span>
                <span>{{ $index->value}}</span>
                </b>
              </a>
          </div>
          <div class="col text-right">
              <span>{{ $index->percentage}}%</span> <img src="storage/images/status/{{ $index->status}}.png" height="10" width="10">
          </div>
      </div>
  </div>
  @endforeach
</div>
<div class="">
    <div class="row bg-white">
        <div class="col">
          <ul></ul>
            <div class="border-top"></div>
            <ul></ul>
            <a href="indexes">View indexes</a>
          <ul></ul>
        </div>
    </div>
</div>

<ul></ul>
@include('content.oryaa')
</div>
