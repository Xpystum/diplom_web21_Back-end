<?php

namespace App\Http\Requests\Sign;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{   
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
    return [
            'title.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'bail|required|unique:users|max:100|email:rfc,dns|string|',
            'pass' => 'bail|required|min:6|max:255|string|',
            'passRepeat' => 'required|same:pass|',
        ];  
    }
}
