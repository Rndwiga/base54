<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AdminUserRequest;
use App\Http\Requests\AdminUsersEdit;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return view('portal.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::pluck('name', 'id')->all();
        return view('portal.admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request)
    {
      if(trim($request->password) == '')
      {
        $input = $request->except('password');
      }else {
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
      }
        if($file = $request->file('photo_id'))
        {
          $name = time() . $file->getClientOriginalName();
          $file->move('images', $name);
          $photo = Photo::create(['file' => $name]);
          $input['photo_id'] = $photo->id;
        }
        User::create($input);

        Session::flash('message', 'The user has been CREATED !!');
       return redirect('/admin/users');
      //  return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::findOrFail($id);
        return view('portal.admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('portal.admin.users.edit', compact('user', 'roles'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUsersEdit $request, $id)
    {
          if(trim($request->password) == '')
          {
            $input = $request->except('password');
          }else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
          }
        $user = User::findOrFail($id);
        if($file = $request->file('photo_id'))
        {
          $name = time() . $file->getClientOriginalName();
          $file->move('images', $name);
          $photo = Photo::create(['file' => $name]);

          $input['photo_id'] = $photo->id;
        }
        $user->update($input);

        Session::flash('message', 'The user has been updated :-)');
        return redirect('/admin/users');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //  User::findOrFail($id)->delete();
        $user = User::findOrFail($id);
         unlink(public_path($user->photo->file));
        $user->delete();
        Session::flash('message', 'The user has been deleted :-(');
        return redirect('admin/users');
    }
}
