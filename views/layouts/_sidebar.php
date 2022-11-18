<?php

use app\models\Profil;
use app\models\User;
use kartik\icons\Icon;

// app\assets\AdminLtePluginAsset::register($this);
?>

<!-- Sidebar user panel -->
<!-- <div class="user-panel" >
    <div class="pull-left image">

    </div>
    <div class="pull-left info" id="loadMenuSidebar">
        <p>Rusli</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div> -->

<?php

// prepare menu items, get all modules

// $favouriteMenuItems[] = [
//     'label' => 'MENU NAVIGASI', 
//     'options' => ['class' => 'header'],
//     'visible' => in_array(Yii::$app->user->identity->akses, [
//         User::ROLE_ADMIN
//     ]),
// ];
// $favouriteMenuItems[] = ['label' => 'MENU NAVIGASI', 'options' => ['class' => 'header']];
$menuItems = [];
$menuItems = [
    [
        'label' => 'MENU NAVIGASI', 
        'options' => ['class' => 'header'],
        'visible' => in_array(Yii::$app->user->identity->akses, [
            User::ROLE_SUPERADMIN,
            User::ROLE_ADMIN
        ]),
    ],
    [
        'url' => ['surat-masuk/create'],
        'icon' => 'plus',
        'label' => 'Tambah buku',
        'active' => in_array(Yii::$app->requestedRoute, ['surat-masuk/create', 'surat-masuk/update', 'surat-masuk/view' ]),
        'visible' => in_array(Yii::$app->user->identity->akses, [
            User::ROLE_SUPERADMIN,
            User::ROLE_ADMIN
        ]),
    ], 
    [
        'url' => ['surat-masuk/index'],
        'icon' => 'book',
        'label' => 'Indeks Buku',
        'active' => in_array(Yii::$app->requestedRoute, ['surat-masuk/index']),
        'visible' => in_array(Yii::$app->user->identity->akses, [
            User::ROLE_SUPERADMIN,
            User::ROLE_ADMIN
        ]),
    ], 
    [
        'label' => 'MANAJEMEN',
        'options' => ['class' => 'header'],
        'visible' => in_array(Yii::$app->user->identity->akses, [
            User::ROLE_SUPERADMIN,
            User::ROLE_ADMIN,
            User::ROLE_LABORATORIUM,
            User::ROLE_ADMIN_LABORATORIUM
        ]),
    ],
    [
        'label' => 'Manajemen',
        'icon' => 'database',
        'url' => '#',      
        'active' => in_array(Yii::$app->requestedRoute, ['pengguna/index', 'jabatan/index']),    
        'visible' => in_array(Yii::$app->user->identity->akses, [
            User::ROLE_SUPERADMIN,
            User::ROLE_ADMIN,
            User::ROLE_LABORATORIUM,
            User::ROLE_ADMIN_LABORATORIUM,           
        ]),   
        'items' => [
            [
                'url' => ['pengguna/index'],
                'icon' => 'users',
                'label' => 'Pengguna' ,
                'active' => in_array(Yii::$app->requestedRoute, ['pengguna/index', 'pengguna/create', 'pengguna/update', 'pengguna/view']),
                'visible' => in_array(Yii::$app->user->identity->akses, [
                    User::ROLE_SUPERADMIN,
                ]),
            ],
            // [
            //     'url' => ['jabatan/index', 'jabatan/create', 'jabatan/update', 'jabatan/view'],
            //     'icon' => 'user',
            //     'label' => 'Jabatan',
            //     'active' => in_array(Yii::$app->requestedRoute, ['jabatan/index', 'jabatan/create', 'jabatan/update', 'jabatan/view']),
            //     'visible' => in_array(Yii::$app->user->identity->akses, [
            //         User::ROLE_SUPERADMIN,
            //         User::ROLE_ADMIN
            //     ]),
            // ],
            // [
            //     'url' => ['kode-surat/index', 'kode-surat/create', 'kode-surat/update', 'kode-surat/view'],
            //     'icon' => 'user',
            //     'label' => 'Kode Surat',
            //     'active' => in_array(Yii::$app->requestedRoute, ['kode-surat/index', 'kode-surat/create', 'kode-surat/update', 'kode-surat/view']),
            //     'visible' => in_array(Yii::$app->user->identity->akses, [
            //         User::ROLE_SUPERADMIN,
            //         User::ROLE_ADMIN
            //     ]),
            // ],
            // [
            //     'url' => ['dokter/index'],
            //     'icon' => 'user-md',
            //     'label' => 'Dokter' ,
            //     'active' => in_array(Yii::$app->requestedRoute, ['dokter/index', 'dokter/create', 'dokter/update', 'dokter/view']),
            //     'visible' => in_array(Yii::$app->user->identity->akses, [
            //         User::ROLE_SUPERADMIN,
            //         User::ROLE_LABORATORIUM,
            //         User::ROLE_ADMIN_LABORATORIUM,   
            //     ]),
            // ],
            // [
            //     'url' => ['daerah/index'],
            //     'icon' => 'map',
            //     'label' => 'Daerah' ,
            //     'active' => in_array(Yii::$app->requestedRoute, ['daerah/index', 'daerah/create', 'daerah/update', 'daerah/view']),
            //     'visible' => in_array(Yii::$app->user->identity->akses, [
            //         User::ROLE_SUPERADMIN,
            //     ]),
            // ],
            // [
            //     'label' => 'Daerah',
            //     'icon' => 'map',
            //     'url' => '#',      
            //     'active' => in_array(Yii::$app->requestedRoute, ['provinsi/index', 'kabupaten/index', 'kecamatan/index', 'kelurahan/index']),    
            //     'visible' => in_array(Yii::$app->user->identity->akses, [
            //         User::ROLE_SUPERADMIN,       
            //     ]),   
            //     'items' => [
            //         [
            //             'url' => ['provinsi/index'],
            //             'icon' => 'map-marker',
            //             'label' => 'Provinsi' ,
            //             'active' => in_array(Yii::$app->requestedRoute, ['provinsi/index', 'provinsi/create', 'provinsi/update', 'provinsi/view']),
            //             'visible' => in_array(Yii::$app->user->identity->akses, [
            //                 User::ROLE_SUPERADMIN,
            //             ]),
            //         ],
            //         [
            //             'url' => ['kabupaten/index'],
            //             'icon' => 'map-marker',
            //             'label' => 'Kabupaten' ,
            //             'active' => in_array(Yii::$app->requestedRoute, ['kabupaten/index', 'kabupaten/create', 'kabupaten/update', 'kabupaten/view']),
            //             'visible' => in_array(Yii::$app->user->identity->akses, [
            //                 User::ROLE_SUPERADMIN,
            //             ]),
            //         ],
            //         [
            //             'url' => ['kecamatan/index'],
            //             'icon' => 'map-marker',
            //             'label' => 'Kecamatan' ,
            //             'active' => in_array(Yii::$app->requestedRoute, ['kecamatan/index', 'kecamatan/create', 'kecamatan/update', 'kecamatan/view']),
            //             'visible' => in_array(Yii::$app->user->identity->akses, [
            //                 User::ROLE_SUPERADMIN,
            //             ]),
            //         ],
            //         [
            //             'url' => ['kelurahan/index'],
            //             'icon' => 'map-marker',
            //             'label' => 'Kelurahan' ,
            //             'active' => in_array(Yii::$app->requestedRoute, ['kelurahan/index', 'kelurahan/create', 'kelurahan/update', 'kelurahan/view']),
            //             'visible' => in_array(Yii::$app->user->identity->akses, [
            //                 User::ROLE_SUPERADMIN,
            //             ]),
            //         ],
            //     ],
            // ],



        ],
    ],
    // [
    //     'url' => ['sifat-surat/index'],
    //     'icon' => 'exclamation-circle',
    //     'label' => 'Sifat Surat',
    //     'active' => in_array(Yii::$app->requestedRoute, ['sifat-surat/index', 'sifat-surat/create', 'sifat-surat/update', 'sifat-surat/view']),
    //     'visible' => Yii::$app->user->identity->akses === User::ROLE_SUPERADMIN,
    // ],
    // [
    //     'url' => ['laporan/file'],
    //     'icon' => 'file-excel-o',
    //     'template' => '<a href="{url}">{icon} {label}<span id="jExcel">' . \app\models\Laporan::getJumlahFileExcel() . '</span></a>',
    //     'label' => 'File Sementara',
    //     'active' => in_array(Yii::$app->requestedRoute, ['laporan/file']),
    //     'visible' => in_array(Yii::$app->user->identity->akses, [
    //         User::ROLE_SUPERADMIN,
    //     ]),
    // ],
    // [
    //     'label' => 'SUPER ADMIN',
    //     'options' => ['class' => 'header'],
    //     'visible' => in_array(Yii::$app->user->identity->akses, [
    //         User::ROLE_SUPERADMIN,
    //     ]),
    // ],
    // [
    //     'url' => ['pengguna/index'],
    //     'icon' => 'users',
    //     'label' => 'Pengguna' ,
    //     'active' => in_array(\Yii::$app->controller->id, ['pengguna']),
    //     'visible' => Yii::$app->user->identity->akses === User::ROLE_SUPERADMIN,
    // ],
    // [
    //     'url' => ['poliklinik/index'],
    //     'icon' => 'medkit',
    //     'label' => 'Poliklinik' ,
    //     'active' => in_array(\Yii::$app->controller->id, ['poliklinik']),
    //     'visible' => Yii::$app->user->identity->akses === User::ROLE_SUPERADMIN,
    // ],
];
echo dmstr\widgets\Menu::widget([
    'items' => $menuItems,
]);



    // [
    //     'url' => ['antrian/index'],
    //     'icon' => 'list-alt',
    //     'label' => 'Antrian Kunjungan',
    //     'active' => in_array(\Yii::$app->controller->id, ['antrian']),
    //     'visible' => Yii::$app->user->identity->akses!=User::ROLE_SUPERADMIN,
    // ],  
    // [
    //     'url' => ['riwayat/index'],
    //     'icon' => 'history',
    //     'label' => 'Riwayat Kunjungan',
    //     'active' => in_array(\Yii::$app->controller->id, ['riwayat']),
    //     'visible' => Yii::$app->user->identity->akses!=User::ROLE_SUPERADMIN,
    // ],  
    // [
    //     'url' => ['laporan/index'],
    //     'icon' => 'file',
    //     'label' => 'Laporan Kunjungan',
    //     'active' => in_array(\Yii::$app->controller->id, ['laporan']),
    //     'visible' => Yii::$app->user->identity->akses!=User::ROLE_SUPERADMIN,
    // ],    
// ];
// echo dmstr\widgets\Menu::widget([
//     'items' => \yii\helpers\ArrayHelper::merge($favouriteMenuItems, $menuItems),
// ]);

// // echo '<br>';
// $favouriteMenuItems = [];
// $favouriteMenuItems[] = ['label' => 'HAK AKSES SISTEM', 'options' => ['class' => 'header']];
// $menuItems = [];
// $menuItems = [
    // [
    //     'url' => ['pengguna/index'],
    //     'icon' => 'users',
    //     'label' => 'Pengguna',
    //     'active' => in_array(\Yii::$app->controller->id, ['pengguna']),
    //     'visible' => Yii::$app->user->identity->akses!=User::ROLE_ADMIN,
    // ],    
    // [
    //     'url' => ['poliklinik/index'],
    //     'icon' => 'ambulance',
    //     'label' => 'Poliklinik',
    //     'active' => in_array(\Yii::$app->controller->id, ['poliklinik']),
    //     'visible' => Yii::$app->user->identity->akses!=User::ROLE_ADMIN,
    // ], 
    // [
    //     'url' => ['dokter/index'],
    //     'icon' => 'user-md',
    //     'label' => 'Dokter',
    //     'active' => in_array(\Yii::$app->controller->id, ['dokter']),
    //     'visible' => Yii::$app->user->identity->akses!=User::ROLE_ADMIN,
    // ], 
    // [
    //     'url' => ['pasien/index'],
    //     'icon' => 'wheelchair',
    //     'label' => 'Pasien',
    //     'active' => in_array(\Yii::$app->controller->id, ['pasien']),
    //     'visible' => Yii::$app->user->identity->akses!=User::ROLE_ADMIN,
    // ],   


?>

