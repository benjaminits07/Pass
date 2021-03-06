<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Client;

class LoadClientData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $client1 = new Client();
        $client1->setName('client 1');
        $client1->setDescription('<p><strong>Lorem ipsum dolor sit amet</strong>, consectetur adipiscing elit. Quisque tincidunt quam id vulputate dictum. Duis sed elit interdum, vehicula magna eu, mattis nisi. Aliquam aliquet tortor et lorem laoreet dapibus. Aenean commodo, arcu sit amet ultrices sodales, neque tortor hendrerit est, vitae efficitur dui augue at odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum et justo ultrices, aliquet sem ac, gravida enim. Nulla turpis augue, tincidunt eget felis quis, tincidunt suscipit nisl. Phasellus ac porta felis. Vivamus molestie bibendum diam sit amet dictum. Nam velit mi, venenatis id sapien vitae, vulputate dictum ipsum. Praesent vitae tincidunt massa, vel rhoncus ligula. Mauris rutrum posuere lorem nec eleifend.</p>

<p>Nam in orci pellentesque, vulputate turpis ac, malesuada dui. Ut congue massa at bibendum sollicitudin. Sed molestie condimentum facilisis. Donec vel nibh dignissim, tempor neque quis, fringilla urna. Nunc sit amet neque ut nunc gravida dignissim. Nunc sit amet mauris sagittis, ultricies felis non, scelerisque ipsum. Aliquam magna lorem, venenatis sit amet viverra non, tincidunt eu tellus.</p>');
        $manager->persist($client1);

        for ($i=2; $i<7; $i++) {
            $client2 = new Client();
            $client2->setName('client '.$i);
            $manager->persist($client2);
        }

        $manager->flush();

        $this->addReference('client1', $client1);
        $this->addReference('client2', $client2);
    }


    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}