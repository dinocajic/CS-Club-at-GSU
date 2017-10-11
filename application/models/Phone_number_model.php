<?php
/**
 * Communicates with the phone_numbers table to add and retrieve phone numbers
 *
 * @author Dino Cajic
 * @email dinocajic@gmail.com
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
        // Remove any non-digits
        $phone_number = preg_replace("/[^0-9]/", "", $phone_number);

        // If leading 1 exists, take it out
        if ( strlen($phone_number) == 11 ) {
            $phone_number = preg_replace("/^1/", "", $phone_number);
        }

        // If phone number is 10 digits long, then it's most likely valid
        return strlen($phone_number) == 10;
    }

    /**
     * Checks to see if the phone number already exists in the phone_numbers table
     *
     * @param string $phone_number
     *
     * @return bool
     */
    public function does_exist($phone_number) {
        $this->db->select("id");
        $this->db->where("phone_number", $phone_number);
        $this->db->from("phone_numbers");

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return true;
        } else{
            return false;
        }
    }

    /**
     * Adds a phone number to the phone_numbers table.
     * You should run is_valid() prior to using this method
     *
     * @param string $phone_number
     * @param int $phone_number_type_id - set to default of 1 which is "Cell Phone" in phone_number_types table
     *
     * @return int - phone number id if successful and -1 if unsuccessful
     */
    public function add_phone_number($phone_number, $phone_number_type_id = 1) {

        if ( $this->does_exist($phone_number) ) {
            return $this->get_phone_number_id($phone_number);
        }

        $data = array(
            'phone_number'         => $phone_number,
            'phone_number_type_id' => $phone_number_type_id
        );

        $this->db->insert('phone_numbers', $data);

        if ( $this->db->affected_rows() > 0 ) {
            return $this->db->insert_id();
        } else {
            return -1;
        }
    }

    /**
     * Returns the id associated with the phone number
     *
     * @param string $phone_number
     *
     * @return int - the phone number id if exists or -1 if it doesn't exist
     */
    public function get_phone_number_id($phone_number) {
        $this->db->select("id");
        $this->db->where("phone_number", $phone_number);
        $this->db->from("phone_numbers");

        $query = $this->db->get();
        $row   = $query->row();

        if ( is_object($row) ) {
            return (int)$row->id;
        } else {
            return -1;
        }
    }

    /**
     * Returns the phone number by specifying the id associated with the phone number
     *
     * @param int $id - the phone number id
     *
     * @return string - phone number
     */
    public function get_phone_number($id) {
        $this->db->select("phone_number");
        $this->db->where("id", $id);
        $this->db->from("phone_numbers");

        $query = $this->db->get();
        $row   = $query->row();

        if ( is_object($row) ) {
            return $row->phone_number;
        } else {
            return "Does not exist";
        }
    }

    /**
     * Returns the phone number and the phone type by specifying the id associated with the phone number
     *
     * @param int $id - the phone number id
     *
     * @return array - phone number and type
     */
    public function get_phone_number_with_type($id) {
        $this->db->select("phone_numbers.phone_number");
        $this->db->select("phone_number_types.type");
        $this->db->where("phone_numbers.id", $id);
        $this->db->from("phone_numbers");

        $this->db->join(
            "phone_number_types",
            "phone_numbers.phone_number_type_id = phone_number_types.id",
            "left"
        );

        $query = $this->db->get();
        $row   = $query->row();

        $phone_number = array();

        if ( is_object($row) ) {
            $phone_number = array(
                "number" => $row->phone_number,
                "type"   => $row->type
            );
        }

        return $phone_number;
    }
}