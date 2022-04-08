@extends('admin.layouts.base')
@section('pageTitle') 
    BoolPress - {{$post->title}}
@endsection
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <h1 class="text-center">Visualizza Post</h1>

              <div><strong>Titolo: </strong>{{$post->title}}</div>
              <div><strong>Autore: </strong>{{$post->author}}</div>
              <div><strong>Categoria: </strong>{{isset($post->category)? $post->category->name : '-'}}</div>
              <div><strong>Contenuto: </strong>{{$post->content}}</div>
              <div><strong>Slug: </strong>{{$post->slug}}</div>

              <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Ritorna alla lista</a>

          </div>
      </div>
  </div>
@endsection