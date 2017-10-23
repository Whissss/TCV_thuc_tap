<style>
table,tr,td{
        border: 1px solid;
    }
td{
    height: 25px;
}
td:hover{
        background-color:pink;
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
<table style="width:80%; text-align: center; margin: auto;">
    <tr id="hello">
        <td rowspan="2" id="head"><strong>[[.id.]]</strong></td>
        <td rowspan="2" id="head"><strong >[[.regency.]]<strong></td>
        <td colspan="7" id="head"><strong >[[.coefficient.]]<strong></td>
    </tr>
    <tr style="text-align: center;">
            [[|ranges|]]
    </tr>
    <?php $i=1; ?>
    <!--LIST:regency-->
    <tr>
        <td style="width: 40px;" id="head"><?php echo $i++; ?></td>
        <td><strong>[[|regency.name|]]</strong></td>
        <!--LIST:regency.child-->
        <td>[[|regency.child.salary_coefficients|]]</td>
        <!--/LIST:regency.child-->
    </tr>
    <!--/LIST:regency-->
</table><br /><br /><br /><br /><br />