<!-- Modal Create Class -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <form method="post" action="/createClass" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Create Class</h5>
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
                            <label for="exampleInput">Class Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInput" placeholder="Enter Class Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput">Section</label>
                            <input type="text" name="section" class="form-control" id="exampleInput" placeholder="Enter Class Name">
                        </div>
                        <div class="form-group">
                            <label for="exam">Subject</label>
                            <input type="text" name="subject" class="form-control" id="exam" placeholder="Enter Subject Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Classroom</button>
                    </div>
                </form>
            </div>

    </div>
</div>
