<?php

/**
 * This file dispatch routes.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

use App\Controller\HomeController;
use App\Controller\CategoryController;
use App\Controller\ReferenceController;

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/' === $urlPath) {
    /*
     * home page
     */
    echo (new CategoryController())->browse();
} elseif ('/categories' === $urlPath) {
    /*
     * browse category page
     */
    echo (new CategoryController())->browse();
} elseif ('/references' === $urlPath) {
    /*
     * browse reference page
     */
    echo (new ReferenceController())->browse($_GET["category"]);
} elseif ('/references/add' === $urlPath) {
    /*
    * Add reference page
    */
    echo (new ReferenceController())->add();
} else {
    header('HTTP/1.1 404 Not Found');
}
