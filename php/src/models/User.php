<?php
class User
{
    public $id;
    public $name;
    public $username;
    public $email;
    public $adress;
    public $phone;
    public $company;

    function __construct(array $user)
    {
        [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'adress' => $this->adress,
            'company' => $this->company,
        ] = $user;
    }

    public function toDTO(): array
    {
        $dto = [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'adress' => $this->adress,
            'company' => $this->company,
        ];

        return $dto;
    }
}