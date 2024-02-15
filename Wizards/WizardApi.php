<?php



class WizardAPI
{
    const wizardApiUrl = "https://wizard-world-api.herokuapp.com/";


    public function getAllWizards()
    {
        $result = $this->makeCurlGetRequest(self::wizardApiUrl . "wizards");

        $allWizards = [];

        foreach ($result as $wizard) {
            $allWizards[] = ["id" => $wizard->id, "firstname" => $wizard->firstName, "lastname" => $wizard->lastName];
        }

        return $allWizards;
    }


    public function getAllSpells()
    {
        $result = $this->makeCurlGetRequest(self::wizardApiUrl . "spells");

        $allSpells = [];

        foreach ($result as $spell) {
            $allSpells[] = ["id" => $spell->id, "name" => $spell->name, "effect" => $spell->effect];
        }

        return $allSpells;
    }

    public function getAllHouses()
    {
        $result = $this->makeCurlGetRequest(self::wizardApiUrl . "houses");

        $allHouses = [];

        foreach ($result as $spell) {
            // $allHouses[] = ["id" => $spell->id, "name" => $spell->name, "effect" => $spell->effect];
        }

        return $allHouses;
    }

    
    public function getAllIngredients()
    {
        $result = $this->makeCurlGetRequest(self::wizardApiUrl . "ingredients");

        $allIngredients = [];

        foreach ($result as $ingredient) {
            $allIngredients[] = ["id" => $ingredient->id, "name" => $ingredient->name];
        }

        return $allIngredients;
    }


    public function getSpellById(string $id)
    { 
        return $this->makeCurlGetRequest(self::wizardApiUrl . "spells/$id");
    }


    private function makeCurlGetRequest(string $url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

        $result = curl_exec($curl);
        return json_decode($result);
    }
}
