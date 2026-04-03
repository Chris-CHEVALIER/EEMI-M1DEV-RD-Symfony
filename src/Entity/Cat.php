<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use DateTime;

#[ORM\Entity]
class Cat
{
    // Propriétés
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 20)]
    private string $name;

    #[ORM\Column]
    private int $age;

    #[ORM\Column(length: 10)]
    private string $color;

    #[ORM\Column(length: 20)]
    private string $breed;

    #[ORM\Column(nullable: true)]
    private string $image;

    #[ORM\Column]
    private DateTime $birthDate;

    #[ORM\ManyToOne(targetEntity: Owner::class, inversedBy: 'cats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Owner $owner = null;

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

    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    public function setOwner(?Owner $owner): static
    {
        $this->owner = $owner;

        return $this;
    }
}

/* $garfield = new Cat();
$garfield->setId(1)->setName("Garfield"); */