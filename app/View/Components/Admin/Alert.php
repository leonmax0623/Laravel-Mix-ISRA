<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Alert extends Component {
    public $type;
    public $icon;

    public function __construct(string $type = 'info') {
        $this->type = in_array($type, ['info', 'danger', 'warning', 'success']) ? $type : 'info';
    }

    public function render() {
        return view('components.admin.alert');
    }

    public function getIcon() : string {
        $icons = [
            'info' => 'fa-info',
            'danger' => 'fa-ban',
            'warning' => 'fa-exclamation-triangle',
            'success' => 'fa-check'
        ];

        dd($icons[$this->type]);

        var_dump($icons[$this->type]);

        return $icons[$this->type] ?? '';
    }

    public function hasIcon() : bool {
        dd(2);
        return !empty($this->getIcon());
    }
}
