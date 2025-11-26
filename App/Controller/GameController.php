<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Model\Console;
use App\Model\Game;
use App\Utils\Tools;

use Mithridatem\Validation\Validator;
use Mithridatem\Validation\Exception\ValidationException;


class GameController extends AbstractController
{
    //Attributs
    private ConsoleRepository $consoleRepository;
    private GameRepository $gameRepository;
    private Validator $validator;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->consoleRepository = new ConsoleRepository();
        $this->gameRepository = new GameRepository();
    }

    //Méthodes

    //============================================= Mathieu : Tu demandes de compléter la méthode addGame, mais elle se nomme saveGame !!

    /**
     * Méthode pour ajouter un Jeu (Game)
     * @return mixed Retourne le template
     */
    public function addGame(): mixed 
    {   
        //== tableau pour la vue
        $data = [];
        $consoles = $this->consoleRepository->findAllConsoles();
        //== tester si le formulaire est soumis
        if (isset($_POST["submit"])) {
            //== test du formulaire, si il est soumis
            try {
                if (!empty($_POST["title"]) || 
                    !empty($_POST["type"]) || 
                    !empty($_POST["publish_at"]) || 
                    !empty($_POST["console"])) {

                    //== nettoyer les données entrées
                    $title = Tools::sanitize($_POST["title"]);
                    $type = Tools::sanitize($_POST["type"]);
                    $publishAt = Tools::sanitize($_POST["publish_at"]);
                    //$console = Tools::sanitize($_POST["consoles[]"]); 

                    //==créer un objet Game()
                    $game = new Game();

                    //== setter les valeurs
                    $game->setTitle($title);
                    $game->setType($type);
                    $game->setPublishAt(new \DateTimeImmutable($publishAt));
                    //$game->setConsole($console);

                    //== appel de la méthode de validation
                    $this->validator->validate($game);

                    //== appeler la méthode saveGame du GameRepository
                    $this->gameRepository->saveGame($game);
                    //message de validation
                    $data["valid"] = "Le jeu : " . $game->getTitle() . " a été ajouté en BDD";
                } else {
                    $data["error"] = "Veuillez renseigner les champs du formulaire";
                }

            } catch (ValidationException $ve) { // PDOException $e
                $data["error"] = $ve->getMessage();

            }
        }

        return $this->render("add_game", "add Type", $data);
    }

    /**
     * Méthode pour afficher la liste des Jeux (Game)
     * @return mixed Retourne le template
     */
    public function showAllGames(): mixed 
    {
        //== Récupération de la liste des consoles
        return "template avec la méthode render";
    }


}
