<?php include "connexion.php"; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>app_organisation_contacts</title>
    <!-- botstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
    <!-- mon css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- header code pen -->
    <header>
        <!--Hey! This is the original version
            of Simple CSS Waves-->

        <div class="header">

        <!--Content before waves-->
        <div class="inner-header flex">
        <!--Just the logo.. Don't mind this-->
        <svg version="1.1" class="logo" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" xml:space="preserve">
        <path fill="#FFFFFF" stroke="#000000" stroke-width="10" stroke-miterlimit="10" d="M57,283" />
        </svg>
        <h1>TABLEAU DES CONTACTS</h1>
        </div>

        <!--Waves Container-->
        <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
        </g>
        </svg>
        </div>
        <!--Waves end-->

        </div>
        <!--Header ends-->

        <!--Content starts-->
        <div class="content flex">
        <p>Hugo | DAIN </p>
        </div>
        <!--Content ends-->
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
                        <button type="button" class="btn colgreen button-3d" data-bs-toggle="modal" data-bs-target="#insert">
                        INSERER
                        </button>
                    </th>
                    </tr>
                </thead>
                <tbody> 


        <?php

        
            $connexion = new ma_connexion("localhost", "app_organisation_contacts", "root", "");
            $afficher = $connexion->select("*", "contacts");

            foreach ($afficher as $ligne) {
                echo '
                    <tr>
                        <td><strong>' . $ligne['nom'] . '</strong></td>
                        <td>' . $ligne['prenom'] . '</td>
                        <td>' . $ligne['email'] . '</td>
                        <td>' . $ligne['age'] . '</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn colorange button-3d" data-bs-toggle="modal" data-bs-target="#update' . $ligne['id_contacts'] . '">
                                MAJ
                            </button>
                            <button type="button" class="btn colred button-3d" data-bs-toggle="modal" data-bs-target="#delete' . $ligne['id_contacts'] . '">
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
                                    <button type="button" class="btn-close button-3d" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Êtes-vous sûr de vouloir mettre à jour ' . $ligne['nom'] . ' ' . $ligne['prenom'] . ' ' . $ligne['email'] . ' âgé de ' . $ligne['age'] . ' ans ?</p>
                                    <div class="login">
                                        <form id="formupdate' . $ligne['id_contacts'] . '" action="update.php" method="POST">
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
                                    <button type="button" class="btn btn-secondary button-3d" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn colorange button-3d" form="formupdate' . $ligne['id_contacts'] . '">Mettre à jour</button>
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
                                    <button type="button" class="btn-close button-3d" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="login">
                                        <p>Êtes-vous sûr de vouloir supprimer <br>' . $ligne['nom'] . ' <br> ' . $ligne['prenom'] . ' <br> ' . $ligne['email'] . '<br> âgé de ' . $ligne['age'] . ' ans ?</p>
                                        <form id="formdelete' . $ligne['id_contacts'] . '" action="delete.php" method="POST">
                                            <div class="mb-3">
                                                <input type="number" class="form-control" value="' . $ligne['id_contacts'] . '" name="id" hidden>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary button-3d" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn colred button-3d" form="formdelete' . $ligne['id_contacts'] . '">Supprimer</button>
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
                            <button type="button" class="btn-close button-3d" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <button type="button" class="btn btn-secondary button-3d" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn colgreen button-3d" form="forminsert">Insérer</button>
                        </div>
                        </div>
                    </div>
                    </div>
    </main>


    <!-- footer code pen -->
    <footer>
    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
        </g>
        </svg>
        </div>    

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>