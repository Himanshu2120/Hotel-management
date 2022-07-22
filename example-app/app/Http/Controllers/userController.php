<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Photo;

class userController extends Controller
{
	public function userData()
	{
		$users = User::all();
		return view('all_users')->with('user_data', $users);
	}

	public function editData(Request $request)
	{
		$edit_data = User::where('id', $request->edit_id)->first();
		$update_data = '';
		if($request->method() == 'POST')
		{
			$update_data = User::where('id', $request->edit_id)->update(['name'=>$request->fname,'email'=>$request->email]);	
			$validatedData = $request->validate([
				'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
			]);

			$name = $request->file('image')->getClientOriginalName();

			$path = $request->file('image')->store('public/images');


			$save = new Photo;

			$save->name = $name;
			$save->path = $path;

			$save->save();
			echo 'name:-'.$name;
			echo 'path:-'.$path;
			// return redirect()->guest('all_users');
		}
		return view('edit_user', compact(['edit_data', 'update_data']));
	}
}
