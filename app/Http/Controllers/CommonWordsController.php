<?php

namespace App\Http\Controllers;

use App\Models\CommonWord;
use Illuminate\Http\Request;

class CommonWordsController extends Controller
{
    //
    public function index(){
        $commonwords = CommonWord::orderBy('id', 'DESC')->get();
        return view('content.common-words.common-words', compact('commonwords'));
    }
    public function create(Request $request){
        $create = new CommonWord;
        $create->name = $request->name;
        $create->save();
        Session()->flash('msg','Record created successfully.');
        return redirect('common-words');
    }
    public function update(Request $request){
        $edit = CommonWord::where('id', $request->id)->first();
        $edit->name = $request->name;
        $edit->save();
        Session()->flash('updatemsg', 'Record Updated Successfully.');
        return redirect('common-words', compact('edit')); 
    }
    public function delete($id){
        $delete = CommonWord::where('id', $id)->delete();
        Session()->flash('delmsg', 'Record Deleted.');
        return redirect('common-words'); 
    }
    
}
