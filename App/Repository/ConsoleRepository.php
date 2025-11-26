<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Model\Console;

class ConsoleRepository
{
    //Attribut
    private \PDO $connect;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->connect = (new Mysql)->connectBDD();
    }

    //Méthodes
    /**
     * Méthode qui retourne la liste des consoles (Console)
     * @return array<Console> Retourne le tableau des consoles (Console)
     * @throws \Exception Erreurs SQL
     */
    public function findAllConsoles(): array 
    {   
        try{
            //== écrire une requête SQL SELECT
            $sql = "SELECT c.id, c.name, c.manufacturer FROM console AS c";
            //== préparer la requête
            $req = $this->connect->prepare($sql);
            //== Exécuter la requête
            $req->execute();
            //== FetchAll
            $consoles = $req->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $consoles;
    }
}
