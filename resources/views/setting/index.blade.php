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

          <div class="col">

                        <div class="col-md-auto border-bottom">
              <div>
                  <span style="font-size: 30"><b>Account Setting</b></span>    
              </div>
              <ul></ul>
            </div>

            <div class="col-md-auto border-bottom">
              <ul></ul>
              <div>
                  <span style="font-size: 16"> User Name: <b>{{ $newsfeed->name}}</b></span>    
              </div>
              <ul></ul>
            </div>

            <div class="col-md-auto border-bottom">
              <ul></ul>
              <div>
                  <span style="font-size: 16"> First Name: <b>{{ $newsfeed->first_name}}</b></span>   
              </div>
              <ul></ul>
            </div>

                        <div class="col-md-auto border-bottom">
              <ul></ul>
              <div>
                  <span style="font-size: 16"> Last Name: <b>{{ $newsfeed->last_name}}</b></span>      
              </div>
              <ul></ul>
            </div>

                        <div class="col-md-auto border-bottom">
              <ul></ul>
              <div>
                  <span style="font-size: 16"> Sex: <b>{{ $newsfeed->gender}}</b></span>      
              </div>
              <ul></ul>
            </div>

            <div class="col-md-auto border-bottom">
              <ul></ul>
              <div>

                  <span style="font-size: 16"> Address: <b>{{ $newsfeed->address}}</b></span>
    
              </div>
              <ul></ul>
            </div>

            <div class="col-md-auto border-bottom">
              <ul></ul>
              <div>

                  <span style="font-size: 16"> City: <b>{{ $newsfeed->city}}</b></span>
     
              </div>
              <ul></ul>
            </div>

            <div class="col-md-auto border-bottom">
              <ul></ul>
              <div>

                  <span style="font-size: 16"> Country: <b>{{ $newsfeed->country}}</b></span>
      
              </div>
              <ul></ul>
            </div>

                        <div class="col-md-auto border-bottom">
              <ul></ul>
              <div>

                  <span style="font-size: 16"> Phone Number: <b>{{ $newsfeed->phone_number}}</b></span>
    
              </div>
              <ul></ul>
            </div>

                        <div class="col-md-auto border-bottom">
              <ul></ul>
              <div>

                  <span style="font-size: 16"> Date of Birth: <b>{{ $newsfeed->date_of_birth}}</b></span>
     
              </div>
              <ul></ul>
            </div>

                        <div class="col-md-auto border-bottom">
              <ul></ul>
              <div>

                  <span style="font-size: 16"> Email Address: <b>{{ $newsfeed->email}}</b></span>
     
              </div>
              <ul></ul>
            </div>

                        <div class="col-md-auto border-bottom">
              <ul></ul>
              <div>

                  <span style="font-size: 16"> Verified At: <b>{{ $newsfeed->email_verified_at}}</b></span>
     
              </div>
              <ul></ul>
            </div>

            <div class="col-md-auto border-bottom">
              <ul></ul>
              <div>
                <a href="password/reset">
                  <span style="font-size: 16"> Change Password</b></span>
                </a>       
              </div>
              <ul></ul>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
