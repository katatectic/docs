@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Documents list</h1>
            @foreach($documents as $document)
            <div class="card mt-3">
                <h5 class="card-header">{{$document->name}}</h5>
                <div class="card-body">
                    <h5 class="card-title">If you want to read document "{{$document->name}}", please, follow the link below</h5>
                    <a href="{{route('document.show', ['document' => $document])}}" class="btn btn-primary" target="_blank">Go and read it</a>
                </div>
            </div>
            @endforeach
        </div>
        {{ $documents->links() }}
    </div>
</div>
@endsection