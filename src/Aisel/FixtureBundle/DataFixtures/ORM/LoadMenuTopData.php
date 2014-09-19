<?php

/*
 * This file is part of the Aisel package.
 *
 * (c) Ivan Proskuryakov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aisel\NavigationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Aisel\FixtureBundle\DataFixtures\XMLFixtureData;
use Aisel\NavigationBundle\Entity\Menu;

/**
 * Navigation menu fixtures
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class LoadMenuTopData extends XMLFixtureData implements OrderedFixtureInterface
{

    protected $fixturesName = 'aisel_menu_top.xml';

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        if (file_exists($this->fixturesFile)) {
            $contents = file_get_contents($this->fixturesFile);
            $XML = simplexml_load_string($contents);

            foreach ($XML->database->table as $table) {

                $rootCategory = null;

                if ($table->column[2] != 'NULL') {
                    $rootCategory = $this->getReference('menu_top_' . $table->column[2]);
                }
                $menu = new Menu();
                $menu->setLocale($table->column[1]);
                $menu->setTitle($table->column[7]);
                $menu->setMetaUrl($table->column[8]);
                $menu->setStatus($table->column[9]);
                $menu->setCreatedAt(new \DateTime(date('Y-m-d H:i:s')));
                $menu->setUpdatedAt(new \DateTime(date('Y-m-d H:i:s')));

                if ($rootCategory) {
                    $menu->setParent($rootCategory);
                }
                $manager->persist($menu);
                $manager->flush();
                $this->addReference('menu_top_' . $table->column[0], $menu);
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 900;
    }
}