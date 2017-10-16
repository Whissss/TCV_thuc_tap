<?php
class caForm extends Form
{
	function caForm()
    {
		Form::Form('caForm');
	}
    
    function on_submit()
    {
        //System::debug($_REQUEST);exit();
       /*if(isset($_REQUEST['ca']))
        {
            $ca = $_REQUEST['ca'] ;
            $mt = $_REQUEST['mt'] ;
            $sql = array(
                'ca'    => $ca,
                'mo_ta' => $mt
            );
        DB::insert('CA_HOC',$sql);
        }
        */
        if(isset($_REQUEST['del_id']))
        {
            DB::delete('CA_HOC','id='.$_REQUEST['del_id']); 
        }
        
    }
    
    function draw()
    {
        if(!isset($_REQUEST['ca_h']))
        {
            $sql = 'SELECT * FROM CA_HOC ';
            $ca_h = DB::fetch_all($sql);
            $_REQUEST['c'] = $ca_h;
        }
        $this->map = array();
        $this->parse_layout('ca',$this->map);
    }
}
?>