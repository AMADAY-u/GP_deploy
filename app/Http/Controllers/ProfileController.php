<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Validator;
use Auth; // 追加


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('/Profiles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			
		// 登録処理
        $profile = new Profile;
        $profile->user_id    =  Auth::id(); // ここを追加
        $profile->pet_name =    $request->pet_name;
        $profile->pet_specie =    $request->pet_specie;
        $profile->pet_age =    $request->pet_age;
        $profile->pet_sex =    $request->pet_sex;
        $profile->pet_birth =    $request->pet_birth;
        $profile->pet_content =  $request->pet_content;
        
        $profile->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('booksedit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
	

        $book = Book::find($request->id);
        $book->item_name =    $request->item_name;
        $book->item_number =  $request->item_number;
        $book->item_amount =  $request->item_amount;
        $book->published =    $request->published;
        $book->save(); 
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(profile $profiles)
    {
        $profiles->delete();
        return redirect('/home');
    }
}