<?php 
class HrmWageBracket extends Module
{
    function HrmWageBracket($row){
        Module::Module($row);
        if(User::can_view(false,ANY_CATEGORY)){
           if(User::can_view(false,ANY_CATEGORY)){
               switch(Url::get('cmd'))
        {
           case 'add':
                require_once 'forms/add.php';
                require_once 'packages/hotel/includes/php/hotel.php';
                $this->add_form(new WageBracketForm());
           break ;
           case 'view':
                require_once 'forms/view.php';
                require_once 'packages/hotel/includes/php/hotel.php';
                $this->add_form(new ViewForm());
           break ;
           case 'history':
                require_once 'forms/history_wage.php';
                require_once 'packages/hotel/includes/php/hotel.php';
                $this->add_form(new HistoryForm());
           break ;
           default:
                require_once 'forms/view.php';
                require_once 'packages/hotel/includes/php/hotel.php';
                $this->add_form(new ViewForm());
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