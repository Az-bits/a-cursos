<?php

/**
 * 
 */
class Model_usuario extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function insertar_tabla_sys($tabla, $objeto)
	{
		$this->db->insert($tabla, $objeto);
		return $this->db->insert_id();
	}
	public function login($user, $pass)
	{
		return $this->db->query("SELECT
		usuario.idusuario,
		persona.nombre,
		persona.paterno,
		persona.materno,
		rol.roles
		from usuario
		INNER JOIN persona USING(idpersona)
		INNER JOIN rol USING(idrol)
		WHERE usuario.estado='activo' AND usuario.name='$user' AND usuario.pass='$pass' ")->row();
	}
	public function listar_usuarios()
	{

		return $this->db->query("SELECT
		usuario.imagen,
		usuario.estado,
		usuario.fecha_reg,
		rol.roles,
		persona.idpersona,
		persona.ci,
		persona.expedido,
		persona.nombre,
		persona.paterno,
		persona.materno,
		persona.celular
		FROM
		persona
		INNER JOIN usuario ON usuario.idpersona = persona.idpersona
		INNER JOIN rol ON  usuario.idrol = rol.idrol
		where usuario.estado !='eliminar' order by usuario.idusuario desc
		")->result();
	}
	public function verificar_usuarios($user)
	{
		return $this->db->query("SELECT * FROM usuario where name='$user' ")->row();
	}
	public function validar_ci($ci)
	{
		return $this->db->query("SELECT
		*
		FROM
		persona WHERE ci='$ci'")->row();
	}
	public function verificar_usuarios_activo($idpersona)
	{
		return $this->db->query("SELECT
		*
		FROM
		usuario
		INNER JOIN persona ON usuario.idpersona = persona.idpersona
		where usuario.idpersona='$idpersona' and usuario.estado='activo'")->row();
	}
}
