<HTML>
<HEAD>
<TITLE>P&aacute;gina de pago</TITLE>
</HEAD>
<BODY>
<FORM ACTION="https://pgw.ceca.es/cgi-bin/tpv" METHOD="POST" 
ENCTYPE="application/x-www-form-urlencoded">
<INPUT NAME="MerchantID"  VALUE=##MerchantID##>
<INPUT NAME="AcquirerBIN"  VALUE=##AcquirerBIN##>
<INPUT NAME="TerminalID"  VALUE=##TerminalID##>
<INPUT NAME="URL_OK"  VALUE=##URL_OK##>
<INPUT NAME="URL_NOK"  VALUE=##URL_NOK##>
<INPUT NAME="Firma"  VALUE=##Firma##>
<INPUT NAME="Cifrado"  VALUE="SHA1">
<INPUT NAME="Num_operacion" VALUE=##Num_operacion##>
<INPUT NAME="Importe"  VALUE=##Importe##>
<INPUT NAME="TipoMoneda" VALUE=978>
<INPUT NAME="Exponente" VALUE=2>
<INPUT NAME=“Pago_soportado”  VALUE=SSL>
<INPUT NAME=“Idioma”  VALUE=”1”>
<CENTER>
<INPUT TYPE="submit" VALUE="Comprar">
</CENTER>
</FORM>
</BODY>
</HTML>