<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy("id", "desc")->get();
        return view("admin.users.index", compact("users"));
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

        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email,except,id",
            "password" => "required|min:8",
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        $user->assignRole("user");
        $user->givePermissionTo([$request->pages]);

        LogActivity::addToLog("New user " . $user->name . " with email " . $user->email . " has been created");


        return redirect()->route("admin.users.index")->withToastSuccess('Succefully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);

        $pages = Page::all();


        return view("admin.users.edit", compact("user", "pages"));
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

        $user = User::findorfail($id);
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email," . $user->id,


        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password != "") {

            $request->validate([
                "password" => "required|min:8",
            ]);

            $user->password = bcrypt($request->password);
        }
        $user->save();


        LogActivity::addToLog($user->name . " with email " . $user->email . " details has been updated");
        return redirect()->back()->withToastSuccess('Succefully Updated!');
    }

    public function updatePageAccess(Request $request, $id)
    {
        $user = User::findorfail($id);


        if ($request->pages !== NULL) {
            $uncheckedPages = Page::whereNotIn("id", $request->pages)->get();
        } else {
            $uncheckedPages = Page::all();
        }
        foreach ($uncheckedPages as $key => $page) {

            $permission = "view " . strtolower($page->page_name);

            $user->revokePermissionTo($permission);
        }
        if ($request->pages) {
            foreach ($request->pages as $key => $pg) {

                $page = Page::findorfail($pg);
                $permission = "view " . strtolower($page->page_name);
                $user->givePermissionTo([$permission]);
            }
        }
        LogActivity::addToLog($user->name . " with email " . $user->email . " page access has been updated");

        return redirect()->back()->withToastSuccess('Succefully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);

        LogActivity::addToLog($user->name . " with email " . $user->email . " deleted");


        $user->delete();



        return redirect()->route("admin.users.index")->withToastSuccess('Succefully Deleted!');
    }
}
