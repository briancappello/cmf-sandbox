<?php

namespace Application\Sonata\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Sonata\UserBundle\Entity\UserManager;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    protected $container;

    public function load(ObjectManager $manager)
    {
        $um = $this->getUserManager();


        $user = $um->createUser();
        $user->setUsername('superadmin');
        $user->setEmail('briancappello@gmail.com');
        $user->setPlainPassword($this->container->getParameter('super_admin_password'));
        $user->setEnabled(true);
        $user->addRole('ROLE_SUPER_ADMIN');

        $um->updateUser($user);
    }

    /**
     * @return UserManager
     */
    protected function getUserManager()
    {
        return $this->container->get('fos_user.user_manager');
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
