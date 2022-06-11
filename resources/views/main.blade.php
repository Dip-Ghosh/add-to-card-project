@extends('layouts.app')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
        <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
            <nav class="yamm megamenu-horizontal">
                <ul class="nav">
                    @if(isset($categories) && !empty($categories))
                        @foreach($categories as $category)
                            <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                        class="icon fa fa-envira"></i>{{ $category->name }}</a></li>
                        @endforeach

                    @else
                        <li> No record Found</li>
                    @endif
                </ul>
            </nav>
        </div>
        <div class="sidebar-widget hot-deals outer-bottom-xs">
            <h3 class="section-title">Hot deals</h3>
            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                <div class="item">
                    <div class="products">
                        <div class="hot-deal-wrapper">
                            <div class="image">
                                <a href="#">
                                    <img src="assets/images/hot-deals/p15.jpg" alt="">
                                    <img src="assets/images/hot-deals/p15_hover.jpg" alt="" class="hover-image">
                                </a>
                            </div>
                            <div class="sale-offer-tag"><span>35%<br>
                    off</span></div>
                            <div class="timing-wrapper">
                                <div class="box-wrapper">
                                    <div class="date box"><span class="key">120</span> <span class="value">Days</span>
                                    </div>
                                </div>
                                <div class="box-wrapper">
                                    <div class="hour box"><span class="key">20</span> <span class="value">HRS</span>
                                    </div>
                                </div>
                                <div class="box-wrapper">
                                    <div class="minutes box"><span class="key">36</span> <span class="value">MINS</span>
                                    </div>
                                </div>
                                <div class="box-wrapper">
                                    <div class="seconds box"><span class="key">60</span> <span class="value">SEC</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-info text-left m-t-20">
                            <h3 class="name"><a href="{{ url('/products/details') }}">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"><span class="price"> $600.00 </span> <span
                                    class="price-before-discount">$800.00</span>
                            </div>
                        </div>
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <div class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i
                                            class="fa fa-shopping-cart"></i></button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                <div class="item" style="background-image: url(assets/images/sliders/01.jpg);">
                    <div class="container-fluid">
                        <div class="caption bg-color vertical-center text-left">
                            <div class="slider-header fadeInDown-1">Top Brands</div>
                            <div class="big-text fadeInDown-1"> New Collections</div>
                            <div class="excerpt fadeInDown-2 hidden-xs"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                            </div>
                            <div class="button-holder fadeInDown-3"><a href="index6c11.html?page=single-product"
                                                                       class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop
                                    Now</a></div>
                        </div>
                    </div>
                </div>

                <div class="item" style="background-image: url(assets/images/sliders/02.jpg);">
                    <div class="container-fluid">
                        <div class="caption bg-color vertical-center text-left">
                            <div class="slider-header fadeInDown-1">Spring 2018</div>
                            <div class="big-text fadeInDown-1"> Women Fashion</div>
                            <div class="excerpt fadeInDown-2 hidden-xs"><span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</span>
                            </div>
                            <div class="button-holder fadeInDown-3"><a href="{{ url('/products/details') }}"
                                                                       class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop
                                    Now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">

            @foreach($data as $key=>$product)

                <div class="more-info-tab clearfix ">
                    <h3 class="new-product-title pull-left">{{ $key }}</h3>
                </div>
                <div class="tab-content outer-top-xs">
                    <div class="tab-pane in active" id="all">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                                @foreach($product as $value)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="{{ route('products.details',$value->id) }}">
                                                            <img src="{{asset('uploads/'.$value->image)}}" alt="">
                                                            <img src="{{asset('uploads/'.$value->image)}}" alt="" class="hover-image">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{  route('products.details',$value->id) }}"> {{ $value->name }}</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    <div class="product-price"><span class="price"> {{ $value->price }} </span> <span
                                                            class="price-before-discount">$ 800</span></div>
                                                </div>
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button data-toggle="tooltip" class="btn btn-primary icon"
                                                                        type="button" title="Add Cart"><i
                                                                        class="fa fa-shopping-cart"></i></button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add
                                                                    to
                                                                    cart
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
