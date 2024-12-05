<?php 

namespace Http\Form;

use Core\ValidationException;
use Core\Validator;

class LoginForm{

    protected $errors = [];

    public function __construct(public array $attributes){

        if(!Validator::email($attributes['email'])){
            $this->errors['email'] = 'Please enter a Valid Email';
        }

        if(!Validator::string($attributes['password'])){
            $this->errors['password'] = 'Provide Valid Password';
        }

    }

    public static function validate($attributes){
 

        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;

    }

    public function throw(){

        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(){
        
        return count($this->errors);

    }

    public function errors(){

        return $this->errors;

    }

    public function error($field, $message){

        $this->errors[$field] = $message;

        return $this;

    }


}