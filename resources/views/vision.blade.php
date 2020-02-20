@extends('layouts.master')

@section('title')

@endsection

@section('css')

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
                            <h4>Our Vision</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about_page_wrap container-fluid pt-0 mt-md-5 mb-md-5" >
            <div class="container">

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="image_sections">
                            <img src="{{asset('images/cows.jpeg')}}" alt="" width="100%" height="250px">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="content_sections text-left">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad amet at consequatur dolore dolorem dolores ducimus et eum fugiat iusto necessitatibus numquam odit officia, possimus, praesentium quas qui rem sint unde? Amet animi aspernatur, at cumque cupiditate dicta dolorem eius fuga in iste maiores mollitia nihil odio omnis praesentium qui quos reiciendis vel? Dignissimos hic ipsa quas veniam voluptates.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A culpa magni non perspiciatis, quasi ratione ullam. Aliquam aperiam, architecto assumenda dolores dolorum facilis in porro saepe. Ab accusamus accusantium autem dolore dolores, error id incidunt labore molestias nemo omnis pariatur quo soluta temporibus voluptas? Ad eius error, est eum excepturi exercitationem id in iusto minus quaerat recusandae.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection