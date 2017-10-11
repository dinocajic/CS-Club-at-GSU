<?php
/**
 * Communicates with the emails table to add and retrieve emails
 *
 * @author Dino Cajic
 * @email dinocajic@gmail.com
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
        if (filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Checks to see if the email address already exists in the emails table
     *
     * @param string $email_address
     *
     * @return bool
     */
    public function does_exist($email_address) {
        $this->db->select("id");
        $this->db->where("email_address",$email_address);
        $this->db->from("emails");

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return true;
        } else{
            return false;
        }
    }

    /**
     * Adds an email to the emails table.
     * You should run is_valid() prior to using this method
     *
     * @param string $email_address
     *
     * @return int - email id if successful or -1 if not successful
     */
    public function add_email($email_address) {

        if ( $this->does_exist($email_address) ) {
            return $this->get_email_id($email_address);
        }

        $data = array(
            'email_address' => $email_address
        );

        $this->db->insert('emails', $data);

        if ( $this->db->affected_rows() > 0 ) {
            return $this->db->insert_id();
        } else {
            return -1;
        }
    }

    /**
     * Returns the id associated with the email address
     *
     * @param string $email_address
     *
     * @return int - the email address id
     */
    public function get_email_id($email_address) {
        $this->db->select("id");
        $this->db->where("email_address",$email_address);
        $this->db->from("emails");

        $query = $this->db->get();
        $row   = $query->row();

        if ( is_object($row) ) {
            return (int)$row->id;
        } else {
            return -1;
        }
    }

    /**
     * Returns the email address by specifying the id associated with the email address
     *
     * @param int $id
     *
     * @return string - email address
     */
    public function get_email_address($id) {
        $this->db->select("email_address");
        $this->db->where("id", $id);
        $this->db->from("emails");

        $query = $this->db->get();
        $row   = $query->row();

        if ( is_object($row) ) {
            return $row->email_address;
        } else {
            return "Does not exist";
        }
    }

    /**
     * Returns a specified number of emails. If parameter is omitted, it'll return all emails
     *
     * @param int $num        - the number of emails to return
     * @param int $start_from - specify the id from which you would like to start.
     *
     * @return array - a list of emails
     */
    public function get_emails($num = 0, $start_from = 0) {
        $emails = array();

        $this->db->select("id");
        $this->db->select("email_address");
        $this->db->from("emails");

        if ( $num > 0 ) {
            $this->db->limit($num, $start_from);
        }

        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $emails[] = array(
                "id"            => $row->id,
                "email_address" => $row->email_address
            );
        }

        return $emails;
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
