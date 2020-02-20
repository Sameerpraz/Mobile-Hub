@extends('layouts.master')

@section('title')
        {{$page->title}}
@endsection

@section('css')

@endsection

@section('content')

    <main>
        <section class="banner_wrap container-fluid p-0">
            <div class="page-overlay"></div>
            <div class="banner_wrap_bg" style="background-image: url('{{ App\Setting::getBg() }}');"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="banner_sections" >
                            <h4>{{$page->title}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about_page_wrap container-fluid p-0 mt-md-5 mb-md-5" >
            <div class="container">

                <div class="row">
                   <div class="col-md-12 col-sm-12 col-12">
                       <!-- Nav pills -->
                       <ul class="nav nav-pills text-center" role="tablist">
                           <li class="nav-item">
                               <a class="nav-link active" data-toggle="pill" href="#gallery">Gallery</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" data-toggle="pill" href="#videos">Videos</a>
                           </li>

                       </ul>

                       <!-- Tab panes -->
                       <div class="tab-content">
                           <div id="gallery" class="container tab-pane active"><br>
                               <h4 class="mt-md-4 mb-md-4 text-center">Gallery</h4>
                               @if(count($galleries)!= null)
                               <div class="row" id="lightgallery">
                                   @foreach($galleries as $gallery)

                                       {{--<div class="overlay"></div>--}}

                                       <a  class="col-md-4 col-sm-12 col-12 mb-4 hov-img-zoom" href="{{ asset('uploads/gallery/' . $gallery->image) }}" title="{{ $gallery->caption }}">
                                       <img src="{{asset('uploads/gallery/'.$gallery->image)}}" alt="{{$gallery->image}}" width="100%" class="img-fluid">
                                       </a>


                                  @endforeach
                               </div>
                                   @else
                                   <p class="text-center">No gallery images available</p>
                               @endif

                           </div>
                           <div id="videos" class="container tab-pane fade"><br>
                               <h4 class="mt-md-4 mb-md-4 text-center">Videos</h4>
                               <div class="row">
                                   @foreach($videos as $video)
                                   <div class="col-md-4 col-sm-12 col-12 mb-md-4">
                                       {{--<div class="overlay"></div>--}}
                                       <iframe width="100%" height="180" src="https://www.youtube.com/embed/{{$video->video_id}}" frameborder="0" allowfullscreen></iframe>
                                   </div>
                                   @endforeach

                               </div>
                           </div>

                       </div>
                </div>
            </div>
            </div>
        </section>
    </main>

@endsection
@section('script')
    <link rel="stylesheet" href="{{ asset('vendors/lightgallery/lightgallery.min.css') }}">
    <script src="{{ asset('vendors/lightgallery/lightgallery.min.js') }}"></script>
    <script src="{{ asset('vendors/lightgallery/lg-zoom.js') }}"></script>
    <script>
        $(document).ready(function() {
            lightGallery(document.getElementById('lightgallery'),{
                download:true,
                // zoom: true,
            });
        });
    </script>
@endsection