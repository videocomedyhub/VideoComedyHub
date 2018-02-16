<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

/**
 * Description of TextHelper
 *
 * @author johnn
 */
class TextHelper {
    public static function shorten($text, $limit) {
        return str_limit($text, $limit);
    }
    
    public static function tagToList($tags) {
        $i = '';
        foreach ($tags as $tag) {
            $i .= $tag->name . ', ';
        }
        return rtrim($i);
    }
}
