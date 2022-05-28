<?php
class SelectedSearch
{
    public function getSelected($pilihan = 2)
    {
        $filename = "companies.csv";
        $file_data = fopen($filename, 'r');
        fgetcsv($file_data); //skip first row
        while ($column = fgetcsv($file_data)) {
            $dataJson[] = $column[$pilihan];
        }
        return array_unique($dataJson);
    }
}
