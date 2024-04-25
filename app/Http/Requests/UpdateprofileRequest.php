<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateprofileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'email' => 'string|email|unique:users,email',
            'phone' => 'string|unique:users,phone',
            'address' => 'string',
            'department_id' => ['string', Rule::exists('departments', 'id')],
            'program_id' => ['string', Rule::exists('programs', 'id')],
            'role_id' => ['string', Rule::exists('roles', 'id')],
            'status_id' => ['string', Rule::exists('statuses', 'id')],
        ];
    }
}
