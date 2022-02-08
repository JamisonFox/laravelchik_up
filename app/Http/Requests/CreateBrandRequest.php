<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBrandRequest extends FormRequest
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
        $id = (is_object($this->brand) ? $id = $this->brand->id: $this->brand) ?? null;

        return [
            'name' => 'required|min:3|max:150|unique:brands,name'.$id
        ];
    }
    public function messages()
    {
        return [
            'name.min' =>'слишком короткое имя',
            'name.email' =>'Заянт email man',
            'name.unique' => 'Занято уже',
        ];
    }
}
