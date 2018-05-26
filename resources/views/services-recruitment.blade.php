@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Recruitment</h2>
                <img src="{{ asset("img/content/recruitment.jpg") }}" class="rounded" width="75%">
                <br/>
                <h3>Component Services</h3>
                <p>Clients have the option of acquiring components of the recruitment
                    process to help them reach their project goals. Some of our
                    clients have chosen to acquire assistance with resource intensive
                    and/or time sensitive tasks like job description writing, resume
                    screening and reference checking. We have provided services in
                    every single aspect of the recruitment process; no job is
                    too small or too large. </p>

                <button data-toggle="collapse" data-target="#more" class="btn btn-info">Full service recruitment
                    &#8595
                </button>

                <div id="more" class="collapse">
                    <br/>
                    <p>Our full service recruitment services are a cost effective
                        alternative to traditional contingency or executive search
                        services. Typical recruitment exercises involve 2 or more
                        vacancies for professional or management level positions and
                        clients experience a cost savings ranging upwards of 50%.</p>
                    <p>We manage the recruitment process and strategically involve
                        you as clients to ensure that at the end of the process,
                        you have exactly who you were looking for. You still retain
                        control with the advantage of our extensive recruitment
                        expertise, resources and network.</p>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection