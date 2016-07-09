<?php
namespace My\Frontend6Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use My\Frontend6Bundle\Entity\File;

class LoadFileData implements FixtureInterface
{
    function load(ObjectManager $manager)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $filenames = glob('data2/*');
        foreach ($filenames as $filename) {
            $file = new File();
            $file->setFilename(basename($filename));
            $file->setMime(finfo_file($finfo, $filename));
            $file->setContents(base64_encode(file_get_contents($filename)));
            $manager->persist($file);
        }
        $manager->flush();
        finfo_close($finfo);
    }
}