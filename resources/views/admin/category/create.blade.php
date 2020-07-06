@extends('layouts.admin')
@section('content')
<div class="container-fuild">
   <div class="card card-primary text-right">

     <div class="card-header ">انشاء قسم</div>
     <div class="card-body">
       <form action="/admin/category" method="post" enctype="multipart/form-data">
        @csrf
         <div class="form-group ">
           <label for="">اسم القسم</label>
           <input type="text" name="name" class="form-control" placeholder="اسم القسم" aria-describedby="helpId">
         </div>
         <div class="form-group ">
            <label for="">صورة القسم</label>
            <input type="file" name="image" class="form-control">
         </div>
         <div class="form-group ">
            <label for="">الحالة</label><br>
            <input type="radio" name="active" value="0"> لا
            <input type="radio" name="active" value="1"> نعم
          </div>
         <div class="form-group text-center">
             <input type="submit" value="حفظ" class="btn btn-primary btn-sm">
          </div>
       </form>
     </div>
   </div>
</div>
@endsection
