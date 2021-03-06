@extends('front_end.layouts.app')

@section('title', 'HOME')

@section('content')

<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7507.602809431987!2d107.37366!3d16.601625!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x11addf2a1ab99c4c!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gRnJpdCBIxrDGoW5nIEdpYW5n!5e1!3m2!1sen!2sus!4v1584435373508!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>            </div>
            </div>
            <div style="text-align:center" class="col-lg-4 offset-lg-1">
                 <div class="">
                    <div style="text-align:center">
                        <h2>{{trans('header.company')}}</h2>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>{{trans('header.address')}}</h3>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>+84.2343.595.695</h3>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>huonggiangfrit@gmail.com</h3>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-20">
                <h2 class="contact-title">{{trans('navbar.contact')}}</h2>
            <form class="form-contact contact_form" action="{{ route('mail.contact') }}" method="post" id="contactForm" novalidate="novalidate">
                @csrf
                <div class="row">
                        <div class="col-12">
                            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject" value="{{ old('subject') }}">
                                @if ($errors->has('subject'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message">{{ old('message') }}</textarea>
                                @if ($errors->has('message'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                <div class="g-recaptcha" data-sitekey="6LcHHOIUAAAAAEQSCLWuLOuM04_hTVJl6D-nGPl1"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
