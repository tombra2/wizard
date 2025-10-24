<?php

declare(strict_types=1);

namespace App\Service;

class Contract extends Document
{

    private \DateTime $validUntil;

    /**
     * @param \DateTime $validUntil
     */
    public function __construct(string $id, string $title, \DateTime $createdDate, \DateTime $validUntil)
    {
        parent::__construct($id, $title, $createdDate);
        $this->validUntil = $validUntil;
    }


    public function getType(): string
    {
        return "Contract";
    }

    public function getSpecificData(): string
    {
        return (string)$this->validUntil;
    }
}