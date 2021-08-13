<?php
$erreur = '';
?>
<div class="container">
    <main class="main">
        <?=contact_html($erreur)?>
    </main>
    <aside class="aside">
        <article class="card-aside">
            <div class="card-aside-horaire">  
                <p>Horaires d'ouverture</p>
                <table class="horaire">
                    <tbody class="table-horaire">
                        <?php foreach(horraire_html() as $horraire): ?>
                            <?= $horraire ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </article>
        <article class="card-aside">
            <div class="card-aside-description"> 
                <p>
                    Pour nous contacter rien de plus simple par telephone pendant nos heures d'ouverture au 0492600907
                </p>
            </div>
        </article>
        <article class="card-aside">
            <div class="card-aside-description"> 
                <p>
                    Vous pouvez aussi directement passer par Planity pour reserver votre RDV
                </p>
                <a href="https://www.planity.com/le-petit-salon-06460-saint-vallier-de-thiey"><button class='btn'>Prendre un RDV</button></a>
            </div>
        </article>
    </aside>
</div>