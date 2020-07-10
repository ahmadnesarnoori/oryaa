<div class="col-2">
            <div class="row">
              <button class="login btn btn-primary border" data-toggle="modal" href="#newmodel2"> Follow </button>
              &nbsp;&nbsp;
            </div>
              <div class="modal fade" id="newmodel2" tabindex="-1" role="dialog" aria-labelledby="newmodell" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form action="followers" method="POST">
                      {{ csrf_field()}}

                      <div class="modal-header">

                        <h5 class="modal-title" id="newmodell">Follow {{$detail->first_name}} {{$detail->last_name}} as</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" >
                        <input type="hidden" name="person_id" value="{{ $detail->id}}"></input>
                        <select class="form-control" name="type">
                          <option>Customer</option>
                          <option>Vendors</option>
                          <option>Employee</option>
                          <option>Partner</option>
                          <option>Friend</option>
                          <option>Relatives</option>
                          <option>Other</option>
                        </select>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary login border">Follow</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>