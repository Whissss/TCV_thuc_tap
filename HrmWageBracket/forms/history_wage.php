<?php
class HistoryForm extends Form
{
	function HistoryForm()
	{
		Form::Form('HistoryForm');
        $this->link_js('packages/core/includes/js/jquery/jquery.autocomplete.js');
		$this->link_css('packages/core/skins/default/css/jquery.autocomplete.css');
        $this->link_js('packages/core/includes/js/jquery/ui/jquery.ui.widget.js');
	}
    function draw()
    {
        if(isset($_REQUEST['hrm_department_id']))
            $info_history = DB::fetch_all("
                                    SELECT
                                        *
                                    FROM
                                        hrm_history_wage
                                    ORDER BY id 
        ");
        if(!empty($_REQUEST['hrm_department_id']) && empty($_REQUEST['hrm_regency_id'])){
           $sql = DB::fetch_all("
                        SELECT
                            hrm_history_wage.id as id,
                            hrm_department.name as department_name,
                            hrm_history_wage.hrm_department_id,
                            hrm_regency.name as regency_name,
                            hrm_history_wage.hrm_regency_id,
                            hrm_history_wage.wage_bracket as wage_bracket,
                            hrm_history_wage.user_change as user_change,
                            hrm_history_wage.time as time
                        FROM
                            hrm_history_wage
                        LEFT JOIN hrm_department ON hrm_history_wage.hrm_department_id = hrm_department.id
                        LEFT JOIN hrm_regency ON hrm_history_wage.hrm_regency_id = hrm_regency.id
                        WHERE hrm_department_id=".$_REQUEST['hrm_department_id']."
                        ORDER BY id
        "); 
        }elseif(!empty($_REQUEST['hrm_regency_id']) && empty($_REQUEST['hrm_department_id'])){
           $sql = DB::fetch_all("
                        SELECT
                            hrm_history_wage.id as id,
                            hrm_department.name as department_name,
                            hrm_history_wage.hrm_department_id,
                            hrm_regency.name as regency_name,
                            hrm_history_wage.hrm_regency_id,
                            hrm_history_wage.wage_bracket as wage_bracket,
                            hrm_history_wage.user_change as user_change,
                            hrm_history_wage.time as time
                        FROM
                            hrm_history_wage
                        LEFT JOIN hrm_department ON hrm_history_wage.hrm_department_id = hrm_department.id
                        LEFT JOIN hrm_regency ON hrm_history_wage.hrm_regency_id = hrm_regency.id
                        WHERE hrm_regency_id=".$_REQUEST['hrm_regency_id']."
                        ORDER BY id
        ");   
        }elseif(!empty($_REQUEST['hrm_regency_id']) && !empty($_REQUEST['hrm_department_id']))
        {
            $sql = DB::fetch_all("
                        SELECT
                            hrm_history_wage.id as id,
                            hrm_department.name as department_name,
                            hrm_history_wage.hrm_department_id,
                            hrm_regency.name as regency_name,
                            hrm_history_wage.hrm_regency_id,
                            hrm_history_wage.wage_bracket as wage_bracket,
                            hrm_history_wage.user_change as user_change,
                            hrm_history_wage.time as time
                        FROM
                            hrm_history_wage
                        LEFT JOIN hrm_department ON hrm_history_wage.hrm_department_id = hrm_department.id
                        LEFT JOIN hrm_regency ON hrm_history_wage.hrm_regency_id = hrm_regency.id
                        WHERE hrm_regency_id=".$_REQUEST['hrm_regency_id']." AND hrm_department_id=".$_REQUEST['hrm_department_id']."
                        ORDER BY id
        ");
        }else{
             $sql = DB::fetch_all("
                        SELECT
                            hrm_history_wage.id as id,
                            hrm_department.name as department_name,
                            hrm_history_wage.hrm_department_id,
                            hrm_regency.name as regency_name,
                            hrm_history_wage.hrm_regency_id,
                            hrm_history_wage.wage_bracket as wage_bracket,
                            hrm_history_wage.user_change as user_change,
                            hrm_history_wage.time as time
                        FROM
                            hrm_history_wage
                        LEFT JOIN hrm_department ON hrm_history_wage.hrm_department_id = hrm_department.id
                        LEFT JOIN hrm_regency ON hrm_history_wage.hrm_regency_id = hrm_regency.id
                        ORDER BY id
        ");
        }
        foreach($sql as $k=>$v)
        {
            $sql[$k]['wage_bracket'] = System::display_number($v['wage_bracket']);
        }
        $iteams = array();
        foreach($sql as $key=>$value)
        {
            if(!isset($iteams[$value['hrm_department_id']]))
            {
                $a[] = $value['hrm_department_id'];
                $iteams[$value['hrm_department_id']]['id'] = $value['hrm_department_id'];
                $iteams[$value['hrm_department_id']]['name'] = $value['department_name'];
            }
                $iteams[$value['hrm_department_id']]['child'][$value['id']]['regency_name'] = $value['regency_name'];
                $iteams[$value['hrm_department_id']]['child'][$value['id']]['wage_bracket'] = $value['wage_bracket'];
                $iteams[$value['hrm_department_id']]['child'][$value['id']]['user_change'] = $value['user_change'];
                $iteams[$value['hrm_department_id']]['child'][$value['id']]['time'] = $value['time'];
        }
        $this->map['history'] = $iteams;
        $this->parse_layout('history_wage',$this->map);
    }
    
 }