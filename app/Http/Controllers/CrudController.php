<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return 'index method';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
              return 'create method';

    }

    /**
     * Store a newly created resource in storage.
     */

    //post method 
    public function store(Request $request)
    {
             return 'store method';

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        

               return 'show method';

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
              return 'edit method';

    }

    /**
     * Update the specified resource in storage.
     */

    //post method
    public function update(Request $request, string $id)
    {
             return 'update method';

    }

    /**
     * Remove the specified resource from storage.
     */

    //delete method
    public function destroy(string $id)
    {
              return 'destroy method';

    }
}
