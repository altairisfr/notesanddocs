<?php
/** 		Function called to complete substitution array (before generating on ODT, or a personalized email)
 * 		functions xxx_completesubstitutionarray are called by make_substitutions() if file
 * 		is inside directory htdocs/core/substitutions
 *
 *		@param	array		$substitutionarray	Array with substitution key=>val
 *		@param	Translate	$langs			Output langs
 *		@param	Object		$object			Object to use to get values
 * 		@return	void					The entry parameter $substitutionarray is modified
 */

function notesanddocuments_completesubstitutionarray(&$substitutionarray,$langs,$object)
{
   global $conf,$db;

   $document_type = $object->fk_project;
   $substitutionarray['document_type'] = $document_type;

   $document_label = $object->label;
   $substitutionarray['document_label'] = $document_label;

   $document_content = $object->content;
   $substitutionarray['document_content'] = $document_content;

   $document_keywords = $object->keywords;
   $substitutionarray['document_keywords'] = $document_keywords;
}
