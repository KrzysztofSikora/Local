<?php
namespace My\Frontend5Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use My\Frontend5Bundle\Entity\Treny;

class LoadData implements FixtureInterface
{

    function load(ObjectManager $manager)
    {
        $plks = glob('data/*.txt');
        shuffle($plks);
        foreach ($plks as $plk) {
            $t = file($plk);
            $tytul = trim(array_shift($t));
            $tresc = trim(implode('', $t));
            $number = basename($plk);
            $number = str_replace('.txt', '', $number);
            $number = ltrim($number, '0');
            $Treny = new Treny();
            $Treny->setTytul($tytul);
            $Treny->setTresc($tresc);
            $Treny->setNumber($number);
            $manager->persist($Treny);
        }
        $manager->flush();
    }
}