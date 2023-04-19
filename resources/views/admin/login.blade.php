<!DOCTYPE html>
<html>
    <head>
        <!--Bootstrap 4 docs: https://getbootstrap.com/docs/4.0/getting-started/introduction/-->
        <meta charset="utf-8">
        <title>ReadMe BookShop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    
        <link rel="stylesheet" href="../styles/global.css">
        <link rel="stylesheet" href="../styles/adm_editproduct.css">
        <link rel="icon" href="../res/book_icon/favicon.ico">
        <link rel="stylesheet" href="../styles/register.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#"><img src="../res/logo.png"alt="Read me" title="logo of read me"></a>
                    <div class="adm-navigation-actions">
                        <div class="profile-group">
                            <a href="#" id="profile" title="profile button"><span class="fa-sharp fa-solid fa-circle-user clickable" ></span></a>
                            <form class="hideable">
                                <button class="btn" id="logout">odhlasiť sa </button>
                            </form>
                        </div>  
                    </div>  
            </nav>
        </header>

        <main class="container">
            <section class="row justify-content-center">
                <div class="register-container col-lg-6 col-md-9 col-sm-12 col-12">
                    <h1>Prihlásenie</h1>
                    <form>
                        <fieldset> 
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input class="form-control" type="email" name="email" placeholder="Zadajte e-mail..." required>
                            </div>
                            <div class="form-group password-container">
                                <label for="heslo">Heslo</label>
                                <input class="form-control" type="password" id="passwordInput" placeholder="Zadajte heslo..." required>
                                <span class="far fa-eye-slash" id="show-password" onclick="showPassword(passwordInput)"></span>
                            </div>
                            <div class="btn-center">
                                <button class="btn" form="register-form">Prihlásiť sa</button>
                            </div>
                        </fieldset>
                    </form>
                </div>

            </section>
        </main>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
        <script src="../js/navigation.js"></script>
        <script src="../js/password_input.js"></script>
    </body>
</html>