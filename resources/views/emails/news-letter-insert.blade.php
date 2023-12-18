@include('emails.email-header')
<table cellpadding="0" cellspacing="0" class="es-header" align="center" role="none"
       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
    <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table class="es-header-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                   align="center" role="none"
                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                <tr style="border-collapse:collapse">
                    <td align="left"
                        style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px">
                        <table cellspacing="0" cellpadding="0" width="100%" role="none"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                                <td align="left" style="padding:0;Margin:0;width:560px">
                                    <table width="100%" cellspacing="0" cellpadding="0"
                                           role="presentation"
                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                        <tr style="border-collapse:collapse">
                                            <td align="center"
                                                style="padding:0;Margin:0;padding-bottom:5px;font-size:0px">
                                                <a target="_blank" href="https://viewstripo.email/"
                                                   style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:#659C35;font-size:16px"><img
                                                        src="https://ebfcecw.stripocdn.email/content/guids/faa812a7-3dd2-4290-afba-1922ac57adad/images/akilliphonelogo.png"
                                                        alt
                                                        style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                                        class="adapt-img" width="125" height="35"></a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" class="es-content" align="center" role="none"
       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
    <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0"
                   cellspacing="0" role="none"
                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                <tr style="border-collapse:collapse">
                    <td align="left" style="padding:0;Margin:0;background-position:center top">
                        <table cellpadding="0" cellspacing="0" width="100%" role="none"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                                <td align="center" valign="top" style="padding:0;Margin:0;width:600px">

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" class="es-content" align="center" role="none"
       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
    <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0"
                   cellspacing="0" role="none"
                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                <tr style="border-collapse:collapse">
                    <td align="left"
                        style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-position:center top">
                        <table cellpadding="0" cellspacing="0" width="100%" role="none"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr style="border-collapse:collapse">
                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                    <table cellpadding="0" cellspacing="0" width="100%"
                                           role="presentation"
                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                        <tr style="border-collapse:collapse">
                                            <td align="center" style="padding:0;Margin:0"><h2
                                                    style="Margin:0;line-height:31px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:26px;font-style:normal;font-weight:bold;color:#16c0ec">
                                                    Bülten Kaydı </h2></td>
                                        </tr>
                                        <tr style="border-collapse:collapse">
                                            <td align="center"
                                                style="padding:0;Margin:0;padding-top:10px"><p
                                                    style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                    Akilliphone bültenine abone olduğunuz için teşekkür ederiz<br>
                                                    <a href="{{ route('newsletter.confirm', ['email'=>$email, 'hash_token'=>$hash_token]) }}">Üyeliğinizi tamamlamak için tıklayınız</a>
                                                    <a href="{{ route('newsletter.confirm', ['email'=>$email, 'hash_token'=>$hash_token]) }}">Üyeliğinizi tamamlamak için tıklayınız</a>
                                                </p></td>
                                        </tr>
                                        <tr style="border-collapse:collapse">
                                            <td align="center"
                                                style="Margin:0;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px">
                                                                <span class="es-button-border-1696530823227 es-button-border"
                                                                      style="border-style:solid;border-color:#659C35;background:#16c0ec;border-width:0px;display:inline-block;border-radius:0px;width:auto">
                                                                </span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" class="es-content" align="center product" role="none"
       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
    <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0"
                   cellspacing="0" role="none"
                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">

                <tr style="border-collapse:collapse">
                    <td align="left"
                        style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px">
                        <!--[if mso]>
                        <table style="width:560px" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="width:154px" valign="top"><![endif]-->
                        <table cellpadding="0" cellspacing="0" class="es-left" align="left" role="none"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                            <tr style="border-collapse:collapse">
                                <td class="es-m-p20b" align="left"
                                    style="padding:0;Margin:0;width:154px">
                                    <table cellpadding="0" cellspacing="0" width="100%"
                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top"
                                           role="presentation">
                                        <tr style="border-collapse:collapse">
                                            <td align="center" style="padding:0;Margin:0;font-size:0"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!--[if mso]></td>
                        <td style="width:20px"></td>
                        <td style="width:386px" valign="top"><![endif]-->
                        <table cellpadding="0" cellspacing="0" class="es-right" align="right"
                               role="none"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                            <tr style="border-collapse:collapse">
                                <td align="left" style="padding:0;Margin:0;width:386px">

                                </td>
                            </tr>
                        </table>
                        <!--[if mso]></td></tr></table><![endif]--></td>
                </tr>

            </table>
        </td>
    </tr>
</table>
@include('emails.email-footer')
