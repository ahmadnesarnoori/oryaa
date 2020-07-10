@extends('layouts.home')

@section('content')
<div class="bg-white">

    <image src="storage/images/cover/{{ Auth::user()->file}}" width="555">
  <div class="col text-center">
    <ul>&nbsp;</ul>
    <img sizes="{min-width: 20px)" class="border rounded-circle playOverlayprofile" src="storage/images/profile/{{ Auth::user()->image}}"  width="200" height="200">
    <ul>&nbsp;</ul>
    <ul>&nbsp;</ul>
    <ul>&nbsp;</ul>
  </div>
<form method="POST" action="users/{{ Auth::user()->id}}" enctype="multipart/form-data">
  {{ method_field('PUT')}}
  {{ csrf_field() }}
  <div class="col row">
    <div class="col-6">
      <button class="btn btn-link" onclick="document.getElementById('fileID5').click(); return false;" />
      <svg height="30" width="30" viewBox="0 0 512 512" fill="hsl(210, 50%, 50%)" stroke="currentColor" stroke-width="0"><path d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"/></svg>
      <!--
      Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
      License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
      -->

      </button>
      <input required type="file" id="fileID5" name="image" style="visibility: hidden;" />
    </div>
    <div class="col-6 text-right">
      <button type="submit" class="login1 btn btn-light border">Profile</button>
    </div>
  </div>
</form>
<ul></ul>
<form method="POST" action="covers/{{ Auth::user()->id}}" enctype="multipart/form-data">
  {{ method_field('PUT')}}
  {{ csrf_field() }}
  <div class="col row">
    <div class="col-6">
      <button class="btn btn-link" onclick="document.getElementById('fileID6').click(); return false;" />
      <svg height="30" width="30" viewBox="0 0 512 512" fill="hsl(210, 50%, 50%)" stroke="currentColor" stroke-width="0"><path d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"/></svg>
      <!--
      Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
      License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
      -->

      </button>
      <input required type="file" id="fileID6" name="file" style="visibility: hidden;" />
    </div>
    <div class="col-6 text-right">
      <button type="submit" class="login1 btn btn-light border">Cover</button>
    </div>
  </div>
</form>

<ul>&nbsp;</ul>

</div>
@endsection
