<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsTableSeeder extends Seeder
{
    public function run()
    {
        // Seed data for 'district' opt_type
        $districts = [
            'yt' => 'yt 油塘',
            'kt' => 'kt 觀塘',
            'klb' => 'klb 九龍灣',
            'spk' => 'spk 新浦崗',
            'csw' => 'csw 長沙灣',
            'lck' => 'lck 荔枝角',
            'kc' => 'kc 葵涌',
            'tw' => 'tw 荃灣',
            'mk' => 'mk 旺角',
            'tst' => 'tst 尖沙咀',
            'tkw' => 'tkw 土瓜灣',
            'kat' => 'kat 啟德',
            'hh' => 'hh 紅磡',
            'tkt' => 'tkt 大角咀',
            'jd' => 'jd 佐敦',
            'ft' => 'ft 火炭',
            'st' => 'st 沙田',
            'tp' => 'tp 大埔',
            'ss' => 'ss 上水',
            'tm' => 'tm 屯門',
            'yl' => 'yl 元朗',
            'tko' => 'tko 將軍澳',
            'ty' => 'ty 青衣',
            'wch' => 'wch 黃竹坑',
            'sw' => 'sw 上環',
            'ct' => 'ct 中環',
            'wc' => 'wc 灣仔',
            'cwb' => 'cwb 銅鑼灣',
            'np' => 'np 北角',
            'qb' => 'qb 鰂魚涌',
            'skw' => 'skw 筲箕灣',
            'cw' => 'cw 柴灣',
            'ssw' => 'ssw 小西灣',
        ];

        $this->seedOptions('district', $districts);

        // Seed data for 'facility' opt_type
        $facilities = [
            'Carpark 車場',
            'Convenient 近地鐵',
            'H.celling 高樓底',
            'Lobby 冷氣大堂',
            'Sunlight 揚窗',
            'Toilet 內厠',
            'Heater 熱水爐',
            'Sink 鋅盤',
            'Electrical 大電',
            'Wide door 闊門',
            'Ekey 密碼鎖',
            'Bricked 磗牆',
            'Free wifi 送上網',
            'Room 有房',
            'Roof bal天台露台',
            'Shop 店舖',
            // ... (other facilities)
        ];

        $this->seedOptions('facility', $facilities);

        // Seed data for 'decoration' opt_type
        $decorations = [
            'Budget 預算',
            'Basic 基本的',
            'Luxury 奢華',
            'Classic 經典的',
            'Chill 寒意',
            'Grand 盛大',
            'Modern 現代的',
            'Premium 優質的',
            // ... (other decorations)
        ];

        $this->seedOptions('decoration', $decorations);

        // Seed data for 'type' opt_type
        $types = [
            'Rent 放租',
            'Sales 放售',
            'Subdivided 分間',
            'Independent 獨立單位',
            'Development 發展商',
            'Office 寫字樓',
            'Warehouse 倉庫',
            'Overnight 過夜',
            'Upstairs shop 樓上舖',
            'Party room 派對房',
            'Band 夾',
            'Class 有聲教班',
            'Class 一般教班',
            'Bakery 烘焙',
            'Photos 攝影',
            // ... (other types)
        ];

        $this->seedOptions('type', $types);
    }

    private function seedOptions($optType, $data)
    {
        foreach ($data as $code => $name) {
            DB::table('options')->insert([
                'name' => $name,
                'opt_type' => $optType,
                'code' => $code ?? null,
            ]);
        }
    }
}

