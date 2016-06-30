<?php
namespace My\Mountain2Bundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use My\Frontend2Bundle\Entity\Mountain;
use Doctrine\Common\DataFixtures\FixtureInterface;

class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $xml = simplexml_load_file('data/mountains.xml');
        foreach ($xml->mountain as $mnt) {
            $data = (array)$mnt;
            $Mountain = new Mountain();
            $Mountain->fromArray($data);
            $manager->persist($Mountain);
        }
        $manager->flush();
    }
}