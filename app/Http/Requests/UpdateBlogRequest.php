<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'category_id' => 'required',
            'title' => 'required|max:150|unique:blogs,title,' . request()->route('blog')->id,
            'type' => 'required|array|min:1',
            'content' => 'required|array|min:1',
            'tags' => 'required|max:150',
            'meta_desc' => 'required|max:150',
        ];
    }
}
