<style>
td{
    height: 25px;
}
td:hover{
        background-color: #c4c4c4;
    }
#head:hover
{
    background-color:#FFFFFF;
}
#search
{
   float: right;
   margin-right: 135px;
   background: #009688;
   height: 35px;
   width: 90px;
   margin-top: -15px;
   font: normal normal normal 14px/1 FontAwesome ;
   font-size: inherit;
   display :inline-block;
   color: white;
}
table tr
{
    border: 1px #009688;
}
</style>
<div style="text-align: center; float:left;margin-top: -45px;">CÔNG TY TNHH PTDL QUỐC TẾ PHƯỢNG HOÀNG<br/>	
Đồi Pháo Thủ - Khu 6 - Phường Đáp Cầu - TP Bắc Ninh<br />	
*************
            </div>
            <div style="text-align: center; padding-right: 15px; ; float: right; margin-top: -45px;">
            CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br />
            Độc lập - Tự do - Hạnh phúc<br />
            ......oOo......
            </div>

             <div style="text-align: center;margin-top: 80px;">
                <h2>Lịch Sử Thay Đổi Khung Lương</h2>								
            </div>

<br /><br /><br />
<form action="" method="post">
<div style="float: right; margin-right: 40px;" class="ui-widget">
    [[.department.]]
    <input name="department" type="text" id="department" onfocus="Autocomplate_Department()" autofocus="" autocomplete="off"/>
    <input name="hrm_department_id" type="hidden" id="hrm_department_id" />
    &nbsp;&nbsp;&nbsp;&nbsp;
    [[.regency.]]
    <input name="regency" type="text" id="regency" onfocus="Autocomplate()" autocomplete="off" />
    <input name="hrm_regency_id" type="hidden" id="hrm_regency_id" />
    &nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input name="search" type="submit" id="search" value="[[.search.]]" style="float: right; margin-right: 135px;"/>
</div>
<br /><br /><br />
</form>
<table style="width:80%; text-align: center; margin: auto;" border="1">
    <tr>
        <input name="edit_ids" type="hidden" id="edit_ids"/>
        <td rowspan="2" id="head"><strong>[[.id.]]</strong></td>
        <td rowspan="2" id="head"><strong >[[.department.]]<strong></td>
        <td rowspan="2" id="head"><strong >[[.regency.]]<strong></td>
        <td colspan="1" id="head"><strong >[[.wage.]]<strong></td>
        <td rowspan="2" id="head"><strong >[[.user_change.]]<strong></td>
        <td rowspan="2" id="head"><strong >[[.timechange.]]<strong></td>
    </tr>
    <tr style="text-align: center;">
            <td id="head">[[.wagebracket.]](vnđ)</td>
    </tr><?php $i=1; ?>
    <!--LIST:history-->
        <td colspan="9" style="background-color:#c4c4c4;"></td>
        <tr>
            <td style="width: 40px;" id="head" <?php 
            $sql = DB::fetch_all("
                        SELECT 
                            COUNT(id) as id
                        FROM
                            hrm_history_wage
                        WHERE
                            hrm_department_id=".[[=history.id=]]."
            ") ;
            foreach($sql as $key=>$value)
            {
                echo "rowspan=".($value['id']+1);
            }
        ?> ><?php echo $i++; ?></td>
            <td id="head" style="text-align: center; border-bottom-style: dotted; text-align: left; padding-left: 50px;" <?php 
            $sql = DB::fetch_all("
                        SELECT 
                            COUNT(id) as id
                        FROM
                            hrm_history_wage
                        WHERE
                            hrm_department_id=".[[=history.id=]]."
            ") ;
            foreach($sql as $key=>$value)
            {
                echo "rowspan=".($value['id']+1);
            }
        ?> ><strong>[[|history.name|]]</strong></td>
        <!--LIST:history.child-->
            <tr>
                <td style="text-align: center; border-bottom-style: dotted; text-align: left; padding-left: 50px;" id="head"><strong>[[|history.child.regency_name|]]</strong></td>
                <td style="text-align: center; border-bottom-style: dotted; padding-right: 20px; text-align: right;">[[|history.child.wage_bracket|]]</td>
                <td style="text-align: center; border-bottom-style: dotted;">[[|history.child.user_change|]]</td>
                <td style="text-align: center; border-bottom-style: dotted;">[[|history.child.time|]]</td>
            </tr>
        <!--/LIST:history.child-->
        </tr>
    <!--/LIST:history-->
</table><br /><br />

<br /><br /><br /><br />
<div style="text-align: center; margin-left: 800px; font:14px arial"><i>Bắc Ninh, Ngày 10 tháng 01 năm 2017</i></div>
<br /><br />
<div  style="text-align: center; margin-left: 780px;">CÔNG TY  TNHH PTDL QUỐC TẾ PHƯỢNG HOÀNG<br /><span style="font:14px arital"> TỔNG GIÁM ĐỐC </span>						
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
</div>
<script>
function Autocomplate()
{
    jQuery( "#regency" ).autocomplete({
          url: 'ajax_search_salary.php?LoadRegency=1',
          onItemSelect: function(item){
              document.getElementById('hrm_regency_id').value = item.data[0];
          }
    });
    document.getElementById('hrm_regency_id').value = '';
}
function Autocomplate_Department()
{
    jQuery("#department").autocomplete({
        url: 'ajax_search_salary.php?LoadDepartment=1',
        onItemSelect: function(item){
             document.getElementById('hrm_department_id').value = item.data[0];
          }
    });
    document.getElementById('hrm_department_id').value = '';
}
</script>