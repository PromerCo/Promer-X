<?php
namespace backend\models;

use Yii;

/**
 * This is the model class for table "hubkol_pull".
 *
 * @property integer $id
 * @property integer $kol_id
 * @property integer $push_id
 * @property integer $bystander_frequency
 * @property string $ideas
 * @property integer $is_enroll
 * @property integer $is_collect
 * @property string $enroll_time
 * @property integer $is_success
 * @property string $success_time
 * @property string $create_date
 * @property string $update_time
 */
class HubKolPull extends \backend\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hubkol_pull';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kol_id', 'push_id'], 'required'],
            [['kol_id', 'push_id', 'bystander_frequency'], 'integer'],
            [['enroll_time', 'success_time', 'create_date', 'update_time'], 'safe'],
            [['ideas'], 'string', 'max' => 100],
            [['is_enroll', 'is_collect', 'is_success'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kol_id' => 'KOL ID',
            'push_id' => '推单ID',
            'bystander_frequency' => '围观次数',
            'ideas' => '创意',
            'is_enroll' => '是否入伍',
            'is_collect' => '1 收藏',
            'enroll_time' => '入伍时间',
            'is_success' => '是否成功',
            'success_time' => '入伍时间',
            'create_date' => '创建时间',
            'update_time' => '更新时间',
        ];
    }

  /**
     * 返回数据库字段信息，仅在生成CRUD时使用，如不需要生成CRUD，请注释或删除该getTableColumnInfo()代码
     * COLUMN_COMMENT可用key如下:
     * label - 显示的label
     * inputType 控件类型, 暂时只支持text,hidden  // select,checkbox,radio,file,password,
     * isEdit   是否允许编辑，如果允许编辑将在添加和修改时输入
     * isSearch 是否允许搜索
     * isDisplay 是否在列表中显示
     * isOrder 是否排序
     * udc - udc code，inputtype为select,checkbox,radio三个值时用到。
     * 特别字段：
     * id：主键。必须含有主键，统一都是id
     * create_date: 创建时间。生成的代码自动赋值
     * update_date: 修改时间。生成的代码自动赋值
     */
    public function getTableColumnInfo(){
        return array(
        'id' => array(
                        'name' => 'id',
                        'allowNull' => false,
//                         'autoIncrement' => true,
//                         'comment' => 'ID',
//                         'dbType' => "int(11) unsigned",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => true,
                        'phpType' => 'integer',
                        'precision' => '11',
                        'scale' => '',
                        'size' => '11',
                        'type' => 'integer',
                        'unsigned' => true,
                        'label'=>$this->getAttributeLabel('id'),
                        'inputType' => 'hidden',
                        'isEdit' => true,
                        'isSearch' => true,
                        'isDisplay' => true,
                        'isSort' => true,
//                         'udc'=>'',
                    ),
		'kol_id' => array(
                        'name' => 'kol_id',
                        'allowNull' => false,
//                         'autoIncrement' => false,
//                         'comment' => 'KOL ID',
//                         'dbType' => "int(11) unsigned",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'integer',
                        'precision' => '11',
                        'scale' => '',
                        'size' => '11',
                        'type' => 'integer',
                        'unsigned' => true,
                        'label'=>$this->getAttributeLabel('kol_id'),
                        'inputType' => 'text',
                        'isEdit' => true,
                        'isSearch' => false,
                        'isDisplay' => true,
                        'isSort' => true,
//                         'udc'=>'',
                    ),
		'push_id' => array(
                        'name' => 'push_id',
                        'allowNull' => false,
//                         'autoIncrement' => false,
//                         'comment' => '推单ID',
//                         'dbType' => "int(11) unsigned",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'integer',
                        'precision' => '11',
                        'scale' => '',
                        'size' => '11',
                        'type' => 'integer',
                        'unsigned' => true,
                        'label'=>$this->getAttributeLabel('push_id'),
                        'inputType' => 'text',
                        'isEdit' => true,
                        'isSearch' => false,
                        'isDisplay' => true,
                        'isSort' => true,
//                         'udc'=>'',
                    ),
		'bystander_frequency' => array(
                        'name' => 'bystander_frequency',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '围观次数',
//                         'dbType' => "int(5)",
                        'defaultValue' => '0',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'integer',
                        'precision' => '5',
                        'scale' => '',
                        'size' => '5',
                        'type' => 'integer',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('bystander_frequency'),
                        'inputType' => 'text',
                        'isEdit' => true,
                        'isSearch' => false,
                        'isDisplay' => true,
                        'isSort' => true,
//                         'udc'=>'',
                    ),
		'ideas' => array(
                        'name' => 'ideas',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '创意',
//                         'dbType' => "varchar(100)",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '100',
                        'scale' => '',
                        'size' => '100',
                        'type' => 'string',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('ideas'),
                        'inputType' => 'text',
                        'isEdit' => true,
                        'isSearch' => false,
                        'isDisplay' => true,
                        'isSort' => true,
//                         'udc'=>'',
                    ),
		'is_enroll' => array(
                        'name' => 'is_enroll',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '是否入伍',
//                         'dbType' => "tinyint(1) unsigned",
                        'defaultValue' => '0',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'integer',
                        'precision' => '1',
                        'scale' => '',
                        'size' => '1',
                        'type' => 'tinyint',
                        'unsigned' => true,
                        'label'=>$this->getAttributeLabel('is_enroll'),
                        'inputType' => 'text',
                        'isEdit' => true,
                        'isSearch' => false,
                        'isDisplay' => true,
                        'isSort' => true,
//                         'udc'=>'',
                    ),
		'is_collect' => array(
                        'name' => 'is_collect',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '1 收藏',
//                         'dbType' => "tinyint(1)",
                        'defaultValue' => '0',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'integer',
                        'precision' => '1',
                        'scale' => '',
                        'size' => '1',
                        'type' => 'tinyint',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('is_collect'),
                        'inputType' => 'text',
                        'isEdit' => true,
                        'isSearch' => false,
                        'isDisplay' => true,
                        'isSort' => true,
//                         'udc'=>'',
                    ),
		'enroll_time' => array(
                        'name' => 'enroll_time',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '入伍时间',
//                         'dbType' => "timestamp",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '',
                        'scale' => '',
                        'size' => '',
                        'type' => 'timestamp',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('enroll_time'),
                        'inputType' => 'text',
                        'isEdit' => true,
                        'isSearch' => false,
                        'isDisplay' => true,
                        'isSort' => true,
//                         'udc'=>'',
                    ),
		'is_success' => array(
                        'name' => 'is_success',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '是否成功',
//                         'dbType' => "tinyint(1) unsigned",
                        'defaultValue' => '0',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'integer',
                        'precision' => '1',
                        'scale' => '',
                        'size' => '1',
                        'type' => 'tinyint',
                        'unsigned' => true,
                        'label'=>$this->getAttributeLabel('is_success'),
                        'inputType' => 'text',
                        'isEdit' => true,
                        'isSearch' => false,
                        'isDisplay' => true,
                        'isSort' => true,
//                         'udc'=>'',
                    ),
		'success_time' => array(
                        'name' => 'success_time',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '入伍时间',
//                         'dbType' => "timestamp",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '',
                        'scale' => '',
                        'size' => '',
                        'type' => 'timestamp',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('success_time'),
                        'inputType' => 'text',
                        'isEdit' => true,
                        'isSearch' => false,
                        'isDisplay' => true,
                        'isSort' => true,
//                         'udc'=>'',
                    ),
		'create_date' => array(
                        'name' => 'create_date',
                        'allowNull' => false,
//                         'autoIncrement' => false,
//                         'comment' => '创建时间',
//                         'dbType' => "timestamp",
                        'defaultValue' => 'CURRENT_TIMESTAMP',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '',
                        'scale' => '',
                        'size' => '',
                        'type' => 'timestamp',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('create_date'),
                        'inputType' => 'text',
                        'isEdit' => true,
                        'isSearch' => false,
                        'isDisplay' => true,
                        'isSort' => true,
//                         'udc'=>'',
                    ),
		'update_time' => array(
                        'name' => 'update_time',
                        'allowNull' => true,
//                         'autoIncrement' => false,
//                         'comment' => '更新时间',
//                         'dbType' => "timestamp",
                        'defaultValue' => '',
                        'enumValues' => null,
                        'isPrimaryKey' => false,
                        'phpType' => 'string',
                        'precision' => '',
                        'scale' => '',
                        'size' => '',
                        'type' => 'timestamp',
                        'unsigned' => false,
                        'label'=>$this->getAttributeLabel('update_time'),
                        'inputType' => 'text',
                        'isEdit' => true,
                        'isSearch' => false,
                        'isDisplay' => true,
                        'isSort' => true,
//                         'udc'=>'',
                    ),
		        );
        
    }
 
}
