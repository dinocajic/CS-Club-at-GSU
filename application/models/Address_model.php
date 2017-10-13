<?php
/**
 * Communicates with the addresses table to add and retrieve addresses
 *
 * @author Dino Cajic
 * @email dinocajic@gmail.com
 */
class Address_model extends CI_Model {

    /**
     * Checks whole address validity.
     *
     * @param $street
     * @param $city
     * @param $state
     * @param $zip
     *
     * @return bool
     */
    public function is_valid_address($street, $city, $state, $zip) {

        if ( !$this->is_valid_street($street) ) {
            return false;
        }

        if ( !$this->is_valid_city($city) ) {
            return false;
        }

        if ( !$this->is_valid_state($state) ) {
            return false;
        }

        if ( !$this->is_valid_zip($zip) ) {
            return false;
        }

        return true;
    }

    /**
     * Checks to see if the street address is valid. It's not meant to be too restrictive.
     *
     * @param $street - street address
     *
     * @return bool
     */
    public function is_valid_street($street) {
        // A digit 1 or more times followed by a space followed by digits, numbers, spaces, #, periods 1 or more times
        $regex = '/^([0-9])+\s([0-9a-zA-Z\s#\.])+/';

        if ( preg_match($regex, $street) == 1 ) {
            return true;
        }

        return false;
    }

    /**
     * Checks to make sure the city entered is valid. It's not meant to be too restrictive.
     * The longest city name is Chargoggagoggmanchauggagoggchaubunagungamaugg (45 letters) in Massachusetts
     *
     * @param $city
     *
     * @return bool
     */
    public function is_valid_city($city) {
        $regex = '/^([^\d]){1,50}$/';

        if ( preg_match($regex, $city) == 1 ) {
            return true;
        }

        return false;
    }

    /**
     * Checks to see if the state is valid
     *
     * @param $state - Either 2 character abbreviation or full state name
     *
     * @return bool
     */
    public function is_valid_state($state) {
        $this->db->select("id");

        if ( strlen($state) == 2 ) {
            $this->db->where("state_code", $state);
        } else {
            $this->db->where("state_name", $state);
        }

        $this->db->from("states");

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return true;
        } else{
            return false;
        }

    }

    /**
     * Checks to see if the zip-code entered is valid
     *
     * @param int|string $zip - 30333 as int or "30333-1234" can be passed
     *
     * @return bool
     */
    public function is_valid_zip($zip) {
        if ( preg_match("/^([0-9]{5})(-[0-9]{4})?$/i", $zip) ) {
            return true;
        }

        return false;
    }

    /**
     * Checks to see if the address already exists in the addresses table
     *
     * @param $street
     * @param $city
     * @param $state
     * @param $zip
     *
     * @return bool
     */
    public function does_exist($street, $city, $state, $zip) {
        $zip = $this->format_zip($zip);

        $this->db->select("id");
        $this->db->where("street",$street);
        $this->db->where("city",$city);
        $this->db->where("state",$state);
        $this->db->where("zip",$zip);
        $this->db->from("addresses");

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return true;
        } else{
            return false;
        }
    }

    /**
     * Adds an address into the addresses table.
     * You should run is_valid_address() prior to using this method
     *
     * @param $street
     * @param $city
     * @param $state
     * @param $zip
     *
     * @return int - address id if successful or -1 if not successful
     */
    public function add_address($street, $city, $state, $zip) {
        $zip = $this->format_zip($zip);

        if ( $this->does_exist($street, $city, $state, $zip) ) {
            return $this->get_address_id($street, $city, $state, $zip);
        }

        $data = array(
            'street' => $street,
            'city'   => $city,
            'state'  => $state,
            'zip'    => $zip
        );

        $this->db->insert('addresses', $data);

        if ( $this->db->affected_rows() > 0 ) {
            return $this->db->insert_id();
        } else {
            return -1;
        }
    }

    /**
     * Returns the id associated with the email address
     *
     * @param $street
     * @param $city
     * @param $state
     * @param $zip
     *
     * @return int - the address id
     */
    public function get_address_id($street, $city, $state, $zip) {
        $zip = $this->format_zip($zip);

        $this->db->select("id");
        $this->db->where("street", $street);
        $this->db->where("city", $city);
        $this->db->where("state", $state);
        $this->db->where("zip", $zip);
        $this->db->from("addresses");

        $query = $this->db->get();
        $row   = $query->row();

        if ( is_object($row) ) {
            return (int)$row->id;
        } else {
            return -1;
        }
    }

    /**
     * Returns the address by specifying the address id
     *
     * @param $id
     *
     * @return array - empty if nothing found or address if found
     */
    public function get_address($id) {
        $this->db->select("street");
        $this->db->select("city");
        $this->db->select("state");
        $this->db->select("zip");
        $this->db->where("id", $id);
        $this->db->from("addresses");

        $query = $this->db->get();
        $row   = $query->row();

        $address = array();

        if ( is_object($row) ) {
            $address['street'] = $row->street;
            $address['city']   = $row->city;
            $address['state']  = $row->state;
            $address['zip']    = $row->zip;
        }

        return $address;
    }

    /**
     * Zip codes can have the format XXXXX or XXXXX-XXXX. We don't want to store XXXXX-XXXX so the method
     * returns only the first 5 digits.
     *
     * @param $zip
     *
     * @return int
     */
    private function format_zip($zip) {
        $zip = substr($zip, 0, 5);
        $zip = (int)$zip;

        return $zip;
    }
}