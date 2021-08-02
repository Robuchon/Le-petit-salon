<?php

function create_html($type) {
    $service = 
    <<<HTML
        <main class="main">
            <article class="card-form">
                <form action="" method="post">
                    <div class='form-ligne'>
                        <p class="form-edit">Type</p>
                        <input type="text"  name='type' readonly="readonly" placeholder="$type" value="$type">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Titre</p>
                        <input type="text" name='titre' placeholder='Titre'>
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Services</p>
                        <input type="text" name='services' placeholder='cathegorie de service'>
                    </div>
                    <div class="form-ptext">
                        <p class="form-edit">Temps</p>
                        <input type="number" name='temps' placeholder='ex : 30'>
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Prix</p>
                        <input type="number" name='prix' placeholder='ex 25'>
                    </div>
                    <div class='form-ligne'>
                        <p class="form-edit">Supplement</p>
                        <input type="text"  name='supplement' placeholder='Supplement'>
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Img</p>
                        <textarea name="img" id="" cols="" rows="4"></textarea>
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Déscription</p>
                        <textarea name="affichage" id="" cols="" rows="4"></textarea>
                    </div>    
                    <button class="btn">Créer</button>
                </form>
            </article> 
        </main>  
    HTML;
    $produit = 
    <<<HTML
        <main class="main">
            <article class="card-form">
                <form action="" method="post">
                    <div class='form-ligne'>
                        <p class="form-edit">Type</p>
                        <input type="text"  name='type' readonly="readonly" placeholder="$type" value="$type">
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Titre</p>
                        <input type="text" name='titre' placeholder='Titre'>
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Produit</p>
                        <input type="text" name='produit' placeholder='cathegorie de service'>
                    </div>
                    <div class="form-ptext">
                        <p class="form-edit">Temps</p>
                        <input type="number" name='temps' placeholder='ex : 30'>
                    </div>
                    <div class='form-ptext'>
                        <p class="form-edit">Prix</p>
                        <input type="number" name='prix' placeholder='ex 25'>
                    </div>
                    <div class='form-ligne'>
                        <p class="form-edit">Supplement</p>
                        <input type="text"  name='supplement' placeholder='Supplement'>
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Img</p>
                        <textarea name="img" id="" cols="" rows="4"></textarea>
                    </div>
                    <div class='form-gtext'>
                        <p class="form-edit">Déscription</p>
                        <textarea name="affichage" id="" cols="" rows="4"></textarea>
                    </div>    
                    <button class="btn">Créer</button>
                </form>
            </article> 
        </main>  
    HTML;
    if ($type === 'service') {
        $type = $service;
    }
    if ($type === 'produit') {
        $type = $produit;
    }
    return $type; 
}

function type_html () {
    return
    <<<HTML
        <main class="main">
            <article class="card-form">
                <form action="" method="post">
                    <label for="type-select">Choix du type</label>
                    <select name="type" id="type-select">
                        <option value="service">Service</option>
                        <option value="produit">Produit</option>
                    </select>  
                    <button class="btn">valider</button>     
                </form>
            </article> 
        </main>   
    HTML; 
}