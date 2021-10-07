<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'title' => 'SoftGanadoBOVINO',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'logo' => '<b>SoftGanado</b>BOVINO',
    'logo_img' => 'vendor/adminlte/dist/img/logo_vaca.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'logo_vaca',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'bg-gradient-dark',
    'classes_auth_header' => '',
    'classes_auth_body' => 'bg-gradient-dark',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'text-light',
    'classes_auth_btn' => 'btn-flat btn-light',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => '/',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */


    
    //date_default_timezone_set('America/Guayaquil'),
    'menu' => [
       /* [
            'text'=>date('Y-m-d H:i:s'),
            'url'=>'#',
            'topnav'=>true

        ],*/
        [
            'text' => 'profile',
            'url'  => 'user/profile',
            'icon' => 'fas fa-fw fa-user',
          
        ],
        ['header' => 'SEGURIDAD',
         'can'    => 'rol.index',
        ],
       
        [
            'text' => 'Lista de Roles',
            'url'  => '/rol',
            'icon' =>'fas fa-users',
            'can'  => 'rol.index',
           
        ],
        [
            'text' => 'Usuarios',
            'url'  => '/usuarios',
            'icon' =>'fas fa-user-friends',
            'can' =>'usuarios.index',
           
        ],
        [
            'text'=>'Actividad de Usuario',
            'url'=>'/actividad-usuario',
            'icon'=>'fas fa-suitcase',
            'can'=>'actividad.index',

        ],
       
       
      
        ['header' => 'DASHBOARDS',
         'can'=>'dashboard.index',

        ],
     
    
        [
            'text'=> 'Dashboard',
            'icon'=> 'fas fa-tachometer-alt',
            'can'=>'dashboard.index',
           
            'submenu' => [
                    [
                    'text' => 'General',
                    'url'=> '/dashboard',
                    'icon' => 'fas fa-chart-line',
                    'can'=>'dashboard.index',
                    'shift' => 'ml-4',
                    ],

                    [
                        'text' => 'Reproducción',
                        'url'=> '/dashboard-reproduccion',
                        'icon' => 'fas fa-chart-line',
                        'can'=>'dashboard.index',
                        'shift' => 'ml-4',
                    ],
                    [
                        'text' =>'Búsqueda',
                        'url'=> '/dashboard-busqueda',
                        'icon' => 'fas fa-chart-line',
                        'can'=>'dashboard.index',
                        'shift' => 'ml-4',
                    ],
                       
               ],


        ],

   

        ['header' => 'REGISTROS Y CONTROLES',
         
        ],
        [
            'text'    => 'Registros',
            'icon'    => 'fas fa-book',
            
            
            'submenu' => [
                [
                    'text' => 'Ficha Animales',
                    'url'  => '/fichaAnimal',
                    'icon'  => 'fas fa-paw',
                    'can' => 'fichaAnimal.index',
                    'shift' => 'ml-4',
                ],
                [
                    'text' => 'Ficha Partos',
                    'url'  => '/fichaParto',
                    'icon'  => 'fas fa-ambulance',
                    'can' => 'fichaParto.index',
                    'shift' => 'ml-4',
                ],
                [
                    'text' => 'Ficha Tratamiento',
                    'url'  => '/fichaTratamiento',
                    'icon'  => 'fas fa-folder',
                    'can' => 'fichaTratamiento.index',
                    'shift' => 'ml-4',
                ],


                [
                    'text' => 'Fichas Reproducción',
                    'icon'  => 'fas fa-venus',
                    'can'=>'fichaReproduccionM.index',
                    'shift' => 'ml-4',
                    'submenu' =>[
                        [
                            'text' => 'Ficha Interna',
                            'icon'  => '',
                            'icon_color' => 'primary',
                            'can' => 'fichaReproduccionM.index',
                            'shift' => 'ml-5',

                            'submenu' =>[
                                [
                                    'text' => 'Artificial',
                                    'url'  => '/fichaReproduccionA',
                                    'icon'  => 'fas fa-genderless',
                                    'icon_color' => 'primary',
                                    'can' => 'fichaReproduccionA.index',
                                    'shift' => 'ml-5',
                                   
                                ],


                                [
                                    'text' => 'Natural',
                                    'url'  => '/fichaReproduccionM',
                                    'icon'  => 'fas fa-genderless',
                                    'icon_color' => 'primary',
                                    'can' => 'fichaReproduccionM.index',
                                    'shift' => 'ml-5',
                                   
                                ],

                              
                                
                            ],
                        ],

                        [
                            'text' => 'Ficha Externa',
                            'url'  => '/fichaReproduccionEx',
                            'icon' =>'',
                            'icon_color' => 'primary',
                            'can'=> 'fichaReproduccionEx.index',
                            'shift' => 'ml-5',
                        ],
                      
                    ],

                ],

            ],
        ],

        [
            'text'    => 'Controles',
            'icon'    => 'fas fa-book',
           
            'submenu' => [
                [
                    'text' => 'Control Vacunas',
                    'url'  => '/controlVacuna',
                    'icon'  => 'fas fa-syringe',
                    'can' =>'controlVacuna.index',
                    'shift' => 'ml-4',
                ],
                [
                    'text' => 'Control Peso ',
                    'url'  => '/controlPeso',
                    'icon'  => 'fas fa-weight',
                    'can' =>'controlPeso.index',
                    'shift' => 'ml-4',
                ],
                [
                    'text' => 'Control Desparasitación ',
                    'url'  => '/controlDesparasitacion',
                    'icon'  => 'fas fa-vials',
                    'can' =>'controlDesparasitacion.index',
                    'shift' => 'ml-4',
                ],
                [
                    'text' => 'Control Preñez ',
                    'url'  => '/controlPrenes',
                    'icon'  => 'fas fa-file-medical',
                    'can' =>'controlPrenes.index',
                    'shift' => 'ml-4',
                ],


            ],
        ],
        [
            'text'    => 'Configuración',
            'icon'    => 'fas fa-cog',
            'can' =>'confDespa.index',
          
            'submenu' => [
                [
                    'text' =>'Medicamentos',
                    'icon' =>'fas fa-prescription-bottle-alt',
                    'can' =>'confDespa.index',
                    'shift' => 'ml-3',
                    'submenu' =>[
                        [
                            'text' => 'Desparasitante',
                            'url'  => '/confDespa',
                            'icon'  => 'fas fa-vial',
                            'can' =>'confDespa.index',
                            'shift' => 'ml-5',
                        ],

                        [
                            'text' => 'Vacunas',
                            'url'  => '/confVacuna',
                            'icon'  => 'fas fa-syringe',
                            'can' =>'confVacuna.index',
                            'shift' => 'ml-5',
                        ],
                        [
                            'text' =>'Vitaminas',
                            'url' =>'/confVi',
                            'icon'=>'fas fa-pills',
                            'can' =>'confVi.index',
                            'shift' => 'ml-5',
                        ],

                        [
                            'text'=> 'Antibióticos',
                            'url' => '/confAnt',
                            'icon' => 'fas fa-shield-virus',
                            'can' =>'confAnt.index',
                            'shift' => 'ml-5',
                        ],


                    ],
                ],
                [
                    'text' => 'Material Genético ',
                    'url'  => '/confMate',
                    'icon' =>'fas fa-vial',
                    'can' =>'confMate.index',
                    'shift' => 'ml-3',
                ],

                [
                    'text' => 'Ubicacion Interna ',
                    'url'  => '/confUbicacion',
                    'icon' =>'fas fa-map',
                    'can' =>'confUbicacion.index',
                    'shift' => 'ml-3',
                ],

                [
                    'text' => 'Razas ',
                    'url'  => '/confRaza',
                    'icon' =>'fas fa-file-contract',
                    'can' =>'confRaza.index',
                    'shift' => 'ml-3',
                ],


            ],
        ],





    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'filters' =>[
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],


    
    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    */

    'livewire' => false,
];
