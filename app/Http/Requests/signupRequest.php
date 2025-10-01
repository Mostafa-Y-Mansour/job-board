<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "required",
            "email" => "bail|required|string|email|unique:users",
            "password" => "bail|required|string|min:8|confirmed",
        ];
    }
}
