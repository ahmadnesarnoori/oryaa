<div class="border-top">
  <ul style="background-color: hsl(200, 20%, 92%); font-size: 5px">&nbsp;</ul>
    <div class="col">
      <h5><b>Trends for you</b> . <a style="font-size: 13px" class="active" href="#"> change </a></h5>
    </div>
    <ul class="nav flex-column">
      @foreach ($hashtag as $hashtag)
        <a class="nav-link active" href="hashtag-{{ $hashtag->heading}}">
          <b>#{{ $hashtag->heading}}</b>
          <span style="font-size: 11px" class="text-muted"> - {{ $hashtag->count}}</span>
        </a>
      @endforeach
  </ul>
</div>
