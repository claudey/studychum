<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bd
 *
 * @author WebGPri
 */
class bd {

    function select($table, $where = null) {
        connect();
        $sql = 'SELECT * FROM ' . $table;

        if ($where == null) {
            $sql .= '';
        } else {
            $sql .= $where;
        }
        $result = array();
        $res = mysql_query($sql);
        while ($row = mysql_fetch_assoc($res)) {
            $result[] = $row;
        }
        return $result;
    }

    function insert($table, $data) {
        connect();
        $sql = 'INSERT INTO ' . $table . ' VALUES (';
        for ($i = 0; $i < count($data); $i++) {
            if (($i + 1) == count($data)) {
                $sql .= "'" . $data[$i] . "'";
            } else {
                $sql .= "'" . $data[$i] . "'" . ", ";
            }
        }
        $sql .=')';

        $res = mysql_query($sql);

        if ($res) {
            return '1';
        } else {
            return '2';
        }
    }

    function update($table, $data, $where) {
        connect();
        $b = 0;
        $query_a = array();
        $vars = array();
        $result = mysql_query("SELECT * FROM $table");

        for ($i = 0; $i < mysql_num_fields($result); $i++) {
            $vars[] = mysql_field_name($result, $b);
            $b++;
        }
        $sql = "";
        for ($i = 0; $i < count($data); $i++) {
            if (($i + 1) == count($data)) {
                $sql .= $vars[$i] . "=" . $data[$i] . "";
            } else {
                $sql .= $vars[$i] . "=" . $data[$i] . "" . ", ";
            }
        }
        
        $query = "UPDATE $table SET $sql WHERE $where";
        $res = mysql_query($query);
        
        if($res){
            return '1';
        }else{
            return '2';
        }
    }

    function delete($table, $where) {
        $sql = 'DELETE FROM ' . $table . ' ' . $where;

        $res = mysql_query($sql);

        if ($res) {
            return '1';
        } else {
            return '2';
        }
    }

}

?>
