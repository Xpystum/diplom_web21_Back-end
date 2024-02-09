<?php

namespace App\Http\Requests;

use App\Actions\CheckTokenUser;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;

class ChatMessageSendFormRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(CheckTokenUser $checkTokenUser): bool
    {      
        $token = $this->bearerToken();
        // return $checkTokenUser->handler($token);
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
            'owner' => ['required', 'integer'],
            'user_minor' => ['required', 'integer'],
            'message' => ['required', 'string', 'min:3'],
            'chatgroup_id' => ['integer', 'nullable'], 
        ];
    }
}
