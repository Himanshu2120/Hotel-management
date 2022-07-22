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
		$user_data = User::all();
		$image = Photo::all();
		if ($image != null)
		{
			$image_data = $image;
		}else{
			$image_data = "";
		}
		return view('all_users', compact(['user_data', 'image_data']));
	}

	public function editData(Request $request)
	{
		$edit_data = User::where('id', $request->edit_id)->first();
		$update_data = '';
		if($request->method() == 'POST')
		{
			$update_data = User::where('id', $request->edit_id)->update(['name'=>$request->fname,'email'=>$request->email]);
			$del_photo = Photo::where('id',$request->edit_id)->first();
			if ($del_photo != null)
			{
        $del_photo->delete();
			}
			$validatedData = $request->validate([
				'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
			]);
			$name = $request->file('image')->getClientOriginalName();
			$path = $request->file('image')->store('public/images');
			$save = new Photo;
			$save->name = $name;
			$save->user_id = $request->edit_id;
			$save->path = $path;
			$save->save();
			return redirect()->guest('all_users');
		}
		return view('edit_user', compact(['edit_data', 'update_data']));
	}
}
