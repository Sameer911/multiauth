@extends('layouts.master')


@section('content')
<section class="section">
    <div class="section-body">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
          <div class="card">
            <div class="card-header">
              <h4>Image</h4>
            </div>
            <div class="card-body">
              <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <a href="assets/img/image-gallery/1.png" data-sub-html="Demo Description">
                    <img class="img-responsive thumbnail" src="{{ asset('images/'. $paid->image) }}" alt="">
                  </a>
                </div>
                
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection