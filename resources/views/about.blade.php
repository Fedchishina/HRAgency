@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>About us</h2>
                <img src="{{ asset('img\content\about.jpg') }}" class="rounded float-right ml-2" width="75%">
                <br/>
                <p>We are a human resources management firm based in Ukraine offering
                    a specialized suite of services to the public and not for profit
                    sectors. Our four divisions (Interim Staffing, HR Consulting, Recruitment
                    and Testing and Assessment) provide our clients with a complimentary
                    suite of service options to meet their specific HR needs.</p>
                <p>As one of the only firms in the industry to be able to offer such
                    a comprehensive package in-house, our clients benefit from our
                    level of expertise and service driven efficiency. With over two
                    decades of experience, we have an impressive record of success
                    ranging from job description writing projects to province wide
                    recruitment process outsourcing. Our team stays at the top of
                    their field by continuously working to improve their skills by
                    keeping current with market trends and updating strategies,
                    models and methods accordingly in such key areas as staffing,
                    project management, organizational design, change management,
                    business transformation and program development. Our team is
                    known for their expertise in such fields as health care, social
                    services, corporate support, environmental sciences,
                    education and charitable operations.</p>

                <button data-toggle="collapse" data-target="#more" class="btn btn-info">More info &#8595</button>

                <div id="more" class="collapse">
                    <br/>
                    <p>By specializing in the public sector, our team possesses unique
                        insight and knowledge on the mechanisms of government including
                        government planning processes, required outcomes and current
                        priorities, objectives and constraints. We have significant
                        experience implementing business and organizational change
                        initiatives in the public service including those involving technological
                        changes. We currently hold several Vendor of Record arrangements.
                        For more information on our VOR’s please click here.</p>
                    <p>Knowing the ins and outs of the public and not for profit sector
                        is what puts us ahead of other firms. It allows us to begin each project
                        with two decades worth of experience, expertise and knowledge in exactly
                        what you do. This saves our clients time and money and is why HR
                        Associates is one of the premier HR management firms in the province.</p>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection