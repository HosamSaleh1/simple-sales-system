<?php

namespace App\Database\Config\CRUD;

interface crud
{
    function create();
    function read();
    function update();
    function delete();
}