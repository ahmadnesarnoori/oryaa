<div role="tabpanel" class="tab-pane" id="profile">
    <div>
        <div>
            <form action="transactions" method="POST" enctype="multipart/form-data">
                {{ csrf_field()}}
                <div class="modal-body">

                    <div class="from-group">
                        <input required type="number" placeholder="To" name="person_id" class="form-control"></input>
                    </div>
                    <ul>&nbsp;&nbsp;</ul>
                    <span>Select an asset or an expense account</span>
                    <ul style="font-size: 3px">&nbsp;&nbsp;</ul>
                    <div class="from-group">
                        <select required type="number" name="debit" class="form-control">
                            @foreach ($aande as $aande1)
                            <option value="{{ $aande1->id}}">{{ $aande1->id}} . {{ $aande1->account}}</option>
                            @endforeach
                        </select>
                    </div>
                    <ul> &nbsp;&nbsp; </ul>
                    <span>Select Loan Account</span>
                    <ul style="font-size: 3px">&nbsp;&nbsp;</ul>
                    <div class="from-group">
                        <select type="number" name="credit" class="form-control">
                            @foreach ($loan as $loan1)
                            <option value="{{ $loan1->id}}">{{ $loan1->id}} . {{ $loan1->account}}</option>
                            @endforeach
                        </select>
                    </div>
                    <ul> &nbsp;&nbsp; </ul>
                    <div class="from-group">
                    <select required placeholder="Currency" name="currency" class="form-control">
                        @foreach ($currency as $currency1)
                        <option value="{{ $currency1->id}}">{{ $currency1->currency}} . {{ $currency1->description}}</option>
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
                    <button class="btn btn-link" onclick="document.getElementById('fileID3').click(); return false;" />
                    <svg height="30" width="30" viewBox="0 0 512 512" fill="hsl(210, 50%, 50%)" stroke="currentColor" stroke-width="0"><path d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"/></svg>
                    <!--
                    Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
                    License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
                    -->

                    </button>
                    <input type="file" id="fileID3" name="file" style="visibility: hidden;" />
                    <button type="submit" class="login1 btn btn-light border">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
