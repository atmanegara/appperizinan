<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use backend\models\File;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;
    public $id_file_jenis;
    public $id_post;
    public $title;
    public $description;
    public $position;

    public function rules()
    {
        return [
            [['file'], 'file'],
            // [['file'], 'required', 'on'=>['jenis']],
            [['file', 'title', 'id_post', 'id_file_jenis', 'position'], 'required'],
            [['description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_file_jenis' => 'File Jenis',
            'id_post' => 'Post',
            'position' => 'Position',
            'title' => 'Title',
            'description' => 'Description',
            'filename' => 'Filename',
            'timestamp' => 'Timestamp',
        ];
    }
    
    public function upload()
    {
        $post = Yii::$app->request->post('UploadForm');

        // die(print_r($post));

      

        if ($this->validate()) 
        {   
              $id_post = $post['id_post'];
        $id_file_jenis = $post['id_file_jenis'];
        $title = $post['title'];
        $position = $post['position'];
        $description = $post['description'];

        $name = sprintf('%s_%s_%s.%s', self::slugify($title), $id_file_jenis, $id_post, $this->file->extension);
            if (!File::find()->where( [ 'id_post' => $id_post, 'id_file_jenis' => $id_file_jenis, 'title' => $title] )->exists())
            {
                $allowExtension = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlxs', 'ppt', 'pptx', 'csv');

                if (in_array($this->file->extension, $allowExtension))
                {

                  // if ($this->file->size <= 20480000)
                  // {
                    $model = new File;
                    $model->id_post = $id_post;
                    $model->id_file_jenis = $id_file_jenis;
                    $model->title = $title;
                    $model->description = $description;
                    $model->filename = $name;
                    $model->position = $position;
                    $model->save(false);

                    $this->file->saveAs('./uploads/'.$name);

                    return array('success' => true, 'messages' => 'File Upload Successfully');
                  // }
                  // return array('success' => false, 'messages' => 'File SIze maximum 2 MB');
            
                }
                return array('success' => false, 'messages' => 'File Extension alowed (' . implode(', ',$allowExtension) . ')');
            }
            else
            {
                return array('success' => false, 'messages' => 'Title or Jenis File Exists in Database - Silahkan Hapus File Terlebih Dahulu');
            }

        } else {
            
            return array('success' => false, 'messages' => 'File Upload Failed');
        }
    }

    public function slugify($text)
    {
      // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, '_');

      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }
}