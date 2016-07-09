<?php
namespace My\MountainBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use My\FrontendBundle\Entity\River;
use Symfony\Component\Yaml\Yaml;
use Doctrine\Common\DataFixtures\FixtureInterface;

class LoadData implements FixtureInterface

{
    public function load(ObjectManager $manager)
    {
        $yml = Yaml::parse('data/rivers.yml');
        foreach ($yml as $r) {
            $river = new River();
            $river->setName($r['name']);
            $river->setLength($r['length']);
            $manager->persist($river);
        }
        $manager->flush();
    }
}