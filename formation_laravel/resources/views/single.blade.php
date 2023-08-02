@extends('layouts.app')
@section('title')
   {{ $article->title }} 
@endsection

@section('content')
@if($article->pic)
<img src = "{{ Storage::url($article->pic)}}" alt = "">
@endif
<h1>{{ $article->title }}</h1>
<p>{{ $article->created_at }}</p> 
<div>
{!! nl2br ($article->content) !!}
</div>
<hr>

<div class = "mt-5 btn-light py-3 px-3">
   <h2>Commentaires</h2>
   <form action = "{{route('comments.store')}}" method = "post">
      @csrf
      <input type = "hidden" name = "article" value = "{{ $article->id}}">
      <p><input type = "text" name = "auteur" placeholder = "Auteur" class = "form-control"></p>
      <p><textarea name = "content" id = "" cols = "38" rows= "10" class = "form-control"></textarea></p>
      <p><button type = "submit" class = "btn btn-primary">Commenter</button></p>
</form>
</div>
<div class = "mt-4 bg-light py-3 px-3">
   @forelse ($article->comments as $comment)
     <div class="mt-2 bg-white">
      <h5><b> {{$comment->auteur}}</b></h5>
      <p><i style="color:gray;float:right;">{{$comment->created_at}}</i></p>
      <div>{!! nl2br($comment->content) !!}</div>
</div>
@empty
Aucun Commentaire
@endforelse
     </div>
     <div>
   {{$article->comments??null }}

</div>
@endsection
    



