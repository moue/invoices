<?php

class PlansTableSeeder extends Seeder {

    public function run()
    {
        DB::table('plans')->delete();

        DB::table('plans')->insert( 
            array(
                array('plan' => 'Three years (12 issues) for $90 - U.S.'),
                array('plan' => 'Two years (8 issues) for $69 - U.S.'),
                array('plan' => 'One year (4 issues) for $35 - U.S.'),
                array('plan' => 'Three years (12 issues) for $110 - International & Institutions'),
                array('plan' => 'Two years (8 issues) for $75 - International & Institutions'),
                array('plan' => 'One year (4 issues) for $45 - International & Institutions')
            )
        );
    }

}

?>