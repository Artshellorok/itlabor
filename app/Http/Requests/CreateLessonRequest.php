<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CardValid;
use App\Asset;
use App\Program;
use App\Video;
use App\Role;
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
    protected $roles = [];
    public function __construct()
    {
        $this->roles = Role::all();
    }
    protected function getRoles($list)
    {
        $roles =[];
        foreach ($this->roles as $role) {
            if (array_key_exists($role->role, $list)) {
                if ($list[$role->role] == "on") {
                    array_push($roles, $role->role);
                } 
            } 
        }
        return $roles;
    }
    public function persist()
    {
        $lesson = auth()->user()->teacher->lessons()->create(
            [
                'name' => request()->name,
                'description' => request()->description,
                'date' => request()->date,
            ]
        );
        foreach (request()->assets as $assetarr) {
            $asset = $lesson->assets()->create([
                'content' => $assetarr['asset'],
            ]);
            $asset->roles()->create($this->getRoles($assetarr));
        } 
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
            'assets' => new CardValid,
            'programs' => new CardValid,
            'link' => new CardValid,
        ];
    }
}
