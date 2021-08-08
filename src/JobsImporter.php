<?php


class JobsImporter
{
    private $db;

    private $file;

    public function __construct($host, $username, $password, $databaseName, $file)
    {
        $this->file = $file;
        
        /* connect to DB */
        try {
            //$this->db = new PDO('mysql:host=' . $host . ';dbname=' . $databaseName, $username, $password);
            //$this->db = new PDO('mysql:host=' . $host, $username, $password);
            $this->db = connectionWithoutDb($host, $username, $password);
            echo 'Success connection';
            /* check the existing database */
            $sql =  SQL::setcheckExistingDb($this->db);

            /* DB creation */
            $sql = $sql->fetch();
            if(!$sql){
                SQL::creation($this->db);
            }

            $this->db = connectionWithDb($host, $databaseName, $username, $password);
        
        } catch (Exception $e) {
            die('DB error: ' . $e->getMessage() . "\n");
        }
        
    }

    public function importJobs()
    {
        /* remove existing items */
        SQL::delete($this->db);

        /* import each item */
        $count = 0;

        /* parse XML file */
        foreach ($this->file as $file) {
                # code...
                
            $xml = simplexml_load_file($file);

            ///////////Import file regionsjob.xml////////////////////////
            if($xml->item){
                foreach ($xml->item as $item) {
                    SQL::insertregionsjob($this->db,$item);
                    $count++;
                }
            }
            //////////////Import file jobteaser.xml/////////////////
            if($xml->offer){
                foreach ($xml->offer as $offer) {

                    ///////////// Date management

                    $offer->publisheddate = Datejobteaser::setdate($offer->publisheddate);

                    SQL::insertjobteaser($this->db,$offer);       
                    $count++;
                }
            }
        }
        return $count;
    }
}
