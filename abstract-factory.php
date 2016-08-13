<?php

abstract class Clubs {
    abstract function showClubName();
}

abstract class Players {
    abstract function showPlayerName();
}

abstract class SoccerLeagueFactory {
    abstract function getClub();
    abstract function getPlayer();
}

class PrimeraDivision extends SoccerLeagueFactory {
    public function getClub() {
        return new Club;
    }

    public function getPlayer() {
        return new Player;
    }
}

class Club extends Clubs {
    public function showClubName() {
        echo "Real Madrid<br />";
    }
}

class Player extends Players {
    public function showPlayerName() {
        echo "Christiano Ronaldo<br />";
    }
}

$factory = new PrimeraDivision;
$club = $factory->getClub();
$player = $factory->getPlayer();
$club->showClubName();
$player->showPlayerName();
