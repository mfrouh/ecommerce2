@extends('layouts.admin')
@section('content')
<div class="container-fuild">
    <a href="/admin/variant/create" class="btn btn-success shadow-sm m-2 btn-sm">انشاء نوع</a>

    <div class="card card-primary text-center">
        <div class="card-header">الانواع</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>صورة المنتج</th>
                        <th>اسم المنتج</th>
                        <th>السعر</th>
                        <th>الكمية</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($variants as $k=> $variant)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>
                            <img src="{{asset('/storage/product/'.$variant->product->image->url)}}" height="50px" width="50px" alt="">
                        </td>
                        <td>{{$variant->product->name}}</td>
                        <td>{{$variant->price}}</td>
                        <td>{{$variant->qty}}</td>
                        <td>
                            <a href="/admin/variant/forcedelete/{{$variant->id}}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <a href="/admin/variant/restore/{{$variant->id}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-trash-restore"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
