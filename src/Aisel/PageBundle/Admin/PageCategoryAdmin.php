<?php

/*
 * This file is part of the Aisel package.
 *
 * (c) Ivan Proskuryakov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aisel\PageBundle\Admin;

use Aisel\CategoryBundle\Admin\AbstractCategoryAdmin;

/**
 * Page Category CRUD configuration for Backend
 *
 * @author Ivan Proskoryakov <volgodark@gmail.com>
 */
class PageCategoryAdmin extends AbstractCategoryAdmin
{
    protected $baseRoutePattern = 'page/category';
    protected $categoryEntity = 'Aisel\PageBundle\Entity\Category';
}
