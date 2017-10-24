<?php
/**
 * Roles_model
 *
 * @author Dino Cajic
 * @email dinocajic@gmail.com
 */
class Roles_model extends CI_Model {

    /**
     * Checks to see if the role exists
     *
     * @param string $role
     * @return bool
     */
    public function does_exist($role) {
        return $this->get_role_id($role) != -1;
    }

    /**
     * Returns the role associated with a particular id
     *
     * @param int $role_id
     * @return string - either role or error message
     */
    public function get_role($role_id) {
        $this->db->select("role");
        $this->db->where("id", $role_id);
        $this->db->from("roles");

        $query = $this->db->get();
        $row   = $query->row();

        if ( is_object($row) ) {
            return $row->role;
        } else {
            return "Does not exist";
        }
    }

    /**
     * Gets the role's id
     *
     * @param string $role
     * @return int
     */
    public function get_role_id($role) {
        $this->db->select("id");
        $this->db->where("role", $role);
        $this->db->from("roles");

        $query = $this->db->get();
        $row   = $query->row();

        if ( is_object($row) ) {
            return (int)$row->id;
        } else {
            return -1;
        }
    }

    /**
     * Add a role to the roles table
     *
     * @param string $role
     * @return int
     */
    public function add_role($role) {
        if ( $this->does_exist($role) ) {
            return $this->get_role_id($role);
        }

        $data = array(
            'role' => $role
        );

        $this->db->insert('roles', $data);

        if ( $this->db->affected_rows() > 0 ) {
            return $this->db->insert_id();
        } else {
            return -1;
        }
    }

    /**
     * Get all roles
     *
     * @return array|null
     */
    public function get_all_roles() {
        $this->db->select('id');
        $this->db->select('role');
        $this->db->from('roles');

        $query = $this->db->get();

        $data = null;

        foreach($query->result() as $row) {
            $data[] = array(
                'id'   => $row->id,
                'role' => $row->role
            );
        }

        return $data;
    }

    /**
     * Deletes a role
     *
     * @param $id
     *
     * @return bool
     */
    public function delete_role($id) {
        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->delete('roles');
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        }

        return true;
    }
}