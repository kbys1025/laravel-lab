<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
        return [
            'todo_category_id' => 'required',
            'title' => 'required|max:50',
            'deadline' => 'nullable|date',
            'text' => 'max:255',
        ];
    }

    public function attributes()
    {
        return [
            'todo_category_id' => 'カテゴリ',
            'title' => 'タイトル',
            'deadline' => '期限',
            'text' => 'メモ',
        ];
    }
}
