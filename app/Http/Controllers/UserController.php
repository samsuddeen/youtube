<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Mime\Message;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // in this method we can store or update data on table so we not need to use ACID flow here like DB::begintransaction
        try {
            $users = User::all();
            return view('index', compact('users'));
        } catch (Throwable $th) {
            return back()->with('error', 'Something Went Wrong' . $th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $data = $request->validated();

            User::create($data);
            DB::commit();
            return redirect()->route(route: 'users.index')->with('success', 'successfully created');
        }
        // catch(Exception $e)
        catch (Throwable $th) // recommend this
        {
            DB::rollBack();
            // if you are still testing or error occur then use this to see the exact erorr but important in production don't use this $th->getMessage()
            return back()->with('error', value: 'something went wrong' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::where('id', $id)->first();
            return view('show', compact('user'));
        } catch (Throwable $th) {
            return back()->with('error', 'Something Went Wrong' . $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $user = User::where('id', $id)->first();
            return view('form', compact('user'));
        } catch (Throwable $th) {
            return back()->with('error', 'Something Went Wrong' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'nullable',
            'email' => 'required',
            'password' => 'required',

        ]);

        DB::beginTransaction();
        try {
            $user = User::where('id', $id)->first();
            //  dd($user);
            $user->update($request->only('name', 'email', 'password'));
            DB::commit();

            return redirect()->route('users.index')->with('success', value: 'successfully updated');
        } catch (Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something Went Wrong' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $user = User::where('id', $id)->first();
            $user->delete();
            return redirect()->back()->with('success', value: 'successfully deleted');
        } catch (Throwable $th) {
            return back()->with('error', 'Something Went Wrong' . $th->getMessage());
        }
    }
}
