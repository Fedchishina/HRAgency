@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-2">
                    <form method="POST" action="{{ route('contacts') }}">
                        <div class="card-header bg-secondary text-light"><b>Contact us via send E-Mail:</b></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Your name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                       placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail:</label>
                                <input type="email" class="form-control" id="email" value="{{ old('email') }}"
                                       name="email"
                                       placeholder="Enter your E-Mail">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="tel" class="form-control" id="phone" value="{{ old('phone') }}"
                                       name="phone"
                                       placeholder="Enter your phone number">
                            </div>
                            <div class="form-group">
                                <label for="text">Text:</label>
                                <textarea class="form-control" id="text" name="text"
                                          rows="3">{{ old('text') }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Send</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mt-2">
                    <div class="card-header bg-secondary text-light"><b>We are here:</b></div>
                    <div class="card-body p-0">
                        <div id="googleMap" class="gMap"></div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-header bg-secondary text-light"><b>Our address:</b></div>
                    <div class="card-body p-0">
                        <div class="container">
                            <address class="mt-2">
                                <p>HR Agency<br>
                                    124, Artema Street<br>
                                    Donetsk 83013<br>
                                    Ukraine</p>
                            </address>
                            <address><strong>Phone Number:</strong> +38 (050) 123-45-67</address>
                            <address><strong>Email:</strong><a href="mailto:#"> mail@example.com</a></address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <script src="js/googleMap.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNzqX8h6j0H1KRZM7U38E2edzvNARxAZ4&callback=myMap"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>

    <script>window.jQuery || document.write('<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"><\/script>')</script>
@endsection