@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(!$errors->isEmpty())
                    <div class="alert alert-danger alert-dismissible in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        @foreach($errors->all() as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('document.store') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @include('admin.include.form', ['edit' => false])

            </div>
        </div>
    </div>
@endsection