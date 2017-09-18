<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Dino Cajic
 * @email  dinocajic@gmail.com
 */

?>
<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <div id="carousel-testimonial" class="carousel slide text-center" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <p><img class="img-circle img-thumbnail" src="<?php echo base_url(); ?>assets/images/testimonial/01.jpg" alt=""></p>
                            <h4>Dino Cajic</h4>
                            <small>President of the Computer Science Club</small>
                            <p>We're excited to see you're interested. Join the club: our goal is to increase the overall enjoyment in obtaining a Computer Science degree.</p>
                        </div>
                        <div class="item">
                            <p><img class="img-circle img-thumbnail" src="<?php echo base_url(); ?>assets/images/testimonial/02.jpg" alt=""></p>
                            <h4>Dr. Michael Weeks</h4>
                            <small>Faculty Adviser to the Computer Science Club</small>
                            <p>Some interesting quote/saying from Dr. Weeks.</p>
                        </div>
                    </div>

                    <!-- Controls -->
                    <div class="btns">
                        <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="prev">
                            <span class="fa fa-angle-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="next">
                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#testimonial-->