<?php
/**
 * User: Nizar
 * Date: 18/02/2015
 * Time: 10:53
 */
namespace Config\FixtureBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Aisel\BackendUserBundle\Entity\BackendUser;


class LoadUserData implements FixtureInterface, ContainerAwareInterface
{


    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new BackendUser();
        $userAdmin->setUsername('admin');

        $userAdmin->setSalt(md5(uniqid()));

        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($userAdmin)
        ;
        $userAdmin->setPassword($encoder->encodePassword('admin', $userAdmin->getSalt()));
        $userAdmin->setEmail("admin@config.fr");
        $userAdmin->setEnabled(1);
        $userAdmin->setLocked(0);
        $userAdmin->setCreatedAt();
        $userAdmin->setUpdatedAt();
        $userAdmin->setExpiresAt();
        $userAdmin->setLastLogin(new \DateTime());
        $manager->persist($userAdmin);
        $manager->flush();
    }
}