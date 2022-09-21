<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    private $table = 'news_posts';
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
        $id       = $this->id;
        $condName = "bail|required|between:5,100|unique:$this->table,name";
        // edit
        if (!empty($id)) {
            $condName .= ",$id";
        }

        return [
            'name'   => $condName,
        ];
    }
}
