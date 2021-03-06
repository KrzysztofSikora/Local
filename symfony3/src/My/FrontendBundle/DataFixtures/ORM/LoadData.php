<?php
namespace My\FrontendBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use My\FrontendBundle\Entity\Film;
use My\FrontendBundle\Entity\Aktor;
use Symfony\Component\Yaml\Yaml;
use Doctrine\Common\DataFixtures\FixtureInterface;

class LoadData implements FixtureInterface

{
    function load(ObjectManager $manager)
    {
        $xml = simplexml_load_file('data/filmy.xml');
        foreach ($xml->film as $f) {
            $Film = new Film();
            $Film->setTytul($f->tytul);
            $manager->persist($Film);
            foreach ($f->aktorzy->aktor as $a) {
                $Aktor = $manager
                    ->getRepository('MyFrontendBundle:Aktor')
                    ->findOneBy(array('imie' => $a->imie, 'nazwisko' => $a->nazwisko));
                if (!$Aktor) {
                    $Aktor = new Aktor();
                    $Aktor->setImie($a->imie);
                    $Aktor->setNazwisko($a->nazwisko);
                    $manager->persist($Aktor);
                };
                $Film->addAktorzy($Aktor);
                $manager->flush();
            }
        }
        $manager->flush();
    }
}