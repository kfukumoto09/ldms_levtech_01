<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\UserCategory;  // added to show user_categories at the login session

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.guest');
        // $user_category = new UserCategory;  // added to show user_categories at the login session
        // return view('layouts.guest')->with(['user_categories' => $user_category]);
    }
}
