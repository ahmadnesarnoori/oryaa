<div role="tabpanel" class="tab-pane" id="settings">
    <form action="offerexchanges" method="POST">
        {{ csrf_field()}}
        <div class="modal-body">
            <div class="from-group">
                <select name="from_currency" class="form-control">
                    @foreach ($balance as $list)
                    <option value="{{ $list->id}}">{{ $list->id}} . {{ $list->currency}} - {{ $list->balance}} </option>
                    @endforeach
                </select>
            </div>
            <ul> &nbsp;&nbsp; </ul>
            <div class="from-group">
                <input placeholder="From Amount" type="number" name="from_amount" class="form-control"></input>
            </div>
            <ul> &nbsp;&nbsp; </ul>
            <div class="from-group">
                <select name="to_currency" class="form-control">
                    @foreach ($currency as $currency)
                    <option value="{{ $currency->id}}">{{ $currency->currency}} . {{ $currency->description}}</option>
                    @endforeach
                </select>
            </div>
            <ul>&nbsp;&nbsp;</ul>
            <div class="from-group">
                <input placeholder="To Amount" name="to_amount" class="form-control"></input>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="login1 btn border btn-light">Offer</btn>
        </div>
    </form>
</div>
                                                            