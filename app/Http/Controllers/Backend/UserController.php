<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function getDisplayUser()
    {
        $data['users'] = User::orderBy('level','asc')->paginate(3);
        return view('backend.user.display', $data);
    }
    public function getAddUser()
    {

        return view('backend.user.add');
    }
    public function postAddUser(Request $request, RegisterRequest $req)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->numberphone = $request->phone;
        $user->level = $request->level;
        $user->save();
        return redirect()->route('getDisplayUser')->with('add_success', 'Thêm user thành công');
    }
    public function getEditUser($id)
    {
        $user['user'] = User::find($id);
        return view('backend.user.edit', $user);
    }
    public function postEditUser(Request $request, $id, RegisterRequest $req)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->numberphone = $request->phone;
        $user->level = $request->level;
        $user->save();
        return redirect()->route('getDisplayUser')->with('update_success', 'Cập nhật user thành công');
    }
    public function postDeleteUser($id)
    {
        $user = User::find($id);
        if($user->level == 2){
        $user->Delete();
        return back()->with('delete_success', 'Xóa user thành công');
        }
        else{
            return back()->with('delete_fail','Không được xóa tài khoản Quản Trị');
        }
    }
    public function getTrashUser()
    {
        $user['user'] = User::onlyTrashed()->get();
        return view('backend.user.trash', $user);
    }
    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        return redirect()->route('getDisplayUser')->with('restore_success', 'Khôi phục user thành công');
    }
    public function getSearchUser(Request $req)
    {
        $users = User::where('name', 'like', '%' . $req->key . '%')
            ->orWhere('email', $req->key)->get();
        return view('backend.user.search', compact('users'));
    }
}
