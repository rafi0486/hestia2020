
<?php
// Multiple recipients
include './../dbconnect.php';
if(isset($_GET['email']))
{
    $email=$_GET['email'];
    
      $sql = 'SELECT phone,hashcode,fullname FROM users where email='."'".$email."'";
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               $qrurl=$row["hashcode"];
               $name=$row["fullname"];
               $phone=$row["phone"];
            }
         } else {
            exit("invalid Mrequest");
         }
    
   // $qrurl="boo";
   // $name="Muhammed Shahr";
   // $phone="1122333";

}
else
    exit("modded Mrequest");
$to = $email; // note the comma

// Subject
$subject = 'Your Details: Hestia\'20';

// Message
$message = '
<div style="background:#f3f3f3;margin:0;padding:0">
<div  style="background-color:#f3f3f3">

<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" border="0">
<tbody>
<tr>
<td style="border-collapse:collapse">
<div style="margin:0px auto;max-width:600px">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
<tbody>
	<tr>
		<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;border-collapse:collapse">

			<div style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
				<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
					<tbody>
						<tr>
							<td style="word-wrap:break-word;font-size:0px;border-collapse:collapse">
								<div style="font-size:1px;line-height:10px;white-space:nowrap">&nbsp;</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		</td>
	</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>





<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" border="0">
<tbody>
<tr>
<td style="border-collapse:collapse">
<div style="margin:0px auto;max-width:600px">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
<tbody>
	<tr>
		<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 0px 0px 0px;border-collapse:collapse">

			<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
				<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
					<tbody>
						<tr>
							<td style="word-wrap:break-word;font-size:0px;padding:0px 0px 0px 0px;border-collapse:collapse" align="center">
								<table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px" align="center" border="0">
									<tbody>
																											<tr>
											<td style="width:600px;border-collapse:collapse">
												<img alt="" title="" height="auto" src="https://www.hestia.live/payment/mail/images/logo-cover.jpg" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;line-height:100%" width="600" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 731px; top: 238px;"><div id=":s9" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>
											</td>
										</tr>
																										 </tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		</td>
	</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>


<div style="margin:0px auto;max-width:600px;background:#ffffff">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;border-collapse:collapse" align="center" border="0">
<tbody>
<tr>
<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:10px;border-collapse:collapse">

<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
	<tbody>
		<tr>
			<td style="border-collapse:collapse">
				<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
					<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
						<tbody>
							<tr>
								<td style="word-wrap:break-word;font-size:0px;padding:0px 0px 0px 0px;border-collapse:collapse" align="center">
									<div style="color:#353535;font-family:Roboto,Tahoma,sans-serif;font-size:11px;line-height:22px;text-align:center">
										<p style="display:block;margin:13px 0">
											<span>
												<strong>
													<span style="font-size:16px;text-transform:uppercase">WELCOME TO HESTIA 20</span>
												</strong>
											</span>
										</p>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</td>

		</tr>

	</tbody>
</table>
</div>

</td>
</tr>
</tbody>
</table>
</div>
<div style="margin:0px auto;max-width:600px;background:#ffffff">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;border-collapse:collapse" align="center" border="0">
<tbody>
<tr>
<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;border-collapse:collapse">

<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
	<tbody>
		<tr>
			<td style="word-wrap:break-word;font-size:0px;padding:0px 25px;border-collapse:collapse" align="left">
				<div style="color:#353535;font-family:Roboto,Tahoma,sans-serif;font-size:11px;line-height:22px;text-align:left">
					<br>
					<div style="font-family:Roboto,Tahoma,sans-serif;display:inline-flex;padding:5px 0px">
						<div>
							<img style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:20px;margin-right:15px;;height:auto;line-height:100%"  src="https://www.hestia.live/payment/mail/images/placeholder.png" class="CToWUd">
						</div>
						<div>
							<span style="font-size:13px;color:#353535">TKM College of Engineering,
Karicode,
Kollam-691005,
Kerala, India</span>
						</div>
					</div><br>
					<div style="font-family:Roboto,Tahoma,sans-serif;display:inline-flex;padding:5px 0px">
						<div>
							<img style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:20px;margin-right:15px;;height:auto;line-height:100%"  src="https://www.hestia.live/payment/mail/images/user.png" class="CToWUd">
						</div>
						<div>
							<span style="font-size:13px;color:#353535">Organized by TKM College of Engineering, Kollam</span>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</tbody>
</table>
</div>

</td>
</tr>
</tbody>
</table>
</div>




<div style="margin:0px auto;max-width:600px;background:#ffffff">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;border-collapse:collapse" align="center" border="0">
<tbody>
<tr>
<td style="word-wrap:break-word;font-size:0px;padding:10px 0px;border-collapse:collapse">
<p style="font-size:1px;margin:0px auto;border-top:1px solid #f1f1f1;width:100%;display:block"></p>

</td>
</tr>
</tbody>
</table>
</div>


<div style="margin:0px auto;max-width:600px;background:#ffffff">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;border-collapse:collapse" align="center" border="0">
<tbody>
<tr>
<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 0px 0px 0px;border-collapse:collapse">

<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
	<tbody>
		<tr>
			<td style="word-wrap:break-word;font-size:0px;padding:0px 25px;border-collapse:collapse" align="left">
				<div style="color:#353535;font-family:Roboto,Tahoma,sans-serif;font-size:11px;line-height:22px;text-align:left">
					<p style="display:block;margin:13px 0">
						<span style="font-size:16px">
							Hello '.$name.',
						</span>
					</p>
				</div>
			</td>
		</tr>
	</tbody>
</table>
</div>

</td>
</tr>
</tbody>
</table>
</div>


<div style="margin:0px auto;max-width:600px;background:#ffffff">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;border-collapse:collapse" align="center" border="0">
<tbody>
<tr>
<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 0px 0px 0px;border-collapse:collapse">

<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
	<tbody>
		<tr>
			<td style="word-wrap:break-word;font-size:0px;padding:0px 0px 0px 0px;border-collapse:collapse" align="center">
				<div style="color:#353535;font-family:Roboto,Tahoma,sans-serif;font-size:11px;line-height:22px;text-align:center">
					<p style="display:block;margin:13px 0">
						<span style="color:#402143">
							<strong>
																							<span style="font-size:22px">Your Registration is Successful!</span>
																						</strong>
						</span>
					</p>
				</div>
			</td>
		</tr>
	</tbody>
</table>
</div>

</td>
</tr>
</tbody>
</table>
</div>


<div style="margin:0px auto;max-width:600px;background:#ffffff">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;border-collapse:collapse" align="center" border="0">
<tbody>
<tr>
<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;border-collapse:collapse">

<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
	<tbody>
		<tr>
			<td style="word-wrap:break-word;font-size:0px;padding:0px 0px 0px 0px;border-collapse:collapse" align="center">
				<table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px" align="center" border="0">
					<tbody>
						<tr>
							<td style="width:120px;border-collapse:collapse">
								<img title="" height="auto" src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data='.$qrurl.'" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;line-height:100%" width="120" class="CToWUd">
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
</div>

</td>
</tr>
</tbody>
</table>
</div>


<div style="margin:0px auto;max-width:600px;background:#ffffff">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;border-collapse:collapse" align="center" border="0">
<tbody>
<tr>
<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 0px 0px 0px;border-collapse:collapse">


</td>
</tr>
</tbody>
</table>
</div>


<div style="margin:0px auto;max-width:600px;background:#ffffff">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;border-collapse:collapse" align="center" border="0">
<tbody>
<tr>
<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 0px 0px 0px;border-collapse:collapse">

<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
</div>

</td>
</tr>
</tbody>
</table>
</div>


<div style="margin:0px auto;max-width:600px;background:#ffffff">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;border-collapse:collapse" align="center" border="0">
<tbody>
<tr>
<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;border-collapse:collapse">

<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
	<tbody>
		<tr>
			<td style="word-wrap:break-word;font-size:0px;padding:0px 33px;border-collapse:collapse" align="left">
				<div style="color:#757575;font-family:Roboto,Ubuntu,Helvetica,Arial,sans-serif;font-size:11px;line-height:22px;text-align:left">
					<label>
																				<!--	<span style="font-size:11px">Registered on</span> &nbsp; !-->

						<span style="font-size:13px">Show the QR code to check in to events during Hestia</span>
							<br>
							<span  style="font-size:12px ; color:red;">
								Note: This is an automatic mail send to all users signing up to the Hestia20 website for the first time. This is not an event registration mail.
							</span>
							<br>
							<span style="font-size:12px">

							Head over to <a href="https://www.hestia.live">Hestia 20 website</a> to browse and register for events.							</span>

																											</label>

				</div>
			</td>
		</tr>
	</tbody>
</table>
</div>

</td>
</tr>
</tbody>
</table>
</div>
<div style="margin:0px auto;max-width:600px;background:#ffffff">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;border-collapse:collapse" align="center" border="0">
<tbody>
<tr>
<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;border-collapse:collapse">

<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
	<tbody>
		<tr>
			<td style="word-wrap:break-word;font-size:0px;padding:10px 25px;border-collapse:collapse" align="left">
				<div style="color:#353535;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:11px;line-height:22px;text-align:left">
					<p style="font-family:Roboto,Tahoma,sans-serif;display:block;margin:13px 0">
						<span style="font-size:14px">
							PROFILE DETAILS
						</span>
					</p>
					<div style="border:1px solid #f1f1f1;padding-left:20px">

						<p style="font-family:Roboto,Tahoma,sans-serif;display:block;margin:13px 0">
							<span style="font-size:15px">
																							<img style="height:17px;padding-right:15px;border:0;line-height:100%;outline:none;text-decoration:none" src="https://www.hestia.live/payment/mail/images/user.png" class="CToWUd">'.$name.'</span>
																					</p>
						<p style="font-family:Roboto,Tahoma,sans-serif;display:block;margin:13px 0">
							<a style="color:#1155cc">
								<span style="font-size:14px">
									<img style="height:17px;padding-right:15px;border:0;line-height:100%;outline:none;text-decoration:none" src="https://www.hestia.live/payment/mail/images/email.png" class="CToWUd">'.$email.'</span>
							</a>
						</p>
																					<p style="font-family:Roboto,Tahoma,sans-serif;display:block;margin:13px 0">
								<span style="font-size:14px;height:17px;padding-right:20px">
									<img style="height:17px;padding-right:15px;border:0;line-height:100%;outline:none;text-decoration:none" src="https://www.hestia.live/payment/mail/images/phone.png" class="CToWUd"> '.$phone.'</span>
							</p>
																			</div>
				</div>
			</td>
		</tr>
	</tbody>
</table>
</div>

</td>
</tr>
</tbody>
</table>
</div>




<div style="margin:0px auto;max-width:600px;background:#ffffff">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;border-collapse:collapse" align="center" border="0">
<tbody>
<tr>
<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;border-collapse:collapse">

<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
</div>

</td>
</tr>
</tbody>
</table>
</div>

<div style="margin:0px auto;max-width:600px;background:#402143">
<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#402143;border-collapse:collapse" align="center" border="0">
<tbody>
<tr>
<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 0px 0px 0px;border-collapse:collapse">

	<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
		<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
			<tbody>

				<tr>
					<td style="word-wrap:break-word;font-size:0px;padding:40px 20px 0px 20px;border-collapse:collapse" align="center">
						<div style="color:#353535;font-family:Roboto,Tahoma,sans-serif;font-size:11px;line-height:22px;text-align:center">
							<p style="display:block;margin:13px 0">
								<strong>
									<span style="font-size:18px;color:#ffffff">
																											  <span style="color:#ffffff">Once you register for events, go to the My-Events section of the website to view them. </span>
																		<br>	<a style="margin:8px 0" href="https://www.hestia.live/myevents"> Go to My Events</a> 							  </span><br><br>
								</strong>
							</p>
						</div>
					</td>
				</tr>
				
			</tbody>
		</table>
	</div>

</td>
</tr>
</tbody>
</table>
</div>



