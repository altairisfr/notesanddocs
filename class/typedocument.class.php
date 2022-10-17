<?php
class TypeDocument // extends CommonObject
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;

	/**
	 * @var string Error code (or message)
	 */
	public $error = '';

	/**
	 * @var string[] Error codes (or messages)
	 */
	public $errors = array();
    public $element = 'typedocument'; //!< Id that identify managed objects
	public $table_element = 'notesanddocuments_notesanddocuments_type'; //!< Name of table without prefix where object is stored
    /**
	 * @var int ID
	 */
	public $id;

	public $code;

	/**
     * @var string Type label
     */
    public $libelle;

	public $active;

    public $fields = array(
		'label' => array('type'=>'varchar(50)', 'label'=>'Label', 'enabled'=>1, 'visible'=>1, 'position'=>12, 'notnull'=>0, 'showoncombobox'=>'1')
	);

    /**
     *  Constructor
     *
     *  @param      DoliDb		$db      Database handler
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     *  Load object in memory from database
     *
     *  @param      int		$id    	  Id object
     *  @param		string	$code	    Code
     *  @param		string	$code_iso	Code ISO
     *  @return     int          	>0 if OK, 0 if not found, <0 if KO
     */
    public function fetch($id, $code = '')
    {
        $sql = "SELECT";
  		$sql .= " rowid,";
  		$sql .= " code,";
  		$sql .= " entity,";
  		$sql .= " label,";
        $sql .= " active";
        $sql .= " FROM ".MAIN_DB_PREFIX."notesanddocuments_notesanddocuments_type";
        if ($id) $sql .= " WHERE rowid = ".$id;
        elseif ($code) $sql .= " WHERE code = '".$this->db->escape($code)."'";

    	dol_syslog(get_class($this)."::fetch", LOG_DEBUG);
        $resql = $this->db->query($sql);
        if ($resql)
        {
            if ($this->db->num_rows($resql))
            {
                $obj = $this->db->fetch_object($resql);

                $this->id = $obj->rowid;
				$this->code = $obj->code;
				$this->entity = $obj->entity;
				$this->label = $obj->label;
				$this->active = $obj->active;

                $this->db->free($resql);
                return 1;
            }
            else {
                return 0;
            }
        }
        else
        {
      	    $this->error = "Error ".$this->db->lasterror();
            return -1;
        }
    }

    /**
     *  Return a link to the object card (with optionaly the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option						On what the link point to ('nolink', ...)
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    	global $langs;
        return $langs->trans($this->label);
    }
}
