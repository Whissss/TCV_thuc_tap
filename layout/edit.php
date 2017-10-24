<script>
/*
            ."<td>" ?> <select name="sub">[[|mh_option|]]</select>  < ?php echo "</td>" 
            ."<td>" ?>  <select name="ca_id"></select> < ?php echo "</td>"
            ."<td><a onclick='ok($r[id])'>OK</a></td> "
            ."<td><a href='http://newwaypms.ddns.net:8087/develop/?page=test_pt'>Cancle</a></td> "
*/

</script>
<table width="500px" border="2px" style="text-align: center;">
    <tr>
        <td><h3>Id</h3></td>
        <td><h3>Stu_Id</h3></td>
        <td><h3>Name</h3></td>
    </tr>
<!--LIST:stu-->
    <tr>
        <td>[[|stu.id|]]</td>
        <td>[[|stu.stu_id|]]</td>
        <td>[[|stu.stu_name|]]</td>
    </tr>
<!--/LIST:stu-->
    
</table>
<br clear='all'/>
<form method="post" action="">
<table width="500px" border="2px" style="text-align: center;">
<input type="hidden" id="add_ids" value="add_ids"/>
    <div>
        <span id="subject_all_elems">
        	<span>
                <span class="multi-input-header" style="width:111px;">Ca</span>
        		<span class="multi-input-header" style="width:230px;">Ten Mon</span>
        	    <span class="multi-input-header" style="width: 50px;">Xoa</span>
            </span>
            <br clear="all" style="text-align: center;" />
            
<script>
    jQuery(document).ready(function()
{
    var sv_info = <?php echo isset($_REQUEST['subject'])?String::array2js($_REQUEST['subject']):'{}';?>;
    mi_init_rows('subject',sv_info);
    console.log(sv_info);
})
</script>
	    </span>
    </div>
    <div><a href="javascript:void(0);" onclick="mi_add_new_row('subject');$('sub_name_'+input_count).focus();" class="button-medium-add">Them</a></div>
</table>
    <div><input name="submit" type="submit" id="submit" value="Luu Lai"/></div>
<br /><br /><br /><br />
</form>
<span style="display:none">
    <span id="subject_sample">
        <div id="input_group_#xxxx#">
            <span class="multi-input">
                <select name="subject[#xxxx#][ca_id]" id="ca_id_#xxxx#" style="width:115px;">[[|ca_opt|]]</select>
            </span>
            
            <span class="multi-input">
                <select name="subject[#xxxx#][sub]" style="width: 234px;" id="sub_#xxxx#">[[|mh_option|]]</select>
            </span>
            
                <!--IF:delete(User::can_delete(false,ANY_CATEGORY))-->
                <span class="multi-input">
                    <img tabindex="-1" src='packages/core/skins/default/images/buttons/delete.png'
onclick="if(Confirm('#xxxx#')){ mi_delete_row($('input_group_#xxxx#'),'subject','#xxxx#','');}" style="cursor: pointer;"/>
                </span>
                <!--/IF:delete-->
            </div><br clear='all'/>
    </span>
</span>
