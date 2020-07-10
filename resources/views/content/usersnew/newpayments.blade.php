<div role="tabpanel" class="tab-pane active" id="home">
    <form action="payments" method="POST" enctype="multipart/form-data">
        {{ csrf_field()}}
        <div class="modal-body">

            @foreach ($users as $u)
            <input type="hidden" value="{{ $u->id}}" name="person_id"></input>
            @endforeach

            <span>Select an asset or an expense account</span>
            <ul style="font-size: 3px">&nbsp;&nbsp;</ul>
            <div class="from-group">
                <select required type="number" name="account" class="form-control">
                    @foreach ($aande as $aande)
                    <option value="{{ $aande->id}}">{{ $aande->id}} . {{ $aande->account}}</option>
                    @endforeach
                    @foreach ($loan as $loan)
                    <option value="{{ $loan->id}}">{{ $loan->id}} . {{ $loan->account}}</option>
                    @endforeach
                </select>
            </div>
            <ul> &nbsp;&nbsp; </ul>
            <div class="from-group">
                <select required placeholder="Currency" name="currency" class="form-control">
                    @foreach ($balance as $list)
                    <option value="{{ $list->id}}">{{ $list->id}} . {{ $list->currency}} - {{ $list->balance}} </option>
                    @endforeach
                </select>
            </div>
            <ul>&nbsp;&nbsp;</ul>
            <div class="from-group">
                <input required type="number" placeholder="Amount" name="amount" class="form-control"></input>
            </div>
            <ul>&nbsp;&nbsp;</ul>
            <div class="from-group">
                <textarea placeholder="Description" name="description" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-link" onclick="document.getElementById('fileID2').click(); return false;" />
            <svg height="30" width="30" viewBox="0 0 512 512" fill="hsl(210, 50%, 50%)" stroke="currentColor" stroke-width="0"><path d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"/></svg>
            <!--
            Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
            License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
            -->

            </button>
            <input type="file" id="fileID2" name="file" style="visibility: hidden;" />
            <button type="submit" class="login1 btn btn-light border">Transfer</button>
        </div>
    </form>
</div>
