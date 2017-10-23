<?php
class salaryrangesForm extends Form
{
	function salaryrangesForm()
	{
		Form::Form('salaryrangesForm');
        $this->link_js('packages/core/includes/js/multi_items.js');
	}
    function on_submit(){
        //System::debug($_REQUEST);
        if(URL::get('deleted_ids'))
		{
			$ids = explode(',',URL::get('deleted_ids'));
			foreach($ids as $id)
			{
				$this->delete_ranges($id);
			}
		}
        if(isset($_REQUEST['id']))
        {
            $regency = $_REQUEST['regency'];
            
            foreach($regency as $key => $value)
            {
                $info = array(
                    'hrm_regency_id'        => $_REQUEST['id'] ,
                    'hrm_salary_ranges_id'  => $value['salary_id'],
                    'salary_coefficients'   => $value['coefficients'] 
                );
                if($value['id']){
                    DB::update('hrm_salary_coefficients',$info, 'id='.$value['id']);
                }else{
                    DB::insert('hrm_salary_coefficients',$info);
                }
            }
            //System::debug($name);
            Url::redirect_url('?page=hrm_salary_ranges&cmd=add&id='.$_REQUEST['id']);        
        }
    }
	function draw()
	{
	   $this->map = array();
	   $ranges = DB::fetch_all('
                        SELECT
                            id,
                            hrm_regency_id,
                            hrm_salary_ranges_id,
                            salary_coefficients
                        FROM 
                            hrm_salary_coefficients
                        WHERE
                            hrm_regency_id ='.Url::get('id')
       );
       if(isset($_REQUEST['regency'])){
            $_REQUEST['regency'] = $_REQUEST['regency'];
       }else{
            $_REQUEST['regency'] = $ranges ;
       }
       //System::debug($_REQUEST['regency']);
       
	    $sql = DB::fetch_all("
                SELECT
                    id,
                    name_".Portal::language()." as name
                FROM
                    hrm_salary_ranges
        ");
        $ranges_opt = '<option value="">'.Portal::language('select').'</option>';
        $this->map['salary_ranges'] = $sql;
        foreach($sql as $key1 => $value1)
            {
                $ranges_opt .= '<option value="'.$value1['id'].'">'.$value1['name'].'</option>'; 
            }
        $this->map['ranges'] = $ranges_opt;
	    $this->parse_layout('add',$this->map);				
	}
    	function delete_ranges($id){
		if($id and DB::exists('select id from hrm_salary_coefficients where id = '.$id.'') and User::can_delete(false,ANY_CATEGORY)){
			DB::delete('hrm_salary_coefficients','id=\''.$id.'\'');	
		}
	}
}
?>