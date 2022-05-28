<?php
class Controller
{
    private $filename = "companies.csv";
    public function getList($data_post)
    {
        //variable search
        $CMGUnmaskedName = isset($data_post['CMGUnmaskedName']) ? strtolower($data_post['CMGUnmaskedName']) : '';
        $ClientTier = isset($data_post['ClientTier']) ? strtolower($data_post['ClientTier']) : '';
        $CMGSegmentName = isset($data_post['CMGSegmentName']) ? strtolower($data_post['CMGSegmentName']) : '';

        //variabel per page and how many rows 
        $page = isset($data_post['page']) ? intval($data_post['page']) : 1;
        $rows = isset($data_post['rows']) ? intval($data_post['rows']) : 10;

        $dataJson = array();
        $file_data = fopen($this->filename, "r");
        fgetcsv($file_data); //skip first row
        while ($column = fgetcsv($file_data)) {
            if (!empty($CMGUnmaskedName) || !empty($ClientTier) || !empty($CMGSegmentName)) {
                /**
                 * JIKA ClientTier DAN CMGSegmentName DIPILIH
                 * MAKA, KONDISI SEARCH JADI &&
                 */
                $condition_search_select = strtolower($column[2]) == $ClientTier || strtolower($column[6]) == $CMGSegmentName;
                if(!empty($ClientTier) && !empty($CMGSegmentName)){
                    $condition_search_select = strtolower($column[2]) == $ClientTier && strtolower($column[6]) == $CMGSegmentName;
                }
                /**
                 * JIKA CMGUnmaskedName TIDAK KOSONG
                 * MAKA, CMGUnmaskedName && ClientTier && CMGSegmentName
                 */
                $condition_search = $condition_search_select;
                if(!empty($CMGUnmaskedName)){
                    $condition_search = stristr(strtolower($column[1]), $CMGUnmaskedName) !== false || $condition_search_select;
                    if(!empty($ClientTier) && !empty($CMGSegmentName)){
                        $condition_search = stristr(strtolower($column[1]), $CMGUnmaskedName) !== false && strtolower($column[2]) == $ClientTier && strtolower($column[6]) == $CMGSegmentName;
                    }
                    if(!empty($ClientTier)){
                        $condition_search = stristr(strtolower($column[1]), $CMGUnmaskedName) !== false && strtolower($column[2]) == $ClientTier;
                    }
                    if(!empty($CMGSegmentName)){
                        $condition_search = stristr(strtolower($column[1]), $CMGUnmaskedName) !== false && strtolower($column[6]) == $CMGSegmentName;
                    }
                }

                if ($condition_search) {
                    // echo stristr(strtolower($column[1]), $CMGUnmaskedName).'--';
                    $dataJson[] = $this->setDataJson($column[0],$column[1],$column[2],$column[3],$column[4],$column[5],
                    $column[6],$column[7],$column[8],$column[9],$column[10],
                    $column[11],$column[12],$column[13],$column[14],$column[15],
                    $column[16],$column[17],$column[18],$column[19],$column[20],
                    $column[21],$column[22],$column[23],$column[24],$column[25],$column[26]);
                }
            } else {
                $dataJson[] = $this->setDataJson($column[0],$column[1],$column[2],$column[3],$column[4],$column[5],
                $column[6],$column[7],$column[8],$column[9],$column[10],
                $column[11],$column[12],$column[13],$column[14],$column[15],
                $column[16],$column[17],$column[18],$column[19],$column[20],
                $column[21],$column[22],$column[23],$column[24],$column[25],$column[26]);
            }
        }
        fclose($file_data);
        $data = !empty($dataJson)?array_chunk($dataJson, $rows):array();
        header('Content-Type: application/json');
        echo json_encode(
            array(
                'total' => count($dataJson),
                'rows' => !empty($dataJson)?$data[$page - 1]:''
            )
        );
    }

