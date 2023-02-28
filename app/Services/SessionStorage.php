<?php

namespace App\Services;

use Countable;

class SessionStorage implements StorageInterface , Countable
{


    public function __construct(private $sessionKey = 'cart')
    {
    }

    public function get($key)
    {
        return session()->get($this->sessionKey . '.' . $key);
    }

    public function set($key, $value)
    {
        return session()->put($this->sessionKey . '.' . $key, $value);
    }

    public function unset($key)
    {
        return session()->forget($this->sessionKey . '.' . $key);
    }

    public function clear()
    {
        return session()->forget($this->sessionKey);
    }

    public function all()
    {
        return session()->get($this->sessionKey) ?? []  ;
    }

    public function has($key)
    {
        return session()->has($this->sessionKey . '.' . $key);
    }

    public function count()
    {
        return count($this->all());
    }
}