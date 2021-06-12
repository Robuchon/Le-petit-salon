<div class="container">
    <main class="main">
        <article class="card">
            <div class="card-description">
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254.96519115014812!2d6.849258171116895!3d43.698040154830004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12cc2463b3382349%3A0xf1250e3c6ea38219!2sLe%20Petit%20Salon!5e0!3m2!1sfr!2sfr!4v1622550726659!5m2!1sfr!2sfr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!4v1622553828858!6m8!1m7!1sUXDw0-F3ZPDraOiP4CocAA!2m2!1d43.69812332417718!2d6.849317483802766!3f188.52160900166385!4f-16.87232812040334!5f0.49672802382084236" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
                    Coloris pastels, formes arrondies et grands fauteuils cosy, Le Petit Salon, votre salon de coiffure mixte et onglerie de Saint-Vallier-de-Thiey (Alpes-Maritimes) a beau ne pas être grand, il cumule tous les talents. Votre adresse beauté allie l’intimité d’un lieu nimbé de douceur et la possibilité d’y concrétiser toutes vos envies. Pour vos rendez-vous coiffure et manucure, du mardi au samedi, vous mettez le cap sur le 16 rue Adrien Guebhard.                 </p>
                <p>
                    Pour vous façonner une nouvelle tête, vous piochez dans la liste des prestations du Petit Salon, votre coiffeur mixte de Saint-Vallier-de-Thiey (Alpes-Maritimes). Lissage brésilien, mèches ou ombré hair, Laetitia et Melissa vous dessinent une nouvelle personnalité ! Vous adorez aussi leur forfait coupe et brushing, c’est le secret de votre look toujours parfait.                   
                </p>
                <p>
                Maquillage, manucure et pose de vernis, vous agrémentez vos séances de coiffure d’une pause manucure suivie de l’application d’un vernis simple, de gel ou d’un verni semi permanent. Et vous ajoutez même, sur un ou plusieurs de vos ongles, un joli décor dont vos expertes ont le secret.     
                </p>
                <p>
                En plus de leur coupe, ces messieurs craquent pour le rasage avec serviettes chaudes et s’offrent ainsi un vrai moment de détente…   
                </p>
            </div>
        </article>
    </aside>
</div>