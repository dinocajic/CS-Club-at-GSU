<?php
/**
 * User_model
 *
 * @author Dino Cajic
 * @email dinocajic@gmail.com
 */
class User_model extends CI_Model {

    /**
     * Checks to see if a username exists
     *
     * @param string $username
     *
     * @return bool - true if username does not exist, false it exists
     */
    public function does_username_exist($username) {
        return $this->get_user_id($username) != -1;
    }

    /**
     * Adds a user to the system. The initial setup is simple. The user can modify details after being added to the
     * system. The $data array must be submitted with the following items
     *   $data['username']
     *   $data['password']
     *   $data['first_name']
     *   $data['last_name']
     *   $data['email']
     *   $data['user_role']
     *
     * @param array $data - user information
     *
     * @return int|array
     */
    public function add_user($data) {
        $errors = null;

        // First check to see if the data that was submitted was valid
        $errors = $this->is_user_data_valid($data);

        if ( $errors !== null ) {
            return $errors;
        }

        // Next, check to see if the username already exists
        if ( $this->does_username_exist($data['username']) ) {
            $errors['username'] = "The user already exists";
            return $errors;
        }

        // Insert the user into the users table
        $user_id = $this->insert_into_users_table($data);

        if ( $user_id == -1 ) {
            $errors['error_one'] = "Could not insert user";
            return $errors;
        }

        // Insert the user into the user_details table
        if ( $this->insert_into_user_details_table($data, $user_id) == -1 ) {
            $errors['error_two'] = "Could not insert user";
            return $errors;
        }

        // Link user to a specified role
        if ( $this->link_user_to_role($data['user_role'], $user_id) == -1 ) {
            $errors['error_three'] = "Could not insert user";
            return $errors;
        }

        // Insert the user's email address and link email address to user's account
        $this->load->model("email_model");
        $email_id = $this->email_model->add_email($data['email']);

        if ( $email_id == -1 ) {
            $errors['error_four'] = "Could not insert user";
            return $errors;
        }

        if ( $this->link_user_to_email($email_id, $user_id) == -1 ) {
            $errors['error_five'] = "Could not insert user";
            return $errors;
        }

        // If everything is successfully inserted, return the user_id
        return $user_id;
    }

    /**
     * Check to see if the user data that was submitted is valid
     *
     * @param array $data
     *
     * @return null|array
     */
    private function is_user_data_valid($data) {
        $errors = null;

        if ( empty($data['username']) )   { $errors['username']   = 'You must specify a username'; }
        if ( empty($data['password']) )   { $errors['password']   = 'You must specify a password'; }
        if ( empty($data['first_name']) ) { $errors['first_name'] = 'You must specify a first name'; }
        if ( empty($data['last_name']) )  { $errors['last_name']  = 'You must specify a last name'; }
        if ( empty($data['email']) )      { $errors['email']      = 'You must specify an email address'; }

        return $errors;
    }

    /**
     * Adds the username, password and status into the users table
     *
     * @param array $user
     *
     * @return int - the newly inserted user's id
     */
    private function insert_into_users_table($user) {
        $data = array(
            'username' => $user['username'],
            'password' => $this->encrypt_password($user['password']),
            'status'   => 1 // status can be 0 or 1
        );

        $this->db->insert('users', $data);

        if ( $this->db->affected_rows() > 0 ) {
            return $this->db->insert_id();
        } else {
            return -1;
        }
    }

    /**
     * Encrypts the password string
     *
     * @param string $password
     *
     * @return string
     */
    private function encrypt_password($password) {
        $options = array("cost" => 4);
        $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

        return $hashPassword;
    }

    /**
     * Adds the first name, last name and links the user_details to users table with users_id
     *
     * @param array $data
     * @param int $user_id
     *
     * @return int - the inserted row id if successful or -1 if unsuccessful
     */
    private function insert_into_user_details_table($data, $user_id) {
        $data = array(
            'first_name'  => $data['first_name'],
            'last_name'   => $data['last_name'],
            'users_id'    => $user_id
        );

        $this->db->insert('user_details', $data);

        if ( $this->db->affected_rows() > 0 ) {
            return $this->db->insert_id();
        } else {
            return -1;
        }
    }

