<div class="content">
    <table border="0"  cellspacing="0">
        <caption><p id="page_title">Orders rapport</p><br><br> </caption>
        <thead>
            <tr>
                <th>Klant</th>
                <th>Order</th>
                 <th>productnaam</th>
                 <th>aantal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // raadpleeg alle tabellen
            $sql = "
            SELECT klant.achternaam, item.weborder_ID, producten.productennaam, item.aantal FROM klant
            INNER JOIN (weborder
            INNER JOIN (item
            INNER JOIN producten ON producten.ID = item.product_ID)
            ON weborder.ID = item.weborder_ID)
            ON klant.ID = weborder.klant_ID";
            $stmt = $verbinding->prepare($sql);
            $stmt->execute(array());
            $bestellingen = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $bgcolor = true;
            $weborder_ID =  $bestellingen[0] ['weborder_ID'];
            $subtotaal = 0;
            $totaal = 0;
            $nieuweBestelling = true;
            // voor elke bestelling
            foreach($bestellingen as $bestelling){
                if($bestelling['weborder_ID'] != $weborder_ID){
                    // geef subtotalen weer
                    echo ($bgcolor ? "<tr bgcolor=#9BC997>" :
                                        "<tr bgcolor=#DAD4D4>");
                echo "<td></td><td></td>
                <td> subtotaal.....</td>
                <td align='center'>".$subtotaal. "</td> </tr>";
                $totaal += $subtotaal;
                $subtotaal = 0;
                $nieuweBestelling = true;
                $weborder_ID = $bestelling['weborder_ID'];
                }
                // als dit een nieuwe bestelling is bereken eerst subtotaal
                if($nieuweBestelling){
                    $bgcolor= ($bgcolor ? false:true);
                    echo ($bgcolor ?  "<tr bgcolor=#9BC997>" :
                                      "<tr bgcolor=#DAD4D4>");
                echo "<td>".$bestelling['achternaam']. "</td> <td>" . $bestelling['weborder_ID']. "</td>";
                echo "<td>" . $bestelling['productennaam']. "</td> <td>" . $bestelling['aantal']. "</td> </tr>";
                $subtotaal += $bestelling['aantal'];
                $nieuweBestelling = false;
                }
                else{
                    // als het dezelfde bestelling is herhaal de achternaam niet
                    echo ($bgcolor ?  "<tr bgcolor=#9BC997>" :
                                    "<tr bgcolor=#DAD4D4>");
                                    echo "<td></td><td></td>";
                                    echo "<td>". $bestelling['productennaam']. "</td>
                                    <td align='center'>" .$bestelling['aantal']. "</td> </tr>";
                                    $subtotaal += $bestelling['aantal'];
                }
            }
            // aan het einde toon totalen
            echo ($bgcolor ?  "<tr bgcolor=#9BC997>" :
                                    "<tr bgcolor=#DAD4D4>");
                                    echo "<td></td><td></td>
                                    <td> subtotaal....</td>
                                    <td align='center'>". $subtotaal. "</td> </tr>";
                                    $totaal =+ $subtotaal;
                                    echo "<tr><td> </td><td></td>
                                    <td> totaal...</td>
                                    <td align='center'>".$totaal."</td>
                                    </tr>";
                                    ?>
        </tbody>
    </table>
</div>