<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function saveNotes(Request $request){
        $notes = json_decode($request->getContent());
        DB::beginTransaction();
        foreach ($notes as $note){
            $newNote = new Note();
            $newNote->title = $note->title;
            $newNote->body = $note->body;
            $newNote->user = $note->user;
            $newNote->button = $note->button;
            $newNote->save();
        }
        DB::commit();
        return 'status ok';
    }
}
