@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <h1>Documents list <a href="{{route('document.create')}}" class="btn btn-success" role="button" aria-pressed="true">Add new</a></h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
                <tr>
                    <th>{{$document->id}}</th>
                    <td>{{$document->name}}</td>
                    <td>
                        <a href="{{route('document.edit', ['document' => $document])}}" class="btn btn-primary" role="button" aria-pressed="true">Edit</a>
                        <a href="{{route('document.destroy', ['document' => $document])}}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>                        
                    </td>
                </tr>
            @endforeach    
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection