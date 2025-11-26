<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Model\Console;
use App\Model\Game;

class GameRepository
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
     * Méthode qui ajoute une jeu (Game) en BDD
     * @return void
     * @throws \Exception Erreurs SQL
     */
    public function saveGame(Game $game): void 
    {
        try {
            //== requête SQL avec INSERT INTO
            $sql = "INSERT INTO video_game(title, `type`, publish_at, id_console) VALUE(?,?,?,?)";
            //== préparer la requête
            $req = $this->connect->prepare($sql);
            //== assigner les paramètres
            $req->bindValue(1, $game->getTitle(), \PDO::PARAM_STR);
            $req->bindValue(2, $game->getType(), \PDO::PARAM_STR);
            $req->bindValue(3, $game->getPublishAt()->format("y-m-d"), \PDO::PARAM_STR);
            $req->bindValue(4, $game->getConsole(), \PDO::PARAM_INT);
            //== exécuter la requête
            $req->execute();

        } catch (\PDOException $pdo) {
            throw new \PDOException("Erreur d'enregistrement en BDD");
        }
    }
    
    /**
     * Méthode qui retourne la liste des jeux (Game)
     * @return array<Game> Retourne le tableau des jeux (Game)
     * @throws \Exception Erreurs SQL
     */
    public function findAllGames(): array 
    {
        return [];
    }
}
