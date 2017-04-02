<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $encoder = $this->container->get('security.password_encoder');

        $userAdmin->setUsername('admin');
        $userAdmin->setPassword($encoder->encodePassword($userAdmin, 'admin'));
        $userAdmin->setEmail('benjamin.denie@gmail.com');
        $userAdmin->setRoles(array('ROLE_ADMIN'));
        $userAdmin->setEnabled(true);
        $manager->persist($userAdmin);

        $userStage = new User();
        $userStage->setUsername('stage');
        $userStage->setPassword($encoder->encodePassword($userStage, 'stage'));
        $userStage->setEmail('stage');
        $userStage->setRoles(array('ROLE_USER'));
        $userStage->setEnabled(false);
        $manager->persist($userStage);

        $manager->flush();
    }
}