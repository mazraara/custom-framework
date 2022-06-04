<?php

namespace App\Foundation;

use ArrayAccess;

class Container implements ArrayAccess
{
    protected array $items = [];

    protected array $cache = [];

    public function __construct(array $items = [])
    {
        foreach ($items as $key => $item) {
            $this->offsetSet($key, $item);
        }
    }

    public function offsetSet($offset, $value): void
    {
        $this->items[$offset] = $value;
    }

    public function offsetGet($offset): mixed
    {
        if (!$this->has($offset)) {
            return null;
        }

        if (isset($this->cache[$offset])) {
            return $this->cache[$offset];
        }

        $item = call_user_func($this->items[$offset], $this); // similar to: $item = $this->items[$offset]($this);

        $this->cache[$offset] = $item;

        return $item;
    }

    public function offsetUnset($offset): void
    {
        if ($this->has($offset)) {
            unset($this->items[$offset]);
        }
    }

    public function offsetExists($offset): bool
    {
        return isset($this->items[$offset]);
    }

    public function has($offset): bool
    {
        return $this->offsetExists($offset);
    }

    public function __get($property)
    {
        return $this->offsetGet($property);
    }
}
