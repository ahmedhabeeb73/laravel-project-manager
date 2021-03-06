@extends('layouts.app')

@section('title','الملف الشخصي')

@section('content')
@if($errors->any())
<div class="alert alert-danger" role="alert">

   
        @foreach($errors->all() as $error)
            <small>{{ $error }}</small>
        @endforeach
    
</div>
@endif
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card p-5">
      <div class="text-center m-3">
        <img src="{{asset('storage/' . auth()->user()->image)}}" width='82px' height="82px "alt="profile">
        <h3 class="mt-4 font-weight-bold">{{auth()->user()->name}}</h3>
      </div>
      <div class="card-body text-right">
    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">الاسم</label>
      <input type="text" class="form-control" id="name" name="name" value="{{auth()->user()->name}}">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">الايميل</label>
      <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">كلمة المرور</label>
      <input type="password" class="form-control" id="password" name="password" >
    </div>
    <div class="mb-3">
      <label for="password-confirmation" class="form-label">تاكيد كلمة المرور  </label>
      <input type="password" class="form-control" id="password" name="password-confirmation" >
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">تغيير الصورة الشخصية </label>
      <div class="custom-file">
        <input type="file" name="image" id="image" class="custom-file-input">
        <label for="image" id="image-label" class="custom-file-label text-left" data-browser="استعراض"></label>
      </div>
     
    </div>
    <div class="mb-3 d-flex mt-5 flex-row-reverse m-2">
      <button type="submit" class="btn btn-primary mr-2">حفظ التعديلات</button>
      
     
    </div>
    </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('image').onchange=uploadOnChange;
  function uploadOnChange(){
    let filename=this.value;
    let lastIndex=filename.lastIndexOf("\\");

    if(lastIndex >= 0){
      filename=filename.substring(lastIndex +1 );
    }

    document.getElementById('image-label').innerHTML=filename;
  }
</script>
    
@endsection