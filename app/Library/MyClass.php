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

            2 => 'Satış'

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

        'new_bulding' => 'Yeni tikili',

        'old_building' => 'Kohne tikili',

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



    /*

    * Admin panel page data count

    */

    const ADMIN_ROW_COUNT = 10;



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
        'dashboard' => ['name'=> 'Dashboard', 'route'=> 'dashboard', 'priv'=> MyClass::PRIV_CAN_SEE],
        'tenant' => ['name'=> 'Tenantlar', 'route'=> 'tenant', 'priv'=> MyClass::PRIV_SUPER_ADMIN_CAN_SEE],
        'users' => ['name'=> 'İstifadəçilər', 'route'=> 'users', 'priv'=> MyClass::PRIV_CAN_SEE],
        'announcement' => ['name'=> 'Elanlar', 'route'=> 'announcement', 'priv'=> MyClass::PRIV_CAN_SEE],
        'announcement_pro' => ['name'=> 'Elanlar fərdi əlavə', 'route'=> 'announcement_pro', 'priv'=> MyClass::PRIV_CAN_SEE],
        'search' => ['name'=> 'Axtarış', 'route'=> 'search', 'priv'=> MyClass::PRIV_CAN_SEE],
        'Msk' => [
            'msk_group' => ['name'=> 'Qruplar', 'route'=> 'msk_group', 'priv'=> MyClass::PRIV_CAN_SEE],
            'msk_makler' => ['name'=> 'Maklerlər', 'route'=> 'msk_makler', 'priv'=> MyClass::PRIV_SUPER_ADMIN_CAN_SEE],
        ]
    ];
}