<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" border="0" align="center">
<tbody>
<tr>
<td style="border-collapse:collapse">
<div style="margin:0px auto;max-width:600px">
	<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
		<tbody>
			<tr>
				<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 0px 0px 0px;border-collapse:collapse">

					<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
						<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
							<tbody>
								<tr>
									<td style="word-wrap:break-word;font-size:0px;padding:0px 0px 0px 0px;border-collapse:collapse" align="center">
										<div style="color:#afafaf;font-family:Roboto,Ubuntu,Helvetica,Arial,sans-serif;font-size:11px;line-height:22px;text-align:center">
											<p style="font-size:9px;line-height:20px;display:block;margin:13px 0">
												<span>This email was sent to
													<a style="color:#1155cc">'.$email.'</a>
												</span>
												<br>
												<span>Copyright @ 2020 Hestia 20
												</span>
											</p>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

				</td>
			</tr>
		</tbody>
	</table>
</div>
</td>
</tr>
</tbody>
</table>


<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" border="0">
<tbody>
<tr>
<td style="border-collapse:collapse">
<div style="margin:0px auto;max-width:600px">
	<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
		<tbody>
			<tr>
				<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;border-collapse:collapse">

					<div  style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
						<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
							<tbody>
								<tr>
									<td style="word-wrap:break-word;font-size:0px;border-collapse:collapse">
										<div style="font-size:1px;line-height:10px;white-space:nowrap">&nbsp;</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

				</td>
			</tr>
		</tbody>
	</table>
</div>
</td>
</tr>
</tbody>
</table>

</div>

<img src="https://ci4.googleusercontent.com/proxy/ARUQ1tazo15DtnfjTawOFMJHr8iBpMkPwBoGzrG4dZQeglNl-iHFWpBvZ5IK2JdGqxS1MBOAEuXXlz2iIJsjW1d6FLbTOZqsayUMJMNU_aXzGCaxFCksC3GbA0vptNZmC8RtogV9ID2Ugbxw47eH8kBeQ9E_jwVwf8F_aS0GeV4ddGO1WtEwxdoU3hEw20qZJgzalSxWxKnxjHiDtgidRMcp6naJuokMH2BYoKe8aeZ5ubgwNhEnUnrpm9cOMxONLEiDY1JnbXD1miU5KO0jqLZhCMy3up1vNeUAGgH38TovYlOu-Oy7Ud4Vul3pCXw39l7Q9VQ_-6FhXEiTgCQm43UGVaZ6K64517eDsjdt8QX6PHF_O4WpzXRcvqCYtN2ru8Lb12NqCm9BymFVmNEOfxn_yP4YgVZ0T1CdZa9otkkVjuqLcCRfkMQo1fsyC4ChLM4I_OeffC0z4ZFRwI_Qud864Fha4k5M-gQlwVHNg5R9Eps6jqXDDSvOjvj3LtErV2lEzAMNWb1soghQUA92wyDPMkai=s0-d-e1-ft#http://notification1.yepdesk.com/wf/open?upn=HwiQUMp2GNdpU2DgnG6mDKCK1JUHpaGK6Y4o0BnKU3qMcEBnTHe-2FgfvZSX-2FRkAqkCToq8xeuClCoCIH348xqfewo8GIjnKyta-2BDWQX-2BQRZMQ61RZkLPKwK5gOJjNlhrI-2BUzegNpNPXkFrRK9IIP-2Fyoyc7Xu95Y0RUPCTO359UjUcbKAabvuusNFkvPO0U08Bw9lYa7uVchlDV5sLysKPKzCU-2BQdHo2I2-2FDSmE3BWDBNT7gJUvcb4comjazvZWEUVrhEjPe-2BGvcQcsZhntde3e5a8CDgWpV4FaA8iV0YY2Gza5rPpFNfhjZ-2ByugW3TofL" alt="" width="1" height="1" border="0" style="height:1px!important;width:1px!important;border-width:0!important;margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding-top:0!important;padding-bottom:0!important;padding-right:0!important;padding-left:0!important" class="CToWUd"><div class="yj6qo"></div><div class="adL">
</div></div>


';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
//$headers[] = 'To:  <'.$email.'>';
$headers[] = 'From: Hestia20 Registrations <noreply@hestia.live>';
$headers[] ='Reply-To: webadmin@hestia.live';

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));
?>
