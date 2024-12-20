<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5cfe5bfb91f94acd28462482e95655bf
{
    public static $files = array (
        'e1fd76e2b159e9584a1c441b487c9a12' => __DIR__ . '/../..' . '/src/helpers.php',
        '1c9fe6be7f07cd1560522d1d83de9cb0' => __DIR__ . '/../..' . '/src/template-tags.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Site_Functionality\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Site_Functionality\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Site_Functionality\\' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Site_Functionality\\App\\Admin\\Admin' => __DIR__ . '/../..' . '/src/app/admin/class-admin.php',
        'Site_Functionality\\App\\Admin\\Assets' => __DIR__ . '/../..' . '/src/app/admin/class-assets.php',
        'Site_Functionality\\App\\Admin\\Options' => __DIR__ . '/../..' . '/src/app/admin/class-options.php',
        'Site_Functionality\\App\\Custom_Fields\\Custom_Fields' => __DIR__ . '/../..' . '/src/app/custom-fields/class-custom-fields.php',
        'Site_Functionality\\App\\Custom_Fields\\Page' => __DIR__ . '/../..' . '/src/app/custom-fields/class-page.php',
        'Site_Functionality\\App\\Custom_Fields\\User' => __DIR__ . '/../..' . '/src/app/custom-fields/class-user.php',
        'Site_Functionality\\App\\Frontend\\Assets' => __DIR__ . '/../..' . '/src/app/frontend/class-assets.php',
        'Site_Functionality\\App\\Frontend\\Frontend' => __DIR__ . '/../..' . '/src/app/frontend/class-frontend.php',
        'Site_Functionality\\App\\Post_Types\\Author' => __DIR__ . '/../..' . '/src/app/post-types/class-author.php',
        'Site_Functionality\\App\\Post_Types\\Post_Types' => __DIR__ . '/../..' . '/src/app/post-types/class-post-types.php',
        'Site_Functionality\\App\\Taxonomies\\Author_Type' => __DIR__ . '/../..' . '/src/app/taxonomies/class-author-type.php',
        'Site_Functionality\\App\\Taxonomies\\Country' => __DIR__ . '/../..' . '/src/app/taxonomies/class-country.php',
        'Site_Functionality\\App\\Taxonomies\\Role' => __DIR__ . '/../..' . '/src/app/taxonomies/class-role.php',
        'Site_Functionality\\App\\Taxonomies\\Taxonomies' => __DIR__ . '/../..' . '/src/app/taxonomies/class-taxonomies.php',
        'Site_Functionality\\App\\Users\\Users' => __DIR__ . '/../..' . '/src/app/users/class-users.php',
        'Site_Functionality\\Common\\Abstracts\\Base' => __DIR__ . '/../..' . '/src/common/abstracts/abstract-base.php',
        'Site_Functionality\\Common\\Abstracts\\Post_Type' => __DIR__ . '/../..' . '/src/common/abstracts/abstract-post-type.php',
        'Site_Functionality\\Common\\Abstracts\\Taxonomy' => __DIR__ . '/../..' . '/src/common/abstracts/abstract-taxonomy.php',
        'Site_Functionality\\Common\\WP_Includes\\Activator' => __DIR__ . '/../..' . '/src/common/wp-includes/class-activator.php',
        'Site_Functionality\\Common\\WP_Includes\\Deactivator' => __DIR__ . '/../..' . '/src/common/wp-includes/class-deactivator.php',
        'Site_Functionality\\Common\\WP_Includes\\I18n' => __DIR__ . '/../..' . '/src/common/wp-includes/class-i18n.php',
        'Site_Functionality\\Lib\\Template_Loader' => __DIR__ . '/../..' . '/src/lib/class-template-loader.php',
        'Site_Functionality\\Settings' => __DIR__ . '/../..' . '/src/class-settings.php',
        'Site_Functionality\\Site_Functionality' => __DIR__ . '/../..' . '/src/class-site-functionality.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5cfe5bfb91f94acd28462482e95655bf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5cfe5bfb91f94acd28462482e95655bf::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit5cfe5bfb91f94acd28462482e95655bf::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit5cfe5bfb91f94acd28462482e95655bf::$classMap;

        }, null, ClassLoader::class);
    }
}
