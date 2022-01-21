<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        // dd($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postsCount = $user->posts->count();
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();
        // $user = User::findOrFail($user);//v view home izpolzvame $user // ako nqmame usera izkarva 404 not found
        return view('profiles.index',[
            'user' => $user,
            'follows' => $follows,
            'postsCount' => $postsCount,
            'followersCount' =>$followersCount,
            'followingCount' =>$followingCount,
            

        ]);
    }
    public function edit(User $user)
    {   
      
        // $user = User::findOrFail($user);
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }
    public function update(User $user)
    {
        $this->authorize('update',$user->profile);
        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url' => 'url',
            'image' => '',            
        ]);

       

        if(request('image')){
            $imagePath=request('image')->store('profile','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
        $image->save();

        $imageArray= ['image'=>$imagePath];//pravim go na promenliva za da moje kato updatevame da moje da updatnem bez snimka
        }


        auth()->user()->profile->update(array_merge(
        $data,
        $imageArray ?? [],//vzemame promenlivata ot po gornite redove
        ));

        return redirect("/profile/{$user->id}"); 
    }

    public function search(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $search_text = $_GET['query'];
        $users = User::where('username', 'LIKE', '%'.$search_text.'%')->get();
        // dd($follows);
        
        return view('users.search', compact('users','follows'));
    }
}
