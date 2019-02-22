<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CardValid;
class CreateLessonRequest extends FormRequest
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
    public function persist()
    {
        auth()->user()->teacher->lessons()->create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'date' => $request->date,
            ]
        );
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'assets' => new CardValid
        ];
    }
}
