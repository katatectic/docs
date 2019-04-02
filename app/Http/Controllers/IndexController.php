<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $docs_pagination = 5;

    public function index() {
        $documents = Document::paginate($this->docs_pagination);
        return view('index', compact('documents'));
    }
}
