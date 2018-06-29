<?php

namespace App;

/**
 * Class Db
 * @package App
 */
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

    /**
     * @param $sql
     * @param $class
     * @param array $data
     * @return array
     */
    public function query($sql, $class, $data = []) : array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * @param $sql
     * @param array $data
     * @return bool
     */
    public function execute($sql, $data = []) : bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }

    /**
     * @return string
     */
    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}