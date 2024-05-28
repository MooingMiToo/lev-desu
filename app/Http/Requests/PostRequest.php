<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'post.title' => 'required|string|max:100',
            'post.feature' => 'required|string|max:4000',
            'post.category_id' => 'required|integer|exists:categories,id',
            'post.efficacy' => 'required|string|max:255',
            'post.attention' => 'nullable|string|max:255',
            'post.remark' => 'nullable|string|max:255',
            'post.image' => 'nullable|image|max:2048', 
            'usages.*' => 'nullable|string|max:255',
        ];
    }
}
