<?php
class salaryrangesForm extends Form
{
	function salaryrangesForm()
	{
		Form::Form('salaryrangesForm');
        $this->link_js('packages/core/includes/js/multi_items.js');
	}
    function on_submit(){
        $url_department = Url::get('id_dep') ;
        $url_regency    = Url::get('id_reg') ;
        if(URL::get('deleted_ids')){
  		    $ids = explode(',',URL::get('deleted_ids'));
                    foreach($ids as $id){
                             $this->delete_ranges($id);
                     }
        }
        $wage_main = DB::fetch_all("
                                SELECT
                                 hrm_staff.hrm_regency_id ||'-'|| hrm_wage_main_staff.hrm_salary_ranges_id as id 
                                FROM
                                    hrm_wage_main_staff
                                LEFT JOIN hrm_staff ON hrm_wage_main_staff.hrm_staff_id = hrm_staff.id
        ");
        if(isset($_REQUEST['id_reg']))
        {
            $check = DB::fetch_all("
                                SELECT
                                    id,
                                    name
                                FROM
                                    hrm_regency
                                WHERE
                                    id = ".Url::get('id_reg')."
            ");
            if(!empty($check))
            {
                $regency = $_REQUEST['regency'];
                foreach($regency as $key => $value)
                {
                    $info = array(
                        'hrm_regency_id'        => $_REQUEST['id_reg'] ,
                        'hrm_salary_ranges_id'  => $value['salary_id'],
                        'salary_coefficients'   => $value['coefficients'],
                        'hrm_department_id'     => $_REQUEST['id_dep'],
                    );
                    if(DB::exists("SELECT * FROM hrm_salary_coefficients WHERE hrm_department_id=".$url_department." AND hrm_regency_id=".$url_regency." AND hrm_salary_ranges_id=".$value['salary_id'])){
                        DB::update('hrm_salary_coefficients',$info, 'id='.$value['id']);
                    }else{
                        DB::insert('hrm_salary_coefficients',$info);
                    }    
                }
                Url::redirect_url('?page=hrm_salary_ranges&cmd=add&id_reg='.$_REQUEST['id_reg'].'&id_dep='.$_REQUEST['id_dep']); 
            }else{
                header ("Location:?page=hrm_salary_ranges");
                exit();
            }
        }
    }
	function draw()
	{
	    $this->map = array();
	    $ranges = DB::fetch_all("
                        SELECT
                            '_' || id as id,
                            hrm_regency_id,
                            hrm_salary_ranges_id,
                            salary_coefficients,
                            hrm_department_id
                        FROM 
                            hrm_salary_coefficients
                        WHERE
                            hrm_regency_id =".Url::get('id_reg')." AND hrm_department_id = ".Url::get('id_dep')."
                        ORDER BY hrm_salary_coefficients.hrm_salary_ranges_id
    ");
        foreach($ranges as $key=>$value)
        {
            $ranges[$key]['salary_coefficients'] = System::display_number($value['salary_coefficients']);
        }
        if(isset($_REQUEST['regency'])){
            $_REQUEST['regency'] = $_REQUEST['regency'];
        }else{
            $_REQUEST['regency'] = $ranges ;
        }
	    $sql = DB::fetch_all("
                SELECT
                    id,
                    name_".Portal::language()." as name
                FROM
                    hrm_salary_ranges
        ");
        $ranges_opt = '<option value="0">'.Portal::language('select').'</option>';
        $this->map['salary_ranges'] = $sql;
        foreach($sql as $key1 => $value1)
            {
                $ranges_opt .= '<option value="'.$value1['id'].'">'.$value1['name'].'</option>'; 
            }
        $regency_name = DB::fetch_all("
                                SELECT
                                    id,
                                    name
                                FROM
                                    hrm_regency
                                WHERE
                                    id =".Url::get('id_reg')."
        ");
        $department_name = DB::fetch_all("
                                SELECT
                                    id,
                                    name
                                FROM
                                    hrm_department
                                WHERE
                                    id =".Url::get('id_dep')."
        ");
        $this->map['department_name'] = $department_name ;
        $this->map['regency_name'] = $regency_name ;
        $this->map['ranges'] = $ranges_opt;
	    $this->parse_layout('add',$this->map);				
	}
    function delete_ranges($id){
		if($id and DB::exists('select id from hrm_salary_coefficients where id = '.$id) and User::can_delete(false,ANY_CATEGORY)){
			DB::delete('hrm_salary_coefficients','id=\''.$id.'\'');	
		}
	}
}
?>