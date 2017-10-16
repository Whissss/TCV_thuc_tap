<?php
class subForm extends Form
{
function subForm(){
    Form::Form('subForm');
}
function on_submit()
{
    if(isset($_REQUEST['sub_id']))
    {
    $id = $_REQUEST['sub_id'];
    $name = $_REQUEST['sub_name'];
    $sql = array(
        'sub_id' => $id,
        'sub_name'=>$name
    );
    DB::insert('SUBJECT',$sql);
    }
    
    if(isset($_REQUEST['del_ids']))
    {
        DB::delete('SUBJECT','sub_id='.$_REQUEST['del_ids']);
    }
}
function draw()
{
    $this->map = array();
    if(!isset($_REQUEST['SUB'])){
        $sql = "select * from SUBJECT " ;
        $sub = DB::fetch_all($sql);
        $this->map['sub'] = $sub;
        }
    
    $this->parse_layout('subject',$this->map);
}
}
?>