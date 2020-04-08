<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Resources\Users as UserResource;

class UsersController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //view all the users
       
        return User::all();
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
        //validating the inputs on the server
       
        $request->validate([
            'name' => 'required',
            'sirname' => 'required',
            'email' => 'required',
            'password'=> 'required|min:10'
        
        ]);

            //create new user object
            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->sirname = $request->sirname;
            $newUser->email = $request->email;
            $hashedPassword = Hash::make($request->password);
            $newUser->password =  $hashedPassword;
            $newUser -> save();

            return $newUser;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //the single user with the specified id
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //check if the business to update exists in our database
        $userToupdate = User::find($id);

        if ($userToupdate) {
            # check if the request body is not null

            if ($request) {
                # update that user

                    $userToupdate->name = $request->name;
                    $userToupdate->sirname = $request->sirname;
                    $userToupdate->email = $request->email;
                    $userToupdate->email_verified_at = $request->email_verified_at;
                    $hashedPassword = Hash::make($request->password);
                    $userToupdate->password =  $hashedPassword;
                    $userToupdate -> save();

            return $userToupdate;
            }else{
                return $request->json([
    
                    "error" => "the request is null"
                ]);
            }
        }else{
            return $request->json([

                "error" => "the user to update does no exist"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }
}
