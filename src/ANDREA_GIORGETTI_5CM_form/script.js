function convalidaDati()
{
    if(campivalidi())
        alert("dati inseriti con successo!");
    else
        alert("dati incompleti");
}

function campivalidi()
{
    const id = ["Nome", "Cognome", "Username", "Email", "Password", "Telefono", "Residenza", "ViaResidenza", "Cap", "Maschile", "Femminile", "DataNascita", "LuogoNascita"]
    for(var i=0; i<id.length; i++)
    {
        if(document.getElementById(id[i]).value == "")
            return false;
    }
    return true;
}