    /**
     * Links the user to a specific role
     *
     * @param int $user_role_id
     * @param int $user_id
     *
     * @return int
     */
    private function link_user_to_role($user_role_id, $user_id) {
        $data = array(
            'users_id' => $user_id,
            'roles_id' => $user_role_id
        );

        $this->db->insert('junc_user_roles', $data);

        if ( $this->db->affected_rows() > 0 ) {
            return $this->db->insert_id();
        } else {
            return -1;
        }
    }

    /**
     * Links the user to a specific email
     *
     * @param int $email_id
     * @param int $user_id
     *
     * @return int
     */
    private function link_user_to_email($email_id, $user_id) {
        $data = array(
            'users_id'  => $user_id,
            'emails_id' => $email_id,
            'from_date' => date("Y-m-d H:i:s")
        );

        $this->db->insert('junc_user_emails', $data);

        if ( $this->db->affected_rows() > 0 ) {
            return $this->db->insert_id();
        } else {
            return -1;
        }
    }

    /**
     * Returns the id associated with the username
     *
     * @param $username
     *
     * @return int - the user's id
     */
    public function get_user_id($username) {
        $this->db->select("id");
        $this->db->where("username", $username);
        $this->db->from("users");

        $query = $this->db->get();
        $row   = $query->row();

        if ( is_object($row) ) {
            return (int)$row->id;
        } else {
            return -1;
        }
    }

    /**
     * Returns the username by specifying the id associated with the user
     *
     * @param $id
     *
     * @return string - username if exists or "Does not exist" if it doesn't exist
     */
    public function get_username($id) {
        $this->db->select("username");
        $this->db->where("id", $id);
        $this->db->from("users");

        $query = $this->db->get();
        $row   = $query->row();

        if ( is_object($row) ) {
            return $row->username;
        } else {
            return "Does not exist";
        }
    }

    /**
     * Links a user to an address. Can be used to add or change an address.
     *
     * @param int $user_id - user's id from 'users' table
     * @param array $data - must contain keys: street, city, state, zip
     *
     * @return bool|array - true if successful, $errors array if errors
     */
    public function link_user_to_address($user_id, $data) {
        $this->load->model('address_model');

        $errors = null;

        // Check to see if the data that was submitted is valid
        if ( !$this->address_model->is_valid_address($data['street'], $data['city'], $data['state'], $data['zip']) ) {
            $errors['invalid_address'] = 'The address format you submitted is invalid: street, city, state, zip';
            return $errors;
        }

        // Check to see if new address is different from current address
        if ( $this->is_address_same($user_id, $data) ) {
            $errors['same_address'] = 'The address submitted is identical to current address';
            return $errors;
        }

        // Retire old address
        $this->unlink_address($user_id);

        // Check to see if new address already exists in database. Get address id
        if ( $this->address_model->does_exist($data['street'], $data['city'], $data['state'], $data['zip']) ) {
            $address_id = $this->address_model->get_address_id($data['street'], $data['city'], $data['state'], $data['zip']);
        } else {
            $address_id = $this->address_model->add_address($data['street'], $data['city'], $data['state'], $data['zip']);
        }

        // link new address
        $address = array(
            'users_id'     => $user_id,
            'addresses_id' => $address_id,
            'from_date'    => date("Y-m-d H:i:s")
        );

        $this->db->insert('junc_user_addresses', $address);

        if ( $this->db->affected_rows() > 0 ) {
            return true;
        } else {
            $errors['insert_issue'] = 'There was a problem inserting the new address';
            return $errors;
        }
    }

    /**
     * Checks to see if the user's current address is the same as the new address
     * $data must contain the following keys: street, city, state, zip
     *
     * @param int $user_id
     * @param array $data
     *
     * @return bool
     */
    private function is_address_same($user_id, $data) {
        $this->db->select('addresses.street');
        $this->db->select('addresses.city');
        $this->db->select('addresses.state');
        $this->db->select('addresses.zip');
        $this->db->from('junc_user_addresses');
        $this->db->where('junc_user_addresses.users_id', $user_id);
        $this->db->where('junc_user_addresses.to_date',  '0000-00-00 00:00:00');
        $this->db->join(
            'addresses',
            'junc_user_addresses.addresses_id = addresses.id',
            'left'
        );

        $query = $this->db->get();
        $row = $query->row();

        // If no address is linked, return false
        if ( !is_object($row) ) {
            return false;
        }

        // If the submitted data is identical, return true since the address is the same
        if ($data['street'] == $row->street &&
            $data['city']   == $row->city   &&
            $data['state']  == $row->state  &&
            $data['zip']    == (int)$row->zip)
        {
            return true;
        }

        // If the data is not identical, return false
        return false;
    }

