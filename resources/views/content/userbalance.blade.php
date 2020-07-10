
<div class="row bg-white">
  <div class="col">
    <ul></ul>
      @foreach ($users as $user)
      <h6>BALANCES - USER ID: {{ $user->id}}</h6>
      @endforeach
    <ul></ul>
  </div>
</div>


@foreach ($balance as $balance)

<div class="row bg-white">
  <div class="col">
      <a href="home">
        <img src="storage/images/currency/{{ $balance->id}}.png" height="45" width="45">
      </a>
  </div>
  <div>
    <div class="col text-right">
      <a href="#">
        <b>
          <span>{{ $balance->currency}}</span>
          <span>{{ $balance->balance}}</span>
        </b>
      </a>
    </div>
    <div class="col text-right">
        <span style="font-size: 14px">{{ $balance->rate}}</span> <img src="storage/images/status/{{ $balance->value}}.png" height="10" width="10"
        onerror="this.style.display='none'">
    </div>
  </div>
</div>
@endforeach
<div class="">
    <div class="row bg-white">
        <div class="col">
            <ul></ul>
              <div class="border-top">
              </div>
              <ul></ul>
              <a href="exchanges">
                Trade Currency
              </a>
              /
              <a href="exchangerates">
                Exchange Rates
              </a>
            <ul></ul>
        </div>
    </div>
</div>
