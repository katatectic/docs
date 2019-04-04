<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DocumentFile extends Model
{
    protected $fillable = ['document_id', 'path'];

    /*
     * Method accept data from DocumentController
     * and creates records with files
     *
     * */
    public static function filesUpload($files, Document $document)
    {
        $path = 'documents/'.$document->id .'/';

        foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            Storage::disk('public')->putFileAs(
                $path,
                $file,
                $name
            );
            self::create([
                'document_id' => $document->id,
                'path' => $name
            ]);
        }
    }

    public function fileImageDelete(Document $document)
    {
        $path = 'documents/'.$document->id .'/' . $this->path;
        //dd($path);
        Storage::disk('public')->delete($path);
        //Storage::disk('public')->delete($path);
    }
}
