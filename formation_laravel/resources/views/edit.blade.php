@extends('layouts.app')
@section('title')
   Editer Article
@endsection

@section('content')
<h1 class = "mb-4">Editer Article<hr></h1>

<div>
<form action = "{{route('update',['id'=>$article->id])}}" method = "post">
@csrf
@method('PUT')
<div class="row mt-3">
     <div class="col-md-3">
         <label for = "title">Titre : </label>
     </div>
     <div class="col-md-9">,
     
          <input type="text" name = "title" value = "{{$article->title}}" class = "form-control"/>
    </div>
  </div>
  <div class="row mt-3">
     <div class="col-md-3">
         <label for = "title">Slug : </label>
     </div>
     <div class="col-md-9">
    <textarea name="slug" id="" maxlength = "255" cols="30"   class="form-control">{{$article->slug}}</textarea>
    </div>
  </div>
  <div class="row mt-3">
     <div class="col-md-3">
         <label for = "title">Description : </label>
     </div>
     <div class="col-md-9">
     
         <textarea name="content" id="" cols="30"  class="form-control">{{$article->content}}</textarea>
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
    



