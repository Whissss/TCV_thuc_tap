<table cellpadding="2" cellspacing="0" width="98%">
<tr>
    <!--IF:first_page([[=page_no=]]==1)-->
    <td></td>
	<td align="center">
		<table border="0" cellSpacing=0 width="100%" style="font-size:12px;">
				
			<tr>
                <td align="left">
			  	Khách sạn:<strong><?php echo HOTEL_NAME;?></strong><br />
                <p><strong>Phòng Kinh Doanh</strong></p>
			  </td>
				<td align="center">
		          <font style="font-size:18px;" class="report_title">BÁO CÁO KHÁCH HÀNG</font><br />
				  <span>Đến Ngày: <?php echo Url::get('date'); ?></span>
				
				</td>
                <td align="right">Đối tượng: tất cả
                <br />
                [[.date_print.]]:<?php echo ' '.date('d/m/Y H:i');?>
                <br />
                [[.user_print.]]:<?php echo ' '.User::id();?>
                </td>
			</tr>
		</table>
		<br />
        </td>
        </tr>
        </table>
  
