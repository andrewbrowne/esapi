<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Measurement::class, function (Faker $faker) {
    DB::table('sets')->insert([
        	[
        		'short_name' => 'Watt',
        		'abbreaviation' => "W",
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'short_name' => 'Watt hours',
        		'abbreaviation' => "Wh",
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'short_name' => 'Kilowatts',
        		'abbreaviation' => "KW",
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'short_name' => 'Kilowatt hours',
        		'abbreaviation' => "KWh",
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'short_name' => 'Megawatts',
        		'abbreaviation' => "MW",
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'short_name' => 'Gigawatts',
        		'abbreaviation' => "GW",
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'short_name' => 'Temperature Celcius',
        		'abbreaviation' => "C",
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'short_name' => 'Temperature Farenheit',
        		'abbreaviation' => "F",
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'short_name' => 'Voltage',
        		'abbreaviation' => "V",
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'short_name' => 'Flow',
        		'abbreaviation' => "L",
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

        	[
        		'short_name' => 'Flow',
        		'abbreaviation' => "KL",
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	],

    		[
    			'short_name' => 'Pressure',
    			'abbreaviation' => "BAR",
    	    	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	    	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		],

    		[
    			'short_name' => 'Current',
    			'abbreaviation' => "I",
    	    	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    	    	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    		],
        ]);
});
