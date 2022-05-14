<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeRequest extends FormRequest
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
            'carId' => 'required|exists:App\Models\Car,id',
            'userId' => 'required|exists:App\Models\User,id'
        ];
    }

    protected function prepareForValidation() 
    {
        $this->merge(['carId' => $this->route('carId')]);
        $this->merge(['userId' => $this->route('userId')]);
    }
}
