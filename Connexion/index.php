<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Connexion</title>
        </head>
        <body>
        
        <div class="login-form">
             <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            
            <form action="connexion.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
            <p class="text-center"><a href="inscription.php">Inscription</a></p>
        </div>
        <style>
              
              @font-face {
              font-family: 'Beaufort';
              src: url('ASSETS/Beaufort.otf') format('truetype');
                }

            body {
               font-family: "Beaufort", sans-serif;
                background-image: url('ASSETS/Background.png');
                background-repeat: no-repeat;
                background-size: cover;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                }
            .text-center {
                font-size: 50px;
                color: white;
                text-decoration: none;
            }   

            button:hover {
            background-color: #2980b9;
            }
            a:visited {
                text-decoration: none;
                }
            .login-form {
                width: 340px;
                margin: 50px auto;
                background: linear-gradient(to bottom right,#091428d3, #0a1428cc);
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 0 10px #0A1428;
                color: white;
                }
            input {
                margin-bottom: 10px;
                background-color: #1a1a1a;
                border-color: #785A28;
                color: white;
                }   
            input:focus {
                background-color: black;
                }
            .login-form h2 {
                margin: 0 0 15px;
                
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
                margin-bottom: 10px;
                background-color: #1a1a1a;
                border-color: #785A28;
                color: white;
            }
            .btn {        
                font-size: 25px;
                font-weight: bold;
            }

        

        </style>
        </body>
</html>