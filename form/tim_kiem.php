<?php 
class tim_kiemForm extends Form
{
	function tim_kiemForm()
    {
		Form::Form('tim_kiemForm');
	}  
    function draw()
    {
        $this->map = array();
        $cond ='1=1';
            $sql = " 
                SELECT
                    sv.id,
                    student.stu_name,
                    sv.time,
                    subject.sub_name
                FROM
                    sv
                        JOIN student ON student.stu_id = sv.stu_id 
                        JOIN subject ON subject.sub_id = sv.sub_id
                
                WHERE 
                    ".$cond." ORDER BY sv.id ASC   
                    ";
            $sv = DB::fetch_all($sql);
            $this->map['search'] = $sv ;
        $this->parse_layout('tim_kiem',$this->map);
    }
}
?>