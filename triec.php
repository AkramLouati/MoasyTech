<?PHP
include_once "../Entities/produit.php";
include_once "../Core/produitC.php";
include_once "../Core/commandeC.php";
include_once "../Entities/commande.php";
session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{

$commande1C=new commandeC();
$commandes=$commande1C->recuperercommandes();
?>
<!DOCTYPE html>
<html lang="en">


            
        <!-- END HEADER MOBILE-->

      <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                 
                            <img src="images/999.png" alt="gstore" />
                    
            </div>
            
  



                
        </aside>
          
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            
            <!-- END HEADER DESKTOP-->

            
                                <!--  Data table-->
                            <br><br><br><br>
                      
 
                                     
                                
         <?PHP

include_once "../Core/commandeC.php";
$commande1C=new commandeC();
$liste=$commande1C->triec();

//var_dump($listeEmployes->fetchAll());
?>
                                
<table class="table table-bordered table-striped mb-none"  id="myTable2" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
                            <thead>
                                <tr>
                                                    <th style="color:rgb(44, 172, 171)">ID client</th>
                                                    <th style="color:rgb(44, 172, 171)">ID commande</th>
                                                    
                                                    <th style="color:rgb(44, 172, 171)">Date commande</th>
                                                    <th style="color:rgb(44, 172, 171)">Total</th>
                                                    <th style="color:rgb(44, 172, 171)">Adresse</th>
                                                    
                                                    
                                                </tr>
                                                 <?php foreach ($liste as $row)
                                     {
                                    ?>
                                    
                                    <tr>

                                        <td><?php echo $row["idClient"] ; ?></td>
                                        <td><?php echo $row["idCommande"] ; ?></a></td>

                                        

                                        <td><?php echo $row["dateCommande"] ; ?></td>
                                        <td><?php echo $row["montantCommande"]." TND" ; ?></td>
                                        
                                        <td><?php echo $row["lieuLivraison"] ; ?></td>
                                       
                                                  

                                          <td>

                                             

                                          <td> 
                                            
                                              
                                                
                                              </td>
                                              
                                          
                                          

                                          
                                          </tr>
                                        

       </form>
                               </tr>
                               
                                    
                                    <?php } ?>
</thead>






                                        </tr>
                                    </tbody>
                                    
                                    
                                    
                                    
                                    
                    </table>
                                
                                
                                
                                
                                                  
                                                  
                                                 
                                                  
                                                                                                  
</td>


    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
<?php
  }
?>
