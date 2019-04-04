<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    private $docs_pagination = 5;

    public function index() {
        $documents = Document::paginate($this->docs_pagination);
        return view('index', compact('documents'));
    }
}
