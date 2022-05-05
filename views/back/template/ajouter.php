<?php
include './../../../model/user.php';
include './../../../controller/usercontroller.php';
 
// Define variables and initialize with empty values
$username = $prenom = $nom = "";
$username_err = $prenom_err = $nom_err = "";
$email = $mdp = $adresse = $rolee ="";
$email_err = $mdp_err = $adresse_err = $rolee_err = "";
// Processing form data when form is submitted
if(isset($_POST['add'])){
    // Validate username
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter a username.";
    } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $username_err = "Please enter a valid username.";
    } else{
        $username = $input_username;
    }
    
    // Validate prenom
    $input_prenom = trim($_POST["prenom"]);
    if(empty($input_prenom)){
        $prenom_err = "Please enter an prenom.";     
    } else{
        $prenom = $input_prenom;
    }
    
    // Validate nom
    $input_nom = trim($_POST["nom"]);
    if(empty($input_nom)){
        $nom_err = "Please enter the nom .";     
    } elseif(!filter_var($input_nom, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nom_err = "Please enter a positive integer value.";
    } else{
        $nom = $input_nom;
    }
      // Validate email
      $input_email = trim($_POST["email"]);
      if(empty($input_email)){
          $email_err = "Please enter your email.";
      } elseif(!filter_var($input_email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^.+@.+\.[a-zA-Z]{2,}$/")))){
          $email_err = "Please enter a valid username.";
      } else{
          $email = $input_email;
      }
      
      // Validate mdp
      $input_mdp = trim($_POST["mdp"]);
      if(empty($input_mdp)){
        $mdp_err = "Please enter your mdp.";
    } elseif(!filter_var($input_mdp, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $mdp_err = "Please enter a valid username.";
    } else{
        $mdp = $input_mdp;
    }
          // Validate adresse
          $input_adresse = trim($_POST["adresse"]);
          if(empty($input_adresse)){
              $adresse_err = "Please enter an adresse.";     
          } else{
              $adresse = $input_adresse;
          }
      // Validate rolee
      $input_rolee = trim($_POST["rolee"]);
      if(empty($input_rolee)){
          $rolee_err = "Please enter the rolee .";     
      } elseif(!filter_var($input_rolee, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
          $rolee_err = "Please enter a positive integer value.";
      } else{
          $rolee = $input_rolee;
      }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($adresse_err) && empty($nom_err) && empty($prenom_err) && empty($email_err) && empty($mdp_err) && empty($rolee_err)){
      
            $utilisateur = new utilisateur($prenom,$nom,$email,$mdp,$adresse,$rolee,$username);
    $empC= new user();
    $empC->inscription($utilisateur);
           
         
    header('location: gestion_des_clients.php');
    }
    
         
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>username</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                       
                        
                            <label>prenom</label>
                            <input name="prenom" class="form-control <?php echo (!empty($prenom_err)) ? 'is-invalid' : ''; ?>"><?php echo $prenom; ?></textarea>
                            <span class="invalid-feedback"><?php echo $prenom_err;?></span>
                      
                  
                            <label>nom</label>
                            <input type="text" name="nom" class="form-control <?php echo (!empty($nom_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nom; ?>">
                            <span class="invalid-feedback"><?php echo $nom_err;?></span>
                      
                        <label>email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                     
                       
                            <label>mot de passe</label>
                            <input  name="mdp" class="form-control <?php echo (!empty($mdp_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mdp; ?>">
                            <span class="invalid-feedback"><?php echo $mdp_err;?></span>
                       
                            <label>Adresse</label>
                            <input name="adresse" class="form-control <?php echo (!empty($adresse_err)) ? 'is-invalid' : ''; ?>"> <?php echo $adresse; ?></textarea>
                            <span class="invalid-feedback"><?php echo $adresse_err;?></span>
                            <label>role</label>
                        <select name="rolee" id="rolee"class="form-control <?php echo (!empty($adresse_err)) ? 'is-invalid' : ''; ?>">
		                        <option value="client">client</option>
		                        <option value="admin">admin</option>
                            <span class="invalid-feedback"><?php echo $rolee_err;?></span>


                        <input type="submit" name="add" class="btn btn-primary" value="Submit">
                        <a href="gestion_des_clients.php" class="btn btn-secondary ml-2">Cancel</a>
                       
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>