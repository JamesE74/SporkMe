<?php

namespace App\Http\Controllers;

use App\Profile;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return the list view of profiles to the index view.
        return View('profile.index', [
            'user' => Auth::User(),
            'profiles' => Profile::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return create view.  No data needed.
        return View('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate Input
        $this->validate($request, [
            'nickname' => 'required|max:255',
            'spoon_reason' => 'required',
            'fork_reason' => 'required'
        ]);

        // Create the profile
        $profile = new Profile;
        $profile->user_id = Auth::user()->id;
        $profile->nickname = Input::get('nickname');
        $profile->spoon_reason = Input::get('spoon_reason');
        $profile->fork_reason = Input::get('fork_reason');

        // Save
        if ($profile->save()){
            Flash::success('You just created a profile.  Prepare to be forked!');
        }

        return redirect('profiles');

    }
}
