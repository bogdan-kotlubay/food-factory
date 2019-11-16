<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

class CsvDataImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {

        $data_name = [];
        foreach ($rows as $key => $value)
        {

           if($value[2] === null) {unset($key);} else {
               $data_name[] = array(
                   'name' => $value[2]
               );

           }

        }




        $data_count = [];
        foreach ($rows as $key => $value)
        {

            if($value[5] == 0.0) {unset($key);} else {

                $data_count[] = array(
                    'count' => $value[5]
                );

            }

        }



        $data_code = [];
        foreach ($rows as $key => $value)
        {

            if($value[5] == 0) {unset($key);} else {

                $data_code[] = array(
                    'Code' => $value[1]
                );

            }

        }
        var_dump($data_code);

        $data_measure_type = [];
        foreach ($rows as $key => $value)
        {

            if($value[5] == 0) {unset($key);} else {

                $data_measure_type[] = array(
                    'Code' => $value[4]
                );

            }

        }

        //Закупочные суммы


        //Сумма б/н
        $data_sum_in_balance = [];
        foreach ($rows as $key => $value)
        {

            if($value[6] == 0) {unset($key);} else {

                $data_sum_in_balance[] = array(
                    'Sum in balance' => $value[6]
                );

            }

        }

        //НДС
        $data_nds = [];
        foreach ($rows as $key => $value)
        {

            if($value[7] == 0) {unset($key);} else {

                $data_nds[] = array(
                    'Sum in balance' => $value[7]
                );

            }

        }


        //Сумма в/н
        $data_summvn = [];
        foreach ($rows as $key => $value)
        {

            if($value[8] == 0) {unset($key);} else {

                $data_nds[] = array(
                    'Sum in balance' => $value[7]
                );

            }

        }



        dd($data_name);die();



        $keys = array_keys($data_name);
        $key = array_keys($data_count);

        foreach ($data_key as $key => $value) {
            # code...
        }



        // for($i = 0; $i<20; $i++){
        //     DB::table('directories')->insert(
        //         [
        //             'name'  => $data_name[$keys[$i]],
        //             'count' => $data_count[$key[$i]],
        //         ]
        //     );
        // }

        // var_dump($data_count[$key[2]]);die();

        // DB::table('directories')->insert(
        //     [
        //         'name'  => 'islom',
        //         'count' => 4.5,
        //     ]
        // );



    }
}
