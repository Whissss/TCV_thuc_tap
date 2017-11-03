<style>
    table tr td {
        background: #ffffff;
        transition: all 0.5s ease-out;
    }
</style>

<form action="" method="post" style="text-align: center;" id="h">
    <table style="width: 450px;height:100px; margin: 0px auto; border: 3px solid #EEEEEE; box-shadow: 5px 5px 5px #CCCCCC;" cellpadding="5" cellspacing="5">
        <tbody>
            <tr>
                <td><h3>[[.wagebracket.]]</h3></td>
            </tr>
            <tr>
                <td><strong style="margin-top: -15px;">[[.department.]]</strong> :
                <!--LIST:department_name-->
                    [[|department_name.name|]]
                <!--/LIST:department_name-->
                <br/>
                <br/>
                <strong style="margin-top: -25px;">[[.regency.]]</strong> :
                 <!--LIST:regency_name-->
                    [[|regency_name.name|]]
                <!--/LIST:regency_name-->
                </td>
            </tr>
            <tr>
                <td>
                <!--LIST:wage-->
                    <input name="wage" type="text" onkeypress=" return isNumberKey(event)"
                     id="wage" onkeyup="formatInt(this)" maxlength="15" value="[[|wage.wage_bracket|]]"/>
                     <input name="wage_id" type="hidden" id="wage_id" value="[[|wage.id|]]"/>
                <!--/LIST:wage-->
                    <div id="hide" style="background-color: #FF9900;"></div>
                </td>
            </tr>
            <tr>
                <td><input type="button" onclick="Save()" id="save" value="[[.edit.]]" style="float: left;"/></td>
            </tr>
            <tr><td><input type="button" onclick="Back()" id="back" value="[[.home.]]" style="float: right; margin-top: -28px;"/></td></tr>
        </tbody>
    </table>
</form>
 <script>
function isNumberKey(evt)
{
       var charCode = (evt.which) ? evt.which : event.keyCode;
       if(charCode == 59 || charCode == 46 || charCode==44)
       {
            return true;
       }
       if (charCode > 31 && (charCode < 48 || charCode > 57))
       {
            document.getElementById('hide').innerHTML = "Chỉ Được Nhập Số";
            return false;
       }
       return true;
}
function Save()
{
        h.submit();
       jQuery('#save').hide();
}
function Back()
{
    window.location="http://newwaypms.ddns.net:8087/develop/?page=hrm_wage_bracket";
}
 </script>
 <script>
function formatInt ( change_number ) 
{ var separator = ","; var int = change_number.value.replace ( new RegExp ( separator, "g" ), "" ); var regexp = new RegExp ( "\\B(\\d{3})(" + separator + "|$)" ); do { int = int.replace ( regexp, separator + "$1" ); } while ( int.search ( regexp ) >= 0 ) change_number.value = int; }
</script>