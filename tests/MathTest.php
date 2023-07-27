<?php

class MathTest extends PHPUnit\Framework\TestCase{

    public function testeDouble(){
        $this->assertEquals(4,\Projet\Math::double(2) );
        
    }
}