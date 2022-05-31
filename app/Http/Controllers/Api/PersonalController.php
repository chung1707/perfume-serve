<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use App\Models\Order;
use App\Models\AppConst;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePassRequest;
use App\Http\Requests\ChangeInforRequest;


class PersonalController extends Controller
{
    public function orders(Request $request)
    {
        $orders = Order::where('user_id', '=', $request[0])->with('products','discount')->orderBy('id', 'desc')->paginate(AppConst::DEFAULT_ORDER_PER_PAGE);
        return response()->json([
            'orders' => $orders,
        ]);
    }
    public function changeInfor(ChangeInforRequest $request)
    {
        try {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->update();
        } catch (Exception $e) {
            return response()->json(['error' => $e, 'status' =>401]);
        };
        return response()->json(['user' => $user, 'status' =>201]);
    }
    public function changePass(ChangePassRequest $request){
        $currentUser = User::find(auth('sanctum')->user()->id);
        if(Hash::check($request->currentPass,$currentUser->password))
        {
            $currentUser->update(['password' => bcrypt($request->password)]);
            return response()->json(['result'=> 'Đổi mật khẩu thành công!','success' => true]);
        }
        return response()->json(['result'=>'Mật khẩu hiện tại của bạn không chính xác!', 'success' => false]);
    }
}
