<form action="" method="post">
    Ca Hoc <input type='text' name="ca_id" id="ca_id"  />
    Mon    <input type='text' name="sub_name" id='sub_name'/>
    <input type="submit" value="Ok" />
    <table width="500px" border="2px" style="text-align: center;">
        <tr>
            <td><h3>Stu_Name</h3></td>
            <td><h3>Subject</h3></td>
            <td><h3>Time</h3></td>
        </tr>
    <!--LIST:search-->
        <tr>
            <td>[[|search.stu_name|]]</td>
            <td>[[|search.sub_name|]]</td>
            <td>[[|search.time|]]</td>
        </tr>
    <!--/LIST:search-->
</form>