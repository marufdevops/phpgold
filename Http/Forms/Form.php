<?php

namespace Http\Forms;

use Core\ValidationException;

class Form
{
    protected array $errors = [];

    public function __construct(public $attributes = [])
    {
        if (isset($this->attributes['email']) && \Core\Validator::isEmpty($attributes['email'])) {
            $this->errors['email'] = "Email is required";
        }
        if (isset($this->attributes['password']) && \Core\Validator::isTooLong($attributes['password'], 1)) {
            $this->errors['password'] = "Password is too long";
        }
    }

    public static function validate($attributes): static
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw(): void
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(): bool
    {
        return !empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($key, $value): static
    {
        $this->errors[$key] = $value;
        return $this;
    }
}