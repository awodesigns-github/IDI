<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'hostname' => 'required',
            'ip_address' => 'required',
            'purpose_id' => 'required',
            'environment_id' => 'required',
            'operating_system_id' => 'required',
            'server_type_id' => 'required',
            'server_memory' => 'required',
            'disk_space' => 'required'
        ];
    }

}
