@extends('layouts.app')

@section('content')
    <div class="container">



        <div class="jumbotron py-3">
            <h1 class="display-5 text-center">HR Agency "Who knows?"</h1>

            <div id="myCarousel" class="carousel slide mb-2 border border-secondary rounded" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="first-slide rounded" src="{{ asset('img/carousel-1.jpg') }}" alt="First slide">
                    </div>

                    <div class="carousel-item">
                        <img class="second-slide rounded" src="{{ asset('img/carousel-2.jpg') }}" alt="Second slide">
                    </div>

                    <div class="carousel-item">
                        <img class="third-slide rounded" src="{{ asset('img/carousel-3.jpg') }}" alt="Third slide">
                    </div>
                </div>

                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

            <p class="lead text-center">
                We are a human resources management firm based in
                Ukraine offering a specialized suite of services to
                the public and not for profit sectors. Our four divisions
                (Interim Staffing, HR Consulting and Recruitment)
                provide our clients with a complimentary suite of service
                options to meet their specific HR needs.
            </p>

            <p class="lead text-center">
                <a class="btn btn-primary btn-lg" href="{{ route('about') }}" role="button">Learn more &raquo;</a>
            </p>


        </div>

        <hr>
    </div>
@endsection