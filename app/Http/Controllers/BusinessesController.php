<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Business;

class BusinessesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Business::all();
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
       

       $validate = $request->validate([
            'Company' => 'required',
            'location' => 'required',
            'Manager' => 'required',
            'Phone' => 'required',
            'fax' => 'required',
            'website' => 'required',
            'user_id' => 'required'
        ]);

        if ($validate) {
            # add the business
            $newBus = new Business();

            $newBus->Company = $request->Company;
            $newBus->location = $request->location;
            $newBus->Manager = $request->Manager;
            $newBus->Phone = $request->Phone;
            $newBus->fax = $request->fax;
            $newBus->website = $request->website;
            $newBus->user_id = $request->user_id;
    
            $newBus-> save();
            return $newBus;
        }else
        {
            return response()->json([
                "error" => "the make sure all the fields are submitted"
            ]);
        }

       

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show one business
        
        $onebus =  Business::find($id);
        if($onebus){
            return $onebus;

        }else {
            
            return response()->json([
                'message' => 'Your resource was not found'
            ]);
        }
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
        //update a business wth the id = $id
        //checking if that business exist in our database

        $updated = Business::find($id);

        if($updated){
            if ($request) {
                # update the resorce

                $updated->Company = $request->Company;
                $updated->location = $request->location;
                $updated->Manager = $request->Manager;
                $updated->Phone = $request->Phone;
                $updated->fax = $request->fax;
                $updated->website = $request->website;
                $updated->user_id = $request->user_id;

                $updated-> save();

                return $updated;
            }else {
            return response()->json([
                "message" => "the service to udate is not found"
            ]);
        }
            

        }else {
            return response()->json([
                "message" => "the service to udate is not found"
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
      Business::deSTROY($id);

       

        return response()->json([
            "message" => "successful deleted the specified business"
        ]);

    }
}
