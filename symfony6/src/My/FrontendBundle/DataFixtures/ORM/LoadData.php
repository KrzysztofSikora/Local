<?php
namespace My\FrontendBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use My\FrontendBundle\Entity\User;
use My\FrontendBundle\Entity\Profil;
use Symfony\Component\Yaml\Yaml;
use Doctrine\Common\DataFixtures\FixtureInterface;


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