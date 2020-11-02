<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counries=[
            'Afganistan'=>'AF',
            'Albania'=>'AL',
            'Algeria'=>'DZ',
            'American Samoa'=>'AS',
            'Andorra'=>'AD',
            'Angola'=>'AO',
            'Ukraine'=>'UA',
            'United Arab Emirates'=>'AE',
            'United Kingdom'=>'GB',
            'United States'=>'US'

        ];
        collect($counries)->each(function($code,$name){
            Country::create([
                'code'=>$code,
                'name'=>$name,
            ]);
        });
    }
}
