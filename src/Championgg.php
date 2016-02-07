<?php namespace Championgg;

class Championgg
{
    protected $client;

    public function __construct(ClientInterface $client = null)
    {
        if($client){
            $this->client = $client;
        }else{
            $this->client = new Client('');
        }
    }

    // Returns an array high level data for each champion if no name is given
    // Returns an array with detailed data for each role for this champion if name given.
    public function champion($name = null)
    {
        if($name){
            return $this->client->get('/champion/' . $name);
        }else{
            return $this->client->get('/champion');
        }
    }

    // Returns an array with general data for each role for this champion.
    public function general($name)
    {
        return $this->client->get("/champion/$name/general");
    }

    // Returns matchups info
    public function matchups($name)
    {
        return $this->client->get("/champion/$name/matchup");
    }

    // Returns an array with most popular final build items data for each role for this champion.
    public function items($name)
    {
        return $this->client->get("/champion/$name/items/finished/mostPopular");
    }

    // Returns most popular skill order info for champion
    public function skillOrder($name)
    {
        return $this->client->get("/champion/$name/skills/mostPopular");
    }

    // Returns an array with most popular starting items data for each role for this champion.
    public function starter($name)
    {
        return $this->client->get("/champion/$name/items/starters/mostPopular");
    }

    // Returns an array with most popular summoners spells data for each role for this champion.
    public function spells($name)
    {
        return $this->client->get("/champion/$name/summoners/mostPopular");
    }

    // Returns most popular runes info for champion
    public function runes($name)
    {
        return $this->client->get("/champion/$name/runes/mostPopular");
    }

    // Returns an array with most winning final build items data for each role for this champion.
    public function winningItems($name)
    {
        return $this->client->get("/champion/$name/items/finished/mostWins");
    }

    // Returns an array with most winning starting items data for each role for this champion.
    public function winningStarter($name)
    {
        return $this->client->get("/champion/$name/items/starters/mostWins");
    }

    // Returns an array with most winning summoners spells data for each role for this champion
    public function winningSpells($name)
    {
        return $this->client->get("champion/$name/summoners/mostWins");
    }

    // Returns most winning runes info for champion
    public function winningRunes($name)
    {
        return $this->client->get("/champion/$name/runes/mostWins");
    }

    // Returns most winning skill order info for champion
    public function winningSkills($name)
    {
        return $this->client->get("/champion/$name/skills/mostWins");
    }

    public function skills($name)
    {
        return $this->client->get("/champion/$name/skills");
    }

    public function matchup($name, $enemyName)
    {
        return $this->client->get("/champion/$name/matchup/$enemyName");
    }



    // Stats
    public function statsChampion($name = null)
    {
        if($name){
            return $this->client->get('/stats/champs/' . $name);
        }else{
            return $this->client->get('/stats');
        }
    }

}