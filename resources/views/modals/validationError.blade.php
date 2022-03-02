<!-- Validation Error Modal -->
<div class="modal fade" id="validationError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Validation Error</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if ($errors->any())
                @error('classCode')
                    <div class="alert alert-warning" role="alert">
                        <p class="error text-danger" style="font-size: 15px; margin-bottom:0px">{{ $message }}</p>
                    </div>
                @enderror
                @if (count($errors) > 1)
                    <div class="alert alert-warning" role="alert" style=" margin:0px;">
                        <p class="error text-danger" style="font-size: 14px; margin-bottom:0px;">You have some Validation error!</p>
                    </div>
                @endif
            @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
