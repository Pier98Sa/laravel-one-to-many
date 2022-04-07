@extends('admin.layouts.base')
@section('pageTitle')
 BoolPress - {{$category->name}}
 @endsection
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <h1 class="text-center">Visualizza Categoria</h1>

              <div><strong>categoria: </strong>{{$category->name}}</div>
              <div><strong>Slug: </strong>{{$category->slug}}</div>

              <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Ritorna alla lista</a>

          </div>
      </div>
  </div>
@endsection