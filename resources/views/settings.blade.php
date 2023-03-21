@extends('layouts.menu')

@section('css-file')
<link rel="stylesheet" type="text/css" href="{{asset('css/settings.css')}}">
@endsection

@section('content')
<div class="content">
  <div id="settings">
    <settings/>
  </div>
</div>

@endsection

@section('script')
<script src="{{asset('js/settings.js')}}"></script>
@endsection
