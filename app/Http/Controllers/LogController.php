<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Profile;
use Illuminate\Http\Request;
use Auth; // 冒頭付近に追加

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $Logs = Log::orderBy('created_at', 'asc')->get();
        return view('Logslist1', ['Logs'=> $Logs],);
    }
    public function index2()
    {
        $Logs = Log::orderBy('created_at', 'asc')->get();
        return view('Logslist2', ['Logs'=> $Logs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Logs');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');//fileの取得
        if(!empty($file)){
            $filename = $file->getClientOriginalName();
            $move = $file->move('./upload/',$filename);
        }else{
            $filename = "";
        }
        
        $Log = new Log;
        $Log->user_id    =  Auth::id(); // ここを追加
        // アップロードされたファイルの取得
        
        $Log->image =    $filename;
        $Log->pet_title =    $request->pet_title;
        $Log->pet_foodname =  $request->pet_foodname;
        $Log->comment_check =  $request->comment_check;
        $Log->pet_activity =  $request->pet_activity;
        $Log->pet_hungry =    $request->pet_hungry;
        $Log->pet_water =  $request->pet_water;
        $Log->pet_urine =  $request->pet_urine;
        $Log->pet_feces =  $request->pet_feces;
        $Log->pet_emit =  $request->pet_emit;
        $Log->pet_comment =    $request->pet_comment;
        
        $Log->save();
        return redirect("/Logdetail/$Log->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $Log)
    {
        $comments = Log::find($Log->id)->comments;
        $profiles = Profile::orderBy('created_at', 'asc')->get();
        
        return view('Logdetail', ['Log' => $Log],['comments' => $comments],['profiles' => $profiles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $Log)
    {
        if($Log->user_id === Auth::id()){
            return view('Logsedit', ['Log' => $Log]);
        } else {
            return "アクセス権がありません";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         // Eloquent モデル
        $Logs = Log::where('user_id',Auth::id())->find($request->id);
        $Logs->pet_title =    $request->pet_title;
        $Logs->pet_foodname =  $request->pet_foodname;
        $Logs->comment_check =  $request->comment_check;
        $Logs->pet_activity =  $request->pet_activity;
        $Logs->pet_hungry =    $request->pet_hungry;
        $Logs->pet_water =  $request->pet_water;
        $Logs->pet_urine =  $request->pet_urine;
        $Logs->pet_feces =  $request->pet_feces;
        $Logs->pet_emit =  $request->pet_emit;
        $Logs->pet_comment =    $request->pet_comment;
        $Logs->save();
        return redirect('/Logslist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $Log)
    {
        $Log->delete();       //追加
        return redirect('/home');  //追加
    }
}
