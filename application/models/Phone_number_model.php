<?php
/**
 * Communicates with the phone_numbers table to add and retrieve phone numbers
 *
 * @contributor Dino Cajic (dinocajic@gmail.com)
 */
class Phone_number_model extends CI_Model {

    /**
     * Checks to see if a particular phone number is valid
     *
     * @param string $phone_number
     *
     * @return bool
     */
    public function is_valid($phone_number) {
        // @todo Will need some phone number verification code here. Use google
    }

    /**
     * Checks to see if the phone number already exists in the phone_numbers table
     *
     * @param string $phone_number
     *
     * @return bool
     */
    public function does_exist($phone_number) {
        //@todo
    }

    /**
     * Adds a phone number to the phone_numbers table.
     * You should run is_valid() prior to using this method
     *
     * @param string $phone_number
     *
     * @return int - phone number id
     */
    public function add_phone_number($phone_number) {

        if ( $this->does_exist($phone_number) ) {
            return $this->get_phone_number_id($phone_number);
        }

        // @todo if new phone number, add the phone number to the phone_numbers table and return $id
    }

    /**
     * Returns the id associated with the phone number
     *
     * @param string $phone_number
     *
     * @return int - the phone number id
     */
    public function get_phone_number_id($phone_number) {
        // @todo
    }

    /**
     * Returns the phone number by specifying the id associated with the phone number
     *
     * @param int $id - the phone number id
     *
     * @return string - phone number
     */
    public function get_phone_number($id) {
        // @todo
    }
}