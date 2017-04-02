<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Password;

class LoadPasswordDataData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i=1; $i<3; $i++)
        {
            $pass = new Password();
            $pass->setTitle('pass'.$i);
            $pass->setLogin('login');
            $pass->setPassword('MotDePasseEnClair');
            $pass->setUrl('jesuisuneurl');
            $pass->setClient($this->getReference('client1'));
            $manager->persist($pass);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }
}