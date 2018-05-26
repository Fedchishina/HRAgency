@extends('layouts.app')

@section('content')
    <script type="text/javascript">
        var lazyLoadURI = "{{ route('workers-data') }}",
            massLoadURI = "{{ route('workers-mass') }}",
            moveItemURI = "{{ route('workers-move') }}",
            searchItemsURI = "{{ route('workers-search') }}";
    </script>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sticky-top sticky-offset mb-2">

                    <div class="card mb-2">

                        <div class="card-header bg-secondary text-white" id="flname">Preview</div>

                        <div class="card-img-top" id="profile-image">
                            <img src="{{ Storage::url('photos/no-photo.jpg') }}"
                                 alt="Card Image" class="image-photo">
                        </div>

                        <div class="card-body bg-secondary text-white">
                            <p class="card-text"><b>Position: </b><span id="position">-</span></p>
                            <p class="card-text"><b>Salary: </b><span id="salary">-</span></p>
                            <p class="card-text"><b>Start date: </b><span id="date">-</span></p>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header bg-secondary text-light"><b>Search:</b></div>

                        <div class="card-body p-2">

                            <div class="form-group form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" checked id="find-check">Show only
                                    matches</label>
                            </div>

                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for..." id="find-text">
                                <span class="input-group-btn">
                                    <button class="btn btn-outline-secondary ml-1" type="button"
                                            id="btn-find">Go!</button>
                                    <button class="btn btn-outline-secondary" type="button"
                                            id="btn-clear">Clear</button>
                               </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">

                    <div class="card-header bg-secondary text-light"><b>Our human resource:</b></div>

                    <div class="card-body p-0">
                        <div id="tree-container" role="main">
                            <div id="tree"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br/>
        <hr>
    </div>

    <script type="text/javascript" src="{{ asset('js/workersUI.js') }}"></script>
@endsection