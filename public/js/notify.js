function showModalNotify(vType, vText) {
    switch (vType) {
        case 0:
            $("#myModalNotifyHeader").addClass("alert-success");
            $("#myModalNotifyButton").addClass("btn-outline-success");
            $("#myModalNotifyTitle").html("Success");
            break;
        case 1:
            $("#myModalNotifyHeader").addClass("alert-danger");
            $("#myModalNotifyButton").addClass("btn-outline-danger");
            $("#myModalNotifyTitle").html("Error");
            break;
        default:
            $("#myModalNotifyHeader").addClass("alert-info");
            $("#myModalNotifyButton").addClass("btn-outline-info");
            $("#myModalNotifyTitle").html("Information");
    }

    $("#myModalNotifyBody").html(vText);

    $("#myModalNotify").modal();

    $("#myModalNotify").on('hide.bs.modal', function () {
        $("#myModalNotifyHeader").removeClass("alert-info")
            .removeClass("alert-success")
            .removeClass("alert-danger");

        $("#myModalNotifyButton").removeClass("btn-outline-success")
            .removeClass("btn-outline-info")
            .removeClass("btn-outline-danger");
    });
}