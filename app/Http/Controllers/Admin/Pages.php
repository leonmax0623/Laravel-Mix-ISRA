<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class Pages extends Controller {
    public function faq() {
        return view('admin.pages.page-faq');
    }

    public function faqUpdate(Request $request) {
        Question::truncate();

        foreach ($request->post('question') as $id => $question_info) {
            $question = new Question();

            foreach ($question_info['question'] as $code => $value) {
                $question->setTranslation('question', $code, $value);
            }

            foreach ($question_info['answer'] as $code => $value) {
                $question->setTranslation('answer', $code, $value);
            }

            $question->save();
        }

        return redirect()->back();
    }

    public function home() {
        if(request()->isMethod('POST')) {
            $inputs = array_merge([
                'pages_home_image_gallery' => [],
                'pages_home_slider' => []
            ], request()->input());

            foreach($inputs as $key => $value) {
                if (is_null($value) || mb_strpos($key, '_') === 0) {
                    settings()->forget($key);
                } else {
                    settings()->set($key, $value);
                }
            }

            settings()->save();
        }

        return view('admin.pages.page-home');
    }

    public function testimonials() {
        if(request()->isMethod('POST')) {
            $inputs = array_merge([
                'pages_testimonials' => []
            ], request()->input());

            $inputs['pages_testimonials'] = array_filter($inputs['pages_testimonials'], function($testimonial) {
                return !empty($testimonial['date'])
                    && !empty(array_filter($testimonial['fullname'], function ($value) { return $value; }))
                    && !empty(array_filter($testimonial['testimonial'], function ($value) { return $value; }));
            });

            foreach($inputs as $key => $value) {
                if (is_null($value) || mb_strpos($key, '_') === 0) {
                    settings()->forget($key);
                } else {
                    settings()->set($key, $value);
                }
            }

            settings()->save();
        }

        return view('admin.pages.page-testimonials');
    }
}
