@extends('layouts.front')
@section('content')
<div class="container">
    
    <table class="table table-striped table-inverse border-0 text-center">
        <thead class="thead-inverse bordered-0">
            <tr>
                <th>#</th>
                <th>السعر</th>
                <th>الحالة</th>
                <th>وقت التسليم</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
                @forelse (auth()->user()->orders as $k => $order)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$order->total_price}}</td>
                    <td>{{$order->state}}</td>
                    <td>{{$order->delivery_time}}</td>
                    <td></td>
                </tr>
                @empty
                <tr>
                <td colspan="6"> 
                    <h4 class="text-center">
                     لا يوجد طلبات  
                    </h4> 
                </td>
                </tr>
                @endforelse
            </tbody>
    </table>
</div>
@endsection