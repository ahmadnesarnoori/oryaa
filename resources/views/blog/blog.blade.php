@extends('layouts.blog')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col-12">
      <div class="col ">
          <div class="col">
              <div class="row">

                @foreach ($blog as $blog)
                <div>
                  <div class="card" style="width: 22rem;">
                    <a href="#">
                      <img class="card-img-top" src="storage/images/blog/{{ $blog->file}}" alt="Card image cap">
                      <div class="card-header p-3 mb-2 bg-primary text-white">
                        <h5 class="card-title text-uppercase">{{ $blog->heading}}</h5>
                      </div>
                    </a>
                    <div class="card-body">
                      <p class="card-text">{{ $blog->abstract}} <a href="#">read more</a></p>
                    </div>
                  </div>
                </div>
                &nbsp;&nbsp;
                @endforeach
              </div>
              <ul>&nbsp;</ul>
          </div>
            <div class="container">
              <div class="row p-3 mb-2 bg-secondary text-white rounded">

                <div class="card col-sm border">
                  <div class="card-header p-3 mb-2 bg-primary text-white">
                    <h4>NEWS</h4>
                  </div>
                  <div class="card-body">
                  <b>
                    @foreach ( $news as $news)
                    <a href="#"><h6 class="border-bottom" style="color: black"><b>{{ $news->heading}}</b></h6></a>
                    @endforeach
                  </b>
                  </div>
                </div>

                <div class="card col-sm border">
                  <div class="card-header p-3 mb-2 bg-primary text-white">
                    <h4>MARKET</h4>
                  </div>
                  <div class="card-body">
                  <b>
                    @foreach ( $market as $market)
                    <a href="#"><h6 class="border-bottom" style="color: black"><b>{{ $market->heading}}</b></h6></a>
                    @endforeach
                  </b>
                  </div>
                </div>

                <div class="card col-sm border">
                  <div class="card-header p-3 mb-2 bg-primary text-white">
                    <h4>TECHNOLOGY</h4>
                  </div>
                  <div class="card-body">
                  <b>
                    @foreach ( $tech as $tech)
                    <a href="#"><h6 class="border-bottom" style="color: black"><b>{{ $tech->heading}}</b></h6></a>
                    @endforeach
                  </b>
                  </div>
                </div>

              </div>
            </div>

          <ul>&nbsp;</ul>

          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="bg-white">
              <h3 class="border-bottom">Latest events</h3>

              <div class="col">
                <div class="row text-left">

                  <div class="col border-left border-right">
                    <div class="text-left">
                      <span><b class="text-monospace" style="font-size: 22"><a href="#"> Nove 1</a></b></span>
                      <p><i style="font-size: 20">2019</i></p>
                    </div>
                  </div>

                                    <div class="col border-left border-right">
                    <div class="text-left">
                      <span><b class="text-monospace" style="font-size: 22"><a href="#"> Nove 1</a></b></span>
                      <p><i style="font-size: 20">2019</i></p>
                    </div>
                  </div>                  <div class="col border-left border-right">
                    <div class="text-left">
                      <span><b class="text-monospace" style="font-size: 22"><a href="#"> Nove 1</a></b></span>
                      <p><i style="font-size: 20">2019</i></p>
                    </div>
                  </div>                  <div class="col border-left border-right">
                    <div class="text-left">
                      <span><b class="text-monospace" style="font-size: 22"><a href="#"> Nove 1</a></b></span>
                      <p><i style="font-size: 20">2019</i></p>
                    </div>
                  </div>                  <div class="col border-left border-right">
                    <div class="text-left">
                      <span><b class="text-monospace" style="font-size: 22"><a href="#"> Nove 1</a></b></span>
                      <p><i style="font-size: 20">2019</i></p>
                    </div>
                  </div>                  <div class="col border-left border-right">
                    <div class="text-left">
                      <span><b class="text-monospace" style="font-size: 22"><a href="#"> Nove 1</a></b></span>
                      <p><i style="font-size: 20">2019</i></p>
                    </div>
                  </div>                  <div class="col border-left border-right">
                    <div class="text-left">
                      <span><b class="text-monospace" style="font-size: 22"><a href="#"> Nove 1</a></b></span>
                      <p><i style="font-size: 20">2019</i></p>
                    </div>
                  </div>                  <div class="col border-left border-right">
                    <div class="text-left">
                      <span><b class="text-monospace" style="font-size: 22"><a href="#"> Nove 1</a></b></span>
                      <p><i style="font-size: 20">2019</i></p>
                    </div>
                  </div>                  <div class="col border-left border-right">
                    <div class="text-left">
                      <span><b class="text-monospace" style="font-size: 22"><a href="#"> Nove 1</a></b></span>
                      <p><i style="font-size: 20">2019</i></p>
                    </div>
                  </div>                  <div class="col border-left border-right">
                    <div class="text-left">
                      <span><b class="text-monospace" style="font-size: 22"><a href="#"> Nove 1</a></b></span>
                      <p><i style="font-size: 20">2019</i></p>
                    </div>
                  </div>                  <div class="col border-left border-right">
                    <div class="text-left">
                      <span><b class="text-monospace" style="font-size: 22"><a href="#"> Nove 1</a></b></span>
                      <p><i style="font-size: 20">2019</i></p>
                    </div>
                  </div>                  <div class="col border-left border-right">
                    <div class="text-left">
                      <span><b class="text-monospace" style="font-size: 22"><a href="#"> Nove 1</a></b></span>
                      <p><i style="font-size: 20">2019</i></p>
                    </div>
                  </div>

                </div>
              </div>

            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-90" src="storage/images/blog/blog.jpg" alt="First slide">
              </div>
            </div>
            <ul>&nbsp;</ul>
            <ul>&nbsp;</ul>

            <div class="col">
              <div class="row">

                @foreach ($more as $more)
                <div>
                  <div class="card" style="width: 22rem;">
                    <div class="card-header">
                      <h5 class="card-title text-uppercase"><b>{{ $more->heading}}</b></h5>
                    </div>
                    <div class="card-body">
                      <p class="card-text">{{ $more->abstract}} <a href="#">read more</a></p>
                    </div>
                  </div>
                </div>
                &nbsp;&nbsp;
                @endforeach

              </div>
              <ul>&nbsp;</ul>
              <ul>&nbsp;</ul>
          </div>

          </div>
      </div>
    </div>
    <div class="col">
    </div>
  </div>
</div>

@endsection
