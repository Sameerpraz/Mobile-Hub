@extends('layouts.master')
@section('title') {{ $page->title }}
@endsection

@section('content')
    <main>
        <section class="banner_wrap container-fluid p-0">
            <div class="overlay"></div>
            <div class="banner_wrap_bg" style="background-image: url('{{ App\Setting::getBg() }}');"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="banner_sections" >
                            <h4>{{ $page->title }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="review_section_wrap container-fluid p-0 mt-md-5 mb-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        @foreach($reviews as $review)
                        <div class="row review_singles">
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="review_user_img">
                                </div>
                                <img src="{{isset($review->image) ? asset('uploads/reviews/'.$review->image) : asset('images/icons-user.png') }}" alt="{{$review->title}}" class="img-fluid">
                            </div>
                            <div class="col-md-8 col-sm-6 col-12">
                                <div class="review_user_details">
                                    <span class="review_quot">&quot;</span>{{$review->details}}<span class="review_quot">&quot;</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </section>
        
        {{--Review Form--}}
        <section class="review_form_wrap container-fluid p-0">
            <div class="container">
                <div class="row">
                    <div class="col md-8 col-sm-12 col-12 text-center mt-2 mb-2 m-auto">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p>
                                    {{ Session::get('success') }}
                                </p>
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p>
                                    {{ Session::get( 'error') }}
                                </p>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12 col-sm-12 col-12 text-center mt-2 mb-2">

                        <h3 class="text-secondary">Write A Review</h3>

                    </div>
                    <div class="col-md-8 col-sm-12 col-12 m-auto">
                        <form action="{{route('review')}}" enctype="multipart/form-data" class="mb-2 mt-md-3 mb-md-4" method="post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <div class="col-sm-6 col-12">
                                    <label for="sr-only">Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label for="sr-only">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-12">
                                    <label for="sr-only">Email Address</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label for="sr-only">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-12">
                                    <label for="sr-only">Review</label>
                                    <textarea id="" cols="30" rows="10" name="reviews" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-12 m-auto text-center">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </section>
     </main>
    

@endsection

@section('script')

@endsection
