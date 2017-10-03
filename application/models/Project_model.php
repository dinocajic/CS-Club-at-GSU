<?php
/**
 * Communicates with the user_projects and project_categories tables
 *
 * @contributor Dino Cajic (dinocajic@gmail.com)
 */

class Project_model extends CI_Model {

    /**
     * Add project details to user_projects table
     *
     * @param array $data
     *
     * @return bool - success
     */
    public function add_project($data) {
        // @todo
    }

    /**
     * Returns a project by specifying the project's id
     *
     * @param int $id
     *
     * @return array
     */
    public function get_project($id) {
        // @todo
    }

    /**
     * Returns a specified number of projects
     *
     * @param int $num - the number of projects to return
     *
     * @return array
     */
    public function get_projects($num = 0) {
        // @todo
    }

    /**
     * Returns a list of all projects
     *
     * @return array
     */
    public function get_all_projects() {
        return $this->get_projects();
    }

    /**
     * Returns a list of enabled or disabled projects.
     *
     * @param int $num - the number of projects to return
     *
     * @return array
     */
    public function get_enabled_projects($num = 0) {
        // @todo
    }

    /**
     * Returns a list of disabled projects
     *
     * @param int $num - the number of disabled projects to return. Skip parameter to return all disabled projects.
     *
     * @return array
     */
    public function get_disabled_projects($num = 0) {
        // @todo
    }

    /**
     * Returns a list of projects for a specific user
     *
     * @param int $user_id
     *
     * @return array
     */
    public function get_user_projects($user_id) {
        // @todo
    }

    /**
     * Returns a list of projects that fall under a specific category
     *
     * @param int $category_id
     *
     * @return array
     */
    public function get_projects_by_category($category_id) {
        // @todo
    }

    /**
     * Returns the specific project category name
     *
     * @param int $category_id
     *
     * @return string
     */
    public function get_project_category($category_id) {
        // @todo
    }

    /**
     * Returns the id for a specific project category
     *
     * @param string $name
     *
     * @return int
     */
    public function get_project_category_id($name) {
        // @todo
    }

    /**
     * Returns a list of all project categories, enabled and disabled.
     *
     * @return array
     */
    public function get_project_categories() {
        // @todo
    }

    /**
     * Returns all active project categories
     *
     * @return array
     */
    public function get_enabled_categories() {
        // @todo
    }

    /**
     * Returns a list of all disabled categories
     *
     * @return array
     */
    public function get_disabled_categories() {
        // @todo
    }

    /**
     * Checks to see if category exists
     *
     * @param string $name
     */
    public function does_category_exist($name) {
        // @todo
    }

    /**
     * @param string $name - the new category name
     *
     * @return int
     */
    public function add_project_category($name) {

        if ( $this->does_category_exist($name) ) {
            return $this->get_project_category_id($name);
        }

        // @todo add category and return new id
    }
}