@extends('layouts.app')

@section('content')

<header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
  <div class="h6 text-dark">
    <a href="{{route('projects.index')}}">{{$project->title}}</a>
  </div>
  <div>
    <a href="{{route('projects.edit',$project->id)}}">تعديل مشروع</a>
  </div>
</header>


<section class="row text-right" dir="rtl">
<div class="col-lg-4">
  <div class="card text-right">
    <div class="card-body">
      @switch($project->status)
          @case(1)
              <span class="text-success">مكتمل</span>
              @break
          @case(2)
          <span class="text-danger">مكتمل</span>
              @break
          @default
           <span class="text-warning">قيد الانجاز</span>
      @endswitch
      <h5 class="font-weight-bold card-title">
        <a href="{{route('projects.show',$project->id)}}">{{$project->title}}</a>
      </h5>
      <div class="card-text mt-4">
        {{$project->description,150}}
      </div>
      @include('projects.footer')
    </div>
  </div>


<div class="card">
  <div class="card-body">
    <form action="{{route('projects.update',$project->id)}}" method="POST"> 
      @method('PATCH')
      @csrf
    <select name="status" class="custom-select" onchange="this.form.submit()">
      <option value="0" {{($project->status ==0) ? 'selected' : ""}}>قيد الانجاز</option>
      <option value="1" {{($project->status ==1) ? 'selected' : ""}}>مكتمل</option>
      <option value="2" {{($project->status ==2) ? 'selected' : ""}}>ملغي</option>
    </select>
  </form>
  </div>
</div>
</div>

<div class="col-lg-8">

</div>
</section>
    
@endsection