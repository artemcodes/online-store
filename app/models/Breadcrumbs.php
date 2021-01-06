<?php


namespace app\models;

use shop\App;

class Breadcrumbs
{
    public static function getBreadcrumbs($category_id, $name = '')
    {
        $categories = App::$app->getProperty('categories');
        $breadcrumbs_array = self::getParts($categories, $category_id);
        $breadcrumbs = "<li><a href='" . PATH . "'>Главная</a></li>";

        if ($breadcrumbs_array) {
            foreach ($breadcrumbs_array as $alias => $title) {
                $breadcrumbs .= "<li><a href='" . PATH . "/category/{$alias}'>{$title}</a></li>";
            }
        }
        if ($name) {
            $breadcrumbs .= "<li class='active'>$name</li>";
        }

        return $breadcrumbs;

    }

    public static function getParts($categories, $id)
    {
        if(!$id) return false;

        $breadcrumbs = [];

        foreach ($categories as $k => $v) {
            if (isset($categories[$id])) {
                 $breadcrumbs[$categories[$id]['alias']] = $categories[$id]['title'];
                 $id = $categories[$id]['parent_id'];
            } else break;
        }
        return array_reverse($breadcrumbs, true);
    }
}