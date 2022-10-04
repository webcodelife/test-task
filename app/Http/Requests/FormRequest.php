<?php

namespace App\Http\Requests;

use App\DTO\FormDTO;
use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;
use Illuminate\Contracts\Validation\Validator;

class FormRequest extends LaravelFormRequest
{
    public ?Validator $formValidator = null;


    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed|string|min:6|max:10',
        ];
    }

    /** @return array<string, string> */
    public function attributes(): array
    {
        return [
            'name' => __('Name'),
            'surname' => __('Surname'),
            'email' => __('E-mail'),
            'password' => __('Password'),
            'password_confirm' => __('Password confirm'),
        ];
    }

    public function getDTO(): FormDTO
    {
        $data = $this->all();

        return new FormDTO(
            (string) $data['name'],
            (string) $data['surname'],
            (string) $data['email'],
            (string) $data['password']
        );
    }

    public function failedValidation(Validator $validator)
    {
        $this->formValidator = $validator;
    }

    public function authorize(): bool
    {
        return true;
    }
}
