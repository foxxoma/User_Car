<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;
use App\Dto\Car\CarUpdateDto;

class CarUpdateRequest extends FormRequest
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
            'id' => 'required|exists:App\Models\Car,id',
            'name' => 'required',
            'userId' => 'nullable|exists:App\Models\User,id'
        ];
    }

    protected function prepareForValidation() 
    {
        $this->merge(['id' => $this->route('id')]);
    }

    public function getDto(): CarUpdateDto
    {
        return new CarUpdateDto(
            $this->id,
            $this->get('name'), 
            $this->get('userId'),
        );
    }
}
