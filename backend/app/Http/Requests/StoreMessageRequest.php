<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            //
            'message' => ['required', 'string'],
            'senderId' => ['required', 'integer'],
            'recipientId' => ['required', 'integer'],
            'sender_id' => ['sometimes', 'integer'],
            'recipient_id' => ['sometimes', 'integer']
        ];
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'sender_id' => $this->senderId,
            'recipient_id' => $this->recipientId
        ]);
    }
}
