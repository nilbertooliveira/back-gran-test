<?php

namespace App\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StoreProductRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'unique:products', 'max:255'],
            'photo' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string', 'max:255'],
            'file' => ['required', 'image', 'file'],
            'category_id' => ['required', 'exists:categories,id']
        ];
    }
}
