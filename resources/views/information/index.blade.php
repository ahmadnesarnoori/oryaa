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


  <div class="border-bottom rounded panel panel-default bg-white">

        <div class="bg-white cols" style="font-size: 5px">
        &nbsp;&nbsp;
        </div>
        <form action="information" method="POST">
        {{ csrf_field()}}
        <div class="modal-body">
            <div class="container row">
                <div class="from-group">
                    <select name="type" class="form-control">
                        <option>Type</option>
                        <option>Phone </option>
                        <option>Home</option>
                        <option>Office</option>
                        <Option>Tel</Option>
                        <option>Fax</option>
                        <option>Email</option>
                        <option>Address</option>
                        <Option>City</Option>
                        <option>State</option>
                        <option>Provance</option>
                        <option>County</option>
                        <option>District</option>
                        <option>ZipCode</option>
                        <Option>Country</Option>
                        <option>Position</option>
                        <option>Department</option>
                        <option>Org</option>
                        <Option>Blade Type</Option>
                        <option>Etcetera</option>
                    </select>
                </div>
                &nbsp;
                <div class="col-md-7 from-group">
                    <input required type="text" placeholder="Text" name="description" class="form-control"></input>
                </div>
                <button class="login btn btn-light border">Save</button>
            </div>
        </div>
    </form>
  </div>

@foreach($newsfeeds as $newsfeed)
  <div class="border-bottom rounded panel panel-default bg-white">
    <div class="container  col panel-heading">
        <div class="bg-white cols">
        &nbsp;&nbsp;
        </div>

        <div class="row">
          <div class="row col">

            <div class="col-sm-auto border-right">
              <a href="#">
                <img  class="profile-image" src="storage/images/icon/{{ $newsfeed->type}}.png" height="50" width="50">
              </a>
            </div>

            <div class="col-md-auto">
              <div>
                <a href="#">
                  <span style="font-size: 16"> <b>{{ $newsfeed->type}}</b></span>
                </a>
                <span><b>{{ $newsfeed->description}}</b></span>
              </div>
            </div>
          </div>

          <div class="col-3">
            <form action="information/{{ $newsfeed->id}}" method="POST">

              {{ method_field('DELETE')}}
              {{ csrf_field()}}
              <input type="hidden" name="id" value="{{ $newsfeed->id}}"></input>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <button type="submit" class="login btn border btn-light">Delete </button>
            </form>
          </div>

        </div>

    </div>
    <ul></ul>
  </div>
@endforeach
<ul></ul>


@endsection
