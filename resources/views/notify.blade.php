@section('myModalNotify')
<div class="modal fade" id="myModalNotify">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header alert-success py-2" id="myModalNotifyHeader">
                <h4 class="modal-title" id="myModalNotifyTitle"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="myModalNotifyBody"></div>

            <div class="modal-footer py-2">
                <button type="button" class="btn"
                        data-dismiss="modal"
                        id="myModalNotifyButton">Close
                </button>
            </div>
        </div>
    </div>
</div>
    @endsection