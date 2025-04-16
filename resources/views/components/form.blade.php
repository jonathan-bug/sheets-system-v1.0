<form class="modal-dialog shadow" action='{{$action}}' method='{{$method}}'>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{$title}}</h5>
        </div>
        <div class="modal-body">
            {{$slot}}
        </div>
        <div class="modal-footer">
            {{$button}}
            <input type="submit" class="btn btn-primary" value="Guardar"/>
        </div>
    </div>
</form>
