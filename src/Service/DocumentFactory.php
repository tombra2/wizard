<?php

declare(strict_types=1);

namespace App\Service;


use _PHPStan_f9a2208af\Nette\Neon\Exception;

class DocumentFactory
{
    /**
     * @throws \DateMalformedStringException
     */
    public static function fromCSV(string $csvline): ?Document
    {
        try {
            $token = str_getcsv($csvline, ';');
            if ($token[3] === 'Invoice') {
                $id = $token[0];
                $title = $token[1];
                $dateRaw = strtotime($token[2]);
                $date = new  \DateTime(date('Y-m-d', $dateRaw));
                $type = $token[3];
                $sd = (int)$token[4];

                return new Invoice($id, $title, $date, $type);
            }
            if ($token[3] === 'Contract') {
                $id = $token[0];
                $title = $token[1];
                $dateRaw = strtotime($token[2]);
                $date = new  \DateTime(date('Y-m-d', $dateRaw));
                $type = $token[3];
                $validUntil = strtotime($token[4]);
                $sd = new  \DateTime(date('Y-m-d', $validUntil));


                return new Contract($id, $title, $date, $type, $sd);
            }
            if ($token[3] === 'Report') {
                $id = $token[0];
                $title = $token[1];
                $dateRaw = strtotime($token[2]);
                $date = new  \DateTime(date('Y-m-d', $dateRaw));
                $type = $token[3];

                return new Report($id, $title, $date, $type);
            }
        } catch (\Exception $e) {
            throw new Exception('Hello from the parsing something goes wrong');
        }
        return null;
    }
}
