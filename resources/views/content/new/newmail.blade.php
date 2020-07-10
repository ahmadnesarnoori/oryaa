<div role="tabpanel" class="tab-pane" id="prodserv">
    <form action="journalentries" method="POST">
        {{ csrf_field()}}
        <div class="modal-body">
            <span>Debit Account</span>
            <ul style="font-size: 3px">&nbsp;&nbsp;</ul>
            <div class="from-group">
                <select required placeholder="Is it an expenses, an asset or a loan?" type="number" name="debit" class="form-control">
                    @foreach ($account as $account1)
                    <option value="{{ $account1->id}}">{{ $account1->id}} . {{ $account1->account}}</option>
                    @endforeach
                </select>
            </div>
            <ul>&nbsp;&nbsp;</ul>
            <span>Credit Account</span>
            <ul style="font-size: 3px">&nbsp;&nbsp;</ul>
            <div class="from-group">
                <select required placeholder="Is it an expenses, an asset or a loan?" type="number" name="credit" class="form-control">
                    @foreach ($account as $account2)
                    <option value="{{ $account2->id}}">{{ $account2->id}} . {{ $account2->account}}</option>
                    @endforeach
                </select>
            </div>
            <ul> &nbsp;&nbsp; </ul>
            <div class="from-group">
                <select required name="currency" class="form-control">
                    @foreach ($currency as $currency1)
                    <option value="{{ $currency1->id}}">{{ $currency1->id}} . {{ $currency1->currency}}</option>
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
            <button type="submit" class="login1 btn btn-light border">Post</button>
        </div>
    </form>
</div>