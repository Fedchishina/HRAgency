$(document).ready(function () {
    /**
     *  Ajax pre-setup for all requests
     **/
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: "JSON",
    });

    /**
     *  Make table and editor instance for Comments tab
     **/
    var editorComments = new $.fn.dataTable.Editor({
        ajax: commentChangeURI,
        table: "#myTableComments",
        idSrc: 'id',
        fields: [{label: "Name:", name: "name"},
            {label: "E-Mail:", name: "email"},
            {label: "Comment", name: "comment"},
            {
                label: "Moderated:", name: "moderated",
                type: "checkbox",
                options: [{label: "True", value: 1}],
                unselectedValue: 0
            },
        ]
    });

    /**
     * Set comment moderated for current record
     **/
    function setCommentModerated(id) {
        $.ajax({
            type: "GET",
            url: setCommentModeratedURI,
            timeout: 5000,
            data: {"id": id},
            success: function (data) {
                showModalNotify(0, 'Record marked as (not) moderated successfuly.');
                $('#myTableComments').DataTable().ajax.reload().button(3).enable(false);
                ;
            },
        });
    }

    /**
     * Make instace of Comments datatable
     */
    $('#myTableComments').DataTable({
        dom: "<'row'<'col-md-6'B><'col-md-6'f>>" +
        "<'row'<'col-md-12'tr>>" +
        "<'row'<'col-md-6'l><'col-md-6'p>>" +
        "<'row'<'col-md-6'i>>",
        select: true,
        responsive: true,
        serverSide: true,
        ajax: {
            url: lazyRouteURIComments,
            type: "POST",
        },
        buttons: [
            {extend: "create", editor: editorComments},
            {extend: "edit", editor: editorComments},
            {extend: "remove", editor: editorComments},
            {
                text: 'Mark as (not) moderated',
                enabled: false,
                action: function (e, dt, node, config) {
                    var rowData = $('#myTableComments').DataTable().row({selected: true}).data();
                    setCommentModerated(rowData.id);
                }
            }
        ],
        columnDefs: [
            {"className": "text-left", "targets": "_all"}
        ],
        columns: [
            {data: 'name', editField: "myTableComments.name"},
            {data: 'email', editField: "myTableComments.email"},
            {data: 'comment', editField: "myTableComments.comment"},
            {
                data: "moderated",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<input type="checkbox" class="editor-input" disabled>';
                    }
                    return data;
                },
                className: "text-center"
            },
            {data: 'created_at'},
        ],
        rowCallback: function (row, data) {
            $('input.editor-input', row).prop('checked', data.moderated == 1);
        }
    }).on('select deselect', function () {
        var table = $('#myTableComments').DataTable();
        var selectedRows = table.rows({selected: true}).count();
        table.button(3).enable(selectedRows > 0);
    });

    /**
     * Ajax request to server for mark contact request as completed
     * @param id
     */
    function setContactCompleted(id) {
        $.ajax({
            type: "GET",
            url: setContactCompletedURI,
            timeout: 5000,
            data: {"id": id},
            success: function (data) {
                showModalNotify(0, 'Record marked as (not) completed successfuly.');
                $('#myTableContacts').DataTable().ajax.reload().button(6).enable(false);
            },
        });
    }

    /**
     * Make table and editor for Contact request tab
     **/
    var editorContacts = new $.fn.dataTable.Editor({
        ajax: contactsChangeURI,
        table: "#myTableContacts",
        idSrc: 'id',
        fields: [
            {
                label: "Complete:", name: "complete",
                type: "checkbox",
                options: [{label: "True", value: 1}],
                unselectedValue: 0
            },
            {label: "Name:", name: "name"},
            {label: "E-Mail:", name: "email"},
            {label: "Phone:", name: "phone"},
            {label: "Text:", name: "text"}]
    });

    $('#myTableContacts').DataTable({
        dom: "<'row'<'col-md-6'B><'col-md-6'f>>" +
        "<'row'<'col-md-12'tr>>" +
        "<'row'<'col-md-6'l><'col-md-6'p>>" +
        "<'row'<'col-md-6'i>>",
        select: true,
        responsive: true,
        serverSide: true,
        ajax: {
            url: lazyRouteURIContacts,
            type: "POST",
        },
        buttons: [
            {extend: "create", editor: editorContacts},
            {extend: "edit", editor: editorContacts},
            {extend: "remove", editor: editorContacts}, 'copyHtml5', 'pdf', 'print',
            {
                text: 'Mark as (not) completed',
                enabled: false,
                action: function (e, dt, node, config) {
                    var rowData = $('#myTableContacts').DataTable().row({selected: true}).data();
                    setContactCompleted(rowData.id);
                }
            }
        ],
        columnDefs: [{"className": "text-left", "targets": "_all"}],
        columns: [
            {
                data: "complete",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<input type="checkbox" class="editor-input" disabled>';
                    }
                    return data;
                },
                className: "text-center"
            },
            {data: 'name'},
            {data: 'email'},
            {data: 'phone'},
            {data: 'text'},
            {data: 'created_at'}
        ],
        rowCallback: function (row, data) {
            $('input.editor-input', row).prop('checked', data.complete == 1);
        }
    }).on('select deselect', function () {
        var table = $('#myTableContacts').DataTable();
        var selectedRows = table.rows({selected: true}).count();
        table.button(6).enable(selectedRows > 0);
    });


    /* Make table instance and editor for Workers tab */
    var editorWorkers = new $.fn.dataTable.Editor({
        ajax: workersChangeURI,
        table: "#myTableWorkers",
        idSrc: 'id',
        fields: [
            {label: "Parent:", name: "parent"},
            {label: "First name:", name: "first_name"},
            {label: "Last name:", name: "last_name"},
            {
                type: "select",
                label: "Salary:",
                name: "salary_id",
                options: aSalarys,
                optionsPair: {
                    label: 'position_salary',
                    value: 'id'
                }
            },
            {
                label: "Is manager:", name: "children",
                type: "checkbox",
                options: [{label: "True", value: 1}],
                unselectedValue: 0
            },
            {
                label: "Photo:",
                name: "image_id",
                type: "upload",
                display: function (image_id) {
                    return '<img src="' + editorWorkers.file('files', image_id).web_path + '"/>';
                },
                clearText: "Clear",
                noImageText: 'No image'
            }
        ]
    });

    var tableWorkers = $('#myTableWorkers').DataTable({
        dom: "<'row'<'col-6'B><'col-6'f>>" +
        "<'row'<'col-12'tr>>" +
        "<'row'<'col-md-6'l><'col-md-6'p>>" +
        "<'row'<'col-md-6'i>>",
        select: true,
        //responsive: true,
        serverSide: true,
        deferLoading: true,
        ajax: {
            url: lazyRouteURIWorkers,
            type: "POST",
        },
        buttons: [
            {extend: "create", editor: editorWorkers},
            {extend: "edit", editor: editorWorkers},
            {extend: "remove", editor: editorWorkers}, 'pdf'
        ],
        columns: [
            {
                data: 'id',
                //orderable: false,
            },
            {data: 'parent'},
            {data: 'first_name'},
            {data: 'last_name'},
            {data: 'position'},
            {data: 'salary'},
            {
                data: 'children',
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<input type="checkbox" class="editor-input" disabled>';
                    }
                    return data;
                },
                className: "text-center"
            },
            {data: 'created_at'},
            {
                data: "image_id",
                orderable: false,
                render: function ( file_id ) {
                    return file_id ?
                        '<img src="' + editorWorkers.file( 'files', file_id ).web_path + '" class="img-thumbnail"/>' :
                        null;
                },
                defaultContent: "No image",
            }
        ],
        rowCallback: function (row, data) {
            $('input.editor-input', row).prop('checked', data.children == 1);
        }
    });

    /**
     * Make editor and table instance datatable for Salary
     **/
    var editorSalary = new $.fn.dataTable.Editor({
        ajax: salaryChangeURI,
        table: "#myTableSalary",
        idSrc: 'id',
        fields: [
            {label: "Position:", name: "position"},
            {label: "Salary:", name: "salary"},
        ]
    });

    $('#myTableSalary').DataTable({
        dom: "<'row'<'col-md-6'B><'col-md-6'f>>" +
        "<'row'<'col-md-12'tr>>" +
        "<'row'<'col-md-6'l><'col-md-6'p>>" +
        "<'row'<'col-md-6'i>>",
        select: true,
        responsive: true,
        serverSide: true,
        ajax: {
            url: lazyRouteURISalary,
            type: "POST",
        },
        buttons: [{extend: "create", editor: editorSalary}, {extend: "edit", editor: editorSalary},
            'pdf', 'print'],
        columnDefs: [{"className": "text-left", "targets": "_all"}],
        columns: [
            {data: 'id'},
            {data: 'position'},
            {data: 'salary'},
            {data: 'created_at'}
        ]
    });

    /**
     * Change password AJAX request and dialog
     **/
    $('#changePassword').on("click", function () {
        $.ajax({
            type: "POST",
            url: changePasswordURI,
            timeout: 10000,
            data: {
                "old-password": $('#old-password').val(),
                "new-password": $('#new-password').val(),
                "new-password-confirm": $('#new-password-confirm').val(),
            },
            success: function (data) {
                if (data.error != undefined) {

                    var result = "<ul>";

                    for (var key in data.error) {
                        result += "<li>" + data.error[key] + "</li>";
                    }

                    result += "</ul>";

                    showModalNotify(1, result);
                } else {
                    showModalNotify(0, 'Password chaged successfuly.');
                }
            },

        });
    });
});
