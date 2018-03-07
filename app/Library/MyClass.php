<?php



namespace App\Library;



class MyClass

{
    public static $buttonStatus =
    [
        1 => 'İcarədə',
        2 => 'Satıldı',
        3 => 'İcarədə deyil',
        4 => 'Satılmayıb',
    ];

    public static $buttonStatus2 =
    [
        3 => 'İcarədə',
        4 => 'Satıldı',
        1 => 'İcarədə deyil',
        2 => 'Satılmayıb',
    ];

    /**

     * Available bulding types

     */
    public static $buldingType =

    [

            1 => 'İcarə',
            2 => 'Satış',
            3 => 'Günlük'

    ];

    /**

     * Available bulding types second

     */
    public static $buldingSecondType =
    [
        'new' => 'Yeni tikili',
        'old' => 'Köhnə tikili'
    ];

    /**

     * Available bulding types second

     */
    public static $ownerType =
    [
        0 => 'Ancaq mülkiyyətçi',
        1 => 'Ancaq vasitəçi'
    ];


    /**

     * Available image types

     */

    public static $imageTypes =

    [

        "png","jpg","jpeg"

    ];



    /**

     * Available role types

     */

    public static $roles =

        [

            1 => 'Admin',

            2 => 'Author',

            3 => 'Super Admin'

        ];



    /**

     * Available announcement types

     */

    public static $announcementTypes =

    [

        /*'new_bulding' => 'Yeni tikili',

        'old_building' => 'Kohne tikili',*/

        'building' => 'Bina ev mənzil',

        'house' => 'Heyet evi',

        'villa' => 'Villa',

        'garden_house' => 'Bag evi',

        'office' => 'Ofis',

        'garage' => 'Qaraj',

        'land' => 'Torpaq',

        'object' => 'Obyekt'

    ];



    /**

     * Available document types

     */

    public static $documentTypes =

    [

        1 => 'Çıxarış (Kupça)',
        2 => 'Çıxarış (Kupçasız)',

    ];



    /**

     * Available repairing types

     */

    public static $repairingTypes =

    [

        1 => 'Əla təmirli',

        2 => 'Təmirli',

        3 => 'Orta təmirli',

        4 => 'Təmirsiz',

    ];



    /*

	* privs

    */

    const PRIV_CAN_SEE = 2;

    const PRIV_CAN_ADD = 3;

    const PRIV_SUPER_ADMIN_CAN_SEE = 4;

    const PRIV_SUPER_ADMIN_CAN_ADD = 5;



    /*

    * Admin role

    */

    const USER_PROFIL_PIC_DIR = '/admin/images/user/';
    const ANN_PIC_DIR = '/admin/images/ann/';
    const ANN_THUMB_PIC_DIR = '/admin/images/ann_thumb/';



    /*

    * Admin panel page data count

    */

    const ADMIN_ROW_COUNT = 12;



    /*

    * row count

    */

    const ROW_COUNT = 5;



    /*

    * info count

    */

    const INFO_COUNT = 200;

    /**

     * company types

     */

    public static $companyTypes =

    [

        'agent' => 'Makler',

        'little_company' => 'Kiçik şirkət',

        'company' => 'Şirkət',

        'big_company' => 'Böyük şirkət',

    ];

    /**

     * company types

     */

    public static $modules =
    [
        'dashboard' => ['name'=> 'Dashboard', 'icon'=> 'fa fa-dashboard',  'route'=> 'dashboard', 'priv'=> MyClass::PRIV_CAN_SEE],
        'tenant' => ['name'=> 'Tenantlar', 'icon'=> 'fa fa-briefcase',  'route'=> 'tenant', 'priv'=> MyClass::PRIV_SUPER_ADMIN_CAN_SEE],
        'users' => ['name'=> 'İstifadəçilər', 'icon'=> 'fa fa-user',  'route'=> 'users', 'priv'=> MyClass::PRIV_CAN_SEE],
        'announcement' => ['name'=> 'Elanlar', 'icon'=> 'fa fa-share-alt',  'route'=> 'announcement', 'priv'=> MyClass::PRIV_CAN_SEE],
        'announcement_pro' => ['name'=> 'Elanlar fərdi əlavə', 'icon'=> 'fa fa-share-alt-square', 'route'=> 'announcement_pro', 'priv'=> MyClass::PRIV_CAN_SEE],
        'search' => ['name'=> 'Axtarış', 'icon'=> 'fa fa-search',  'route'=> 'search', 'priv'=> MyClass::PRIV_CAN_SEE],
        'map' => ['name'=> 'Xəritə', 'icon'=> 'fa fa-map-marker',  'route'=> 'map', 'priv'=> MyClass::PRIV_CAN_SEE],
        'report' => ['name' => 'Hesabatlar', 'icon'=> 'fa fa-bar-chart', 'child'=> [
            'report_announcement_graphic_report' => ['name'=> 'F.Elanlar kateqoria qrafiki hesabat', 'icon'=> '',  'route'=> 'report_announcement_graphic_report', 'priv'=> MyClass::PRIV_CAN_SEE],
            ]
        ],
        'msk' => ['name' => 'Msk', 'icon'=> 'fa fa-wrench', 'child'=> [
            'msk_group' => ['name'=> 'Qruplar', 'icon'=> '',  'route'=> 'msk_group', 'priv'=> MyClass::PRIV_CAN_SEE],
            'msk_makler' => ['name'=> 'Maklerlər', 'icon'=> '',  'route'=> 'msk_makler', 'priv'=> MyClass::PRIV_SUPER_ADMIN_CAN_SEE],
            //'msk_metro' => ['name'=> 'Metrolar', 'icon'=> '',  'route'=> 'msk_metro', 'priv'=> MyClass::PRIV_SUPER_ADMIN_CAN_SEE],
            'msk_city' => ['name'=> 'Şəhərlər', 'icon'=> '',  'route'=> 'msk_city', 'priv'=> MyClass::PRIV_SUPER_ADMIN_CAN_SEE],
            'msk_type' => ['name'=> 'Şirkət növləri', 'icon'=> '',  'route'=> 'msk_type', 'priv'=> MyClass::PRIV_SUPER_ADMIN_CAN_SEE],
            ]
        ]
    ];

    /**

     * metros

     */

    public static $metros =
        [
            1 => ['Gənclik m.', ''],
            2 => ['Ulduz m.', ''],
            3 => ['Həzi Aslanov m.', ''],
            4 => ['Elmlər Akademiyası m.', ''],
            5 => ['Nizami m.', ''],
            6 => ['Şah İsmayıl Xətai m.', ''],
            7 => ['İçəri Şəhər m.', ''],
            8 => ['Sahil m.', ''],
            9 => ['Koroğlu m.', ''],
            10 => ['20 Yanvar m.', ''],
            11 => ['Əhmədli m.', ''],
            12 => ['Qara Qarayev m.', ''],
            13 => ['Neftçilər m.', ''],
            14 => ['Xalqlar Dostluğu m.', ''],
            15 => ['Memar Əcəmi m.', ''],
            16 => ['Azadlıq Prospekti m.', ''],
            17 => ['Nəsimi m.', ''],
            18 => ['Dərnəgül m.', ''],
            19 => ['Cəfər Cabbarlı m.', ''],
            20 => ['Bakmil m.', ''],
            21 => ['İnşaatçılar m.', ''],
            22 => ['28 May m.', ''],
            23 => ['Avtovağzal m.', ''],
        ];
}

