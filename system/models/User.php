<?php
require_once __ROOT__.'/system/models/db_object.php';

/**
 *
 */
class User extends DBObject {

    var $id = null;
    var $name = null;
    var $email = null;
    var $avatar = null;
    var $password = null;

    function __construct($id=null, $name=null, $email=null, $password=null, $avatar=null) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->avatar = $avatar;
        $this->password = $password;
        $this->table = 'users';

        parent::__construct();
    }

    function find_by_id() {
        $user = $this->search_by_id();

        if (!is_null($user)) {
            $this->id = $user['id'];
            $this->name = $user['name'];
            $this->email = $user['email'];
            $this->avatar = $user['avatar'];
            $this->password = $user['password'];
            return $this->id;
        } else {
            return false;
        }
    }

    function search_by_email() {
        $user = $this->search_by_field('email', $this->email);
        if (!is_null($user)) {
            $this->id = $user['id'];
            $this->name = $user['name'];
            $this->email = $user['email'];
            $this->avatar = $user['avatar'];
            $this->password = $user['password'];
            return $this->id;
        } else {
            return false;
        }
    }

    function get_avatar_url() {
        return build_static_url($this->avatar);
    }
}
?>
