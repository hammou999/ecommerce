@extends('layouts.menu')

@section('title')
    <title>متجر تحفة يرحب بكم</title>
@endsection


@section('css-file')
    <link rel="stylesheet" type="text/css" href="{{asset('css/cart.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet"></link>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@endsection

@section('header-top')
    <div class="header-call">
        <a class="animate-charcter">
            للإستفسار: 0656207310
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
    <div class="modal-content">
        <div class="header-title">
            <h5 class="modal-title" id="exampleModalLabel">
                سلة المشتريات
            </h5>
        </div>
        <div id="app">
            <formulaire-cart
                :cart={{json_encode($cart)}}>
            </formulaire-cart>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
    <script src="{{asset('js/formulaire-cart.js')}}"></script>
@endsection

