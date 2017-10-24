<style>
    table tr td {
        background: #ffffff;
        transition: all 0.5s ease-out;
    }
</style>
<form action="" method="post" style="text-align: center;">
    <table style="width: 450px;height:100px; margin: 0px auto; border: 3px solid #EEEEEE; box-shadow: 5px 5px 5px #CCCCCC;" cellpadding="5" cellspacing="5">
        <tbody>
            <tr>
                <td>
                    [[.regency.]] : 
                    <span>
                        <select name="regency_id" id="regency_id" style="width:115px; ">[[|regency|]]</select>
                    </span>
                </td>
            </tr>
            <tr>
                <td style="float: left;">
                    <input type="submit" style="width: 105px;" value="Đồng Ý" formtarget="_blank"/>
                </td>
                <td style="float: right;">
                    <input type="button" onclick="view()" style="width: 105px;" value="Xem Danh Sách" formtarget="_blank"/>
                </td>
            </tr>
        </tbody>
    </table>
</form>
<script>
function view()
{
    window.open("http://newwaypms.ddns.net:8087/develop/?page=hrm_salary_ranges&cmd=view",'_blank');   
}
</script>