<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AffiliatesFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'cpf' => ['required', 'min:14', 'max:14', function($attribute, $value, $fail) {
                if (!$this->isValidCPF($value)) {
                    $fail('O CPF informado é inválido.');
                }
            }],
            'birthdate' => 'required',
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:11', 'max:11'],
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.min' => 'O campo CPF precisa ter pelo menos :min caracteres.',
            'cpf.max' => 'O campo CPF precisa ter no máximo :max caracteres.',
            'birthdate.required' => 'O campo data nascimento é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail informado é inválido.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'phone.min' => 'O campo telefone precisa ter pelo menos :min caracteres.',
            'phone.max' => 'O campo telefone precisa ter no máximo :max caracteres.',
            'address.required' => 'O campo endereço é obrigatório.',
            'state.required' => 'O campo estado é obrigatório.',
            'city.required' => 'O campo cidade é obrigatório.',
        ];
    }

    /**
     * Função para validar o CPF
     *
     * @param string $cpf
     * @return bool
     */
    private function isValidCPF($cpf)
    {
        // Remove todos os caracteres não numéricos
        $cpf = preg_replace('/\D/', '', $cpf);

        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se o CPF é uma sequência de números iguais
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Calcula o primeiro dígito verificador
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += $cpf[$i] * (10 - $i);
        }
        $firstCheckDigit = 11 - ($sum % 11);
        if ($firstCheckDigit == 10 || $firstCheckDigit == 11) {
            $firstCheckDigit = 0;
        }

        // Calcula o segundo dígito verificador
        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $sum += $cpf[$i] * (11 - $i);
        }
        $secondCheckDigit = 11 - ($sum % 11);
        if ($secondCheckDigit == 10 || $secondCheckDigit == 11) {
            $secondCheckDigit = 0;
        }

        // Verifica se os dígitos verificadores calculados são iguais aos fornecidos
        if ($cpf[9] == $firstCheckDigit && $cpf[10] == $secondCheckDigit) {
            return true;
        }

        return false;
    }
}
