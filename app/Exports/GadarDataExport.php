<?php

namespace App\Exports;

use App\Models\Users;
use App\Models\Gadar;
use App\Models\Gadaractual;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GadarDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $year;
    protected $quarter;

    public function __construct($year, $quarter)
    {
        $this->year = $year;
        $this->quarter = $quarter;
    }

    public function collection()
    {

        $level = auth()->user()->level_id;
        $division = auth()->user()->division_id;
        $section = auth()->user()->section_id;

        $response = [];

        $data = gadar::select(
                            'tbl_gadar.id', 
                            'tbl_gadar.indicator_code', 
                            'tbl_gadar.gad_mandate', 
                            'tbl_gadar.result_indicator', 
                            'tbl_gadar.prev_remark', 
                            'tbl_gadar.prev_male', 
                            'tbl_gadar.prev_female', 
                            'tbl_gadar.prev_budget', 
                            'tbl_gadar.prev_totalsex', 
                            'tbl_gadar.target_male', 
                            'tbl_gadar.target_female',
                            'tbl_gadar.target_totalsex', 
                            'tbl_gadar.pap_desc', 
                            'tbl_gadar.pap_code', 
                            'tbl_gadar.gad_activity', 
                            'tbl_gadar.budget_tierone', 
                            'tbl_gadar.budget_tiertwo',
                            'tbl_gadar.budget_totalamount', 
                            'tbl_gadar.source', 
                            'tbl_gadar.unit', 
                            'tbl_gadar.responsible_unit', 
                            'tbl_gadar.rawresponsible_unit',
                            'tbl_gadar.justification',
                            'tbl_gadar.remark_secretariat')
                            ->leftjoin('tbl_gadartime', 'tbl_gadartime.id','=', 'tbl_gadar.gadartime_id')
                            ->where('tbl_gadartime.year', '=', $this->year)
                            ->get();

        foreach ($data as $key) {

            $gadarActual = gadaractual::select(
                            'physical_male', 
                            'physical_female', 
                            'physical_other', 
                            'physical_sextotal', 
                            'gadar_actualactivity', 
                            'tierone_actual', 
                            'tiertwo_actual', 
                            'total_actualexpen', 
                            'justification', 
                            'remark_secretariat', 
                            'created_at')
                            ->where('gadar_id', $key->id)
                            ->where('quarter', $this->quarter)
                            ->orderBy('tbl_gadaractual.created_at', 'asc') // Sort by created_at in ascending order
                            ->first();

            $key->physical_male = $gadarActual->physical_male ?? null;
            $key->physical_female = $gadarActual->physical_female ?? null;
            $key->physical_other = $gadarActual->physical_other ?? null;
            $key->physical_sextotal = $gadarActual->physical_sextotal ?? null;
            $key->gadar_actualactivity = $gadarActual->gadar_actualactivity ?? null;
            $key->tierone_actual = $gadarActual->tierone_actual ?? null;
            $key->tiertwo_actual = $gadarActual->tiertwo_actual ?? null;
            $key->total_actualexpen = $gadarActual->total_actualexpen ?? null;
            $key->justification1 = $gadarActual->justification ?? null;
            $key->remark_secretariat1 = $gadarActual->remark_secretariat ?? null;
            $key->created_att = $gadarActual->created_at ?? null;

            $division_arr = $key->responsible_unit ? json_decode($key->responsible_unit) : [];
            $section_arr = $key->unit ? json_decode($key->unit) : [];

            if ($level == 1 && in_array($section, $section_arr)) {
                array_push($response, $key);
            } else if($level == 2 && in_array($division, $division_arr)) {
                array_push($response, $key);
            } else if($level == 3) {
                array_push($response, $key);
            }
        }
       
        // Remove 'id' from the final response array
        foreach ($response as $item) {
            unset($item->id);
            unset($item->unit);
            unset($item->responsible_unit);
        }

        return collect($response);
    }
    
    public function headings(): array
    {
        return [
            'Indicator Code',
            'Gad Mandate',
            'Result Indicator',
            'Previous Remark',
            'Previous Male',
            'Previous Female',
            'Previous Budget',
            'Previous Total Sex',
            'Target Male',
            'Target Female',
            'Target Total Sex',
            'PAP Description',
            'PAP Code',
            'Gad Activity',
            'Budget Tier One',
            'Budget Tier Two',
            'Budget Total Amount',
            'Source',
            'Responsible Unit',
            'Justification',
            'Remark Secretariat',
            'Physical Male',
            'Physical Female',
            'Physical Other',
            'Physical Sex Total',
            'Gadar Actual Activity',
            'Tier One Actual',
            'Tier Two Actual',
            'Total Actual Expenditure',
            'Justification',
            'Remark Secretariat',
            'Created At',
        ];
    }
}