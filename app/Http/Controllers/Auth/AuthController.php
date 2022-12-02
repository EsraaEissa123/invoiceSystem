<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\UserResources;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\TokenRepository;
use App\Http\Requests\Auth\LoginFormRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\RegisterFormRequest;

class AuthController extends Controller
{
    public function register(RegisterFormRequest $request)
    {
        $user = User::create([
          'name' => $request->name,
          'inventory_id'=>$request->inventory_id,
          'email' => $request->email,
          'password' => Hash::make($request->password),
        ]);
        $token = $user->createToken('User')->accessToken;

        $user['token']=$token;

        return response()->json(['status' => true, 'msg' => 'You are registered', 'data' => $user]);
      }

    public function login(LoginFormRequest $request)
    {
        $is_user = Auth::attempt([
          'email' => $request->email,
          'password' => $request->password,
        ]);

        if ($is_user) {
          $user  =  auth()->user();
          $token  =  $user->createToken($user)->accessToken;
          $user['token'] = $token;

          return new UserResources($user);
        } else {
          return response()->json(['status' => false, 'msg' => 'You are not authenticated']);
        }
      }

    // public function logout(Request $request)
    // {
    //     auth()->user()->token()->revoke();
    //     return response()->json(['status' => true, 'msg' => 'Logout Successflluy']);
    //   }
    public function logout(){
      auth()->user()->tokens()->delete();
      return response()->json([
          'status'=>200,
          'message'=>'logged out successfully',
      ]);
  }
    }
