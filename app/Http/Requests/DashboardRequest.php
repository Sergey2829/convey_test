<?php

namespace App\Http\Requests;

use App\Models\Domain;
use Illuminate\Foundation\Http\FormRequest;

class DashboardRequest extends FormRequest
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
            'domain' => [
                'required',
                'string',
                'max:255',
            ]
        ];
    }

    /**
     * Get the validated domain data.
     */
    public function getFormattedDomain(): string
    {
        return Domain::formatDomain($this->validated()['domain']);
    }

    public function isValidDomain(): bool
    {
        return Domain::isValidDomain($this->validated()['domain']);
    }

}
