async function getData()
{
    const url = "https://3000-idx-docker-xamppgit-1736234872817.cluster-23wp6v3w4jhzmwncf7crloq3kw.cloudworkstations.dev/example_jswebservice/json-sender.php";
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

async function popTable()
{
    const data = await getData();

    var table = document.createElement("table");
    table.innerHTML = "<thead> <tr> <th>Nome</th><th>Cognome</th><th>Eta'</th> </tr> </thead>";
    data.forEach(element => {
        var row = document.createElement("tr");
        row.innerHTML = `<td>${element.nome}</td><td>${element.cognome}</td><td>${element.eta}</td>`;
        table.appendChild(row);
    });

    document.getElementById("ws_table").innerHTML = table.innerHTML;
}

document.getElementById("ws_submit").addEventListener("click", popTable);