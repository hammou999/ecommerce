@extends('layouts.app')
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('header')
    <h1>
        الرئيسية
    </h1>
@endsection

@section('content')
    <table class="table-orders">
        <thead>
        <tr class="table-head">
            <th class="column">الرقم</th>
            <th class="column">التاريخ</th>
            <th class="column">المنتجات</th>
            <th class="column columnPhone">التوصيل</th>
            <th class="column columnPc">الإسم واللقب</th>
            <th class="column columnPc">رقم الهاتف</th>
            <th class="column columnPc">التوصيل</th>
            <th class="column columnPc">السعر</th>
            <th class="column">الحالة</th>
            <th class="column">أدوات</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td class="order-id">{{$order->id}}</td>
                <td class="order-created_at">{{explode(' ', $order->created_at)[0]}}<br>{{explode(' ', $order->created_at)[1]}}</td>
                <td class="">
                    @foreach ($order->OrderProducts as $product)
                        <div>
                            <div class="order-img">
                                <img src="{{'/picture/product/'.$product->Product['id'].'/'.$product->picture_url}}"/>
                            </div>
                            <div> {{$product->Product['title'].($product->ProductType['title']? " - ".$product->ProductType['title']:'').($product->ProductSize['title']? " - ".$product->ProductSize['title']:'').($product->ProductColor['title']? " - ".$product->ProductColor['title']:'')}} </div>
                        </div>
                    @endforeach
                </td>
                <td class="columnPhone">
                    {{$order->full_name}}<br><a href="tel:{{$order->phone}}" class="phone">{{$order->phone}}</a><br>{{$order->adresse}}<br>{{$order->Commune->commune_name}}<br>{{$order->Commune->wilaya_name}}<br><span class="disDirection">{{number_format($order->total, 2, ',', ' ')}}</span>
                </td>
                <td class="columnPc">{{$order->full_name}}</td>
                <td class="columnPc">{{$order->phone}}</td>
                <td class="columnPc">{{$order->adresse}}<br>{{$order->Commune->commune_name}}<br>{{$order->Commune->wilaya_name}}</td>
                <td class="columnPc"><span class="disDirection">{{number_format($order->total, 2, ',', ' ')}}</span></td>
                <td class="order-status">
                    @if ($order->status == 1)
                        <span class="confirmed-order"></span>
                    @elseif ($order->status == 2)
                        <span class="pending-order"></span>
                    @elseif ($order->status == 0)
                        <span class="canceled-order"></span>
                    @endif
                </td>
                <td>
                    <div class="order-action">
                        @if ($order->status == 2)
                            <a class="refuse-order" href="{{route('refuse-order', ['id' => $order->id])}}"></a>
                            <a class="accept-order" href="{{route('accept-order', ['id' => $order->id])}}"></a>
                        @else
                            <a class="annulled-order" href="{{route('annulled-order', ['id' => $order->id])}}">إلغاء</a>
                        @endif
                    </div>

                </td>
            </tr>
            @endforeach
    </tbody>
    </table>

    {{ $orders->links('pagination::simple-tailwind') }}

@endsection
