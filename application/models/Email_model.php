<?php
/**
 * Communicates with the emails table to add and retrieve emails
 *
 * @contributor Dino Cajic (dinocajic@gmail.com)
 */
class Email_model extends CI_Model {

    /**
     * Checks to see if a particular email address is valid
     *
     * @param string $email_address
     *
     * @return bool
     */
    public function is_valid($email_address) {
        // @todo Will need some email verification code here. Use google
    }

    /**
     * Checks to see if the email address already exists in the emails table
     *
     * @param string $email_address
     *
     * @return bool
     */
    public function does_exist($email_address) {
        //@todo
    }

    /**
     * Adds an email to the emails table.
     * You should run is_valid() prior to using this method
     *
     * @param string $email_address
     *
     * @return int - email id
     */
    public function add_email($email_address) {

        if ( $this->does_exist($email_address) ) {
            return $this->get_email_id($email_address);
        }

        // @todo if new email, add the email to the emails table and return $id
    }

    /**
     * Returns the id associated with the email address
     *
     * @param string $email_address
     *
     * @return int - the email address id
     */
    public function get_email_id($email_address) {
        // @todo
    }

    /**
     * Returns the email address by specifying the id associated with the email address
     *
     * @param int $id
     *
     * @return string - email address
     */
    public function get_email_address($id) {
        // @todo
    }

    /**
     * Returns a specified number of emails. If parameter is omitted, it'll return all emails
     *
     * @param int $num - the number of emails to return
     *
     * @return array - a list of emails
     */
    public function get_emails($num = 0) {
        // @todo
    }

    /**
     * Returns an array of all emails in the emails table
     *
     * @return array
     */
    public function get_all_emails() {
        return $this->get_emails();
    }
}
