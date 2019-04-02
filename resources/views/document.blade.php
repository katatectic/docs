@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Document # {{$document->id}}</h1>
                <h3>{{$document->name}}</h3>
                <hr class="my-4">                
                <p>
                    @if($files)
                        @foreach($files as $file)
                            <a class="btn btn-primary btn-lg" href="{{ url('/storage/app/public/files/' . $file->path) }}" role="button">{{$file->path}}</a>
                        @endforeach
                    @else
                        <p>This document does not have files</p>
                    @endif
                </p>
                
            </div>
        </div>
    </div>
</div>
@endsection