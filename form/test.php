<?php 
class testForm extends Form
{
	function testForm()
    {
		Form::Form('testForm');
	}  
    function draw()
    {
        $this->map = array();
        $this->parse_layout('test',$this->map);
    }
}
?>