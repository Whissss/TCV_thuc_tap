<script>
    function xoa(id)
    {
        if(confirm("Ban co muon xoa khong")==true)
        {
            jQuery('#del_id').val(id);
            h.submit();
        }
    }
</script>
<form method='post' action="" id="h">
    Ca Hoc <input  name="ca" required="required"/>
    Mo Ta <input  name="mt" required="required"/>
    <input type="hidden" id="del_id" name="del_id" />
    <input type="submit" value="Nhap"/><br/>
<table width="500px" border="2px" style="text-align: center;">  
    <tr>
        <td><h3>Id</h3></td>
        <td><h3>Ca</h3></td>
        <td><h3>M� ta</h3></td>
        <td><h3>Xoa</h3></td>
    </tr>
<?php
    foreach($_REQUEST['c'] as $r )
    {  echo  
          "<tr>"
          ."<td>$r[id]</td>"
          ."<td>$r[ca]</td>" 
          ."<td>$r[mo_ta]</td>"
          ."<td><img src='packages/core/skins/default/images/buttons/delete.png' onclick='xoa($r[id])'>"
          ."</tr>" ;
    }
?>
</table>
</form>
