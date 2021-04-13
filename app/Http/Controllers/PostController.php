<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fileup;
use Response;

class PostController extends Controller
{
    function downloadPost(Request $request,$id){
        $posts = Fileup::where('id','=',$id)->first();
        $filePath = public_path($posts->path);
        echo $posts->path;

        return response()->download($filePath, null,['Content-Type'=>$posts->mimetype]);
    }
    function createForm(){
        return view('components.upload-file');
    }
    //get All Post
    function getAllPost(Request $request){
        $posts = Fileup::latest();
        return view('components.upload-file', compact('posts'));
    }
    //get All post by user
    function getUserPost(Request $request){
        $posts = Fileup::where('user_id','=',session('LoggedUser'))->latest()->get();
        return view('components.user-post', compact('posts'));
    }
    //update post
    function selectUserPost(Request $request,$id){
        $posts = Fileup::where('id','=',$id)->first();
        if($posts->user_id == session('LoggedUser')){
            return view('components.update-post', compact('posts'));
        }
        else{
            return back();
        }
    }
    function updateUserPost(Request $request,$id){
        $request->validate([
            'file' => 'nullable|mimes:csv,txt,xlx,pdf,png,jpg,jpeg',
            'title'=>'required',
            'description'=>'required',
        ]);
        $posts = Fileup::where('id','=',$id)->first();
        if($posts->user_id == session('LoggedUser')){
            $posts->title = $request->title;
            $posts->description = $request->description;
            
            if($request->file()){
                $fileName = time().'_'.$request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                $posts->path = '/storage/'. $filePath;                
            }
            $posts->save();
            return redirect()->route('post.getUserPost')
            ->with('Success','Updated!');
        }
        return back();
    }
    function deleteUserPost(Request $request,$id){
        Fileup::where('id','=',$id)->delete();
        // $posts->delete();
        return redirect()->route('post.getUserPost')
        ->with('alert','Deleted!');
    }
    //upload post
    function uploadFile(Request $request){
        //validate requests
        $request->validate([
            'file' => 'required|mimes:csv,txt,xlx,pdf,png,jpg,jpeg',
            'title'=>'required',
            'description'=>'nullable',
        ]);

        $fileModel = new Fileup;

        if($request->file()){
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->path = '/storage/'. $filePath;
            $fileModel->title = $request->title;
            $fileModel->description = $request->description;
            $fileModel->user_id = session('LoggedUser');
            $fileModel->save();

            return redirect()->route('post.getUserPost')
            ->with('Success','Uploaded!');
            
        }
    }

}
