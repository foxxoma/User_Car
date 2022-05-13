<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Dto\User\UserFindDto;

class UserFindRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:App\Models\User,id'
        ];
    }

    protected function prepareForValidation() 
    {
        $this->merge(['id' => $this->route('id')]);
    }

    public function getDto(): UserFindDto
    {
        return new UserFindDto(
            $this->id,
        );
    }
}
