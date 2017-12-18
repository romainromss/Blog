<?php

namespace Romss\Models;

use Romss\Database;

class Table
{
    /**
     * @var Database $db
     */
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }
}