    /**
     * Retires the current address by specifying the to_date to the current time
     *
     * @param int $user_id
     */
    private function unlink_address($user_id) {
        $data = array(
            'to_date' => date("Y-m-d H:i:s")
        );

        $this->db->where('users_id', $user_id);
        $this->db->where('to_date', '0000-00-00 00:00:00');
        $this->db->update('junc_user_addresses', $data);
    }

    /**
     * Links a user to a phone number. Can be used to add phone number
     *
     * @param int $user_id - the user's id as it appears in the 'users' table
     * @param string $phone_number - 10 digit format
     * @param int $phone_number_type_id - id of the phone number type located in 'phone_number_types' table
     *
     * @return bool|array - true if successful, $errors array if unsuccessful
     */
    public function link_user_to_new_phone_number($user_id, $phone_number, $phone_number_type_id = 1) {
        $this->load->model('phone_number_model');

        $errors = null;

        // Check to see if the phone number that was submitted is valid
        if ( !$this->phone_number_model->is_valid($phone_number) ) {
            $errors['invalid_phone'] = 'The phone number you entered is invalid';
            return $errors;
        }

        // Remove anything non-digit before starting
        $phone_number = $this->phone_number_model->clean_phone_number($phone_number);

        // Check to see if new phone number is different from current phone number
        if ( $this->is_phone_number_already_linked($user_id, $phone_number) ) {
            $errors['same_number'] = 'The phone number submitted is identical to the current phone number';
            return $errors;
        }

        // Since we're adding a new phone number, there's no need to unlink anything

        // Check to see if new phone number already exists in database. Get phone number id
        if ( $this->phone_number_model->does_exist($phone_number) ) {
            $phone_number_id = $this->phone_number_model->get_phone_number_id($phone_number);
        } else {
            $phone_number_id = $this->phone_number_model->add_phone_number($phone_number, $phone_number_type_id);
        }

        return $this->link_new_number($user_id, $phone_number_id);
    }

    /**
     * Links the user with the new number
     *
     * @param int $user_id
     * @param int $phone_number_id
     *
     * @return bool|array
     */
    private function link_new_number($user_id, $phone_number_id) {
        // Link new phone number
        $phone = array(
            'users_id'         => $user_id,
            'phone_numbers_id' => $phone_number_id,
            'from_date'        => date("Y-m-d H:i:s")
        );

        $this->db->insert('junc_user_phone_numbers', $phone);

        if ( $this->db->affected_rows() > 0 ) {
            return true;
        } else {
            $errors['insert_issue'] = 'There was a problem inserting the new phone number';
            return $errors;
        }
    }

    /**
     * Checks to see if the phone number that's currently in use is the same as previous
     *
     * @param int $user_id
     * @param string $phone_number
     *
     * @return bool - id of phone_number in question. False if it nothing exists or true if numbers are identical
     */
    private function is_phone_number_already_linked($user_id, $phone_number) {
        $this->db->select('junc_user_phone_numbers.id');
        $this->db->select('phone_numbers.phone_number');
        $this->db->from('junc_user_phone_numbers');
        $this->db->where('junc_user_phone_numbers.users_id', $user_id);
        $this->db->where('junc_user_phone_numbers.to_date',  '0000-00-00 00:00:00');
        $this->db->join(
            'phone_numbers',
            'junc_user_phone_numbers.phone_numbers_id = phone_numbers.id',
            'left'
        );

        $query = $this->db->get();

        $numbers_associated = null;

        foreach ($query->result() as $row) {
            $numbers_associated[] = array(
                'id' => $row->id,
                'num' => $row->phone_number
            );
        }

        // If no phone number is linked, return false
        if ( is_null($numbers_associated) ) {
            return false;
        }

        // If the submitted phone number is identical, return true since the phone number is the same
        foreach($numbers_associated as $number) {
            if ($number['num'] == $phone_number) {
                return true;
            }
        }

        return false;
    }

