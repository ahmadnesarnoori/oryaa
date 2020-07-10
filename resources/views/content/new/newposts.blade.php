<div role="tabpanel" class="tab-pane" id="testing">
    <form action="posts" method="POST" enctype="multipart/form-data">
        {{ csrf_field()}}
        <div class="modal-body">
            <div class="from-group">
                <textarea rows="5" placeholder="Post" name="content" class="form-control"></textarea>
            </div>
            <ul>&nbsp;</ul>
            <div class="container row">
                <div class="from-group">
                    <select name="type" class="form-control border-0">
                        <option value="">Subject</option>
                        <option>Feeling</option>
                        <option>Hashtag</option>
                        <option>Travaling</option>
                        <option>Reading</option>
                        <Option>Sales</Option>
                        <option>News</option>
                    </select>
                </div>
                <div class="col-7">
                    <input  placeholder="Add heading" name="heading" class="form-control border-0"></input>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-link" onclick="document.getElementById('fileID1').click(); return false;" />
            <svg height="30" width="30" viewBox="0 0 512 512" fill="hsl(210, 50%, 50%)" stroke="currentColor" stroke-width="0"><path d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"/></svg>
            <!--
            Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
            License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
            -->

            </button>
            <input type="file" id="fileID1" name="file" style="visibility: hidden;" />
            <button type="submit" class="btn-light btn border login1">Post</button>
        </div>
    </form>
</div>
