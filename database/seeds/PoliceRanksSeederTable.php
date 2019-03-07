<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PoliceRanksSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        $ranks = [
//            'Superior officers',
//            'Inspector General of police',
//            'Deputy inspector general Commissioner',
//            'Deputy commissioner Assistant commissioner',
//            'Chief superintendent',
//            'Superintendent',
//            'Deputy superintendent',
//            'Assistant superintendent',
//            'Subordinate police officers',
//            'Chief inspector Sergeant',
//            'Corporal',
//            'Lance corporal',
//            'Constable',
//        ];

        $ranks = [
            'Commander',
            'Investigator',
            'Counter Officer',
        ];

        foreach ($ranks as $rank) {
            \App\PoliceRank::create(['name' => $rank]);
        }

    }
}
