<?php
class svForm extends Form
{
	function svForm()
    {
		Form::Form('svForm');
	}
    function on_submit()
    {
    } 
    function draw()
    {
        $this->map = array() ;
        if(!isset($_REQUEST['d']))
        {
            $sql = 'SELECT * FROM SV ORDER BY id ASC ';
            $sv = DB::fetch_all($sql);
            $this->map['hs'] = $sv ;
        }
        
        
        $this->parse_layout('sv',$this->map);
    }
}
?>