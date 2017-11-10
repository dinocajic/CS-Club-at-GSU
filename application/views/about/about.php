<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @contributor Dino Cajic (dinocajic@gmail.com)
 */
?>
<!-- Add HTML to create About View -->

<section id="about">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">ABOUT TO THE CLUB</h2>
            <p class="text-center wow fadeInDown">The Computer Science Club of Georgia State University was formed in December of 2010. The upcoming community aims to bring together students and faculty interested in the field of Computer Science to share their knowledge and experience in computers.</p>
            <p class="text-center wow fadeInDown">With today's competitive job market, it is imperative that every student is actively involved in the oragnization related to their field of discipline. The CS Club is devoted for student success in the field of computer science. By participating actively in the club, students will learn to more effectively collaborate among other students and faculties, ensuring their preparedness to face the real world beyond college education.</p>
            <p class="text-center wow fadeInDown">Our goal is simple, encourage all members to actively engage in our events to collaborate with other students and faculties which will ultimately enhance their knowledge about computers.</p>
        </div>

        <div class="row">


            <div class="col-sm-6 wow fadeInRight">
                <h3 class="column-title">Officers</h3>

                <?php $begin =1;
                      $end=2;
                while($begin <= $end){ ?>
                <div class="wow fadeInUp">
                  <div class="col-lg-4">
                    <img src="<?php echo base_url().$user[$begin]['user_image']; ?>"  alt="Image Unavailable" width="50%">

                    <h4><?php echo $user[$begin]['first_name']." ".$user[$begin]['last_name']  ?></h4>
                    <h6><?php  echo $user[$begin]['role']?></h6>

                    <p><?php echo $user[$begin]['emails'][0]['email'];?></p>

                  </div>

                </div>
              <?php $begin++; }?>

                <a class="btn btn-primary" href="#">Join Us</a>

            </div>

        </div>
    </div>
</section><!--/#about-->
