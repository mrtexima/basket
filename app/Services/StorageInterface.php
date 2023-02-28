<?php

namespace App\Services;

interface StorageInterface
{
    public function get($key);
    public function set($key, $value);
    public function unset($key);
    public function has($key);
    public function all();
    public function clear();
}