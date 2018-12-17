<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipperRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:6|max:255',
            'email' => 'required|email|min:6|max:255|unique:users',
            'address' => 'required',
            'phone' => 'required',
            'identity_number' => 'required',
        ];

        switch ($this->method()) {
            case 'POST':
                break;

            case 'PUT':
                $rules['email'] = 'required|email|min:6|max:255|unique:users,email,' . $this->get('user_id');
                break;
            
            default:
                # code...
                break;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.min' => trans('validation.min.string', [
                'attribute' => trans('lang.name'),
                'min' => 6,
            ]),
            'name.max' => trans('validation.max.string', [
                'attribute' => trans('lang.name'),
                'max' => 255,
            ]),
            'email.min' => trans('validation.min.string', [
                'attribute' => trans('lang.email'),
                'min' => 6,
            ]),
            'email.max' => trans('validation.max.string', [
                'attribute' => trans('lang.name'),
                'max' => 255,
            ])
        ];
    }
}
