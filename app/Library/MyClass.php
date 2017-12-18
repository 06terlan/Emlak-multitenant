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
