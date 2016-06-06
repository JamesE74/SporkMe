<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Spork;
use App\SporkType;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class SporkController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Input Validation
        $this->validate($request, [
            'profile_id' => 'required|exists:profiles,id',
            'spork_type_id' => 'required|exists:spork_types,id',
        ]);

        // Create the spork
        $spork = new Spork;
        $spork->profile_id = Input::get('profile_id');;
        $spork->spork_type_id = Input::get('spork_type_id');

        // Get the spork type and the nickname from the profile
        $sporkName = SporkType::find($spork->spork_type_id)->name;
        $profileNickname = Profile::find($spork->profile_id)->nickname;

        // Save
        if ($spork->save()){
            Flash::success('You sucessfully '.strtolower($sporkName).'ed '.$profileNickname.".");
        }

        return redirect('profiles');
    }

}
