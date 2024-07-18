<form class="modal-dialog shadow" action='{{$action}}' method='{{$method}}'>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{$title}}</h5>
        </div>
        <div class="modal-body">
            {{$slot}}
            <!-- <div class="mb-3">
                 <label for="recipient-name" class="col-form-label">Recipient:</label>
                 <input type="text" class="form-control" id="recipient-name">
                 </div>
                 <div class="mb-3">
                 <label for="message-text" class="col-form-label">Message:</label>
                 <textarea class="form-control" id="message-text"></textarea>
                 </div> -->
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Guardar"/>
        </div>
    </div>
</form>
