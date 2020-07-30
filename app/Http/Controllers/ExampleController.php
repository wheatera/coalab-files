<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;

class ExampleController extends Controller
{
    /**
     * @var JWTAuth
     */
    protected $jwt;

    /**
     * ExampleController constructor.
     * @param JWTAuth $jwt
     */
    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function login(Request $request)
    {
        // DB::table('users')->insert([
        //     'email' => 'user@163.com',
        //     'password' => Hash::make($request->input('password')),
        //     'name' => 'cjx',
        // ]);
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        try {
            $user = User::where('email', $request->input('email'))
                ->first();
            if (Hash::check($request->input('password'), $user->password)) {
                $token = Auth::login($user);
            }
            // if (!$token = $this->jwt->attempt($request->only('email', 'password'))) {
            //     return response()->json(['user_not_found'], 404);
            // }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent' => $e->getMessage()], 500);

        }

        return response()->json(compact('token'));
    }


    public function test()
    {
        // dd($token = Auth::refresh(true, true));
        // 获取认证配置信息
        dd(Auth::guard('api'));
        $token = $this->jwt->getToken();
        $this->jwt->user();
        $data = $this->jwt->setToken($token)->toUser();
        return response()->json(['user' => $data]);
        // echo "inside controller";
    }
}
