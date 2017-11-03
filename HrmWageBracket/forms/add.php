<?php
class WageBracketForm extends Form
{
	function WageBracketForm()
	{
		Form::Form('WageBracketForm');
	}
    function on_submit(){
        $url_department = Url::get('id_dep') ;
        $url_regency    = Url::get('id_reg') ;
        $department = DB::fetch_all("
                                SELECT
                                    id,
                                    code
                                FROM
                                    hrm_department
                                WHERE
                                    id = ".$url_department."
        ");
        $regency = DB::fetch_all("
                                SELECT
                                    id,
                                    code
                                FROM
                                    hrm_regency
                                WHERE
                                    id = ".$url_regency."
        ");
        $check = false ;
        foreach($department as $key=>$value)
        {
            foreach($regency as $k=>$v)
            {
                if($value['code']=='P01'&&($v['code']=='CTHDQT' || $v['code']=='TGD' || $v['code']=='PTGD')){
                    $check = true ;
                }
                elseif($value['code']=='P01'&&($v['code']!='CTHDQT' || $v['code']!='TGD' || $v['code']!='PTGD')){
                    header ("Location:?page=hrm_wage_bracket");
                    exit();
                }
                elseif($value['code']!='P01'&&($v['code']=='CTHDQT' || $v['code']=='TGD' || $v['code']=='PTGD')){
                    header ("Location:?page=hrm_wage_bracket");
                    exit();
                }
                elseif($value['code']!='P01'&&($v['code']!='CTHDQT' || $v['code']!='TGD' || $v['code']!='PTGD')){
                    $check = true ;
                }
            }
        }
        if($check==true)
        {
            $id_reg = $_REQUEST['id_reg'] ;
            $id_dep = $_REQUEST['id_dep'] ;
            $sql = "SELECT id,wage_bracket FROM hrm_wage_bracket WHERE hrm_regency_id=".$url_regency." AND hrm_department_id=".$url_department ;
        if(isset($_REQUEST['id_reg'])&& isset($_REQUEST['id_dep']))
        {
            $info = array(
                'hrm_regency_id'    => $_REQUEST['id_reg'] ,
                'hrm_department_id' => $_REQUEST['id_dep'] ,
                'wage_bracket'      => System::calculate_number($_REQUEST['wage']),
            );
            if(DB::exists("SELECT id,wage_bracket FROM hrm_wage_bracket WHERE hrm_regency_id=".$url_regency." AND hrm_department_id=".$url_department)){
                DB::update('hrm_wage_bracket',$info,'hrm_regency_id='.$_REQUEST['id_reg']." AND hrm_department_id =".$_REQUEST['id_dep']);
            }else{
                DB::insert('hrm_wage_bracket',$info);
            }
            
             $check_wage = DB::fetch_all("
                    SELECT
                        max(id) as id
                    FROM
                        hrm_history_wage 
                    WHERE
                        hrm_department_id =".$id_dep." AND hrm_regency_id=".$id_reg."
            ");
            foreach($check_wage as $k=>$v)
            {
                $a = $v['id'];
            }
            $user = DB::fetch_all('
                            SELECT
                                name_1 as id
                            FROM
                                party
                            WHERE
                                user_id = \''.User::id().'\'
            ');
            foreach($user as $k=>$v)
            {
                $user_change = $v['id'];
            }
            if(empty($a))
            {
                $now = date('d/m/Y'); 
                $info = array(
                    'hrm_regency_id'    => $_REQUEST['id_reg'] ,
                    'hrm_department_id' => $_REQUEST['id_dep'] ,
                    'wage_bracket'      => System::calculate_number($_REQUEST['wage']),
                    'user_change'       => $user_change,
                    'time'              => $now,
                );
                DB::insert('hrm_history_wage',$info);
            }else
            {
                $search = DB::fetch_all("
                            SELECT
                                id,
                                wage_bracket
                            FROM
                                hrm_history_wage
                            WHERE id = ".$a."
                ");
                foreach($search as $k=>$v)
                {
                    if($v['wage_bracket']==System::calculate_number($_REQUEST['wage']))
                    {}
                    else
                    {
                        $now = date('d/m/Y'); 
                        $info = array(
                                'hrm_regency_id'    => $_REQUEST['id_reg'] ,
                                'hrm_department_id' => $_REQUEST['id_dep'] ,
                                'wage_bracket'      => System::calculate_number($_REQUEST['wage']),
                                'user_change'       => $user_change,
                                'time'              => $now,
                    );
                        DB::insert('hrm_history_wage',$info);
                    }
                
                }       
            }
        }
    }
        
}
	function draw()
	{
	    $this->map = array();
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
        $sql = DB::fetch_all("
                        SELECT
                            id,
                            wage_bracket
                        FROM
                            hrm_wage_bracket
                        WHERE
                            hrm_regency_id =".Url::get('id_reg')."
                        AND
                            hrm_department_id = ".Url::get('id_dep')."
        ");
        foreach($sql as $k=>$v)
        {
            $sql[$k]['wage_bracket'] = System::display_number($v['wage_bracket']);
        }
        if(!empty($sql))
        {
            $this->map['wage'] = $sql;
        }else{
            $this->map['wage'] = array(
            'wage_bracket'=>'0',
            );
        }
        $this->map['department_name'] = $department_name ;
        $this->map['regency_name'] = $regency_name ;
	    $this->parse_layout('add',$this->map);				
    }
}
?>