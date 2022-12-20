<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\SaveNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Note::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveNoteRequest $request)
    {
        $note=new Note();
        $note->title=$request->title;
        $note->content=$request->content;
        $note->priority=$request->priority;
        $note->save();

        $note->categories()->sync($request->categories);
        
        return response()->json([
            'res'=>true,
            'msg'=>'Note saved Susccessfully'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return response()->json([
            $note
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        $note->update($request->all());
        $note->categories()->sync($request->categories);
        return response()->json([
            'res'=>true,
            'msg'=>'Note updated Suscessfully'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->categories()->detach();
        $note->delete();
        return response()->json([
            'res'=>true,
            'msg'=>'Note deleted Suscessfully'
        ],200);
    }

    
    public function getByCategories( $cat){
        
        $category = DB::table('categories')->where('title',"=", $cat)->first();

        //$sql="SELECT * FROM notes INNER JOIN notes_categories ON notes.id=notes_categories.note_id WHERE notes_categories.category_id=1";
        $notes=Note::join('notes_categories','notes.id','=','notes_categories.note_id')->where('notes_categories.category_id','=',$category->id)->get();
       return response()->json([
            'data'=>$notes
        ],200);
    }
}
