<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerRequest extends FormRequest
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
        //Se accede al vendedor actual por medio de la ruta para ignorar su email
        $sellerId = $this->route('seller')->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            //El email sera unico en vendedores excepto para su id actual
            'email' => ['required', 'email', Rule::unique('sellers', 'email')->ignore($sellerId)],
            'lot_id' => ['required', 'exists:lots,id'],
        ];
    }
}
