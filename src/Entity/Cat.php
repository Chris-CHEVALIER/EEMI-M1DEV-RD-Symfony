<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use DateTime;

class Cat
{
    // Propriétés
    private int $id;

    #[Assert\NotBlank(message: "Le nom du chat doit être complété !")]
    #[Assert\Length(
        min: 3,
        max: 15,
        minMessage: "Le nom du chat doit faire plus de 3 caractères !",
        maxMessage: "Le nom du chat doit faire moins de 15 caractères !"
    )]
    private string $name;

    #[Assert\NotBlank(message: "L'âge du chat doit être complété !")]
    #[Assert\Range(
        min: 0,
        max: 20,
        notInRangeMessage: 'Le chat doit avoir entre {{ min }} et {{ max }} ans.',
    )]
    private int $age;

    private string $color;

    private string $breed;

    private string $image;

    private DateTime $birthDate;

    // Méthodes getters & setters
    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getBreed(): string
    {
        return $this->breed;
    }

    public function setBreed(string $breed): self
    {
        $this->breed = $breed;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTime $birthDate): self
    {
        $this->birthDate = $birthDate;
        return $this;
    }
}

/* $garfield = new Cat();
$garfield->setId(1)->setName("Garfield"); */