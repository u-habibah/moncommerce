<?php

namespace App\Classes;

use App\Entity\Category;

/**
 * @package App\Classes
 */
class Search
{
    /**
     * @var Category[]
     */
    public $categories = [];

    /**
     * @var string
     */
    public $q = "";
}