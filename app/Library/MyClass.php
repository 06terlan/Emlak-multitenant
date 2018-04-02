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
        'users' => ['name'=> 'İstifadəçilər', 'icon'=> 'group',  'route'=> 'users', 'priv'=> MyClass::PRIV_CAN_SEE],
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

    public static $city =
    [
        1=>	['Ağstafa', '', []],
        2=>	['Ağsu', '', []],
        3=>	['Abşeron', '', []],
        4=>	['Bakı', '', []],
        5=>	['Balakən', '', []],
        6=>	['Beyləqan', '', []],
        7=>	['Bərdə', '', []],
        8=>	['Cəlilabad', '', []],
        9=>	['Göyçay', '', []],
        10=>	['Gəncə', '', []],
        11=>	['Kürdəmir', '', []],
        12=>	['Lənkəran', '', []],
        13=>	['Masallı', '', []],
        14=>	['Mingəçevir', '', []],
        15=>	['Naxçıvan', '', []],
        16=>	['Neftçala', '', []],
        17=>	['Oğuz', '', []],
        18=>	['Qax', '', []],
        19=>	['Qazax', '', []],
        20=>	['Quba', '', []],
        21=>	['Qusar', '', []],
        22=>	['Qəbələ', '', []],
        23=>	['Saatlı', '', []],
        24=>	['Sabirabad', '', []],
        25=>	['Salyan', '', []],
        26=>	['Sumqayıt', '', []],
        27=>	['Tovuz', '', []],
        28=>	['Xaçmaz', '', []],
        29=>	['Xudat', '', []],
        30=>	['Xırdalan', '', []],
        31=>	['Xızı', '', []],
        32=>	['Zaqatala', '', []],
        33=>	['İsmayıllı', '', []],
        34=>	['Şabran', '', []],
        35=>	['Şamaxı', '', []],
        36=>	['Şirvan', '', []],
        37=>	['Şəki', '', []],
        38=>	['Şəmkir', '', []],
        39=>	['Ağcəbədi', '', []],
        40=>	['Ağdam', '', []],
        41=>	['Ağdaş', '', []],
        42=>	['Biləsuvar', '', []],
        43=>	['Cəbrayıl', '', []],
        44=>	['Daşkəsən', '', []],
        45=>	['Dəliməmmədli', '', []],
        46=>	['Fizuli', '', []],
        47=>	['Gədəbəy', '', []],
        48=>	['Goranboy', '', []],
        49=>	['Göygöl', '', []],
        50=>	['Göytəpə', '', []],
        51=>	['Hacıqabul', '', []],
        52=>	['Horadiz', '', []],
        53=>	['İmişli', '', []],
        54=>	['Kəlbəcər', '', []],
        55=>	['Laçın', '', []],
        56=>	['Lerik', '', []],
        57=>	['Liman', '', []],
        58=>	['Naftalan', '', []],
        59=>	['Qobustan', '', []],
        60=>	['Qubadlı', '', []],
        61=>	['Samux', '', []],
        62=>	['Siyəzən', '', []],
        63=>	['Şuşa', '', []],
        64=>	['Tərtər', '', []],
        65=>	['Nabran', '', []],
        66=>	['Xocavənd', '', []],
        67=>	['Yardımlı', '', []],
        68=>	['Yevlax', '', []],
        69=>	['Zəngilan', '', []],
        70=>	['Zərdab', '', []],
    ];

    public static $district =
    [
        1 => ['Babək r.', '/(bab[əea]k)|(бабак)/iu', ['city'=>4]],
        2 => ['Binəqədi r.', '/(bin[əae][qg][əea]d[i])|(бинагадинском)/iu', ['city'=>4]],
        3 => ['Culfa r.', '/(culfa)/iu', ['city'=>15]],
        4 => ['Xətai r.', '/(x[əae]tai)|(хатаи)/iu', ['city'=>4]],
        5 => ['Xəzər r.', '/([xh][əae]z[əea]r)/iu', ['city'=>4]],
        6 => ['Qaradağ r.', '/(qarada[gğq])|(карадагский)/iu', ['city'=>4]],
        7 => ['Nərimanov r.', '/(n[əae]rimanov)|(наримановский)/iu', ['city'=>4]],
        8 => ['Nəsimi r.', '/(n[əae]simi)|(Насиминском)/iu', ['city'=>4]],
        9 => ['Nizami r.', '/(nizami)|(Низаминский)/iu', ['city'=>4]],
        10 => ['Ordubad r.', '/(Ordubad)|(Ордубад)/iu', ['city'=>4]],
        11 => ['Pirallahı r.', '/(Pirallah[ıi])|(Пираллахи)/iu', ['city'=>4]],
        12 => ['Sabunçu r.', '/(Sabun[çc]h?u)|(Сабунчи)/iu', ['city'=>4]],
        13 => ['Səbail r.', '/(S[eə]bail)|(sabael)|(Сабаильский)/iu', ['city'=>4]],
        14 => ['Sədərək r.', '/(S[əae]d[əae]r[əae]k)|(Садарак)/iu', ['city'=>4]],
        15 => ['Suraxanı r.', '/(Suraxan[ıi])|(Сураханский)/iu', ['city'=>4]],
        16 => ['Şahbuz r.', '/([Şs]h?ahbuz)|(Шахбузский)/iu', ['city'=>4]],
        17 => ['Yasamal r.', '/(Yasamal)|(Ясамальский)/iu', ['city'=>4]],
        18 => ['Abşeron r.', '/(ab[şs]h?eron)|(апшеронский)/iu', ['city'=>4]],
    ];

    /**

     * metros

     */

    public static $metros =
    [
        1 => ['Gənclik m.', '/(g(e|a|ə)nclik)|(гянджлик)/iu', ['city'=>4, 'district'=>7]],
        2 => ['Ulduz m.', '/(ulduz)|(улдуз)/iu', ['city'=>4, 'district'=>7]],
        3 => ['Həzi Aslanov m.', '/(aslanov)|(асланов)/iu', ['city'=>4, 'district'=>4]],
        4 => ['Elmlər Akademiyası m.', '/(elml(ə|a|e)r)|(эльмляр)/iu', ['city'=>4, 'district'=>17]],
        5 => ['Nizami m.', '/(nizami)|(низами)/iu', ['city'=>4, 'district'=>17]],
        6 => ['Şah İsmayıl Xətai m.', '/(x(e|a|ə)tai)|(хатаи)/iu', ['city'=>4, 'district'=>4]],
        7 => ['İçəri Şəhər m.', '/([iİ][cç][əea]ri[ ]*[şs]h?[əae]h[əae]r)|(ичери[ ]*шехер)/iu', ['city'=>4, 'district'=>13]],
        8 => ['Sahil m.', '/(sahil)|(сахил)/iu', ['city'=>4, 'district'=>13]],
        9 => ['Koroğlu m.', '/(koro[ğgq]lu)|(корглу)/iu', ['city'=>4, 'district'=>12]],
        10 => ['20 Yanvar m.', '/(20[ ]*yanvar)|(20[ ]*январ)/iu', ['city'=>4, 'district'=>17]],
        11 => ['Əhmədli m.', '/([əae][hx]m[əae]dli)|(ахмедли)/iu', ['city'=>4, 'district'=>4]],
        12 => ['Qara Qarayev m.', '/(qarayev)|(караев)/iu', ['city'=>4, 'district'=>9]],
        13 => ['Neftçilər m.', '/(neft?[çc]il[əae]r)|(нефтцил[еа]р)/iu', ['city'=>4, 'district'=>9]],
        14 => ['Xalqlar Dostluğu m.', '/(xalqlar)|(халглар)/iu', ['city'=>4, 'district'=>9]],
        15 => ['Memar Əcəmi m.', '/([əae]c[əae]mi)|(аджеми)/iu', ['city'=>4, 'district'=>8]],
        16 => ['Azadlıq Prospekti m.', '/(azadl[ıi]q)|(азадлиг)/iu', ['city'=>4, 'district'=>2]],
        17 => ['Nəsimi m.', '/(n[əae]simi)|(насими)/iu', ['city'=>4, 'district'=>8]],
        18 => ['Dərnəgül m.', '/(d[əae]rn[əae]g[üu]l)|(дарнагул)/iu', ['city'=>4, 'district'=>2]],
        19 => ['Cəfər Cabbarlı m.', '/(cabbarl[ıi])|(джаббарлы)/iu', ['city'=>4, 'district'=>4]],
        20 => ['Bakmil m.', '/(bakmil)|(бакмил)/iu', ['city'=>4, 'district'=>7]],
        21 => ['İnşaatçılar m.', '/([İi]n[şs]h?aa?t[çc][ıi]lar)|(иншаатчылар)/iu', ['city'=>4, 'district'=>17]],
        22 => ['28 May m.', '/(28[ ]*may)|(28[ ]*май)/iu', ['city'=>4, 'district'=>8]],
        23 => ['Avtovağzal m.', '/(avtova[ğg]zal)|(автовокзал)/iu', ['city'=>4, 'district'=>2]],
        24 => ['Nəriman Nərimanov m.', '/(n(ə|a|e)rimanov)|(нариманова)/iu', ['city'=>4, 'district'=>7]],
    ];

    public static $sight =
    [
        1 => ["28 Mall", '/(28[ ]+mall)|(28[ ]+малл)/iu', ['city'=>4, 'district'=>7]],
        2 => ["Absheron Marriott otel", '/((ab[sş]h?eron|marriot)[\w ]+otel)|(отеля[\w ]+абшерон)/iu'],
        3 => ["ABŞ səfirliyi", '/((amerika|ab[sş]h?)[\w ]+s[əe]fir)|(америка[\w ]+(сефир|посольст))|(посольства[\w ]+США)/iu'],
        4 => ["ADA universiteti", '/((ADA|)[\w ]+uni)|(университет[ ]+ада)/iu'],
        5 => ["AF Business House", '/(af[\w ]+(cent|business house))|(аф[\w ]+цент)/iu'],
        6 => ["AGA Business Center", '/(a[gğ]a[\w ]+center)|(ага[\w ]+центер)/iu'],
        7 => ["Ağ şəhər", '/(a[ğg][ ]+[şs]h?[əe]h[əe]r)|(аг[ ]+шехер)/iu'],
        8 => ["Axundov bağı", '/(axundov[\w ]+ba[qğ])|(ахундовскому[\w ]+садику)/iu'],
        9 => ["AMAY", '/(amay)|(амай)/iu'],
        10 => ["Ambassador otel", '/(Ambassador)|(Амбассадор)/iu'],
        11 => ["ANS", '/(ANS)|(АНС)/iu'],
        12 => ["Araz kinoteatrı", '/(Araz[\w ]+kino)|(Кинотеатр[\w" ]+Араз)/iu'],
        13 => ["ATV", '/(ATV[\w-" ]+kanal)|(Телеканал[\w-" ]+АТВ)/iu'],
        14 => ["Aviasiya Akademiyası", '/(Aviasiya[\w-" ]+Akade)|(академия[\w-" ]+авиации)/iu'],
        15 => ["Avropa otel", '/(Avropa[\w-" ]+otel)|(отеля[\w-" ]+ЕВРОПА)/iu'],
        16 => ["Aygun City", '/(ayg[uü]n[\w-" ]+(mall|City))/iu'],
        17 => ["Ayna Sultanova heykəli ", '/((Ayna|A\.)[ ]{0,}Sultanova)|((Айна|А\.)[ ]{0,}Султановой)/iu'],
        18 => ["Azadlıq meydanı  ", '/(Azadl[ıi]q[ ]{0,}meydan[ıi])/iu'],
        19 => ["Azərbaycan Dillər Universiteti ", '/(dill[eə]r[ ]{0,}uni)|(университет[ ]{0,}языков)/iu'],
        20 => ["Azərbaycan kinoteatrı  ", '/(Az[əe]rbaycan[ -”"]+kinoteatr)|((к/т|Кинотеатр)[ -”"]{0,}Азербайджан)/iu'],
        21 => ["Azərbaycan turizm institutu ", '/(turizm[ -”"]+inst)|(Институт[ -”"]+Туризма)/iu'],
        22 => ["Azneft meydanı  ", '/(Azneft)|(Азнефть)/iu'],
        23 => ["AZTV", '/(az[ ]{0,}tv)/iu'],
        24 => ["Babək Plaza", '/(bab[əea]k[ ]{0,}plaza)/iu'],
        25 => ["Bakı Asiya Universiteti ", '/(asiya[ ]+uni)/iu'],
        26 => ["Bakı Dövlət Universiteti ", '/(BDU)|(Bak[ıiu][ ]+D[öeo]vl[əea]t[ ]+uni)|(БГУ)|(бакинский[ ]+государственный[ ]+университет)/iu'],
        27 => ["Bakı Musiqi Akademiyası ", '/(BMA)|(musiqi[ ]+akademiyası)|(БМА)|(музыкальная[ ]+академия)/iu'],
        28 => ["Bakı Slavyan Universiteti ", '/(BSU)|(slavyan[ ]+uni)|(БСУ)|(славянский[ ]+университет)/iu'],
        29 => ["Bakı univermağı", '/(bak[ıiu][ ]+univerma)|(универмаг[ ]+баку)/iu'],
        30 => ["Bayıl parkı  ", '/(bay[ıi]l park)/iu'],
        31 => ["Beşmərtəbə   ", '/(be[şs]h?m[əea]rt[əae]b[əae])/iu'],
        32 => ["Binə ticarət mərkəzi", '/(bin[əe][\w ]+ticar[əea]t)/iu'],
        33 => ["Botanika bağı  ", '/(botanika[\w ]+ba[ğgq][ıi])|(ботаническим[\w ]+садом)/iu'],
        34 => ["Bridge Plaza", '/(bridge[ ]+plaza)|(бридж[ ]+плаза)/iu'],
        35 => ["C.Cabbarlı heykəli", '/(cabbarl[ıi][ ]+heyk[əae]li)/iu'],
        //["Caspian Plaza", ""],
        //["Caspian Shopping Center", ""],
        //["Cavanşir körpüsü  ", ""],
        //["Crystal Plaza", ""],
        //["Çıraq Plaza", ""],
        //["Dağüstü parkı  ", ""],
        //["Daxili İşlər Nazirliyi", ""],
        //["Dalğa Plaza", ""],
        //["Dədə Qorqud parkı", ""],
        //["Dəmirçi Plaza", ""],
        //["Dənizkənarı Milli park", ""],
        ////
        //["Dostluq kinoteatrı  ", ""],
        //["Dövlət İdarəçilik Akademiyası ", ""],
        //["Dövlət Statistika Komitəsi ", ""],
        //["Dövlət Statistika Komitəsini ", ""],
        //["Ekologiya və Təbii Sərvətlər Nazirliyi", ""],
        //["Elit ticarət mərkəzi", ""],
        //["Energetika Nazirliyi", ""],
        //["Ədliyyə Nazirliyi", ""],
        //["Əmək və Əhalinin Sosial Müdafiəsi Nazirliyi", ""],
        //["Fairmont otel", ""],
        //["Fəvvarələr meydanı", ""],
        //["Fontanlar bağı  ", ""],
        //["Four Seasons otel", ""],
        //["Fövqəladə Hallar Nazirliyi", ""],
        //["Gənclər və İdman Nazirliyi", ""],
        //["Heydər Əliyev Mərkəzi", ""],
        //["Heydər Əliyev Sarayı", ""],
        //["Hərbi Hospital", ""],
        //["Hilton otel", ""],
        //["Hüseyn Cavid parkı ", ""],
        //["Hyatt Regency", ""],
        //["Xalça Muzeyi  ", ""],
        //["Xarici İşlər Nazirliyi", ""],
        //["Xəqani ticarət mərkəzi", ""],
        //["Xəzər Universiteti", ""],
        //["ISR Plaza", ""],
        //["İctimai tv", ""],
        //["İçəri Şəhər  ", ""],
        //["İdman kompleksi  ", ""],
        //["İqsadiyyat Universiteti  ", ""],
        //["İqtisadi İnkişaf Nazirliyi", ""],
        //["İncəsənət və Mədəniyyət Un.", ""],
        //["İnşaat Universiteti", ""],
        //["İzmir parkı  ", ""],
        //["Keşlə bazarı  ", ""],
        //["Koala parkı  ", ""],
        //["Kooperasiya Universiteti", ""],
        //["Qafqaz Resort otel", ""],
        //["Qafqaz Universiteti", ""],
        //["Qələbə dairəsi", ""],
        //["Qərb Universiteti", ""],
        //["Qış parkı  ", ""],
        //["Qubernator parkı  ", ""],
        //["Landmark", ""],
        //["Lider tv", ""],
        //["M.Ə.Sabir parkı  ", ""],
        //["M.Hüseynzadə parkı  ", ""],
        //["Maliyyə Nazirliyi", ""],
        //["Malokan bağı  ", ""],
        //["Megafun", ""],
        //["Memarlıq və İnşaat Universiteti", ""],
        //["Metropark", ""],
        //["Mərkəzi Univermaq  ", ""],
        //["Milli Konservatoriya  ", ""],
        //["Montin adına park", ""],
        //["Montin bazarı  ", ""],
        //["Moskva univermağı", ""],
        //["Musabəyov parkı", ""],
        //["Müdafiə Sənayesi Nazirliyi", ""],
        //["Nargiz ticarət mərkəzi", ""],
        //["Neapol dairəsi  ", ""],
        //["Neft Akademiyası  ", ""],
        //["Neftçi bazası  ", ""],
        //["Nəqliyyat Nazirliyi", ""],
        //["Nəriman Nərimanov parkı ", ""],
        //["Nərimanov heykəli  ", ""],
        //["Nəsimi bazarı  ", ""],
        //["Nəsimi heykəli", ""],
        //["Nizami kinoteatrı  ", ""],
        //["Odlar Yurdu Universiteti", ""],
        //["Olimpia Stadionu", ""],
        //["Park Bulvar", ""],
        //["Park Inn", ""],
        //["Park Zorge  ", ""],
        //["Pedaqoji Universiteti  ", ""],
        //["Port Baku", ""],
        //["Prezident parkı  ", ""],
        //["Puşkin parkı", ""],
        //["Rabitə və Yüksək Texnologiyalar Nazirliyi", ""],
        //["Respublika stadionu  ", ""],
        //["Rəssamlıq Akademiyası  ", ""],
        //["Rusiya səfirliyi  ", ""],
        //["Sahil bağı  ", ""],
        //["Sevil Qazıyeva parkı ", ""],
        //["Sevinc kinoteatrı", ""],
        //["Sədərək ticarət mərkəzi", ""],
        //["Səhiyyə Nazirliyi", ""],
        //["Səməd Vurğun parkı ", ""],
        //["Sirk   ", ""],
        //["Sovetski   ", ""],
        //["Space TV  ", ""],
        //["Şəfa stadionu  ", ""],
        //["Şəhidlər xiyabanı  ", ""],
        //["Şəlalə parkı  ", ""],
        //["Şərq Bazarı", ""],
        //["Şüvəlan ticarət mərkəzi", ""],
        //["Texniki Universiteti  ", ""],
        //["Təfəkkür Universiteti", ""],
        //["Təhsil Nazirliyi  ", ""],
        //["Təzə bazar", ""],
        //["Tibb Universiteti  ", ""],
        //["TQDK   ", ""],
        //["Tofiq Bəhramov stadionu", ""],
        //["Türkiyə səfirliyi", ""],
        //["Ukrayna dairəsi  ", ""],
        //["Vergilər Nazirliyi", ""],
        //["Vətən kinoteatrı", ""],
        //["World Business Center", ""],
        //["Yasamal bazarı  ", ""],
        //["Yasamal parkı", ""],
        //["Yaşıl bazar", ""],
        //["Zabitlər parkı  ", ""],
        //["Zərifə Əliyeva adına park", ""],
        //["Zoopark   ", ""],
    ];
}

