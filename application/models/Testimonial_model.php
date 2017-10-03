<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Communicates with the testimonials table to add and retrieve testimonials
 *
 * @contributor Dino Cajic (dinocajic@gmail.com)
 */
class Testimonial_model extends CI_Model {

    /**
     * Returns a specific testimonial
     *
     * @param int $id - a specific id of a testimonial
     *
     * @return array
     */
    public function get_testimonial($id) {
        // @todo
    }

    /**
     * Returns an array of testimonials.
     *
     * @param int $num - the number of testimonials to return
     *
     * @return array
     */
    public function get_testimonials($num) {
        // @todo
    }

    /**
     * Adds a testimonial to the database
     *
     * @param array $data - testimonial details
     *
     * @return bool - success
     */
    public function add_testimonial($data) {
        // @todo
    }

    /**
     * Enable or disable a specific testimonial
     *
     * @param int $id - the id of the testimonial
     * @param bool $enabled - to enable or disable
     *
     * @return bool - success
     */
    public function enable_testimonial($id, $enabled) {
        // @todo
    }

    /**
     * Disables a specific testimonial
     *
     * @param int $id - the id of the testimonial
     *
     * @return bool - success
     */
    public function disable_testimonial($id) {
        return $this->enable_testimonial($id, false);
    }

    /**
     * Make a specific testimonial featured or remove it
     *
     * @param int $id - the id of a specific testimonial
     * @param bool $featured - enable or disable
     *
     * @return bool - success
     */
    public function make_featured($id, $featured) {
        // @todo
    }

    /**
     * Removes a specific testimonial from being featured
     *
     * @param int $id - the id of a specific testimonial
     *
     * @return bool - success
     */
    public function remove_featured($id) {
        return $this->make_featured($id, false);
    }
}