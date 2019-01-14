<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;
use Validator;

class BookmarksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bookmarks = Bookmark::where('user_id', auth()->user()->id)->get();
        return view('home')->with('bookmarks', $bookmarks);
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'url' => 'required'
        ]);

        if($validator->fails()) {
            return ['errors' => $validator->messages(), 'success' => false];
        }
        
        $request->request->add(['user_id' => auth()->user()->id]);
        $bookmark = Bookmark::create($request->all());

       // return redirect('/home')->with('success', 'Bookmark Added');        
    }

    public function destroy($id) 
    {
        $bookmark = Bookmark::find($id);
        $bookmark->delete();
    }
}
