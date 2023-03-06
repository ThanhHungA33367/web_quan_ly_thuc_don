<?php

//namespace App\Rules;
namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Rule;
use App\Models\Menu_Dish;

class UniqueDishMealPairRule implements Rule
{
    public function passes($attribute, $value)
    {
        $existingPairs = Menu_Dish::whereIn('meal_id', $value)->whereIn('dish_id', $value)->get();
        return $existingPairs->count() === 0;
    }

    public function message()
    {
        return 'The :attribute must be unique for the combination of meal and dish.';
    }
}
