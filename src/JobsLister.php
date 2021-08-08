<?php

class JobsLister
{
    private $db;

    public function __construct($host, $username, $password, $databaseName)
    {
        /* connect to DB */
        try {
            $this->db = connectionWithDb($host, $databaseName, $username, $password);
        } catch (Exception $e) {
            die('DB error: ' . $e->getMessage() . "\n");
        }
    }

    public function listJobs()
    {
        $jobs = SQL::setselectjobs($this->db);
        return $jobs;
    }
}
