<?php
// Set header response to json format
// header("Content-Type:application/json");
// filter by views
include("../admin/research/functions/DB.func.php");
include("../admin/research/inc/db.php");
?>
<table id="table_id" class="display">
   <tbody id="tblresult">
<?php 
if(isset($_GET["req"]))
{
   $req = $_GET['req'];


   if($_GET['a'] != "")
   {
     $title = $_GET['a'];
     
     if($_GET['u'] == "r")
     {
       $result = get_researchfilter($connect,$title,$req);
         if ($result->num_rows>0) 
         {
           while ($data = mysqli_fetch_array($result))
           {
              ?>
              <tr>
              <div class="col-md-6 col-lg-10 offset-lg-1 wow bounceInUp" data-wow-duration="0.3s">
                 <div class="box">
                    <h4 class="title"><a href="./view/action.php?u=r&id=<?php echo $data['id'];?>" class="cls" id="<?php echo $data['id'];?>" ><span ><?php echo $data['title'];?></span></a></h4>
                    <ul class="list-inline" style="padding-left: 40px; font-size: small;">
                       <li class="list-inline-item" value="<?php echo $data['main_author'];?>"><b><u><span><?php echo $data['main_author'];?></span></u></b></li>
                       
                       <?php
                       foreach (explode(",", $data['co_authors']) as $variable => $tk) {
                       $variable>0;
                       $variable++;
                       ?><li class="list-inline-item" value="<?php echo $tk;?>"><u><?php echo ",$tk";?></u></li> <?php
                       }
                       ?>

                       <li class="list-inline-item" value="<?php echo $data['date_publish'];?>"><b> * Published <span><?php echo $data['date_publish'];?></span></b></li>
                       
                       <li class="list-inline-item" value="<?php echo $data['field_of_study'];?>" id="display-fstudy"><b> * <span><?php echo $data['field_of_study'];?></span></b></li>
                       
                    </ul>
                    <p class="description" value="<?php //echo $data['abstract'];?>"><span><?php echo $data['abstract'];?></span></p>
                    <ul class="list-inline" style="padding-left: 40px; font-size: small;">
                       <li class="list-inline-item" id="rView<?php echo $data['id'];?>" value="<?php echo $data['views'];?>"><b>Views: <?php echo $data['views'];?></b></li>
                       <li class="list-inline-item" id="rCite<?php echo $data['id'];?>" value="<?php echo $data['cites'];?>"><b>Cite: <?php echo $data['cites'];?></b></li>
                    </ul>
                 </div>
              </div>
              </tr>
              
           <?php
           }
        }
        else
        {
           ?>
           <div style="padding-left: 12px;">
              <h3>No Result Found</h3>
           </div>
           <?php
        }
     }
   }
   // research
   elseif($_GET['u'] == "j")
   {
     $result = get_journalfilter($connect,$title,$req);
       if ($result->num_rows>0) 
       {
       while ($data = mysqli_fetch_array($result))
       {
         ?>
         <tr>
           <div class="col-md-6 col-lg-10 offset-lg-1 wow bounceInUp" data-wow-duration="0.3s">
           <div class="box">
                  <h4 class="title"><a href="./view/action.php?u=j&id=<?php echo $data['id'];?>" class="cls" id="<?php echo $data['id'];?>"><span><?php echo $data['title'];?></span></a></h4>
                  <ul class="list-inline" style="padding-left: 40px; font-size: small;">
                     <li class="list-inline-item" value="<?php echo $data['author'];?>"><b><u><span><?php echo $data['author'];?></span></u></b></li>
                     
                     <li class="list-inline-item" value="<?php echo $data['datepub'];?>"><b> * Published <span><?php echo $data['datepub'];?></span></b></li>
                     
                     <li class="list-inline-item" value="<?php echo $data['fstudy'];?>"><b> * <span><?php echo $data['fstudy'];?></span></b></li>
                     
                  </ul>
                  <p class="description" value="
                  <?php 
                  echo $data['description'];
                  ?>"><?php echo $data['description'];?></p>
                  <ul class="list-inline" style="padding-left: 40px; font-size: small;">
                     <li class="list-inline-item" id="jView<?php echo $data['id'];?>" value="<?php echo $data['views'];?>"><b>Views: <?php echo $data['views'];?></b></li>
                     <li class="list-inline-item" id="jCite<?php echo $data['id'];?>" value="<?php echo $data['cites'];?>"><b>Cite: <?php echo $data['cites'];?></b></li>
                  </ul>
               </div>
           </div>
         </tr>
       <?php
       }
     }
     else
      {
         ?>
         <div style="padding-left: 12px;">
            <h3>No Result Found</h3>
         </div>
         <?php
      }
   }
   // journal
   elseif($_GET['u'] == "a")
   {
     $result = get_articlefilter($connect,$title,$req);
       if ($result->num_rows>0) 
       {
       while ($data = mysqli_fetch_array($result))
       {
         ?>
         <tr>
           <div class="col-md-6 col-lg-10 offset-lg-1 wow bounceInUp" data-wow-duration="0.3s">
           <div class="box">
             <h4 class="title"><a href="./view/action.php?u=a&id=<?php echo $data['id'];?>" class="cls" id="<?php echo $data['id'];?>"><span><?php echo $data['title'];?></span></a></h4>
               <ul class="list-inline" style="padding-left: 40px; font-size: small;">
                 <li class="list-inline-item" value="<?php echo $data['a_author'];?>"><b><u><span><?php echo $data['a_author'];?></span></u></b></li>
                     
                 <li class="list-inline-item" value="<?php echo $data['a_date_pub'];?>"><b> * Published <span><?php echo $data['a_date_pub'];?></span></b></li>
                     
                 <li class="list-inline-item" value="<?php echo $data['field_of_study'];?>"><b> * <span><?php echo $data['field_of_study'];?></span></b></li>
               </ul>
                  <p class="description" value="<?php echo $data['a_description'];?>"><span><?php echo $data['a_description'];?></span></p>
                  <ul class="list-inline" style="padding-left: 40px; font-size: small;">
                     <li class="list-inline-item" id="aView<?php echo $data['id'];?>" value="<?php echo $data['a_views'];?>"><b>Views: <?php echo $data['a_views'];?></b></li>
                     <li class="list-inline-item" id="aCite<?php echo $data['id'];?>" value="<?php echo $data['a_cites'];?>"><b>Cite: <?php echo $data['a_cites'];?></b></li>
               </ul>
               </div>
           </div>
         </tr>
       <?php
       }
     }
     else
      {
         ?>
         <div style="padding-left: 12px;">
            <h3>No Result Found</h3>
         </div>
         <?php
      }
   }
   elseif($_GET['u'] == "n")
   {
     $result = get_newsfilter($connect,$title,$req);
       if ($result->num_rows>0) 
       {
       while ($data = mysqli_fetch_array($result))
       {
         ?>
         <tr>
           <div class="col-md-6 col-lg-10 offset-lg-1 wow bounceInUp" data-wow-duration="0.3s">
             <div class="box">
               <h4 class="title"><a href="./view/action.php?u=n&id=<?php echo $data['id'];?>" class="cls" id="<?php echo $data['id'];?>"><span><?php echo $data['name'];?></span></a></h4>
               <ul class="list-inline" style="padding-left: 40px; font-size: small;">
                 <li class="list-inline-item" value="<?php echo $data['author'];?>"><b><u><span><?php echo $data['author'];?></span></u></b></li>
                    
                 <li class="list-inline-item" value="<?php echo $data['email'];?>"><b> * Published <span><?php echo $data['email'];?></span></b></li>
                     
               </ul>
               <p class="description" value="<?php echo $data['mobile'];?>"><span><?php echo $data['mobile'];?></span></p>
               <ul class="list-inline" style="padding-left: 40px; font-size: small;">
                 <li class="list-inline-item" id="nView<?php echo $data['id'];?>" value="<?php echo $data['views'];?>"><b>Views: <?php echo $data['views'];?></b></li>
                 <li class="list-inline-item" id="nCite<?php echo $data['id'];?>" value="<?php echo $data['cites'];?>"><b>Cite: <?php echo $data['cites'];?></b></li>
               </ul>
             </div>
           </div>
         </tr>
       <?php
       }
     }
     else
      {
         ?>
         <div style="padding-left: 12px;">
            <h3>No Result Found</h3>
         </div>
         <?php
      }
   }
   else
    {
      $title = "";
    }
}
?>
</tbody>
 </table>