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
        'home' => ['name'=> 'İlk Səhifə', 'icon'=> 'timeline',  'route'=> 'home', 'priv'=> 0],
        'dashboard' => ['name'=> 'Göstəriş paneli', 'icon'=> 'dashboard',  'route'=> 'dashboard', 'priv'=> MyClass::PRIV_CAN_SEE],
        'tenant' => ['name'=> 'Şirkətlər', 'icon'=> 'add_to_queue',  'route'=> 'tenant', 'priv'=> MyClass::PRIV_SUPER_ADMIN_CAN_SEE],
        'users' => ['name'=> 'İstifadəçilər', 'icon'=> 'record_voice_over',  'route'=> 'users', 'priv'=> MyClass::PRIV_CAN_SEE],
        'announcement' => ['name'=> 'Gələn Elanlar', 'icon'=> 'announcement',  'route'=> 'announcement', 'priv'=> MyClass::PRIV_CAN_SEE],
        'announcement_pro' => ['name'=> 'Fərdi Elanlar', 'icon'=> 'note_add', 'route'=> 'announcement_pro', 'priv'=> MyClass::PRIV_CAN_SEE],
        'search' => ['name'=> 'Axtarış', 'icon'=> 'search',  'route'=> 'search', 'priv'=> MyClass::PRIV_CAN_SEE],
        'map' => ['name'=> 'Xəritə', 'icon'=> 'place',  'route'=> 'map', 'priv'=> MyClass::PRIV_CAN_SEE],
        'report' => ['name' => 'Hesabatlar', 'icon'=> 'report', 'child'=> [
            'report_announcement_graphic_report' => ['name'=> 'Fərdi Grafik', 'icon'=> 'FG',  'route'=> 'report_announcement_graphic_report', 'priv'=> MyClass::PRIV_CAN_SEE],
            ]
        ],
        'msk' => ['name' => 'Msk', 'icon'=> 'apps', 'child'=> [
            'msk_group' => ['name'=> 'Guruplar', 'icon'=> 'G',  'route'=> 'msk_group', 'priv'=> MyClass::PRIV_CAN_SEE],
            'msk_makler' => ['name'=> 'Agentlər', 'icon'=> 'AG',  'route'=> 'msk_makler', 'priv'=> MyClass::PRIV_SUPER_ADMIN_CAN_SEE],
            //'msk_metro' => ['name'=> 'Metrolar', 'icon'=> 'P',  'route'=> 'msk_metro', 'priv'=> MyClass::PRIV_SUPER_ADMIN_CAN_SEE],
            'msk_city' => ['name'=> 'Şəhərlər', 'icon'=> 'Ş',  'route'=> 'msk_city', 'priv'=> MyClass::PRIV_SUPER_ADMIN_CAN_SEE],
            'msk_type' => ['name'=> 'Şirkət növləri', 'icon'=> 'ŞN',  'route'=> 'msk_type', 'priv'=> MyClass::PRIV_SUPER_ADMIN_CAN_SEE],
            ]
        ]
    ];

    /**

     * metros

     */

    public static $metros =
    [
        1 => ['Gənclik m.', '/(g(e|a|ə)nclik)|(гянджлик)/iu'],
        2 => ['Ulduz m.', '/(ulduz)|(улдуз)/iu'],
        3 => ['Həzi Aslanov m.', '/(aslanov)|(асланов)/iu'],
        4 => ['Elmlər Akademiyası m.', '/(elml(ə|a|e)r)|(эльмляр)/iu'],
        5 => ['Nizami m.', '/(nizami)|(низами)/iu'],
        6 => ['Şah İsmayıl Xətai m.', '/(x(e|a|ə)tai)|(хатаи)/iu'],
        7 => ['İçəri Şəhər m.', '/([iİ][cç][əea]ri[ ]*[şs]h?[əae]h[əae]r)|(ичери[ ]*шехер)/iu'],
        8 => ['Sahil m.', '/(sahil)|(сахил)/iu'],
        9 => ['Koroğlu m.', '/(koro[ğgq]lu)|(корглу)/iu'],
        10 => ['20 Yanvar m.', '/(20[ ]*yanvar)|(20[ ]*январ)/iu'],
        11 => ['Əhmədli m.', '/([əae][hx]m[əae]dli)|(ахмедли)/iu'],
        12 => ['Qara Qarayev m.', '/(qarayev)|(караев)/iu'],
        13 => ['Neftçilər m.', '/(neft?[çc]il[əae]r)|(нефтцил[еа]р)/iu'],
        14 => ['Xalqlar Dostluğu m.', '/(xalqlar)|(халглар)/iu'],
        15 => ['Memar Əcəmi m.', '/([əae]c[əae]mi)|(аджеми)/iu'],
        16 => ['Azadlıq Prospekti m.', '/(azadl[ıi]q)|(азадлиг)/iu'],
        17 => ['Nəsimi m.', '/(n[əae]simi)|(насими)/iu'],
        18 => ['Dərnəgül m.', '/(d[əae]rn[əae]g[üu]l)|(дарнагул)/iu'],
        19 => ['Cəfər Cabbarlı m.', '/(cabbarl[ıi])|(джаббарлы)/iu'],
        20 => ['Bakmil m.', '/(bakmil)|(бакмил)/iu'],
        21 => ['İnşaatçılar m.', '/([İi]n[şs]h?aa?t[çc][ıi]lar)|(иншаатчылар)/iu'],
        22 => ['28 May m.', '/(28[ ]*may)|(28[ ]*май)/iu'],
        23 => ['Avtovağzal m.', '/(avtova[ğg]zal)|(автовокзал)/iu'],
        24 => ['Nəriman Nərimanov m.', '/(n(ə|a|e)rimanov)|(нариманова)/iu'],
    ];

    public static $sight =
    [
        ["28 Mall", '/(28[ ]+mall)|(28[ ]+малл)/iu'],
        ["Absheron Marriott otel", '/((ab[sş]h?eron|marriot)[\w ]+otel)|(отеля[\w ]+абшерон)/iu'],
        ["ABŞ səfirliyi", '/((amerika|ab[sş]h?)[\w ]+s[əe]fir)|(америка[\w ]+(сефир|посольст))|(посольства[\w ]+США)/iu'],
        ["ADA universiteti", '/((ADA|)[\w ]+uni)|(университет[ ]+ада)/iu'],
        ["AF Business House", '/(af[\w ]+(cent|business house))|(аф[\w ]+цент)/iu'],
        ["AGA Business Center", '/(a[gğ]a[\w ]+center)|(ага[\w ]+центер)/iu'],
        ["Ağ şəhər", '/(a[ğg][ ]+[şs]h?[əe]h[əe]r)|(аг[ ]+шехер)/iu'],
        ["Axundov bağı", '/(axundov[\w ]+ba[qğ])|(ахундовскому[\w ]+садику)/iu'],
        ["AMAY", '/(amay)|(амай)/iu'],
        ["Ambassador otel", '/(Ambassador)|(Амбассадор)/iu'],
        ["ANS", '/(ANS)|(АНС)/iu'],
        ["Araz kinoteatrı", '/(Araz[\w ]+kino)|(Кинотеатр[\w" ]+Араз)/iu'],
        ["ATV", '/(ATV[\w-" ]+kanal)|(Телеканал[\w-" ]+АТВ)/iu'],
        ["Aviasiya Akademiyası", '/(Aviasiya[\w-" ]+Akade)|(академия[\w-" ]+авиации)/iu'],
        ["Avropa otel", '/(Avropa[\w-" ]+otel)|(отеля[\w-" ]+ЕВРОПА)/iu'],
        ["Aygun City", '/(ayg[uü]n[\w-" ]+(mall|City))/iu'],
        ["Ayna Sultanova heykəli ", '/((Ayna|A\.)[ ]{0,}Sultanova)|((Айна|А\.)[ ]{0,}Султановой)/iu'],
        ["Azadlıq meydanı  ", '/(Azadl[ıi]q[ ]{0,}meydan[ıi])/iu'],
        ["Azərbaycan Dillər Universiteti ", '/(dill[eə]r[ ]{0,}uni)|(университет[ ]{0,}языков)/iu'],
        ["Azərbaycan kinoteatrı  ", '/(Az[əe]rbaycan[ -”"]+kinoteatr)|((к/т|Кинотеатр)[ -”"]{0,}Азербайджан)/iu'],
        ["Azərbaycan turizm institutu ", '/(turizm[ -”"]+inst)|(Институт[ -”"]+Туризма)/iu'],
        ["Azneft meydanı  ", '/(Azneft)|(Азнефть)/iu'],
        ["AZTV", '/(az[ ]{0,}tv)/iu'],
        ["Babək Plaza", '/(bab[əea]k[ ]{0,}plaza)/iu'],
        ["Bakı Asiya Universiteti ", '/(asiya[ ]+uni)/iu'],
        ["Bakı Dövlət Universiteti ", '/(BDU)|(Bak[ıiu][ ]+D[öeo]vl[əea]t[ ]+uni)|(БГУ)|(бакинский[ ]+государственный[ ]+университет)/iu'],
        ["Bakı Musiqi Akademiyası ", '/(BMA)|(musiqi[ ]+akademiyası)|(БМА)|(музыкальная[ ]+академия)/iu'],
        ["Bakı Slavyan Universiteti ", '/(BSU)|(slavyan[ ]+uni)|(БСУ)|(славянский[ ]+университет)/iu'],
        ["Bakı univermağı", '/(bak[ıiu][ ]+univerma)|(универмаг[ ]+баку)/iu'],
        ["Bayıl parkı  ", '/(bay[ıi]l park)/iu'],
        //
        ["Beşmərtəbə   ", ""],
        ["Binə ticarət mərkəzi", ""],
        ["Botanika bağı  ", ""],
        ["Bridge Plaza", ""],
        ["C.Cabbarlı heykəli", ""],
        ["Caspian Plaza", ""],
        ["Caspian Shopping Center", ""],
        ["Cavanşir körpüsü  ", ""],
        ["Crystal Plaza", ""],
        ["Çıraq Plaza", ""],
        ["Dağüstü parkı  ", ""],
        ["Daxili İşlər Nazirliyi", ""],
        ["Dalğa Plaza", ""],
        ["Dədə Qorqud parkı", ""],
        ["Dəmirçi Plaza", ""],
        ["Dənizkənarı Milli park", ""],
        //
        ["Dostluq kinoteatrı  ", ""],
        ["Dövlət İdarəçilik Akademiyası ", ""],
        ["Dövlət Statistika Komitəsi ", ""],
        ["Dövlət Statistika Komitəsini ", ""],
        ["Ekologiya və Təbii Sərvətlər Nazirliyi", ""],
        ["Elit ticarət mərkəzi", ""],
        ["Energetika Nazirliyi", ""],
        ["Ədliyyə Nazirliyi", ""],
        ["Əmək və Əhalinin Sosial Müdafiəsi Nazirliyi", ""],
        ["Fairmont otel", ""],
        ["Fəvvarələr meydanı", ""],
        ["Fontanlar bağı  ", ""],
        ["Four Seasons otel", ""],
        ["Fövqəladə Hallar Nazirliyi", ""],
        ["Gənclər və İdman Nazirliyi", ""],
        ["Heydər Əliyev Mərkəzi", ""],
        ["Heydər Əliyev Sarayı", ""],
        ["Hərbi Hospital", ""],
        ["Hilton otel", ""],
        ["Hüseyn Cavid parkı ", ""],
        ["Hyatt Regency", ""],
        ["Xalça Muzeyi  ", ""],
        ["Xarici İşlər Nazirliyi", ""],
        ["Xəqani ticarət mərkəzi", ""],
        ["Xəzər Universiteti", ""],
        ["ISR Plaza", ""],
        ["İctimai tv", ""],
        ["İçəri Şəhər  ", ""],
        ["İdman kompleksi  ", ""],
        ["İqsadiyyat Universiteti  ", ""],
        ["İqtisadi İnkişaf Nazirliyi", ""],
        ["İncəsənət və Mədəniyyət Un.", ""],
        ["İnşaat Universiteti", ""],
        ["İzmir parkı  ", ""],
        ["Keşlə bazarı  ", ""],
        ["Koala parkı  ", ""],
        ["Kooperasiya Universiteti", ""],
        ["Qafqaz Resort otel", ""],
        ["Qafqaz Universiteti", ""],
        ["Qələbə dairəsi", ""],
        ["Qərb Universiteti", ""],
        ["Qış parkı  ", ""],
        ["Qubernator parkı  ", ""],
        ["Landmark", ""],
        ["Lider tv", ""],
        ["M.Ə.Sabir parkı  ", ""],
        ["M.Hüseynzadə parkı  ", ""],
        ["Maliyyə Nazirliyi", ""],
        ["Malokan bağı  ", ""],
        ["Megafun", ""],
        ["Memarlıq və İnşaat Universiteti", ""],
        ["Metropark", ""],
        ["Mərkəzi Univermaq  ", ""],
        ["Milli Konservatoriya  ", ""],
        ["Montin adına park", ""],
        ["Montin bazarı  ", ""],
        ["Moskva univermağı", ""],
        ["Musabəyov parkı", ""],
        ["Müdafiə Sənayesi Nazirliyi", ""],
        ["Nargiz ticarət mərkəzi", ""],
        ["Neapol dairəsi  ", ""],
        ["Neft Akademiyası  ", ""],
        ["Neftçi bazası  ", ""],
        ["Nəqliyyat Nazirliyi", ""],
        ["Nəriman Nərimanov parkı ", ""],
        ["Nərimanov heykəli  ", ""],
        ["Nəsimi bazarı  ", ""],
        ["Nəsimi heykəli", ""],
        ["Nizami kinoteatrı  ", ""],
        ["Odlar Yurdu Universiteti", ""],
        ["Olimpia Stadionu", ""],
        ["Park Bulvar", ""],
        ["Park Inn", ""],
        ["Park Zorge  ", ""],
        ["Pedaqoji Universiteti  ", ""],
        ["Port Baku", ""],
        ["Prezident parkı  ", ""],
        ["Puşkin parkı", ""],
        ["Rabitə və Yüksək Texnologiyalar Nazirliyi", ""],
        ["Respublika stadionu  ", ""],
        ["Rəssamlıq Akademiyası  ", ""],
        ["Rusiya səfirliyi  ", ""],
        ["Sahil bağı  ", ""],
        ["Sevil Qazıyeva parkı ", ""],
        ["Sevinc kinoteatrı", ""],
        ["Sədərək ticarət mərkəzi", ""],
        ["Səhiyyə Nazirliyi", ""],
        ["Səməd Vurğun parkı ", ""],
        ["Sirk   ", ""],
        ["Sovetski   ", ""],
        ["Space TV  ", ""],
        ["Şəfa stadionu  ", ""],
        ["Şəhidlər xiyabanı  ", ""],
        ["Şəlalə parkı  ", ""],
        ["Şərq Bazarı", ""],
        ["Şüvəlan ticarət mərkəzi", ""],
        ["Texniki Universiteti  ", ""],
        ["Təfəkkür Universiteti", ""],
        ["Təhsil Nazirliyi  ", ""],
        ["Təzə bazar", ""],
        ["Tibb Universiteti  ", ""],
        ["TQDK   ", ""],
        ["Tofiq Bəhramov stadionu", ""],
        ["Türkiyə səfirliyi", ""],
        ["Ukrayna dairəsi  ", ""],
        ["Vergilər Nazirliyi", ""],
        ["Vətən kinoteatrı", ""],
        ["World Business Center", ""],
        ["Yasamal bazarı  ", ""],
        ["Yasamal parkı", ""],
        ["Yaşıl bazar", ""],
        ["Zabitlər parkı  ", ""],
        ["Zərifə Əliyeva adına park", ""],
        ["Zoopark   ", ""],
    ];
}

