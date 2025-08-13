<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    private const string PARAM_USERNAME = 'username';
    private const string PARAM_PASSWORD = 'password';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            self::PARAM_USERNAME => 'required|string',
            self::PARAM_PASSWORD => 'required|string'
        ];
    }

    public function getUsername(): string
    {
        return $this->str(self::PARAM_USERNAME);
    }

    public function getPassword(): string
    {
        return $this->str(self::PARAM_PASSWORD);
    }
}
