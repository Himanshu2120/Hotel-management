<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
			return redirect()->guest('all_users');
		}
		return view('edit_user', compact(['edit_data', 'update_data']));
	}
}
