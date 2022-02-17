function verificar()
{

	if((document.form1.km_inicio.value != "") && (document.form1.km_final.value != ""))
	{
		document.form1.resultado.value = parseInt(document.form1.km_inicio.value) - parseInt(document.form1.km_final.value);			
	}
	else
	{
		document.form1.resultado.value = "";
		alert("Campos vazios.");
	}
}