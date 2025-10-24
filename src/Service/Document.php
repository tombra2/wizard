<?php

declare(strict_types=1);

namespace App\Service;

abstract class Document
{
    protected string $id;
    protected string $title;
    protected \DateTime $createdDate;

    public function __construct(string $id, string $title, \DateTime $createdDate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->createdDate = $createdDate;
    }

    public function toCSV(): string
    {
        return sprintf('%s;%s,%s,%s', $this->id, $this->title, (string)$this->createdDate, $this->getSpecificData());
    }

    public function __toString(): string
    {
        return sprintf(
            '[%s] %s (%s) - erstellt am %s ',
            $this->getType(),
            $this->getTitle(),
            $this->id,
            (string)$this->getCreatedDate()
        );
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCreatedDate(): \DateTime
    {
        return $this->createdDate;
    }

    abstract public function getType(): string;

    abstract public function getSpecificData(): string;
}
