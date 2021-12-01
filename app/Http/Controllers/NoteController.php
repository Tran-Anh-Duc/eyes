<?php

namespace App\Http\Controllers;

use App\Repositories\NoteRepository;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    protected $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function index()
    {
        $notes = $this->noteRepository->getAll();
        return view('backend.note.list',compact('notes'));
    }
}
