<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_jobs".
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $requirements
 * @property string $salary_range
 * @property string $city
 * @property string $address
 * @property string $contact_email
 * @property string $contact_phone
 * @property int $is_published
 * @property string $created_at
 */
class Job extends \yii\db\ActiveRecord
{

    public $skipUser = false;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_jobs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'description', 'type', 'requirements', 'salary_range', 'city', 'address', 'contact_email', 'contact_phone'], 'required'],
            [['category_id', 'is_published'], 'integer'],
            [['created_at'], 'safe'],
            [['title', 'salary_range', 'address'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
            [['type'], 'string', 'max' => 40],
            [['requirements'], 'string', 'max' => 200],
            [['city'], 'string', 'max' => 50],
            [['contact_email'], 'string', 'max' => 80],
            [['contact_phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'user_id' => 'User ID',
            'title' => 'Title',
            'description' => 'Description',
            'type' => 'Job Type',
            'requirements' => 'Requirements',
            'salary_range' => 'Salary Range',
            'city' => 'City',
            'address' => 'Address',
            'contact_email' => 'Contact Email',
            'contact_phone' => 'Contact Phone',
            'is_published' => 'Is Published',
            'created_at' => 'Created At',
        ];
    }

    public function getCategory() {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function beforeSave($insert)
    {
        if(!$this->isNewRecord && Yii::$app->user->identity->role === "admin") {
            return parent::beforeSave($insert); 
        }
        if(!$this->skipUser) {
            $this->user_id = Yii::$app->user->identity->id;            
        }
        return parent::beforeSave($insert);
    }

    public function getUser() {
        return $this->hasOne(Job::class,[
            'id' => 'user_id'
        ]);
    }
}
