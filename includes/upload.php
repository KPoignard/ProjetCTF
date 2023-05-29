<?php

class  Media {

  public $imageInfo;
  public $fileName;
  public $fileType;
  public $fileTempPath;
  //Set destination for upload
  public $userPath = SITE_ROOT.DS.'..'.DS.'uploads/users';
  


  public $errors = array();
  public $upload_errors = array(
    0 => "Il n'y a pas d'erreur, le fichier a été téléchargé avec succès",
    1 => "Le fichier téléchargé dépasse la directive upload_max_filesize dans php.ini",
    2 => "Le fichier téléchargé dépasse la directive MAX_FILE_SIZE spécifiée dans le formulaire HTML",
    3 => "Le fichier téléversé n'a été téléversé que partiellement",
    4 => "Aucun fichier n'a été téléversé",
    6 => "Absence d'un dossier temporaire",
    7 => "Échec de l'écriture du fichier sur le disque.",
    8 => "Une extension PHP a arrêté le téléchargement du fichier."
  );
  public$upload_extensions = array(
   'gif',
   'jpg',
   'jpeg',
   'png',
  );
  public function file_ext($filename){
     $ext = strtolower(substr( $filename, strrpos( $filename, '.' ) + 1 ) );
     if(in_array($ext, $this->upload_extensions)){
       return true;
     }
   }

  public function upload($file)
  {
    if(!$file || empty($file) || !is_array($file)):
      $this->errors[] = "Aucun fichier n'a été téléversé.";
      return false;
    elseif($file['error'] != 0):
      $this->errors[] = $this->upload_errors[$file['error']];
      return false;
    elseif(!$this->file_ext($file['name'])):
      $this->errors[] ="Le fichier n'est pas au bon format";
      return false;
    else:
      $this->imageInfo = getimagesize($file['tmp_name']);
      $this->fileName  = basename($file['name']);
      $this->fileType  = $this->imageInfo['mime'];
      $this->fileTempPath = $file['tmp_name'];
     return true;
    endif;

  }

  /*--------------------------------------------------------------*/
  /* Fonction d'ajout d'image
  /*--------------------------------------------------------------*/
 public function process_user($id){

    if(!empty($this->errors)){
        return false;
      }
    if(empty($this->fileName) || empty($this->fileTempPath)){
        $this->errors[] = "L'emplacement du fichier est incorrecte
.";
        return false;
      }
    if(!is_writable($this->userPath)){
        $this->errors[] = $this->userPath." Doit être inscriptible!!!.";
        return false;
      }
    if(!$id){
      $this->errors[] = " ID User Manquant.";
      return false;
    }
    $ext = explode(".",$this->fileName);
    $new_name = randString(8).$id.'.' . end($ext);
    $this->fileName = $new_name;
    if($this->user_image_destroy($id))
    {
    if(move_uploaded_file($this->fileTempPath,$this->userPath.'/'.$this->fileName))
       {

         if($this->update_userImg($id)){
           unset($this->fileTempPath);
           return true;
         }

       } else {
         $this->errors[] = "Le téléchargement du fichier a échoué, probablement en raison d'autorisations incorrectes sur le dossier de téléchargement.";
         return false;
       }
    }
 }
 /*--------------------------------------------------------------*/
 /* Fonction Mise à jour de l'image de profil
 /*--------------------------------------------------------------*/
  private function update_userImg($id){
     global $db;
      $sql = "UPDATE users SET";
      $sql .=" image='{$db->escape($this->fileName)}'";
      $sql .=" WHERE id='{$db->escape($id)}'";
      $result = $db->query($sql);
      return ($result && $db->affected_rows() === 1 ? true : false);

   }
 /*--------------------------------------------------------------*/
 /* Fonction qui Supprimer l'ancienne image de profil
 /*--------------------------------------------------------------*/
  public function user_image_destroy($id){
     $image = find_by_id('users',$id);
     if($image['image'] === 'sans_image.jpg')
     {
       return true;
     } else {
       unlink($this->userPath.'/'.$image['image']);
       return true;
     }

   }

}
?>