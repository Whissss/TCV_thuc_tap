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
                <h2>BẢN ĐĂNG KÝ THANG LƯƠNG, BẢNG LƯƠNG</h2> 							
                (Ban hành kèm theo Công văn số 02/CV-PH)								
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
        <td rowspan="2" style="width: 450px;" id="head"><strong >[[.department.]]/[[.regency.]]<strong></td>
        <td colspan="9" id="head"><strong >[[.salary_ranges.]]/[[.coefficient.]]<strong></td>
        <td rowspan="2" id="head"><strong >[[.edit.]]<strong></td>
    </tr>
    <tr style="text-align: center;">
            [[|ranges|]]
    </tr><?php $i=1;?>
    <!--LIST:department_manager-->
        <tr>
            <td rowspan="4" style="width: 80px;" id="head" ><?php echo $i++; ?></td>
            <td colspan="11" style="text-align: left; border-bottom-style: dotted; background: #c4c4c4; padding-left: 10px;" ><strong>[[|department_manager.name|]]</strong></td>
        </tr>
            <!--LIST:department_manager.regencry-->
        <tr>
                <td style="text-align: left; padding-left:50px;" id="head">[[|department_manager.regencry.name|]]</td>
            <!--LIST:department_manager.regencry.child-->
                <td >[[|department_manager.regencry.child.salary_coefficients|]]</td>
            <!--/LIST:department_manager.regencry.child-->
                <td><img src='packages/core/skins/default/images/edit-button-new.png' onclick="search_manager([[|department_manager.regencry.id|]],[[|department_manager.id|]])"/></td>
        </tr>
        <!--/LIST:department_manager.regencry-->
    <!--/LIST:department_manager-->
    <!--LIST:department-->
        <tr>
            <td style="width: 40px;" id="head" <?php 
                if(isset($_REQUEST['row']))
                {
                    echo "rowspan=2" ;
                }else{
                    $sql = DB::fetch_all("
                                SELECT
                                    count(id) as id
                                FROM
                                    hrm_regency
            ");
                foreach($sql as $key=>$value)
            {
                $a = $value['id'];
            }
                    echo "rowspan=".($a-2) ;
                }
            ?>><?php echo $i++; ?></td>
            <td colspan="11" style="text-align: left; border-bottom-style: dotted; background: #c4c4c4; padding-left: 10px;"><strong>[[|department.name|]]</strong></td>
        </tr>
        <!--LIST:department.regencry-->
        <tr>
            <td style="text-align: left; padding-left: 50px;" id="head">[[|department.regencry.name|]]</td>
            <!--LIST:department.regencry.child-->
            <td>[[|department.regencry.child.salary_coefficients|]]</td>
            <!--/LIST:department.regencry.child-->
            <td><img src='packages/core/skins/default/images/edit-button-new.png' onclick="search_department([[|department.id|]],[[|department.regencry.id|]])"/></td>
        </tr>
        <!--/LIST:department.regencry-->
    <!--/LIST:department-->
   

    
</table><br /><br />
<div style="font-size: 14px; margin-left: 189px; font:14px arial;">
Công ty TNHH phát triển du lịch quốc tế Phượng Hoàng áp dụng mức lương tối thiểu vùng là <b style="font-size: 15px;">3.320.000đ/tháng</b>. Khi Nhà nước có sự thay đổi mức lương tối thiểu vùng<br/> Doanh nghiệp 
<span style="font-size: 14px;">sẽ điều chỉnh cho phù hợp.								
Mức lương = hệ số  x  Mức lương tối thiểu vùng x 7% .</span>
</div>
<br /><br /><br /><br />
<div style="text-align: center; margin-left: 800px; font:14px arial"><i>Bắc Ninh, Ngày&nbsp;&nbsp;&nbsp;&nbsp;tháng&nbsp;&nbsp;&nbsp;&nbsp;năm 20</i></div>
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
<script>
    function search_department(x,y)
    {
        window.open("http://newwaypms.ddns.net:8087/develop/?page=hrm_salary_ranges&cmd=add&id_reg="+y+"&id_dep="+x,'_blank');
    }
    function search_manager(x,y)
    {
        window.open("http://newwaypms.ddns.net:8087/develop/?page=hrm_salary_ranges&cmd=add&id_reg="+x+"&id_dep="+y,'_blank');
    }
</script>