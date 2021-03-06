<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public const REGION_SELECT = [

        ['city' => 'Toshkent shahar-Город Ташкент-Tashkent city',
            'districts' => [
                'Bektemir' => 'Bektemir-Бектемир-Bektemir',
                'Chilonzor' => 'Chilonzor-Чиланзар-Chilonzor',
                'Mirobod' => 'Mirobod-Мирабод-Mirobod',
                'MirzoUlugbek' => 'Mirzo Ulug`bek-Мирзо Улугбек-Mirzo Ulug`bek',
                'Olmazor' => 'Olmazor-Олмазор-Olmazor',
                'Sergeli' => 'Sirg`ali-Сергели-Sergeli',
                'Shayxontohur' => 'Shayxontohur-Шайхантаур-Shayxontohur',
                'Uchtepa' => 'Uchtepa-Учтепа-Uchtepa',
                'Yakkasarroy' => 'Yakkasarroy-Яккасаррой-Yakkasarroy',
                'Yashnobod' => 'Yashnobod-Яшнабад-Yashnobod',
                'Yunusobod' => 'Yunusobod-Юнусабад-Yunusobod'
            ]],
        ['city' => 'Toshkent viloyati-Ташкентская область-Tashkent region',
            'districts' => [
                'Bekobod' => 'Bekobod-Бекобод-Bekobod',
                'Bostonliq' => 'Bo`stonliq-Бостанлык-Bostonliq',
                'Boka' => 'Bo`ka-Бука-Boka',
                'Chinoz' => 'Chinoz-Чиназ-Chinoz',
                'Qibray' => 'Qibray-Кибрай-Qibray',
                'Ohangaron' => 'Ohangaron-Ахангарон-Ohangaron',
                'Oqqorgon' => 'Oqqo`rg`on-Аккурган-Oqqorgon',
                'Parkent' => 'Parkent-Паркент-Parkent',
                'Piskent' => 'Piskent-Пискент-Piskent',
                'Quyichirchiq' => 'Quyichirchiq-Куйичирчик-Quyichirchiq',
                'Ortachirchiq' => 'O`rtachirchiq-Уртачирчик-Ortachirchiq',
                'Yangiyol' => 'Yangiyo`l-Янгиёль-Yangiyol',
                'Yuqorichirchiq' => 'Yuqorichirchiq-Юкоричирчик-Yuqorichirchiq',
                'Zangiota' => 'Zangiota-Зангиота-Zangiota',
            ]],
        ['city' => 'Andijon viloyati-Андижанская область-Andijan region',
            'districts' => [
                'Andijon' => 'Andijon-Андижан-Andijon',
                'Asaka' => 'Asaka-Асака-Asaka',
                'Boston' => 'Bo`ston-Бостон-Boston',
                'Buloqboshi' => 'Buloqboshi-Булокбош-Buloqboshi',
                'Izboskan' => 'Izboskan-Избоскан-Izboskan',
                'Jalaquduq' => 'Jalaquduq-Джалакудук-Jalaquduq',
                'Marhamat' => 'Marhamat-Мархамат-Marhamat',
                'Oltinkol' => 'Oltinko`l-Алтынколь-Oltinkol',
                'Paxtaobod' => 'Paxtaobod-Пахтаабад-Paxtaobod',
                'Shahrixon' => 'Shahrixon-Шахрихан-Shahrixon',
                'Ulugnor' => 'Ulug`nor-Улугнор-Ulugnor',
                'Xojaobod' => 'Xojaobod-Ходжаабад-Xojaobod',

            ]],
        ['city' => 'Buxoro viloyati-Бухарская область-Bukhara region',
            'districts' => [
                'Buxoro' => 'Buxoro-Бухара-Bukhara',
                'Gijdivon' => 'G`ijdivon-Гиждивон-Gijdivon',
                'Jondor' => 'Jondor-Жондор-Jondor',
                'Kogon' => 'Kogon-Когон-Kogon',
                'Olot' => 'Olot-Олот-Olot',
                'Peshku' => 'Peshku-Пешку-Peshku',
                'Qorakol' => 'Qorako`l-Караколь-Qorakol',
                'Qoravulbozor' => 'Qoravulbozor-Каравулбозор-Qoravulbozor',
                'Romitan' => 'Romitan-Ромитан-Romitan',
                'Shofirkon' => 'Shofirkon-Шофиркон-Shofirkon',
                'Vobkent' => 'Vobkent-Вобкент-Vobkent',
            ]],
        ['city' => 'Farg`ona viloyati-Ферганская область-Fergana region',
            'districts' => [
                'Bagdod' => 'Bag`dod-Багдад-Bagdod',
                'Beshariq' => 'Beshariq-Бешарик-Beshariq',
                'Buvayda' => 'Buvayda-Бувайда-Buvayda',
                'Dangara' => 'Dang`ara-Дангара-Dangara',
                'Fargona' => 'Farg`ona-Фергана-Fargona',
                'Furqat' => 'Furqat-Фуркат-Furqat',
                'Oltiariq' => 'Oltiariq-Алтыарик-Oltiariq',
                'Ozbekiston' => 'O`zbekiston-Узбекистан-Ozbekiston',
                'Qoshtepa' => 'Qo`shtepa-Коштепа-Qoshtepa',
                'Quva' => 'Quva-Кува-Quva',
                'Rishton' => 'Rishton-Риштан-Rishton',
                'Sox' => 'So`x-Сох-Sox',
                'Toshloq' => 'Toshloq-Тошлок-Toshloq',
                'Uchkoprik' => 'Uchko`prik-Учкоприк-Uchkoprik',
                'Yozyovon' => 'Yozyovon-Ёзёван-Yozyovon',

            ]],
        ['city' => 'Jizzax viloyati-Джизакская область-Jizzakh region',
            'districts' => [
                'Arnasoy' => 'Arnasoy-Арнасай-Arnasoy',
                'Baxmal' => 'Baxmal-Бахмаль-Bakhmal',
                'Dostlik' => 'Do`stlik-Достлик-Dostlik',
                'Forish' => 'Forish-Фориш-Forish',
                'Gallaorol' => 'G`allaorol-Галлаорол-Gallaorol',
                'SharofRashidov' => 'Sharof Rashidov-Шароф Рашидов-Sharof Rashidov',
                'Mirzachol' => 'Mirzacho`l-Мирзачол-Mirzachol',
                'Paxtakor' => 'Paxtakor-Пахтакор-Pakhtakor',
                'Yangiobod' => 'Yangiobod-Янгиабад-Yangiobod',
                'Zomin' => 'Zomin-Зомин-Zamin',
                'Zafarobod' => 'Zafarobod-Зафаробод-Zafarobod',
                'Zarbdor' => 'Zarbdor-Зарбдор-Zarbdor',
            ]],
        ['city' => 'Xorazm viloyati-Харезмский район-Kharezm region',
            'districts' => [
                'Bogot' => 'Bog`ot-Богот-Bogot',
                'Gurlan' => 'Gurlan-Гурлан-Gurlan',
                'Xonqa' => 'Xonqa-Хонка-Xonqa',
                'Hazorasp' => 'Hazorasp-Хазорасп-Hazorasp',
                'Xiva' => 'Xiva-Хива-Khiva',
                'Qoshkopir' => 'Qo`shko`pir-Кошкопир-Qoshkopir',
                'Shovot' => 'Shovot-Шовот-Shovot',
                'Urganch' => 'Urganch-Ургенч-Urganch',
                'Yangiariq' => 'Yangiariq-Янгиарык-Yangiariq',
                'Yangibozor' => 'Yangibozor-Янгибазар-Yangibozor',

            ]],
        ['city' => 'Namangan viloyati-Наманганская область-Namangan region',
            'districts' => [
                'Chortoq' => 'Chortoq-Чартак-Chortoq',
                'Chust' => 'Chust-Чуст-Chust',
                'Kosonsoy' => 'Kosonsoy-Косонсой-Kosonsoy',
                'Mingbuloq' => 'Mingbuloq-Мингбулак-Mingbuloq',
                'Namangan' => 'Namangan-Наманган-Namangan',
                'Norin' => 'Norin-Норин-Norin',
                'Pop' => 'Pop-Поп-Pop',
                'Toraqorgon' => 'To`raqo`rg`on-Торакоргон-Toraqorgon',
                'Uchqorgon' => 'Uchqo`rg`on-Учкоргон-Uchqorgon',
                'Uychi' => 'Uychi-Уйчи-Uychi',
                'Yangiqorgon' => 'Yangiqo`rg`on-Янгикорган-Yangiqorgon',
                'Davlatobod' => 'Davlatobod-Давлатабад-Davlatobod',
            ]],
        ['city' => 'Navoiy viloyati-Навоийская область-Navoi region',
            'districts' => [
                'Konimex' => 'Konimex-Конимекс-Konimex',
                'Karmana' => 'Karmana-Кармана-Karmana',
                'Qiziltepa' => 'Qiziltepa-Кызылтепа-Qiziltepa',
                'Xatirchi' => 'Xatirchi-Хатирчи-Xatirchi',
                'Navbahor' => 'Navbahor-Навбахор-Navbahor',
                'Nurota' => 'Nurota-Нурота-Nurota',
                'Tomdi' => 'Tomdi-Томди-Tomdi',
                'Uchquduq' => 'Uchquduq-Учкудук-Uchquduq',

            ]],
        ['city' => 'Qashqadaryo viloyati-Кашкадарьинская область-Qashqadaryo region',
            'districts' => [
                'Chiroqchi' => 'Chiroqchi-Чиракчи-Chiroqchi',
                'Dehqonobod' => 'Dehqonobod-Дехконабад-Dehqonobod',
                'Guzor' => 'G`uzor-Гузар-Guzor',
                'Kasbi' => 'Kasbi-Касби-Kasbi',
                'Kitob' => 'Kitob-Китаб-Kitob',
                'Koson' => 'Koson-Косон-Koson',
                'Mirishkor' => 'Mirishkor-Миришкор-Mirishkor',
                'Muborak' => 'Muborak-Муборак-Muborak',
                'Nishon' => 'Nishon-Нишанский-Nishon',
                'Qamashi' => 'Qamashi-Камаши-Qamashi',
                'Qarshi' => 'Qarshi-Карши-Qarshi',
                'Yakkabog' => 'Yakkabog`-Джомбой-Yakkabog',

            ]],
        ['city' => 'Samarqand viloyati-Самаркандская область-Samarkand region',
            'districts' => [
                'Bulungur' => 'Bulung`ur-Булунгъур-Bulungur',
                'Ishtixon' => 'Ishtixon-Иштихон-Ishtixon',
                'Jomboy' => 'Jomboy-Иштихон-Jomboy',
                'Kattaqorgon' => 'Kattaqorg`on-Каттакоргон-Kattaqorgon',
                'Qoshrabod' => 'Qo`shrabod-Кошрабад-Qoshrabod',
                'Narpay' => 'Narpay-Нарпай-Narpay',
                'Nurabod' => 'Nurabod-Нурабад-Nurabod',
                'Oqdaryo' => 'Oqdaryo-Акдаря-Oqdaryo',
                'Paxtacha' => 'Paxtacha-Пахтачи-Paxtacha',
                'Payariq' => 'Payariq-Пайарык-Payariq',
                'Pastdargom' => 'Pastdarg`om-Пастдаргом-Pastdargom',
                'Samardqand' => 'Samardqand-Самардканд-Samardqand',
                'Toyloq' => 'Toyloq-Тайлак-Toyloq',
                'Urgut' => 'Urgut-Ургут-Urgut',
            ]],
        ['city' => 'Sirdaryo viloyati-Сырдарьинская область-Sirdaryo region',
            'districts' => [
                'Sirdaryo' => 'Sirdaryo-Сырдарья-Sirdaryo',
                'Guliston' => 'Guliston-Гулистан-Guliston',
                'Boyovut' => 'Boyovut-Боевут-Boyovut',
                'SharofRashidov' => 'Sharof Rashidov-Шароф Рашидов-Sharof Rashidov',
                'Hovos' => 'Hovos-Хаваст-Hovos',
                'Sayxunobod' => 'Sayxunobod-Сайхюнабад-Sayxunobod',
                'Oqoltin' => 'Oqoltin-Околтин-Oqoltin',
                'Mirzaobod' => 'Mirzaobod-Мирзаабад-Mirzaobod',

            ]],
        ['city' => 'Surxandaryo viloyati-Сурхандарьинская область-Surxandaryo region',
            'districts' => [
                'Angor' => 'Angor-Ангор-Angor',
                'Boysun' => 'Boysun-Байсун-Boysun',
                'Denov' => 'Denov-Денов-Denov',
                'Jarqorgon' => 'Jarqo`rg`on-Джаркорган-Jarqorgon',
                'Qiziriq' => 'Qiziriq-Кизирик-Qiziriq',
                'Qumqorgon' => 'Qumqo`rg`on-Кумкорган-Qumqorgon',
                'Muzrabot' => 'Muzrabot-Музрабад-Muzrabot',
                'Oltinsoy' => 'Oltinsoy-Алтынсай-Oltinsoy',
                'Sariosiyo' => 'Sariosiyo-Сариасий-Sariosiyo',
                'Sherobod' => 'Sherobod-Шерабад-Sherobod',
                'Shorchi' => 'Sho`rchi-Шурчи-Shorchi',
                'Termiz' => 'Termiz-Термез-Termiz',
                'Uzun' => 'Uzun-Узун-Uzun',
                'Bandixon' => 'Bandixon-Бандыхан-Bandixon',
            ]],
        ['city' => 'Qoraqalpog`iston-Каракалпакстан-Karakalpakstan',
            'districts' => [
                'Amudaryo' => 'Amudaryo-Ангор-Amudaryo',
                'Beruniy' => 'Beruniy-Ангор-Beruniy',
                'Chinboy' => 'Chinboy-Ангор-Chinboy',
                'Ellikqala' => 'Ellikqal`a-Ангор-Ellikqala',
                'Kegeyli' => 'Kegeyli-Ангор-Kegeyli',
                'Moynoq' => 'Mo`ynoq-Ангор-Moynoq',
                'Nukus' => 'Nukus-Ангор-Nukus',
                'Qanlikol' => 'Qanliko`l-Ангор-Qanlikol',
                'Qongirot' => 'Qo`ngirot-Ангор-Qongirot',
                'Qorozak' => 'Qoro`zak-Ангор-Qorozak',
                'Shumanay' => 'Shumanay-Ангор-Shumanay',
                'Taxtakopir' => 'Taxtako`pir-Ангор-Taxtakopir',
                'Tortkol' => 'To`rtko`l-Ангор-Tortkol',
                'Xojayli' => 'Xo`jayli-Ангор-Xojayli',
            ]],

    ];
public const WEEKDAYS = [
        'Dushanba-Понедельник-Monday' => 'Dushanba',
        'Seshanba-Вторник-Tuesday' => 'Seshanba',
        'Chorshanba-Среда-Wednesday' => 'Chorshanba',
        'Payshanba-Четверг-Thursday' => 'Payshanba',
        'Juma-Пятница-Friday' => 'Juma',
        'Shanba-Суббота-Saturday' => 'Shanba',
        'Yakshanba-Воскресенье-Sunday' => 'Yakshanba',
    ];
    public $table = 'branches';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'address_uz',
        'address_ru',
        'address_en',
        'target_uz',
        'target_ru',
        'target_en',
        'phone_number',
        'email',
        'working_days_from',
        'working_days_to',
        'working_hours_from',
        'working_hours_to',
        'google_map_link',
        'number',
        'region',
        'city',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
