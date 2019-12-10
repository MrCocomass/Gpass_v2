<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use \Firebase\JWT\JWT;
use App\User;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $key = '7kvP3yy3b4SGpVzd6uSeSBhBEDtGzPb2n';

    function createResponse($code, $message, $data = [])
    {
        if ($data == null) {
           $data = (object)[];
        }
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }

    protected function error($code, $message)
    {
        return  response()->json([
            'code' => $code,
            'message' => $message
        ], $code);
    }

    protected function success($message, $data = [])
    {
        $json = ['message' => $message, 'data' => $data];
        $json = json_encode($json);
        return  response($json, 200)->header('Access-Control-Allow-Origin', '*');
    }

    protected function checkLogin($email, $password)
    {
        $usersave = User::where('email', $email)->first();
            $emailsave = $usersave->email;
            $passwordsave = $usersave->password;
            $decryptedsave = decrypt($passwordsave);

            if($emailsave == $email && $decryptedsave == $password)
                    {
                     return true;
                    }
                        return false;
    } 
}