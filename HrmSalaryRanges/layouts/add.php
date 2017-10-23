<form  method="post" action="" id="h">
<table width="500px" border="2px" style="text-align: center;">
    <div>
        <input name="deleted_ids" id="deleted_ids" type="hidden" value="<?php echo URL::get('deleted_ids');?>"/>
        <span id="regency_all_elems">
        	<span>
                <span class="multi-input-header" style="width:50px;">id</span>
        		<span class="multi-input-header" style="width:110px;">[[.ranges.]]</span>
                <span class="multi-input-header" style="width:110px;">[[.coeficient.]]</span>
        	    <span class="multi-input-header" style="width: 50px;">Xoa</span>
            </span>
            <br clear="all" />
	    </span>
    </div>
<div><a href="javascript:void(0);" onclick="mi_add_new_row('regency');" class="button-medium-add">Them</a></div>
</table>
<div><input name="save" type="button" id="save" onclick="CheckRanges()" value="[[.save.]]"/></div>
<br /><br /><br /><br />
</form>
<span style="display:none">
    <span id="regency_sample">
        <div id="input_group_#xxxx#">
            <span class="multi-input">
                <input name="regency[#xxxx#][id]" type="text" readonly="" id="id_#xxxx#"  tabindex="-1" style="width:50px;background:#EFEFEF;"/>
            </span>
            <span class="multi-input">
                <select name="regency[#xxxx#][salary_id]" id="hrm_salary_ranges_id_#xxxx#" style="width:115px;">[[|ranges|]]</select>
            </span>
            <span class="multi-input">
                <input name="regency[#xxxx#][coefficients]" style="width: 110px;" id="salary_coefficients_#xxxx#"/>
            </span>
                <!--IF:delete(User::can_delete(false,ANY_CATEGORY))-->
            <span class="multi-input">
<img tabindex="-1" src='packages/core/skins/default/images/buttons/delete.png' onClick="if(Confirm('#xxxx#')){mi_delete_row($('input_group_#xxxx#'),'regency','#xxxx#',''); }" style="cursor: pointer;"/>
            </span>
                <!--/IF:delete-->
        </div><br clear='all'/>
    </span> 
</span>
<script>
var ranges_info = <?php echo isset($_REQUEST['regency'])?String::array2js($_REQUEST['regency']):'{}';?>;
mi_init_rows('regency',ranges_info);
console.log(ranges_info);

jQuery("document").ready(function(){
    jQuery("div[id^=input_group_]").each(function(){
            var current_id = jQuery(this).find("span:first-child input").val();
            var current_id = current_id.substr(1,current_id.length);
            jQuery(this).find("span:first-child input").val(current_id);
    });
});

function Confirm(index)
{
    var ranges_name = jQuery('#hrm_salary_ranges_id_'+index).val();
    return confirm('bạn có muốn xóa '+ranges_name+'?');
}
function CheckRanges()
{
    $check = true;
    var salary_ranges = <?php echo String::array2js([[=salary_ranges=]]); ?>;
    for(var i = 100; i <= input_count; i++)
    {
        if(jQuery('#hrm_salary_ranges_id_'+i).val() != undefined)
        {
            if(salary_ranges[jQuery('#hrm_salary_ranges_id_'+i).val()])
            {
                delete salary_ranges[jQuery('#hrm_salary_ranges_id_'+i).val()];           
            }else
            {
                $check=false;
            }         
        }
    }
    if($check==false)
    {
        alert("Không Thể Nhập Trùng Bậc Lương Hoặc Không Chọn Bậc Lương!!!");
        return false;
    }else
    {
        h.submit();
    }
}
</script>