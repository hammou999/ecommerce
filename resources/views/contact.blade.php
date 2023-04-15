@extends('layouts.menu')

@section('title')
    <title>متجر تحفة يرحب بكم</title>
@endsection


@section('css-file')
    <link rel="stylesheet" type="text/css" href="{{asset('css/contact.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet"></link>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@endsection

@section('header-top')
    <div class="header-call">
        <a href="tel:0656207310" class="animate-charcter">
            للإستفسار: 0656207310
        </a>
    </div>
@endsection


@section('content')
    <div class="box">
        <div class="form">
            <h3>للتواصل معنا</h3>

            <div class="containerr">
                <form action="#">
                    <input type="text" id="email" name="email" placeholder="البريد الإلكتروني">

                    <input type="text" id="title" name="title" placeholder="الموضوع">

                    <textarea id="subject" name="subject" placeholder="الرسالة"
                              style="height:200px"></textarea>
                    <div class="submit">
                        <input type="submit" value="إرسال">
                    </div>

                </form>
            </div>
        </div>
        <div class="information">
            <div>
                <span>للتواصل معنا عبر البريد الإلكتروني:</span>
                <span>Info@tehfa-dz.com </span>
            </div>
            <div>
                <span>للتواصل معنا عبر الهاتف:</span>
                <span> 06.56.20.73.10 </span>

            </div>
            <div>
                سنكون سعداء بالتواصل معكم والإجابة عن أسئلتكم.
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
@endsection



