
<div class="container">
    <main class="main">
        <article class="card">
            <div class="card-form">
                <div class="pre-form">
                    <p>
                        Pour tout demande spécifique ou question sur un service ou produit vous pouvez poser votre question ici
                    </p>
                </div>
                <div class="form">
                    <label for="nom">Votre nom</label>
                    <input type="text" name="nom" id="nom" required>
                    <label for="prenom"> et prénom</label>
                    <input type="text" name="prenom" id="prenom" required>
                </div>
                <div class="form">
                    <label for="tel">Téléphone</label>
                    <input type="text" name="tel" id="tel" required>
                    <label for="email"> E-mail</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="post-form">
                    <label for="question">Votre demande</label>
                    <input type="text" name="question" id="question" required>
                </div>
            </div>
        </article>
    </main>
    <aside class="aside">
        <article class="card-aside">
            <div class="card-aside-horaire">  
                <p>Horaires d'ouverture</p>
                <table class="horaire">
                    <tbody class="table-horaire">
                        <?php foreach(JOURS as $k => $jour): ?>
                            <tr class="trb"<?php if ( $k + 1 === (int)date('N')): ?> style="color:<?= $color; ?>" <?php endif ?>>
                                <td>
                                    <strong><?= $jour ?></strong>
                                </td>
                                <td>
                                    <?= creneaux_html(CRENEAUX[$k])?>
                                </td>
                            </tr>
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
                <a href="https://www.planity.com/le-petit-salon-06460-saint-vallier-de-thiey"><button>Prendre un RDV</button></a>
            </div>
        </article>
    </aside>
</div>