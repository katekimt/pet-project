<?php

namespace App\Service;

use App\DTO\RegisterDTO;
use App\Repository\UserRepository;
use Validator;
use Illuminate\Http\JsonResponse;

class RegisterService
{
    public function __construct(
       private UserRepository $rUser,
    ){
    }

    public function run(RegisterDTO $registerDTO): JsonResponse|array
    {
        $validator = $this->getValidator($registerDTO);

        if($validator->fails()){
            return response()->json(['Validation Error.', $validator->errors()]);
        }
        $user = $this->rUser->save($registerDTO);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        return $success;

    }

    private function getValidator(RegisterDTO $registerDTO)
    {
        return Validator::make((array)$registerDTO, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
    }

}
