<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();


        if (Auth::user()->hasRole("super-admin")) {
            $logs = LogActivity::logActivityLists();

            return view("admin.pages.index", compact("pages", "logs"));
        } else {


            LogActivity::addToLog("Viewing Home Page");
            return redirect()->route("home");


        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::findorfail($id);

        if (Auth::user()->hasPermissionTo("view " . strtolower($page->page_name)) || Auth::user()->hasRole("super-admin")) {


            LogActivity::addToLog("Viewing " . $page->page_name);
            return view('user.pages.show', compact("page"));
        } else {

            LogActivity::addToLog("Trying to view unauthorized " . $page->page_name);
            abort(403, "You don't have permission to view this page");
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
        $page = Page::findorfail($id);

        $users = User::role("user")->get();

        $pages = Page::all();



        return view("admin.pages.edit", compact("page", "users", "pages"));
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
        $page = Page::findorfail($id);

        $page->iframe = $request->iframe;

        $page->save();

        LogActivity::addToLog($page->page_name . " iframe updated");

        return redirect()->back()->withToastSuccess('Succefully Updated!');
    }

    public function updatePageAccess(Request $request, $id)
    {
        $page = Page::findorfail($id);

        $permission = "view " . strtolower($page->page_name);


        if ($request->users) {
            $uncheckedUsers = User::role("user")->whereNotIn("id", $request->users)->get();
        } else {
            $uncheckedUsers = User::role("user")->get();
        }
        foreach ($uncheckedUsers as $key => $user) {
            $user->revokePermissionTo($permission);
        }

        if ($request->users) {
            foreach ($request->users as $key => $user) {
                $user = User::findorfail($user);
                $user->givePermissionTo([$permission]);
            }
        }

        LogActivity::addToLog($page->page_name . " access updated");


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
    }
}
