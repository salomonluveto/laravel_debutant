@extends('layouts.app')
@section('title')
   Nouveau Article
@endsection

@section('content')
<h1 class = "mb-4">Nouveau Article<hr></h1>

<div>
  @if ($errors->any())
    <ul>
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
{{$error}}
</div>

@endforeach
</ul>
@endif
<form action = "{{route('store')}}" method = "post" enctype = "multipart/form-data">
@csrf
<div class="row mt-3">
     <div class="col-md-3">
         <label for = "title">Titre : </label>
     </div>
     <div class="col-md-9">,
     
          <input type="text" name = "title" class = "form-control"/>
    </div>
  </div>
  <div class="row mt-3">
     <div class="col-md-3">
         <label for = "title">Slug : </label>
     </div>
     <div class="col-md-9">
    <textarea name="slug" id="" maxlength = "255" cols="30"  class="form-control"></textarea>
    </div>
  </div>
  <div class="row mt-3">
     <div class="col-md-3">
         <label for = "title">Description : </label>
     </div>
     <div class="col-md-9">
     
         <textarea name="content" id="" cols="30"  class="form-control"></textarea>
    </div>
  </div>
 
  <div class="row mt-3">
     <div class="col-md-3">
         <label for = "title">Image : </label>
     </div>
     <div class="col-md-9">,
     
          <input type="file" name = "pic" accept = "images/*" class = "form-control"/>
    </div>
  </div>
  <div class="row mt-3">
     <div class="col-md-3">
    
     </div>
     <div class="col-md-9">
     
          <input type="submit" value = "valider" class = "btn btn-primary">
    </div>
  </div>
  </form>
</div>

@endsection
    



