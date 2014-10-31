<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 26/10/14
 * Time: 12:44 AM
 */

namespace Cartelera\Base;


interface BaseRepoInterface
{
    public function selectAll();

    public function find($id);
} 