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
}
