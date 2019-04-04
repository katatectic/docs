@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close close-modal" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ session('success') }}
                </div>
            @endif
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
                        <td><a href="{{route('document.show', ['document' => $document])}}" target="_blank">{{$document->name}}</a></td>
                        <td>
                            <a href="{{route('document.edit', ['document' => $document])}}" class="btn btn-primary" role="button" aria-pressed="true">Edit</a>
                            <form action="{{route('document.destroy', ['document' => $document])}}" method="POST" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
                {{ $documents->links() }}
        </div>
    </div>
</div>
@endsection