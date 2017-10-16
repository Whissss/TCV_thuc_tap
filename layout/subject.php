<script>
    function xoa(id){
        if(confirm("Ban co muon xoa khong ?")){
            jQuery('#del_ids').val(id);
            TestPt.submit();
        }
    }
</script>
<h1>Day la Form Subject</h1>
<form method="post" action="" id="TestPt">
Ma Mon Hoc  <input  name="sub_id" required="required"/>
Ten Mon Hoc <input  name="sub_name" required="required"/>
<input type="submit" value="Nhap"/><br/>
<input name="del_ids" type="hidden" id="del_ids" />
<table width="500px" border="2px" style="text-align: center;">  
<tr>
    <td><h3>Id</h3></td>
    <td><h3>Sub_Id</h3></td>
    <td><h3>Subject</h3></td>
    <td><h3>Delete</h3></td>
    <td><h3>Edit</h3></td>
</tr>
<!--LIST:sub-->
    <tr>
        <td>[[|sub.id|]]</td>
        <td>[[|sub.sub_id|]]</td>
        <td>[[|sub.sub_name|]]</td>
        <td><img src='packages/core/skins/default/images/buttons/delete.png' onclick='xoa([[|sub.sub_id|]])'/>
        <td><img src='packages/core/skins/default/images/buttons/edit.png' onclick='sua()'/></td>
    </tr>
<!--/LIST:sub-->
</table>
</form>