@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Interim Staffing</h2>
                <img src="{{ asset("img\content\staffing.jpg") }}" class="rounded" width="75%">
                <br/>
                <p>We are a recognized leader in the provision of temporary administrative
                    and interim professional resources for the public and not-for-profit
                    sectors. Each year we place hundreds of temporary administrative,
                    financial, project and clerical staff with our clients throughout
                    the GTA and the province to help them seamlessly fulfill their HR
                    needs. We also recruit and place highly experienced interim professionals
                    to work with our clients with more specialized needs.</p>
                <p>Our clients benefit from our rigorous internal screening process,
                    ensuring that they receive highly skilled candidates that meet their
                    specific needs. Regardless of the length of the assignment we take
                    the time to ensure that you have the right person on the job.</p>
                <p>Our interim staffing team is responsible for the candidate and all
                    aspects of employment, leaving our clients the time to concentrate
                    on their business goals. We manage payroll, source deductions,
                    general and professional liability insurance, and security clearances
                    at the federal and provincial government levels, when needed.</p>
                <p>We are a Vendor of Record in a variety of interim staffing areas and
                    a preferred provider for a long list of not for profit organizations.</p>
                <p>We offer recruitment support to a network of clients in such fields
                    as corporate services, healthcare, social services, environmental
                    sciences, education, higher education, government administration,
                    fundraising and community development.</p>
                <p>In the past year, we placed our temporary staff in a number of different positions including:</p>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <button data-toggle="collapse" data-target="#more1"
                                class="btn btn-outline-secondary container-fluid text-dark">
                            <b>Administrative &#8595</b></button>
                        <div id="more1" class="collapse">
                            <br/>
                            <ul>
                                <li>Administrative Assistant</li>
                                <li>Project Assistant</li>
                                <li>File Clerk</li>
                                <li>Accounts Payable Clerk</li>
                                <li>Bilingual Receptionist</li>
                                <li>Procurement Assistant</li>
                                <li>Document Specialist</li>
                                <li>Human Resources Clerk</li>
                                <li>Customer Service Representative</li>
                                <li>Executive Assistant</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <button data-toggle="collapse" data-target="#more2"
                                class="btn btn-outline-secondary container-fluid text-dark">
                            <b>Specialist / Interim professional &#8595</b></button>
                        <div id="more2" class="collapse">
                            <br/>
                            <ul>
                                <li>Interim Executive</li>
                                <li>Financial Analyst</li>
                                <li>Senior Policy Analyst</li>
                                <li>Communications Specialist</li>
                                <li>Project Manager (IT and Business)</li>
                                <li>Facilities Coordinator</li>
                                <li>Business Process Analyst</li>
                                <li>Program Manager</li>
                                <li>Auditor</li>
                                <li>Human Resources Consultant</li>
                                <li>Cost Accountant</li>
                                <li>Programmer Analyst</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection