@if($edit)
    <input type="hidden" id="edit" name="edit" value="edit">
@endif

    <div class="form-group">
        <label for="name">Document name</label>
        <input type="text" name="name" class="form-control" id="name" required value="{{ old('title', $edit ? $document->name : '') }}">
        <small id="nameHelp" class="form-text text-muted">Please, enter file name.</small>
    </div>

    <div class="form-group">
        <label for="files">Select files</label>
        <input type="file" name="files[]" class="form-control-file" id="files" multiple>
    </div>

    <a href="{{route('admin')}}" class="btn btn-warning" role="button" aria-pressed="true">Cancel</a>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>


@if($edit)
    <h2 class="mt-5">Files list</h2>
    @if($files)
        @foreach($files as $file)
            <div class="mb-3">
                <a class="btn btn-primary btn-lg" href="{{ url('/storage/app/public/documents/' . $document->id . '/' . $file->path) }}" role="button" target="_blank">{{$file->path}}</a>
                <form action="{{route('file.destroy', ['document' => $document, 'file' => $file])}}" method="POST" style="display: inline;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
    @else
        <p>This document does not have files</p>
    @endif
@endif