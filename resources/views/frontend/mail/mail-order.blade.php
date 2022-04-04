<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="" style="width: 100%; max-width: 650px; margin: 0 auto; border: 1px solid #348dcc; ">
		<div class="header" style="text-align: center; background: #348dcc; padding: 1px; color: #fff;"><h3 style="text-transform: uppercase; margin-top: 5px; margin-bottom: 2px">Thông báo đặt hàng</h3></div>
		<div class="content" style="padding: 10px;">
			<p>Chào bạn,</p>
			<p>Bạn vừa nhận được một yêu cầu đặt hàng từ <a href="" title="">{{ @$name}} - {{ @$email }}</a></p>
			<h3>Thông tin chi tiết</h3>
			<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-left:1px solid #dcdcdc;border-right:1px solid #dcdcdc">
				<tbody>
					<tr>
						<td colspan="2" align="center" style="font-family:Arial,Helvetica,sans-serif;background-color:#f2f2f2;padding:8px 20px;border-top:1px solid #dcdcdc"><span style="font-size:13px;color:#252525;font-weight:bold">THÔNG TIN CHI TIẾT</span></td>
					</tr>
					<tr>
						<td width="39%" align="right" style="padding:8px 10px 8px 20px;font-family:Arial,Helvetica,sans-serif;color:#666666;font-size:12px;border-bottom:1px solid #dcdcdc"><span>Người đặt:</span></td>
						<td align="left" style="padding:8px 20px 8px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#2525253;border-bottom:1px solid #dcdcdc"><strong>{{ @$name }}</strong></td>
					</tr>
					<tr>
						<td width="39%" align="right" style="padding:8px 10px 8px 20px;font-family:Arial,Helvetica,sans-serif;color:#666666;font-size:12px;border-bottom:1px solid #dcdcdc"><span>Số điện thoại:</span></td>
						<td align="left" style="padding:8px 20px 8px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#2525253;border-bottom:1px solid #dcdcdc"><strong>{{@$phone}}</strong></td>
					</tr>

					<tr>
						<td width="39%" align="right" style="padding:8px 10px 8px 20px;font-family:Arial,Helvetica,sans-serif;color:#666666;font-size:12px;border-bottom:1px solid #dcdcdc"><span>Email:</span></td>
						<td align="left" style="padding:8px 20px 8px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#2525253;border-bottom:1px solid #dcdcdc"><strong>{{ @$email }}</strong></td>
					</tr>

					<tr>
						<td width="39%" align="right" style="padding:8px 10px 8px 20px;font-family:Arial,Helvetica,sans-serif;color:#666666;font-size:12px;border-bottom:1px solid #dcdcdc"><span>Địa chỉ:</span></td>
						<td align="left" style="padding:8px 20px 8px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#2525253;border-bottom:1px solid #dcdcdc"><strong>{{ @$address }}</strong></td>
					</tr>
					<tr>
						<td width="39%" align="right" style="padding:8px 10px 8px 20px;font-family:Arial,Helvetica,sans-serif;color:#666666;font-size:12px;border-bottom:1px solid #dcdcdc"><span>Ghi chú đơn hàng:</span></td>
						<td align="left" style="padding:8px 20px 8px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#2525253;border-bottom:1px solid #dcdcdc"><strong>{{ @$note }}</strong></td>
					</tr>
					<tr>
						<td width="39%" align="right" style="padding:8px 10px 8px 20px;font-family:Arial,Helvetica,sans-serif;color:#666666;font-size:12px;border-bottom:1px solid #dcdcdc"><span>Tổng tiền:</span></td>
						<td align="left" style="padding:8px 20px 8px 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#2525253;border-bottom:1px solid #dcdcdc"><strong>{{ number_format($total) }}</strong></td>
					</tr>

			  	</tbody>
			</table>
			<div class="detail" style="margin-top: 30px;">
				<table cellpadding="0" cellspacing="0" border="0" width="100%;"
				style="border-left:1px solid #dcdcdc;border-right:1px solid #dcdcdc;border-top: 1px solid #dcdcdc;margin-bottom: 10px;">
					<tbody>
						<tr style="background: #f93f3f">
							<td width="60%" style="font-weight: bolder;border-bottom: 1px solid #dcdcdc;border-right: 1px solid #dcdcdc;padding: 5px 0;">Sản phẩm</td>
							<td style="font-weight: bolder;border-bottom: 1px solid #dcdcdc;border-right: 1px solid #dcdcdc;padding: 5px 0;">Giá</td>
							<td style="font-weight: bolder;border-bottom: 1px solid #dcdcdc;border-right: 1px solid #dcdcdc;padding: 5px 0;">Số lượng</td>
							<td style="font-weight: bolder;border-bottom: 1px solid #dcdcdc;padding: 5px 0;">Thành tiền</td>
						</tr>
						@foreach($cart as $item)
						<tr>
							<td style="border-bottom: 1px solid #dcdcdc;border-right: 1px solid #dcdcdc;padding: 5px 0;">{{$item->name}}</td>
							<td style="border-bottom: 1px solid #dcdcdc;border-right: 1px solid #dcdcdc;padding: 5px 0;">{{number_format($item->price)}}</td>
							<td style="border-bottom: 1px solid #dcdcdc;border-right: 1px solid #dcdcdc;padding: 5px 0;">{{$item->qty}}</td>
							<td style="border-bottom: 1px solid #dcdcdc;padding: 5px 0;">{{number_format($item->price * $item->qty)}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<a href="{{ @$url }}">Chi tiết</a>

		</div>
	</div>
	<br/>
	<br>
	<i style="font-size: 9px;">FROM GCO - TEAM</i>
</body>
</html>
