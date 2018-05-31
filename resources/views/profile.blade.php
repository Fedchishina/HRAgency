@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Developer profile</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card sticky-top sticky-offset mb-2" style="width: 100%">
                    <img class="card-img-top" src="{{ asset('img\content\profile-photo.jpg') }}" alt="Profile photo"
                         style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Sviatoslav Voitenko</h4>
                        <p class="card-text">Programing and software engineer.</p>
                        <a href="{{ route('download', ['fileType' => 'pdf', 'fileName' => 'resume']) }}"
                           class="btn btn-primary">Download more as PDF</a>
                    </div>
                </div>
                <br>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>Programing skills</b></div>
                    <div class="card-body">
                        <h5>The experience of programming is more than 5 years.</h5>
                        <hr>

                        <p>
                        <h5>Knowledge of programming languages:</h5>

                        <ul>
                            <li>С, C++, Pascal, Delphi, Java (Junior), C# (Middle)</li>
                            <li>PHP, HTML5 & CSS (Middle), JavaScript (Middle), ASP.NET (Middle)</li>
                            <li>SQL, Transact-SQL (Middle)</li>
                        </ul>
                        </p>

                        <p>
                        <h5>Datase knowledge:</h5>

                        <ul>
                            <li>MySQL, MariaDB, SQLite, MS SQL (Middle)</li>
                            <li>Oracle (Junior)</li>
                            <li>Firebird, InterBase</li>
                        </ul>
                        </p>

                        <p>
                        <h5>Frameworks and libraries knowledge:</h5>

                        <ul>
                            <li>Laravel (Middle), jQuery (Middle), Bootstrap 4 (Middle)</li>
                            <li>Qt4, Qt5, Dot.Net (Middle)</li>
                        </ul>
                        </p>

                        <p>
                        <h5>Operation systems and other knowledges:</h5>

                        <ul>
                            <li>Debian, Ubuntu, Ubuntu Server, Windows Desktop (Middle)</li>
                            <li>VirtualBox, Docker, LAMP, LNMP</li>
                            <li>SVN, Git, CVS</li>
                            <li>PhpStorm, MS Visual Studio 2014-2016, QtCreator, MySQL Workbench</li>
                        </ul>
                        </p>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header"><b>Contacts</b></div>
                    <div class="card-body">
                        <div class="container">
                            <address><strong>Facebook:</strong><a
                                        href="{{ route('redirect',['where' => 'facebook']) }}"> Sviatoslav Voitenko</a>
                            </address>
                            <address><strong>Phone Number (Vodafone & Viber): </strong>+38 (050) 72-101-72</address>
                            <address><strong>Phone Number (Pheonix): </strong>+38 (071) 427-11-43</address>
                            <address><strong>Skype: </strong>By Vodafone phone number or e-mail</address>
                            <address><strong>Email: </strong><a href="mailto:sviatoslav.voitenko@gmail.com">
                                    sviatoslav.voitenko@gmail.com</a></address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection