@extends('template.head')


<body>
    
<p style="color:black"> {{$body['intro']}}</p>
<br>
<br>
<strong style="display: inline;color:black">Cliente:</strong> <p style="display: inline;color:black">{{$body['customer']}}</p>
<br>
<strong style="display: inline;color:black">Matrícula da Viatura:</strong>  <p style="display: inline;color:black">{{$body['matricula']}}</p>
<br>
<strong style="display: inline;color:black">Marca da Viatura:</strong> <p style="display: inline;color:black">{{$body['marca']}}</p> 
<br>
<strong style="display: inline;color:black">Modelo da Viatura:</strong> <p style="display: inline;color:black"> {{$body['modelo']}}</p>

<div style="font-size: 10pt; font-family: Arial, sans-serif;margin-top:100px">
    <TABLE style="WIDTH: 440px" cellSpacing="0" cellPadding="0" border="0">
        <TBODY>
            <TR>
                <TD style="FONT-SIZE: 10pt; FONT-FAMILY: Arial, sans-serif; WIDTH: 440px; PADDING-BOTTOM: 10px; line-height:13pt;" vAlign="top" colSpan="2">

                    <STRONG><SPAN style="FONT-SIZE: 18pt; FONT-FAMILY: Tahoma;color:red">Celen Investimentos</SPAN><BR>
                        <SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: Tahoma; COLOR: #808080">Bate-chapa, Pintura, Mecânica Geral, Aluguer de Viaturas</SPAN></STRONG>

                </TD>
            </TR>
            <TR>
                <TD style="WIDTH: 181px; PADDING-BOTTOM: 15px" vAlign="top">
                    <a href="{logoURL}" target="_blank" rel="noopener"><img border="0" src="{{ asset('assets/images/logo.jpg')}}" alt="Logo" width="180" style="max-width:181px; height:auto; border:0;"></a>
                </TD>

                <TD style="WIDTH: 259px; PADDING-BOTTOM: 15px" vAlign="middle" align="right">

                    <span><a href="https://www.facebook.com/CELEN-Investimentos-201664367369109" target="_blank" rel="noopener"><img border="0" width="30" src="{{ asset('assets/images/ico/facebook.png')}}" alt="facebook icon" style="border:0; height:30px; width:30px"></a></span>
                     <span><a href="#" target="_blank" rel="noopener"><img border="0" width="30" src="{{ asset('assets/images/ico/linkedin.png')}}" alt="linkedin icon" style="border:0; height:30px; width:30px"></a></span>
                    <span><a href="https://www.instagram.com/celen.investimentos/" target="_blank" rel="noopener"><img border="0" width="30" src="{{ asset('assets/images/ico/instagram.png')}}" alt="instagram icon" style="border:0; height:30px; width:30px"></a></span>

                </TD>
            </TR>

            <TR>
                <TD style="FONT-SIZE: 9pt; BORDER-TOP: #fac200 1px solid; FONT-FAMILY: Arial, sans-serif; WIDTH: 440px; PADDING-BOTTOM: 15px; PADDING-TOP: 15px" vAlign="top" colSpan="2">

                    <span style="color:#808080;"><strong style="color:#000000;">Telefone:</strong> +258 848 606 700</span>
                    <span style="color:#808080;"><span ng-if="showField('mobile')" style="color:#808080;">&nbsp;&nbsp;|&nbsp;&nbsp;</span> +258 850 722 213<BR></span>
                    <span style="color:#808080;"><strong style="color:#000000;">Email:</strong> celen@celeninvestimentos.com </span>

                    <span style="color:#808080;">
                        <br><strong style="color:#000000;">Endereço: </strong><span>Bairro Costa do SOl, rua 4694, 442 - R/C Maputo - Moçambique</span>
                    </span>

                    <br><br><a href="#" target="_blank" rel="noopener"><strong style="color:#000000; font-family:Arial, sans-serif;">www.celeninvestimentos.com</strong></a>

                </TD>
            </TR>

            <TR>
                <TD style="WIDTH: 440px" vAlign="top" colSpan="2">
                    <a href="{bannerURL}" target="_blank" rel="noopener"><img border="0" src="banner.gif" alt="Banner" width="440" style="max-width:440px; height:auto; border:0;"></a>
                </TD>
            </TR>

            <TR>
                <TD style="FONT-SIZE: 8pt; FONT-FAMILY: Arial, sans-serif; WIDTH: 440px; COLOR: #c0c0c0; PADDING-TOP: 15px; line-height:10pt" vAlign="top" colSpan="2">The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.</TD>
            </TR>

        </TBODY>
    </TABLE>
</div>
</body>
