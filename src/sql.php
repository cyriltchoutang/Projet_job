<?php 

class SQL{

    public static function setcheckExistingDb($sql){
        $sql = $sql->query("SHOW DATABASES LIKE 'cmc_db';");
        return $sql;
    }

    public static function creation($sql){
                $sql->query("CREATE DATABASE cmc_db;
                USE `cmc_db`;

                CREATE TABLE `job` (
                    `id` int NOT NULL auto_increment,
                    `reference` varchar(255),
                    `title` varchar(255),
                    `description` TEXT,
                    `url` varchar(255),
                    `company_name` varchar(255),
                    `publication` datetime,
                    PRIMARY KEY(`id`)
                );");

    }

    public static function delete($sql){
        $sql->exec('DELETE FROM job');
    } 

    public static function insertregionsjob($sql,$item){
        $sql->exec('INSERT INTO job (reference, title, description, url, company_name, publication) VALUES ('
        . '\'' . addslashes($item->ref) . '\', '
        . '\'' . addslashes(utf8_decode($item->title)) . '\', '
        . '\'' . addslashes(utf8_decode($item->description)) . '\', '
        . '\'' . addslashes($item->url) . '\', '
        . '\'' . addslashes(utf8_decode($item->company)) . '\', '
        . '\'' . addslashes($item->pubDate) . '\')'
        );

    }

    public static function insertjobteaser($sql,$offer){
        $sql->exec('INSERT INTO job (reference, title, description, url, company_name, publication) VALUES ('
        . '\'' . addslashes($offer->reference) . '\', '
        . '\'' . addslashes(utf8_decode($offer->title)) . '\', '
        . '\'' . addslashes(utf8_decode($offer->description)) . '\', '
        . '\'' . addslashes($offer->link) . '\', '
        . '\'' . addslashes(utf8_decode($offer->companyname)) . '\', '
        . '\'' . addslashes($offer->publisheddate) . '\')'
    );
    }

    public static function setselectjobs($jobs){
        $jobs = $jobs->query('SELECT id, reference, title, description, url, company_name, publication FROM job')->fetchAll(PDO::FETCH_ASSOC);
        return $jobs;
    }
}
?>