    /**
     * Allows the user to change a phone number
     *
     * @param int $user_id
     * @param string $old_phone_number
     * @param string $phone_number
     * @param int $phone_number_type_id
     *
     * @return array|bool - true if successfully changed or $errors array if there are errors
     */
    public function change_phone_number($user_id, $old_phone_number, $phone_number, $phone_number_type_id = 1) {
        $this->load->model('phone_number_model');

        $errors = null;

        // Check to see if the phone number that was submitted is valid
        if ( !$this->phone_number_model->is_valid($phone_number) ) {
            $errors['invalid_phone'] = 'The phone number you entered is invalid';
            return $errors;
        }

        // Remove anything non-digit before starting
        $phone_number = $this->phone_number_model->clean_phone_number($phone_number);

        // Check to see if new phone number already exists in database. Get phone number id.
        if ( $this->phone_number_model->does_exist($phone_number) ) {
            $phone_number_id = $this->phone_number_model->get_phone_number_id($phone_number);
        } else {
            $phone_number_id = $this->phone_number_model->add_phone_number($phone_number, $phone_number_type_id);
        }

        // Get the current linked id. This will be retired
        $current_num_id = $this->get_linked_number_id($user_id, $old_phone_number);

        if ($current_num_id != -1 &&
            $current_num_id['num'] == $phone_number_id) {
            $errors['same_number'] = "The number you chose is identical to the previous number";
            return $errors;
        }

        // Unlink the current number since the user is no longer needing it.
        $this->unlink_phone_number($current_num_id['id']);

        return $this->link_new_number($user_id, $phone_number_id);
    }

    /**
     * Returns the id associated with the junc_phone_numbers table
     *
     * @param int $user_id
     * @param string $phone_number
     *
     * @return int|array - the id of the specific row or -1 if it can't be found
     */
    private function get_linked_number_id($user_id, $phone_number) {
        $this->db->select('junc_user_phone_numbers.id');
        $this->db->select('junc_user_phone_numbers.phone_numbers_id');
        $this->db->from('junc_user_phone_numbers');
        $this->db->where('junc_user_phone_numbers.users_id', $user_id);
        $this->db->where('junc_user_phone_numbers.to_date',  '0000-00-00 00:00:00');
        $this->db->where('phone_numbers.phone_number', $phone_number);
        $this->db->join(
            'phone_numbers',
            'junc_user_phone_numbers.phone_numbers_id = phone_numbers.id',
            'left'
        );

        $query = $this->db->get();

        $active_numbers = null;

        foreach ($query->result() as $row) {
            $active_numbers = array(
                'id' => $row->id,
                'num' => $row->phone_numbers_id
            );
        }

        if ( !is_null($active_numbers) ) {
            return $active_numbers;
        }

        return -1;
    }

    /**
     * Unlinks the phone number by specifying the to_date as the current date-time.
     *
     * @param int $junc_phone_id - the id of the link located in junc_user_phone_numbers
     */
    private function unlink_phone_number($junc_phone_id) {
        $data = array(
            'to_date' => date("Y-m-d H:i:s")
        );

        $this->db->where('id', $junc_phone_id);
        $this->db->update('junc_user_phone_numbers', $data);
    }

    /**
     * Allows the user to change an email address
     *
     * @param int $user_id
     * @param string $email
     *
     * @return int|array - insertion id if successful or errors array if unsuccessful
     */
    public function change_email($user_id, $email) {
        $this->load->model('email_model');

        $errors = null;

        // Check to see if the email that was submitted is valid
        if ( !$this->email_model->is_valid($email) ) {
            $errors['invalid_email'] = 'The email address you entered is invalid';
            return $errors;
        }

        // Check to see if new email already exists in database. Get email address id.
        if ( $this->email_model->does_exist($email) ) {
            $email_id = $this->email_model->get_email_id($email);
        } else {
            $email_id = $this->email_model->add_email($email);
        }

        // Get the current linked id. This will be retired
        $current_email_id = $this->get_linked_email_id($user_id);

        if ($current_email_id != -1 &&
            $current_email_id['email'] == $email_id) {
            $errors['same_email'] = "The email you chose is identical to the current email";
            return $errors;
        }

        // Need to check to see if email is already linked to another account
        if ( $this->is_email_linked_to_another_account($email_id) ) {
            $errors['email_linked'] = "This email is already tied to another account";
            return $errors;
        }

        // Unlink the current email since the user is no longer needing it.
        $this->unlink_email($current_email_id['id']);

        var_dump($current_email_id['id']);

        return $this->link_user_to_email($email_id, $user_id);

    }

