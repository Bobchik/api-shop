<?php
/**
 * Created by PhpStorm.
 * User: Bobka
 * Date: 24.06.2018
 * Time: 9:53
 */

namespace App\Http\Interfaces;


interface Connector
{
    public function create($connection);

    public function update($connection);

//    public function store($connection);

    public function destroy($connection);
}