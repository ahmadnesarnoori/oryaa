<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">

  <svg xmlns="http://www.w3.org/2000/svg" height="23" width="30" viewBox="0 0 512 512" fill="none" stroke="currentColor" stroke-width="30">
    <g id="send">
      <polygon points="0,497.25 535.5,267.75 0,38.25 0,216.75 382.5,267.75 0,318.75"/>
    </g>
  </svg>

</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <img class="profile-image" src="storage/images/newsfeeds/{{ Auth::user()->image}}" height="30" width="30">
          <span><h1>&nbsp;&nbsp;</H1></span>
          <h4 class="modal-title" id="exampleModalLabel"><b> Compose new Transaction or Post</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div role="tabpanel">

          <!-- Nav tabs -->
            <div class="col">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <button type="button" class="btn btn-light" href="#home" aria-controls="home" role="tab" data-toggle="tab">
                            Online Payment
                       </button>
                    </li>

                    <li role="presentation">
                        <button type="button" class="btn btn-light" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                            Credit Transaction
                        </button>
                    </li>

                    <li role="presentation">
                        <button type="button" class="btn btn-light" href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
                            Exchange
                        </button>
                    </li>

                    <li role="presentation">
                        <button type="button" class="btn btn-light" href="#prodserv" aria-controls="prodserv" role="tab" data-toggle="tab">
                           J E
                        </Button>
                    </li>

                    <li role="presentation">
                        <button type="button" class="btn btn-light" href="#testing" aria-controls="testing" role="tab" data-toggle="tab">
                            Post
                        </button>
                    </li>

                </ul>
            </div>

            <!-- Tab panes -->
            <div class="tab-content">

                @include('content.new.newpayments')

                @include('content.new.newtransaction')

                @include('content.new.newexchanges')

                @include('content.new.newposts')

                @include('content.new.newmail')

            </div>
        </div>
    </div>
</div>
