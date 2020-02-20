@extends('layouts.master')

@section('title')
{{$page->title}}
@endsection

@section('css')

@endsection

@section('content')

    <main>

        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">Contact US</h1>
                            <span class="color-text-a">Aut voluptas consequatur unde sed omnis ex placeat quis eos. Aut natus officia corrupti qui autem fugit consectetur quo. Et ipsum eveniet laboriosam voluptas beatae possimus qui ducimus. Et voluptatem deleniti. Voluptatum voluptatibus amet. Et esse sed omnis inventore hic culpa.</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Contact
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="about_page_wrap container-fluid pt-0 mt-md-5 mb-md-5" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12 map_wrap">
                        <div class="map_content">
                            <div class="mapouter"><div class="gmap_canvas">
                                    {!! \App\Setting::ofValue('google_map') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <br>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p>
                                    {{ Session::get('success') }}
                                </p>
                            </div>
                            <br>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p>
                                    {{ Session::get( 'error') }}
                                </p>
                            </div>
                            <br>
                        @endif
                        <div class="contact_sections">
                            <form action="{{route('contact')}}" method="post" id="contact_form_sections">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12 col-12">
                                        <input type="text" name="name" placeholder="Your Name" class="form-control" required="required">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <input type="text" name="phone" placeholder="Phone number" class="form-control" required="required">
                                    </div>



                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <input type="email" name="email" PLACEHOLDER="Your Email" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <textarea name="message" id="" PLACEHOLDER="Message" cols="30" rows="6" class="form-control" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <img src="{{route('captcha')}}" alt="Captcha">
                                    </div>

                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Enter Captcha">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 col-sm-12 col-12 text-center">
                                        <button type="submit" class="btn btn-lg rounded-0">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="col-md-5 section-md-t3">
                        <div class="icon-box section-b2">
                            <div class="icon-box-icon">
                                <span class="ion-ios-paper-plane"></span>
                            </div>
                            <div class="icon-box-content table-cell">
                                <div class="icon-box-title">
                                    <h4 class="icon-title" style="font-size: 1.5rem;">Say Hello</h4>
                                </div>
                                <div class="icon-box-content">
                                    <p class="mb-1">Email.
                                        <span class="color-a">mobile@gmail.com</span>
                                    </p>
                                    <p class="mb-1">Phone.
                                        <span class="color-a">+016639869</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="icon-box section-b2">
                            <div class="icon-box-icon">
                                <span class="ion-ios-pin"></span>
                            </div>
                            <div class="icon-box-content table-cell">
                                <div class="icon-box-title">
                                    <h4 class="icon-title">Find us in</h4>
                                </div>
                                <div class="icon-box-content">
                                    <p class="mb-1">
                                        Balkumari
                                        <br> Lalaipur, Nepal
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="icon-box">
                            <div class="icon-box-icon">
                                <span class="ion-ios-redo"></span>
                            </div>
                            <div class="icon-box-content table-cell">
                                <div class="icon-box-title">
                                    <h4 class="icon-title">Social networks</h4>
                                </div>
                                <div class="icon-box-content">
                                    <div class="socials-footer">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="fa fa-dribbble" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
{{--                <div class="row">--}}
{{--                    <div class="col-md-8 col-sm-12 col-12 m-auto my-md-5">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-4 col-sm-12 col-12 location_wrap">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-3 col-sm-12 col-12">--}}
{{--                                        <div class="contact_icon_section">--}}
{{--                                            <i class="fa fa-map-marker"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-9 col-sm-12 col-12">--}}
{{--                                        <div class="contact_icon_detail">--}}
{{--                                            <h4>Location</h4>--}}
{{--                                            <p>Address Locations</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4 col-sm-12 col-12 phone_wrap">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-3 col-sm-12 col-12">--}}
{{--                                        <div class="contact_icon_section">--}}
{{--                                            <i class="fa fa-phone"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-9 col-sm-12 col-12">--}}
{{--                                        <div class="contact_icon_detail">--}}
{{--                                            <h4>Phone</h4>--}}
{{--                                            <p>+977-12345678</p>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4 col-sm-12 col-12 email_wrap">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-3 col-sm-12 col-12">--}}
{{--                                        <div class="contact_icon_section">--}}
{{--                                            <i class="fa fa-envelope"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-9 col-sm-12 col-12">--}}
{{--                                        <div class="contact_icon_detail">--}}
{{--                                            <h4>Mail</h4>--}}
{{--                                            <p>info@bhagwansthan.com</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </section>

    </main>

@endsection