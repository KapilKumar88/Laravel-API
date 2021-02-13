<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        dd(request()->input('status'));
        if(in_array(strtolower(request()->method()), ['put', 'patch'])){
            return [
                'title'         => 'nullable|max:255|alpha_dash',
                'description'   => 'nullable|max:255|string',
                'status'        => ['required', Rule::in(['open', 'in_progress', 'close'])]
            ];
        }else{
            return [
                'title'         => 'required|max:255|alpha_dash',
                'description'   => 'required|max:255|string',
                'status'        => ['nullable', Rule::in(['open', 'in_progress', 'close'])]
            ];
        }
    }
}
