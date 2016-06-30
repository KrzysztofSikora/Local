<?php
namespace My\Frontend3Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use My\Frontend3Bundle\Entity\Word2;

class LoadData implements FixtureInterface
{

    function load(ObjectManager $manager)
    {
        $plk = file('data/dane-testowe.txt');
        foreach ($plk as $l) {
            $Wyraz = new Word2();
            $Wyraz->setTitle($l);
            $manager->persist($Wyraz);
            $manager->flush();
        }
    }
}