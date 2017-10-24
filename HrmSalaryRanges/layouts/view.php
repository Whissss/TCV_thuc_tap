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
</style>
<script>
/*
   line:47 <td colspan="<!--LIST:ranges_count-->[[|ranges_count.id|]]<!--/LIST:ranges_count-->">[[.coefficient.]]</td>   
*/

</script>

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
<table style="width:80%; text-align: center; margin: auto;" border="1">
    <tr id="hello">
        <input name="edit_ids" type="hidden" id="edit_ids"/>
        <td rowspan="2" id="head"><strong>[[.id.]]</strong></td>
        <td rowspan="2" id="head"><strong >[[.regency.]]<strong></td>
        <td colspan="9" id="head"><strong >[[.coefficient.]]/[[.salary_ranges.]]<strong></td>
        <td rowspan="2" id="head"><strong >[[.edit.]]<strong></td>
    </tr>
    <tr style="text-align: center;">
            [[|ranges|]]
    </tr>
    <?php $i=1; ?>
    <!--LIST:regency-->
    <tr>
        <td style="width: 40px;" id="head" rowspan="2"><?php echo $i++; ?></td>
        <td colspan="11" style="text-align: left; border-bottom-style: dotted;"><strong>[[|regency.name|]]</strong></td>
    </tr>
    <tr>
        <td>- Hệ số</td>
        <!--LIST:regency.child-->
        <td style="border-top: hidden;">[[|regency.child.salary_coefficients|]]</td>
        <!--/LIST:regency.child-->
        <td><img src="packages/core/skins/default/images/buttons/edit.png" onclick="edit([[|regency.id|]])"/></td>
    </tr>
    <!--/LIST:regency-->
    
</table><br /><br />
<div style="font-size: 14px; margin-left: 145px; font:14px arial;">
Công ty TNHH phát triển du lịch quốc tế Phượng Hoàng áp dụng mức lương tối thiểu vùng là <b style="font-size: 15px;">3.320.000đ/tháng</b>. Khi Nhà nước có sự thay đổi mức lương tối thiểu vùng<br/> Doanh nghiệp 
<span style="font-size: 14px;">sẽ điều chỉnh cho phù hợp.								
Mức lương = hệ số  x  Mức lương tối thiểu vùng x 7% .</span>
</div>
<br /><br /><br /><br />
<div style="text-align: center; margin-left: 800px; font:14px arial"><i>Bắc Ninh, Ngày 10 tháng 01 năm 2017</i></div>
<br /><br />
<div  style="text-align: center; margin-left: 780px;">CÔNG TY  TNHH PTDL QUỐC TẾ PHƯỢNG HOÀNG<br /><span style="font:14px arital"> TỔNG GIÁM ĐỐC </span>						
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
</div>

</form>
<script>
    function edit(id)
    {
       window.location="http://newwaypms.ddns.net:8087/develop/?page=hrm_salary_ranges&cmd=add&id="+id; 
    }
</script>