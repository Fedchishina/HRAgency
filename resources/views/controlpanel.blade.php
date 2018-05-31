@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset("js/datatables.min.css") }}"/>

    <script type="text/javascript">
        var lazyRouteURIComments = "{{ route('comments-lazy') }}",
            lazyRouteURIContacts = "{{ route('contacts-lazy') }}",
            lazyRouteURIWorkers = "{{ route('workers-lazy') }}",
            lazyRouteURISalary = "{{ route('salary-lazy') }}",

            changePasswordURI = "{{ route('changePassword') }}",
            commentChangeURI = "{{ route('actionComment') }}",
            contactsChangeURI = "{{ route('actionContacts') }}",
            workersChangeURI = "{{ route('actionWorkers') }}",
            salaryChangeURI = "{{ route('actionSalary') }}",

            setCommentModeratedURI = "{{ route('setCommentModerated') }}",
            setContactCompletedURI = "{{ route('setContactCompleted') }}",
            getImageURI = "{{ route('getImageLink') }}",

            aSalarys = {!! $salarys !!} ;
    </script>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#commentsTab">Comments</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#contactsTab">Contacts</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="tab" href="#workersTab">Workers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#salaryTab">Salary</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#usersTab">Users control</a>
                    </li>
                </ul>

                <div class="tab-content p-0">
                    <div id="commentsTab" class="container tab-pane active p-0"><br>
                        <table id="myTableComments"
                               class="table table-hover table-sm table-striped table-bordered display"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Comment</th>
                                <th>Moderated</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div id="contactsTab" class="container tab-pane fade p-0"><br>
                        <table id="myTableContacts"
                               class="table table-hover table-sm table-striped table-bordered display"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Complete</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Phone</th>
                                <th>Text</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div id="workersTab" class="container tab-pane fade p-0"><br>
                        <div class="row">
                            <table id="myTableWorkers"
                                   class="table table-hover table-sm table-striped table-bordered display"
                                   style="width:100%;">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Chief</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Position</th>
                                    <th>Salary</th>
                                    <th>Manager</th>
                                    <th>Date</th>
                                    <th>Thumbnail</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Chief</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Position</th>
                                    <th>Salary</th>
                                    <th>Manager</th>
                                    <th>Date</th>
                                    <th>Thumbnail</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div id="salaryTab" class="container tab-pane fade p-0"><br>
                        <table id="myTableSalary"
                               class="table table-hover table-sm table-striped table-bordered display"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Position</th>
                                <th>Salary</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div id="usersTab" class="container tab-pane fade p-0"><br>
                        <div class="col-md-6">
                            <h4>Administrator password control tab</h4>
                            <p>You can change andmin panel user password. Be careful!</p>

                            <div class="card mt-2">
                                <form method="POST">
                                    <div class="card-header bg-secondary text-light"><b>Change administrator
                                            password:</b></div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="old-password">Old password:</label>
                                            <input type="password" class="form-control" id="old-password"
                                                   name="old-password" value="{{ old('old-password') }}"
                                                   placeholder="Enter old password">
                                        </div>

                                        <div class="form-group">
                                            <label for="new-password">New password:</label>
                                            <input type="password" class="form-control" id="new-password"
                                                   name="new-password" value="{{ old('new-password') }}"
                                                   placeholder="Enter new password">
                                        </div>

                                        <div class="form-group">
                                            <label for="new-password-confirm">New password confirmation:</label>
                                            <input type="password" class="form-control" id="new-password-confirm"
                                                   name="new-password-confirm" value="{{ old('new-password-confirm') }}"
                                                   placeholder="Enter new password confirmation">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary" id="changePassword">Change
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <script type="text/javascript" src="{{ asset("js/controlPanelUI.js") }}"></script>
    <script type="text/javascript" src="{{ asset("js/datatables.min.js") }}"></script>
@endsection

@section('content-footer')
@endsection
