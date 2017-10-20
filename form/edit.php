<?php 
class editForm extends Form
{
    function editForm()
    {
        Form::Form('editForm');
        $this->link_js('packages/core/includes/js/multi_items.js');
    }
    function on_submit()
    {
        
        if(isset($_REQUEST['id']))
        {
            $subject = $_REQUEST['subject'];
            foreach($subject as $key => $value)
            {
                $sql = array(
                    'stu_id' => $_REQUEST['id'] ,
                    'time'   => $value['ca_id'],
                    'sub_id' => $value['sub'] 
                );
                if($value['id'])
                {
                    DB::update('SV',$sql, 'id='.$value['id']);
                }else
                {
                    DB::insert('SV',$sql);
                }
            }            
        }
       $id_1 = URL::get('id');
       Url::redirect_url('?page=test_pt&p=edit&id='.$id_1);
    }
    function draw()
    {
        $this->map = array();
        /* $this->map['ca_id_list'] = array(
                                    '1' => 'ca 1',
                                    '2' => 'ca 2'
        ); 
        */
        
       $sv = DB::fetch_all(
                        'select 
                            id,
                            time as ca_id,
                            sub_id  as sub
                        from 
                            SV 
                        where stu_id='.Url::get('id')
       );
       if(isset($_REQUEST['subject'])){
            $_REQUEST['subject'] = $_REQUEST['subject'];
       }else{
            $_REQUEST['subject'] = $sv;
       }
       
       $id = URL::get('id') ;
       $sql = "select * from STUDENT where id=".$id ;
       $stu = DB::fetch_all($sql);
       $this->map['stu'] = $stu ;
       
       $ca = DB::fetch_all('SELECT * FROM ca_hoc');
       $ca_opt = '<option value="">'.Portal::language('select').'</option>';
       foreach($ca as $key1 => $value1)
        {
            $ca_opt .= '<option value="'.$value1['id'].'">'.$value1['ca'].'</option>'; 
        }
        
        $mh = DB::fetch_all('SELECT id,sub_name FROM subject ORDER BY id ASC');
        $mh_option = '<option value="">'.Portal::language('select_name').'</option>';
        foreach($mh as $key => $value)
        {
            $mh_option .= '<option value="'.$value['id'].'">'.$value['sub_name'].'</option>';            
        }
        $this->map["ca_opt"] = $ca_opt ;
        $this->map["mh_option"] = $mh_option ;
        $this->parse_layout('edit',$this->map) ;
    }
}
?>