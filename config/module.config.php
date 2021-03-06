<?php

/**
 * ZF2 Module Config file for Rcm
 *
 * This file contains all the configuration for the Module as defined by ZF2.
 * See the docs for ZF2 for more information.
 */
return [
    /* asset_manager */
    'asset_manager' => [
        'resolver_configs' => [
            'aliases' => [
                'modules/rcm-admin/' => __DIR__ . '/../public/',
            ],
            'collections' => [
                'modules/rcm/rcm.js' => [
                    'vendor/angular-utils-pagination/dirPagination.js',
                ],
                'modules/rcm-admin/admin.js' => [

                    /* <core> */
                    'modules/rcm-admin/core/rcm-admin-api.js',
                    // RcmUser services - include using ZF2
                    'modules/rcm-user/rcm-user-roles-service.js',
                    'modules/rcm-user/rcm-user-role-selector.js',
                    'modules/rcm-admin/core/rcm-permissions.js',
                    /* </core> */

                    /* <rcm-file-chooser> */
                    'modules/rcm-admin/rcm-file-chooser/rcm-file-chooser-module.js',
                    'modules/rcm-admin/rcm-file-chooser/rcm-file-chooser.js',
                    'modules/rcm-admin/rcm-file-chooser/rcm-file-chooser-service.js',
                    'modules/rcm-admin/rcm-file-chooser/elfinder-file-chooser.js',
                    /* </rcm-file-chooser> */

                    /* <rcm-input> */
                    'modules/rcm-admin/rcm-input/rcm-input-module.js',
                    'modules/rcm-admin/rcm-input/rcm-input-image-directive.js',
                    'modules/rcm-admin/rcm-input/rcm-input-link-url-directive.js',
                    /* </rcm-input> */

                    // general service - requires rcm-core
                    'modules/rcm-admin/rcm-page-admin-panel/rcm-admin-menu.js',
                    'modules/rcm-admin/rcm-column-resize/rcm-column-resize.js',
                    /* <rcm-page-admin> */
                    'modules/rcm-admin/rcm-page-admin/rcm-admin-service-config.js',
                    'modules/rcm-admin/rcm-page-admin/rcm-admin-model.js',
                    'modules/rcm-admin/rcm-page-admin/rcm-admin-view-model.js',
                    'modules/rcm-admin/rcm-page-admin/rcm-admin-plugin-edit-js.js',
                    'modules/rcm-admin/rcm-page-admin/rcm-admin-plugin.js',
                    'modules/rcm-admin/rcm-page-admin/rcm-admin-container.js',
                    'modules/rcm-admin/rcm-page-admin/rcm-admin-page.js',
                    'modules/rcm-admin/rcm-page-admin/rcm-admin-service.js',
                    'modules/rcm-admin/rcm-page-admin/rcm-admin-service-edit-button-action.js',
                    'modules/rcm-admin/rcm-page-admin/rcm-admin-service-html-editor-link.js',
                    'modules/rcm-admin/rcm-page-admin/angular-rcm-admin.js',
                    'modules/rcm-admin/rcm-page-admin/available-plugins-menu.js',
                    'modules/rcm-admin/rcm-page-admin/plugin-drag.js',
                    'modules/rcm-admin/rcm-page-admin/rcm-session-keep-alive.js',
                    'modules/rcm-admin/rcm-page-admin/edit-check-warning.js',
                    'modules/rcm-admin/rcm-page-admin/page-not-found.js',
                    /* </rcm-page-admin> */

                    'modules/rcm-admin/plugin-admin/ajax-plugin-edit-helper.js',
                    'modules/rcm-admin/plugin-admin/jquery-dialog-inputs.js',
                    'modules/rcm-admin/page-permissions/page-permissions.js',
                    'modules/rcm-admin/manage-sites/rcm-admin-manage-sites.js',
                    'modules/rcm-admin/create-site/rcm-admin-create-site.js',
                    'modules/rcm-admin/site-page-copy/rcm-admin-site-page-copy.js',
                    'modules/rcm-admin/save-ajax-admin-window/rcm-save-ajax-admin-window.js',

                    // features
                    'modules/rcm-admin/page-properties/page-properties.js',
                    'modules/rcm-admin/page-delete/page-delete.js',
                ],
                'modules/rcm-admin/admin.css' => [
                    'modules/rcm-admin/core/styles.css',
                    'modules/rcm-admin/plugin-admin/admin-jquery-ui.css',
                    /* <rcm-input> */
                    'modules/rcm-admin/rcm-input/rcm-input.css',
                    /* </rcm-input> */
                    'modules/rcm-admin/rcm-page-admin/layout-editor.css',
                    'modules/rcm-admin/rcm-page-admin-panel/panel.css',
                    'modules/rcm-admin/rcm-page-admin-panel/navigation.css',
                    'modules/rcm-admin/rcm-column-resize/style.css',
                    // RcmUser services - CSS
                    'modules/rcm-user/rcm-user-role-selector.css',
                    'modules/rcm-admin/page-permissions/permissions.css',
                ],
            ],
        ],
    ],
    /* controllers */
    'controllers' => [
        'factories' => [
            'RcmAdmin\Controller\PageController'
            => 'RcmAdmin\Factory\PageControllerFactory',
        ],
        'invokables' => [
            'RcmAdmin\Controller\PagePermissionsController'
            => 'RcmAdmin\Controller\PagePermissionsController',
            'RcmAdmin\Controller\PageViewPermissionsController' =>
                'RcmAdmin\Controller\PageViewPermissionsController',
            'RcmAdmin\Controller\ApiAdminCurrentSiteController' =>
                'RcmAdmin\Controller\ApiAdminCurrentSiteController',
            'RcmAdmin\Controller\ApiAdminManageSitesController'
            => 'RcmAdmin\Controller\ApiAdminManageSitesController',
            'RcmAdmin\Controller\ApiAdminSitesCloneController'
            => 'RcmAdmin\Controller\ApiAdminSitesCloneController',
            'RcmAdmin\Controller\ApiAdminLanguageController'
            => 'RcmAdmin\Controller\ApiAdminLanguageController',
            'RcmAdmin\Controller\ApiAdminThemeController'
            => 'RcmAdmin\Controller\ApiAdminThemeController',
            'RcmAdmin\Controller\ApiAdminCountryController'
            => 'RcmAdmin\Controller\ApiAdminCountryController',
            'RcmAdmin\Controller\ApiAdminSitePageController'
            => 'RcmAdmin\Controller\ApiAdminSitePageController',
            'RcmAdmin\Controller\ApiAdminSitePageCloneController'
            => 'RcmAdmin\Controller\ApiAdminSitePageCloneController',
            'RcmAdmin\Controller\ApiAdminPageTypesController'
            => 'RcmAdmin\Controller\ApiAdminPageTypesController',
            'RcmAdmin\Controller\RpcAdminCanEdit'
            => 'RcmAdmin\Controller\RpcAdminCanEdit',
            'RcmAdmin\Controller\RpcAdminKeepAlive'
            => 'RcmAdmin\Controller\RpcAdminKeepAlive',
            'RcmAdmin\Controller\ApiAdminCheckPermissionsController'
            => 'RcmAdmin\Controller\ApiAdminCheckPermissionsController'
        ],
    ],
    /* form_elements */
    'form_elements' => [
        'invokables' => [
            'mainLayout' => 'RcmAdmin\Form\Element\MainLayout',
        ],
        'factories' => [
            'RcmAdmin\Form\NewPageForm' => 'RcmAdmin\Factory\NewPageFormFactory',
            'RcmAdmin\Form\CreateTemplateFromPageForm'
            => 'RcmAdmin\Factory\CreateTemplateFromPageFormFactory',
        ],
    ],
    /* includeFileManager */
    'includeFileManager' => [
        'files' => [
            'style.css' => [
                'destination' => __DIR__ . '/../../../../public/css',
                'header' => __DIR__ . '/../../../../public/css/styleHeader.css',
            ],
            'editStyle.css' => [
                'destination' => __DIR__ . '/../../../../public/css',
                'header' =>
                    __DIR__ . '/../../../../public/css/editStyleHeader.css',
            ],
            'script.js' => [
                'destination' => __DIR__ . '/../../../../public/js',
                'header' => __DIR__ . '/../../../../public/js/scriptHeader.js',
            ],
            'editScript.js' => [
                'destination' => __DIR__ . '/../../../../public/js',
                'header' =>
                    __DIR__ . '/../../../../public/js/editScriptHeader.js',
            ],
        ],
    ],
    /* navigation */
    'navigation' => [
        'RcmAdminMenu' => [
            'Page' => [
                'label' => 'Page',
                'uri' => '#',
                'pages' => [
                    'New Page' => [
                        'label' => 'New Page',
                        'route' => 'RcmAdmin\Page\New',
                        'class' => 'rcmAdminMenu RcmFormDialog icon-after new-page',
                        'title' => 'New Page',
                    ],
                    'Edit' => [
                        'label' => 'Edit',
                        'uri' => '#',
                        'pages' => [
                            'AddRemoveArrangePlugins' => [
                                'label' => 'Add/Remove/Arrange Plugins',
                                'class' => 'rcmAdminEditButton',
                                'uri' => "javascript:RcmAdminService.rcmAdminEditButtonAction('arrange');",
                            ],
                            'PageProperties' => [
                                'label' => 'Page Properties',
                                'class' => 'rcmAdminMenu RcmBlankDialog',
                                'title' => 'Page Properties',
                                'uri' => '/modules/rcm-admin/page-properties/page-properties.html',
                            ],
                            'PagePermissions' => [
                                'label' => 'Page Permissions',
                                'class' => 'rcmAdminMenu RcmBlankDialog',
                                'title' => 'Page Permissions',
                                'route' => 'RcmAdmin\Page\PagePermissions',
                                'params' => [
                                    'rcmPageName' => ':rcmPageName',
                                    'rcmPageType' => ':rcmPageType',
                                ],
                            ],
                        ]
                    ],
                    'Copy To' => [
                        'label' => 'Copy To...',
                        'uri' => '#',
                        'rcmOnly' => true,
                        'pages' => [
                            'Page' => [
                                'label' => 'Template',
                                'route' => 'RcmAdmin\Page\CreateTemplateFromPage',
                                'class' => 'rcmAdminMenu RcmFormDialog',
                                'title' => 'Copy To Template',
                                'params' => [
                                    'rcmPageName' => ':rcmPageName',
                                    'rcmPageType' => ':rcmPageType',
                                    'rcmPageRevision' => ':rcmPageRevision'
                                ],
                                'acl' => [
                                    'providerId' => 'Rcm\Acl\ResourceProvider',
                                    'resource' => 'sites.:siteId.pages.create'
                                ]
                            ],
                        ],
                    ],
                    'Drafts' => [
                        'label' => 'Drafts',
                        'uri' => '#',
                        'class' => 'drafts',
                        'rcmIncludeRevisions' => [
                            [
                                'published' => false,
                                'limit' => 10,
                                'page' => [
                                    'label' => ':revisionCreatedDate - :revisionAuthor',
                                    'route' => 'contentManagerWithPageType',
                                    'class' => 'icon-before revision-page',
                                    'text_domain' => 'DO_NOT_TRANSLATE',
                                    'params' => [
                                        'page' => ':rcmPageName',
                                        'pageType' => ':rcmPageType',
                                        'revision' => ':rcmPageRevision',
                                    ]
                                ]
                            ]
                        ],
                    ],
                    'Restore' => [
                        'label' => 'Restore',
                        'uri' => '#',
                        'class' => 'restore',
                        'rcmIncludeRevisions' => [
                            [
                                'published' => true,
                                'limit' => 10,
                                'page' => [
                                    'label' => ':revisionPublishedDate - :revisionAuthor',
                                    'route' => 'RcmAdmin\Page\PublishPageRevision',
                                    'class' => 'icon-before restore-page',
                                    'text_domain' => 'DO_NOT_TRANSLATE',
                                    'params' => [
                                        'rcmPageName' => ':rcmPageName',
                                        'rcmPageType' => ':rcmPageType',
                                        'rcmPageRevision' => ':rcmPageRevision',
                                    ]
                                ]
                            ]
                        ],
                    ],
                    'Delete' => [
                        'label' => 'Delete',
                        'class' => 'rcmAdminMenu RcmBlankDialog icon-after delete-page',
                        'title' => 'Delete Current Page',
                        'uri' => '/modules/rcm-admin/page-delete/page-delete.html',
                    ],
                ],
            ],
            'Site' => [
                'label' => 'Site',
                'uri' => '#',
                'pages' => [
                    'Manage Sites' => [
                        'label' => 'Manage Sites',
                        'class' => 'rcmAdminMenu rcmStandardDialog icon-after manage-sites',
                        'uri' => '/modules/rcm-admin/manage-sites/manage-sites.html',
                        'title' => 'Manage Sites',
                    ],
                    'Create Site' => [
                        'label' => 'Create Site',
                        'class' => 'rcmAdminMenu rcmStandardDialog icon-after create-site',
                        'uri' => '/modules/rcm-admin/create-site/create-site.html',
                        'title' => 'Create Site',
                    ],
                    'Copy Pages' => [
                        'label' => 'Copy Pages',
                        'class' => 'rcmAdminMenu rcmStandardDialog icon-after copy-pages',
                        'uri' => '/modules/rcm-admin/site-page-copy/site-page-copy.html',
                        'title' => 'Copy Pages',
                    ],
                ]
            ],
            'User' => [
                'label' => 'Users',
                'uri' => '#',
                'pages' => [

                ],
            ],
        ],
    ],
    /* rcmAdmin Config */
    'rcmAdmin' => [
        'createBlankPagesErrors' => [
            'missingItems'
            => 'Please make sure to include a Page Name and select the'
                . 'layout you wish to use.',
            'pageExists'
            => 'The page URL provided already exists'
        ],
        'saveAsTemplateErrors' => [
            'missingItems'
            => 'Please make sure to include a Page Name',
            'pageExists'
            => 'The page URL provided already exists',
            'revisionNotFound'
            => 'Unable to locate page revision.  '
                . 'Please contact the administrator.'
        ],
        'createSiteErrors' => [
            'missingItems'
            => 'Some needed information is missing.  '
                . 'Please check and make sure to include'
                . ' a domain, country, and language.',
            'countryNotFound'
            => 'Unable to locate country to save.  '
                . 'Please contact and administrator or try again.',
            'languageNotFound'
            => 'Unable to locate language to save.  '
                . 'Please contact and administrator or try again.',
            'domainInvalid'
            => 'Domain exists or is invalid.',
            'newSiteNotImplemented'
            => 'Creating a new blank site has not'
                . ' been implemented yet.',
            'siteNotFound'
            => 'Unable to locate the site to clone.  '
                . 'Please contact and administrator or try again.',
        ],
        'adminRichEditor' => 'tinyMce',
        'defaultSiteSettings' => [
            'siteLayout' => "GuestSitePage",
            'siteTitle' => "My Site",
            'languageIso6392t' => "eng",
            'countryId' => "USA",
            'status' => "A",
            'favIcon' => "/images/favicon.ico",
            'loginPage' => "/login",
            'notAuthorizedPage' => "/not-authorized",
            'notFoundPage' => "not-found",
            'containers' => [
                'guestTopNavigation',
                'guestMainNavigation',
                'guestRightColumn',
                'guestFooter',
            ],
            'pages' => [
                [
                    'name' => 'index',
                    'description' => 'Home Page.',
                    'pageTitle' => 'Home',
                    'plugins' => [
                        [
                            'plugin' => 'RcmHtmlArea',
                            'displayName' => 'Home Page Area',
                            'instanceConfig' => [],
                            'layoutContainer' => '4',
                            'saveData' => [
                                'html' => '<h1>Home</h1>',
                            ]
                        ],
                    ],
                ],
                [
                    'name' => 'login',
                    'description' => 'Login Page.',
                    'pageTitle' => 'Login',
                    'plugins' => [
                        [
                            'plugin' => 'RcmLogin',
                            'displayName' => 'Login Area',
                            'instanceConfig' => [],
                            'layoutContainer' => '4',
                            'saveData' => [],
                        ],
                    ],
                ],
                [
                    'name' => 'not-authorized',
                    'description' => 'Not Authorized Page.',
                    'pageTitle' => 'Not Authorized',
                    'plugins' => [
                        [
                            'plugin' => 'RcmHtmlArea',
                            'displayName' => 'Access Denied Area',
                            'instanceConfig' => [],
                            'layoutContainer' => '4',
                            'saveData' => [
                                'html' => '<h1>Access Denied</h1>',
                            ]
                        ],
                    ],
                ],
                [
                    'name' => 'not-found',
                    'description' => 'Not Found Page.',
                    'pageTitle' => 'Not Found',
                    'plugins' => [
                        [
                            'plugin' => 'RcmHtmlArea',
                            'displayName' => 'Page Not Found Area',
                            'instanceConfig' => [],
                            'layoutContainer' => '4',
                            'saveData' => [
                                'html' => '<h1>Page Not Found</h1>',
                            ]
                        ],
                    ],
                ],
            ],
        ],
    ],
    /* router */
    'router' => [
        'routes' => [
            'RcmAdmin\Page\New' => [
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route' => '/rcm-admin/page/new',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\PageController',
                        'action' => 'new',
                    ],
                ],
            ],
            'RcmAdmin\Page\CreateTemplateFromPage' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route'
                    => '/rcm-admin/page/create-template-from-page/:rcmPageType/:rcmPageName[/[:rcmPageRevision]]',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\PageController',
                        'action' => 'createTemplateFromPage',
                    ],
                ],
            ],
            'RcmAdmin\Page\PublishPageRevision' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/rcm-admin/page/publish-page-revision/:rcmPageType/:rcmPageName/:rcmPageRevision',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\PageController',
                        'action' => 'publishPageRevision',
                    ],
                ],
            ],
            'RcmAdminApiCurrentSite' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/admin/current-site[/:id]',
                    'defaults' => [
                        'id' => 'current',
                        'controller' => 'RcmAdmin\Controller\ApiAdminCurrentSiteController',
                    ]
                ],
            ],
            'ApiAdminManageSitesController' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/admin/manage-sites[/:id]',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\ApiAdminManageSitesController',
                    ]
                ],
            ],
            'ApiAdminSitesCloneController' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/admin/site-copy[/:id]',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\ApiAdminSitesCloneController',
                    ]
                ],
            ],
            'ApiAdminLanguageController' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/admin/language[/:id]',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\ApiAdminLanguageController',
                    ]
                ],
            ],
            'ApiAdminThemeController' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/admin/theme[/:id]',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\ApiAdminThemeController',
                    ]
                ],
            ],
            'ApiAdminCountryController' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/admin/country[/:id]',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\ApiAdminCountryController',
                    ]
                ],
            ],
            'ApiAdminSitePageController' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/admin/sites/:siteId/pages[/:id]',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\ApiAdminSitePageController',
                    ]
                ],
            ],
            'ApiAdminSitePageCloneController' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/admin/sites/:siteId/page-copy[/:id]',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\ApiAdminSitePageCloneController',
                    ]
                ],
            ],
            'ApiAdminPageTypesController' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/admin/pagetypes[/:id]',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\ApiAdminPageTypesController',
                    ]
                ],
            ],
            'RcmAdmin\\RpcAdminCanEdit' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/rpc/rcm-admin/can-edit[/:id]',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\RpcAdminCanEdit',
                    ]
                ],
            ],
            'RcmAdmin\\RpcAdminKeepAlive' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/rpc/rcm-admin/keep-alive[/:id]',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\RpcAdminKeepAlive',
                    ]
                ],
            ],
            'RcmAdmin\Page\SavePage' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/rcm-admin/page/save-page/:rcmPageType/:rcmPageName/:rcmPageRevision',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\PageController',
                        'action' => 'savePage',
                    ],
                ],
            ],
            'RcmAdmin\Page\PagePermissions' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/rcm-admin/page-permissions/:rcmPageType/:rcmPageName',
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\PagePermissionsController',
                        'action' => 'pagePermissions',
                    ],
                ],
            ],
            'RcmAdmin\Page\GetPermissions' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/admin/page/permissions/[:id]',
                    'constraints' => [
                        'id' => '[a-zA-Z0-9_-]+',
                    ],
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\PageViewPermissionsController',
                    ],
                ],
            ],
            'RcmAdmin\ApiAdminCheckPermissions' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/api/admin/check-permissions/:resourceId/:privileges/:id',
                    'constraints' => [
                        'id' => '[a-zA-Z0-9._-]+',
                        'resourceId' => '[a-zA-Z0-9._-]+',
                        'privileges' => '[a-zA-Z0-9._-]+',
                    ],
                    'defaults' => [
                        'controller' => 'RcmAdmin\Controller\ApiAdminCheckPermissionsController',
                    ],
                ],
            ],
        ],
    ],
    /* service_manager */
    'service_manager' => [
        'config_factories' => [
            'RcmAdmin\Service\SiteManager' => [
                'arguments' => [
                    'Config',
                    'Doctrine\ORM\EntityManager',
                    'RcmUser\Service\RcmUserService',
                ],
            ],
        ],
        'factories' => [
            'RcmAdmin\EventListener\DispatchListener'
            => 'RcmAdmin\Factory\DispatchListenerFactory',
            'RcmAdmin\Controller\AdminPanelController'
            => 'RcmAdmin\Factory\AdminPanelControllerFactory',
            'RcmAdminNavigation'
            => 'RcmAdmin\Factory\AdminNavigationFactory',
        ],
    ],
    /* view_manager */
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
    /* view_helpers */
    'view_helpers' => [
        'factories' => [
            'availablePluginsList' => \RcmAdmin\Factory\AvailablePluginsJsListFactory::class
        ],
        'invokables' => [
            'formPageLayout' => 'RcmAdmin\View\Helper\FormPageLayout',
            'displayErrors' => 'RcmAdmin\View\Helper\DisplayErrors',
        ]
    ],
];
