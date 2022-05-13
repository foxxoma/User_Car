<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;
use App\Dto\Car\CarCreateDto;

class CarCreateRequest extends FormRequest
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
            'name' => 'required',
            'userId' => 'nullable|exists:App\Models\User,id'
        ];
    }

    public function getDto(): CarCreateDto
    {
        return new CarCreateDto(
            $this->get('name'), 
            $this->get('userId'),
        );
    }
}
