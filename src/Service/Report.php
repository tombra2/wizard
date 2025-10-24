<?php

namespace App\Service;

class Report extends Document
{
    private string $author;

    /**
     * @param string $author
     */
    public function __construct(string $id, string $title, \DateTime $createdDate, string $author)
    {
        parent::__construct($id,$title,$createdDate);
        $this->author = $author;
    }


    public function getType(): string
    {
        return "Report";
    }

    public function getSpecificData(): string
    {
        return $this->author;
    }
}