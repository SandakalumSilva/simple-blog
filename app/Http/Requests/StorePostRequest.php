<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Flasher\Laravel\Facade\Flasher;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // For now, let's assume anyone can create a post.
        // This can be changed later based on authentication/authorization logic.
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
            'title' => 'required|max:255',
            'body' => 'required',
        ];

    }

     public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        // Trigger error notifications for each validation error
        foreach ($validator->errors()->all() as $error) {
            Flasher::error($error);  // Show each error as an error notification
        }

        // Redirect back with validation errors
        parent::failedValidation($validator);
    }
}
