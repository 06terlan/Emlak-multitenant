<?php

namespace App\Library;

class MyClass
{
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
            2 => 'Author'
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
        'land' => 'Torpa',
        'object' => 'Obyekt'
    ];

    /**
     * Available document types
     */
    public static $documentTypes =
    [
        1 => 'Çıxarış (Kupça)',
    ];

    /**
     * Available repairing types
     */
    public static $repairingTypes =
    [
        1 => 'Əla təmirli',
        2 => 'Təmirli',
        3 => 'Orta təmirli',
    ];

    /*
	* Admin role
    */
    const ADMIN_ROLE = 1;

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
    const INFO_COUNT = 99;
}
