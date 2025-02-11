<?php require_once "../mysqli.php"; ?>

<!DOCTYPE html>
<head>
    <title>Registrazione censimenti scout</title>
    
    <!--CSS impostazioni per la lo stile in file esterno--> 
    <link rel="stylesheet" href="stile.css">

    <!--sorgente JavaScript-->
    <script src="script.js"></script>
</head>
<body>
    <header>
        <!--titolo visivo-->
        <h1>IIS Marconi Pieralisi</h1>
        <nav><!--una sezione dedicata ad una lista di link-->
            <!--lista puntata delle materie-->
            <ul>
                <li><a href="">Informatica</a></li>
                <li><a href="">Sistemi e Reti</a></li>
                <li><a href="">GPOI</a></li>
                <li><a href="">TPSIT</a></li>
                <li><a href="">Intelligenza artificiale</a></li>
                <li><a href="">Scienze Motorie</a></li>
                <li><a href="">Storia</a></li>
                <li><a href="">Italiano</a></li>
                <li><a href="">Religione</a></li>
                <li><a href="">Inglese</a></li>
                <li><a href="">Matematica</a></li>
                <li><a href="index.html">Pagina Principale</a></li>
            </ul>
        </nav>
    </header>

    <h1 id="titolo">Risultato Search!</h1>

    <section>
        <?php
        if(isset($_GET))
        {
            $result = $conn->query("SELECT * FROM " . $_GET['table']);
        
            if($result->num_rows > 0)
            {
                echo "<table>";
        
                //fetch = prendi
        
                while($column = $result->fetch_field())
                {
                    echo "<th>";
                    echo $column->name;
                    echo "<br>";
                    echo "</th>";
                }
                //stampo contenuto della tabella
                while ($row = $result->fetch_assoc()) //va finchè diventa null (righe finite)
                {
                    echo "<tr>";
        
                    foreach($row as $key=>$value)
                    {
                    echo "<td> $value  </td>";  
                    }
                    echo "</tr>";
                }
               echo "</table>";
            }
        }
        ?>
    </section>

    <footer>
        <p>
           Indirizzo
           Via Raffaello Sanzio, 8
           60035 - JESI (AN)
        </p>
      </footer>
</body>
</html>