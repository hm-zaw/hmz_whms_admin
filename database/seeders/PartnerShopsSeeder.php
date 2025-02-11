<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PartnerShop;
use Illuminate\Support\Facades\Hash;

class PartnerShopsSeeder extends Seeder
{
    public function run()
    {
        $partnerShops = [
            [
                'partner_shops_name' => 'Infinity Tech Store',
                'partner_shops_email' => 'infinitytech@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'No-32, Pansodan Street',
                'partner_shops_township' => 'Kyauktada',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09250123456',
                'contact_secondary' => '09250345612',
            ],
            [
                'partner_shops_name' => 'Code& Pixel',
                'partner_shops_email' => 'codepixel@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'No-85, Lanmadaw Road',
                'partner_shops_township' => 'Lanmadaw',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09250561234',
                'contact_secondary' => '09450298763',
            ],
            [
                'partner_shops_name' => 'Cloud Connectors',
                'partner_shops_email' => 'cloudconnectors@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'Myanmar Plaza Level 1',
                'partner_shops_township' => 'Bahan',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09691234567',
                'contact_secondary' => '09730987654',
            ],
            [
                'partner_shops_name' => 'The Data Den',
                'partner_shops_email' => 'thedataden@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'No-14, Sule Pagoda Road',
                'partner_shops_township' => 'Kyauktada',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09259876543',
                'contact_secondary' => '09420123456',
            ],
            [
                'partner_shops_name' => 'Innovate IT',
                'partner_shops_email' => 'innovateit@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'Dagon Center II',
                'partner_shops_township' => 'Sanchaung',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09692345678',
                'contact_secondary' => '09420198765',
            ],
            [
                'partner_shops_name' => 'Tech Fusion Store',
                'partner_shops_email' => 'techfusion@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'Sule Tower',
                'partner_shops_township' => 'Kyauktada',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09420234567',
                'contact_secondary' => '09520987654',
            ],
            [
                'partner_shops_name' => 'Hardware Haven',
                'partner_shops_email' => 'hardwarehaven@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'City Mall, St.John',
                'partner_shops_township' => 'Lanmadaw',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09694567123',
                'contact_secondary' => '09730213456',
            ],
            [
                'partner_shops_name' => 'Binary Boutique',
                'partner_shops_email' => 'binaryboutique@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'No. 77, Bogyoke Aung San Road',
                'partner_shops_township' => 'Kyauktada',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09692876543',
                'contact_secondary' => '09450987654',
            ],
            [
                'partner_shops_name' => 'Circuit City Pro',
                'partner_shops_email' => 'circuitcity@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'Yuzana Plaza',
                'partner_shops_township' => 'Mingalar Taung Nyunt',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09652345678',
                'contact_secondary' => '09450887654',
            ],
            [
                'partner_shops_name' => 'GigaWorld Electronics',
                'partner_shops_email' => 'gigaworld@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'No-29, Myaynigone Zay Road',
                'partner_shops_township' => 'Sanchaung',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09250323456',
                'contact_secondary' => '09259123456',
            ],
            [
                'partner_shops_name' => 'Mega Tech Mart',
                'partner_shops_email' => 'megatechmart@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'Yae Kyaw Complex',
                'partner_shops_township' => 'Mingalar Taung Nyunt',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09250193456',
                'contact_secondary' => '09250123296',
            ],
            [
                'partner_shops_name' => 'CyberCore',
                'partner_shops_email' => 'cybercore@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'Juntion City Mall, Level 3',
                'partner_shops_township' => 'Pabedan',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09250123236',
                'contact_secondary' => '09250123446',
            ],
            [
                'partner_shops_name' => 'PC Planet',
                'partner_shops_email' => 'pcplanet@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'No-44, Seikanthar Road',
                'partner_shops_township' => 'Pabedan',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09252223456',
                'contact_secondary' => '09457123456',
            ],
            [
                'partner_shops_name' => 'Byte Bazaar',
                'partner_shops_email' => 'bytebazaar@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'Dagon Center II',
                'partner_shops_township' => 'Sanchaung',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09258392156',
                'contact_secondary' => '09250191396',
            ],
            [
                'partner_shops_name' => 'Future Bytes',
                'partner_shops_email' => 'futurebytes@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'Ocean Super Center, Level 2',
                'partner_shops_township' => 'Tamwe',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09250123156',
                'contact_secondary' => '09252353456',
            ],
            [
                'partner_shops_name' => 'IT Essentials Co.',
                'partner_shops_email' => 'itessentials@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'Yankin Center',
                'partner_shops_township' => 'Yankin',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09250111156',
                'contact_secondary' => '09250194826',
            ],
            [
                'partner_shops_name' => 'SmartEdge Solutions',
                'partner_shops_email' => 'smartedge@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'No-60, University Avenue Road',
                'partner_shops_township' => 'Kamaryut',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09250101956',
                'contact_secondary' => '09250293456',
            ],
            [
                'partner_shops_name' => 'DigitalHub',
                'partner_shops_email' => 'digitalhub@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'No-124, Sayar San Road',
                'partner_shops_township' => 'Bahan',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09259923456',
                'contact_secondary' => '09450125456',
            ],
            [
                'partner_shops_name' => 'NextGen Gadgets',
                'partner_shops_email' => 'nextgengadgets@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'Pearl Condo',
                'partner_shops_township' => 'Bahan',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09250145256',
                'contact_secondary' => '09250123996',
            ],
            [
                'partner_shops_name' => 'TechNest',
                'partner_shops_email' => 'technest@example.com',
                'partner_shops_password' => Hash::make('pwd1234'),
                'partner_shops_address' => 'No-155, Lower Kyi Myin Dine road',
                'partner_shops_township' => 'Ahlone',
                'partner_shops_region' => 'Yangon',
                'contact_primary' => '09250883456',
                'contact_secondary' => '09250123006',
            ],
        ];

        foreach ($partnerShops as $shop) {
            PartnerShop::create($shop);
        }
    }
}
