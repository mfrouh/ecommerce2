@extends('layouts.front')
@section('content')
<div class="container">
    
    <table class="table table-striped table-inverse border-0 text-center">
        <thead class="thead-inverse bordered-0">
            <tr>
                <th>#</th>
                <th>المنتج</th>
                <th>السعر</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
                @forelse (Cart::content()['products'] as $k => $item)
                <tr>
                    <td>{{$k}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @empty
                <tr>
                <td colspan="6"> 
                    <h4 class="text-center">
                       القائمة فارغة
                    </h4> 
                </td>
                </tr>
                @endforelse
            </tbody>
    </table>
</div>
@endsection