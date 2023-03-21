@extends('layouts.menu')

@section('title')
    <title>متجر تحفة يرحب بكم</title>
@endsection


@section('css-file')
    <link rel="stylesheet" type="text/css" href="{{asset('css/order-confirmed.css')}}">
@endsection

@section('header-top')
    <div class="header-call">
        <a href="tel:0798872905" class="animate-charcter">
            للإستفسار أو تعديل الطلبية يرجى الإتصال على الرقم: 0668407723
        </a>
    </div>
@endsection

@section('content')
    @if ($name ? true : false )
        <div class="app-heading1">
            <img src="{{asset('picture/icon/order-valide.webp')}}"/>
            <div class="welcom">مرحبا {{$name}}</div>
            <div class="confirmed">شكرا لثقتك بنا، تم تسجيل طلبك... سنتصل بك قريبا.</div>
        </div>
    @endif
    @if ( $cart ? true : false )
        <div class="app-heading1">
            <img src="{{asset('picture/icon/order-valide.webp')}}"/>
            <div class="confirmed">تم إضافة المنتج إلى السلة بنجاح... <a href="welcome">أكمل التسوق</a></div>
        </div>
    @endif

    <div class="app-heading">
        <img src="{{asset('picture/icon/order-valide.webp')}}"/>
        <div class="welcom">مرحبا {{$name}}</div>
        <div class="confirmed">شكرا لثقتك بنا، تم تسجيل طلبك... سنتصل بك قريبا.</div>
    </div>
@endsection

@section('script')

@endsection

