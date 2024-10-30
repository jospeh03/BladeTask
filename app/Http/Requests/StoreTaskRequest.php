<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class StoreTaskRequest extends FormRequest
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
            'title'=>'required|string',
            'description'=>'sometimes|string|min:2|max:1000',
            'due_date'=>'required|date|after_or_equal:now',
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
