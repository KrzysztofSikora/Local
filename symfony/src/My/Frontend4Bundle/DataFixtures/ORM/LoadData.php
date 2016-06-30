<?php
namespace My\Frontend4Bundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use My\Frontend4Bundle\Entity\Song;
use Doctrine\Common\DataFixtures\FixtureInterface;

class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $xml = simplexml_load_file('data/songs.xml');
        foreach ($xml->song as $s) {
            $data = (array) $s;
            $Song = new Song();
            $Song->fromArray($data);
            $manager->persist($Song);
        }
        $manager->flush();
    }
}