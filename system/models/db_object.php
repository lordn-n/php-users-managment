<?php
/**
  *
  */
class DBObject {

    var $id = null;
    var $db = null;

    function __construct() {
        global $DB;
        $this->db = $DB;
    }

    function update($field, $value) {
        //
    }

    function get($field, $value) {
        //
    }

    function get_table_name() {
        return strtolower(get_class($this)).'s';
    }

    function get_table_colum_names() {
        $query = $this->db->prepare('DESCRIBE '.$this->get_table_name());
        $query->execute();
        return $query->fetchAll(PDO::FETCH_COLUMN);
    }

    function save() {
        $columns = $this->get_table_colum_names();
        if (($key = array_search('id', $columns)) !== false) {
            unset($columns[$key]);
        }

        $cols_str = implode(',', $columns);
        $values_str = ':'.implode(',:', $columns);
        $values = get_object_vars($this);

        $sql = 'INSERT INTO '.$this->table.' ('.$cols_str.') VALUES ('.$values_str.')';

        if($stmt = $this->db->prepare($sql)){
            $param_values = array();

            foreach ($columns as $column) {
                if ($column == 'password') {
                    $values[$column] = password_hash($values[$column], PASSWORD_DEFAULT);
                }
                if (is_null($values[$column])) {
                    $values[$column] = '';
                }

                $param_values[$column] = $values[$column];
            }

            if($stmt->execute($param_values)){
                return $this->db->lastInsertId();
            } else{
                echo 'There was an error saving the '.$this->get_table_name();
                return false;
            }

            unset($stmt);
        }
    }

    function search_by_id() {
        $sql = 'SELECT * FROM '.$this->get_table_name().' WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $this->id]);

        $result = $stmt->fetch();
        unset($stmt);

        if ($result != false) {
            return $result;
        } else {
            return null;
        }
    }

    function search_by_field($field, $value) {
        $sql = 'SELECT * FROM '.$this->get_table_name().' WHERE '.$field.' = :value';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['value' => $value]);

        $result = $stmt->fetch();
        unset($stmt);

        if ($result != false) {
            return $result;
        } else {
            return null;
        }
    }
}
?>
