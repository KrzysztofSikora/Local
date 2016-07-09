<?php
namespace My\Frontend7Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use My\Frontend7Bundle\Entity\User;
use My\Frontend7Bundle\Entity\Profil;

class LoadData implements FixtureInterface
{

    function load(ObjectManager $manager)
    {
        $xml = simplexml_load_file('data/users.xml');
        foreach ($xml->user as $u) {
            $User = new User();
            $User->setName($u->name);
            $manager->persist($User);
            $Profil = new Profil();
            $Profil->setInfo($u->info);
            $manager->persist($Profil);
            $User->setProfil($Profil);
        }
        $manager->flush();
    }
}