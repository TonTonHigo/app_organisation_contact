<?php include "connexion.php"; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- botstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- mon css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        
    </header>


    <main>

        <table>
                <thead>
                    <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Action</th>
                    <th>
                        <button type="button" class="btn colgreen" data-bs-toggle="modal" data-bs-target="#insert">
                        INSERER
                        </button>
                    </th>
                    </tr>
                </thead>
                <tbody> 


        <?php
            $connexion = new ma_connexion("localhost", "app_organisation_contacts", "root", "");
            $afficher = $connexion -> select("*","contacts");
            foreach($afficher as $ligne) {
                echo '
                    <tr>
                        <td><strong>' . $ligne['nom'] . '</strong></td>
                        <td>'. $ligne['prenom'] .'</td>
                        <td>'. $ligne['email'] .'</td>
                        <td>'. $ligne['age'] .'</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn colorange" data-bs-toggle="modal" data-bs-target="#update' . $ligne['id_contacts'] . '">
                            MAJ
                            </button>
                            <button type="button" class="btn colred" data-bs-toggle="modal" data-bs-target="#delete' . $ligne['id_contacts'] . '">
                            SUPPR
                        </button>
                        </td>
                    </tr>

                    <!-- Modal UPDATE-->
                    <div class="modal fade" id="update' . $ligne['id_contacts'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mise à jour d`un contact</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        
                            <p>Ête-vous sûr de vouloir mettre à jour ' . $ligne['nom'] . ' ' . $ligne['prenom'] . ' ' . $ligne['email'] . ' agé de ' . $ligne['age'] . ' ans ?</p>

                            <div class="login">
                                <form id="formupdate" action="update.php" method="POST">
                                    <div class="mb-3">

                                        <input type="number" class="form-control" hidden value="' . $ligne['id_contacts'] . '" name="id">

                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom" aria-describedby="emailHelp" name="nom">

                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" aria-describedby="emailHelp" name="prenom">

                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">

                                        <label for="age" class="form-label">Age</label>
                                        <input type="number" class="form-control" id="age" aria-describedby="emailHelp" name="age">

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn colorange" form="formupdate">Mettre à jour</button>
                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- Modal DELETE-->
                    <div class="modal fade" id="delete' . $ligne['id_contacts'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer un contact</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="login">
                            
                                <p>Ête-vous sûr de vouloir supprimer <br>' . $ligne['nom'] . ' <br> ' . $ligne['prenom'] . ' <br> ' . $ligne['email'] . '<br> agé de ' . $ligne['age'] . ' ans ?</p>

                                <form id="formdelete" action="delete.php" method="POST">
                                    <div class="mb-3">

                                        <input type="number" class="form-control" value="' . $ligne['id_contacts'] . '" name="id" hidden>

                
                                                    
                                    </div>s
                                </form>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn colred" form="formdelete">Supprimer</button>
                        </div>
                        </div>
                    </div>
                    </div>
                ';

            }


        ?>
            </tbody>
        </table>
        
        <!-- Modal INSERT-->
        <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout d'un nouveau contact</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="login">
                                <form id="forminsert" action="insert.php" method="POST">
                                    <div class="mb-3">

                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom" aria-describedby="emailHelp" name="nom">

                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" aria-describedby="emailHelp" name="prenom">

                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">

                                        <label for="age" class="form-label">Age</label>
                                        <input type="number" class="form-control" id="age" aria-describedby="emailHelp" name="age">

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn colgreen" form="forminsert">Insérer</button>
                        </div>
                        </div>
                    </div>
                    </div>
    </main>


    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>