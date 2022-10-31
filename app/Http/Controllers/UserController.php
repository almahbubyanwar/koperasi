<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);
        $create = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'level' => $request->level
        ]);
        if ($create) {
            return redirect()->route('user.index')->with('success', 'Data berhasil diinput.');
        }
        return redirect()->route('user.index')->with('failure', 'Data gagal diinput.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'oldPassword' => 'required',
            'level' => 'required'
        ]);
        $user = User::where('userId', $request->id)->first();
        if (Hash::check($request->oldPassword, $user->password)) {
            if ($request->newPassword) {
                $array = array(
                    'name' => $request->name,
                    'password' => Hash::make($request->newPassword),
                    'level' => $request->level
                );
            }   
            else {
                $array = array(
                    'name' => $request->name,
                    'level' => $request->level
                );
            }
            $update = User::where('userId', $request->id)->update($array);
            if ($update) {
                return redirect()->route('user.index')->with('status', 'Berhasil mengupdate user.');
            }
        }
        return redirect()->route('user.index')->with('status', 'Gagal mengupdate user.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::where('userId', $id)->delete();
        if ($delete) {
            return redirect()->route('user.index')->with('status', 'Data berhasil dihapus.');
        }
        return redirect()->route('user.index')->with('status', 'Data gagal dihapus.');
    }

    public function getData($id) {
        $user = User::where('userId', $id)->first(['userId', 'name', 'level']);
        return response($user, 200);
    }
}
