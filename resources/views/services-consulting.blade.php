@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Human Resources Consulting Services</h2>
                <img src="{{ asset("img\content\consulting.jpg") }}" class="rounded mb-2" width="75%">
                <br/>
                <p>Our team of consultants have an average of 20 years of experience
                    working in the public and not for profit sectors. These industry
                    specialists use their innovative, practical and results based
                    approaches to optimize efficiency and deliverables to our clients.</p>

                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                <b>+ HR Programs and policies</b>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <p>Our team’s demonstrated results in designing, developing, and
                                    reviewing internal HR programs and policies in such areas as talent
                                    management, employee recognition, recruitment, leadership development,
                                    workforce planning and compensation have allowed our clients to
                                    achieve their operational goals .</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                <b>+ Organizational Effectiveness</b>
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <ul>
                                    <li>
                                        <p><strong>Organizational Design</strong> – Our experienced team has
                                            successfully guided
                                            our clients in structuring/restructuring their organizations, defining
                                            roles and resources, and in effectively achieving business objectives.
                                            Being able to identify, strategize and develop a timely and improved
                                            system requires a high level of expertise, which is why public and not
                                            for profit sector clients continue to choose HR Associates
                                            to help them reach their goals.</p>
                                    </li>
                                    <li>
                                        <p><strong>Change management and culture change</strong> – Over the past two
                                            decades we
                                            have gained the trust of clients across the public and not for profit
                                            sector in developing and executing strategies to transition organizations
                                            into their optimal structure. Our tactical approach results in an
                                            implementable strategy of change, giving our clients a seamless
                                            approach to a new level of efficiency and productivity.</p>
                                    </li>
                                    <li>
                                        <p><strong>Organizational development</strong> – Being able to improve an
                                            organizations
                                            performance through planning, learning, and change management requires
                                            not only strategic vision of an organization’s optimal future, but
                                            also a deep understanding of its past. Our team is equipped with
                                            specialized knowledge and innovative processes to develop effective
                                            and streamlined strategies for our clients.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                <b>+ Project Management</b>
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>Our project management expertise is at the core of
                                    our consulting services. Our methodology is grounded
                                    in our ability to communicate effectively and involve
                                    our clients at every stage of the process and project
                                    to maximize efficiency and results. Our project management
                                    team also specializes in assisting clients in coordinating
                                    the implementation of large scale organizational
                                    transformation projects. In the final stages of all our
                                    projects our clients enjoy a comprehensive knowledge transfer
                                    that leaves them with the right set of tools to maximize
                                    their organizations future.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection