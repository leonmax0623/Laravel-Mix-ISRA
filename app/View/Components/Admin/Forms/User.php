<?php

namespace App\View\Components\Admin\Forms;

use Illuminate\View\Component;

class User extends Component {
    public $user;

    public function __construct(?\App\Models\User $user = NULL) {
        $this->user = $user;
    }

    public function render() {
        return view('admin.forms.user');
    }
}