    /**
     * Gets the junction id for the currently linked email address
     *
     * @param int $user_id
     *
     * @return array|int - array if found and -1 if not found
     */
    private function get_linked_email_id($user_id) {
        $this->db->select('junc_user_emails.id');
        $this->db->select('junc_user_emails.emails_id');
        $this->db->from('junc_user_emails');
        $this->db->where('junc_user_emails.users_id', $user_id);
        $this->db->where('junc_user_emails.to_date',  '1970-01-01 00:00:00');
        $this->db->join(
            'emails',
            'junc_user_emails.emails_id = emails.id',
            'left'
        );

        $query = $this->db->get();
        $row = $query->row();

        $active_email = null;

        if ( is_object($row) ) {
            $active_email = array(
                'id' => $row->id,
                'email' => $row->emails_id
            );
        }

        if ( !is_null($active_email) ) {
            return $active_email;
        }

        return -1;
    }

    /**
     * Checks to see if the new email address is linked to any other account
     *
     * @param int $email_id
     *
     * @return bool
     */
    private function is_email_linked_to_another_account($email_id) {
        $this->db->select('id');
        $this->db->from('junc_user_emails');
        $this->db->where('emails_id', $email_id);
        $this->db->where('to_date', '1970-01-01 00:00:00');

        $query = $this->db->get();
        $row = $query->row();

        // If no email is linked, return false
        if ( !is_object($row) ) {
            return false;
        }

        return true;
    }

    /**
     * Unlinks the email from the user
     *
     * @param int $junc_email_id
     */
    private function unlink_email($junc_email_id) {
        $data = array(
            'to_date' => date("Y-m-d H:i:s")
        );

        $this->db->where('id', $junc_email_id);
        $this->db->update('junc_user_emails', $data);
    }

    /**
     * Allows the user to change their username
     *
     * @param int $user_id
     * @param string $new_username
     *
     * @return bool
     */
    public function change_username($user_id, $new_username) {
        $this->db->trans_start();

        $data = array(
            'username' => $new_username
        );

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);

        $this->db->trans_complete();

        // If update was unsuccessful, return false
        if ($this->db->trans_status() === FALSE) {
            return false;
        }

