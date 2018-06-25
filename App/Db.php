<?php

namespace App;

class Db
{

    protected $dbh;
    protected $cfg;
    protected $dsn;

    public function __construct()
    {
        $this->cfg = require __DIR__ . '/../config.php';
        $this->dsn = 'mysql:host=' . $this->cfg['host'] . ';dbname=' . $this->cfg['dbname'] . ';charset=' . $this->cfg['charset'];
        $this->dbh = new \PDO($this->dsn, $this->cfg['username'], $this->cfg['password']);
    }

    public function query($sql, $class, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($sql, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}