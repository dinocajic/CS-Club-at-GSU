<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Communicates with the testimonials table to add and retrieve testimonials
 *
 * @contributor Dino Cajic (dinocajic@gmail.com)
 */
class Contact_model extends CI_Model {

    /**
     * Add contact message into database
     *
     * @param array $data - the contact message
     * @return bool - success
     */
    public function add_message($data) {
        $this->load->model("email_model");
        // @todo use email model to verify email is correct
        // @todo if email exists, retrieve the id. Otherwise add email and get email id.

        // @todo add the message into contact_messages table

    }

    /**
     * Returns a specific message
     *
     * @param int $id - the message id
     *
     * @return array - message details
     */
    public function get_message($id){
        // @todo
    }

    /**
     * Returns a number of messages, both read and unread. If no parameter is specified, it returns all messages.
     *
     * @param int $num
     *
     * @return array
     */
    public function get_messages($num = 0) {
        // @todo
    }

    /**
     * Returns all messages, both read and unread.
     *
     * @return array
     */
    public function get_all_messages() {
        return $this->get_messages();
    }

    /**
     * Returns either read or unread messages. Default is to return read messages.
     *
     * @param bool $read - true for read, false for unread
     * @param int $num - the number of read messages to return. Use 0 for all read messages
     *
     * @return array
     */
    public function get_read_messages($read = true, $num = 0) {
        // @todo
    }

    /**
     * Returns a number of unread messages
     *
     * @param int $num - the number of unread messages to return. Use 0 for all unread messages.
     *
     * @return array
     */
    public function get_unread_messages($num = 0) {
        return $this->get_read_messages(false, $num);
    }

    /**
     * Returns a list of messages that were added by a specific person
     *
     * @param int $email_id - the email id associated with messages
     *
     * @return array
     */
    public function get_messages_by_email($email_id) {
        // @todo
    }

    /**
     * Returns a list of messages that were read by a specific user
     *
     * @param int $user_id - the registered user's id
     * @param int $num - the number of messages to return. Skip parameter to return a list of all messages read by the user.
     *
     * @return array
     */
    public function get_messages_read_by_specific_user($user_id, $num = 0) {
        // @todo
    }

    /**
     * Get a list of messages between a specific time-frame
     *
     * @param DateTime $start_date
     * @param DateTime $end_date
     * @param int $num - the number of messages to return. Skip parameter to return a list of all messages in date range.
     *
     * @return array
     */
    public function get_messages_between_dates($start_date, $end_date, $num = 0) {
        // @todo
    }

    /**
     * Mark a specific message as read
     *
     * @param int $message_id
     * @param int $user_id
     *
     * @return bool - success
     */
    public function mark_read($message_id, $user_id) {
        //@todo modify both the contact_messages and read_messages tables
    }

    /**
     * @param int $id - the id of a specific contact message
     */
    public function delete_message($id) {
        // @todo insert into deleted_contact_messages
        // @todo remove from contact_messages
    }

    /**
     * Returns a list of deleted messages from the deleted_contact_messages table
     *
     * @param int $num - the number of deleted messages to return. Skip parameter to return all deleted messages.
     *
     * @return array
     */
    public function view_deleted_messages($num = 0) {
        // @todo
    }
}