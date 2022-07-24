<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbPeople = null;

    #[ORM\Column(nullable: true)]
    private ?int $prepTime = null;

    #[ORM\Column(nullable: true)]
    private ?int $cookingTime = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ingredient = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $step = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pictureOne = null;

    #[ORM\ManyToOne(inversedBy: 'recipes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cuisine $cuisine = null;

    #[ORM\ManyToOne(inversedBy: 'recipe')]
    private ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PictureTwo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PictureThree = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PictureFour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNbPeople(): ?int
    {
        return $this->nbPeople;
    }

    public function setNbPeople(?int $nbPeople): self
    {
        $this->nbPeople = $nbPeople;

        return $this;
    }

    public function getPrepTime(): ?int
    {
        return $this->prepTime;
    }

    public function setPrepTime(?int $prepTime): self
    {
        $this->prepTime = $prepTime;

        return $this;
    }

    public function getCookingTime(): ?int
    {
        return $this->cookingTime;
    }

    public function setCookingTime(?int $cookingTime): self
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    public function getIngredient(): ?string
    {
        return $this->ingredient;
    }

    public function setIngredient(string $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getStep(): ?string
    {
        return $this->step;
    }

    public function setStep(string $step): self
    {
        $this->step = $step;

        return $this;
    }

    public function getPictureOne(): ?string
    {
        return $this->pictureOne;
    }

    public function setPictureOne(?string $pictureOne): self
    {
        $this->pictureOne = $pictureOne;

        return $this;
    }

    public function getCuisine(): ?Cuisine
    {
        return $this->cuisine;
    }

    public function setCuisine(?Cuisine $cuisine): self
    {
        $this->cuisine = $cuisine;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPictureTwo(): ?string
    {
        return $this->PictureTwo;
    }

    public function setPictureTwo(?string $PictureTwo): self
    {
        $this->PictureTwo = $PictureTwo;

        return $this;
    }

    public function getPictureThree(): ?string
    {
        return $this->PictureThree;
    }

    public function setPictureThree(?string $PictureThree): self
    {
        $this->PictureThree = $PictureThree;

        return $this;
    }

    public function getPictureFour(): ?string
    {
        return $this->PictureFour;
    }

    public function setPictureFour(?string $PictureFour): self
    {
        $this->PictureFour = $PictureFour;

        return $this;
    }
}
