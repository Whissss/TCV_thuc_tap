<?php 
class HrmSalaryRanges extends Module
{
    function HrmSalaryRanges($row){
        Module::Module($row);
        if(User::can_view(false,ANY_CATEGORY)){
           if(User::can_view(false,ANY_CATEGORY)){
               switch(Url::get('cmd'))
        {
           case 'add':
                require_once 'forms/add.php';
                require_once 'packages/hotel/includes/php/hotel.php';
                $this->add_form(new salaryrangesForm());
           break ;
           case 'view':
                require_once 'forms/view.php';
                require_once 'packages/hotel/includes/php/hotel.php';
                $this->add_form(new ViewForm());
           break ;
           default:
                require_once 'forms/report.php';
                require_once 'packages/hotel/includes/php/hotel.php';
                $this->add_form(new HrmSalaryRangesForm());
           break;
        }
}
    }
    else
    {
	    URL::access_denied();
	}
    }
}
?>