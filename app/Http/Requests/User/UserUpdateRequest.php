<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Dto\User\UserUpdateDto;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:App\Models\Car,id',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users',
            'password' => 'nullable|string|min:8',
        ];
    }

    protected function prepareForValidation() 
    {
        $this->merge(['id' => $this->route('id')]);
    }

    public function getDto(): UserUpdateDto
    {
        return new UserUpdateDto(
            $this->id,
            $this->get('name'), 
            $this->get('email'),
            $this->get('password'),
        );
    }
}
