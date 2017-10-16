<form method='post' action="" id="g">
    <input type="hidden" id="del_id" name="del_id" />
    <input type="submit" value="Nhap"/><br/>
<table width="500px" border="2px" style="text-align: center;">  
    <tr>
        <td><h3>Id</h3></td>
        <td><h3>Stu_ID</h3></td>
        <td><h3>Sub_ID</h3></td>
        <td><h3>Ca</h3></td>
        <td><h3>Xoa</h3></td>
    </tr> 
        <!--LIST:hs-->
            <tr>
                <td>[[|hs.id|]]</td>
                <td>[[|hs.stu_id|]]</td>
                <td>[[|hs.sub_id|]]</td>
                <td>[[|hs.time|]]</td>
                <td><img src='packages/core/skins/default/images/buttons/delete.png' onclick='xoa([[|hs.id|]])'/> </td>
            </tr>
        <!--/LIST:hs--> 
</table>
</form>