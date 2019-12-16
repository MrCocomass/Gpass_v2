<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use App\User;


class UserController extends Controller
{

    public function index()
    {
        //
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

            if (empty($email)){
                return $this->error (401, 'Por favor introduce un email');
            }

            if (empty($password)){
                return $this->error (401, 'Por favor introduce el password');
            }

        $users = User::where('email', $email)->get();

            if ($users->isEmpty()) { 
                return $this->error(400, "Ese usuario no existe, por favor introduce un email correcto");
            }
         
        $userDecrypt = User::where('email', $email)->first();
        $passwordHold = $userDecrypt->password;
        $decryptedPassword = decrypt($passwordHold);

        $key = $this->key;

            if (self::checkLogin($email, $password)){
            
                $usersave = User::where('email', $email)->first();


                    $array = $arrayName = array(

                        'id' => $usersave->id,
                        'name' => $usersave->name,
                        'password' => $password,
                        'email' => $email,
                    );
            
                 $token = JWT::encode($array, $key);
                 return $this->success("user logged", $token);
                //return $this->success("eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwYXNzd29yZCI6IjEzMjQ1NDM1NjczIiwiZW1haWwiOiJqb3NlQG1vbGEuY29tIn0.RUsGCFm5uoL2YyNTdUgXyrqvLj1vKDPKwKceW8-4Xa0");

                    
            }else{

                return response("Los datos no son correctos", 403)->header('Access-Control-Allow-Origin', '*');
            }
    }

    
    public function register()
    {

        if (!isset($_POST['name']) or !isset($_POST['email'])
        or !isset($_POST['password']) or !isset($_POST['id_category'])) 
            {
                return $this->error(401, 'Tienes que rellenar todos los campos');
            }
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id_category = $_POST['id_category'];
        $users = User::where('email', $email)->get();

        foreach ($users as $user) 
        {
            if ($user->email == $email) 
            {
                return $this->error(400, 'El email ya existe, por favor utiliza otro'); 
            }
        }

        if (!empty($name) && !empty($email)
        && !empty($password) && !empty($id_category))
        {
            try
            {
                $users = new User();
                $users->name = $name;
                $users->password = encrypt($password);
                $users->email = $email;
                $users->id_category = $id_category;          
                $users->save();
            }
            

            catch(Exception $e)
            {
                return $this->error(420, $e->getMessage());
            }
                return $this->success('register success');
            }
            else
            {
                return $this->error(400, 'fill empty parameters');
            }
    }

    
    public function show(User $user)
    {
        $user = User::all();
        return $this->createResponse(200, 'user', array('users' => $user));
    }

    
    public function update(Request $request, User $user)
    {
        //
    }

}
