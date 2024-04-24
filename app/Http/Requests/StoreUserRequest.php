<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'department_id' => ['required', Rule::exists('departments', 'id')],
            'program_id' => ['required', Rule::exists('programs', 'id')],
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'status_id' => ['required', Rule::exists('statuses', 'id')],
        ];
    }
}
