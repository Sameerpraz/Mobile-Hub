@extends('layouts.master')

@section('title')
    Checkout Complete- Bhagwansthan
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
                         <h4>Checkout Complete</h4>
                     </div>
                 </div>
             </div>
         </div>
     </section>
    {{--Order details Starts--}}
     <section class="about_page_wrap container-fluid pt-0 mt-md-5 mb-md-5" >
         <div class="container">

             <div class="row">
                 <div class="col-md-12 col-sm-12 col-12 mt-2 mb-2">
                     <div class="content_sections text-left text-justify">
                         <p>We thank you for choosing us.<br>Please check your email for order details.</p>
                         <p>Thank You !!</p>
                     </div>
                 </div>
             </div>


         </div>
     </section>

</main>

 @stop