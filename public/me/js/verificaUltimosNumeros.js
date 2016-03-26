/**
 * Created by Raul on 29-02-2016.
 */

function verificaUltimosNumeros(element)
{
    var aux = element.charAt(element.length - 2);

    //Verificamos si penúltimo dígito es letra, si lo es solamente me quedo con último N°
    //Sino, retorno 2 últimos N°s
    if(isNaN(aux) == true){
        num_element = element.charAt(element.length - 1);
    }else{
        var temp    = element.charAt(element.length - 2);
        var temp2   = element.charAt(element.length - 1);
        num_element = temp + temp2;
    }

    return num_element;
}
