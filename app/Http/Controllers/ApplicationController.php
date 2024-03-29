<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $randomString = substr(bin2hex(random_bytes(3)), 0, 5);
        
        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $path=$request->file('file')->storeAs(
                'files',
                $name=$randomString.$name,
                'public'
            );
        };

        $request->validate([
            'subject'=>'required|max:255',
            'message'=>'required|max:255',
            'file'=>'file|mimes:jpg,png,pdf',
        ]);

        $application=Application::create([
            'user_id'=>auth()->user()->id,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'file_url'=>$path??null,
        ]);
        return redirect()->back();

    }
}
