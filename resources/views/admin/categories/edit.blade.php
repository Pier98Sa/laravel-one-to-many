@extends('admin.layouts.base')
@section('pageTitle') 
  BoolPress - Modifica {{$category->name}}
@endsection

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <h1 class="text-center">Modifica la categoria </h1>

              <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="name">Nome della categoria</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{old('name', $category->name)}}">
                </div>

                <button type="submit" class="btn btn-primary">Salva</button>
              </form>

          </div>
      </div>
  </div>
@endsection