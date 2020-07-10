<div class="border-top">
  <ul style="background-color: hsl(200, 20%, 92%); font-size: 5px">&nbsp;</ul>
    <div class="col">
      <h5><b>Details</b> . <a style="font-size: 13px" class="active" href="information"> Add </a></h5>
    </div>
    <ul class="nav flex-column">
      @foreach ($info as $information)
        <a class="nav-link active" href="#">
          <b>{{ $information->type}}</b>
          <span style="font-size: 12px" class="text-muted"> - {{ $information->description}}</span>
        </a>
      @endforeach
  </ul>
</div>
