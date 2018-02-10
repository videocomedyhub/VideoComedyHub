<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\SettingRepository;

class SettingComposer {

    protected $settingsRepo;

    public function __construct(SettingRepository $settings) {
        $this->settingsRepo = $settings;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view) {
        
        $social = $this->settingsRepo->findByField('group', 'social-link', ['key', 'value']);
        $links = [];
        foreach ($social as $s) {
            $links[$s->key] = $s->value;
        }
        $view->with('socials', $links);
    }

}
