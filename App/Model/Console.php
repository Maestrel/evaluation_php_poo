<?php

namespace App\Model;

class Console
{
    //==Attributs   ?type = nullable (je me refait des repères, pour pas oublier !)
    private ?int $id;
    private ?string $name;
    private ?string $manufacturer;


    //==Constructeur
    public function __construct()
    {

    }
    //==Getters et Setters

    //* ------------------------------------------------GetSet ==[ID]==
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    //* ------------------------------------------------GetSet ==[Name]==
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    //* ------------------------------------------------GetSet ==[Manufacturer]==
    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(?string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }







}