    private function setDataJson($column_0,$column_1,$column_2,$column_3,$column_4,$column_5,
    $column_6,$column_7,$column_8,$column_9,$column_10,
    $column_11,$column_12,$column_13,$column_14,$column_15,
    $column_16,$column_17,$column_18,$column_19,$column_20,
    $column_21,$column_22,$column_23,$column_24,$column_25,$column_26)
    {
        $dataJson = array(
            'CMGUnmaskedID' => $column_0,
            'CMGUnmaskedName' => $column_1,
            'ClientTier' => $column_2,
            'GCPStream' => $column_3,
            'GCPBusiness' => $column_4,
            'CMGGlobalBU' => $column_5,
            'CMGSegmentName' => $column_6,
            'GlobalControlPoint' => $column_7." / ".$column_8,
            'GlobalRelationshipManagerName' => $column_9,
            'REVENUE_FY14' => $column_10,
            'REVENUE_FY15' => $column_11,
            'Deposits_EOP_FY14' => $column_12,
            'Deposits_EOP_FY15x' => $column_13,
            'TotalLimits_EOP_FY14' => $column_14,
            'TotalLimits_EOP_FY15' => $column_15,
            'TotalLimits_EOP_FY15x' => $column_16,
            'RWAFY15' => $column_17,
            'RWAFY14' => $column_18,
            // 'REV_RWA_FY14' => $column_19,
            // 'REV_RWA_FY15' => $column_20,
            'NPAT_AllocEq_FY14' => $column_21,
            'NPAT_AllocEq_FY15X' => $column_22,
            'Company_Avg_Activity_FY14' => $column_23,
            'Company_Avg_Activity_FY15' => $column_24,
            'ROE_FY14' => $column_25,
            'ROE_FY15' => $column_26,
        );
        return $dataJson;
    }

    public function updateDataList($data_post)
    {
        $CMGUnmaskedID = $data_post['text_field_CMGUnmaskedID'];
        $ROE_FY14 = $data_post['text_field_ROE_FY14'];
        $ROE_FY15 = $data_post['text_field_ROE_FY15'];
        $REVENUE_FY14 = $data_post['text_field_REVENUE_FY14'];
        $REVENUE_FY15 = $data_post['text_field_REVENUE_FY15'];
        $RWAFY14 = $data_post['text_field_RWAFY14'];
        $RWAFY15 = $data_post['text_field_RWAFY15'];
        $TotalLimits_EOP_FY14 = $data_post['text_field_TotalLimits_EOP_FY14'];
        $TotalLimits_EOP_FY15 = $data_post['text_field_TotalLimits_EOP_FY15'];
        $Company_Avg_Activity_FY14 = $data_post['text_field_Company_Avg_Activity_FY14'];
        $Company_Avg_Activity_FY15 = $data_post['text_field_Company_Avg_Activity_FY15'];

        $file_data = fopen($this->filename, "r");
        $file_data_coba = fopen("dummy.csv", "w");
        fwrite($file_data_coba, '');
        while ($column = fgetcsv($file_data)) {
            if($column[0] == $CMGUnmaskedID){
                $column[10] = $REVENUE_FY14;
                $column[11] = $REVENUE_FY15;
                $column[14] = $TotalLimits_EOP_FY14;
                $column[15] = $TotalLimits_EOP_FY15;
                $column[17] = $RWAFY15;
                $column[18] = $RWAFY14;
                $column[23] = $Company_Avg_Activity_FY14;
                $column[24] = $Company_Avg_Activity_FY15;
                $column[25] = $ROE_FY14;
                $column[26] = $ROE_FY15;
            }
            
            fputcsv($file_data_coba, $column);
        }
        fclose($file_data);
        unlink($this->filename);
        rename("dummy.csv",$this->filename);
        header('Content-Type: application/json');
        echo json_encode(
            array(
                'REVENUE_FY14' => $REVENUE_FY14,
                'REVENUE_FY15' => $REVENUE_FY15,
                'TotalLimits_EOP_FY14' => $TotalLimits_EOP_FY14,
                'TotalLimits_EOP_FY15' => $TotalLimits_EOP_FY15,
                'RWAFY15' => $RWAFY15,
                'RWAFY14' => $RWAFY14,
                'Company_Avg_Activity_FY14' => $Company_Avg_Activity_FY14,
                'Company_Avg_Activity_FY15' => $Company_Avg_Activity_FY15,
                'ROE_FY14' => $ROE_FY14,
                'ROE_FY15' => $ROE_FY15,
            )
        );
    }
}