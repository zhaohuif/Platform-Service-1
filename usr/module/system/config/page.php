<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 */

/**
 * Page setting specs
 *
 * @author Taiwen Jiang <taiwenjiang@tsinghua.org.cn>
 */
return array(
    // Front section
    'front' => array(
        // homepage
        array(
            'title'         => __('Homepage'),
            'module'        => 'system',
            'controller'    => 'index',
            'action'        => 'index',
            'block'         => 1,
        ),
        // utility page, not used yet
        array(
            'title'         => __('Utility'),
            'module'        => 'system',
            'controller'    => 'utility',
            'block'         => 1,
        ),
        // error message page
        array(
            'title'         => __('Error reporting'),
            'module'        => 'system',
            'controller'    => 'error',
            'block'         => 0,
        ),
    ),
    // Admin section
    'admin' => array(
        // System dashboard access
        array(
            'title'         => __('Dashboard'),
            'controller'    => 'dashboard',
            'permission'    => 'admin',
        ),
        // System readme
        array(
            'title'         => __('Readme'),
            'controller'    => 'readme',
            'permission'    => 'admin',
        ),

        // System managed components
        // config
        array(
            'title'         => __('Config'),
            'controller'    => 'config',
            'permission'    => 'config',
        ),
        // block
        array(
            'title'         => __('Blocks'),
            'controller'    => 'block',
            'permission'    => 'block',
        ),
        // page
        array(
            'title'         => __('Pages'),
            'controller'    => 'page',
            'permission'    => 'page',
        ),
        // event
        array(
            'title'         => __('Event/listener'),
            'controller'    => 'event',
            'permission'    => 'event',
        ),
        // resource permissions
        array(
            'title'         => __('Permission resource'),
            'controller'    => 'resource',
            'permission'    => 'resource',
        ),

        // Operations
        // module
        array(
            'title'         => __('Modules'),
            'controller'    => 'module',
            'permission'    => 'module',
        ),
        // theme
        array(
            'title'         => __('Themes'),
            'controller'    => 'theme',
            'permission'    => 'theme',
        ),
        // navigation
        array(
            'title'         => __('Navigation'),
            'controller'    => 'nav',
            'permission'    => 'navigation',
        ),
        // System permissions
        array(
            'title'         => __('Permissions'),
            'controller'    => 'perm',
            //'action'        => 'index',
            'permission'    => 'perm',
        ),

        // role
        array(
            'title'         => __('Roles'),
            'controller'    => 'role',
            'permission'    => 'role',
        ),
        // membership
        array(
            'title'         => __('Membership'),
            'controller'    => 'member',
            'permission'    => 'member',
        ),
        // Maintenance operations
        // asset
        array(
            'title'         => __('Asset'),
            'controller'    => 'asset',
            'permission'    => 'maintenance',
        ),
        // audit
        array(
            'title'         => __('Auditing'),
            'controller'    => 'audit',
            'permission'    => 'maintenance',
        ),
        // cache
        array(
            'title'         => __('Cache'),
            'controller'    => 'cache',
            'permission'    => 'maintenance',
        ),
    ),
    // Feed section
    'feed' => array(
        array(
            'cache_ttl'     => 0,
            'cache_level'   => '',
            'title'         => __('What\'s new'),
        ),
    ),

    /*
    // Exception of admin pages to skip ACL check
    'exception' => array(
        array(
            'controller'    => 'resource',
            'action'        => 'assign',
        ),
        array(
            'controller'    => 'perm',
            'action'        => 'assign',
        ),
        array(
            'controller'    => 'block',
            'action'        => 'page',
        ),
    ),
    */
);
