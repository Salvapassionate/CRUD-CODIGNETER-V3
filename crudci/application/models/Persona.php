<?php
    class Persona extends CI_Model{

        public function agrega($persona) {
            $this->db->insert('personas', $persona);
        }//end agregar

          public function seleccionar_todo(){
            $this->db->select('*');
            $this->db->from('personas');
            return $this->db->get()->result();
                
            }
        public function eliminar($id_persona) {
           $this->db->where('id', $id_persona);
           $this->db->delete('personas');
    }

         public function actualizar($persona,$id_persona) {
            $this->db->where('id', $id_persona);
            $this->db->update('personas', $persona);
        }//end actualizar
 
}
?>