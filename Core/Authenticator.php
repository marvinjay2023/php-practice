<?php 

namespace Core;

class Authenticator{

    public function attemp($email, $password){

        $user = App::resolve(Database::class)->query('select * from users where email = :email',[
            'email' => $email
        ])->fetch();

        if($user){

            if(password_verify($password, $user['password'])){
        
                $this->login([
                    'name' => $user['name']
                ]);
            
                return true;
            
            }
            
        }

        return false;
        
    }

    public function login($user){

        $_SESSION['user'] = [
            'name' => $user['name']
        ];
    
        session_regenerate_id(true);
    }
    
    public function logout(){
    
        Session::destroy();
    
    }

} 