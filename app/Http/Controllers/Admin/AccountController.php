<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Models\Role;
use App\Models\AppConst;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\AdminChangeInforRequest;

class AccountController extends Controller
{
    public function getUser($id){
        $user = User::where('id', $id)->with('role')->first();
        $roles = Role::get();
        return response()->json(['user' => $user, 'roles' => $roles]);
    }
    public function clientAccounts(Request $request)
    {
        $client_role_id = 2;
        $clientsQuery = User::where('role_id', $client_role_id);
        if ($request[0]) {
            $key = $request[0];
            $clientsQuery = $clientsQuery->where('name', 'LIKE', "%$key%");
        }
        $clients = $clientsQuery->latest()->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        return response()->json($clients);
    }
    public function employeeAccounts(Request $request)
    {
        $employee_role_id = 3;
        $employeesQuery = User::where('role_id', $employee_role_id);
        if ($request[0]) {
            $key = $request[0];
            $employeesQuery = $employeesQuery->where('name', 'LIKE', "%$key%");
        }
        $employees = $employeesQuery->latest()->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        return response()->json($employees);
    }
    public function adminAccounts(Request $request)
    {
        $admin_role_id = 1;
        $adminsQuery = User::where('role_id', $admin_role_id);
        if ($request[0]) {
            $key = $request[0];
            $adminsQuery = $adminsQuery->where('name', 'LIKE', "%$key%");
        }
        $admins = $adminsQuery->latest()->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        return response()->json($admins);
    }

    public function blockUser(User $user)
    {
        $user->blocked = true;
        $user->save();
    }
    public function unBlockUser(User $user)
    {
        $user->blocked = false;
        $user->save();
    }
    public function deleteUser(User $user)
    {
        try {
            $user->delete();
            return response()->json(['status' => 201, 'name' => $user->name]);
        } catch (\Exception $e) {
            return response()->json(['status' => 401, 'error' => $e]);
        }
    }
    public function changeInfor(AdminChangeInforRequest $request){
        try {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->position = $request->position;
            $user->wage = $request->wage;
            $user->role_id = $request->role_id;
            if($request->avatar && $request->avatar != null &&$request!='' && gettype($request->avatar)!= 'undefined'){
                $user->avatar = $request->avatar;
            }
            $user->update();
        } catch (Exception $e) {
            return response()->json(['error' => $e, 'status' =>401]);
        };
        return response()->json(['user' => $user, 'status' =>201]);
    }
}
