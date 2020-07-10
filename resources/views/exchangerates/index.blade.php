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
                          <img src="storage/images/currency/{{ $newsfeed->first_currency}}.png" height="50" width="50">
                        </a>
                      </div>
                      <div class="col-md-auto">
                        <div>
                          <a href="#}">
                            <span style="font-size: 16"> <b>{{ $newsfeed->first_currency}} {{ $newsfeed->currency}} / {{ $newsfeed->second_currency}} USD</b></span>
                          </a>
                          <span><b>{{ $newsfeed->type}}</b></span>
                          <span> Updated {{ \Carbon\Carbon::parse($newsfeed->updated_at)->diffForHumans()}}</span>
                        </div>
                        <div>
                            <span class="text-primary">{{ $newsfeed->rate}}</span>
                            <img src="storage/images/status/{{ $newsfeed->value}}.png" height="10" width="10">
                        </div>
                      </div>
                    </div>
                    <div class="col-2">
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
