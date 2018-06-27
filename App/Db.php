<?php

namespace App;

class Db
{

    protected $dbh;
    protected $cfg;
    protected $dsn;

    public function __construct()
    {
        $this->cfg = Config::instance();
        $this->dsn = 'mysql:host=' . $this->cfg->data['host'] . ';dbname=' . $this->cfg->data['dbname'] . ';charset=' . $this->cfg->data['charset'];
        $this->dbh = new \PDO($this->dsn, $this->cfg->data['username'], $this->cfg->data['password']);
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