<?php 

namespace App;

class Account {

    private string $password;

    /**
     * Set the account password.
     *
     * @return void
     */
    public function setPassword(string $password): void {
        if(!preg_match('/^\S+$/', $password)){ throw new \Exception('Le mot de passe ne comporte que des espaces');};
        if(!preg_match('/^(?=.*\d)(?=.*[A-Z])/', $password)){ throw new \Exception('Le mot de passe ne comporte que des espaces');};

        $this->password = $password;

    }
}
