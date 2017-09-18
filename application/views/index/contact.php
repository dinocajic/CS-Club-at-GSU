<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Dino Cajic
 * @email  dinocajic@gmail.com
 */

?>
<section id="contact-area">
    <div class="container">
        <div class="row">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Send Message</h2>
                <p class="text-center wow fadeInDown animated" style="visibility: visible;">Drop a line to us. Your word is most important to us.</p>
            </div>
            <form id="main-contact-form" name="contact-form" method="post" action="#">
                <div class="col-lg-6 animated animate-from-left" style="opacity: 1; left: 0px;">

                    <div class="form-group">
                        <label for="name">Your Name (Required)</label>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required>
                    </div>

                </div>
                <div class="col-lg-6 animated animate-from-right" style="opacity: 1; right: 0px;">
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea name="message" id="message" class="form-control" rows="8" placeholder="Message" required></textarea>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="text-center">

                    <button type="submit" class="btn btn-primary btn-lg btn-send-msg">Send Message</button>

                </div>

            </form>

        </div>
    </div>
</section><!--/#bottom-->