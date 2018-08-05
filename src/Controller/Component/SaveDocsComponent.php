<?php 
namespace App\Controller\Component;

use Cake\Controller\Component;

class SaveDocsComponent extends Component
{ 
	public function saveFiles($data,$docFolder,$fileNo,$count)
    {
        $filename = $data['name'];
        $file_tmp_name = $data['tmp_name'];
        
        $dir = WWW_ROOT.$docFolder;
        $allowed = array('pdf');
        $newfilename = $fileNo."-".$count.".pdf";
        $doc_path = $dir.$newfilename;

        if (!in_array( substr( strrchr($filename, '.'),1),$allowed)) {
                throw new Exception("Error Processing Request", 1); 
        }elseif (is_uploaded_file($file_tmp_name)) {
            if(move_uploaded_file($file_tmp_name, $doc_path))
            {    
                $newdata['doc-name'] = $newfilename;
                $newdata['doc-path'] = $docFolder.$newfilename;
                return $newdata;
            }
        }
    }
}