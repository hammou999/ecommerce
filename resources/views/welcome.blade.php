@extends('layouts.menu')

@section('title')
    <title>متجر تحفة يرحب بكم</title>
@endsection


@section('css-file')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet"></link>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css"/>
@endsection

@section('header-top')
    <div class="header-call">
        <a class="animate-charcter">
            الدفع عند الاستلام، توصيل 58 ولاية مرحبا بكم
        </a>
    </div>
@endsection


@section('content')
    <div class="contentt">
        <!-- Flickity HTML init -->
        <div class="app-heading">
            <h3 class="heading-primary">المنتجات الأكثر طلباً</h3>
            <p class="heading-description">كل ماتريد .. بين يديك .. بضغطة زر!</p>
        </div>

        <div class="gallery js-flickity"
             data-flickity-options='{ "wrapAround": true }'>

            @foreach($picturecarousel as $picture)
                <div class="gallery-cell">
                    <a href="{{$picture->product_url}}">
                        <img src="{{asset("picture\carousel\\"."$picture->picture_url")}}"/>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="app-heading">
            <h3 class="heading-primary">منتجات المتجر</h3>
            <p class="heading-description">ماذا تنتظر .. قدم طلبك الآن!</p>
        </div>

        <div class="products-grid">
            @foreach($products as $product)
                <div class="product-item">
                    <a href="{{route('product',$product->id)}}" class="product-thumbnail">
                        <img
                            src="{{ asset("picture/product/".$product->id."/"."$product->url_picture")}}"
                            alt="{{$product->title}}">
                    </a>
                    <div class="product-details">
                        <div class="product-info"><h3 class="product-title"><a
                                    href="{{route('product',$product->id)}}">{{$product->title}}</a>
                            </h3>
                            <div class="product-price">
                            <span class="currency-value before">
                                <span class="value">{{$product->old_price}}</span>
                                <span class="currency">&nbsp;د.ج.‏</span>
                            </span>
                                <span class="currency-value after">
                                <span class="value">{{$product->price}}</span>
                                <span class="currency">&nbsp;د.ج.‏</span>
                            </span>
                            </div>
                        </div>
                        <div class="product-actions">
                            <a href="{{route('product',$product->id)}}"
                               class="button small-button secondary-button">شراء الآن</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
@endsection
