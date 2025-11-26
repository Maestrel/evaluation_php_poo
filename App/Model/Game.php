<?php

namespace App\Model;

use DateTimeImmutable;

class Game
{
    //==Attributs ?type = nullable (je me refait des repères, pour pas oublier !)
    private ?int $id;
    private ?string $title;
    private ?string $type;
    private ?\DateTimeImmutable $publishAt;
    private Console $console;

    //Constructeur
    public function __construct()
    {

    }

    //Getters et Setters

    //* ------------------------------------------------GetSet ==[ID: ?int $id]==
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    //* ------------------------------------------------GetSet ==[Title : ?string $title]==
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }


    //* ------------------------------------------------GetSet ==[Type : ?string $type]==
    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    //* ------------------------------------------------GetSet ==[Publish_At : ?\DateTimeImmutable $publishAt]==
    public function getPublishAt(): \DateTimeImmutable
    {
        return $this->publishAt;
    }

    public function setPublishAt(?\DateTimeImmutable $publishAt): void
    {
        $this->publishAt = $publishAt;
    }

    //* ------------------------------------------------GetSet ==[Console : Console $console]==
    public function getConsole(): console
    {
        return $this->console;
    }

    public function setConsole(console $console): void
    {
        $this->console = $console;
    }








}
