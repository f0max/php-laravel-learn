<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    private const string PARAM_USERNAME = 'username';
    private const string PARAM_EMAIL = 'email';
    private const string PARAM_LAST_NAME = 'last_name';
    private const string PARAM_FIRST_NAME = 'first_name';
    private const string PARAM_GENDER = 'gender';
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
            self::PARAM_USERNAME => 'required|string|max:50|unique:users,username',
            self::PARAM_EMAIL => 'required|string|email|unique:users,email',
            self::PARAM_LAST_NAME => 'string|max:50',
            self::PARAM_FIRST_NAME => 'string|max:50',
            self::PARAM_GENDER => 'in:male,female',
            self::PARAM_PASSWORD => 'required|string|min:8'
        ];
    }

    public function getUsername(): string
    {
        return $this->str(self::PARAM_USERNAME);
    }

    public function getEmail(): string
    {
        return $this->str(self::PARAM_EMAIL);
    }

    public function getLastName(): string
    {
        return $this->str(self::PARAM_LAST_NAME);
    }

    public function getFirstName(): string
    {
        return $this->str(self::PARAM_FIRST_NAME);
    }

    public function getGender(): string
    {
        return $this->str(self::PARAM_GENDER);
    }

    public function getPassword(): string
    {
        return $this->str(self::PARAM_PASSWORD);
    }
}
