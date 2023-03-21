@extends('layouts.menu')


@section('css-file')
  <link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
@endsection

@section('content')
  <div class="content">
    <div class="coverture">
      <div class="picP">
        <img class="photo-pff" src="{{asset('picture/profile.jpg')}}">
        <div class="shadow1"></div>
        <div class="shadow2"></div>
      </div>
      <div class="box3">
        <div class="box4">
            flah HOUDJEDJEA
        </div>
        <div class="box5">
          125k folowers
        </div>
        <div class="box6">
          <div class="box7">
            <img src="{{asset('picture/lock.png')}}" alt="" class="img2">
            <div class="box8">
              Follow
            </div>
          </div>
          <div class="box7">
            <img src="{{asset('picture/lock.png')}}" alt="" class="img2">
            <div class="box8">
              Chat
            </div>
          </div>
          <div class="box7">
            <img src="{{asset('picture/lock.png')}}" alt="" class="img2">
            <div class="box8">
              Location
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="box10">
      <div class="box11">

      </div>
      <div class="box12">
        <h1>ABOUT</h1>
        <div id="profile">
          <tags-component> </tags-component>
        </div>

        <h1>PICTURE AND VIDOE</h1>
        <div class="box13">
          <img src="" alt="" class="picvid">
          <img src="" alt="" class="picvid">
          <img src="" alt="" class="picvid">
          <img src="" alt="" class="picvid">
        </div>

      </div>
    </div>
  </div>
  @endsection

  @section('script')
  <script src="{{asset('js/profile.js')}}"></script>
  @endsection
