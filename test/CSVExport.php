<?php
/**
 * Created by PhpStorm.
 * User: Jahedh
 * Date: 12/12/2019
 * Time: 03:05
 */

include __DIR__ . "/Export.php";

class CSVExport implements Export
{
    public function export($array, $filename = 'expenses', $delimiter = ',')
    {

        // open raw memory as file so no temp files needed, you might run out of memory though
        $f = fopen('php://memory', 'w');
        // loop over the input array
        foreach ($array as $line) {
            // generate csv lines from the inner arrays
            fputcsv($f, $line, $delimiter);
        }
        // reset the file pointer to the start of the file
        fseek($f, 0);
        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename="'.$filename.'.csv";');
        // make php send the generated csv lines to the browser
        fpassthru($f);

    }

}