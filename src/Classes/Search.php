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

    /**
     * @var boolean
     */
    public $promo = false;

    /**
     * @var boolean
     */
    public $best = false;

    /**
     * @var null|integer
     */
    public $min;

    /**
     * @var null|integer
     */
    public $max;

    /**
     * @var integer
     */
    public $page = 1;
}