@extends('layouts.menu')

@section('title')
    <title>متجر تحفة يرحب بكم</title>
@endsection


@section('css-file')
    <link rel="stylesheet" type="text/css" href="{{asset('css/product.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@endsection

@section('header-top')
    <div class="header-call">
        <a href="tel:0656207310" class="animate-charcter">
            قدم طلبك مباشرة عبر الهاتف: 0656207310
        </a>
    </div>
@endsection

@section('content')
    @isset($name)
        <div class="app-heading1">
            <img src="{{asset('picture/icon/order-valide.webp')}}"/>
            <div class="welcom">مرحبا {{$name}}</div>
            <div class="confirmed">شكرا لثقتك بنا، تم تسجيل طلبك... سنتصل بك قريبا لتأكيد طلبك.</div>
        </div>
    @endisset
    @isset($cart)
        <div class="app-heading1">
            <img src="{{asset('picture/icon/order-valide.webp')}}"/>
            <div class="confirmed"> تم إضافة {{$cart}} إلى السلة بنجاح... <a href="/">المزيد من المنتجات</a></div>
        </div>
    @endisset


    <div class="app-heading">
        <h3 class="heading-primary">{{$product->title}}</h3>
        <div class="product-price">
            <span class="currency-value before">
                <span class="value">{{$product->price}}</span>
                <span class="currency">د.ج.‏</span>
            </span>
            <span class="currency-value after">
                <span class="value">{{$product->old_price}}</span>
                <span class="currency">د.ج‏</span>
            </span>
        </div>
    </div>


    <div class="gallery js-flickity"
         data-flickity-options='{"freeScroll": true,"contain": true}'>
        @foreach($product->ProductPicture as $picture)
            <div class="gallery-cell">
                <a href="product">
                    <img src="{{asset("picture/product/"."$product->id"."/".$picture->picture_url)}}"/>
                </a>
            </div>
        @endforeach
    </div>

    <div class="carousel carousel-nav"
         data-flickity='{ "asNavFor": ".gallery", "freeScroll": true,"contain": true, "pageDots": false }'>
        @foreach($product->ProductPicture as $picture)
            <div class="carousel-cell">
                <img src="{{asset("picture/product/"."$product->id"."/".$picture->picture_url)}}"/>
            </div>
        @endforeach
    </div>

    {!! $product->description !!}


    <div class="app-heading">
        <h3 class="heading-primary">إستمارة طلب المنتج</h3>
        <p class="heading-description">يرجى ملئ الإستمارة بعناية</p>
    </div>

    <div id="app">
        <formulaire :product="{{$product}}" :colors="{{$product->ProductColor}}" :sizes="{{$product->ProductSize}}">

        </formulaire>
    </div>


@endsection

@section('script')
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-sync@2.0.0/flickity-sync.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection

