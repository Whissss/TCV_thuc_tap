<?php
class HrmSalaryRangesForm extends Form
{
	function HrmSalaryRangesForm()
	{
		Form::Form('HrmSalaryRangesForm');
	}
    function on_submit(){
        if(isset($_REQUEST['regency_id']))
        {
            $id = $_REQUEST['regency_id'] ;
            $sql_regency = DB::fetch_all("
                                    SELECT
                                        id,
                                        name
                                    FROM
                                        hrm_regency
                                    WHERE
                                        id = $id
                ");
            foreach($sql_regency as $key => $value)
                {
                    $name = $value['name'];
                }
                Url::redirect_url('?page=hrm_salary_ranges&cmd=add&id='.$id);
        }  
    }
    
	function draw()
	{
	    $this->map = array();
        $sql =DB::fetch_all("
            Select
                id,
                name
            FROM
                hrm_regency
            ORDER BY id
        ");
        $regency_opt = '';
        foreach($sql as $key1 => $value1)
            {
                $regency_opt .= '<option value="'.$value1['id'].'">'.$value1['name'].'</option>'; 
            }
        $this->map['regency'] = $regency_opt;
	    $this->parse_layout('report',$this->map);				
	}
}
?>