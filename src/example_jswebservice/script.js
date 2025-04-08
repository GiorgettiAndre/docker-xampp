async function getData(url)
{
    try
    {
        const response = await fetch(url);

        if(!response.ok)
            throw new Error(`Response status: ${response.status}`);

        const data = await response.json();
        return data;

    }
    catch (error)
    {
        console.error(error.message);
        return [];
    }
}

async function popTable(url)
{
    const data = await getData(url);

    if(data.length === 0)
    {
        document.getElementById("ws_table").innerHTML = "Dati vuoti";
    }
    else
    {
        var table = document.createElement("table");
        table.innerHTML = "<thead> <tr> <th>Nome</th><th>Cognome</th><th>Eta'</th> </tr> </thead>";
        data.forEach(element =>
        {
            var row = document.createElement("tr");
            row.innerHTML = `<td>${element.nome}</td><td>${element.cognome}</td><td>${element.eta}</td>`;
            table.appendChild(row);
        });
    
        document.getElementById("ws_table").innerHTML = table.innerHTML;
    }
}

async function staticWS()
{
    popTable("https://3000-idx-docker-xamppgit-1743577861873.cluster-rcyheetymngt4qx5fpswua3ry4.cloudworkstations.dev/example_jswebservice/api/json-sender_static.php");
}
async function realWS()
{
    popTable("https://3000-idx-docker-xamppgit-1743577861873.cluster-rcyheetymngt4qx5fpswua3ry4.cloudworkstations.dev/example_jswebservice/api/json-sender_real.php");
}


document.getElementById("ws_static").addEventListener("click", staticWS);
document.getElementById("ws_real").addEventListener("click", realWS);