<?php
// app/Http/Requests/UpdateTaskRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|string',
            'description' => 'sometimes|string|min:2|max:1000',
            'due_date' => 'sometimes|date|after_or_equal:now', // Corrected to due_date
            'status' => 'sometimes|in:Pending,Completed' // Ensure case matches
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        // Throw an HTTP response exception with errors to redirect back with input
        throw new HttpResponseException(
            redirect()->back()->withErrors($validator)->withInput()
        );
    }
}
