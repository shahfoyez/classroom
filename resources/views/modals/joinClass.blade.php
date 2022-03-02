<!-- Modal Join Class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form method="post" action="/joinClass">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        Join Class
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- @if ($errors->any())
                <div class="alert alert-warning" role="alert" style=" margin:0px;">
                    <p class="error text-danger" style="font-size: 14px; margin-bottom:0px;">You have some Validation error!</p>
                </div>
                @endif --}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInput">Class Code</label>
                        <input type="text" class="form-control" name="classCode" id="exampleInput" placeholder="Enter Class Code">
                        <small id="Help" class="form-text text-muted">Ask your teacher for the class code, then enter it here.</small>
                    </div>
                    <h5>
                        To sign in with a class code
                    </h5>
                    <ul>
                        <li>Use an authorized account</li>
                        <li>Use a class code with no spaces or symbols</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Join Classroom</button>
                </div>
            </div>
        </form>
    </div>
</div>
