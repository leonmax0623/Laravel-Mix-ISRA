<?php

namespace App\View\Components\Admin\Pages\Faq;

use Illuminate\View\Component;

class Question extends Component {
    public $id;
    public $question;
    public $answer;

    public function __construct($id, array $question, array $answer) {
        $this->id = $id;
        $this->question = $question;
        $this->answer = $answer;
    }

    public function render() {
        return view('components.admin.pages.faq.question');
    }
}
