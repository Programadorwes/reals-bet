<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required',
            'password' => ['required', 'min:6'],
            'email' => [
                'required',
                'email',
                $this->isMethod('post')
                    ? 'unique:users,email'
                    : 'unique:users,email,' . $this->route('user')->id,
            ],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.',
            'email.unique' => 'O e-mail informado já está em uso. Por favor, utilize um e-mail diferente.',
            'password.min' => 'O campo senha precisa de pelo menos :min caracteres.',
        ];
    }
}
