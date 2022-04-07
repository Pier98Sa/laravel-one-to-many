@extends('admin.layouts.base')

@section('pageTitle', 'BoolPress')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('admin.posts.create')}}" class="btn btn-primary mb-2">Crea un nuovo post</a>


                
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Contenuto</th>
                        <th scope="col">Autore</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $key => $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{substr($post->content,0,30)}}</td>
                            <td>{{$post->author}}</td>
                            <td>{{$post->slug}}</td>
                            <td>{{$post->category->name??null}}</td>
                            <td class="d-flex"> 
                                <!--buttoni delle azioni-->
                                <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">Show</a>
                                <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-success mx-2">Edit</a>   

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancel">
                                    Remove
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="cancel" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Eliminazione</h5>
                                                <button type="button" class="close" data-dismiss="modal" >
                                                    <span >&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <p>Sei sicuro di voler cancellare il post ?</p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="POST" id="form_{{$key}}">
                                                    @csrf
                                                    @method('DELETE')
                
                                                    <span data-formid="form_{{$key}}" href='#' class="btn btn-danger requestConfirm">Remove</span>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection