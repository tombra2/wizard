<?php

declare(strict_types=1);

namespace App\Service;

class Invoice extends Document
{
    private float $amount;

    public function __construct(string $id, string $title, \DateTime $createdDate, float $amount)
    {
        parent::__construct($id, $title, $createdDate);
        $this->amount = $amount;
    }

    public function getType(): string
    {
        return 'Invoice';
    }

    public function getSpecificData(): string
    {
        return (string) $this->amount;
    }
}
