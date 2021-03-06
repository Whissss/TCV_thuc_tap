<?php
class ViewForm extends Form
{
	function ViewForm()
	{
		Form::Form('ViewForm');
        $this->link_js('packages/core/includes/js/jquery/jquery.autocomplete.js');
		$this->link_css('packages/core/skins/default/css/jquery.autocomplete.css');
        $this->link_js('packages/core/includes/js/jquery/ui/jquery.ui.widget.js');
	}
    function draw(){
        $this->map = array();
        $url_department = Url::get('hrm_department_id') ;
        $url_regency = Url::get('hrm_regency_id') ;
        if($url_regency)
        {
            $_REQUEST['row'] = 'yes';
        }
        $info_salary_ranges = DB::fetch_all("
                            SELECT
                                id,
                                name_".Portal::language()." as name,
                                0 as salary_coefficients
                            FROM
                                hrm_salary_ranges                     
        ");
        $info_regency = DB::fetch_all("
                            SELECT
                                id,
                                name,
                                code
                            FROM
                                hrm_regency
        ");
        $info_deparment = DB::fetch_all("
                            SELECT
                                id,
                                name
                            FROM 
                                hrm_department
        ");
        $regency = DB::fetch_all("
                            SELECT
                                id,
                                name
                            FROM
                                hrm_regency
                            WHERE code != 'CTHDQT' AND code != 'TGD' AND code != 'PTGD'
                            ORDER BY id
        ");
        if($url_regency)
        {
            $check_regency = DB::fetch_all("
                                    SELECT
                                        id,
                                        name,
                                        code
                                    FROM
                                        hrm_regency
                                    WHERE
                                    id = ".$url_regency."
            ");
            foreach($check_regency as $key=>$value)
            {
                if($value['code']!='CTHDQT' && $value['code']!='TGD' && $value['code']!='PTGD')
                {
                    $regency = DB::fetch_all("
                            SELECT
                                id,
                                name
                            FROM
                                hrm_regency
                            WHERE id = ".$url_regency."
        ");
                }
            }
        }
        $department = DB::fetch_all("
                            SELECT
                                id,
                                name
                            FROM
                                hrm_department
                            WHERE code != 'P01'
                            ORDER BY id
        ");
        if($url_department)
        {
            $check_department = DB::fetch_all("
                                    SELECT
                                        id,
                                        name,
                                        code
                                    FROM
                                        hrm_department
                                    WHERE
                                    id = ".$url_department."
            ");
            foreach($check_department as $key=>$value)
            {
                if($value['code']!='P01')
                {
                    $department = DB::fetch_all("
                            SELECT
                                id,
                                name
                            FROM
                                hrm_department
                            WHERE id = ".$url_department."
        ");
                }
            }
        }
        $salary_ranges = DB::fetch_all("
                            SELECT
                                hrm_salary_coefficients.id,
                                hrm_regency_id ,
                                hrm_department_id,
                                hrm_salary_coefficients.hrm_salary_ranges_id,
                                hrm_salary_coefficients.salary_coefficients as salary_coefficients
                            FROM
                                hrm_salary_coefficients
                            INNER JOIN hrm_regency ON hrm_salary_coefficients.hrm_regency_id = hrm_regency.id
                            INNER JOIN hrm_department ON hrm_salary_coefficients.hrm_department_id = hrm_department.id                           
                            ORDER BY hrm_regency_id
        ");
        $ranges_manager ='';
        foreach($info_salary_ranges as $key => $value)
        {
            $ranges_manager .= "<td style='width:85px;' id='head'><strong>".$value['name'].'</strong></td>'; 
        }
        foreach($regency as $key => $value)
        {
            $regency[$key]['child'] = $info_salary_ranges;
        }
        foreach($department as $key => $value)
        {
            $department[$key]['regencry'] = $regency;  
        }
        foreach($salary_ranges as $key => $value)
        {
            if(isset($department[$value['hrm_department_id']]['regencry'][$value['hrm_regency_id']]['child'][$value['hrm_salary_ranges_id']]))
            {
                $department[$value['hrm_department_id']]['regencry'][$value['hrm_regency_id']]['child'][$value['hrm_salary_ranges_id']]['salary_coefficients'] = System::display_number($value['salary_coefficients']);                
            }
        }
        $regency_manager = DB::fetch_all("
                            SELECT
                                id,
                                name
                            FROM
                                hrm_regency
                            WHERE code = 'CTHDQT' OR code = 'TGD' OR code = 'PTGD'
                            ORDER BY id
                        ");
        if($url_regency)
        {
            $check_regency = DB::fetch_all("
                                    SELECT
                                        id,
                                        name,
                                        code
                                    FROM
                                        hrm_regency
                                    WHERE
                                    id = ".$url_regency."
            ");
            foreach($check_regency as $key=>$value)
            {
                if($value['code']=='CTHDQT' || $value['code']=='TGD' || $value['code']=='PTGD')
                {
                    $regency_manager = DB::fetch_all("
                            SELECT
                                id,
                                name
                            FROM
                                hrm_regency
                            WHERE id = ".$url_regency."
                    ");
                }
            }
        }
        $department_manager = DB::fetch_all("
                            SELECT
                                id,
                                name
                            FROM
                                hrm_department
                            WHERE code = 'P01'
                            ORDER BY id
        ");
        $ranges = '';
        foreach($info_salary_ranges as $key => $value)
        {
            $ranges .= "<td style='width:85px;' id='head'><strong>".$value['name'].'</strong></td>'; 
        }
        foreach($regency_manager as $key => $value)
        {
            $regency_manager[$key]['child'] = $info_salary_ranges;
        }
        foreach($department_manager as $key => $value)
        {
            $department_manager[$key]['regencry'] = $regency_manager;  
        }
        foreach($salary_ranges as $key => $value)
        {
            if(isset($department_manager[$value['hrm_department_id']]['regencry'][$value['hrm_regency_id']]['child'][$value['hrm_salary_ranges_id']]))
            {
                $department_manager[$value['hrm_department_id']]['regencry'][$value['hrm_regency_id']]['child'][$value['hrm_salary_ranges_id']]['salary_coefficients'] = System::display_number($value['salary_coefficients']);                
            }
        }
        if($url_department && !$url_regency)
        {
            $code_department = DB::fetch_all("
                                SELECT
                                    id,
                                    code
                                FROM
                                    hrm_department
                                WHERE
                                    id = ".$url_department."
            ");
            foreach($code_department as $key=>$value)
            {
                if($value['code']=='P01')
                {
                    $this->map['department_manager'] = $department_manager ;
                }else{
                    $this->map['department'] = $department;
                }  
            }
        }
        if($url_regency && !$url_department)
        {
                $_REQUEST['row_regency'] = 'yes';
                $code_regency = DB::fetch_all("
                                    SELECT
                                        id,
                                        code
                                    FROM
                                        hrm_regency
                                    WHERE
                                        id = ".$url_regency."
                ");
                foreach($code_regency as $key=>$value)
                {
                    if($value['code']=='CTHDQT' || $value['code']=='TGD' || $value['code']=='PTGD')
                    {
                        $this->map['department_manager'] = $department_manager ;
                    }else{
                        $this->map['department'] = $department;
                    }
                }
        }
        if($url_department && $url_regency)
        {
            $_REQUEST['row_regency'] = 'yes';
            $code_department = DB::fetch_all("
                                SELECT
                                    id,
                                    code
                                FROM
                                    hrm_department
                                WHERE
                                    id = ".$url_department."
            ");
            $code_regency = DB::fetch_all("
                                SELECT
                                    id,
                                    code
                                FROM
                                    hrm_regency
                                WHERE
                                    id = ".$url_regency."
            ");
            foreach($code_department as $key=>$value)
            {
                foreach($code_regency as $k=>$v)
                {
                    if($value['code']=='P01'&&($v['code']=='CTHDQT' || $v['code']=='TGD' || $v['code']=='PTGD')){
                        $this->map['department_manager'] = $department_manager;
                    }elseif($value['code']=='P01'&&($v['code']!='CTHDQT' || $v['code']!='TGD' || $v['code']!='PTGD')){
                        $this->map['department_manager'] = $department_manager;
                    }
                    else{
                        $this->map['department'] = $department;
                    }  
                }
            }       
        }
        if(!$url_department && !$url_regency)
        {
            $this->map['department'] = $department;
            $this->map['department_manager'] = $department_manager;
        }
        $this->map['ranges'] = $ranges;
        $this->parse_layout('view',$this->map);
    }
 }