        return true;
    }

    /**
     * Allows the user to change the password
     *
     * @param int $user_id
     * @param string $new_password
     *
     * @return bool
     */
    public function change_password($user_id, $new_password) {
        $this->db->trans_start();

        $data = array(
            'password' => $this->encrypt_password($new_password)
        );

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);

        $this->db->trans_complete();

        // If update was unsuccessful, return false
        if ($this->db->trans_status() === FALSE) {
            return false;
        }

        return true;
    }

    /**
     * Allows the user to update the user's role
     *
     * @param int $user_id
     * @param int $new_role_id
     *
     * @return bool
     */
    public function change_user_role($user_id, $new_role_id) {
        $this->db->trans_start();

        $data = array(
            'roles_id' => $new_role_id
        );

        $this->db->where('users_id', $user_id);
        $this->db->update('junc_user_roles', $data);

        $this->db->trans_complete();

        // If update was unsuccessful, return false
        if ($this->db->trans_status() === FALSE) {
            return false;
        }

        return true;
    }

    /**
     * Enables or disables the user.
     *
     * @param int $user_id
     * @param int $status_id
     *   - 1: active
     *   - 2: inactive
     *   - 3: permanently banned
     *
     * @return bool
     */
    public function change_user_status($user_id, $status_id) {
        $this->db->trans_start();

        $data = array(
            'status' => $status_id
        );

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);

        $this->db->trans_complete();

        // If update was unsuccessful, return false
        if ($this->db->trans_status() === FALSE) {
            return false;
        }

        return true;
    }

    /**
     * Allows the user's account to be enabled
     *
     * @param int $user_id
     *
     * @return bool
     */
    public function enable_user($user_id) {
        return $this->change_user_status($user_id, 1);
    }

    /**
     * Allows the user's account to be disabled
     *
     * @param int $user_id
     *
     * @return bool
     */
    public function disable_user($user_id) {
        return $this->change_user_status($user_id, 2);
    }

    /**
     * Permanently bans the user
     *
     * @param int $user_id
     *
     * @return bool
     */
    public function ban_user($user_id) {
        return $this->change_user_status($user_id, 3);
    }

    /**
     * Returns the user's details
     *
     * @param int $user_id
     *
     * @return array|bool - false if user not found or array if user found
     */
    public function get_user_details($user_id) {
        $user_details = null;

        // Retrieve content from the users table
        $user_info = $this->get_user_info($user_id);

        if ($user_info !== false) {
            foreach($user_info as $key => $value) {
                $user_details[$key] = $value;
            }
        }

        // Retrieve content from the user_details table
        $user_details_info = $this->get_user_details_info($user_id);

        if ($user_details_info !== false) {
            foreach($user_details_info as $key => $value) {
                $user_details[$key] = $value;
            }
        }

        // Retrieve content from the user_social table
        $user_social_info = $this->get_user_social_info($user_id);

        if ($user_social_info !== false) {
            foreach($user_social_info as $key => $value) {
                $user_details_info[$key] = $value;
            }
        }

        // Retrieve a list of emails associated with the user's account
        $user_details['emails'] = $this->get_list_of_user_emails($user_id);

        // Retrieve a list of phone numbers for the user
        $user_details['phone_numbers'] = $this->get_list_of_user_phone_numbers($user_id);

        // Retrieve a list of addresses for the user
        $user_details['addresses'] = $this->get_list_of_user_addresses($user_id);

        return $user_details;
    }

    /**
     * Gets user info from the users database
     *
     * @param int $user_id
     * @return array|bool
     */
    public function get_user_info($user_id) {
        $this->db->select('username');
        $this->db->select('status');
        $this->db->from('users');
        $this->db->where('id', $user_id);

        $query = $this->db->get();
        $row = $query->row();

        if ( !is_object($row) ) {
            return false;
        }

        $data = array(
            "id"       => $user_id,
            "username" => $row->username,
            "status"   => $row->status
        );

        return $data;
    }

    /**
     * Returns the user details from the user_details table
     *
     * @param int $user_id
     * @return array|bool
     */
    public function get_user_details_info($user_id) {
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->select('user_image');
        $this->db->select('date_joined');
        $this->db->from('user_details');
        $this->db->where('users_id', $user_id);

        $query = $this->db->get();
        $row = $query->row();

        if ( !is_object($row) ) {
            return false;
        }

        $data = array(
            "first_name"  => $row->first_name,
            "last_name"   => $row->last_name,
            "user_image"  => $row->user_image,
            "date_joined" => $row->date_joined
        );

        return $data;
    }

    /**
     * Retrieve the user social info from the user_social table
     *
     * @param int $user_id
     * @return array|bool
     */
    public function get_user_social_info($user_id) {
        $this->db->select('bio');
        $this->db->select('homepage');
        $this->db->select('blog');
        $this->db->select('linkedin');
        $this->db->select('facebook');
        $this->db->select('twitter');
        $this->db->select('instagram');
        $this->db->select('github');
        $this->db->select('google_plus');
        $this->db->select('youtube');
        $this->db->from('user_social');
        $this->db->where('users_id', $user_id);

        $query = $this->db->get();
        $row = $query->row();

        if ( !is_object($row) ) {
            return false;
        }

        $data = array(
            "bio"         => $row->bio,
            "homepage"    => $row->homepage,
            "blog"        => $row->blog,
            "linkedin"    => $row->linkedin,
            "facebook"    => $row->facebook,
            "twitter"     => $row->twitter,
            "instagram"   => $row->instagram,
            "github"      => $row->github,
            "google_plus" => $row->google_plus,
            "youtube"     => $row->youtube
        );

        return $data;
    }

    /**
     * Gets all of the phone numbers associated for a particular user
     *
     * @param int $user_id
     *
     * @return array|null
     */
    public function get_list_of_user_phone_numbers($user_id) {
        $this->db->select('phone_numbers.phone_number');
        $this->db->select('phone_number_types.type');
        $this->db->select('junc_user_phone_numbers.from_date');
        $this->db->select('junc_user_phone_numbers.to_date');
        $this->db->from('junc_user_phone_numbers');
        $this->db->where('junc_user_phone_numbers.users_id', $user_id);
        $this->db->order_by('junc_user_phone_numbers.id', 'desc');

        $this->db->join(
            'phone_numbers',
            'junc_user_phone_numbers.phone_numbers_id = phone_numbers.id',
            'left'
        );
        $this->db->join(
            'phone_number_types',
            'phone_numbers.phone_number_type_id = phone_number_types.id',
            'left'
        );

        $query = $this->db->get();

        $nums_associated = null;

        foreach ($query->result() as $row) {
            $nums_associated[] = array(
                'phone_number' => $row->phone_number,
                'num_type'     => $row->type,
                'from_date'    => $row->from_date,
                'to_date'      => $row->to_date
            );
        }

        return $nums_associated;
    }

    /**
     * Get a list of user emails with the most current appearing in the first position
     *
     * @param int $user_id
     * @return array|null
     */
    public function get_list_of_user_emails($user_id) {
        $this->db->select('emails.email_address');
        $this->db->select('junc_user_emails.from_date');
        $this->db->select('junc_user_emails.to_date');
        $this->db->from('junc_user_emails');
        $this->db->where('junc_user_emails.users_id', $user_id);
        $this->db->order_by('junc_user_emails.id', 'desc');

        $this->db->join(
            'emails',
            'junc_user_emails.emails_id = emails.id',
            'left'
        );

        $query = $this->db->get();

        $emails_associated = null;

        foreach($query->result() as $row) {
            $emails_associated[] = array(
                'email' => $row->email_address,
                'from_date' => $row->from_date,
                'to_date' => $row->to_date
            );
        }

        return $emails_associated;
    }

    /**
     * Returns a list of user addresses
     *
     * @param $user_id
     * @return array|null
     */
    public function get_list_of_user_addresses($user_id) {
        $this->db->select('addresses.street');
        $this->db->select('addresses.city');
        $this->db->select('addresses.state');
        $this->db->select('addresses.zip');
        $this->db->select('junc_user_addresses.from_date');
        $this->db->select('junc_user_addresses.to_date');
        $this->db->from('junc_user_addresses');
        $this->db->where('junc_user_addresses.users_id', $user_id);
        $this->db->order_by('junc_user_addresses.to_date', 'asc');

        $this->db->join(
            'addresses',
            'junc_user_addresses.addresses_id = addresses.id',
            'left'
        );

        $query = $this->db->get();

        $addresses_associated = null;

        foreach($query->result() as $row) {
            $addresses_associated[] = array(
                'full_address' => $row->street . ', ' . $row->city . ', ' . ' ' . $row->state . ' ' . $row->zip,
                'street'       => $row->street,
                'city'         => $row->city,
                'state'        => $row->state,
                'zip'          => $row->zip,
                'from_date'    => $row->from_date,
                'to_date'      => $row->to_date
            );
        }

        return $addresses_associated;
    }

    /**
     * Updates the user's details
     *
     * @param array $data - must contain the key value pairs listed in the is_update_data_valid() method
     *
     * // also update phone number and address with methods above
     *                    change_phone_number($user_id, $old_phone_number, $phone_number, $phone_number_type_id = 1)
     *
     * @return bool|array
     */
    public function update_user($data) {
        $errors = null;

        if ( !$this->is_update_data_valid($data) ) {
            $errors['data_not_valid'] = "Please check your code since the array submitted is not valid";
            return $errors;
        }

        foreach($data as $key => $value) {
            switch($key) {
                case "users":
                    $this->update_user_info(
                        $data['users']['user_id'],
                        $value
                    );
                    break;
                case "user_details":
                    $this->update_user_details(
                        $data['users']['user_id'],
                        $value
                    );
                    break;
                case "user_email":
                    $this->change_email(
                        $data['users']['user_id'],
                        $data['user_email']['email']
                    );
                    break;
                case "user_phone":
                    $this->change_phone_number(
                        $data['users']['user_id'],
                        $data['user_phone']['old'],
                        $data['user_phone']['new'],
                        $data['user_phone']['phone_type_id']
                    );
                    break;
                case "user_address":
                    $this->link_user_to_address(
                        $data['users']['user_id'],
                        $value
                    );
                    break;
                case "user_social":
                    $this->update_user_social(
                        $data['users']['user_id'],
                        $value
                    );
                    break;
            }
        }

        return true;
    }

    /**
     * Checks to see if the input that was provided from the user has all of the necessary info. First checks to make
     * sure that the necessary keys are available and then checks to make sure that either an integer or a string is
     * submitted as the value of that element.
     *
     * @param array $input
     *
     * @return bool
     */
    private function is_update_data_valid($input) {
        $data = array();

        // The data listed below is just a placeholder. Validation method only tests the keys and data types
        $data['users']['user_id']            = 1;
        $data['users']['username']           = "dinocajic@gmail.com";
        $data['users']['status']             = 1;
        $data['user_details']['first_name']  = "Dino";
        $data['user_details']['last_name']   = "Cajic";
        $data['user_details']['user_image']  = "img/gallery/dinocajic.jpg";
        $data['user_email']['email']         = "dinocajic@gmail.com";
        $data['user_phone']['old']           = "5554443333";
        $data['user_phone']['new']           = "3332223333";
        $data['user_phone']['phone_type_id'] = 1;
        $data['user_address']['street']      = "1234 Something Ln";
        $data['user_address']['city']        = "Atlanta";
        $data['user_address']['state']       = "GA";
        $data['user_address']['zip']         = 30339;
        $data['user_social']['bio']          = "Something really long needs to go here";
        $data['user_social']['homepage']     = "http://dinocajic.xyz";
        $data['user_social']['blog']         = "http://dinocajic.com";
        $data['user_social']['linkedin']     = "https://www.linkedin.com/in/dinocajic/";
        $data['user_social']['facebook']     = "https://www.facebook.com/dinocajic";
        $data['user_social']['twitter']      = "https://twitter.com/dinocajic";
        $data['user_social']['instagram']    = "https://www.instagram.com/dinocajic/";
        $data['user_social']['github']       = "https://github.com/dinocajic";
        $data['user_social']['google_plus']  = "https://plus.google.com/u/0/+DinoCajic";
        $data['user_social']['youtube']      = "https://www.youtube.com/user/dinocajic";

        foreach($data as $key => $value) {
            foreach($value as $inner_key => $inner_value) {
                if ( !isset($input[$key][$inner_key]) ) {
                    return false;
                }

                if ( !is_int($input[$key][$inner_key]) && !is_string($input[$key][$inner_key])) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Updates the user's table
     *
     * @param int $user_id
     * @param array $data
     *
     * @return bool
     */
    public function update_user_info($user_id, $data) {
        $this->db->trans_start();

        $data = array(
            'username' => $data['username'],
            'status'   => $data['status']
        );

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        }

        return true;
    }

    /**
     * Updates the user_details table
     *
     * @param int $user_id
     * @param array $data
     *
     * @return bool
     */
    public function update_user_details($user_id, $data) {
        $this->db->trans_start();

        $data = array(
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'user_image' => $data['user_image']
        );

        $this->db->where('users_id', $user_id);
        $this->db->update('user_details', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        }

        return true;
    }

    /**
     * Updates the user_social table. If the data does not exist for that user, then it'll insert it.
     *
     * @param int $user_id
     * @param array $data
     *
     * @return bool
     */
    public function update_user_social($user_id, $data) {
        $this->db->trans_start();

        $data = array(
            'users_id'    => $user_id,
            'bio'         => $data['bio'],
            'homepage'    => $data['homepage'],
            'blog'        => $data['blog'],
            'linkedin'    => $data['linkedin'],
            'facebook'    => $data['facebook'],
            'twitter'     => $data['twitter'],
            'instagram'   => $data['instagram'],
            'github'      => $data['github'],
            'google_plus' => $data['google_plus'],
            'youtube'     => $data['youtube']
        );

        if ( $this->get_user_social_info($user_id) === false ) {
            // insert
            $this->db->insert('user_social', $data);
        } else {
            // update
            $this->db->where('users_id', $user_id);
            $this->db->update('user_social', $data);
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        }

        return true;
    }


}