
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            background: #fff;
            font-family: 'Poppins', sans-serif;
        }
        p{
            font-size: 16px;
        }
        a{
            text-decoration: none;
        }

        .email_container{
            background: #fff;
            width: 100%;
            height: 100%;
        }
        .email_table{
            margin: 50px auto 0;
            width: 100%;
            max-width: 760px;
        }
        .logo_con{
            padding: 20px 0;
        }
        .email_body{
            padding: 50px 30px;
            background: #FAFAFA;
            text-align: center;
            border-left: solid 15px #fff;
            border-right: solid 15px #fff;
        }
        .last_sec{
            padding: 0 20px 30px;
        }
        img.logo_con{
            width: 85px;
            display: table;
            margin: 0 auto;
        }
        .ft_info_table{
            width: 25%;
        }
        .ft_info_table3{
            width: 28.5%;
        }
        .ft_info_table4{
            width: 21.5%;
        }
        @media (max-width: 767px){
            .ft_info_table, .ft_info_table3, .ft_info_table4{
                width: 50%;
                padding: 5px 0;
            }
            p{
                padding-right: 0 !important;
                padding-left: 0 !important;
            }
            .email_body{
                padding: 30px 20px;
            }
            .email_table{
                margin: 30px auto 0;
            }
        }
    </style>
</head>
<body>
    <div class="email_container">

        <div style="display: table;" class="email_table">
            <table align="center" width="100%" class="emailer_table" border="0" cellspacing="0" style="padding: 0;" >
                <tr>
                    <td style="padding: 0 15px">
                        <img src="{{$message->embed(public_path('assets/img/logo-name.png'))}}" alt="" class="logo_con">
                    </td>
                </tr>

                <tr>
                    <td style="padding-bottom: 40px;">
                        <div class="email_body">
                            <h3 style="text-align: left; margin:0 0 6px; font-size: 24px; font-weight: 600; color: #29323C;"></h3>
                            <p style="text-align: left; padding:0 0 15px; color:#393636BF;">orders
                                -</p>
                            <div style="overflow: auto;">
                                <table width="100%" column-spacing="0" border="0">
                                    <tr>
                                        <th style="padding: 5px; background: #eeeb86e5; font-weight: normal; font-size: 14px;">SN</th>
                                        <th style="padding: 5px; background: #eeeb86e5; font-weight: normal; font-size: 14px;">Product Name</th>
                                        <th style="padding: 5px; background: #eeeb86e5; font-weight: normal; font-size: 14px;">Boxing Size</th>
                                        <th style="padding: 5px; background: #eeeb86e5; font-weight: normal; font-size: 14px;">Qty</th>
                                        <th style="padding: 5px; background: #eeeb86e5; font-weight: normal; font-size: 14px;">Volume</th>
                                        <th style="padding: 5px; background: #eeeb86e5; font-weight: normal; font-size: 14px;">Price</th>
                                    </tr>

                                   @if (isset($order))
                                        @foreach ($order->order_items as $k => $item)
                                            <tr>
                                                <td style="padding: 5px; border-bottom: solid 1px #cbe9b7; font-size: 14px;">{{ $k +1}}</td>
                                                <td style="padding: 5px; border-bottom: solid 1px #cbe9b7; font-size: 14px;">{{ ucfirst($item->product->name)}}</td>
                                                <td style="padding: 5px; border-bottom: solid 1px #cbe9b7; font-size: 14px;">{{ $item->packing_size->packing . '(' .$item->packing_size->internal_qty .'X' .$item->packing_size->internal_size.$item->packing_size->unit->sku .')'}}</td>
                                                <td style="padding: 5px; border-bottom: solid 1px #cbe9b7; font-size: 14px;">{{ $item->quantity}}</td>
                                                <td style="padding: 5px; border-bottom: solid 1px #cbe9b7; font-size: 14px;">{{ $item->volume . $item->packing_size->unit->sku}}</td>
                                                <td style="padding: 5px; border-bottom: solid 1px #cbe9b7; font-size: 14px;">&#8377; {{ $item->total_price}}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    <tr>
                                        <td colspan="3" style="text-align: center; padding: 5px; font-size: 14px;"></td>
                                        <td colspan="2" style="text-align: center; padding: 5px; font-size: 18px; font-weight: 700; background: #cbe9b7;">Total</td>
                                        <td style="text-align: center; padding: 10px 5px; font-size: 18px; font-weight: 700; background: #cbe9b7;">&#8377; {{ number_format($order->bill_amount,2)}}</td>
                                    </tr>

                                </table>
                            </div>

                            <p style="text-align: left; padding:20px 0 3px; color:#393636BF; font-weight: 600;">Delivery Address -</p>
                           <p style="text-align: left; padding:0 0 15px; color:#393636BF;">{{ $order->address.' '.$order->landmark . ' '.$order->postcode }}</p>
                        </div>
                    </td>
                </tr>

                <table cellpadding="0" cellspacing="0" width="100%" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%; background-color:#9be289e5; ">
                    <tr>
                     <td align="center" style="padding:0;Margin:0">
                      <table  class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;border-radius:0 0 20px 20px;width:600px">
                        <tr>
                         <td class="esdev-adapt-off" align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:40px;padding-right:40px">
                          <table cellpadding="0" cellspacing="0" class="esdev-mso-table" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:520px">
                            <tr>
                             <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                              <table cellpadding="0" cellspacing="0" align="left" class="es-left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                <tr>
                                 <td align="center" valign="top" style="padding:0;Margin:0;width:47px">
                                  <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr>
                                     <td align="center" class="es-m-txt-l" style="padding:0;Margin:0;font-size:0px"><a target="_blank" href="https://viewstripo.email" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2D3142;font-size:18px"><img src="https://mesnmr.stripocdn.email/content/guids/CABINET_ee77850a5a9f3068d9355050e69c76d26d58c3ea2927fa145f0d7a894e624758/images/group_4076325.png" alt="Demo" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="47" title="Demo" height="47"></a></td>
                                    </tr>
                                  </table></td>
                                </tr>
                              </table></td>
                             <td style="padding:0;Margin:0;width:20px"></td>
                             <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                              <table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                <tr>
                                 <td align="center" valign="top" style="padding:0;Margin:0;width:453px">
                                  <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr>
                                     <td align="left" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:Imprima, Arial, sans-serif;line-height:24px;color:#2D3142;font-size:16px">For any questions, help guides, and videos, use this link:<br><a href="https://help.Anira Chemicals.com" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2D3142;font-size:18px">help.anirachemicals.com</a>&nbsp;| <a href="mailto:support@proofhub.com" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2D3142;font-size:18px">support@anirachemicals.com</a><br></p></td>
                                    </tr>
                                  </table></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
                  <table cellpadding="0" cellspacing="0" class="es-footer" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr>
                     <td align="center" style="padding:0;Margin:0">
                      <table bgcolor="#bcb8b1" class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                        <tr>
                         <td align="left" style="Margin:0;padding-left:20px;padding-right:20px;padding-bottom:30px;padding-top:40px">
                          <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr>
                             <td align="left" style="padding:0;Margin:0;width:560px">
                              <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">

                                <tr>
                                 <td align="center" style="padding:0;Margin:0;padding-top:20px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:Imprima, Arial, sans-serif;line-height:21px;color:#2D3142;font-size:14px"><a target="_blank" href="" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2D3142;font-size:14px"></a>© 2023 Anira Chemicals. | Lane No-1, Nathanpur Raod, Dehradun (Uttarakhand) Pin-248005<a target="_blank" href="" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2D3142;font-size:14px"></a></p></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
            </table>
        </div>
    </div>
</body>
</html>
