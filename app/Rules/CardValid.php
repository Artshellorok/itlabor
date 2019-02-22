<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use \App\Role;
class CardValid implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $roles = [];
    public function __construct()
    {
        $this->roles = Role::all();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $cards)
    {
        foreach ($cards as $card) {
            if ($card[str_singular($attribute)]) {
                foreach ($this->roles as $role) {
                    if (array_key_exists($role->role, $card)) {
                        if ($card[$role->role] == "on") {
                            return true;
                        } 
                    } 
                }
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid';
    }
}
