<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PDOProvider extends Model
{
    private string $timeoutInterval = 'PT10M';
    private ?\DateTimeInterface $lastConnect = null;
    private \PDO $dbh;

    /**
     * @return \PDO
     * @throws \Exception
     */
    public function getPdo()
    {
        $now = (new \DateTimeImmutable())->sub(new \DateInterval($this->timeoutInterval));

        // refresh connection every 30min
        if (!$this->lastConnect || $now > $this->lastConnect) {
            $this->getConnection()->reconnect();
            $this->dbh         = $this->getConnection()->getPdo();
            $this->lastConnect = new \DateTimeImmutable();
        }

        return $this->dbh;
    }
}
