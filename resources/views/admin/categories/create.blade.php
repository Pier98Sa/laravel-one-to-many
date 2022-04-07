@extends('admin.layouts.base')
@section('pageTitle', 'BoolPress - Nuovo Post')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <h1 class="text-center">Crea una nuova categoria </h1>

              <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf
                <div class="form-group">
                  <label for="name">Nome della nuova categoria</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                </div>

                <button type="submit" class="btn btn-primary">Salva</button>
              </form>

          </div>
      </div>
  </div>
@endsection