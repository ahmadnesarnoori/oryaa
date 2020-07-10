@extends('layouts.profile')

@section('content')


<div class="bg-white">
  <span>&nbsp;</span>
  <div class="row container">
    <div class="col-sm">
      <h5>Account</h5>
    </div>
    <div class="col-sm text-right">
      <h5>Balance</h5>
    </div>
  </div>
  @foreach($newsfeed as $newsfeed)
    <div class="container" style="font-size: 15px;">
      <ul></ul>
          <div class="row">
            <div class="col-sm">
              <a href="#">
                {{ $newsfeed->account_number}} . {{$newsfeed->account}}
              </a>
            </div>
            <div class="col-sm text-right">
              {{ number_format( $newsfeed->balance, 2) }}
            </div>
          </div>
      <ul></ul>
    </div>
  @endforeach
  <ul>&nbsp;</ul>
</div>

@endsection
