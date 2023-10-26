<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->route()->getActionMethod() === 'store') {
            $rules = [
                'name' => 'required|str ing|max:255',
                'email' => 'required|unique:users,email|email|max:255',
                'password' => 'required|string|min:8|confirmed',
            ];
        } else if ($this->route()->getActionMethod() === 'update') {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|string|min:8|confirmed',
            ];
        } else {
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|string|min:8',
            ];
        }
        return $rules;
    }
}
