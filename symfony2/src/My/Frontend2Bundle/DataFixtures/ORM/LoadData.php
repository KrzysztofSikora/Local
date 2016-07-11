<?php
namespace My\Frontend2Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use My\Frontend2Bundle\Entity\Kontynent;
use My\Frontend2Bundle\Entity\Panstwo;

class LoadData implements FixtureInterface
{

    function load(ObjectManager $manager)
    {
        $xml = simplexml_load_file('data/kontynenty.xml');
        foreach ($xml->kontynent as $kontynent) {
            $Kontynent = new Kontynent();
            $Kontynent->setNazwa($kontynent->nazwa);
            $manager->persist($Kontynent);
            foreach ($kontynent->panstwa->panstwo as $panstwo) {
                $Panstwo = new Panstwo();
                $Panstwo->setNazwa($panstwo->nazwa);
                $Panstwo->setKontynent($Kontynent);
                $manager->persist($Panstwo);
            }
        }
        $manager->flush();
    }
}