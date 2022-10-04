<?php

namespace App\DTO;

class FormDTO
{
    public function __construct(
        public string $name,
        public string $surname,
        public string $email,
        public string $password,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
