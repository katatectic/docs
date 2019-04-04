<?php

namespace App\Http\Controllers;

use App\Document;
use App\DocumentFile;
use App\Http\Requests\DocumentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    private $docs_pagination = 5;

    /*
     * Using of middlewares for defined actions     *
     */
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['create', 'store', 'destroy', 'edit', 'update', 'destroyFile']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        $documents = Document::paginate($this->docs_pagination);
        return view('admin.template', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        try {
            $data = $request->except('_token');
            $document = Document::create($data);
            if (isset($data['files'])) {
                DocumentFile::filesUpload($data['files'], $document);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something gone wrong');
        }

        return redirect()->route('admin')->with('success', 'Document has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */

    public function getDocumentFiles(Document $document)
    {
        return $document->files()->get()->count() > 0 ? $files = $document->files()->get() : $files = 0;
    }

    public function show(Document $document)
    {
        $files = $this->getDocumentFiles($document);
        return view('document', compact('document', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $files = $this->getDocumentFiles($document);
        return view('admin.edit', compact('document', 'files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentRequest $request, Document $document)
    {
        try {
            //dd($request->all());
            $data = $request->except('_token', '_method', 'edit');

            if (isset($data['files'])) {
                DocumentFile::filesUpload($data['files'], $document);
            }
            $document->update($data);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something gone wrong');
        }

        return redirect()->back()->with('success', 'Document has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        try {
            if($this->getDocumentFiles($document)) {
                foreach ($this->getDocumentFiles($document) as $file) {
                    $file->fileImageDelete($document);
                }
            }
            $document->delete();

        } catch (Exception $e) {

            $error = Config::get('constants.ERROR_MESSAGE');
            return redirect()->route('admin')->with('error', $error);

        }
        return redirect()->route('admin')->with('success', 'Document "' . $document->name . '"  has been deleted successfully');
    }

    public function destroyFile(Document $document, DocumentFile $file)
    {
        try {
            //Storage::delete('documents/'.$document->id .'/' . $file->path);
            $file->fileImageDelete($document);

            $file->delete();

        } catch (Exception $e) {

            $error = Config::get('constants.ERROR_MESSAGE');
            return redirect()->route('admin')->with('error', $error);

        }
        return redirect()->back()->with('success', 'File "' . $file->path . '"  has been deleted successfully');
    }
}
