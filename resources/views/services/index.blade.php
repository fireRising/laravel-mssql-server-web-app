@extends('layouts.app')

@section('contents')
    <div class="container">
        @include('layouts.response')
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#carouselIndicators" data-slide-to="0"></li>
                <li data-target="#carouselIndicators" data-slide-to="1"></li>
                <li data-target="#carouselIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://www.groupon.com/merchant/wp-content/uploads/2017/08/shutterstock_136244417.jpeg" alt=""
                         class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="https://www.groupon.com/merchant/wp-content/uploads/2017/08/shutterstock_136244417.jpeg" alt=""
                         class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="https://www.groupon.com/merchant/wp-content/uploads/2017/08/shutterstock_136244417.jpeg" alt=""
                         class="d-block w-100">
                </div>
            </div>
        </div>
    </div>
@endsection