<?php
class ViewForm extends Form
{
	function ViewForm()
	{
		Form::Form('ViewForm');
	}
    function draw(){
        $this->map = array();
        
        $info_salary_ranges = DB::fetch_all("
                            SELECT
                                id,
                                name_".Portal::language()." as name,
                                0 as salary_coefficients
                            FROM
                                hrm_salary_ranges
                                
        ");
        
        $sql = "SELECT (hrm_regency.id || '-' || hrm_salary_ranges.id) as id 
                    FROM hrm_regency, hrm_salary_ranges 
                    WHERE (hrm_regency.id || '-' || hrm_salary_ranges.id) NOT IN ( SELECT hrm_regency_id || '-' || hrm_salary_ranges_id FROM hrm_salary_coefficients)";
        

        $regency = DB::fetch_all("
                            SELECT
                                id,
                                name
                            FROM
                                hrm_regency
                            ORDER BY id
        ");
        
        $coefficients = DB::fetch_all("
                            SELECT
                                hrm_salary_coefficients.id as id,
                                hrm_salary_coefficients.hrm_regency_id as regency_id,
                                hrm_salary_coefficients.hrm_salary_ranges_id,
                                nvl(hrm_salary_coefficients.salary_coefficients,0) as salary_coefficients,
                                hrm_regency.name as regrncy_name
                            FROM
                                hrm_salary_coefficients
                                left join hrm_regency on hrm_regency.id = hrm_salary_coefficients.hrm_regency_id
                            ORDER BY id
        ");
         /*foreach($regency as $key=> $value)
         {
            $regency[$key]['salary_ranges'] = $info_salary_ranges;
            foreach($coefficients as $k=>$v)
            {
                if($v['regency_id']==$key)
                {
                    foreach($info_salary_ranges as $k2 => $v2)
                    {
                        if($k2 == $v['hrm_salary_ranges_id'])
                        {
                           $regency[$key]['salary_ranges'][$k2]['salary_coefficients'] = $v['salary_coefficients'];  
                        }
                    }
                }
            }
         }*/
        $ranges = "";
        foreach($info_salary_ranges as $key => $value)
        {
            $ranges .= "<td style='width:85px;' id='head'><strong>".$value['name'].'</strong></td>'; 
        }
        foreach($regency as $key => $value)
        {
            $regency[$key]['child'] = $info_salary_ranges;
        }
        foreach($coefficients as $key => $value)
        {
            if(!isset($regency[$value['regency_id']]))
            {
                $regency[$value['regency_id']]['id'] = $value['regency_id'];
                $regency[$value['regency_id']]['name'] = $value['regrncy_name'];
                $regency[$value['regency_id']]['child'] = array();               
            }
            if(isset($info_salary_ranges[$value['hrm_salary_ranges_id']]))
            {
                $regency[$value['regency_id']]['child'][$value['hrm_salary_ranges_id']] = array();
                $regency[$value['regency_id']]['child'][$value['hrm_salary_ranges_id']]['name'] = $info_salary_ranges[$value['hrm_salary_ranges_id']]['name'];
                $regency[$value['regency_id']]['child'][$value['hrm_salary_ranges_id']]['salary_coefficients'] = $value['salary_coefficients'];
            }
        }
        //System::debug($regency);
        $this->map['ranges'] = $ranges;
        $this->map['ranges_count'] = $sql;
        $this->map['regency'] = $regency;
        $this->parse_layout('view',$this->map);
    }
 }